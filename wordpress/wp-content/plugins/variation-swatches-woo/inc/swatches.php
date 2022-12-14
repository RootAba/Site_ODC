<?php
/**
 * Swatches.
 *
 * @package variation-swatches-woo
 * @since 1.0.0
 */

namespace CFVSW\Inc;

use CFVSW\Inc\Traits\Get_Instance;
use CFVSW\Inc\Helper;
use CFVSW\Compatibility\Astra;
use CFVSW\Compatibility\Cartflows_Pro;
use WC_AJAX;


/**
 * Admin menu
 *
 * @since 1.0.0
 */
class Swatches {

	use Get_Instance;

	/**
	 * Instance of Helper class
	 *
	 * @var Helper
	 * @since  1.0.0
	 */
	private $helper;

	/**
	 * Stores global and store settings
	 *
	 * @var array
	 * @since  1.0.0
	 */
	private $settings = [];

	/**
	 * Constructor
	 *
	 * @since  1.0.0
	 */
	public function __construct() {
		$this->helper                   = new Helper();
		$this->settings[ CFVSW_GLOBAL ] = $this->helper->get_option( CFVSW_GLOBAL );
		$this->settings[ CFVSW_SHOP ]   = $this->helper->get_option( CFVSW_SHOP );
		$this->settings[ CFVSW_STYLE ]  = $this->helper->get_option( CFVSW_STYLE );
		if ( class_exists( 'Cartflows_Pro_Loader' ) ) {
			new Cartflows_Pro();
		}

		if (
		$this->settings[ CFVSW_GLOBAL ]['enable_swatches'] || $this->settings[ CFVSW_GLOBAL ]['enable_swatches_shop']
		) {
			add_filter( 'woocommerce_dropdown_variation_attribute_options_html', [ $this, 'variation_attribute_custom_html' ], 999, 2 );
			add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

			$position = $this->get_swatches_position();
			add_action( $position['action'], [ $this, 'variation_attribute_html_shop_page' ], $position['priority'] );
			add_filter( 'body_class', [ $this, 'label_position_class' ], 10, 2 );
			add_filter( 'woocommerce_loop_add_to_cart_args', [ $this, 'shop_page_add_to_cart_args' ], 10, 2 );
		}

		add_action( 'wp_ajax_cfvsw_ajax_add_to_cart', [ $this, 'cfvsw_ajax_add_to_cart' ] );
		add_action( 'wp_ajax_nopriv_cfvsw_ajax_add_to_cart', [ $this, 'cfvsw_ajax_add_to_cart' ] );
		add_filter( 'woocommerce_layered_nav_term_html', [ $this, 'filters_html' ], 10, 4 );
	}

	/**
	 * Generates variation attributes for different types of swatches
	 *
	 * @param string $select_html old select html populated by WooCommerce.
	 * @param array  $args variation arguments.
	 * @return string
	 * @since  1.0.0
	 */
	public function variation_attribute_custom_html( $select_html, $args ) {
		$settings        = [];
		$container_class = '';

		if ( ! $this->is_required_page() ) {
			return $select_html;
		}

		if ( $this->requires_shop_settings() ) {
			if ( ! $this->settings[ CFVSW_GLOBAL ]['enable_swatches_shop'] ) {
				return $select_html;
			}
			$settings                 = $this->settings[ CFVSW_SHOP ]['override_global'] ? $this->settings[ CFVSW_SHOP ] : array_merge( $this->settings[ CFVSW_SHOP ], $this->settings[ CFVSW_GLOBAL ] );
			$settings['auto_convert'] = true;
			if ( ! isset( $settings['tooltip'] ) ) {
				$settings['tooltip'] = $this->settings[ CFVSW_GLOBAL ]['tooltip'];
			}
			$container_class = 'cfvsw-shop-container';
		}

		if ( $this->requires_global_settings() ) {
			if ( ! $this->settings[ CFVSW_GLOBAL ]['enable_swatches'] ) {
				return $select_html;
			}
			$settings        = $this->settings[ CFVSW_GLOBAL ];
			$container_class = 'cfvsw-product-container';
		}

		if ( empty( $settings ) ) {
			return $select_html;
		}

		$attr_id       = wc_attribute_taxonomy_id_by_name( $args['attribute'] );
		$shape         = get_option( "cfvsw_product_attribute_shape-$attr_id", 'default' );
		$size          = absint( get_option( "cfvsw_product_attribute_size-$attr_id", '' ) );
		$height        = absint( get_option( "cfvsw_product_attribute_height-$attr_id", '' ) );
		$width         = absint( get_option( "cfvsw_product_attribute_width-$attr_id", '' ) );
		$min_width     = ! empty( $settings['min_width'] ) ? $settings['min_width'] . 'px' : '24px';
		$min_height    = ! empty( $settings['min_height'] ) ? $settings['min_height'] . 'px' : '24px';
		$border_radius = $settings['border_radius'] . 'px';
		switch ( $shape ) {
			case 'circle':
				$min_width     = $size ? $size . 'px' : '24px';
				$min_height    = $size ? $size . 'px' : '24px';
				$border_radius = '100%';
				break;
			case 'square':
				$min_width     = $size ? $size . 'px' : '24px';
				$min_height    = $size ? $size . 'px' : '24px';
				$border_radius = '0px';
				break;
			case 'rounded':
				$min_width     = $size ? $size . 'px' : '24px';
				$min_height    = $size ? $size . 'px' : '24px';
				$border_radius = '3px';
				break;
			case 'custom':
				$min_width     = $width ? $width . 'px' : '24px';
				$min_height    = $height ? $height . 'px' : '24px';
				$border_radius = '0px';
				break;
			default:
				break;
		}

		$type = $this->helper->get_attr_type_by_name( $args['attribute'] );
		$html = '';

		$limit = isset( $settings['limit'] ) ? intval( $settings['limit'] ) : 0;
		$more  = '';
		if ( $limit > 0 && $limit < count( $args['options'] ) && in_array( $type, [ 'color', 'image', 'label' ], true ) ) {
			$permalink = get_permalink( $args['id'] );
			/* translators: %1$1s, %3$3s: Html Tag, %2$2s: Extra attribute count */
			$more            = sprintf( __( '%1$1s %2$2s More %3$3s', 'variation-swatches-woo' ), '<a href="' . esc_url( $permalink ) . '">', ( count( $args['options'] ) - $limit ), '</a>' );
			$args['options'] = array_splice( $args['options'], 0, $limit );
		}
		switch ( $type ) {
			case 'color':
				$html = "<div class='cfvsw-swatches-container " . esc_attr( $container_class ) . "'>";
				foreach ( $args['options'] as $slug ) {
					$term        = get_term_by( 'slug', $slug, $args['attribute'] );
					$color       = get_term_meta( $term->term_id, 'cfvsw_color', true );
					$tooltip     = $settings['tooltip'] ? $term->name : '';
					$style       = '';
					$style      .= 'min-width:' . $min_width . ';';
					$style      .= 'min-height:' . $min_height . ';';
					$style      .= 'border-radius:' . $border_radius . ';';
					$inner_style = 'background-color:' . $color . ';';
					$html       .= "<div class='cfvsw-swatches-option' data-slug='" . esc_attr( $slug ) . "' data-title='" . esc_attr( $term->name ) . "' data-tooltip='" . esc_attr( $tooltip ) . "' style=" . esc_attr( $style ) . '><div class="cfvsw-swatch-inner" style="' . esc_attr( $inner_style ) . '"></div></div>';
				}
				$html .= $more ? '<span class="cfvsw-more-link" style="line-height:' . esc_attr( $min_height ) . '">' . $more . '</span' : '';
				$html .= '</div>';
				break;
			case 'image':
				$html = "<div class='cfvsw-swatches-container " . esc_attr( $container_class ) . "'>";
				foreach ( $args['options'] as $slug ) {
					$term        = get_term_by( 'slug', $slug, $args['attribute'] );
					$image       = get_term_meta( $term->term_id, 'cfvsw_image', true );
					$tooltip     = $settings['tooltip'] ? $term->name : '';
					$style       = '';
					$style      .= 'min-width:' . $min_width . ';';
					$style      .= 'min-height:' . $min_height . ';';
					$style      .= 'border-radius:' . $border_radius . ';';
					$inner_style = "background-image:url('" . esc_url( $image ) . "');background-size:cover;";
					$html       .= "<div class='cfvsw-swatches-option cfvsw-image-option' data-slug='" . esc_attr( $slug ) . "' data-title='" . esc_attr( $term->name ) . "' data-tooltip='" . esc_attr( $tooltip ) . "' style=" . esc_attr( $style ) . '>';
					$html       .= '<div class="cfvsw-swatch-inner" style="' . $inner_style . '"></div></div>';
				}
				$html .= $more ? '<span class="cfvsw-more-link" style="line-height:' . esc_attr( $min_height ) . '">' . $more . '</span' : '';
				$html .= '</div>';
				break;
			default:
				if ( 'label' !== $type && ! $settings['auto_convert'] ) {
					break;
				}
				$html = "<div class='cfvsw-swatches-container " . esc_attr( $container_class ) . "'>";
				foreach ( $args['options'] as $slug ) {
					$style  = '';
					$term   = get_term_by( 'slug', $slug, $args['attribute'] );
					$style .= 'min-width:' . $min_width . ';';
					$style .= 'min-height:' . $min_height . ';';
					$style .= 'border-radius:' . $border_radius . ';';
					$name   = ! empty( $term->name ) ? $term->name : $slug;
					$html  .= "<div class='cfvsw-swatches-option cfvsw-label-option' data-slug='" . esc_attr( $slug ) . "' data-title='" . esc_attr( $name ) . "' style=" . esc_attr( $style ) . '><div class="cfvsw-swatch-inner">' . esc_html( $name ) . '</div></div>';
				}
				$html .= $more ? '<span class="cfvsw-more-link" style="line-height:' . esc_attr( $min_height ) . '">' . $more . '</span' : '';
				$html .= '</div>';
				break;
		}

		if ( ! empty( $html ) ) {
			return '<div class="cfvsw-hidden-select">' . $select_html . '</div>' . $html;
		}
		return $select_html;
	}

	/**
	 * Generates variation attributes for shop page
	 *
	 * @return void
	 * @since  1.0.0
	 */
	public function variation_attribute_html_shop_page() {
		global $product;
		if ( ! $this->settings[ CFVSW_GLOBAL ]['enable_swatches_shop'] ) {
			return;
		}

		if ( ! $this->requires_shop_settings() ) {
			return;
		}

		if ( ! $product->is_type( 'variable' ) ) {
			return;
		}

		if ( ! $product->get_available_variations() ) {
			return;
		}

		$settings = $this->settings[ CFVSW_SHOP ];

		// Enqueue variation scripts.
		wp_enqueue_script( 'wc-add-to-cart-variation' );

		// Get Available variations?
		$get_variations       = count( $product->get_children() ) <= apply_filters( 'woocommerce_ajax_variation_threshold', 30, $product );
		$available_variations = $get_variations ? $product->get_available_variations() : false;
		$attributes           = $product->get_variation_attributes();

		$attribute_keys  = array_keys( $attributes );
		$variations_json = wp_json_encode( $available_variations );
		$variations_attr = function_exists( 'wc_esc_json' ) ? wc_esc_json( $variations_json ) : _wp_specialchars( $variations_json, ENT_QUOTES, 'UTF-8', true );
		?>
			<div class="cfvsw_variations_form variations_form cfvsw_shop_align_<?php echo esc_attr( $settings['alignment'] ); ?>" data-product_variations="<?php echo esc_attr( $variations_json ); ?>" data-product_id="<?php echo absint( $product->get_id() ); ?>" data-product_variations="<?php echo $variations_attr; //phpcs:ignore ?>">

			<?php if ( empty( $available_variations ) && false !== $available_variations ) { ?>
					<p class="stock out-of-stock"><?php echo esc_html( apply_filters( 'woocommerce_out_of_stock_message', __( 'This product is currently out of stock and unavailable.', 'variation-swatches-woo' ) ) ); ?></p>
				<?php } else { ?>
					<table class="cfvsw-shop-variations variations" cellspacing="0">
						<tbody>
							<?php foreach ( $attributes as $attribute_name => $options ) { ?>
								<tr>
									<?php if ( $settings['label'] ) { ?>
									<td class="label woocommerce-loop-product__title"><label for="<?php echo esc_attr( sanitize_title( $attribute_name ) ); ?>"><?php echo wc_attribute_label( $attribute_name ); //phpcs:ignore ?></label></td>
									<?php } ?>
								</tr>
								<tr>
									<td class="value">
										<?php
											wc_dropdown_variation_attribute_options(
												array(
													'options'   => $options,
													'attribute' => $attribute_name,
													'product'   => $product,
												)
											);
											echo end( $attribute_keys ) === $attribute_name ? wp_kses_post( apply_filters( 'woocommerce_reset_variations_link', '<a class="reset_variations" href="#">' . esc_html__( 'Clear', 'variation-swatches-woo' ) . '</a>' ) ) : '';
										?>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php } ?>
			</div>
			<?php
	}


	/**
	 * Enqueue scripts and style for frontend
	 *
	 * @return void
	 * @since  1.0.0
	 */
	public function enqueue_scripts() {
		if ( ! $this->is_required_page() ) {
			return;
		}

		wp_register_style( 'cfvsw_swatches', CFVSW_URL . 'assets/css/swatches.css', [ 'dashicons' ], CFVSW_VER );
		wp_enqueue_style( 'cfvsw_swatches' );
		$this->inline_css();

		wp_register_script( 'cfvsw_swatches', CFVSW_URL . 'assets/js/swatches.js', [ 'jquery' ], CFVSW_VER, true );
		wp_enqueue_script( 'cfvsw_swatches' );
		wp_localize_script(
			'cfvsw_swatches',
			'cfvsw_swatches_settings',
			[
				'ajax_url'               => admin_url( 'admin-ajax.php' ),
				'admin_url'              => admin_url( 'admin.php' ),
				'remove_attr_class'      => $this->get_remove_attr_class(),
				'html_design'            => $this->settings[ CFVSW_GLOBAL ]['html_design'],
				'unavailable_text'       => __( 'Selected variant is unavailable.', 'variation-swatches-woo' ),
				'ajax_add_to_cart_nonce' => wp_create_nonce( 'cfvsw_ajax_add_to_cart' ),
				'tooltip_image'          => $this->settings[ CFVSW_STYLE ]['tooltip_image'],
			]
		);
	}

	/**
	 * Adds inline css
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function inline_css() {
		$style = $this->settings[ CFVSW_STYLE ];

		if ( $this->requires_shop_settings() ) {
			$settings = $this->settings[ CFVSW_SHOP ]['override_global'] ? $this->settings[ CFVSW_SHOP ] : array_merge( $this->settings[ CFVSW_SHOP ], $this->settings[ CFVSW_GLOBAL ] );
		}

		if ( $this->requires_global_settings() ) {
			$settings = $this->settings[ CFVSW_GLOBAL ];
		}

		$custom_css = '';

		if ( ! empty( $style['tooltip_background'] ) && ! empty( $style['tooltip_font_color'] ) ) {
			$custom_css .= '.cfvsw-tooltip{background:' . $style['tooltip_background'] . ';color:' . $style['tooltip_font_color'] . ';}';
			$custom_css .= ' .cfvsw-tooltip:before{background:' . $style['tooltip_background'] . ';}';
		}

		$custom_css .= ':root {';
		$custom_css .= "--cfvsw-swatches-font-size: {$settings['font_size']}px;";
		$custom_css .= "--cfvsw-swatches-border-color: {$style['border_color']};";
		$custom_css .= "--cfvsw-swatches-border-color-hover: {$style['border_color']}80;";
		$custom_css .= ! empty( $style['label_font_size'] ) ? "--cfvsw-swatches-label-font-size: {$style['label_font_size']}px;" : '';
		$custom_css .= "--cfvsw-swatches-tooltip-font-size: {$style['tooltip_font_size']}px;";
		$custom_css .= '}';

		if ( ! empty( $custom_css ) ) {
			wp_add_inline_style( 'cfvsw_swatches', $custom_css );
		}
	}

	/**
	 * Class for disable attribute type
	 *
	 * @return string
	 * @since  1.0.0
	 */
	public function get_remove_attr_class() {
		$disable_class = '';
		$settings      = [];
		if ( $this->requires_shop_settings() ) {
			$settings = $this->settings[ CFVSW_SHOP ]['override_global'] ? $this->settings[ CFVSW_SHOP ] : $this->settings[ CFVSW_GLOBAL ];
		}
		if ( $this->requires_global_settings() ) {
			$settings = $this->settings[ CFVSW_GLOBAL ];
		}

		switch ( $settings['disable_attr_type'] ) {
			case 'blurCross':
				$disable_class = 'cfvsw-swatches-blur-cross';
				break;

			default:
				$disable_class = 'cfvsw-swatches-' . $settings['disable_attr_type'];
				break;
		}

		return $disable_class;
	}

	/**
	 * Returns the position of swatches on shop page
	 *
	 * @return array
	 * @since 1.0.0
	 */
	public function get_swatches_position() {
		$this->check_theme_compatibility();
		$position = apply_filters(
			'cfvsw_swatches_shop_page_position',
			[
				'before_title' => [
					'action'   => 'woocommerce_shop_loop_item_title',
					'priority' => 0,
				],
				'after_title'  => [
					'action'   => 'woocommerce_shop_loop_item_title',
					'priority' => 9999,
				],
				'before_price' => [
					'action'   => 'woocommerce_after_shop_loop_item_title',
					'priority' => 9,
				],
				'after_price'  => [
					'action'   => 'woocommerce_after_shop_loop_item_title',
					'priority' => 11,
				],
			]
		);
		$key      = ! empty( $this->settings[ CFVSW_SHOP ]['position'] ) ? $this->settings[ CFVSW_SHOP ]['position'] : 'before_title';
		return ! empty( $position[ $key ] ) ? $position[ $key ] : $position['before_title'];
	}

	/**
	 * Enqueues compatibility files only if particular theme is active
	 *
	 * @return void
	 * @since 1.0.0
	 */
	public function check_theme_compatibility() {
		$current_theme = wp_get_theme();
		if ( ! empty( $current_theme->template ) && 'astra' === $current_theme->template ) {
			$astra = new Astra();
			$astra->get_shop_positions();
		}
	}

	/**
	 * Adds class to WooCommerce wrapper
	 *
	 * @param array $classes existing classes.
	 * @return array
	 * @since 1.0.0
	 */
	public function label_position_class( $classes ) {
		if ( ! $this->requires_global_settings() ) {
			return $classes;
		}

		$settings = $this->settings[ CFVSW_GLOBAL ];

		if ( $settings['enable_swatches'] && isset( $settings['html_design'] ) ) {
			$classes[] = 'cfvsw-label-' . esc_html( strtolower( $settings['html_design'] ) );
			$classes[] = 'cfvsw-product-page';
			return $classes;
		}

		return $classes;
	}

	/**
	 * Arguments for shop page add to cart button
	 *
	 * @param array  $args array of button arguments.
	 * @param object $product curreent product object.
	 * @return array
	 * @since 1.0.0
	 */
	public function shop_page_add_to_cart_args( $args, $product ) {
		if ( $product->is_type( 'variable' ) ) {
			$args['class']                                 .= ' cfvsw_ajax_add_to_cart';
			$args['attributes']['data-add_to_cart_text']    = esc_html__( 'Add to Cart', 'variation-swatches-woo' );
			$args['attributes']['data-select_options_text'] = apply_filters( 'woocommerce_product_add_to_cart_text', $product->add_to_cart_text(), $product );
		}

		return $args;
	}

	/**
	 * Add to cart functionality for shop page
	 *
	 * @return mixed
	 * @since 1.0.0
	 */
	public function cfvsw_ajax_add_to_cart() {
		check_ajax_referer( 'cfvsw_ajax_add_to_cart', 'security' );

		if ( empty( $_POST['product_id'] ) ) {
			return;
		}

		$product_id        = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_POST['product_id'] ) );
		$product_title     = get_the_title( $product_id );
		$quantity          = ! empty( $_POST['quantity'] ) ? wc_stock_amount( absint( $_POST['quantity'] ) ) : 1;
		$product_status    = get_post_status( $product_id );
		$variation_id      = ! empty( $_POST['variation_id'] ) ? absint( $_POST['variation_id'] ) : 0;
		$variation         = ! empty( $_POST['variation'] ) ? array_map( 'sanitize_text_field', $_POST['variation'] ) : array();
		$passed_validation = apply_filters( 'woocommerce_add_to_cart_validation', true, $product_id, $quantity, $variation_id, $variation );
		$cart_page_url     = wc_get_cart_url();

		if ( $passed_validation && false !== WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation ) && 'publish' === $product_status ) {

			do_action( 'woocommerce_ajax_added_to_cart', $product_id );

			if ( 'yes' === get_option( 'woocommerce_cart_redirect_after_add' ) ) {
				wc_add_to_cart_message( array( $product_id => $quantity ), true );
			} else {
				$added_to_cart_notice = sprintf(
					/* translators: %s: Product title */
					esc_html__( '"%1$s" has been added to your cart. %2$s', 'variation-swatches-woo' ),
					esc_html( $product_title ),
					'<a href="' . esc_url( $cart_page_url ) . '">' . esc_html__( 'View Cart', 'variation-swatches-woo' ) . '</a>'
				);

				wc_add_notice( $added_to_cart_notice );
			}

			WC_AJAX::get_refreshed_fragments();

		} else {

			// If there was an error adding to the cart, redirect to the product page to show any errors.
			$data = array(
				'error'       => true,
				'product_url' => apply_filters( 'woocommerce_cart_redirect_after_error', get_permalink( $product_id ), $product_id ),
			);

			wp_send_json( $data );
		}
	}

	/**
	 * This function returns true if current page is compatible for variation swatches
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function is_required_page() {
		return apply_filters(
			'cfvsw_is_required_page',
			$this->requires_global_settings() || $this->requires_shop_settings()
		);
	}

	/**
	 * This function returns true if current page is product type page
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function requires_global_settings() {
		return apply_filters(
			'cfvsw_requires_global_settings',
			is_product()
		);
	}

	/**
	 * This function returns true if current page is shop / archieve type page
	 *
	 * @return bool
	 * @since 1.0.0
	 */
	public function requires_shop_settings() {
		return apply_filters(
			'cfvsw_requires_shop_settings',
			is_shop() || is_product_category()
		);
	}

	/**
	 * Generates swatches html for filters
	 *
	 * @param string  $term_html default html.
	 * @param object  $term current term object.
	 * @param string  $link filter link.
	 * @param integer $count total product associated with term count.
	 * @return string
	 * @since 1.0.0
	 */
	public function filters_html( $term_html, $term, $link, $count ) {
		if ( empty( $this->settings[ CFVSW_STYLE ]['filters'] ) ) {
			return $term_html;
		}
		$type            = $this->helper->get_attr_type_by_name( $term->taxonomy );
		$settings        = [];
		$container_class = '';

		if ( ! $this->is_required_page() ) {
			return $term_html;
		}

		if ( $this->requires_shop_settings() ) {
			if ( ! $this->settings[ CFVSW_GLOBAL ]['enable_swatches_shop'] ) {
				return $term_html;
			}
			$settings = $this->settings[ CFVSW_SHOP ]['override_global'] ? $this->settings[ CFVSW_SHOP ] : array_merge( $this->settings[ CFVSW_SHOP ], $this->settings[ CFVSW_GLOBAL ] );
			if ( ! isset( $settings['tooltip'] ) ) {
				$settings['tooltip'] = $this->settings[ CFVSW_GLOBAL ]['tooltip'];
			}
			$settings['auto_convert'] = true;
		}

		if ( $this->requires_global_settings() ) {
			if ( ! $this->settings[ CFVSW_GLOBAL ]['enable_swatches'] ) {
				return $term_html;
			}
			$settings = $this->settings[ CFVSW_GLOBAL ];
		}

		if ( empty( $settings ) ) {
			return $term_html;
		}

		$attr_id       = $term->term_id;
		$shape         = get_option( "cfvsw_product_attribute_shape-$attr_id", 'default' );
		$size          = absint( get_option( "cfvsw_product_attribute_size-$attr_id", '' ) );
		$height        = absint( get_option( "cfvsw_product_attribute_height-$attr_id", '' ) );
		$width         = absint( get_option( "cfvsw_product_attribute_width-$attr_id", '' ) );
		$min_width     = ! empty( $settings['min_width'] ) ? $settings['min_width'] . 'px' : '24px';
		$min_height    = ! empty( $settings['min_height'] ) ? $settings['min_height'] . 'px' : '24px';
		$border_radius = ! empty( $settings['border_radius'] ) ? $settings['border_radius'] . 'px' : '0';
		switch ( $shape ) {
			case 'circle':
				$min_width     = $size ? $size . 'px' : '24px';
				$min_height    = $size ? $size . 'px' : '24px';
				$border_radius = '100%';
				break;
			case 'square':
				$min_width     = $size ? $size . 'px' : '24px';
				$min_height    = $size ? $size . 'px' : '24px';
				$border_radius = '0px';
				break;
			case 'rounded':
				$min_width     = $size ? $size . 'px' : '24px';
				$min_height    = $size ? $size . 'px' : '24px';
				$border_radius = '3px';
				break;
			case 'custom':
				$min_width     = $width ? $width . 'px' : '24px';
				$min_height    = $height ? $height . 'px' : '24px';
				$border_radius = '0px';
				break;
			default:
				break;
		}

		$type = $this->helper->get_attr_type_by_name( $term->taxonomy );

		switch ( $type ) {
			case 'color':
				$html    = "<div class='cfvsw-swatches-container " . esc_attr( $container_class ) . "'>";
				$color   = get_term_meta( $term->term_id, 'cfvsw_color', true );
				$tooltip = $settings['tooltip'] ? $term->name : '';
				$style   = '';
				$style  .= 'min-width:' . $min_width . ';';
				$style  .= 'min-height:' . $min_height . ';';
				$style  .= 'border-radius:' . $border_radius . ';';
				$style  .= 'background-color:' . $color . ';';
				$html   .= "<div class='cfvsw-swatches-option' data-slug='" . esc_attr( $term->slug ) . "' data-title='" . esc_attr( $term->name ) . "' data-tooltip='" . esc_attr( $tooltip ) . "' style=" . esc_attr( $style ) . '></div>';
				$html   .= '</div>';
				break;
			case 'image':
				$html    = "<div class='cfvsw-swatches-container " . esc_attr( $container_class ) . "'>";
				$image   = get_term_meta( $term->term_id, 'cfvsw_image', true );
				$tooltip = $settings['tooltip'] ? $term->name : '';
				$style   = '';
				$style  .= 'min-width:' . $min_width . ';';
				$style  .= 'min-height:' . $min_height . ';';
				$style  .= 'border-radius:' . $border_radius . ';';
				$style  .= "background-image:url('" . $image . "');background-size:cover;";
				$html   .= "<div class='cfvsw-swatches-option cfvsw-image-option' data-slug='" . esc_attr( $term->slug ) . "' data-title='" . esc_attr( $term->name ) . "' data-tooltip='" . esc_attr( $tooltip ) . "' style=" . esc_attr( $style ) . '>';
				$html   .= '</div>';
				$html   .= '</div>';
				break;
			default:
				if ( 'label' !== $type && ! $settings['auto_convert'] ) {
					break;
				}
				$html   = "<div class='cfvsw-swatches-container " . esc_attr( $container_class ) . "'>";
				$style  = '';
				$style .= 'min-width:' . $min_width . ';';
				$style .= 'min-height:' . $min_height . ';';
				$style .= 'border-radius:' . $border_radius . ';';
				$name   = ! empty( $term->name ) ? $term->name : $term->slug;
				$html  .= "<div class='cfvsw-swatches-option cfvsw-label-option' data-slug='" . esc_attr( $term->slug ) . "' data-title='" . esc_attr( $name ) . "' style=" . esc_attr( $style ) . '>' . esc_html( $name ) . '</div>';
				$html  .= '</div>';
				break;
		}

		if ( ! empty( $html ) ) {
			return '<a ref="nofollow" style="border-radius:' . esc_attr( $border_radius ) . '" href=' . esc_url( $link ) . '>' . $html . '</a>';
		}
		return $term_html;
	}
}
