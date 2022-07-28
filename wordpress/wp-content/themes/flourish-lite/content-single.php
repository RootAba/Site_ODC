<?php
/**
 * @package Flourish Lite
 */
?>
<div class="recentpost_mystyle">
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
 		   
    <header class="entry-header">
        <?php the_title( '<h3 class="single-title">', '</h3>' ); ?>
    </header><!-- .entry-header -->    
     <div class="blog_postmeta">
            <div class="post-date"> <i class="far fa-clock"></i> <?php echo get_the_date(); ?></div><!-- post-date --> 
             <?php if( get_theme_mod( 'flourish_lite_hide_postcategory' ) == '') { ?> 
                   <span class="blogpost_cat"> <i class="far fa-folder-open"></i> <?php the_category( __( ', ', 'flourish-lite' ));?></span>
              <?php } ?>                   
    </div><!-- .blog_postmeta --> 

    <div class="entry-content">		
        <?php the_content(); ?>
        <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'flourish-lite' ),
            'after'  => '</div>',
        ) );
        ?>
        <div class="postmeta">          
            <div class="post-tags"><?php the_tags(); ?> </div>
            <div class="clear"></div>
        </div><!-- postmeta -->
    </div><!-- .entry-content -->
   
    <footer class="entry-meta">
      <?php edit_post_link( __( 'Edit', 'flourish-lite' ), '<span class="edit-link">', '</span>' ); ?>
    </footer><!-- .entry-meta -->

</article>
</div><!-- .recentpost_mystyle-->