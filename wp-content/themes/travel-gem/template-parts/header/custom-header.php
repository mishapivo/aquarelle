<?php
/**
 * Custom Header
 *
 * @package Travel_Gem
 */

$custom_header_layout          = travel_gem_get_option( 'custom_header_layout' );
$custom_header_show_title      = travel_gem_get_option( 'custom_header_show_title' );
$custom_header_show_breadcrumb = travel_gem_get_option( 'custom_header_show_breadcrumb' );

$ch_status = true;

$banner = get_header_image();
$banner_title = apply_filters( 'travel_gem_filter_banner_title', '' );

if ( empty( $banner ) && ( false === $custom_header_show_breadcrumb ) && ( false === $custom_header_show_title || empty( $banner_title ) ) ) {
	$ch_status = false;
}

$ch_extra_class = ( true === $ch_status ) ? 'custom-header-enabled' : 'custom-header-disabled';
?>

<div id="custom-header" class="<?php echo esc_attr( $ch_extra_class ); ?> ch-layout-<?php echo esc_attr( $custom_header_layout ); ?>">
	<?php if ( ! empty( $banner ) ) : ?>
		<img src="<?php echo esc_url( $banner ); ?>" alt="" />
	<?php endif; ?>

	<?php if ( ! empty( $banner_title ) ) : ?>
		<?php
		$tag = 'h1';
		if ( is_front_page() ) {
			$tag = 'h2';
		}
		?>
		<div class="custom-header-content">
			<div class="container">
				<?php if ( true === $custom_header_show_title ) : ?>
					<?php echo '<' . esc_attr( $tag ) . ' class="page-title">'; ?>
					<?php echo esc_html( $banner_title ); ?>
					<?php echo '</' . esc_attr( $tag ) . '>'; ?>
				<?php endif; ?>

				<?php if ( true === $custom_header_show_breadcrumb ) : ?>
					<?php
					/**
					 * Hook - travel_gem_action_breadcrumb.
					 *
					 * @hooked travel_gem_add_breadcrumb - 10
					 */
					do_action( 'travel_gem_action_breadcrumb' );
					?>
				<?php endif; ?>
			</div><!-- .container -->
		</div><!-- .custom-header-content -->
	<?php endif; ?>

</div><!-- #custom-header -->
