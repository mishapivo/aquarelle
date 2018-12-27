<?php
/**
 * Add the about page under appearance.
 *
 * Display the details about the theme information
 *
 * @package euphoric
 */
?>
<?php
// About Information
add_action( 'admin_menu', 'euphoric_about' );
function euphoric_about() {    	
	add_theme_page( esc_html__('About Theme', 'euphoric'), esc_html__('About Theme', 'euphoric'), 'edit_theme_options', 'euphoric-about', 'euphoric_about_page');   
}

// CSS for About Theme Page
function euphoric_admin_theme_style() {
   wp_enqueue_style('euphoric-admin-style', get_template_directory_uri() . '/inc/about-theme/css/about-theme.css');
}
add_action('admin_enqueue_scripts', 'euphoric_admin_theme_style');

function euphoric_about_page() {
	$theme = wp_get_theme();

?>
<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php /* translators: %s theme name */
				printf( esc_html__( 'Welcome to %s', 'euphoric' ), esc_html( $theme->Name ) ); ?>
				<?php esc_html_e('Version:','euphoric'); ?> <?php echo esc_html($theme['Version']);?></h3>
				<p>
					<?php esc_html_e('Euphoric is a fast, clean, and modern-looking responsive Free WordPress Blog Theme. Minimal, elegant, lightweight, fast & mobile friendly layout with WooCommerce compatibility. This is a flexible template uses fresh and clean design.This theme is the best choise even for personal or professional websites.','euphoric'); ?>
				</p>
				<p>
				<?php /* translators: %s theme name */
					printf( esc_html__( '%s theme is the most Popular Free WordPress blog theme. Please click the below button to display how your site looks like', 'euphoric' ), esc_html( $theme->Name ) );
				?></p>
				<p> &nbsp;</p>
				<a href="<?php echo esc_url('https://demo.themespiral.com/euphoric'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Free Demo', 'euphoric' ); ?></a><a href="<?php echo esc_url('https://demo.themespiral.com/euphoric-pro'); ?>" class="button button-primary button-hero about-theme" target="_blank"><?php esc_html_e( 'Visit Pro Demo', 'euphoric' ); ?></a>
		</div>
		<div class="theme-tabs">
			<input type="radio" name="nav" id="one" checked="checked"/>
			<label for="one" class="tab-label"><?php esc_html_e('Getting Started?','euphoric');?></label>

			<input type="radio" name="nav" id="two"/>
			<label for="two" class="tab-label"><?php esc_html_e('Demo Importer','euphoric');?></label>

			<input type="radio" name="nav" id="three"/>
			<label for="three" class="tab-label"><?php esc_html_e('Support','euphoric');?></label>

			<input type="radio" name="nav" id="four"/>
			<label for="four" class="tab-label"><?php esc_html_e('Video Tutorials','euphoric');?></label>

			<input type="radio" name="nav" id="five"/>
			<label for="five" class="tab-label"><?php esc_html_e('Pro Features','euphoric');?></label>

			<article class="content one">
			    <h3><?php esc_html_e('About Documentation','euphoric');?></h3>
			    <p><?php esc_html_e('Documentation is the information that describes the product to its users. Our documentation covers only related to Free Themes and Pro Extension Plugins. It will guide your to develop your Website as we displayed in demo site without any others help.','euphoric');?></p>
			    <p>
					<a href="<?php echo esc_url('https://docs.themespiral.com/euphoric/');?>" target="_blank" class="button button-primary"><?php printf( esc_html__( '%s Documentation', 'euphoric' ), esc_html( $theme->Name ) ); ?></a>
				</p>
				<h3><?php esc_html_e('Theme Customizer','euphoric');?></h3>
			   <p><?php printf( esc_html__( '%s supports the Theme Customizer for all theme settings. Click "Customize" to personalize your site.', 'euphoric' ), esc_html( $theme->Name ) ); ?>
			   	<a href="<?php echo esc_url(admin_url( 'customize.php' )); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Start Customizing','euphoric');?></a>
				</p>
				<h3><?php esc_html_e('F.A.Q (Frequently Asked Questions)','euphoric');?></h3>
			   <p><?php esc_html_e('Want to know more about Themes and Plugins developed by Theme Spiral? ','euphoric'); ?><a href="<?php echo esc_url('https://themespiral.com/f-a-q/');?>" class="button button-primary" target="_blank"><?php esc_html_e('F.A.Q','euphoric');?></a></p>
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content two">
			    <h3><?php esc_html_e('Demo Importer','euphoric');?></h3>
				<p>
					<?php esc_html_e( 'If your site have your own content then do not use this plugins. It will mess your site with dummy content. Is your site fresh? Install the Demo importer plugins and activate it.', 'euphoric' ); ?></p>
				<p><?php esc_html_e('Do you want to import Demo Data? ','euphoric'); ?></p>
					<?php if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=pt-one-click-demo-import' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Import demo data', 'euphoric' ); ?>
					</a>
				<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) ?>" class="button button-primary" style="text-decoration: none;">
						<?php esc_html_e( 'Import demo data', 'euphoric' ); ?>
					</a>
				<?php } ?> &nbsp;&nbsp;
				<a href="https://www.youtube.com/watch?v=uqmWhXhODMc" class="button button-primary" style="text-decoration: none;" target="_blank">
						<?php esc_html_e( 'Watch Demo Import Video', 'euphoric' ); ?></a>
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content three">
			   <h3><?php esc_html_e('About Support','euphoric');?></h3>
				<p><?php esc_html_e('Need Help? Use our Forums if you have any Themes and Plugins related questions. Support will be provided only related to our Themes and Plugins','euphoric');?>
					<a href="<?php echo esc_url('https://themespiral.com/forums/'); ?>" target="_blank" class="button button-primary"> <?php esc_html_e('Forums','euphoric');?></a>
				</p>
				<h3><?php esc_html_e('Sales Questions','euphoric');?></h3>
				<p><?php esc_html_e('Do you have discussion relating to billing, your account or have pre-sales questions? Get touch with us!','euphoric');?>
					<a href="<?php echo esc_url('https://themespiral.com/contact-us/');?>" target="_blank" class="button button-primary"> <?php esc_html_e('Contact us','euphoric');?></a>
				</p>
			   <img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.jpg">
			</article>

			<article class="content four">
			   <h3><?php esc_html_e('Video Tutorials','euphoric');?></h3>
				<h4> <?php esc_html_e('Setup Site Identity','euphoric'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=-P5uh-ngRcw"><?php esc_html_e( 'Watch Video', 'euphoric' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=title_tagline')); ?>"></span><?php esc_html_e( 'Site Identity', 'euphoric' ); ?></a>

				<h4> <?php esc_html_e('Setup Top Panel','euphoric'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=Z1hyddyqLZM"><?php esc_html_e( 'Watch Video', 'euphoric' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=euphoric_header_section')); ?>"></span><?php esc_html_e( 'Top Panel', 'euphoric' ); ?></a>

				<h4> <?php esc_html_e('Setup Main Banner','euphoric'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=HOqRaUj0g_g"><?php esc_html_e( 'Watch Video', 'euphoric' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=euphoric_main_banner_section')); ?>"></span><?php esc_html_e( 'Main Banner', 'euphoric' ); ?></a>

				<h4> <?php esc_html_e('Setup Highlighted Category','euphoric'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=XaiS7_1ZPx8"><?php esc_html_e( 'Watch Video', 'euphoric' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=euphoric_category_highlight_section')); ?>"></span><?php esc_html_e( 'Highlighted Category', 'euphoric' ); ?></a>

				<h4> <?php esc_html_e('Setup Social Icons','euphoric'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=92PyEE5A_kc"><?php esc_html_e( 'Watch Video', 'euphoric' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Social Icons', 'euphoric' ); ?></a>

				<h4> <?php esc_html_e('Setup Color Schemes','euphoric'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=VhO3Xssa264"><?php esc_html_e( 'Watch Video', 'euphoric' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=colors')); ?>"></span><?php esc_html_e( 'Color Schemes', 'euphoric' ); ?></a>

				<h4> <?php esc_html_e('Setup Primary Menu','euphoric'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=81DukpjvaTY"><?php esc_html_e( 'Watch Video', 'euphoric' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url())?>nav-menus.php"></span><?php esc_html_e( 'Primary Menu', 'euphoric' ); ?></a>

				<h4> <?php esc_html_e('Setup Header','euphoric'); ?></h4>
				<a class="button button-primary" target="_blank" href="https://www.youtube.com/watch?v=7B0A2sTW7hM"><?php esc_html_e( 'Watch Video', 'euphoric' ); ?></a>
					<a class="button button-secondary" href="<?php echo esc_url(admin_url('customize.php?autofocus[section]=header_image')); ?>"></span><?php esc_html_e( 'Setup Header', 'euphoric' ); ?></a>
			</article>

			<article class="content five">
				 <h3><?php esc_html_e('Upgrade to Pro','euphoric');?></h3>
				 <p><?php esc_html_e('Want additional features? Pro extension plugin adds additinal features for free themes. ','euphoric')?><a href="<?php echo esc_url('https://themespiral.com/themes/euphoric');?>" class="button button-primary button-hero" target="_blank"><?php esc_html_e('Upgrade to Pro','euphoric');?></a></p>
			   <h3><?php esc_html_e('Pro Features Extension','euphoric');?></h3>
				<div class="feature-content">
					<ul class="feature-text">
						<li><?php esc_html_e('Site Layout','euphoric'); ?></li>
						<li><?php esc_html_e('Single Sidebar Layout','euphoric'); ?></li>
						<li><?php esc_html_e('Flexible Content Width','euphoric'); ?></li>
						<li><?php esc_html_e('Sidebar Content Width','euphoric'); ?></li>
						<li><?php esc_html_e('Custom Design','euphoric'); ?></li>
						<li><?php esc_html_e('Default Text Edit','euphoric'); ?></li>
						<li><?php esc_html_e('Choose Main Banner','euphoric'); ?></li>
						<li><?php esc_html_e('Main Banner Settings','euphoric'); ?></li>
						<li><?php esc_html_e('Category highlight settings','euphoric'); ?></li>
						<li><?php esc_html_e('Excerpt Text edit','euphoric'); ?></li>
						<li><?php esc_html_e('Post Excerpt Content','euphoric'); ?></li>
						<li><?php esc_html_e('Footer Layout','euphoric'); ?></li>
						<li><?php esc_html_e('Footer Edit','euphoric'); ?></li>
						<li><?php esc_html_e('Instagram Compatible','euphoric'); ?></li>
						<li><?php esc_html_e('Unlimited Color','euphoric'); ?></li>
						<li><?php esc_html_e('Font Color','euphoric'); ?></li>
						<li><?php esc_html_e('Background Color','euphoric'); ?></li>
						<li><?php esc_html_e('Font Size','euphoric'); ?></li>
						<li><?php esc_html_e('Font Family','euphoric'); ?></li>
						<li><?php esc_html_e('TOP Panel Header Section','euphoric'); ?></li>
					</ul>
			    </div><!-- .feature-content -->
			</article>
		</div>
		<div class="pro-content">
			<div class="pro-content-wrap">
				<div class="pro-content-header">
					<h3><?php esc_html_e('Powerful Pro Extension Features','euphoric');?></h3>
					<p><?php esc_html_e('Get unlimited features using Pro extension. Purchase Euphoric Pro extension and get additional features and advanced customization options to make your website look awesome in different styles. ','euphoric'); ?></p>
				</div>
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/images/free_vs_pro.png" alt="<?php esc_attr_e('Free vs Pro','euphoric');?>">
			</div>
		</div>
	</div>
</div>
<?php }