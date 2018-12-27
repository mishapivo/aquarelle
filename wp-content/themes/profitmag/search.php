<?php
/**
 * The template for displaying search results pages.
 *
 * @package ProfitMag
 */

get_header(); ?>
<?php
$profitmag_settings = get_option( 'profitmag_options' );
if( isset( $profitmag_settings['sidebar_layout'] )) {
        $sidebar_layout = $profitmag_settings['sidebar_layout'];    
}else {
       $sidebar_layout = 'right_sidebar';
}
if( $sidebar_layout == 'both_sidebar' ) {
       echo '<div id="primary-wrap" class="clearfix">';
}
?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'profitmag' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php profitmag_pagination(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar( 'left' ); ?>
<?php
if( $sidebar_layout == 'both_sidebar' ) {
    echo '</div>';
}
?>
<?php get_sidebar( 'right' ); ?>
<?php get_footer(); ?>
