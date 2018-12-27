<?php
/**
 * The default template for displaying none content
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
?>

<div class="col-md-12 content-none">
	<h3><?php esc_html_e( 'Nothing Found', 'wp-sierra' ); ?></h3>

		<div>
			<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
				<p><?php
				/* translators: %s: link term */
				echo sprintf( esc_html__( 'Ready to publish your first post? %1$sGet started here%2$s.', 'wp-sierra' ), '<a href="'. esc_url( admin_url( 'post-new.php' ) ) .'" target="_blank">', '</a>' );
				?>
				</p>
			<?php } elseif ( is_search() ) { ?>
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'wp-sierra' ); ?></p>
			<?php } elseif ( is_category() ) { ?>
				<p><?php esc_html_e( 'There aren\'t any posts currently published in this category.', 'wp-sierra' ); ?></p>
			<?php } elseif ( is_tax() ) { ?>
				<p><?php esc_html_e( 'There aren\'t any posts currently published under this taxonomy.', 'wp-sierra' ); ?></p>
			<?php } elseif ( is_tag() ) { ?>
				<p><?php esc_html_e( 'There aren\'t any posts currently published under this tag.', 'wp-sierra' ); ?></p>
			<?php } else { ?>
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'wp-sierra' ); ?></p>
			<?php } ?>
		</div>
</div>
