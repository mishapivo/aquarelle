<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package medipress
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
                            <div class="post">
                                <?php if(has_post_thumbnail()) : ?>
                                    <a href="<?php the_permalink(); ?>" class="post-img-link">
                                        <?php the_post_thumbnail('medipress-page-thumbnail'); ?>
                                    </a>
                                <?php endif; ?>
                        
                                <div class="abt-content">
                                    <?php the_content(); ?>                 
                                </div>
                            </div>
                        <?php endwhile; ?>
                         <!-- comments -->
                        <div class="comment-box">
                            <?php 
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif; 
                            ?> 
                        </div>
                        <!-- End comments -->                 
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