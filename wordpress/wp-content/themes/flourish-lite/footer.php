<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Flourish Lite
 */
 
$flourish_lite_show_footer_social_sections        = esc_attr( get_theme_mod('flourish_lite_show_footer_social_sections', false) ); 
?>

<div class="site-footer">
           <div class="container fixfooter">           
          <?php if ( is_active_sidebar( 'footer-widget-column-1' ) ) : ?>
                <div class="widget-column-1">  
                    <?php dynamic_sidebar( 'footer-widget-column-1' ); ?>
                </div>
           <?php endif; ?>
          
          <?php if ( is_active_sidebar( 'footer-widget-column-2' ) ) : ?>
                <div class="widget-column-2">  
                    <?php dynamic_sidebar( 'footer-widget-column-2' ); ?>
                </div>
           <?php endif; ?>
           
           <?php if ( is_active_sidebar( 'footer-widget-column-3' ) ) : ?>
                <div class="widget-column-3">  
                    <?php dynamic_sidebar( 'footer-widget-column-3' ); ?>
                </div>
           <?php endif; ?> 
           
           <?php if ( is_active_sidebar( 'footer-widget-column-4' ) ) : ?>
                <div class="widget-column-4">  
                    <?php dynamic_sidebar( 'footer-widget-column-4' ); ?>
                </div>
           <?php endif; ?>          
           
           <div class="clear"></div>
      </div><!--end .container-->            

        <div class="copyrigh-wrapper"> 
            <div class="container">
                <div class="powerby">
				   <?php bloginfo('name'); ?> - <?php esc_html_e('Theme by Grace Themes','flourish-lite'); ?>  
                </div>
                <?php if( $flourish_lite_show_footer_social_sections != ''){ ?>                         	
                <div class="design-by">
                    <div class="hdr_social">                                                
					   <?php $flourish_lite_hdrfb_link = get_theme_mod('flourish_lite_hdrfb_link');
                        if( !empty($flourish_lite_hdrfb_link) ){ ?>
                        <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($flourish_lite_hdrfb_link); ?>"></a>
                       <?php } ?>
                    
                       <?php $flourish_lite_hdrtwitt_link = get_theme_mod('flourish_lite_hdrtwitt_link');
                        if( !empty($flourish_lite_hdrtwitt_link) ){ ?>
                        <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($flourish_lite_hdrtwitt_link); ?>"></a>
                       <?php } ?>
                
                      <?php $flourish_lite_hdrgplus_link = get_theme_mod('flourish_lite_hdrgplus_link');
                        if( !empty($flourish_lite_hdrgplus_link) ){ ?>
                        <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($flourish_lite_hdrgplus_link); ?>"></a>
                      <?php }?>
                
                      <?php $flourish_lite_hdrlinked_link = get_theme_mod('flourish_lite_hdrlinked_link');
                        if( !empty($flourish_lite_hdrlinked_link) ){ ?>
                        <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($flourish_lite_hdrlinked_link); ?>"></a>
                      <?php } ?>                  
                   </div><!--end .hdr_social-->   
                </div>        
             <?php } ?>                
                <div class="clear"></div>                                
             </div><!--end .container-->             
        </div><!--end .copyrigh-wrapper-->                       
     </div><!--end #site-footer-->
</div><!--#end sitelayout-->
<?php wp_footer(); ?>
</body>
</html>