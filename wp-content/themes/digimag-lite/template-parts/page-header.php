<?php
/**
 * Display page header.
 *
 * @package Digimag Lite
 */

$single_post_layout = get_theme_mod( 'single_post_layout' );
if ( is_front_page() || ( is_singular( 'post' ) && ! $single_post_layout ) ) {
	return;
}
?>

<div class="page-header">
	<div class="header-inner">
		<?php
		if ( is_singular( 'post' ) && $single_post_layout ) {
			// Trigger the_post() to setup post data.
			the_post();

			digimag_lite_print_single_category();
			the_title( '<h1 class="entry-title">', '</h1>' );
			echo '<div class="entry-meta">';
				echo get_avatar( get_the_author_meta( 'ID' ), 50, '', '', array( 'class' => 'byline' ) );
				digimag_lite_posted_by();
				digimag_lite_posted_on();
				digimag_lite_print_comment_link();
			echo '</div>';

			rewind_posts();

		} else {
			digimag_lite_breadcrumbs();
		}
		?>
	</div>
</div>
