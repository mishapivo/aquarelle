<?php

/**
 * Lets add some custom styles to our page and load them into the <head> area.
 * These styles are determined by the theme customizer settings you make changes to.
 * You should not have to edit these but can be overridden with custom css.
 * If your styles do not change, then use !important;
 */

function seasonal_css() {
?>
<style type="text/css">
	a, a:visited {color: <?php echo esc_attr(get_theme_mod( 'link_colour', '#7599c5' ) ); ?>;}
	a:hover,a:focus,a:active {color: <?php echo esc_attr(get_theme_mod( 'link_colour_hover', '#424242' ) ); ?>;}
	.site-title a {color: <?php echo esc_attr(get_theme_mod( 'site_title', '#ffffff' ) ); ?>;}
	.site-description {color: <?php echo esc_attr(get_theme_mod( 'site_tagline', '#ffffff' ) ); ?>;}
	.social a {background-color: <?php echo esc_attr(get_theme_mod( 'social_bg', '' ) ); ?>; color: <?php echo esc_attr(get_theme_mod( 'social_icon', '#ffffff' ) ); ?>; }
	.social a:hover {background-color: <?php echo esc_attr(get_theme_mod( 'social_bg_hover', '' )); ?>; color: <?php echo esc_attr(get_theme_mod( 'social_icon_hover', '#cccccc' )); ?>;}
	.toggle-button {color: <?php echo esc_attr(get_theme_mod( 'toggle_label', '#e7e7e7' ) ); ?>; border-color: <?php echo esc_attr(get_theme_mod( 'toggle_border', '#d7d7d7' ) ); ?>;	}
	.toggle-button:hover {color: <?php echo esc_attr(get_theme_mod( 'toggle_label_hover', '#ffffff' ) ); ?>; border-color: <?php echo esc_attr(get_theme_mod( 'toggle_border_hover', '#ffffff' ) ); ?>;}	
	.btn,button,input[type="submit"],input[type="reset"] {background-color: <?php echo esc_attr(get_theme_mod( 'button_bg_colour', '#838588' ) ); ?>; color: <?php echo esc_attr(get_theme_mod( 'button_text_colour', '#ffffff' ) ); ?>;}
	.btn:hover,button:hover,input[type="submit"]:hover,input[type="reset"]:hover {background-color: <?php echo esc_attr(get_theme_mod( 'button_bg_on_hover', '#6a6c6f' ) ); ?>; color: <?php echo esc_attr(get_theme_mod( 'button_text_on_hover', '#ffffff' ) ); ?>;}		
	h1, h2, h3, h4, h5, h6, .entry-title a {color: <?php echo esc_attr(get_theme_mod( 'heading_colour', '#424242' ) ); ?>;}
	.subtitle {color: <?php echo esc_attr(get_theme_mod( 'subtitle_colour', '#222222' ) ); ?>;}	
	.pagination .page-numbers {color: <?php echo esc_attr(get_theme_mod( 'pagination_text', '#7599c5' ) ); ?>;background-color: <?php echo esc_attr(get_theme_mod( 'pagination_bg', '#f5f5f5' ) ); ?>;}
	.pagination .page-numbers:hover,.pagination .page-numbers.current {color: <?php echo esc_attr(get_theme_mod( 'pagination_current_text_color', '#ffffff' ) ); ?>; background-color: <?php echo esc_attr(get_theme_mod( 'pagination_current_background', '#94a3b6' ) ); ?>;}
	.primary-navigation .nav-menu li a,.primary-navigation .menu-item-has-children > a:after,.primary-navigation .menu-item-has-children > a:hover:after,.primary-navigation li.home.current-menu-item a, .site-navigation a {color: <?php echo esc_attr(get_theme_mod( 'menu_link_colour', '#ffffff' ) ); ?>;}
	.site-navigation li.current_page_item a,.primary-navigation li.current-menu-item a, .primary-navigation a:hover, .primary-navigation .sub-menu a:hover,.primary-navigation .nav-menu > li > a:hover {color: <?php echo esc_attr(get_theme_mod( 'menu_link_hover_colour', '#d1c4a5' ) ); ?>;}
		
	<?php $blogalign = esc_attr(get_theme_mod( 'blog_alignment', 'left' ) );            
        switch ($blogalign) {
		    // Centered
            case "center" :
                echo '.more-link:before {margin: 20px auto;}';
				echo '.wp-post-image {margin: 20px auto 30px;}';
				echo '.category-header, .category-description,.search-results .page-header, #colophon, .page.page-template-template-centered #colophon, .page-links,.page #colophon,.hentry,.archive .page-header, .format-aside p {text-align:center;}';
            break;
			// Left
            case "left" :
                echo '.more-link:before {margin: 20px 0;}';
				echo '.wp-post-image {margin: 20px 0 30px;}';
				echo '.format-quote blockquote {margin-left:0;';
				echo '.search-results .page-header, .page-links,.hentry,.archive .page-header, .format-aside p {text-align: left;}';
            break;			
		}
	?>
	
@media (min-width: 1025px) {
	.sidebar {width: <?php echo esc_html(get_theme_mod( 'sidebar_width', '33' ) ); ?>%;}
	.site-content,	.secondary {margin-left: <?php echo esc_html(get_theme_mod( 'sidebar_width', '33' ) ); ?>%;}
}
	
@media (min-width: 1200px) {		
	<?php if( esc_attr(get_theme_mod( 'content_width', 1 ) ) ) {
		echo '.hentry {max-width: 100%;}'; 
		}	
	?>	
}


	


	
</style>
<?php
}
add_action( 'wp_head', 'seasonal_css');