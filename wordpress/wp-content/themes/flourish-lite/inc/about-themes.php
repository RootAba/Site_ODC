<?php
/**
 *flourish-lite About Theme
 *
 * @package Flourish Lite
 */

//about theme info
add_action( 'admin_menu', 'flourish_lite_abouttheme' );
function flourish_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'flourish-lite'), __('About Theme Info', 'flourish-lite'), 'edit_theme_options', 'flourish_lite_guide', 'flourish_lite_mostrar_guide');   
} 

//Info of the theme
function flourish_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'flourish-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('flourish-lite is a free furniture shop WordPress theme specially designed for interior design, architecture, furniture shop, decor, remodeling and renovation services, construction and any other related businesses. It is a multi-purpose WordPress template that comes with elegant and attractive home styles and is a perfect platform for building a professional interior design or furniture shop website. This clean, minimal and modern theme can be used for personal blog, portfolio, digital photography, designing company, creative agency, travel and tourism, adventure, resort, healthcare, education, gym and fitness, retail, yoga, fashion and beauty, food and restaurant, even church and also for charity.', 'flourish-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'flourish-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'flourish-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'flourish-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'flourish-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'flourish-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'flourish-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'flourish-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'flourish-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'flourish-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">  
    <a href="http://www.gracethemesdemo.com/documentation/flourish/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'flourish-lite'); ?></a>      
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>