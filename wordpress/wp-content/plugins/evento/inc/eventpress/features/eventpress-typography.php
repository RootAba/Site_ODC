<?php function eventpress_pro_typography_customizer( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
$wp_customize->add_panel( 'eventpress_typography_setting', array(
		'priority'       => 34,
		'capability'     => 'edit_theme_options',
		'title'      => __('Typography','eventpress'),
	) );

// Typography Hide/ Show Setting // 

$wp_customize->add_section(
	'typography_setting' ,
		array(
		'title'      => __('Settings','eventpress'),
		'panel' => 'eventpress_typography_setting',
		'priority'       => 1,
   	) );
	if ( class_exists( 'Eventpress_Customizer_Toggle_Control' ) ) {
		$wp_customize->add_setting( 
			'hide_show_typography' , 
				array(
				'default' => 0,
				'capability' => 'edit_theme_options',
			) 
		);
		
		$wp_customize->add_control( new Eventpress_Customizer_Toggle_Control( $wp_customize, 
		'hide_show_typography', 
			array(
				'label'	      => esc_html__( 'Enable Typography', 'eventpress' ),
				'section'     => 'typography_setting',
				'settings'    => 'hide_show_typography',
				'type'        => 'ios', // light, ios, flat
			) 
		));
	}
$font_size = array();
for($i=9; $i<=100; $i++)
{			
	$font_size[$i] = $i;
}
$font_transform = array('lowercase'=>'Lowercase','uppercase'=>'Uppercase','capitalize'=>'capitalize');
//$font_style = array('normal'=>'Normal','italic'=>'Italic');
$font_weight = array('normal'=>'normal', 'italic'=>'Italic','oblique'=>'oblique');	
// General typography section
$wp_customize->add_section(
	'Body_typography' ,
		array(
		'title'      => __('Body','eventpress'),
		'panel' => 'eventpress_typography_setting',
		'priority'       => 2,
   	) );
		
		//Secondary font weight
		
		$wp_customize->add_setting(
			'body_typography_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
		'body_typography_font_weight', array(
				'label' => __('Font Style','eventpress'),
				'section' => 'Body_typography',
				'setting' => 'body_typography_font_weight',
				'choices'=>$font_weight,
				'description'=>__('','eventpress'),
			))
		);
		// Body font size// 
		$wp_customize->add_setting( 
			'body_font_size' , 
				array(
				'default' => __( '16','eventpress' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'body_font_size', 
			array(
				'section'  => 'Body_typography',
				'settings' => 'body_font_size',
				'label'    => __( 'Font Size','eventpress' ),
				'input_attrs' => array(
					'min'    => 10,
					'max'    => 40,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);

	// paragraph typography
		$wp_customize->add_section(
			'paragraph_typography' ,
				array(
				'title'      => __('Paragraph','eventpress'),
				'panel' => 'eventpress_typography_setting',
				'priority'       => 2,
			) );
		//paragraph font weight
		
		$wp_customize->add_setting(
			'para_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
		'para_font_weight', array(
				'label' => __('Font Style','eventpress'),
				'section' => 'paragraph_typography',
				'setting' => 'para_font_weight',
				'choices'=>$font_weight,
			))
		);
		
		// paragraph font size// 
		$wp_customize->add_setting( 
			'paragraph_font_size' , 
				array(
				'default' => __( '16','eventpress' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'paragraph_font_size', 
			array(
				'section'  => 'paragraph_typography',
				'settings' => 'paragraph_font_size',
				'label'    => __( 'Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 40,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// paragraph line height// 
		$wp_customize->add_setting( 
			'paragraph_line_height' , 
				array(
				'default' => __( '16','eventpress' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'paragraph_line_height', 
			array(
				'section'  => 'paragraph_typography',
				'settings' => 'paragraph_line_height',
				'label'    => __( 'Line Height(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 40,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);

		
		//H1 typography
		$wp_customize->add_section(
			'H1_typography' ,
				array(
				'title'      => __('H1','eventpress'),
				'panel' => 'eventpress_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H1 font weight
		
		$wp_customize->add_setting(
			'h1_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
		'h1_font_weight', array(
				'label' => __('Font Style','eventpress'),
				'section' => 'H1_typography',
				'setting' => 'h1_font_weight',
				'choices'=>$font_weight,
				'description'=>__('','eventpress'),
			))
		);
		
		// H1 font size// 
		$wp_customize->add_setting( 
			'h1_font_size' , 
				array(
				'default' => '40',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h1_font_size', 
			array(
				'section'  => 'H1_typography',
				'settings' => 'h1_font_size',
				'label'    => __( 'Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// paragraph line height// 
		$wp_customize->add_setting( 
			'h1_line_height' , 
				array(
				'default' => __( '50','eventpress' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h1_line_height', 
			array(
				'section'  => 'H1_typography',
				'settings' => 'h1_line_height',
				'label'    => __( 'Line Height(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H1 text transform
		
		$wp_customize->add_setting( 
			'h1_text_transform' , 
				array(
				'default' => 'lowercase',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
	'h1_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'eventpress' ),
			'section'        => 'H1_typography',
			'settings'   	 => 'h1_text_transform',
			'choices'        => $font_transform,
		)) 
	);
	
	//H2 typography
		$wp_customize->add_section(
			'H2_typography' ,
				array(
				'title'      => __('H2','eventpress'),
				'panel' => 'eventpress_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H2 font weight
		
		$wp_customize->add_setting(
			'h2_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
		'h2_font_weight', array(
				'label' => __('Font Style','eventpress'),
				'section' => 'H2_typography',
				'setting' => 'h2_font_weight',
				'choices'=>$font_weight,
				'description'=>__('','eventpress'),
			))
		);
		
		// H2 font size// 
		$wp_customize->add_setting( 
			'h2_font_size' , 
				array(
				'default' => __( '36','eventpress' ),
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h2_font_size', 
			array(
				'section'  => 'H2_typography',
				'settings' => 'h2_font_size',
				'label'    => __( 'Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		// paragraph line height// 
		$wp_customize->add_setting( 
			'h2_line_height' , 
				array(
				'default' => '46',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h2_line_height', 
			array(
				'section'  => 'H2_typography',
				'settings' => 'h2_line_height',
				'label'    => __( 'Line Height(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H1 text transform
		
		$wp_customize->add_setting( 
			'h2_text_transform' , 
				array(
				'default' => 'lowercase',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
	'h2_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'eventpress' ),
			'section'        => 'H2_typography',
			'settings'   	 => 'h2_text_transform',
			'choices'        => $font_transform,
		)) 
	);
	
	
	//H3 typography
		$wp_customize->add_section(
			'H3_typography' ,
				array(
				'title'      => __('H3','eventpress'),
				'panel' => 'eventpress_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H3 font weight
		
		$wp_customize->add_setting(
			'h3_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
		'h3_font_weight', array(
				'label' => __('Font Style','eventpress'),
				'section' => 'H3_typography',
				'setting' => 'h3_font_weight',
				'choices'=>$font_weight,
				'description'=>__('','eventpress'),
			))
		);
		
		// H3 font size// 
		$wp_customize->add_setting( 
			'h3_font_size' , 
				array(
				'default' => '24',
				'capability'     => 'edit_theme_options',
				
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h3_font_size', 
			array(
				'section'  => 'H3_typography',
				'settings' => 'h3_font_size',
				'label'    => __( 'Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//h3 line height// 
		$wp_customize->add_setting( 
			'h3_line_height' , 
				array(
				'default' => '34',
				'capability'     => 'edit_theme_options',
				
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h3_line_height', 
			array(
				'section'  => 'H3_typography',
				'settings' => 'h3_line_height',
				'label'    => __( 'Line Height(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H3 text transform
		
		$wp_customize->add_setting( 
			'h3_text_transform' , 
				array(
				'default' => 'lowercase',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
	'h3_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'eventpress' ),
			'section'        => 'H3_typography',
			'settings'   	 => 'h3_text_transform',
			'choices'        => $font_transform,
		)) 
	);
		
//H4 typography
		$wp_customize->add_section(
			'H4_typography' ,
				array(
				'title'      => __('H4','eventpress'),
				'panel' => 'eventpress_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H4 font weight
		
		$wp_customize->add_setting(
			'h4_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
		'h4_font_weight', array(
				'label' => __('Font Style','eventpress'),
				'section' => 'H4_typography',
				'setting' => 'h4_font_weight',
				'choices'=>$font_weight,
				'description'=>__('','eventpress'),
			))
		);
		
		// H4 font size// 
		$wp_customize->add_setting( 
			'h4_font_size' , 
				array(
				'default' => '18',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h4_font_size', 
			array(
				'section'  => 'H4_typography',
				'settings' => 'h4_font_size',
				'label'    => __( 'Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//h3 line height// 
		$wp_customize->add_setting( 
			'h4_line_height' , 
				array(
				'default' => '28',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h4_line_height', 
			array(
				'section'  => 'H4_typography',
				'settings' => 'h4_line_height',
				'label'    => __( 'Line Height(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H4 text transform
		
		$wp_customize->add_setting( 
			'h4_text_transform' , 
				array(
				'default' => 'lowercase',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
	'h4_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'eventpress' ),
			'section'        => 'H4_typography',
			'settings'   	 => 'h4_text_transform',
			'choices'        => $font_transform,
		)) 
	);
	
	
	//H5 typography
		$wp_customize->add_section(
			'H5_typography' ,
				array(
				'title'      => __('H5','eventpress'),
				'panel' => 'eventpress_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H5 font weight
		
		$wp_customize->add_setting(
			'h5_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
		'h5_font_weight', array(
				'label' => __('Font Style','eventpress'),
				'section' => 'H5_typography',
				'setting' => 'h5_font_weight',
				'choices'=>$font_weight,
				'description'=>__('','eventpress'),
			))
		);
		
		// H5 font size// 
		$wp_customize->add_setting( 
			'h5_font_size' , 
				array(
				'default' => '16',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h5_font_size', 
			array(
				'section'  => 'H5_typography',
				'settings' => 'h5_font_size',
				'label'    => __( 'Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//h5 line height// 
		$wp_customize->add_setting( 
			'h5_line_height' , 
				array(
				'default' => '15',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h5_line_height', 
			array(
				'section'  => 'H5_typography',
				'settings' => 'h5_line_height',
				'label'    => __( 'Line Height(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H5 text transform
		
		$wp_customize->add_setting( 
			'h5_text_transform' , 
				array(
				'default' => 'lowercase',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
	'h5_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'eventpress' ),
			'section'        => 'H5_typography',
			'settings'   	 => 'h5_text_transform',
			'choices'        => $font_transform,
		)) 
	);
	
	
	//H6 typography
		$wp_customize->add_section(
			'H6_typography' ,
				array(
				'title'      => __('H6','eventpress'),
				'panel' => 'eventpress_typography_setting',
				'priority'       => 3,
			) 
		);
		
		//H5 font weight
		
		$wp_customize->add_setting(
			'h6_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
		'h6_font_weight', array(
				'label' => __('Font Style','eventpress'),
				'section' => 'H6_typography',
				'setting' => 'h6_font_weight',
				'choices'=>$font_weight,
				'description'=>__('','eventpress'),
			))
		);
		
		// H6 font size// 
		$wp_customize->add_setting( 
			'h6_font_size' , 
				array(
				'default' => '16',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h6_font_size', 
			array(
				'section'  => 'H6_typography',
				'settings' => 'h6_font_size',
				'label'    => __( 'Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//h6 line height// 
		$wp_customize->add_setting( 
			'h6_line_height' , 
				array(
				'default' => '26',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'h6_line_height', 
			array(
				'section'  => 'H6_typography',
				'settings' => 'h6_line_height',
				'label'    => __( 'Line Height(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 70,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		//H5 text transform
		
		$wp_customize->add_setting( 
			'h6_text_transform' , 
				array(
				'default' => 'lowercase',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
	'h6_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'eventpress' ),
			'section'        => 'H6_typography',
			'settings'   	 => 'h6_text_transform',
			'choices'        => $font_transform,
		)) 
	);
	

// menu typography section
$wp_customize->add_section(
	'menu_typography' ,
		array(
		'title'      => __('Menus','eventpress'),
		'panel' => 'eventpress_typography_setting',
		'priority'       => 2,
   	) );
	//menu font weight
		$wp_customize->add_setting(
			'menu_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
				'menu_font_weight',
				array(
					'label' => __('Font Style','eventpress'),
					'section' => 'menu_typography',
					'setting' => 'menu_font_weight',
					'choices'=>$font_weight,
					'description'=>__('','eventpress'),
				))
			);
		
		// menu font size// 
		$wp_customize->add_setting( 
			'menu_font_size' , 
				array(
				'default' => '16',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'menu_font_size', 
			array(
				'section'  => 'menu_typography',
				'settings' => 'menu_font_size',
				'label'    => __( 'Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 25,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//menu text transform
		
		$wp_customize->add_setting( 
			'menu_text_transform' , 
				array(
				'default' => 'capitalize',
				'capability'     => 'edit_theme_options',
			) 
		);

	$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
	'menu_text_transform' , 
		array(
			'label'          => __( 'Text Transform', 'eventpress' ),
			'section'        => 'menu_typography',
			'settings'   	 => 'menu_text_transform',
			'choices'        => $font_transform,
		)) 
	);
	
// Sections typography section
$wp_customize->add_section(
	'section_typography' ,
		array(
		'title'      => __('Sections','eventpress'),
		'panel' => 'eventpress_typography_setting',
		'priority'       => 2,
   	) );
	
	
	//section title label
		
	$wp_customize->add_setting( 
		'sample_simple_notice',
				array(
					'default' => '',
					'transport' => 'postMessage',
					'sanitize_callback' => 'skyrocket_text_sanitization'
					
			)
		);
		
		//section font weight
		$wp_customize->add_setting(
			'section_tit_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
				'section_tit_font_weight',
				array(
					'label' => __(' Title Font Style','eventpress'),
					'section' => 'section_typography',
					'setting' => 'section_tit_font_weight',
					'choices'=>$font_weight,
					'description'=>__('','eventpress'),
				))
			);
		
		// section title font size// 
		$wp_customize->add_setting( 
			'section_tit_font_size' , 
				array(
				'default' => '36',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'section_tit_font_size', 
			array(
				'section'  => 'section_typography',
				'settings' => 'section_tit_font_size',
				'label'    => __( 'Title Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 50,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
		
		//section font weight
		$wp_customize->add_setting(
			'section_des_font_weight',
			array(
				'default'           =>  'normal',
				'capability'        =>  'edit_theme_options',
				'sanitize_callback' =>  'sanitize_text_field',
			)	
		);
		$wp_customize->add_control(new Evento_Customizer_Select_Control($wp_customize,
				'section_des_font_weight',
				array(
					'label' => __('Description Font Style','eventpress'),
					'section' => 'section_typography',
					'setting' => 'section_des_font_weight',
					'choices'=>$font_weight,
					'description'=>__('','eventpress'),
				))
			);
		
		// section title font size// 
		$wp_customize->add_setting( 
			'section_desc_font_size' , 
				array(
				'default' => '16',
				'capability'     => 'edit_theme_options',
			) 
		);

		$wp_customize->add_control( 
		new Evento_Customizer_Range_Control( $wp_customize, 'section_desc_font_size', 
			array(
				'section'  => 'section_typography',
				'settings' => 'section_desc_font_size',
				'label'    => __( 'Description Font Size(px)','eventpress' ),
				'input_attrs' => array(
					'min'    => 1,
					'max'    => 40,
					'step'   => 1,
					//'suffix' => 'px', //optional suffix
				),
			) ) 
		);
}
add_action( 'customize_register', 'eventpress_pro_typography_customizer' );


// header selective refresh
function eventpress_pro_home_typography_partials( $wp_customize ){
	// h1_font_size
	$wp_customize->selective_refresh->add_partial( 'h1_font_size', array(
		//'selector'            => '#header-top .header-social',
		'settings'            => 'h1_font_size',
		'render_callback'  => 'eventpress_pro_home_h1_typography_render_callback',
	
	) );
	
	// h1_font_weight
	$wp_customize->selective_refresh->add_partial( 'h1_font_weight', array(
		'settings'            => 'h1_font_weight',
		'render_callback'  => 'eventpress_pro_home_h1_font_weight_render_callback',
	
	) );
	
	// h1_line_height
	$wp_customize->selective_refresh->add_partial( 'h1_line_height', array(
		'settings'            => 'h1_line_height',
		'render_callback'  => 'eventpress_pro_home_h1_line_height_render_callback',
	
	) );
	
	// h1_text_transform
	$wp_customize->selective_refresh->add_partial( 'h1_text_transform', array(
		'settings'            => 'h1_text_transform',
		'render_callback'  => 'eventpress_pro_home_h1_text_transform_render_callback',
	
	) );
	
	// h2_font_size
	$wp_customize->selective_refresh->add_partial( 'h2_font_size', array(
		//'selector'            => '#header-top .header-social',
		'settings'            => 'h2_font_size',
		'render_callback'  => 'eventpress_pro_home_typography_render_callback',
	
	) );
	
	// h2_font_weight
	$wp_customize->selective_refresh->add_partial( 'h2_font_weight', array(
		'settings'            => 'h2_font_weight',
		'render_callback'  => 'eventpress_pro_home_h2_font_weight_render_callback',
	
	) );
	
	// h2_line_height
	$wp_customize->selective_refresh->add_partial( 'h2_line_height', array(
		'settings'            => 'h2_line_height',
		'render_callback'  => 'eventpress_pro_home_h2_line_height_render_callback',
	
	) );
	
	// h2_text_transform
	$wp_customize->selective_refresh->add_partial( 'h2_text_transform', array(
		'settings'            => 'h2_text_transform',
		'render_callback'  => 'eventpress_pro_home_h2_text_transform_render_callback',
	
	) );
	
	// h3_font_size
	$wp_customize->selective_refresh->add_partial( 'h3_font_size', array(
		//'selector'            => '#header-top .header-social',
		'settings'            => 'h3_font_size',
		'render_callback'  => 'eventpress_pro_home_h3_typography_render_callback',
	
	) );
	
	// h3_font_weight
	$wp_customize->selective_refresh->add_partial( 'h3_font_weight', array(
		'settings'            => 'h3_font_weight',
		'render_callback'  => 'eventpress_pro_home_h3_font_weight_render_callback',
	
	) );
	
	// h3_line_height
	$wp_customize->selective_refresh->add_partial( 'h3_line_height', array(
		'settings'            => 'h3_line_height',
		'render_callback'  => 'eventpress_pro_home_h3_line_height_render_callback',
	
	) );
	
	// h3_text_transform
	$wp_customize->selective_refresh->add_partial( 'h3_text_transform', array(
		'settings'            => 'h3_text_transform',
		'render_callback'  => 'eventpress_pro_home_h3_text_transform_render_callback',
	
	) );

	// h4_font_size
	$wp_customize->selective_refresh->add_partial( 'h4_font_size', array(
		//'selector'            => '#header-top .header-social',
		'settings'            => 'h4_font_size',
		'render_callback'  => 'eventpress_pro_home_h4_typography_render_callback',
	
	) );
	
	// h4_font_weight
	$wp_customize->selective_refresh->add_partial( 'h4_font_weight', array(
		'settings'            => 'h4_font_weight',
		'render_callback'  => 'eventpress_pro_home_h4_font_weight_render_callback',
	
	) );
	
	// h4_line_height
	$wp_customize->selective_refresh->add_partial( 'h4_line_height', array(
		'settings'            => 'h4_line_height',
		'render_callback'  => 'eventpress_pro_home_h4_line_height_render_callback',
	
	) );
	
	// h4_text_transform
	$wp_customize->selective_refresh->add_partial( 'h4_text_transform', array(
		'settings'            => 'h4_text_transform',
		'render_callback'  => 'eventpress_pro_home_h4_text_transform_render_callback',
	
	) );
	
	// h5_font_size
	$wp_customize->selective_refresh->add_partial( 'h5_font_size', array(
		'settings'            => 'h5_font_size',
		'render_callback'  => 'eventpress_pro_home_h5_typography_render_callback',
	) );
	
	// h5_font_weight
	$wp_customize->selective_refresh->add_partial( 'h5_font_weight', array(
		'settings'            => 'h5_font_weight',
		'render_callback'  => 'eventpress_pro_home_h5_font_weight_render_callback',
	
	) );
	
	// h5_line_height
	$wp_customize->selective_refresh->add_partial( 'h5_line_height', array(
		'settings'            => 'h5_line_height',
		'render_callback'  => 'eventpress_pro_home_h5_line_height_render_callback',
	
	) );
	
	// h5_text_transform
	$wp_customize->selective_refresh->add_partial( 'h5_text_transform', array(
		'settings'            => 'h5_text_transform',
		'render_callback'  => 'eventpress_pro_home_h5_text_transform_render_callback',
	
	) );
	
	// h6_font_size
	$wp_customize->selective_refresh->add_partial( 'h6_font_size', array(
		'settings'            => 'h6_font_size',
		'render_callback'  => 'eventpress_pro_home_h6_typography_render_callback',
	
	) );
	
	// h6_font_weight
	$wp_customize->selective_refresh->add_partial( 'h6_font_weight', array(
		'settings'            => 'h6_font_weight',
		'render_callback'  => 'eventpress_pro_home_h6_font_weight_render_callback',
	
	) );
	
	// h6_line_height
	$wp_customize->selective_refresh->add_partial( 'h6_line_height', array(
		'settings'            => 'h6_line_height',
		'render_callback'  => 'eventpress_pro_home_h6_line_height_render_callback',
	
	) );
	
	// h6_text_transform
	$wp_customize->selective_refresh->add_partial( 'h6_text_transform', array(
		'settings'            => 'h6_text_transform',
		'render_callback'  => 'eventpress_pro_home_h6_text_transform_render_callback',
	
	) );
	
	// para_font_weight
	$wp_customize->selective_refresh->add_partial( 'para_font_weight', array(
		'settings'            => 'para_font_weight',
		'render_callback'  => 'eventpress_pro_home_para_font_weight_render_callback',
	
	) );
	
	// paragraph_font_size
	$wp_customize->selective_refresh->add_partial( 'paragraph_font_size', array(
		'settings'            => 'paragraph_font_size',
		'render_callback'  => 'eventpress_pro_home_paragraph_font_size_render_callback',
	
	) );
	
	// paragraph_line_height
	$wp_customize->selective_refresh->add_partial( 'paragraph_line_height', array(
		'settings'            => 'paragraph_line_height',
		'render_callback'  => 'eventpress_pro_home_paragraph_line_height_render_callback',
	
	) );
	
	// menu_font_family
	$wp_customize->selective_refresh->add_partial( 'menu_font_family', array(
		'settings'            => 'menu_font_family',
		'render_callback'  => 'eventpress_pro_home_menu_font_family_render_callback',
	
	) );
	
	// menu_font_weight
	$wp_customize->selective_refresh->add_partial( 'menu_font_weight', array(
		'settings'            => 'menu_font_weight',
		'render_callback'  => 'eventpress_pro_home_menu_font_weight_render_callback',
	
	) );
	
	// menu_font_size
	$wp_customize->selective_refresh->add_partial( 'menu_font_size', array(
		'settings'            => 'menu_font_size',
		//'selector'            => '.main-menu ul',
		'render_callback'  => 'eventpress_pro_home_menu_font_size_render_callback',
	
	) );
	
	// section_des_font_family
	$wp_customize->selective_refresh->add_partial( 'section_des_font_family', array(
		'settings'            => 'section_des_font_family',
		'render_callback'  => 'eventpress_pro_home_section_des_font_family_render_callback',
	
	) );
	
	// section_des_font_weight
	$wp_customize->selective_refresh->add_partial( 'section_des_font_weight', array(
		'settings'            => 'section_des_font_weight',
		'render_callback'  => 'eventpress_pro_home_section_des_font_weight_render_callback',
	
	) );
	
	// section_desc_font_size
	$wp_customize->selective_refresh->add_partial( 'section_desc_font_size', array(
		'settings'            => 'section_desc_font_size',
		'render_callback'  => 'eventpress_pro_home_section_desc_font_size_render_callback',
	
	) );
	
	// section_tit_font_family
	$wp_customize->selective_refresh->add_partial( 'section_tit_font_family', array(
		'settings'            => 'section_tit_font_family',
		'render_callback'  => 'eventpress_pro_home_section_section_tit_font_family_render_callback',
	
	) );
	
	// section_tit_font_weight
	$wp_customize->selective_refresh->add_partial( 'section_tit_font_weight', array(
		'settings'            => 'section_tit_font_weight',
		'render_callback'  => 'eventpress_pro_home_section_section_tit_font_weight_render_callback',
	
	) );
	
	// section_tit_font_size
	$wp_customize->selective_refresh->add_partial( 'section_tit_font_size', array(
		'settings'            => 'section_tit_font_size',
		'render_callback'  => 'eventpress_pro_home_section_section_tit_font_size_render_callback',
	
	) );
	
	// base_font_family
	$wp_customize->selective_refresh->add_partial( 'base_font_family', array(
		'settings'            => 'base_font_family',
		'render_callback'  => 'eventpress_pro_home_section_base_font_family_render_callback',
	
	) );
	
	// body_font_size
	$wp_customize->selective_refresh->add_partial( 'body_font_size', array(
		'settings'            => 'body_font_size',
		'render_callback'  => 'eventpress_pro_home_section_body_font_size_render_callback',
	
	) );
	
	// body_typography_font_weight
	$wp_customize->selective_refresh->add_partial( 'body_typography_font_weight', array(
		'settings'            => 'body_typography_font_weight',
		'render_callback'  => 'eventpress_pro_home_section_body_typography_font_weight_render_callback',
	
	) );
	}

add_action( 'customize_register', 'eventpress_pro_home_typography_partials' );
// h1_font_size
function eventpress_pro_home_h1_typography_render_callback() {
	return get_theme_mod( 'h1_font_size' );
}

// h1_font_weight 
function eventpress_pro_home_h1_font_weight_render_callback() {
	return get_theme_mod( 'h1_font_weight' );
}
// h1_line_height 
function eventpress_pro_home_h1_line_height_render_callback() {
	return get_theme_mod( 'h1_line_height' );
}
// h1_text_transform
function eventpress_pro_home_h1_text_transform_render_callback() {
	return get_theme_mod( 'h1_text_transform' );
}

// h2_font_size
function eventpress_pro_home_typography_render_callback() {
	return get_theme_mod( 'h2_font_size' );
}

// h2_font_weight 
function eventpress_pro_home_h2_font_weight_render_callback() {
	return get_theme_mod( 'h2_font_weight' );
}
// h2_line_height 
function eventpress_pro_home_h2_line_height_render_callback() {
	return get_theme_mod( 'h2_line_height' );
}
// h2_text_transform
function eventpress_pro_home_h2_text_transform_render_callback() {
	return get_theme_mod( 'h2_text_transform' );
}

// h3_font_size
function eventpress_pro_home_h3_typography_render_callback() {
	return get_theme_mod( 'h3_font_size' );
}

// h3_font_weight 
function eventpress_pro_home_h3_font_weight_render_callback() {
	return get_theme_mod( 'h3_font_weight' );
}
// h3_line_height 
function eventpress_pro_home_h3_line_height_render_callback() {
	return get_theme_mod( 'h3_line_height' );
}
// h3_text_transform
function eventpress_pro_home_h3_text_transform_render_callback() {
	return get_theme_mod( 'h3_text_transform' );
}

// h4_font_size
function eventpress_pro_home_h4_typography_render_callback() {
	return get_theme_mod( 'h4_font_size' );
}

// h4_font_weight 
function eventpress_pro_home_h4_font_weight_render_callback() {
	return get_theme_mod( 'h4_font_weight' );
}
// h3_line_height 
function eventpress_pro_home_h4_line_height_render_callback() {
	return get_theme_mod( 'h4_line_height' );
}
// h3_text_transform
function eventpress_pro_home_h4_text_transform_render_callback() {
	return get_theme_mod( 'h4_text_transform' );
}

// h5_font_size
function eventpress_pro_home_h5_typography_render_callback() {
	return get_theme_mod( 'h5_font_size' );
}

// h5_font_weight 
function eventpress_pro_home_h5_font_weight_render_callback() {
	return get_theme_mod( 'h5_font_weight' );
}
// h5_line_height 
function eventpress_pro_home_h5_line_height_render_callback() {
	return get_theme_mod( 'h5_line_height' );
}
// h5_text_transform
function eventpress_pro_home_h5_text_transform_render_callback() {
	return get_theme_mod( 'h5_text_transform' );
}

// h6_font_size
function eventpress_pro_home_h6_typography_render_callback() {
	return get_theme_mod( 'h6_font_size' );
}

// h6_font_weight 
function eventpress_pro_home_h6_font_weight_render_callback() {
	return get_theme_mod( 'h6_font_weight' );
}
// h6_line_height 
function eventpress_pro_home_h6_line_height_render_callback() {
	return get_theme_mod( 'h6_line_height' );
}
// h6_text_transform
function eventpress_pro_home_h6_text_transform_render_callback() {
	return get_theme_mod( 'h6_text_transform' );
}

// para_font_weight 
function eventpress_pro_home_para_font_weight_render_callback() {
	return get_theme_mod( 'para_font_weight' );
}
// paragraph_font_size 
function eventpress_pro_home_paragraph_font_size_render_callback() {
	return get_theme_mod( 'paragraph_font_size' );
}
// paragraph_line_height
function eventpress_pro_home_paragraph_line_height_render_callback() {
	return get_theme_mod( 'paragraph_line_height' );
}

// menu_font_family 
function eventpress_pro_home_menu_font_family_render_callback() {
	return get_theme_mod( 'menu_font_family' );
}
// menu_font_weight 
function eventpress_pro_home_menu_font_weight_render_callback() {
	return get_theme_mod( 'menu_font_weight' );
}
// menu_font_size
function eventpress_pro_home_menu_font_size_render_callback() {
	return get_theme_mod( 'menu_font_size' );
}

// section_des_font_family 
function eventpress_pro_home_section_des_font_family_render_callback() {
	return get_theme_mod( 'section_des_font_family' );
}
// section_des_font_weight 
function eventpress_pro_home_section_des_font_weight_render_callback() {
	return get_theme_mod( 'section_des_font_weight' );
}
// section_desc_font_size
function eventpress_pro_home_section_desc_font_size_render_callback() {
	return get_theme_mod( 'section_desc_font_size' );
}

// section_tit_font_family 
function eventpress_pro_home_section_section_tit_font_family_render_callback() {
	return get_theme_mod( 'section_tit_font_family' );
}
// section_tit_font_weight 
function eventpress_pro_home_section_section_tit_font_weight_render_callback() {
	return get_theme_mod( 'section_tit_font_weight' );
}
// section_tit_font_size
function eventpress_pro_home_section_section_tit_font_size_render_callback() {
	return get_theme_mod( 'section_tit_font_size' );
}

// base_font_family 
function eventpress_pro_home_section_base_font_family_render_callback() {
	return get_theme_mod( 'base_font_family' );
}
// body_font_size
function eventpress_pro_home_section_body_font_size_render_callback() {
	return get_theme_mod( 'body_font_size' );
}
// body_typography_font_weight
function eventpress_pro_home_section_body_typography_font_weight_render_callback() {
	return get_theme_mod( 'body_typography_font_weight' );
}

?>