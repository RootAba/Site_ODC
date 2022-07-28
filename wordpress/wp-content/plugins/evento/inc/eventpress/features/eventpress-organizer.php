<?php
function wedding_events_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	/*=========================================
	Testimonial Section Panel
	=========================================*/
		$wp_customize->add_section(
			'wedding_event_setting', array(
				'title' => esc_html__( 'Organizer Section', 'eventpress' ),
				'panel' => 'eventpress_frontpage_sections',
				'priority' => apply_filters( 'eventpress_section_priority', 10, 'eventpress_Newsletter' ),
			)
		);
	/*=========================================
	newsletter Settings Section
	=========================================*/
	
	// Setting Head
	$wp_customize->add_setting(
		'organizer_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'priority' => 1,
		)
	);

	$wp_customize->add_control(
	'organizer_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'wedding_event_setting',
		)
	);
	
	if ( class_exists( 'Eventpress_Customizer_Toggle_Control' ) ) {
		$wp_customize->add_setting( 
			'hide_show_wedding_section' , 
				array(
				'default' =>  esc_html__( '1', 'eventpress' ),
				'capability'     => 'edit_theme_options',
				'transport'         => $selective_refresh,
				'priority' => 2,
			) 
		);
		
		$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
		'hide_show_wedding_section', 
			array(
				'label'	      => esc_html__( 'Hide / Show Section', 'eventpress' ),
				'section'     => 'wedding_event_setting',
				'settings'    => 'hide_show_wedding_section',
				'type'        => 'ios', // light, ios, flat
			) 
		));
	}
	
	//  Head
	$wp_customize->add_setting(
		'organizer_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'priority' => 5,
		)
	);

	$wp_customize->add_control(
	'organizer_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','eventpress'),
			'section' => 'wedding_event_setting',
		)
	);
	
	// wedding Title // 
	$wp_customize->add_setting(
    	'wedding_section_title',
    	array(
	        'default'			=> __('Organizer','eventpress'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_html',
			'transport'         => $selective_refresh,
			'priority' => 6,
		)
	);	
	
	$wp_customize->add_control( 
		'wedding_section_title',
		array(
		    'label'   => __('Title','eventpress'),
		    'section' => 'wedding_event_setting',
			'type'           => 'text',
		)  
	);

	// wedding Description // 
	$wp_customize->add_setting(
    	'wedding_section_description',
    	array(
	        'default'			=> __('Lorem ipsum is simply a dummy text of the printing and typesetting of industry ','eventpress'),
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'transport'         => $selective_refresh,
			'priority' => 7,
		)
	);	
	
	$wp_customize->add_control( 
		'wedding_section_description',
		array(
		    'label'   => __('Description','eventpress'),
		    'section' => 'wedding_event_setting',
			'type'           => 'textarea',
		)  
	);
	
	
	//  Content Head
	$wp_customize->add_setting(
		'organizer_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
			'priority' => 9,
		)
	);

	$wp_customize->add_control(
	'organizer_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'wedding_event_setting',
		)
	);
	
	/**
    * Organizer Content
	*/
		if ( class_exists( 'Eventpress_Repeater' ) ) {
		$wp_customize->add_setting( 'organizer_content', 
			array(
			 'sanitize_callback' => 'Eventpress_Repeater_sanitize',
			 'priority' => 10,
			  'default' => json_encode( 
			 		array(
					array(
						 "image_url" => EVENTO_PLUGIN_URL .'inc/eventpress/images/about01.png' ,
						 "title" => "David Smith", 
						 "subtitle" => "Creative Director", 
						 "text" => "Epsum factorial non deposit quid pro quo hicescorol. Olypian quarrels et congolium sic ad nauseum.", 
						 "id" => "customizer_repeater_org_01"
					),
					array(
						 "image_url" => EVENTO_PLUGIN_URL .'inc/eventpress/images/about02.png' ,
						 "title" => "Roza Keny", 
						 "subtitle" => "Creative Director", 
						 "text" => "Epsum factorial non deposit quid pro quo hicescorol. Olypian quarrels et congolium sic ad nauseum.", 
						 "id" => "customizer_repeater_org_02"
					)
				)
             )
			)
		);
		
		$wp_customize->add_control( 
			new Eventpress_Repeater( $wp_customize, 
				'organizer_content', 
					array(
						'label'   => esc_html__('Organizer','eventpress'),
						'section' => 'wedding_event_setting',
						'add_field_label'                   => esc_html__( 'Add New Organizer', 'eventpress' ),
						'item_name'                         => esc_html__( 'Organizer', 'eventpress' ),
						
						'customizer_repeater_title_control' => true,
						'customizer_repeater_subtitle_control' => true,
						'customizer_repeater_text_control' => true,
						'customizer_repeater_image_control' => true,	
					) 
				) 
			);
		}	
		
			//Pro feature
		class Eventpress_organizer__section_upgrade extends WP_Customize_Control {
			public function render_content() { ?>
			<a class="customizer_org_upgrade_section up-to-pro" href="https://www.nayrathemes.com/eventpress-pro/" target="_blank" style="display: none;"><?php _e('Upgrade to Pro','eventpress'); ?></a>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'eventpress_org_upgrade_to_pro', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			'priority' => 11,
		));
		$wp_customize->add_control(
			new Eventpress_organizer__section_upgrade(
			$wp_customize,
			'eventpress_org_upgrade_to_pro',
				array(
					'section'				=> 'wedding_event_setting',
					'settings'				=> 'eventpress_org_upgrade_to_pro',
				)
			)
		);
}

add_action( 'customize_register', 'wedding_events_setting' );

// Team selective refresh
function eventpress_wedding_about_section_partials( $wp_customize ){

	// hide_show_wedding_section
	$wp_customize->selective_refresh->add_partial(
		'hide_show_wedding_section', array(
			'selector' => '#about-event',
			'container_inclusive' => true,
			'render_callback' => 'wedding_event_setting',
			'fallback_refresh' => true,
		)
	);
	// wedding_section_title
	$wp_customize->selective_refresh->add_partial( 'wedding_section_title', array(
		'selector'            => '#about-event .section-title h2',
		'settings'            => 'wedding_section_title',
		'render_callback'  => 'wedding_section_title_render_callback',
	
	) );
	// wedding_section_description
	$wp_customize->selective_refresh->add_partial( 'wedding_section_description', array(
		'selector'            => '#about-event .section-title p',
		'settings'            => 'wedding_section_description',
		'render_callback'  => 'wedding_section_description_render_callback',
	
	) );
	// organizer_content
	$wp_customize->selective_refresh->add_partial( 'organizer_content', array(
		'selector'            => '#about-event .org-content',
	) );
	}

add_action( 'customize_register', 'eventpress_wedding_about_section_partials' );

// wedding_section_title
function wedding_section_title_render_callback() {
	return get_theme_mod( 'wedding_section_title' );
}
// wedding_section_description
function wedding_section_description_render_callback() {
	return get_theme_mod( 'wedding_section_description' );
}