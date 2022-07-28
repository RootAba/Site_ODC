<?php
if ( ! function_exists( 'evento_eventpress_countdown' ) ) :
	function evento_eventpress_countdown() {
		function eventpress_get_countdown_default() {
			return apply_filters(
				'eventpress_get_countdown_default', json_encode(
					 array(
						array(
							 "image_url" => get_template_directory_uri().'/images/counterhead.png' ,
							'title'           => esc_html__( '322', 'eventpress' ),
							'subtitle'            => esc_html__( 'Days', 'eventpress' ),
							'id'              => 'customizer_repeater_funfact_001',
						),
						array(
							"image_url" => get_template_directory_uri().'/images/counterhead.png' ,
							'title'           => esc_html__( '17', 'eventpress' ),
							'subtitle'            => esc_html__( 'Hours', 'eventpress' ),
							'id'              => 'customizer_repeater_funfact_001',
						
						),
						array(
							"image_url" => get_template_directory_uri().'/images/counterhead.png' ,
							'title'           => esc_html__( '02', 'eventpress' ),
							'subtitle'            => esc_html__( 'Minutes', 'eventpress' ),
							'id'              => 'customizer_repeater_funfact_001',
					
						),
						array(
							"image_url" => get_template_directory_uri().'/images/counterhead.png' ,
							'title'           => esc_html__( '39', 'eventpress' ),
							'subtitle'            => esc_html__( 'Seconds', 'eventpress' ),
							'id'              => 'customizer_repeater_funfact_001',
							
						),
					)
				)
			);
		}
		 $default_content = null;
		if ( current_user_can( 'edit_theme_options' ) ) {
				$default_content = eventpress_get_countdown_default();
			}
?>	
<?php
	$hide_show_funfact			= get_theme_mod('hide_show_funfact','1');
	$funfact_section_title= get_theme_mod('funfact_section_title','We Are Waiting For');
	$funfact_section_description= get_theme_mod('funfact_section_description','Lorem ipsum is simply a dummy text of the printing and typesetting of industry ');
	$funfact_countdown_time= get_theme_mod('funfact_countdown_time','2022/1/1 12:00:00');
	$funfact_contents			= get_theme_mod('funfact_contents',$default_content);
	$funfact_background_setting	= get_theme_mod('funfact_background_setting',EVENTO_PLUGIN_URL . '/inc/eventpress/images/timecounterbg.jpg');
	if($hide_show_funfact == '1') { 
?>
	<!--===================== 
        Start: Time Counter
     =====================-->
	<?php if ( ! empty( $funfact_background_setting ) ) { ?>
    <section id="counter" class="section-padding counter-section" style="background:url('<?php echo esc_url($funfact_background_setting); ?>') fixed;">
		<?php } else { ?>
		<section id="counter" class="section-padding counter-section">
		<?php } ?>
			<div class="container">
				<div class="row">
					<div class="col-md-6 offset-md-3 text-center">
						<div class="section-title">
							<?php if($funfact_section_title) {?>
								<h2><?php echo esc_html($funfact_section_title); ?></h2>
							<?php } ?>
							<?php 
								if ( function_exists( 'eventpress_title_seprator_dark' ) ) :
									eventpress_title_seprator_dark(); 
								endif;	
							?>
							<?php if($funfact_section_description) {?>
								<p><?php echo esc_html($funfact_section_description); ?></p>
							<?php } ?>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="count-area">
							<ul data-countdown="<?php echo esc_attr($funfact_countdown_time); ?>" class="timer">
								<!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
								<li><div><span class="days">0</span><br>Days</div></li>
								<li><div><span class="hours">0</span><br>Hours</div></li>
								<li><div><span class="minutes">00</span><br>Minutes</div></li>
								<li><div><span class="seconds">00</span><br>Seconds</div></li>
							</ul>
						</div>
					</div>        
				</div>
			</div>
		</section>
    </section>

    <!--===================== 
        End: Time Counter
     =====================-->
 <?php } 
 }
endif;
if ( function_exists( 'evento_eventpress_countdown' ) ) {
$section_priority = apply_filters( 'eventpress_section_priority', 13, 'evento_eventpress_countdown' );
add_action( 'eventpress_sections', 'evento_eventpress_countdown', absint( $section_priority ) );
} 
?>