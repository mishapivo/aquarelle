<?php get_header(); ?>

	<!-- Title Start -->

	<div class="space-title-box box-100 relative">
		<div class="space-title-box-ins relative">
			<h1><?php esc_html_e( 'Error 404', 'tethys' ); ?></h1>
			<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<div class="space-breadcrumbs relative">','</div>'); } ?>
		</div>
	</div>

	<!-- Title End -->

	<!-- Single Page Start -->

	<div class="space-page box-100 relative full-width page-404">
		<div class="space-page-large-column box-75 left relative">
			<div class="space-page-box case-15 white relative">
				<div class="space-page-content relative">
					<h2><?php esc_html_e( 'Page not Found', 'tethys' ); ?></h2>
					<p><?php esc_html_e( 'Nothing found.', 'tethys' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php esc_html_e( 'Go back to home page', 'tethys' ); ?></a>.</p>
					<div class="space-widget-title relative">
						<div class="space-widget-title-line relative"></div>
						<span><?php esc_html_e( 'Search', 'tethys' ); ?></span>
					</div>
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Single Page End -->

<?php get_footer(); ?>