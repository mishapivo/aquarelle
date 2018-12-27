<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function oxane_custom_css_mods() {

	echo "<style id='custom-css-mods'>";
	
	//If Highlighting Nav active item is disabled
	if ( get_theme_mod('oxane_disable_active_nav') ) :
		echo "#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a { border:none; background: inherit; }"; 
	endif;
	
	//If Title and Desc is set to Show Below the Logo
	if (  get_theme_mod('oxane_branding_below_logo') ) :
		
		echo "#masthead #text-title-desc { display: block; clear: both; } ";
		
	endif;
	
	//If Logo is Centered
	if ( get_theme_mod('oxane_center_logo') ) :
		
		echo "#masthead #text-title-desc, #masthead #site-logo { float: none; } .site-branding { text-align: center; } #text-title-desc { display: inline-block; }";
		
	endif;
	
	//Exception: When Logo is Centered, and Title Not Set to display in next line.
	if ( get_theme_mod('oxane_center_logo') && !get_theme_mod('oxane_branding_below_logo') ) :
		echo ".site-branding #text-title-desc { text-align: left; }";
	endif;
	
	//Exception: When Logo is centered, but there is no logo.
	if ( get_theme_mod('oxane_center_logo') && !get_theme_mod('oxane_logo') ) :
		echo ".site-branding #text-title-desc { text-align: center; }";
	endif;
	
	//Exception: IMage transform origin should be left on Left Alignment, i.e. Default
	if ( !get_theme_mod('oxane_center_logo') ) :
		echo "#masthead #site-logo img { transform-origin: left; }";
	endif;	
	
	
	//Modify Menu bars, if header image has been set
	if ( get_header_image() ) :
		//echo "#site-navigation { background: ".oxane_fade("#f4f4f4", 0.9)."; }";
	endif;
	
	if ( get_background_color() ) {
		echo "#social-search .searchform:before { border-left-color: #".get_background_color()." }";
		echo "#social-search .searchform, #social-search .searchform:after { background: #".get_background_color()." }";
	}
	
	if ( get_theme_mod('oxane_title_font','HIND') ) :
		echo ".title-font, h1, h2 { font-family: ".esc_html(get_theme_mod('oxane_title_font'))."; }";
	endif;
	
	if ( get_theme_mod('oxane_body_font','Open Sans') ) :
		echo "body { font-family: ".esc_html(get_theme_mod('oxane_body_font'))."; }";
	endif;
	
	if ( get_theme_mod('oxane_site_titlecolor') ) :
		echo ".site-title a { color: ".esc_html(get_theme_mod('oxane_site_titlecolor', '#000'))."; }";
	endif;
	
	
	if ( get_theme_mod('oxane_header_desccolor','#000') ) :
		echo ".site-description { color: ".esc_html(get_theme_mod('oxane_header_desccolor','#000'))."; }";
	endif;
	
	if ( get_theme_mod('oxane_custom_css') ) :
		echo  esc_html(get_theme_mod('oxane_custom_css'));
	endif;
	
	
	if ( get_theme_mod('oxane_hide_title_tagline') ) :
		echo "#masthead .site-branding #text-title-desc { display: none; }";
	endif;
	
	if ( get_theme_mod('oxane_logo_resize') ) :
		$val = esc_html(get_theme_mod('oxane_logo_resize'))/100;
		echo "#masthead #site-logo img { transform: scale(".$val."); -webkit-transform: scale(".$val."); -moz-transform: scale(".$val."); -ms-transform: scale(".$val."); }";
		endif;

	echo "</style>";
}

add_action('wp_head', 'oxane_custom_css_mods');