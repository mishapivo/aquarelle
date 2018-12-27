<?php
/**
 * Meritorious (404.php)
 *
 * @package     Meritorious
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

?>

<?php get_header(); ?>
	<div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
		<div class="content-area">
			<article id="post-0" <?php post_class( 'post' ); ?>>
				<header class="entry-header">
					<h1 class="entry-title"><?php esc_html_e( 'Whoa! You broke something', 'meritorious' ); ?></h1>
				</header>
				<div class="entry-content">
					<p>
						<?php
						$request_uri = ( isset( $_SERVER['REQUEST_URI'] ) ) ?: sanitize_text_field( wp_unslash( $_SERVER['REQUEST_URI'] ) );
						printf(
							// translators: 1 =  $request_uri.
							esc_html__( "Just kidding! You tried going to %s, which doesn't exist, so that means I probably broke something. To find what you are looking for, check out the most recent articles below or try a search: ", 'meritorious' ),
							'<code>' . esc_url( home_url( $request_uri ) ) . '</code>'
						);
						?>
					</p>
					<?php get_search_form(); ?>
				</div>
			</article>
			<div class="custom-blog">
				<?php Benlumia007\Backdrop\CustomQuery\display_custom_blog(); ?>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>
