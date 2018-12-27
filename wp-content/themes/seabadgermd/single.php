<?php get_header(); ?>
<main>
<!--Main layout-->
<div class="container">
	<div class="row">
		<!--Main column-->
		<div class="col-md-12 col-lg-8">
			<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
			?>
			<!--Post-->
			<div <?php post_class( 'card post-wrapper' ); ?>>
				<?php get_template_part( 'template-parts/content-single', get_post_format() ); ?>
			</div>
			<!--/Post-->
			<?php
				}
			}
			?>
		</div>
		<!--Sidebar-->
		<?php get_sidebar(); ?>
		<!--/Sidebar-->	
	</div>
</div>
<!--/Main layout-->
</main>
<?php get_footer(); ?>
