<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Medipress
 */
 get_header(); 

?>
<!--  Page-title -->

    <div class="grey-title">
        <div class="container">
            <div class="">
                <h2 class="title"><?php wp_title(''); ?></h2>
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