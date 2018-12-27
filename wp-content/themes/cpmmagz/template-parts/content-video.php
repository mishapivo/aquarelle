<?php
/**
 * The template for displaying posts for the Image Post Format
 *
 * @package CPMmagz
 *
 */
?>
<?php
    global $post;
    $content = $post->post_content;

    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $attachment = get_post($post_thumbnail_id);

    if (! is_single()) {

    ?>

        <!-- If the Post doesnot have any thumbnail -->
        <div class="card-image card-video">
            <div class="fit-video">
                 <?php
                    $content = trim(get_post_field('post_content', $post->ID));
                    $ori_url = explode("\n", esc_html($content));
                    $url =  $ori_url[0] ;
                    $url_type = explode(" ", $url);
                    $url_type = explode("[", $url_type[0]);
                    if (isset($url_type[1])){
                        $url_type_shortcode = $url_type[1];
                    }
                    $new_content =  get_shortcode_regex();
                    if (isset($url_type[1])){
                       if ( preg_match_all( '/'. $new_content .'/s', $post->post_content, $matches )
                            && array_key_exists( 2, $matches )
                            && in_array( $url_type_shortcode, $matches[2] )  )
                        {
                             echo do_shortcode($matches[0][0]);
                        }
                    }
                     else {
                        echo esc_html(cpmmagz_the_featured_video($content));
                     }
                ?>
            </div>
            <span class="card-title"><i class="fa fa-play"></i></span>
        </div>


    <?php  }  else {
        // If the page is single
        ?>

        <!-- If the Post doesnot have any thumbnail -->
        <div class="card-image card-video">
            <div class="fit-video">
                <?php
                    $content = trim(get_post_field('post_content', $post->ID));
                    $ori_url = explode("\n", esc_html($content));
                    $url =  $ori_url[0] ;
                    $url_type = explode(" ", $url);
                    $url_type = explode("[", $url_type[0]);
                    if (isset($url_type[1])){
                        $url_type_shortcode = $url_type[1];
                    }
                    $new_content =  get_shortcode_regex();
                    if (isset($url_type[1])){
                       if ( preg_match_all( '/'. $new_content .'/s', $post->post_content, $matches )
                            && array_key_exists( 2, $matches )
                            && in_array( $url_type_shortcode, $matches[2] )  )
                        {
                             echo do_shortcode($matches[0][0]);
                        }
                    }

                     else {
                        echo esc_html(cpmmagz_the_featured_video($content));
                     }

                ?>
            </div>
            <span class="card-title"><i class="fa fa-play"></i></span>
        </div>

    <?php  }?>
