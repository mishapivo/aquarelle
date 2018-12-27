<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

	<!-- Homepage Start -->

	<div class="space-homepage box-100 relative">
		<div class="space-homepage-right-columns box-75 right relative">
			<div class="space-homepage-big-column box-66 left large-section relative">
					
			<?php
				if ( is_active_sidebar( 'homepage-central-column' ) ) :
					dynamic_sidebar( 'homepage-central-column' );
				endif;
			?>

			</div>
			<div class="space-homepage-small-column-two box-33 left small-section relative">

			<?php
				if ( is_active_sidebar( 'homepage-right-column' ) ) :
					dynamic_sidebar( 'homepage-right-column' );
				endif;
			?>

			</div>
		</div>
		<div class="space-homepage-small-column-one box-25 right small-section relative">

			<?php
				if ( is_active_sidebar( 'homepage-left-column' ) ) :
					dynamic_sidebar( 'homepage-left-column' );
				endif;
			?>

		</div>
	</div>

	<!-- Homepage End -->

<?php get_footer(); ?>