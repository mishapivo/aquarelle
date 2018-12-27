<?php
/**
 * Template part for displaying page content in page.php
 * @package WordPress
 * @subpackage chalak-driving-school
 * @since 1.0
 * @version 0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php chalak_driving_school_edit_link( get_the_ID() ); ?>
	</header>
	<div class="entry-content">
		<img src="<?php the_post_thumbnail_url(); ?>">
		<?php			
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'chalak-driving-school' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</article>