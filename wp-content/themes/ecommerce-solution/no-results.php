<?php
/**
 * The template part for displaying a message that posts cannot be found.
 * @package Ecommerce Solution
 */
?>

<header>
	<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'ecommerce-solution' ); ?></h1>
</header>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( esc_html__( 'Ready to publish your first post? Get started here.','ecommerce-solution'), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ecommerce-solution' ); ?></p><br />
		<?php get_search_form(); ?>
<?php else : ?>
	<p><?php esc_html_e( 'Dont worry it happens to the best of us.', 'ecommerce-solution' ); ?></p><br />
	<div class="read-moresec">
		<a href="<?php echo esc_url( home_url() ); ?>" class="button"><?php esc_html_e( 'Back to Home Page', 'ecommerce-solution' ); ?></a>
	</div>
<?php endif; ?>