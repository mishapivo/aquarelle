<!--Post data-->
<?php get_template_part( 'template-parts/content/featuredimage' ); ?>
<div class="card-body post-block">
	<?php get_template_part( 'template-parts/content/title' ); ?>
	<?php get_template_part( 'template-parts/content/meta' ); ?>
	<div class="card-text post-content">
		<?php
		if ( ! has_excerpt() || post_password_required() ) {
			the_content( '', false );
		} else {
			the_excerpt();
		}
		?>
		<br class="clear">
		<?php get_template_part( 'template-parts/content/footer' ); ?>
	</div>
<?php if ( seabadgermd_has_readmore() ) : ?>
	<!--"Read more" button-->
	<a href="<?php echo esc_url( get_permalink() ); ?>"><button class="btn themecolor">
	<?php esc_attr_e( 'Read more', 'seabadgermd' ); ?></button></a>
<?php endif; ?>
<!-- Comment button -->
<?php
if ( comments_open() || get_comments_number() != 0 ) {
	comments_popup_link(
		// __( 'Comment', 'seabadgermd' ),
		sprintf( '<i class="fa fa-comment-o" aria-hidden="true"></i><span class="sr-only">%s</span>',
		esc_html__( 'Comment', 'seabadgermd' ) ),
		sprintf( '<i class="fa fa-comment" aria-hidden="true"></i><span class="sr-only">%s</span>',
		esc_html__( 'View comment', 'seabadgermd' ) ),
		sprintf( '<i class="fa fa-comments-o" aria-hidden="true"></i><span class="sr-only">%s</span>',
		esc_html__( 'View comments (%)', 'seabadgermd' ) ),
		'btn btn-round themecolor comment-link',
		esc_html__( 'Comments off', 'seabadgermd' )
	);
}
?>
</div>
