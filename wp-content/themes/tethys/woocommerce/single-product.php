<?php get_header(); ?>

	<!-- Title Start -->

	<div class="space-title-box box-100 relative">
		<div class="space-title-box-ins relative">
			<h1><?php the_title(); ?></h1>
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
					<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'single-product' ); ?>

					<?php endwhile; ?>
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