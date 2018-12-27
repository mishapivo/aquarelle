<?php

get_header();

$mainDivCols = materialize_template_main_col_number();
?>

    <main role="main">
        <div class="white" style="background-color: #<?php background_color(); ?>!important; background-image: url(<?php background_image(); ?>); background-size: cover;">
            <div class="row container">
                <?php get_sidebar('left-sidebar'); ?>
                <div class="col s12 l<?php echo $mainDivCols; ?>">
                    <div class="site-main masonry-gallery">

                        <?php if ( have_posts() ) : ?>

                            <?php if ( is_home() && ! is_front_page() ) : ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                            <?php endif; ?>

                            <?php

                            // Previous/next page navigation.
                            the_posts_pagination( array(
                                'prev_text'          => '<i class="material-icons">skip_previous</i>',
                                'next_text'          => '<i class="material-icons">skip_next</i>',
                                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'materialize-template' ) . ' </span>',
                            ) );

                            // Start the loop.
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', get_post_format() );

                                // End the loop.
                            endwhile;


                        // If no content, include the "No posts found" template.
                        else :
                            get_template_part( 'template-parts/content', 'none' );

                        endif;
                        ?>

                    </div><!-- .site-main -->
                    <div class="row">
                        <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => '<i class="material-icons">skip_previous</i>',
                            'next_text'          => '<i class="material-icons">skip_next</i>',
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'materialize-template' ) . ' </span>',
                        ) );
                        ?>
                    </div>

                </div>
                <?php get_sidebar('right-sidebar'); ?>
            </div>
        </div>
    </main>



<?php
get_footer();
?>