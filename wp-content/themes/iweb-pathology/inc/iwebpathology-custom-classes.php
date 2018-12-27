<?php
/**
 *
 * @package IWeb_Pathology
 */


function iwebpath_bg_custom_css() {
		?>
	<style type="text/css">
		<?php $iweb_header_img = get_header_image();?>
		<?php if ( null != $iweb_header_img ) : ?>
				.fullwidth
			 {background-image: linear-gradient( rgba(0,0,0,.6), rgba(0,0,0,.6) ), url( <?php echo esc_url( get_theme_mod( header_image() ) );?>) ;}
		<?php else : ?>
				.fullwidth
			{background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'iwebpatho_testprofile_img' ) == null ) :?>
		.iwebpatho_testpf {
			background: url(<?php echo esc_url( get_template_directory_uri() ); ?>/img/no_image.jpg) top left no-repeat ;}
		<?php else : ?>
		.iwebpatho_testpf {
			background: url(<?php echo esc_url( get_theme_mod( 'iwebpatho_testprofile_img' ) );?>) top left no-repeat ;}
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'iwebpatho_tmonials_bgimg' ) == null ) :?>
		.iwebpatho-tmonial-slider {
			background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?> ;}
		<?php else : ?>
		.iwebpatho-tmonial-slider {
			background-image: linear-gradient( rgba(0,0,0,.7), rgba(0,0,0,.7) ), url(<?php echo esc_url( get_theme_mod( 'iwebpatho_tmonials_bgimg' ) ); ?>) ;}
		<?php endif; ?>  
		
		<?php if ( get_theme_mod( 'iwebpatho_footer_bgimg' ) != null ) :?>
		 #footer-sidebar-w {
			background-image: linear-gradient( rgba(0,0,0,.8), rgba(0,0,0,.8) ), url(<?php echo esc_url( get_theme_mod( 'iwebpatho_footer_bgimg' ) ); ?>) ;}
		<?php endif; ?>
	</style>
<?php  }
add_action( 'wp_head','iwebpath_bg_custom_css' );

function iwebunq_themecolor1_custom_css() {
		?>
	<style type="text/css">
			.post-thumbnail img, .unq-button:hover, .topbarbut, #footer-sidebar .widget h2
		{border-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}
		
			.fixed-header 
		{border-bottom-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}
		
			a:hover, .site-info a:hover, .breadcrumb a, .unq-button:hover, .topbarsocial-b .fa:hover,
			.ppost span, .npost span
		{color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}
		
			.unq-button, #topBtn
		{background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}        
		
			button, 
			input[type="button"],
			input[type="reset"],
			input[type="submit"] {
		background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;
		border-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}

	@media screen and (min-width: 968px) {
		
		.search-form input[type="submit"], .form-submit input[type="submit"],
		.main-navigation ul li:hover > a, .main-navigation li ul li a:hover, .main-navigation li ul li a:focus
			{background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}
		.ppost span, .npost span {
			color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}
		
		}
		
	@media screen and (max-width: 967px) {
		 
		.search-submit, .form-submit input[type="submit"] {
			background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?> ;}
		.main-navigation a:hover, .main-navigation a:focus, .main-navigation li ul li a:hover,
		.main-navigation li ul li a:focus {
			color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?> ;}
	 }
	</style>
<?php  }

add_action( 'wp_head','iwebunq_themecolor1_custom_css' );


function iwepatho_themecolor_main_custom_css() {
?>
	<style type="text/css">
		
		h3.abtus-a-h3, .h2hover:hover, .iwebpatho-ourdoc-a2 .fa:hover, h1.testpf-b-h3, .isec8a1h3, .iweb-patho-mtitle
	{color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}
		
		.iwebpath-pckg-a1, .iwebpath-pckg-a3, .iwebpath-pckgpg-a1, .iwebpatho-ourdoc-a1-box,
		.iwebpatho_latnews-b1-box, .iweb-patho-isection3, .patho-button, p#tmonialsp::after, .iwebpatho-active
	{background-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?> ;}    

		.iwebpatho_testpf-b1 img, .iweb-patho-isection8-b1 img, .iwebpatho-tmonial-islides-a img
	{border-color: <?php echo esc_attr( get_theme_mod( 'iweb_theme_color','#00bd86' ) ); ?>;}
		
	<?php if ( get_theme_mod( 'iwebpatho_display_package','1' ) === '1' ) :?>  
		.iwebpath-abtus {background-color: #fff;}
	<?php else : ?>    
		.iwebpath-abtus {background-color: #f7f7f7;}
	<?php endif; ?>    
		
	</style>
<?php  }

add_action( 'wp_head','iwepatho_themecolor_main_custom_css' );

