<?php
if ( ! function_exists( 'evento_eventpress_about' ) ) :
	function evento_eventpress_about() {
		
	function eventpress_get_organizer_default() {
	return apply_filters(
		'eventpress_get_organizer_default', json_encode(
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
	);
}
				
$default_content 							= eventpress_get_organizer_default();
$hide_show_wedding_section 					= get_theme_mod('hide_show_wedding_section','1');
$wedding_section_title						= get_theme_mod('wedding_section_title','Organizer'); 
$wedding_section_description				= get_theme_mod('wedding_section_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry');
$organizer_content							= get_theme_mod('organizer_content',$default_content);	
?>
    <!--===================== 
        Start: About Wedding Event
     =====================-->
<?php if($hide_show_wedding_section == '1') { ?>
    <section id="about-event" class="section-padding wedding-about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <div class="section-title">
						<?php if($wedding_section_title) {?>
							<h2><?php echo esc_attr($wedding_section_title); ?></h2>
						<?php } ?>
						<?php 
							if ( function_exists( 'eventpress_title_seprator' ) ) :
								eventpress_title_seprator(); 
							endif;	
						?>
						<?php if($wedding_section_description) {?>
							<p><?php echo esc_attr($wedding_section_description); ?></p>
						<?php } ?>	
                    </div>
                </div>
            </div>
            <div class="row org-content">
				<?php
					if ( ! empty( $organizer_content ) ) {
					$organizer_content = json_decode( $organizer_content );
					foreach ( $organizer_content as $organizer_item ) {
						$title = ! empty( $organizer_item->title ) ? apply_filters( 'eventpress_translate_single_string', $organizer_item->title, 'slider section' ) : '';
						$subtitle = ! empty( $organizer_item->subtitle ) ? apply_filters( 'eventpress_translate_single_string', $organizer_item->subtitle, 'slider section' ) : '';
						$text = ! empty( $organizer_item->text ) ? apply_filters( 'eventpress_translate_single_string', $organizer_item->text, 'slider section' ) : '';
						$image = ! empty( $organizer_item->image_url ) ? apply_filters( 'eventpress_translate_single_string', $organizer_item->image_url, 'slider section' ) : '';
				?>
                <div class="col-md-6 mb-5 mb-md-0 mx-auto">
                    <div class="wedding-person text-center" id="wedding-person-one">
                        <figure>
                            <?php if ( ! empty( $image ) ) : ?>
								<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
							<?php endif; ?>
							<figcaption>
                                <div class="inner-text">
									<?php if($subtitle) {?>
										<h4><?php echo esc_html($subtitle); ?></h4>	
									<?php } ?>
                                </div>
                            </figcaption>
                        </figure>
						<?php if($title) {?>
							<h3><?php echo esc_html($title); ?></h3>
						<?php } ?>
						<?php if($text) {?>
							<p><?php echo esc_html($text); ?></p>
						<?php } ?>
                    </div>
                </div>
				<?php }} ?>
            </div>
        </div>
    </section>
	<?php } }
endif;
if ( function_exists( 'evento_eventpress_about' ) ) {
$section_priority = apply_filters( 'eventpress_section_priority', 12, 'evento_eventpress_about' );
add_action( 'eventpress_sections', 'evento_eventpress_about', absint( $section_priority ) );
} 
?>