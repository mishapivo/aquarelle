<?php
/**
 * Getting started template
 */
$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="chilly-tab-pane active">

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1 class="chilly-info-title text-center"><?php echo esc_html__('About the Chilly theme','chilly'); ?><?php if( !empty($chilly['Version']) ): ?> <sup id="chilly-theme-version"><?php echo esc_html( $chilly['Version'] ); ?> </sup><?php endif; ?></h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="chilly-tab-pane-half chilly-tab-pane-first-half">
				<p><?php esc_html_e( 'This theme is ideal for creating corporate and business websites. There is no separate premium version of it, as Chilly is a child theme of the SpicePress WordPress theme. The premium version, SpicePress PRO has tons of features: a homepage with many sections where you can feature unlimited slides, portfolios, user reviews, latest news, services, calls to action and much more. Each section in the Homepage template is carefully designed to fit to all business requirements.','chilly');?></p>
				<p>
				<?php esc_html_e( 'You can use this theme for any type of activity. Chilly is compatible with popular plugins like WPML and Polylang. To help you create an effective and impactful web presence, Chilly has predefined versions of many pages: Contact, Services, Portfolios, About Us and Blog.', 'chilly' ); ?>
				</p>
				
				<a style="color:#fff; text-decoration:none;" target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>">
				<h1 style="margin-top: 73px; background: #0085ba;border-color: #0073aa #006799 #006799; color: #fff; padding: 5px 10px; line-height: 40px;"><?php esc_html_e( "Getting Started", 'chilly' ); ?></h1></a>
				<div>
				<p style="margin-top: 16px;">
				
				<?php esc_html_e( 'To take full advantage of all the features this theme has to offer, install and activate the SpiceBox plugin. Go to Customize and install the SpiceBox plugin.', 'chilly' ); ?>
				
				</p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary" style="padding: 7px 15px;height: 40px; font-size: 16px;"><?php esc_html_e( 'Go to the Customizer','chilly');?></a></p>
				</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="chilly-tab-pane-half chilly-tab-pane-first-half">
				<img class="img-responsive" src="<?php echo CHILLY_ST_TEMPLATE_DIR_URI . '/admin/img/chilly.png'; ?>" alt="<?php esc_attr_e( 'Chilly theme', 'chilly' ); ?>" />
				</div>
			</div>	
		</div>
		
		<div class="row">
			<div class="chilly-tab-center">

				<h1><?php esc_html_e( "Useful Links", 'chilly' ); ?></h1>

			</div>
			<div class="col-md-6"> 
				<div class="chilly-tab-pane-half chilly-tab-pane-first-half">

					<a href="<?php echo ('https://chilly.spicethemes.com/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Lite Demo','chilly'); ?></p></a>
					
					
					<a href="<?php echo ('https://demo.spicethemes.com/?theme=spicepress'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo esc_html__('PRO Demo','chilly'); ?></p></a>
					
					
					
				</div>
			</div>
			<div class="col-md-6">	
				
				<div class="chilly-tab-pane-half chilly-tab-pane-first-half">
					
					<a href="<?php echo ('https://wordpress.org/support/view/theme-reviews/chilly'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-smiley info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Your feedback is valuable to us','chilly'); ?></p></a>
					
					<a href="<?php echo ('https://support.spicethemes.com/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-sos info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Premium Theme Support','chilly'); ?></p></a>
				</div>
			</div>
			
			
			<div class="col-md-6">	
				
				<div class="chilly-tab-pane-half chilly-tab-pane-first-half">
					
					<a href="<?php echo ('https://spicethemes.com/spicepress/'); ?>" target="_blank"  class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
					<p class="info-text"><?php echo esc_html__('Premium Theme Details','chilly'); ?></p></a>
					
				</div>
				
			</div>
			
			
			
			
		</div>
		
	</div>
</div>	