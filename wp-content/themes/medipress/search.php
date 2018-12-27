<?php
/**
 * The template for displaying search results pages.
 *
 * @package Medipress
 */
get_header();

?>
   <div class="grey-title">
        <div class="container">
            <div class="text-center">
              <?php if ( have_posts() ) : ?>
                <h2> 
                   <?php 
                    /* translators: %s: search term */
                    printf( esc_html__( 'Search Results for : %s', 'medipress' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h2>
              <?php else : ?>
                <h2><?php
                    /* translators: %s: nothing found term */
                    printf( esc_html__( 'Nothing Found for: %s', 'medipress' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h2>
              <?php endif; ?>
            </div>
        </div>
    </div>

    
<!-- End page-title -->


<!-- Main Content Section -->
  	
			
	<main class="main-blog start-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <?php if(have_posts()) : ?>
                        <?php while(have_posts()) : the_post(); ?>
                            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <?php get_template_part('content-parts/content', get_post_format()); ?>
                            </div>
                        <?php endwhile; ?>
                        <!-- pagination -->

                        <div class="post-pagination">
                            <?php the_posts_pagination(
                                array(
                                    'prev_text' =>esc_html__('&laquo;','medipress'),
                                    'next_text' =>esc_html__('&raquo;','medipress')
                                        )
                                    ); ?>
                        </div>
                        <!-- End pagination -->                 
                    <?php else :  
                        get_template_part( 'content-parts/content', 'none' );
                    endif; ?>
                </div>
                <div class="col-sm-4 col-md-3">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </main>
<!-- Main Content Section -->
<?php get_footer(); ?>