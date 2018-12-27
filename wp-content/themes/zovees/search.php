<?php
/**
* The template for displaying search results pages.
* @package Zovees
*/
get_header();
?>

<div class="banner-area banner-bg-1 ptb-100 bg-opacity-black-80 text-center" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="banner-wrapper">
                	<?php if ( have_posts() ) : ?>
						<h2> 
							<?php 
							/* translators: %s: search term */
							printf( esc_html__( 'Search Results for : %s', 'zovees' ), '<span>' . get_search_query() . '</span>' ); ?>
						</h2>
					<?php else : ?>
						<h2><?php
							/* translators: %s: nothing found term */
							printf( esc_html__( 'Nothing Found for: %s', 'zovees' ), '<span>' . get_search_query() . '</span>' ); ?>
						</h2>
					<?php endif; ?>                           
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Start Main content Wrapper -->
<div class="main-content-wrapper">
	<div class="content-section ptb-100 gray-bg clearfix">
		<div class="container">
	        <div class="row">
	            <div class="col-md-9 col-sm-9">
					<?php if(have_posts()) :
				    	while(have_posts()) : the_post(); ?>
				        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					        <?php get_template_part('inc/templates/content'); ?>
				        </div>
				    <?php endwhile; ?>
                    <!-- pagination -->
                    <div class="pagination-area text-center">
                        <?php the_posts_pagination(
                            array(
                              'prev_text' =>esc_html__('&laquo;','zovees'),
                              'next_text' =>esc_html__('&raquo;','zovees')
                            )
                        ); ?>
                    </div>

                    <?php endif; ?>
                </div>
				<!-- Sidebar -->
				<div class="col-md-3 col-sm-3">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Main Content Section -->
<?php get_footer(); ?>