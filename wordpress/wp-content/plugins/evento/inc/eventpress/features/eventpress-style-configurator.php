<?php
function eventpress_style_configurator( $wp_customize ) {

	/*=========================================
	Style Configurator Settings Section
	=========================================*/
	$wp_customize->add_panel( 
		'style_configurator', 
		array(
			'priority'      => 35,
			'capability'    => 'edit_theme_options',
			'title'			=> __('Style Configurator', 'eventpress'),
		) 
	);

	/*=========================================
	Pre Built Colors Settings Section
	=========================================*/
	// Footer Setting Section // 
	$wp_customize->add_section(
        'prebuilt_colors',
        array(
            'title' 		=> __('Prebuilt Theme Color','eventpress'),
            'description' 	=>'',
			'panel'  		=> 'style_configurator',
		)
    );
	
	//Pre Built Colors
	class WP_color_Customize_Control extends WP_Customize_Control {
	public $type = 'new_menu';

		   function render_content()
		   {
		   echo '<h3>' .  __( 'Select Your Prebuilt Theme Color', 'eventpress' ) . '</h3>';
			  $name = '_customize-color-radio-' . $this->id; 
			  foreach($this->choices as $key => $value ) {
				?>
				   <label>
					<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
					<img <?php if($this->value() == $key){ echo 'class="selected_img"'; } ?> src="<?php echo EVENTO_PLUGIN_URL  ?>inc/eventpress/images/color/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
					</label>
					
				<?php
			  } ?>
			
			  <script>
				jQuery(document).ready(function($) {
					$("#customize-control-theme_color label img").click(function(){
						$("#customize-control-theme_color label img").removeClass("selected_img");
						$(this).addClass("selected_img");
					});
				});
			  </script>
			  <?php 
		   }

	}
	
	 //Theme Color Scheme
	$wp_customize->add_setting(
	'theme_color', array(
	'default' => '#0574f7',  
	'capability'     => 'edit_theme_options',
    ));
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'theme_color',
	array(
        'label'   => __('Select Your Theme Color', 'eventpress'),
        'section' => 'prebuilt_colors',
		'type' => 'radio',
		'settings' => 'theme_color',	
		'choices' => array(
			'#0574f7' => 'default.png',
            '#941502' => '1.png',
			'#f24259' => '2.png',
    )
	
	)));
}

add_action( 'customize_register', 'eventpress_style_configurator' );
?>