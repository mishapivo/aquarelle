<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @package techlauncher
 */
get_header(); ?>
<main id="content">
    <div class="container">
      	<div class="row">
			<div class="<?php if( !is_active_sidebar('sidebar-1')) { echo "col-lg-12"; } else { echo "col-lg-9"; } ?> col-md-9">
        		<div class="Single-Content-container">
					<div class="row">
						<div class="col-lg-12">
							<div class="page-content">
								<?php if( have_posts()) :  the_post(); ?>
								<h1><?php the_title(); ?></h1>		
								<?php the_content(); ?>
								<?php endif; ?>
								<?php wp_link_pages( array( 'before' => '<div class="link Single-post-link">' . __( 'Pages:', 'techlauncher' ), 'after' => '</div>' ) ); ?>
							</div>
							<?php comments_template( '', true ); // show comments ?>
						</div>
					</div>	
				</div>	
			</div>
			<!--Sidebar Area-->
			<aside class="col-md-3 col-lg-3">
				<?php get_sidebar(); ?>
			</aside>
			<!--Sidebar Area-->
		</div>
	</div>
</main>
<?php
get_footer();