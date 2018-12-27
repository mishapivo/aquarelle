<?php
//**************Add Other mime Support******************//
function cpmmagz_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  $mimes['mp3'] = 'audio/mpeg';
  $mimes['mp4'] = 'video/mp4';
  return $mimes;
}
add_filter('upload_mimes', 'cpmmagz_mime_types');

if (! function_exists('cpmmagz_the_featured_video')) {
    function cpmmagz_the_featured_video($content)
    {

        $ori_url = explode("\n", esc_html($content));
        $url = esc_url( $ori_url[0] );

        $w = get_option( 'embed_size_w' );
        if ( !is_single() )
            $url = str_replace( '448', $w, $url );

        if ( 0 === strpos( $url, 'https://' ) ) {
            $embed_url = wp_oembed_get( esc_url( $url ) );
            print_r($embed_url);
            $content = trim( str_replace( $url, '', esc_html( $content ) ) );
        }
        elseif ( preg_match ( '#^<(script|iframe|embed|object)#i', $url ) ) {
            $h = get_option( 'embed_size_h' );
            echo esc_url( $url );
            if ( !empty( $h ) ) {

                if ( $w === $h ) $h = ceil( $w * 0.75 );
                $url = preg_replace(
                    array( '#height="[0-9]+?"#i', '#height=[0-9]+?#i' ),
                    array( sprintf( 'height="%d"', $h ), sprintf( 'height=%d', $h ) ),
                    $url
                    );
                echo esc_url( $url );
            }

            $content = trim( str_replace( $url, '', $content ) );
        }
    }
}

    if (! function_exists('cpmmagz_all_taxonomy_name')) {
        function cpmmagz_all_taxonomy_name($post_id, $tax)
        {
            $taxonomy_names = wp_get_post_terms($post_id, $tax ,array("fields" => "all"));
            return $taxonomy_names;
        }
    }

    if (! function_exists('cpmmagz_all_taxonomy_link')) {
        function cpmmagz_all_taxonomy_link($post_id, $tax)
        {
            $taxonomy_id = wp_get_post_terms($post_id, $tax ,array("fields" => "ids"));
            return $taxonomy_id;
        }
    }

    if (! function_exists( 'cpmmagz_tag_link' )) {
        function cpmmagz_tag_link($tags, $tagid)
        {
            foreach ($tagid as $tid){
                $taglink = get_tag_link($tags->term_id);
            }
            ?>
            <span class="tags-links tagcloud label-small waves-effect waves-light">
                <a href="<?php echo esc_url($taglink);?>" rel="tag"><?php echo esc_attr($tags->name);?></a>
            </span>
            <?php
        }
    }

    if (! function_exists('cpmmagz_cat_names')) {
        function cpmmagz_cat_names($cat, $links)
        {
            foreach ($links as $value) {
                if ($value ==  $cat->term_id) {
                    $link = get_term_link($cat->term_id , 'category');
                }
            }
            ?>
            <span class="label waves-effect waves-light" >
                <a href="<?php echo esc_url( $link ); ?>"><?php echo esc_attr( $cat->name ); ?></a>
            </span>

            <?php
        }
    }

    if (! function_exists('cpmmagz_display_random_catname')) {
    //display category name randomly and links according to the category
        function cpmmagz_display_random_catname($post_id,$tax)
        {

            $taxonomy_names = wp_get_post_terms($post_id, $tax ,array("fields" => "all"));
            foreach ($taxonomy_names as $key => $name) {
                $random = rand(0, $key);
            }
            $test = $taxonomy_names[$random];

            $data = array(
                'name' => esc_attr( $test->name ),
                'link' => get_category_link( $test->term_id )
                );
            return $data;
        }
    }

    if (! function_exists('cpmmagz_display_category_name')) {
        function cpmmagz_display_category_name($cate_id)
        {
            return get_cat_name($cate_id);
        }
    }
//category link
    if (! function_exists('cpmmagz_cat_link_featured')) {
        function cpmmagz_cat_link_featured($post_id, $tax)
        {
            $terms = wp_get_post_terms($post_id, 'category');
            $hero = get_option('showcase-single-hero');
            foreach( $terms as $term){
               $t = $term->term_id;
               if( $t == $hero){
                   $link = get_category_link( $hero );
               }
           }
           ?>
           <span class="label waves-effect waves-light"><a href="<?php echo esc_url( $link );?>" ><?php echo esc_attr( $tax ); ?></a></span>
           <?php

           $link = get_term_link( $t, $tax);
           return $link;
       }
   }
//count comment
   if (! function_exists('cpmmagz_comment_count')) {
    function cpmmagz_comment_count($postid)
    {
        global $wpdb, $current_user;
        wp_get_current_user();
        $userId = $current_user->ID;
        $count = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}comments
            WHERE comment_post_ID = {$postid}");
        echo esc_attr(count($count));
    }
}
    //Remove comment notes after in commnet form
    if (! function_exists('cpmmagz_remove_comment_form_allowed_tags')) {
         add_filter('comment_form_defaults', 'cpmmagz_remove_comment_form_allowed_tags');
         function cpmmagz_remove_comment_form_allowed_tags($defaults)
         {

            $defaults['comment_notes_after'] = '';
            $defaults['comment_notes_before'] =   '<p class="comment-notes">' .
            __( 'Your email address will not be published.', 'cpmmagz' ) .'<br>'.esc_attr( __( 'Required fields are marked * ', 'cpmmagz') ).
            '</p>';
            return $defaults;

        }
    }
    //Modify text area of comment form
    if (! function_exists('cpmmagz_wpsites_modify_comment_form_text_area')) {
        add_filter('comment_form_defaults', 'cpmmagz_wpsites_modify_comment_form_text_area');
        function cpmmagz_wpsites_modify_comment_form_text_area($arg)
         {
            $arg['comment_field'] = '<div class="input-field">'.'<textarea placeholder=" " id="comment" name="comment" class="materialize-textarea">'.'</textarea>'.'<label for="textarea1">'.esc_attr( __( 'Comments', 'cpmmagz' )).'<span class="required">'.'*'.'</span>' .'</label>'.'</div>';
            $arg['title_reply'] ='<h3 class="reply-title">'.esc_attr( __('Leave a comment:', 'cpmmagz' ) ).'</h3>';
            return $arg;
        }
    }

if (! function_exists('cpmmagz_time_ago')) {
    function cpmmagz_time_ago($cpmmagz_time_ago, $post_id)
    {
        $pfx_date = get_the_date( 'Y-m-d' ,  $post_id );
        $cpmmagz_time_ago = strtotime($cpmmagz_time_ago);
        $cur_time = strtotime(date( 'd-m-Y H:i' ));
        $time_elapsed = $cur_time - $cpmmagz_time_ago;
        $seconds = $time_elapsed ;
        $minutes = round($time_elapsed / 60 );
        $hours = round($time_elapsed / 3600);
        $days = round($time_elapsed / 86400 );
        $weeks = round($time_elapsed / 604800);
        $months = round($time_elapsed / 2600640 );
        $years = round($time_elapsed / 31207680 );
            // Seconds
        if ($seconds <= 60) {
            return esc_attr( esc_attr( __( 'just now' ,  'cpmmagz' ) ) );
        }
            //Minutes
        else if ($minutes <=60){
            if ($minutes==1){
                return __( 'one minute ago' , 'cpmmagz' );
            }
            else {
                $wpad_min = "$minutes minutes ago";
                return $wpad_min;
            }
        }
                    //Hours
        else if ($hours <=24){
            if ($hours==1){
                return esc_attr( __( '1 hour ago' ,  'cpmmagz' ) );
            } else {
                $wpad_hr =  "$hours hrs ago";
                return $wpad_hr;
            }
        }
                    //Days
        else if ($days <= 6){
            if ($days==1){
                return esc_attr( __( 'yesterday' ,  'cpmmagz' ) );
            } else {
                $wpad_days = "$days days ago";
                return  $wpad_days;
            }
        }
                    //Weeks
        else {
            if ($days==7){
                return esc_attr( __( 'a week ago' ,  'cpmmagz') );
            } else {
                $wpad_week = $pfx_date;
                return $wpad_week;
            }
        }
    }
}

// Shorten title
if (! function_exists('cpmmagz_limit_title')) {
    function cpmmagz_limit_title($text, $chars_limit){
        // Change to the number of characters you want to display
        $chars_text = strlen($text);
        $text = $text." ";
        $text = substr($text,0,$chars_limit);
        $text = substr($text,0,strrpos($text,' '));
                // If the text has more characters that your limit,
                //add ... so the user knows the text is actually longer
        if ($chars_text > $chars_limit)
        {
            $text = $text."...";
        }
        return $text;
    }
}


/**
 * Extended Walker class for use with the MaterializeCSS
 */
class Cpmmagz_nav_menu_walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        $submenu = ($depth > 0) ? ' sub-menu' : '';
        $output    .= "\n$indent<ul class=\"dropdown-content$submenu\">\n";

    }
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $li_attributes = '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;

        // managing divider: add divider class to an element to get a divider before it.
        $divider_class_position = array_search('divider', $classes);
        if($divider_class_position !== false){
            $output .= "<li class=\"divider\"></li>\n";
            unset($classes[$divider_class_position]);
        }
        if( is_object($args)){
            $classes[] = ($args->has_children) ? 'dropdown' : '';
            $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
            $classes[] = 'menu-item-' . $item->ID;
            if($depth && $args->has_children){
                $classes[] = 'dropdown-submenu';
            }
            $li_activates = $item->ID;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
            $output .= $indent . '<li' . $value . $class_names .'>';
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $attributes .= ($args->has_children)        ? ' class="dropdown-button" data-activates="'. 'activates-'.$li_activates .'" ' : '';
            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ($depth == 0 && $args->has_children) ? ' <i class="fa fa-angle-down"></i></a>' : '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }

    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
        //v($element);
        if ( !$element )
            return;
        $id_field = $this->db_fields['id'];
        //display this element
        if ( is_array( $args[0] ) )
            $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
        else if ( is_object( $args[0] ) )
            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'start_el'), $cb_args);
        $id = $element->$id_field;
        // descend only when the depth is right and there are childrens for this element
        if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
            foreach( $children_elements[ $id ] as $child ){
                if ( !isset($newlevel) ) {
                    $newlevel = true;
                    //start the child delimiter
                    $cb_args = array_merge( array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                }
                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
            }
            unset( $children_elements[ $id ] );
        }
        if ( isset($newlevel) && $newlevel ){
            //end the child delimiter
            $cb_args = array_merge( array(&$output, $depth), $args);
            call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
        }
        //end this element
        $cb_args = array_merge( array(&$output, $element, $depth), $args);
        call_user_func_array(array(&$this, 'end_el'), $cb_args);
    }
}


if ( ! function_exists( 'cpmmagz_archive_link' ) ) {
    function cpmmagz_archive_link( $post ){
        $year = date('Y',strtotime($post->post_date));
        $month = date('m',strtotime($post->post_date));
        $day = date('d',strtotime($post->post_date));
        $hr = date('h',strtotime($post->post_date));
        $min = date('i',strtotime($post->post_date));
        $link = site_url('') . '/' . $year . '/' . $month . '?day=' . $day . '&hr=' . $hr . '&min=' . $min;
        return $link;
    }
}

if (! function_exists('cpmmagz_meta_data')) {
    function cpmmagz_meta_data($post){
        $author_id = $post->post_author;
        ?>
        <ul >
            <li><a href= "<?php echo esc_url( cpmmagz_archive_link($post) ); ?>"><i class="fa fa-clock-o"></i> <?php echo esc_attr( cpmmagz_time_ago($post->post_date, $post->ID) );?></a></li>
            <li><a href = "<?php echo esc_url( get_author_posts_url($author_id) ); ?>"><i class="fa fa-user"></i>By <?php echo esc_attr( get_the_author_meta('display_name',$post->post_author) ); ?></a></li>
            <li><a href = "<?php echo esc_url( get_comments_link($post->ID) ); ?>"><i class="fa fa-globe"></i> <?php echo esc_attr( get_comments_number($post->ID) );?> <?php esc_attr_e('Comments', 'cpmmagz'); ?></a></li>
        </ul>
        <?php
    }
}

if (! function_exists('cpmmagz_meta_data_highlights_homecategory_hot')) {
    function cpmmagz_meta_data_highlights_homecategory_hot($post)
    {
        ?>
        <ul>
            <li><a href = "<?php echo esc_url( cpmmagz_archive_link($post) ); ?>"><i class="fa fa-clock-o"></i><?php echo esc_attr(cpmmagz_time_ago($post->post_date, $post->ID));?></a></li>
            <li><a href = "<?php echo esc_url( get_comments_link($post->ID) ); ?>"><i class="fa fa-globe"></i><?php echo esc_attr(get_comments_number()); ?> <?php esc_attr_e('Comments', 'cpmmagz'); ?></a></li>
        </ul>
        <?php
    }
}

if (! function_exists( 'cpmmagz_meta_data_home_category_hot' )) {
    function cpmmagz_meta_data_home_category_hot($post)
    {
        ?>
        <span class="entry-meta"><a href="<?php echo esc_url( cpmmagz_archive_link($post) ); ?>"><i class="fa fa-clock-o"></i><?php echo esc_attr(cpmmagz_time_ago($post->post_date, $post->ID));?></a>
        </span>
        <?php
    }
}

if (! function_exists('cpmmagz_excerpt_more')) {
    function cpmmagz_excerpt_more($more)
     {
        return ' <div><a class="read-more waves-effect waves-light btn" href="' . esc_url( get_permalink( get_the_ID() ) ) . '">' .esc_attr( __( '  Read More...', 'cpmmagz' ) ) . '</a></div>';
    }
    add_filter( 'excerpt_more', 'cpmmagz_excerpt_more' );
}

if (! function_exists('cpmmagz_excerpt_length')) {
    function cpmmagz_excerpt_length($length)
    {
        return 23;
    }
}
add_filter('excerpt_length', 'cpmmagz_excerpt_length', 999);

if (! function_exists('cpmmagz_format_comment')) {
    function cpmmagz_format_comment($comment, $args, $depth)
    {
            $GLOBALS['comment'] = $comment;
        ?>
            <li>
                <article class="comment-body card hoverable">
                        <div class="row">
                            <div class="col s12">
                                <div class="comment-body-wrapper">
                                    <div class="comment-img round-img">
                                     <?php echo get_avatar( $comment ); ?>
                                 </div>
                                 <div class="comment-content-wrapper">
                                    <div class="comment-meta-wrap">
                                        <h2><a href="<?php echo esc_attr(get_comment_author_link()); ?>"><?php comment_author(); ?></a> <span class="says"><?php esc_attr_e( 'says', 'cpmmagz' ); ?></span></h2>
                                        <div class="comment-metadata">
                                            <a href="<?php echo esc_url( htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ); ?>">
                                                <time><?php printf(esc_attr( __('%1$s', 'cpmmagz') ), get_comment_date(), get_comment_time()) ?></time>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="comment-content">
                                     <?php if ( $comment->comment_approved == '0') : ?>
                                        <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'cpmmagz' ); ?></em><br />
                                    <?php endif; ?>
                                    <p><?php comment_text(); ?></p>
                                </div>
                                <div class="reply">
                                    <a href="#">
                                        <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div><!-- col s12 -->
                    </div><!-- row -->
                </article>
            </li>
<?php }
} //endof function exists comment

if (! function_exists('cpmmagz_social_icons')) {
    function cpmmagz_social_icons()
    {
        $facebook_link = get_theme_mod('facebook_link','http://www.facebook.com');
        $twitter_link = get_theme_mod('twitter_link','http://www.twitter.com');
        $youtube_link = get_theme_mod('youtube_link','http://www.youtube.com');
        $instagram_link = get_theme_mod('instagram_link','http://www.instagram.com');
        $linkedin_link = get_theme_mod('linkedin_link','http://www.linkedin.com');
        $pinterest_link = get_theme_mod('pinterest_link','http://www.pinterest.com');
        $googleplus_link = get_theme_mod('google+_link','http://www.plus.google.com');
        $tumblr_link = get_theme_mod('tumblr_link','http://www.tumblr.com');
        $wordpress_link = get_theme_mod('wordpress_link','http://www.wordpress.org');
        $dribble_link = get_theme_mod('dribble_link','http://www.dribble.com');
        $skype_link = get_theme_mod('skype_link','username');
        $mail_link = get_theme_mod('mail_link','example@domain.com');
        if( $facebook_link || $twitter_link || $youtube_link || $instagram_link || $linkedin_link || $pinterest_link || $googleplus_link || $tumblr_link || $skype_link || $mail_link )  { ?>
        <ul id="social-menu" class="social-nav cpmag-menu right">
          <?php if( !empty($facebook_link)) { ?>
          <li><a href="<?php echo esc_url( $facebook_link ); ?>" title="<?php esc_attr_e('Follow us on Facebook', 'cpmmagz');?>" class="fb-link" target="_blank"><span class="fa fa-facebook"></span></a></li>
          <?php } ?>

          <?php if( !empty($twitter_link)) { ?>
          <li><a href="<?php echo esc_url( $twitter_link );?>" title="<?php esc_attr_e('Follow us on Twitter', 'cpmmagz');?>" class="tw-link" target="_blank"><span class="fa fa-twitter"></span></a></li>
          <?php } ?>

          <?php if( !empty($googleplus_link)) { ?>
          <li><a href="<?php echo esc_url( $googleplus_link ); ?>" title="<?php esc_attr_e('Follow us on Google Plus', 'cpmmagz');?>" class="gp-link" target="_blank" ><span class="fa fa-google-plus"></span></a></li>
          <?php } ?>

          <?php if( !empty($youtube_link)) { ?>
          <li><a href="<?php echo esc_url( $youtube_link ); ?>" title="<?php esc_attr_e('Follow us on Youtube', 'cpmmagz');?>" class="yt-link" target="_blank"><span class="fa fa-youtube-play"></span></a></li>
          <?php } ?>

          <?php if( !empty($instagram_link)) { ?>
          <li><a href="<?php echo esc_url( $instagram_link ); ?>" title="<?php esc_attr_e('Follow us on Instagram', 'cpmmagz');?>" class="in-link" target="_blank" ><span class="fa fa-instagram"></span></a></li>
          <?php } ?>

          <?php if( !empty($pinterest_link)) { ?>
          <li><a href="<?php echo esc_url( $pinterest_link ); ?>" title="<?php esc_attr_e('Follow us on Pinterest', 'cpmmagz');?>" class="pin-link" target="_blank" ><span class="fa fa-pinterest"></span></a></li>
          <?php } ?>

          <?php if( !empty($wordpress_link)) { ?>
          <li><a href="<?php echo esc_url( $wordpress_link ); ?>" title="<?php esc_attr_e('Follow us on Wordpress', 'cpmmagz');?>" class="wp-link" target="_blank" ><span class="fa fa-wordpress"></span></a></li>
          <?php } ?>

          <?php if( !empty($dribble_link)) { ?>
          <li><a href="<?php echo esc_url( $dribble_link ); ?>" title="<?php esc_attr_e('Follow us on Dribble', 'cpmmagz');?>" class="db-link" target="_blank" ><span class="fa fa-dribbble"></span></a></li>
          <?php } ?>

          <?php if( !empty($linkedin_link)) { ?>
          <li><a href="<?php echo esc_url( $linkedin_link ); ?>" title="<?php esc_attr_e('Follow us on Linkedin', 'cpmmagz');?>" class="ln-link" target="_blank" ><span class="fa fa-linkedin"></span></a></li>
          <?php } ?>

          <?php if( !empty($tumblr_link)) { ?>
          <li><a href="<?php echo esc_url( $tumblr_link ); ?>" title="<?php esc_attr_e('Follow us on Tumblr', 'cpmmagz');?>" class="ln-link" target="_blank" ><span class="fa fa-tumblr"></span></a></li>
          <?php } if( !empty($skype_link)) { ?>
          <li><a href="callto:<?php echo esc_url( $skype_link ); ?>" title="<?php esc_attr_e('Follow us on Skype', 'cpmmagz');?>" class="ln-link" target="_blank" ><span class="fa fa-skype"></span></a></li>
          <?php } if( !empty($mail_link)) { ?>
          <li><a href="mailto:<?php echo esc_url( $mail_link ); ?>" title="<?php esc_attr_e('Mail Us', 'cpmmagz');?>" class="ln-link" target="_blank" ><span class="fa fa-envelope-o"></span></a></li>
          <?php } ?>
      </ul>
      <?php }
  }
}

if (! function_exists('cpmmagz_archive_query')) {

    function cpmmagz_archive_query($name='NULL')
    {
        $year = get_query_var('year');
        $month = get_query_var('monthnum');
        $day = get_query_var('day');
        global $wp_query;
        if (isset($_GET['hr']) || isset($_GET['min'])|| !empty($day) || !empty($month) || !empty( $year)){
            $date = array();
            if (! empty($year) ) {
                $date['year'] = $year;
            }

            if(! empty($month) ){
               $date['month'] = $month ;
           }

           if(! empty($day) ){
                $date['day'] =   $day;
            }

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $archive_args = array(
                'post_type' => 'post',
                'paged' => $paged,
                'date_query' => array(
                    $date
                    ),
                );
        }  else {
             $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
             $archive_args = array(
                'post_type' => 'post',
                'paged' => $paged,
                'tag' => str_replace( ' ', '-' , $name ),
                );
        }
        return  $archive_args ;
    }
}

if (! function_exists('cpmmagz_navigation_page')) {
    function cpmmagz_navigation_page()
    {
        ?>
        <div class="clearfix">
            <div class="left card pagination">
            <?php previous_posts_link('<i class="fa fa-angle-left"></i>&nbsp;&nbsp;&nbsp;'. esc_attr(  __('Previous Posts','cpmmagz'))); ?></div>
            <div class="right card pagination">
                <?php next_posts_link(esc_html( __('Next Posts','cpmmagz')).'&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-right"></i>'. ''); ?>
            </div>
        </div>
        <?php
    }
}

if (! function_exists('cpmmagz_header_search')) {
    function cpmmagz_header_search()
    {
        ?>
        <form autocomplete="on" id="nav-search" action="<?php echo esc_url(home_url( '/' )); ?>" role="search">
            <input id="search" name="s" type="text" placeholder="<?php esc_attr_e('What\'re we looking for ?','cpmmagz' ) ?>" >
            <input id="search_submit" value="<?php echo esc_attr(get_search_query()); ?>" type="submit" class="hide"  >
            <button type="submit" id="search_submit"><i class="fa fa-search"></i></button>
        </form>
        <?php
    }
}

    // turn Photon off so we can get the correct image
    $photon_removed = '';
    if (class_exists('Jetpack') && Jetpack::is_module_active('photon'))
    { // check that we are, in fact, using Photon in the first place
        remove_filter( 'image_downsize', array( Jetpack_Photon::instance(), 'filter_image_downsize' ) );
    }

if (! function_exists('cpmmagz_strip_url_content')){
    function cpmmagz_strip_url_content($posttype, $content_length)
    {
        $strip = explode( ' ' , strip_shortcodes(wp_trim_words($posttype->post_content  , $content_length)) );
        foreach ($strip as $key => $single){
            if (!filter_var($single, FILTER_VALIDATE_URL) === false) {
                unset($strip[$key]);
            }
        }
        return implode( ' ', $strip );
    }
}

if (! function_exists('cpmmagz_seperate_frame_src')) {
    function cpmmagz_seperate_frame_src($string)
    {
        $regex = '/https?\:\/\/[^\" ]+/i';
        preg_match_all($regex, $string, $matches);
        $urls = ($matches[0]);
        print_r('\<iframe src="'.$urls[0].'" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>');
    }
}

if (! function_exists('cpmmagz_small_news_card_image')) {
  function cpmmagz_small_news_card_image($post_id){
      $post_thumbnail_id = get_post_thumbnail_id( $post_id );
      $attachment = get_post( $post_thumbnail_id );
      $image_url = wp_get_attachment_image_src($post_thumbnail_id, 'cpmmagz-news-small-thumb');
          $image_url1 = $image_url[0];
      if ( has_post_format('video') ||   has_post_format('audio') ||   has_post_format('gallery')) {
        get_template_part('template-parts/content', get_post_format($post_id));
      }
      else {
        if ($image_url1) :
          // If the post has thumbnail
           ?>
           <div class="card-image valign-wrapper" data-bg="<?php echo esc_url( $image_url1 ); ?>">
            <a href="<?php echo esc_url(get_permalink());?>" class="fulla"></a>
            <span class="card-title"><i class="fa fa-pencil"></i></span>
          </div>
        <?php else : ?>
          <!-- If the Post doesnot have any thumbnail -->
          <div class="no-image card-image valign-wrapper">
            <a href="<?php the_permalink();?>" class="card-title"><i class="fa fa-picture-o"></i></a>
          </div>
  <?php endif; }

  }
}

if (! function_exists('cpmmagz_video_type')) {
    function cpmmagz_video_type($url) {
        if (strpos($url, 'youtube') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'youtu.be') > 0) {
            return 'youtube';
        }
        elseif (strpos($url, 'youtu\.be') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        } elseif (strpos($url, 'videopress') > 0) {
            return 'videopress';
        }
    }
}

if (! function_exists('cpmmagz_parse_yturl')) {
    function cpmmagz_parse_yturl($url)
    {
        $pattern = '#^(?:https?://|//)?(?:www\.|m\.)?(?:youtu\.be/|youtube\.com/(?:embed/|v/|watch\?v=|watch\?.+&v=))([\w-]{11})(?![\w-])#';
        preg_match($pattern, $url, $matches);
        return (isset($matches[1])) ? $matches[1] : false;
    }
}

if (! function_exists('cpmmagz_parse_vimeourl')) {
    function cpmmagz_parse_vimeourl($url) {

        $pattern = "/https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/";
        preg_match($pattern, $url, $matches);
        return (isset($matches[3])) ? $matches[3] : false;
    }
}

if (! function_exists('cpmmagz_video_url')) {

    function cpmmagz_video_url($post_id) {
        $content = trim(get_post_field('post_content', $post_id));
        $ori_url = explode("\n", esc_html($content));
        $url = esc_url( $ori_url[0] );
        $video_type = cpmmagz_video_type($url);
        $video_thumb = '';
        if ($video_type == 'youtube') {
          $link = $url;
          $parsed_url = cpmmagz_parse_yturl($link);

          $video_thumb = 'http://img.youtube.com/vi/'.$parsed_url.'/mqdefault.jpg';

        }
        else if ($video_type == 'vimeo') {
          $link = $url;
          $parsed_url = cpmmagz_parse_vimeourl($link);
          $hash = wp_remote_get("https://vimeo.com/api/v2/video/$parsed_url.php");
          $hash_body = wp_remote_retrieve_body($hash);
          $unserialized_hash = unserialize($hash_body);
          $video_thumb = $unserialized_hash[0]['thumbnail_medium'];
        }
        else if ($video_type == 'videopress'){
            $link = $url;
            $video_id = explode("v/", $link);
            $video_id = $video_id[1];

            $options  = array (
              'http' =>
              array (
                'ignore_errors' => true,
              ),
            );

        $context  = stream_context_create( $options );
        $hash = wp_remote_get('https://public-api.wordpress.com/rest/v1.1/videos/'.$video_id.'');
        $response = wp_remote_retrieve_body(
            $hash,
            false,
            $context
        );
        $response = json_decode( $response );
            $video_thumb = $response->poster;
        }

        return $video_thumb;
    }

}

if (!function_exists('cpmmagz_get_categories_select')) :
    function cpmmagz_get_categories_select()
  {
    $cpmmagz_categories = get_categories();
    $results = array();

    if (!empty($cpmmagz_categories)) :
      $results[''] = __('All','cpmmagz');
    foreach ($cpmmagz_categories as $result) {
      $results[$result->slug] = $result->name;
    }
    endif;
    return $results;
  }
endif;