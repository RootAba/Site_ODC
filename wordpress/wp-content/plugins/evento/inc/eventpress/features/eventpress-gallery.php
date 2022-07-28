<?php
function eventpress_gallery_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
	/*=========================================
	Client Section Panel
	=========================================*/
		$wp_customize->add_section(
			'gallery_setting', array(
				'title' => esc_html__( 'Gallery Section', 'eventpress-pro' ),
				'panel' => 'eventpress_frontpage_sections',
				'priority' => apply_filters( 'eventpress_section_priority', 41, 'eventpress_gallery' ),
			)
		);
	/*=========================================
	Product Settings Section
	=========================================*/
	
	// Setting Head
	$wp_customize->add_setting(
		'gallery_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'gallery_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'gallery_setting',
		)
	);
	
	// Product Hide/ Show Setting // 
	if ( class_exists( 'Eventpress_Customizer_Toggle_Control' ) ) {
		$wp_customize->add_setting( 
			'hide_show_gallery' , 
				array(
				'default' => esc_html__( '1', 'eventpress' ),
				'capability' => 'edit_theme_options',
				'transport'         => $selective_refresh,
				'priority' => 2,
			) 
		);
		
		$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
		'hide_show_gallery', 
			array(
				'label'	      => esc_html__( 'Hide / Show Section', 'eventpress' ),
				'section'     => 'gallery_setting',
				'settings'    => 'hide_show_gallery',
				'type'        => 'ios', // light, ios, flat
			) 
		));
	}
	
	
	// Head
	$wp_customize->add_setting(
		'gallery_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'gallery_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','eventpress'),
			'section' => 'gallery_setting',
		)
	);
	
	// gallery Title // 
	$wp_customize->add_setting(
    	'gallery_title',
    	array(
	        'default'			=> __('Events Gallery','eventpress'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'gallery_title',
		array(
		    'label'   => __('Title','eventpress'),
		    'section' => 'gallery_setting',
			'settings'=> 'gallery_title',
			'type'    => 'text',
		)  
	);
	
	// Product Description // 
	$wp_customize->add_setting(
    	'gallery_description',
    	array(
	        'default'			=> __('Publishing packages and web page editors now use Lorem Ipsum as their default model text','eventpress'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'gallery_description',
		array(
		    'label'   => __('Description','eventpress'),
		    'section' => 'gallery_setting',
			'settings'   	 => 'gallery_description',
			'type'           => 'textarea',
		)  
	);
	//gallery contents
	
	// Content Head
	$wp_customize->add_setting(
		'gallery_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'gallery_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'gallery_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add contact_address
	 */
		$wp_customize->add_setting( 'gallery_img_setting', 
			array(
			 'sanitize_callback' => 'Eventpress_Repeater_sanitize',
			 'priority' => 10,
			 'transport'         => $selective_refresh,
			 'default' => json_encode( 
			 array(
				array(
					'image_url'       => EVENTO_PLUGIN_URL . 'inc/eventpress/images/gallery/gallery01.jpg',
					'id'              => 'customizer_repeater_gallery_001',
				),
				array(
					'image_url'       => EVENTO_PLUGIN_URL . 'inc/eventpress/images/gallery/gallery02.jpg',
					'id'              => 'customizer_repeater_gallery_002',
				),
				array(
					'image_url'       => EVENTO_PLUGIN_URL . 'inc/eventpress/images/gallery/gallery03.jpg',
					'id'              => 'customizer_repeater_gallery_003',
				),
				array(
					'image_url'       => EVENTO_PLUGIN_URL . 'inc/eventpress/images/gallery/gallery04.jpg',
					'id'              => 'customizer_repeater_gallery_004',
				),
				array(
					'image_url'       => EVENTO_PLUGIN_URL . 'inc/eventpress/images/gallery/gallery05.jpg',
					'id'              => 'customizer_repeater_gallery_005',
				),
				array(
					'image_url'       => EVENTO_PLUGIN_URL . 'inc/eventpress/images/gallery/gallery06.jpg',
					'id'              => 'customizer_repeater_gallery_006',
				),
				array(
					'image_url'       => EVENTO_PLUGIN_URL . 'inc/eventpress/images/gallery/gallery07.jpg',
					'id'              => 'customizer_repeater_gallery_007',
				),
				array(
					'image_url'       => EVENTO_PLUGIN_URL . 'inc/eventpress/images/gallery/gallery08.jpg',
					'id'              => 'customizer_repeater_gallery_008',
				),
			)
			 )
			)
		);
		
		$wp_customize->add_control( 
			new Eventpress_Repeater( $wp_customize, 
				'gallery_img_setting', 
					array(
						'label'   => esc_html__('Image','eventpress'),
						'section' => 'gallery_setting',
						'add_field_label'                   => esc_html__( 'Add New Image', 'eventpress' ),
						'item_name'                         => esc_html__( 'Image', 'eventpress' ),
						
						'customizer_repeater_image_control' => true,
					) 
				) 
			);
	
		//Pro feature
		class Eventpress_gallery__section_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<a class="customizer_gallery_upgrade_section up-to-pro" href="https://www.nayrathemes.com/eventpress-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','eventpress'); ?></a>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'eventpress_gallery_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 11,
		));
		$wp_customize->add_control(
			new Eventpress_gallery__section_upgrade(
			$wp_customize,
			'eventpress_gallery_upgrade_to_pro',
				array(
					'section'				=> 'gallery_setting',
					'settings'				=> 'eventpress_gallery_upgrade_to_pro',
				)
			)
		);
	
	// gallery hover  Image // 
    $wp_customize->add_setting( 
    	'gallery_hover_setting' , 
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_url',	
			'priority' => 12,
			
		) 
	);
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize , 'gallery_hover_setting' ,
		array(
			'label'          => __( 'Gallery Overlay Icon', 'eventpress' ),
			'section'        => 'gallery_setting',
			'settings'   	 => 'gallery_hover_setting',
		) 
	));	
}
add_action( 'customize_register', 'eventpress_gallery_setting' );

// Team selective refresh
function eventpress_home_gallery_section_partials( $wp_customize ){
	// team
	$wp_customize->selective_refresh->add_partial(
		'hide_show_gallery', array(
			'selector' => '#gallery',
			'container_inclusive' => true,
			'render_callback' => 'gallery_setting',
		)
	);
	
	// title
	$wp_customize->selective_refresh->add_partial( 'gallery_title', array(
		'selector'            => '#gallery .section-title h2',
		'settings'            => 'gallery_title',
		'render_callback'  => 'eventpress_gallery_title_render_callback',
	
	) );
	// description
	$wp_customize->selective_refresh->add_partial( 'gallery_description', array(
		'selector'            => '#gallery .section-title p',
		'settings'            => 'gallery_description',
		'render_callback'  => 'eventpress_gallery_description_render_callback',
	
	) );
	// contents
	$wp_customize->selective_refresh->add_partial( 'gallery_img_setting', array(
		'selector'            => '#gallery .photo-gallery',
	) );
	
	}

add_action( 'customize_register', 'eventpress_home_gallery_section_partials' );

// title
function eventpress_gallery_title_render_callback() {
	return get_theme_mod( 'gallery_title' );
}
// description
function eventpress_gallery_description_render_callback() {
	return get_theme_mod( 'gallery_description' );
}