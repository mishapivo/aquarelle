<?php
//about theme info
add_action( 'admin_menu', 'mega_construction_gettingstarted' );
function mega_construction_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'mega-construction'), esc_html__('Get Started', 'mega-construction'), 'edit_theme_options', 'mega_construction_guide', 'mega_construction_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function mega_construction_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'mega_construction_admin_theme_style');

//guidline for about theme
function mega_construction_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'mega-construction' );
?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to The Construction Wordpress Theme', 'mega-construction' ); ?></h3>
		</div>
		<div class="color_bg_blue">
			<p>Version: <?php echo esc_html($theme['Version']);?></p>
				<p class="intro_version"><?php esc_html_e( 'Congratulations! You are about to use the most easy to use and felxible WordPress theme.', 'mega-construction' ); ?></p>
				<div class="blink">
					<h4><?php esc_html_e( 'Theme Created By Themesglance', 'mega-construction' ); ?></h4>
				</div>
			<div class="intro-text"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/themesglance-logo.png" alt="" /></div>
			<div class="coupon-code"><?php esc_html_e( 'Get', 'mega-construction' ); ?> <span><?php esc_html_e( '20% off', 'mega-construction' ); ?></span> <?php esc_html_e( 'on Premium Theme with the discount code: ', 'mega-construction' ); ?> <span><?php esc_html_e( '" TGYear2018 "', 'mega-construction' ); ?></span></div>
		</div>
		<div class="started">
			<h3><?php esc_html_e( 'Lite Theme Info', 'mega-construction' ); ?></h3>
			<p><?php esc_html_e( 'Mega Construction WordPress themes are designed specially to showcase all the real estate solutions and services such as quality construction, property dealers, real estate agents, real estate brokers, repair, architecture, renovation etc. to the targeted audiences. From catering the basic to advanced requirements of builders and contractors, Mega Construction WordPress theme is capable enough to make website professional and attractive over a click. The theme is well-equipped with all the functions and functionalities and it allows handling properties, agents, and agencies effectively. Themes by Themesglance.com are simple and adaptable. Due to optimized codes, it has faster page load time; it is responsive and absolutely user-friendly and flexible to streamline the construction website in an appropriate way. From creating a portfolio, showcasing projects and services to publishing the most recent news and blog; this stunning and interactive theme allows to do it all. This multipurpose, mobile-friendly theme is SEO friendly and gives authority to share content over the social media platforms in easiest possible ways. Although the theme has been designed especially for architects and construction professional it works absolutely amazing for other business websites too.', 'mega-construction')?></p>
			<hr>
			<h3><?php esc_html_e( 'Help Docs', 'mega-construction' ); ?></h3>
			<ul>
				<p><?php esc_html_e( 'The Construction Theme', 'mega-construction' ); ?> <a href="<?php echo esc_url( MEGA_CONSTRUCTION_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'mega-construction' ); ?></a></p>
			</ul>
			<hr>
			<h3><?php esc_html_e( 'Get started with Construction Theme', 'mega-construction' ); ?></h3>
			<div class="col-left-inner"> 
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
			<div class="col-right-inner">
				<p><?php esc_html_e( 'Go to', 'mega-construction' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'mega-construction' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'mega-construction' ); ?></p>
				<ul>
					<li><?php esc_html_e( 'Easily customizable ', 'mega-construction' ); ?> </li>
					<li><?php esc_html_e( 'Absolutely free', 'mega-construction' ); ?> </li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'mega-construction'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/responsive-tg.png" alt="" />
			<hr class="firsthr">
			<a href="<?php echo esc_url( MEGA_CONSTRUCTION_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'mega-construction'); ?></a>
			<a href="<?php echo esc_url( MEGA_CONSTRUCTION_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'mega-construction'); ?></a>
			<a href="<?php echo esc_url( MEGA_CONSTRUCTION_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'mega-construction'); ?></a>
			<hr class="secondhr">
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'mega-construction'); ?></h3>
		<ul>
		 	<li><?php esc_html_e( 'Sticky Header', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Custom post types', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Responsive Design', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( '100+ Font Family Options', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'RTL & Translation Ready', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Support to Add Custom CSS/JS', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'SEO Friendly', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Pagination Option', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Footer Customization Options', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Short Codes', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Services listing', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Multiple Inner Page Templates', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Customizable Home Page', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Advance Social Media Feature', 'mega-construction'); ?></li>
		 	<li><?php esc_html_e( 'Testimonials Listing', 'mega-construction'); ?></li>
		</ul>
	</div>
	<div class="service">
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-media-document"></span> <?php esc_html_e('Get Support', 'mega-construction'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( MEGA_CONSTRUCTION_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'mega-construction'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-welcome-widgets-menus"></span> <?php esc_html_e('Getting Started', 'mega-construction'); ?></h3>
			<ol>
				<li> <?php esc_html_e('Start', 'mega-construction'); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'mega-construction'); ?></a> <?php esc_html_e('your website.', 'mega-construction'); ?></li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e('Rate This Theme', 'mega-construction'); ?></h3>
			<ol>
				<li>
				<a href="<?php echo esc_url( MEGA_CONSTRUCTION_REVIEW ); ?>" target="_blank"><?php esc_html_e('Rate it here', 'mega-construction'); ?></a>
				</li>
			</ol>
		</div>
		<div class="col-md-3">
			<h3><span class="dashicons dashicons-editor-help"></span> <?php esc_html_e( 'Help Docs', 'mega-construction' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'The Mega Construction Lite', 'mega-construction' ); ?> <a href="<?php echo esc_url( MEGA_CONSTRUCTION_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'mega-construction' ); ?></a></li>
			</ol>
		</div>
	</div>
</div>
<?php } ?>