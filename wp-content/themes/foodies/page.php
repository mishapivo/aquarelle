<?php get_header(); ?>
<main class="grid" id="main_section">
    <?php while (have_posts()) : the_post();
            $foodies_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <div class="" id="<?php echo esc_attr($post->ID); ?>" role="dialog" style="">
                <div class="modal-dialog">                
                  <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title recipeTitle" itemprop="name"><?php the_title(); ?></h2>
                    </div>
                      <div class="dishImage"><img src="<?php echo esc_url($foodies_url); ?>" alt=""></div>
                    <div class="modal-body">
                        <?php the_content();
                        comments_template('', true);
                        wp_link_pages( array(
                                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'foodies' ) . '</span>',
                                'after'       => '</div>',
                                'link_before' => '<span>',
                                'link_after'  => '</span>',
                                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'foodies' ) . ' </span>%',
                                'separator'   => '<span class="screen-reader-text">, </span>',
                            ) );
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'foodies' ),
                            'next_text'          => __( 'Next page', 'foodies' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'foodies' ) . ' </span>',
                        ) ); ?>
                    </div>
                </div>
                    <div class="modal-footer">
                    </div>
                  </div>
            </div>

    <?php endwhile;?>
</main>
<?php
get_sidebar();
get_footer();