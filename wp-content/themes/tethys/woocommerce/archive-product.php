<?php get_header(); ?>

	<!-- Title Start -->

	<div class="space-title-box box-100 relative">
		<div class="space-title-box-ins relative">
			<h1><?php woocommerce_page_title(); ?></h1>
			<div class="space-breadcrumbs relative">
				<?php woocommerce_breadcrumb(); ?>
			</div>
		</div>
	</div>

	<!-- Title End -->

	<!-- Single Product Start -->

	<div class="space-page box-100 relative">
		<div class="space-page-large-column box-75 left relative">
			<div class="space-page-box case-15 white relative">
				<div class="space-page-content relative">
					<?php if ( have_posts() ) : ?>

					<?php do_action( 'woocommerce_before_shop_loop' ); ?>

					<?php woocommerce_product_loop_start(); ?>

					<?php woocommerce_product_subcategories(); ?>

					<?php while ( have_posts() ) : the_post(); ?>

					<?php do_action( 'woocommerce_shop_loop' ); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

					<?php endwhile; // end of the loop. ?>

					<?php woocommerce_product_loop_end(); ?>

					<?php do_action( 'woocommerce_after_shop_loop' ); ?>

					<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

					<?php do_action( 'woocommerce_no_products_found' ); ?>

					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="space-page-small-column box-25 left small-section relative">
			<?php
				if ( is_active_sidebar( 'shop-sidebar' ) ) :
					dynamic_sidebar( 'shop-sidebar' );
				endif;
			?>
		</div>
	</div>

	<!-- Single Product End -->

<?php get_footer(); ?>