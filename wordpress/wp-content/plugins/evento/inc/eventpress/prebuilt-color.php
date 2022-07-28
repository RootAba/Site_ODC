<?php
function eventpress_prebuilt_theme_colors() {
		$theme_color = get_theme_mod('theme_color','#0574f7');
	?>
<style type="text/css">
/* 1st Color = backgrond color */
.sepBg:after,
.hover-effect, .posts-navigation a,
.preloader,
.christ-dropdown li a:hover,
.christ-dropdown > li.focus > a,
.mean-container a.meanmenu-reveal,
.search__area .search__inner form button:hover,
.header-single-slider.slider02 hr,
.header-single-slider.slider02 .hover-effect2:after,
.wedding-person figcaption h4,
.about-social li a,
.about-social li a:hover,
.about-events-text .hover-effect2:after,
.effect-21~.focus-border:before,
.effect-21~.focus-border:after,
.effect-21~.focus-border i:before,
.effect-21~.focus-border i:after,
.footer-social li a:hover,
.organiser-content,
.pagination .nav-links span:hover,
.pagination .nav-links a:hover,
.pagination span.page-numbers.current,
a.next.page-numbers,
a.prev.page-numbers,
.blog-post .meta-info li.post-date a,
.widget-search input[type=button],
.widget_tag_cloud .tagcloud a:hover,
.widget-newsletter input[type=button]:hover,
.coming-soon-wrapper .timer li>div,
.commingsoon-subscribe button,
ul.blogpost-social li a,
ul.blogpost-social li a:hover,
.contact-info .icon,
.form-submit input,
.widget_calendar tbody td a,
.nav-btn,
.ln-img .news-date p,
input[type=submit],
.footer-section .rocket:after,
.comment-metadata a.comment-edit-link,
.reply a,
.header-single-slider a.hover-effect2:after,
.header-single-slider h3:first-child   {
    background: <?php echo esc_attr($theme_color); ?>;
}

/* 1st color = color */
.text-404 h1 span,
.text-404 h2,
.comment-metadata a,
.post-new-comment h4,
.hover-effect2:hover,
.hover-effect2.active,
.header-left i,
.sidenav .close-sidenav,
.cart-remove:hover,
.sidenav .cart-item-description p,
.header-left .header-social i:hover,
.search__area .search__inner .search__close__btn:hover,
.header-single-slider.slider02 h3,
.header-single-slider.slider02 h2,
.header-single-slider.slider02 .hover-effect2,
.header-single-slider.slider02 .hover-effect2.active:hover,
.about-events-text h2,
.about-events-text .hover-effect2,
.about-events-text .hover-effect2.active:hover,
.about-events-text .hover-effect2.watch-more,
.about-events-text .hover-effect2.watch-more:hover,
.timer li span,
.ln-content h4 a:hover,
.ln-content ul li i,
.gift-details .price del,
.single-schedule .time i,
.single-schedule .text h3 a:hover,
.effect-21:focus~label,
.has-content.effect-21~label,
.footer-social li a,
.footer-copyright a,
#breadcrumb-area .breadcrumb-nav li,
.pagination .page-item.next .page-link,
.pagination .page-item.prev .page-link,
.page-s .section-title h2,
.blog-post .post-overlay a:hover,
.single-news .post-overlay a:hover,
.blog-post .meta-info li a:hover,
.blog-post:hover .post-content h4 a,
.blog-post .post-footer a:hover,
.widget-search input[type=button]:hover,
.widget h5, .widget h5 a,
.widget_categories ul li a:hover,
.widget_meta ul li a:hover,
.widget_archive ul li a:hover,
.widget_nav_menu ul li a:hover,
.recent-post h6,
ul.recent-meta-info li a:hover,
.widget-calender .widget-title,
.widget-calender .widget-title .plus a,
.widget-newsletter input[type=button],
.coming-soon-wrapper h1,
.commingsoon-subscribe button:hover,
h5.comment-author a,
#reply-title a,
.site-content a,
code, a.more-link,
.widget ul li a:hover,
.navbar-nav > li.active > a,
.navbar-nav > li > a:hover,
.navbar-nav > li.focus > a,
.blog-post .meta-info .fa {
    color: <?php echo esc_attr($theme_color); ?>;
}

#breadcrumb-area .breadcrumb-nav li.active,
h5.comment-author a,
.nav-btn.hover-effect2:hover,
.header-single-slider.slider01 a.hover-effect2.active:hover,
form[id*=give-form] .give-donation-amount .give-currency-symbol,
.widget_recent_comments li a,
.widget_calendar table caption,
input[type=submit]:hover  {
    color: <?php echo esc_attr($theme_color); ?>;
}

/* 1st color = Border Color */
.header-single-slider.slider02 .hover-effect2 ,
.widget-search input[type=button],
.widget-calender .widget-title .plus,
.widget_calendar tbody td a,
.widget-newsletter input[type=button],
.nav-btn,
.header-single-slider.slider01 a.hover-effect2.active:hover,
.contact-form input[type=submit],
.form-submit input[type=submit],
blockquote.wp-block-quote,
.widget_tag_cloud .tagcloud a,
.widget_search input[type=submit],
.header-single-slider a.hover-effect2.active, .header-single-slider a.hover-effect2:hover  {
    border-color: <?php echo esc_attr($theme_color); ?>;
}

.ln-img .news-date p:before,
.ln-img .news-date p:after,
.timer li>div {
	border-top-color: <?php echo esc_attr($theme_color); ?>;
}


</style>

<?php
} 
add_action('wp_head','eventpress_prebuilt_theme_colors');
?>
