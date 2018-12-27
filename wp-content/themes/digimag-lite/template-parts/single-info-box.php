<?php
/**
 * The template for Single Info Box
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Digimag Lite
 */

$title_length = get_theme_mod( 'info_box_navigation_title_length', 8 );
?>

<aside class="single-info-box col-1">
	<div class="info-box-row info-box-sharing">
		<h4 class="info-box-heading"><?php esc_html_e( 'Share article:', 'digimag-lite' ); ?></h4>
		<?php
		if ( function_exists( 'sharing_display' ) ) {
			sharing_display( '', true );
		}
		?>
	</div>
	<div class="info-box-row info-box-category">
		<h4 class="info-box-heading"><?php esc_html_e( 'Category', 'digimag-lite' ); ?></h4>
		<div class="info-box-text">
			<?php digimag_lite_print_categories_list(); ?>
		</div>
	</div>

	<?php
	$previous_post = get_previous_post();
	if ( ! empty( $previous_post ) ) :
	?>
	<div class="info-box-row info-box-previous-post">
		<h4 class="info-box-heading"><?php esc_html_e( 'Previous Post', 'digimag-lite' ); ?></h4>
		<div class="info-box-text">
			<a href="<?php echo esc_url( get_permalink( $previous_post->ID ) ); ?>">
				<?php
				echo esc_html( wp_trim_words( $previous_post->post_title, $title_length ) );
				?>
			</a>
		</div>
	</div>
	<?php endif; ?>


	<?php
	$next_post = get_next_post();
	if ( ! empty( $next_post ) ) :
	?>
	<div class="info-box-row info-box-previous-post">
		<h4 class="info-box-heading"><?php esc_html_e( 'Next Post', 'digimag-lite' ); ?></h4>
		<div class="info-box-text">
			<a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>">
				<?php
				echo esc_html( wp_trim_words( $next_post->post_title, $title_length ) );
				?>
			</a>
		</div>
	</div>
	<?php endif; ?>

</aside>
