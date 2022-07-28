<?php
function eventpress_pro_own_theme_typography() {
	$hide_show_typography= get_theme_mod('hide_show_typography','off');
	if( $hide_show_typography == '1' ):
	
		$body_typography_font_weight = get_theme_mod('body_typography_font_weight','normal');
		$body_font_size = get_theme_mod('body_font_size','16');
		
		$para_font_weight = get_theme_mod('para_font_weight','normal');
		$paragraph_font_size = get_theme_mod('paragraph_font_size','16');
		$paragraph_line_height = get_theme_mod('paragraph_line_height','26');
		
		$h1_font_weight = get_theme_mod('h1_font_weight','normal');
		$h1_font_size = get_theme_mod('h1_font_size','40');
		$h1_line_height = get_theme_mod('h1_line_height','50');
		$h1_text_transform = get_theme_mod('h1_text_transform','lowercase');
		
		$h2_font_weight = get_theme_mod('h2_font_weight','normal');
		$h2_font_size = get_theme_mod('h2_font_size','36');
		$h2_line_height = get_theme_mod('h2_line_height','46');
		$h2_text_transform = get_theme_mod('h2_text_transform','lowercase');
		
		$h3_font_weight = get_theme_mod('h3_font_weight','normal');
		$h3_font_size = get_theme_mod('h3_font_size','24');
		$h3_line_height = get_theme_mod('h3_line_height','34');
		$h3_text_transform = get_theme_mod('h3_text_transform','lowercase');
		
		$h4_font_weight = get_theme_mod('h4_font_weight','normal');
		$h4_font_size = get_theme_mod('h4_font_size','18');
		$h4_line_height = get_theme_mod('h4_line_height','28');
		$h4_text_transform = get_theme_mod('h4_text_transform','lowercase');
		
		$h5_font_weight = get_theme_mod('h5_font_weight','normal');
		$h5_font_size = get_theme_mod('h5_font_size','16');
		$h5_line_height = get_theme_mod('h5_line_height','15');
		$h5_text_transform = get_theme_mod('h5_text_transform','lowercase');
		
		$h6_font_weight = get_theme_mod('h6_font_weight','normal');
		$h6_font_size = get_theme_mod('h6_font_size','16');
		$h6_line_height = get_theme_mod('h6_line_height','26');
		$h6_text_transform = get_theme_mod('h6_text_transform','lowercase');
		
		$menu_font_weight = get_theme_mod('menu_font_weight','normal');
		$menu_font_size = get_theme_mod('menu_font_size','16');
		$menu_text_transform = get_theme_mod('menu_text_transform','capitalize');
		
		$section_tit_font_weight = get_theme_mod('section_tit_font_weight','normal');
		$section_tit_font_size = get_theme_mod('section_tit_font_size','36');
		
		$section_des_font_weight = get_theme_mod('section_des_font_weight','normal');
		$section_desc_font_size = get_theme_mod('section_desc_font_size','16');
	?>
<style type="text/css">
body {
    font-weight: 400;
    font-size: <?php echo $body_font_size; ?>px;
	font-style: <?php echo $body_typography_font_weight; ?>;
}

p{
    font-size: <?php echo $paragraph_font_size; ?>px;
	font-style: <?php echo $para_font_weight; ?>;
	line-height :<?php echo $paragraph_line_height; ?>px;
}

h1 {
    font-size: <?php echo $h1_font_size; ?>px;
    line-height:<?php echo $h1_line_height; ?>px;
	text-transform:   <?php echo $h1_text_transform; ?>;
	font-style: <?php echo $h1_font_weight; ?>;
}

h2 {
    font-size: <?php echo $h2_font_size; ?>px;
    line-height:<?php echo $h2_line_height; ?>px;
    font-weight: 400;
	text-transform:   <?php echo $h2_text_transform; ?>;
	font-style: <?php echo $h2_font_weight; ?>;
}

h3 {
    font-size: <?php echo $h3_font_size; ?>px;
     line-height: <?php echo $h3_line_height; ?>px;
	 text-transform: <?php echo $h3_text_transform; ?>;
	 font-style: <?php echo $h3_font_weight; ?>;
}
h4 {
    font-size: <?php echo $h4_font_size; ?>px;
     line-height: <?php echo $h4_line_height; ?>px;
	 text-transform:<?php echo $h4_text_transform; ?>;
	 font-style: <?php echo $h4_font_weight; ?>;
}

h5 {
    font-size: <?php echo $h5_font_size; ?>px;
     line-height: <?php echo $h5_line_height; ?>px;
	 text-transform: <?php echo $h5_text_transform; ?>;
	 font-style: <?php echo $h5_font_weight; ?>;
}

h6 {
    font-size: <?php echo $h6_font_size; ?>px;
     line-height: <?php echo $h6_line_height; ?>px;
	 text-transform: <?php echo $h6_text_transform; ?>;
	 font-style: <?php echo $h6_font_weight; ?>;
}

.boxed-btn {
    font-size: 16px;
    font-weight: 400;
    text-transform: uppercase;
}

.hover-effect {
    font-size: 16px;
}

.hover-effect2 {
    text-transform: uppercase;
    font-weight: 400;
    font-size: 16px;
}

.preloader .bokeh {
    font-size: 100px;
}

#header-top {
    font-weight: 700;
    font-size: 14px;
}

#close-btn {
    font-size: 30px;
}

.popup-content h3 {
    font-size: 34px;
}

.navbar-nav li a {
     font-size: <?php echo $menu_font_size; ?>px !important;
    font-family: "Fira Sans";
	font-style: <?php echo $menu_font_weight; ?>;
	text-transform: <?php echo $menu_text_transform; ?>;
    font-weight: 600;
}
.section-title h2 {
	font-style: <?php echo $section_tit_font_weight; ?>;
	font-size:<?php echo $section_tit_font_size; ?>px;
}
.section-title p {
	font-style: <?php echo $section_des_font_weight; ?>;
	font-size:<?php echo $section_desc_font_size; ?>px;
	line-height: normal;
}
.cart-remove {
    font-size: 14px;
}

.cart-item-description h4.cart-item-name {
    font-size: 16px;
    font-weight: 600;
}

.sidenav .cart-item-description p {
    font-size: 14px;
}

.sidenav.active .cart-item {
    font-size: 0;
}

.sub-total h6 {
     font-size: <?php echo $h6_font_size; ?>px;
	 line-height: <?php echo $h6_line_height; ?>px;
	 text-transform: <?php echo $h6_text_transform; ?>;
	 font-style: <?php echo $h6_font_weight; ?>;
     font-weight: 700;
}

.search__area .search__inner form input {
    font-size: 25px;
}

.search__area .search__inner form button {
    line-height: 60px;
    font-size: 25px;
}

.search__area .search__inner .search__close__btn {
    font-size: 30px;
    line-height: 58px;
}

.header-slider h1,
.header-slider h2 {
    font-family: "Fira Sans";
}

.header-single-slider h1 {
    font-size: 60px;
    line-height: 80px;
}

.header-single-slider h3 {
    font-family: "Fira Sans";
    font-size: 30px;
    font-weight: 400;
}

.header-single-slider h2 {
    font-size: 60px;
    font-weight: 700;
    line-height: 70px;
}

.wedding-person figcaption h4 {
    font-size: 24px;
}

.wedding-person h3 {
    font-size: 28px;
    font-weight: 700;
}

.about-social li a {
    font-size: 10px;
    line-height: 27px;
}

.about-events-text h2 {
    font-size: 32px;
    font-weight: 700;
}

.about-events-text .hover-effect2 {
    font-weight: 700;
}

.about-events-text .hover-effect2.watch-more {
    font-size: 16px;
    font-weight: 700;
}

.timer li {
    font-size: 32px;
    font-weight: 700;
}

.timer li span {
    font-size: 60px;
    line-height: 0.2;
}

.donate-form .input-group-text {
    font-weight: 700;
}

input[type="text"].dollar::-webkit-input-placeholder {
    font-weight: 700;
}

.payment-dmethod p {
    font-weight: 700;
    font-size: 16px;
}

.ln-img .news-date p {
    font-size: 16px;
    font-weight: 700;
}

.ln-content h4 {
    font-size: 16px;
    font-weight: 700;
}

.ln-content ul li {
    font-size: 13px;
}

.gift-details h4 {
    font-size: 18px;
    font-weight: 700;
}

.gift-details .price {
    font-size: 20px;
    font-weight: 700;
     font-family: "Fira Sans";
}

.sale {
    font-size: 10px;
    text-transform: uppercase;
    font-weight: 700;
}

.gift-item .hover-effect {
    text-transform: uppercase;
}

.schedule-tab-sorting li a {
    font-size: 16px;
}

.single-schedule .date {
    font-size: 20px;
    font-weight: 600;
}

.single-schedule .text h3 a {
    font-size: 24px;
}

.effect-21:focus~label,
.has-content.effect-21~label {
    font-size: 12px;
}

.footer-section .thanks {
    font-family: 'Dancing Script', cursive;
    font-size: 76px;
    font-weight: 700;
}

.contact-info .icon {
    font-size: 50px;
}

.contact-info h4 {
    font-size: 24px;
}

.footer-social li a {
    font-size: 10px;
}

.footer-copyright {
    font-size: 16px;
}

#breadcrumb-area h2 {
    font-size: 36px;
    line-height: 30px;
    font-weight: 700;
}

#breadcrumb-area .breadcrumb-nav li {
    font-size: 20px;
}

#breadcrumb-area .breadcrumb-nav li:after {
    font-size: 15px;
}

.single-organiser ul li a {
    font-size: 16px;
}

.organiser-content h4 {
    font-size: 16px;
    font-family: "Fira Sans";
}

.pagination li a {
    font-size: 15px;
}

.pagination .page-item.active .page-link {
    font-weight: 700;
}

.blog-post .post-overlay {
    font-size: 24px;
}

.blog-post .meta-info {
    font-size: 12px;
}

.blog-post .meta-info li.post-date a {
    font-weight: 700;
}

.blog-post .meta-info li a {
   font-family: "Fira Sans";
    font-weight: 700;
}

.blog-post .post-content h4 {
    font-size: 18px;
    font-weight: 700;
}

.blog-post .post-footer a {
    font-size: 13px;
    font-weight: 700;
}

.blog-post .post-footer a.share {
    font-weight: 400;
    letter-spacing: 1.2px;
    text-transform: uppercase;
}

.widget h5 {
    font-size: 18px;
    font-weight: 700;
    line-height: 1;
   font-family: "Fira Sans";
}

.widget_categories ul li a {
   font-family: "Fira Sans";
    font-size: 16px;
    font-weight: 400;
}

.recent-post h6 {
    font-weight: 700;
}

.recent-post p {
    font-size: 12px;
    font-weight: 500;
    line-height: 22px;
}

ul.recent-meta-info li {
    font-size: 12px;
}

ul.recent-meta-info li a {
    font-size: 12px;
}

.widget_calender .widget-title {
    font-size: 18px;
    font-weight: 700;
    font-family: "Fira Sans";
}

.weekdays li {
    font-size: 14px;
    font-weight: 700;
}

.days li {
    font-size: 14px;
}

.blog-post.masonary-post .post-content h4 {
    font-size: 16px;
}

.blog-post.masonary-post .post-content p {
    font-size: 14px;
}

.coming-soon-wrapper h1 {
    font-size: 50px;
    font-weight: 700;
}

.post-author h5 a {
    font-size: 16px;
    font-weight: 700;
}

ul.blogpost-social li a {
    font-size: 10px;
    line-height: 27px;
}

.post-new-comment h4 {
    font-size: 16px;
    font-weight: 700;
}

.post-new-comment p {
    font-size: 14px;
}

#page-404 h3 {
    font-size: 50px;
    font-weight: 700;
}
</style>

<?php endif;
} 
add_action('wp_head','eventpress_pro_own_theme_typography');
?>
