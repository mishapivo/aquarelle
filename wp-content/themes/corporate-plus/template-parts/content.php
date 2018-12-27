<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Acme Themes
 * @subpackage Corporate Plus
 */
global $corporate_plus_customizer_all_values;
$corporate_plus_get_image_sizes_options = $corporate_plus_customizer_all_values['corporate-plus-blog-archive-img-size'];
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="content-wrapper">
		<header class="entry-header">
			<?php
            the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php corporate_plus_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php
			endif; ?>
		</header><!-- .entry-header -->
		<?php
		if ( $corporate_plus_customizer_all_values['corporate-plus-blog-archive-layout'] == 'left-image' && has_post_thumbnail() ) {
			?>
			<!--post thumbnal options-->
			<div class="post-thumb">
				<a href="<?php the_permalink(); ?>">
					<?php
					the_post_thumbnail( $corporate_plus_get_image_sizes_options );
					?>
                </a>
			</div><!-- .post-thumb-->
			<?php
		}
		?>
		<div class="entry-content">
			<?php
			the_excerpt();
			$corporate_plus_blog_archive_read_more = corporate_plus_blog_archive_more_text();
			if( !empty( $corporate_plus_blog_archive_read_more )){
				?>
                <a class="btn btn-primary" href="<?php the_permalink(); ?> ">
					<?php echo $corporate_plus_blog_archive_read_more; ?>
                </a>
				<?php
			}
			?>
		</div><!-- .entry-content -->
		<div class="clearfix"></div>
		<footer class="entry-footer">
			<?php corporate_plus_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-## -->