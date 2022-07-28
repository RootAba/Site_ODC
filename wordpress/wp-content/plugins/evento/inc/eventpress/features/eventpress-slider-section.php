<?php
function evento_eventpress_slider_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Slider Section Panel
	=========================================*/
		$wp_customize->add_section(
			'slider_setting', array(
				'title' => esc_html__( 'Slider Section', 'eventpress' ),
				'panel' => 'eventpress_frontpage_sections',
				'priority' => apply_filters( 'eventpress_section_priority', 1, 'slider_setting' ),
			)
		);
	
	// Setting Head
	$wp_customize->add_setting(
		'slider_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'slider_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'slider_setting',
		)
	);
	
	// Slider Hide/ Show Setting // 
	if ( class_exists( 'Eventpress_Customizer_Toggle_Control' ) ) {
	$wp_customize->add_setting( 
		'hide_show_slider' , 
			array(
			'default' => esc_html__( '1', 'eventpress' ),
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	
	$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
	'hide_show_slider', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'eventpress' ),
			'section'     => 'slider_setting',
			'settings'    => 'hide_show_slider',
			'type'        => 'ios', // light, ios, flat
		) 
	));
	}	
	
	
	// Content Head
	$wp_customize->add_setting(
		'slider_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'priority' => 4,
		)
	);

	$wp_customize->add_control(
	'slider_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'slider_setting',
		)
	);
	
	/**
	 * Customizer Repeater for add slides
	 */
		if ( class_exists( 'Eventpress_Repeater' ) ) {
		$wp_customize->add_setting( 'slider', 
			array(
			 'sanitize_callback' => 'Eventpress_Repeater_sanitize',
			 'priority' => 5,
			  'default' => json_encode( 
			 		array(
					array(
						 "image_url" => EVENTO_PLUGIN_URL .'inc/eventpress/images/sliders/slider01.jpg' ,
						 "link" => "#", 
						 "title" => "Welcome to EventPress", 
						 "subtitle" => "A Perfect Multi-Concept Template",
						 "text" => "Suitable for Business Conference , Seminars , Meetings , Wedding Ceremony & More Events",  
						 "text2" => "Explore More",
						 "button_second" => "Buy Now",
						 "link_second" => "#",
						 "align" => "left",
						 "id" => "customizer_repeater_00070",
						
					),
				)
             )
			)
		);
		
		$wp_customize->add_control( 
			new Eventpress_Repeater( $wp_customize, 
				'slider', 
					array(
						'label'   => esc_html__('Slide','eventpress'),
						'section' => 'slider_setting',
						'add_field_label'                   => esc_html__( 'Add New Slider', 'eventpress' ),
						'item_name'                         => esc_html__( 'Slider', 'eventpress' ),
						
						'customizer_repeater_icon_control' => false,
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_text2_control'=> true,
						'customizer_repeater_link_control' => true,
						'customizer_repeater_image_control' => true,	
					) 
				) 
			);
		}	
	
	//Pro feature
		class Eventpress_slider__section_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<a class="customizer_slider_upgrade_section up-to-pro" href="https://www.nayrathemes.com/eventpress-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','eventpress'); ?></a>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'eventpress_slider_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 6,
		));
		$wp_customize->add_control(
			new Eventpress_slider__section_upgrade(
			$wp_customize,
			'eventpress_slider_upgrade_to_pro',
				array(
					'section'				=> 'slider_setting',
					'settings'				=> 'eventpress_slider_upgrade_to_pro',
				)
			)
		);
		
	
	
	//Slider Text Caption
	$wp_customize->add_setting( 
		'slider_align' , 
			array(
			'default' => __( 'left', 'eventpress' ),
			'capability'     => 'edit_theme_options',
			'priority' => 7,
		) 
	);

	$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize, 
	'slider_align' , 
		array(
			'label'          => __( 'Slide Align', 'eventpress' ),
			'section'        => 'slider_setting',
			'settings'   	 => 'slider_align',
			'choices'        => 
			array(
				'left'		=>__('Left', 'eventpress'),
				'center'		=>__('Center', 'eventpress'),
				'right'		=>__('Right', 'eventpress'),
			) 
		)) 
	);
	
	//slider opacity
	$wp_customize->add_setting( 
		'slider_opacity' , 
			array(
			'default' => '0.3',
			'capability'     => 'edit_theme_options',
			'priority' => 8,
			
		) 
	);

	$wp_customize->add_control( 
	new Evento_Customizer_Range_Control( $wp_customize, 'slider_opacity', 
		array(
			'section'  => 'slider_setting',
			'settings' => 'slider_opacity',
			'label'    => __( 'Background Opacity','eventpress' ),
			'input_attrs' => array(
				'min'    => 0,
				'max'    => 0.9,
				'step'   => 0.1,
				//'suffix' => 'px', //optional suffix
			),
		) ) 
	);
}
add_action( 'customize_register', 'evento_eventpress_slider_setting' );

// slider selective refresh
function eventpress_home_slider_section_partials( $wp_customize ){
	
	// hide_show_slider
	$wp_customize->selective_refresh->add_partial(
		'hide_show_slider', array(
			'selector' => 'header .header-slider',
			'container_inclusive' => true,
			'render_callback' => 'slider_setting',
			'fallback_refresh' => true,
		)
	);
	
	}

add_action( 'customize_register', 'eventpress_home_slider_section_partials' );