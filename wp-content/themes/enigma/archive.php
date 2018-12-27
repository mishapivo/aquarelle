<?php get_header(); 
$wl_theme_options = weblizar_get_options(); 
if($wl_theme_options['breadcrumb']!='') { ?>
<div class="enigma_header_breadcrum_title">	
	<div class="container">
		<div class="row">
		<?php if(have_posts()) :?>
			<div class="col-md-12">
			<h1><?php if ( is_day() ) :
			/* translators: %s: date. */
						printf( esc_html__( 'Daily Archives: %s', 'enigma' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
					/* translators: %s: month. */
						printf( esc_html__( 'Monthly Archives: %s', 'enigma' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'enigma' ) ) . '</span>' );
					elseif ( is_year() ) :
					/* translators: %s: year. */
						printf( esc_html__( 'Yearly Archives: %s', 'enigma' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'enigma' ) ) . '</span>' );
					else :
						esc_html_e( 'Archives', 'enigma' );
					endif; ?>
			</h1></div>
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
	