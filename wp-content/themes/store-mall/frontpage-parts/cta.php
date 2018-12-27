<?php
/**
 * Template part for displaying front page cta.
 *
 * @package Moral
 */
// Get default  mods value.
$default = store_mall_get_default_mods();

// Get the content type.
$cta = get_theme_mod( 'store_mall_cta', 'disable' );

// Bail if the section is disabled.
if ( 'disable' === $cta ) {
	return;
}

// Query if the content type is either post or page.

$id = get_theme_mod( 'store_mall_cta_page' );

$query = new WP_Query( array( 'post_type' => $cta, 'p' => absint( $id ) ) );

if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
		$query->the_post();
		$img_url     = get_the_post_thumbnail_url( $id, 'large' );
		$title   = get_the_title();
		$content = get_the_excerpt();
		$btn_url     = get_permalink();
	}
	wp_reset_postdata();
}

// Get the common settings value  in custom, page and post.
$btn_txt = esc_html__( 'Shop Now', 'store-mall' );

?>

<div id="call-to-action" class="relative page-section" style="background-image: url('<?php echo esc_url( $img_url );?>');">
    <div class="wrapper">
        <div class="call-to-action-wrap">
            <div class="section-header">
                <h2 class="section-title"><?php echo wp_kses_post( $title ); ?></h2>
            </div><!-- .section-header -->

            <div class="section-content">
            	<?php echo wp_kses_post( $content ); ?>
            </div><!-- .section-content -->
            <?php if ( ! empty( $btn_txt ) ) : ?>
            	<a href="<?php echo esc_url( $btn_url ); ?>" class="btn btn-default"><?php echo esc_html( $btn_txt ); ?></a>
            <?php endif; ?>
        </div><!-- .call-to-action-wrap -->
    </div><!-- .wrapper -->
</div><!-- #call-to-action -->