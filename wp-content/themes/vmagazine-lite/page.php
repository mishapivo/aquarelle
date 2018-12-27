<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */
get_header();

 ?>

	<div class="vmagazine-lite-container">
		<?php do_action( 'vmagazine_lite_before_body_content' ); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					comment_form(array(
					'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title"><span class="title-bg">',
					'title_reply' => esc_html__('Comment here','vmagazine-lite'),
					'title_reply_after' => '</span></h4>',
					'comment_notes_before' => '',
					'label_submit'=> esc_html__('Comment','vmagazine-lite'),
					));
					

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php vmagazine_lite_get_sidebar(); ?>
		<?php do_action( 'vmagazine_lite_after_body_content' ); ?>
	</div><!-- .vmagazine-lite-container -->

<?php

get_footer();
