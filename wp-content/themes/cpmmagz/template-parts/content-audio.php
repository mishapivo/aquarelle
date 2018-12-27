<?php
/**
 * Template part for displaying audio post.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Cpmmagz Pro
 */
    global $post;
?>
<div class="card-image card-audio">
    <div class="fit-audio fit-video">
        <?php
            $content = trim(  get_post_field('post_content', $post->ID) );
            $new_content =  preg_match_all("/\[[^\]]*\]/", $content, $matches);
            if( $new_content){
                echo do_shortcode( $matches[0][0] );
            }
            else{
                echo esc_attr($content);
            }
        ?>
    </div>
    <span class="card-title"><i class="fa fa-music"></i></span>
</div>