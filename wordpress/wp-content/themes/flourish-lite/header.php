<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Flourish Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#content_holder">
<?php esc_html_e( 'Skip to content', 'flourish-lite' ); ?>
</a>
<?php
$flourish_lite_show_ht_contactinfo_sections 	= esc_attr( get_theme_mod('flourish_lite_show_ht_contactinfo_sections', false) );
$flourish_lite_show_home_slider_section 	  	= esc_attr( get_theme_mod('flourish_lite_show_home_slider_section', false) );
$flourish_lite_show_threebox_services_sections 	= esc_attr( get_theme_mod('flourish_lite_show_threebox_services_sections', false) );
$flourish_lite_show_whychooseus_sections	    = esc_attr( get_theme_mod('flourish_lite_show_whychooseus_sections', false) );
?>
<div id="sitelayout" <?php if( get_theme_mod( 'flourish_lite_boxlayout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($flourish_lite_show_home_slider_section)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo esc_attr($inner_cls); ?> "> 
  <div class="container">      
      <div class="logo">
           <?php flourish_lite_the_custom_logo(); ?>
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
      </div><!-- logo -->
      
      
    <?php if( $flourish_lite_show_ht_contactinfo_sections != ''){ ?> 
      <div class="cotact_info_area">            
         
		  <?php 
            $flourish_lite_htemailinfo = get_theme_mod('flourish_lite_htemailinfo');
               if( !empty($flourish_lite_htemailinfo) ){ ?> 
               <div class="infobox">
                 <i class="far fa-envelope"></i>
                 <span>
			       <strong><?php esc_html_e('Email Us','flourish-lite'); ?></strong>
                   <a href="<?php echo esc_url('mailto:'.get_theme_mod('flourish_lite_htemailinfo')); ?>">
				   <?php echo esc_html($flourish_lite_htemailinfo); ?></a>
                </span>
              </div>
         <?php } ?>
		 
		 
		 <?php 
            $flourish_lite_site_htphoneinfo = get_theme_mod('flourish_lite_site_htphoneinfo');
               if( !empty($flourish_lite_site_htphoneinfo) ){ ?> 
               <div class="infobox">
                 <i class="fas fa-mobile-alt"></i>
                 <span>
			       <strong><?php esc_html_e('Call Us Now For','flourish-lite'); ?> <div><?php esc_html_e('Enquiry','flourish-lite'); ?></div></strong>                   
                </span>
              </div>
         
               <div class="infobox last">                
                 <span><?php echo esc_html($flourish_lite_site_htphoneinfo); ?></span>
              </div>
         <?php } ?>              
         
       
<div class="sd-menu-search">
    <div class="sd-search">                            
        <form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <input type="search" class="sd-search-input" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'flourish-lite' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
       <!-- <button class="sd-search-button"><i class="fa fa-search"></i></button>-->
        <input type="submit" class="sd-search-button" value="<?php echo esc_attr_x( 'Search', 'submit button', 'flourish-lite' ); ?>">
        </form>
    </div>
</div><!-- .sd-menu-search --> 
         
 </div>
 <?php } ?>  
     

  <div class="clear"></div>     
  </div><!-- .container --> 
  
  <div class="navigation_bar">
    <div class="container">        
         <div class="toggle">
           <a class="toggleMenu" href="#"><?php esc_html_e('Menu','flourish-lite'); ?></a>
         </div><!-- toggle --> 
         <div class="sitenav">                   
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
         </div><!--.sitenav -->
         <div class="clear"></div> 
      </div><!-- .container -->  
   </div><!--.navigation_bar -->
  <div class="clear"></div> 
  
</div><!--.site-header --> 
  
<?php 
if ( is_front_page() && !is_home() ) {
if($flourish_lite_show_home_slider_section != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('flourish_lite_frontslider_selectpagebx'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('flourish_lite_frontslider_selectpagebx'.$i,true));
	  }
	}
?> 
<div class="slider_wrapper">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">         
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
		<?php
        $flourish_lite_frontslider_morebtntext = get_theme_mod('flourish_lite_frontslider_morebtntext');
        if( !empty($flourish_lite_frontslider_morebtntext) ){ ?>
            <a class="slide_morebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($flourish_lite_frontslider_morebtntext); ?></a>
        <?php } ?>                  
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>   
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
 if( $flourish_lite_show_threebox_services_sections != ''){ ?>  
  <div id="threebox_sections">
     <div class="container">        
       <?php 
        for($n=1; $n<=3; $n++) {    
        if( get_theme_mod('flourish_lite_select3page_column'.$n,false)) {      
            $queryvar = new WP_Query('page_id='.absint(get_theme_mod('flourish_lite_select3page_column'.$n,true)) );		
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
            <div class="three_column <?php if($n % 3 == 0) { echo "last_column"; } ?>">                                       
                <?php if(has_post_thumbnail() ) { ?>
                <div class="thumbbx"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>        
                <?php } ?>
                <div class="pagecontent">              	
                  <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                  <?php the_excerpt(); ?>
                  <a class="learnmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','flourish-lite'); ?></a>
                </div>                      
            </div>
            <?php endwhile;
            wp_reset_postdata();                                  
        } } ?>                                 
    <div class="clear"></div>  
   </div><!-- .container -->
</div><!-- #threebox_sections -->              
<?php } ?>



<?php if( $flourish_lite_show_whychooseus_sections != ''){ ?>  
<section id="whychooseus_sections">
<div class="container"> 
<div class="welwrapper">
<?php 
	if( get_theme_mod('flourish_lite_createpagefor_whychooseus',false)) {     
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('flourish_lite_createpagefor_whychooseus',true)) );			
		while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>  		
           <?php if(has_post_thumbnail() ) { ?>
                <div class="welcome_imgbox"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>        
           <?php } ?>           
		  <h3><?php the_title(); ?></h3>   
		 <?php the_content(); ?>	                                    
		<?php endwhile;
		 wp_reset_postdata(); ?>                                    
  <?php } ?>  
</div><!-- .welwrapper -->  
                              
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #whychooseus_sections-->
<?php } ?>
<?php } ?>