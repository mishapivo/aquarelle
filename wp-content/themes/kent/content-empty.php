<?php
/**
 * Page content
 *
 * @package Kent
 */
?>
<article class="no-results not-found">
	<h1 class="posttitle">
		<?php _e( 'Nothing Found', 'kent' ); ?>
	</h1>
	<section class="entry">
<?php
	if ( is_home() && current_user_can( 'publish_posts' ) ) {
?>
		<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'kent' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php
	} if ( is_search() ) {
?>
		<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kent' ); ?></p>
<?php
		get_search_form();
	} else {
?>
		<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kent' ); ?></p>
<?php
		get_search_form();
	}
?>
	</section>
</article>