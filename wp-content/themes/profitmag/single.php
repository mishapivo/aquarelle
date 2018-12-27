<?php
/**
 * The template for displaying all single posts.
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
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
            
			<?php get_template_part( 'content', 'single' ); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>                        
            
            <?php profitmag_record_views(get_the_ID()); // Record post view?>
		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar( 'left' ); ?>
<?php
if( $sidebar_layout == 'both_sidebar' ) {
    echo '</div>';
}
?>
<?php get_sidebar( 'right' ); ?>

<?php get_footer(); ?>