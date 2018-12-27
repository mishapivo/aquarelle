<?php get_header(); 
$wl_theme_options = weblizar_get_options(); 
if($wl_theme_options['breadcrumb']!='') { ?>
<div class="enigma_header_breadcrum_title">	
	<div class="container">
		<div class="row">
		<?php if(have_posts()) :?>
			<div class="col-md-12">
			<?php /* translators: %s: category name. */ ?>
			<h1><?php printf( esc_html__( 'Category Archives: %s', 'enigma' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			</h1>
			</div>
		<?php endif; ?>	
		</div>
	</div>	
</div>
<?php } ?>
<div class="container">	
	<div class="row enigma_blog_wrapper">
	<div class="col-md-8">
	<?php 
	if ( have_posts()): 
	while ( have_posts() ): the_post();
	get_template_part('post','content'); ?>	
	<?php endwhile; 
	endif; 
	weblizar_navigation(); ?>
	</div>	
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>