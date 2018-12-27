<?php
/**
 * Template Name: Full-width Page Template, No Sidebar
 *
 * Description: Use this page template to remove the sidebar from any page.
 * @package Medipress
 */
?>

<?php get_header(); 
 
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
                <div class="col-sm-12 col-md-12">
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
                        <!-- comment -->
                        <div class="comment-box">
                            <?php 
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif; 
                            ?> 
                        </div>
                       <!-- End comment -->                 
                    <?php else :  
                        get_template_part( 'content-parts/content', 'none' );
                    endif; ?>
                </div>
            </div>
        </div>
    </main>
    <!-- Main Content Section -->
<?php get_footer(); ?>