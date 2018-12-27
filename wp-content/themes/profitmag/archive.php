<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'profitmag' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'profitmag' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'profitmag' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'profitmag' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'profitmag' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'profitmag' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'profitmag' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'profitmag' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'profitmag' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'profitmag' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'profitmag' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'profitmag' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'profitmag' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'profitmag' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'profitmag' );

						else :
							_e( 'Archives', 'profitmag' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
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
