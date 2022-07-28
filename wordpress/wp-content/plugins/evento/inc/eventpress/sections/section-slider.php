<?php
if ( ! function_exists( 'evento_eventpress_slider' ) ) :
	function evento_eventpress_slider() {
		
function eventpress_get_slides_default() {
	return apply_filters(
		'eventpress_get_slides_default', json_encode(
			 array(
				array(
					 "image_url" => EVENTO_PLUGIN_URL .'/inc/eventpress/images/sliders/slider01.jpg' ,
					 "link" => "#", 
					 "title" => "Welcome to EventPress", 
					 "subtitle" => "A Perfect Multi-Concept Template",
					 "text" => "Suitable for Business Conference , Seminars , Meetings , Wedding Ceremony & More Events", 
					 "text2" => "Explore More",
					 "button_second" => "Buy Now",
					 "link_second" => "#",
					 "align" => "left",
					 "id" => "customizer_repeater_00070",
					
				)
			)
		)
	);
}
			
$default_content 		= eventpress_get_slides_default();
$slider 				= get_theme_mod('slider',$default_content);
$hide_show_slider		= get_theme_mod('hide_show_slider','1'); 
$slider_align			= get_theme_mod('slider_align','left');
$slider_opacity			= get_theme_mod('slider_opacity','0.3'); 	
?>  
<!--===================== 
	Start: Header
=====================-->
	<?php  if($hide_show_slider == '1') { ?>
    <header id="header">
        <div class="row">
            <div class="col-md-12">
				<div class="header-slider">
				<?php
					if ( ! empty( $slider ) ) {
						$allowed_html = array(
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'b'      => array(),
						'i'      => array(),
						);
						$slider = json_decode( $slider );
						foreach ( $slider as $slide_item ) {
							$title = ! empty( $slide_item->title ) ? apply_filters( 'eventpress_translate_single_string', $slide_item->title, 'slider section' ) : '';
							$subtitle = ! empty( $slide_item->subtitle ) ? apply_filters( 'eventpress_translate_single_string', $slide_item->subtitle, 'slider section' ) : '';
							$text = ! empty( $slide_item->text ) ? apply_filters( 'eventpress_translate_single_string', $slide_item->text, 'slider section' ) : '';
							$button = ! empty( $slide_item->text2) ? apply_filters( 'eventpress_translate_single_string', $slide_item->text2,'slider More' ) : '';
							$link = ! empty( $slide_item->link ) ? apply_filters( 'eventpress_translate_single_string', $slide_item->link, 'slider section' ) : '';
							$image = ! empty( $slide_item->image_url ) ? apply_filters( 'eventpress_translate_single_string', $slide_item->image_url, 'slider section' ) : '';
				?>
                
                    <div class="header-single-slider slider01">
                        <figure>
                           <?php if ( ! empty( $image ) ) : ?>
								<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
							<?php endif; ?>
                            <figcaption>
                                <div class="content" style="background: rgba(0, 0, 0,<?php echo esc_attr($slider_opacity); ?>);">
                                    <div class="container inner-content text-<?php echo esc_attr($slider_align); ?>">
                                        <div class="row">
                                            <div class="col-md-12 text-md-<?php echo esc_attr($slider_align); ?>">
												<?php if ( ! empty( $title ) ) : ?>
													<h3 class="fadeInLeft delay-1 animated"><?php echo esc_attr( $title ); ?></h3>
												<?php endif; ?>
												<?php if ( ! empty( $subtitle ) ) : ?>
													<h1 class="fadeInLeft delay-2 animated"><?php echo esc_attr( $subtitle ); ?></h1>
												<?php endif; ?>	
                                                <!--hr-->
												<?php if ( ! empty( $text ) ) : ?>
													<h3 class="fadeInLeft delay-3 animated"><?php echo esc_attr( $text ); ?></h3>
												<?php endif; ?>	
                                                <!--h2>50% Off</h2-->
												<?php if ( ! empty( $button ) ) : ?>
													<a href="<?php echo esc_url( $link ); ?>" class="hover-effect2 active fadeInLeft delay-4 animated"><?php echo esc_attr( $button ); ?></a>
												<?php endif; ?>	
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
					<?php  } } ?>
				</div>				
            </div>
        </div>
    </header>
	<?php }
		}
	endif;
if ( function_exists( 'evento_eventpress_slider' ) ) {
$section_priority = apply_filters( 'eventpress_section_priority', 11, 'evento_eventpress_slider' );
add_action( 'eventpress_sections', 'evento_eventpress_slider', absint( $section_priority ) );

}