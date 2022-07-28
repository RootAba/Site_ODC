<?php
	if ( ! function_exists( 'evento_eventpress_gallery' ) ) :
		function evento_eventpress_gallery() {
			function eventpress_get_gallery_default() {
				return apply_filters(
					'eventpress_get_gallery_default', json_encode(
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
				);
			} 
	$default_contents 			= eventpress_get_gallery_default();
	$hide_show_gallery			= get_theme_mod('hide_show_gallery','1'); 
	$gallery_title				= get_theme_mod('gallery_title','Events Gallery');
	$gallery_description		= get_theme_mod('gallery_description','Lorem Ipsum is simply dummy text of the printing and typesetting industry');
	$gallery_img_setting		= get_theme_mod('gallery_img_setting',$default_contents);
	$gallery_hover_setting		= get_theme_mod('gallery_hover_setting');
?>
<?php if($hide_show_gallery == '1') { ?>
<!--===================== 
        Start: Photo Gallery
     =====================-->
    <style>
		.gallery-item a:hover {
				cursor: url(<?php echo esc_url( $gallery_hover_setting ); ?>), auto;
			}
	</style>
    <section id="gallery" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 text-center">
                    <div class="section-title">
						<?php if($gallery_title) {?>
							<h2><?php echo esc_html($gallery_title); ?></h2>
						<?php } ?>
                        <?php 
							if ( function_exists( 'eventpress_title_seprator' ) ) :
								eventpress_title_seprator(); 
							endif;	
						?>
						<?php if($gallery_description) {?>
							<p><?php echo esc_html($gallery_description); ?></p>
						<?php } ?>
                    </div>
                </div>
            </div>

            <div class="photo-gallery">
                <div class="row">
					<?php
						if ( ! empty( $gallery_img_setting ) ) {
						$allowed_html = array(
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'b'      => array(),
						'i'      => array(),
						);
						$gallery_img_setting = json_decode( $gallery_img_setting );
						foreach ( $gallery_img_setting as $gallery_item ) {
						$image = ! empty( $gallery_item->image_url ) ? apply_filters( 'eventpress_translate_single_string', $gallery_item->image_url, 'Gallery section' ) : '';
					?>
                    <div class="col-lg-3 col-md-4 col-sm-6 gallery-load">
                        <div class="gallery-item">
                            <a href="<?php echo esc_url( $image ); ?>" class="gallerypopup"> 
                               <?php if ( ! empty( $image ) ) : ?>
									<img src="<?php echo esc_url( $image ); ?>" <?php if ( ! empty( $title ) ) : ?> alt="<?php echo esc_attr( $title ); ?>" title="<?php echo esc_attr( $title ); ?>" <?php endif; ?> />
								<?php endif; ?>
                                <div class="overlay"></div>
                            </a>
                        </div>
                    </div>
					<?php 
				} } 
				?>
                </div>
            </div>
        </div>
    </section>

    <!--===================== 
        End: Photo Gallery
     =====================-->

		<?php } }
endif;
if ( function_exists( 'evento_eventpress_gallery' ) ) {
$section_priority = apply_filters( 'eventpress_section_priority', 14, 'evento_eventpress_gallery' );
add_action( 'eventpress_sections', 'evento_eventpress_gallery', absint( $section_priority ) );
} 