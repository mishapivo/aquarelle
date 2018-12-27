<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package architectwp
 */

get_header();
?>

	<div id="primary" class="content-area grid-wide">
		<main id="masonry" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

				<div class="post-thumb">
					<a href="<?php the_permalink();?>">
					<?php if (has_post_thumbnail()) {
						the_post_thumbnail(get_the_ID(), 'medium'); 
					} else {
						$thumb = get_template_directory_uri() .'/img/default.png';

						echo '<img src="'.esc_url("$thumb").'">';
					} ?>
				</a>
				</div>
					<header class="entry-header">
						<a href="<?php the_permalink();?>">
							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</a>			

						<?php echo esc_html(architectwp_post_category()); ?>			
					</header><!-- .entry-header -->
				</article>

			<?php endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
