<?php
function st_blog_ticker() {
    
    global $st_blog_customizer_all_values;
    $blog_times_slecet_category_post =  $st_blog_customizer_all_values['st-blog-ticker-category-post'];

    if( 1 == $st_blog_customizer_all_values['st-blog-enable-ticker'] ) { ?>
        <div class="additional-sections-">
            <div class="st-blog-vticker-wrap">
                <?php  
                if(0  != $blog_times_slecet_category_post  ) {   
                    $cat_post_array = array(
                        'post_type'           =>'post',
                        'posts_per_page'      => 5,
                        'cat'                 => absint($blog_times_slecet_category_post),
                        'orderby'             => 'DESC',  
                        'ignore_sticky_posts' => 1
                    );
                } ?>
                <div class="container">
                    <div class="st-blog-vticker">
                        <ul>
                        <?php
                            $ticker_category = new WP_Query($cat_post_array);
                            if(  $ticker_category->have_posts() ) :
                                while($ticker_category->have_posts() ) :
                                    $ticker_category->the_post(); ?>
                                    <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                                <?php endwhile;
                                wp_reset_postdata();
                            endif;
                          ?>
                        </ul>
                            
                    </div>         
                </div>
            </div>
        </div>

    <?php }
}
if ( !function_exists('st_blog_additional_section_main') ) :

     /**
     * additional section main
     *
     * @since st-blog 1.0.0
     *
     * @param null
     * @return null
     *
     */

    function  st_blog_additional_section_main()
    {
        if(st_blog_ticker_position() == 'ticker_content')
            st_blog_ticker();
    }
endif;
add_action('st_blog_homepage_additional_section_main','st_blog_additional_section_main',20);
