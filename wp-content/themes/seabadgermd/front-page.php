<?php
// If blog posts configured for front page, pass on handling
if ( 'posts' == get_option( 'show_on_front' ) ) {
		load_template( get_home_template() );
		return;
}
?>
<?php get_header(); ?>
<main>
<!--Main layout-->
<div class="container">
	<div class="row">
		<!--Main column-->
		<div class="col-md-12 col-lg-8 posts-col">
			<?php
			if ( is_active_sidebar( 'frontpage' ) ) {
				dynamic_sidebar( 'frontpage' );
			} elseif ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
			?>
			<!--Post-->
			<div <?php post_class( 'card post-wrapper' ); ?>>
				<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
			</div>
			<!--/Post-->
			<?php
				}
				seabadgermd_pagination();
			}
			?>
		</div>
		<!--/Main column-->
		<!--Sidebar-->
		<?php get_sidebar(); ?>
		<!--/Sidebar-->	
	</div>
</div>
<!--/Main layout-->
</main>
<?php get_footer(); ?>
