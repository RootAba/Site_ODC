<?php
// Customizer tabs
function evento_eventpress_customize_register( $wp_customize ) {
	// Setting Head
	$wp_customize->add_setting(
		'hdr_btn_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_btn_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'header_booknow',
			'priority' => 1,
		)
	);
	
	// Content Head
	$wp_customize->add_setting(
		'hdr_btn_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'hdr_btn_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Book Now','eventpress'),
			'section' => 'header_booknow',
			'priority' => 5,
		)
	);
	
	
	// Setting Head
	$wp_customize->add_setting(
		'title_seprator_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'title_seprator_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'title_seprator',
			'priority' => 1,
		)
	);
	
	
	// Content Head
	$wp_customize->add_setting(
		'title_seprator_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'title_seprator_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'title_seprator',
			'priority' => 5,
		)
	);
	
	// Setting Head
	$wp_customize->add_setting(
		'breadcrumb_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'breadcrumb_design',
			'priority' => 1,
		)
	);
	
	// Content Head
	$wp_customize->add_setting(
		'breadcrumb_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'breadcrumb_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'breadcrumb_design',
			'priority' => 4,
		)
	);
	
	
	// Setting Head
	$wp_customize->add_setting(
		'blog_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'blog_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'blog_setting',
			'priority' => 1,
		)
	);
	
	// Head
	$wp_customize->add_setting(
		'blog_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'blog_head',
		array(
			'type' => 'hidden',
			'label' => __('Header','eventpress'),
			'section' => 'blog_setting',
			'priority' => 5,
		)
	);
	
	// Content Head
	$wp_customize->add_setting(
		'blog_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'blog_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'blog_setting',
			'priority' => 11,
		)
	);
	
	
	// Setting Head
	$wp_customize->add_setting(
		'footer_top_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_top_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'footer_top',
			'priority' => 1,
		)
	);
	
	// Content Head
	$wp_customize->add_setting(
		'footer_top_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_top_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'footer_top',
			'priority' => 5,
		)
	);
	
	
	// Setting Head
	$wp_customize->add_setting(
		'footer_info_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_info_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'footer_info_settings',
			'priority' => 1,
		)
	);
	
	
	// Content Head
	$wp_customize->add_setting(
		'footer_info_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'footer_info_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'footer_info_settings',
			'priority' => 5,
		)
	);
	
	
	// Setting Head
	$wp_customize->add_setting(
		'copyright_setting_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'copyright_setting_head',
		array(
			'type' => 'hidden',
			'label' => __('Setting','eventpress'),
			'section' => 'footer_copyright',
			'priority' => 1,
		)
	);
	
	// Content Head
	$wp_customize->add_setting(
		'copyright_content_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'copyright_content_head',
		array(
			'type' => 'hidden',
			'label' => __('Content','eventpress'),
			'section' => 'footer_copyright',
			'priority' => 5,
		)
	);
	
	// BG Head
	$wp_customize->add_setting(
		'copyright_bg_head'
			,array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'eventpress_sanitize_text',
		)
	);

	$wp_customize->add_control(
	'copyright_bg_head',
		array(
			'type' => 'hidden',
			'label' => __('Background','eventpress'),
			'section' => 'footer_copyright',
			'priority' => 11,
		)
	);
}
add_action( 'customize_register', 'evento_eventpress_customize_register' );