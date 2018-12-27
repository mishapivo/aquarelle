<?php
/**
 *
 * @package Simple Days
 */

function simple_days_post_order( $type , $single_sortable , $post_title_effects , $post) {

  if(is_front_page()){
    $switch['is_front_page'] = true ;
  }else{
    $switch['is_front_page'] = false ;
  }

  $format = get_post_format();

  if($type=='page'){
    $pwcat = false;
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    if ( is_plugin_active( 'pages-with-category-and-tag/pages-with-category-and-tag.php' ) ) $pwcat = true;
  }

  if(YAHMAN_ADDONS_PLUGIN){
    $yahman_addons_option = get_option('yahman_addons') ;
  }

  foreach ($single_sortable as $key => $section) {
    switch ($section){

      case 'breadcrumbs':

      if(!$switch['is_front_page']){
        if(get_theme_mod( 'simple_days_breadcrumbs_display','left') != 'none'){
          get_template_part( 'inc/breadcrumbs' );
        }
      }

      break;

      case 'title':
      if($format != 'aside' && $format != 'link' && $format != 'status'){
        get_template_part( 'template-parts/post',$section );
        $vf = 'simple_days_' . $section . '_' . $type;
        $vf($post_title_effects);
      }
      break;

      case 'date':

      if(!$switch['is_front_page']){
        get_template_part( 'template-parts/post',$section );
        $vf = 'simple_days_' . $section . '_' . $type;
        $vf();
      }

      break;

      case 'author':

      if(!$switch['is_front_page']){
        get_template_part( 'template-parts/post',$section );
        $vf = 'simple_days_' . $section . '_' . $type;
        $vf();
      }

      break;

      case 'pv':
      if(get_theme_mod( 'simple_days_popular_post',false) && get_theme_mod( 'simple_days_pageview','none') != 'none' && ( get_theme_mod( 'simple_days_pageview_logout',false) || is_user_logged_in() ) ){
        $count_key = '_simple_days_popular_posts_count_';
        $pv_count = get_post_meta($post->ID, $count_key.get_theme_mod( 'simple_days_pageview','none'), true);

        if($pv_count != ''){
          echo '<div class="page_view post_item"><i class="fa '.esc_attr(get_theme_mod( 'simple_days_pageview_icon','fa-signal')).'" aria-hidden="true"></i> '. $pv_count .'</div>';

        }


      }
      break;

      case 'thumbnail':
      if(has_post_thumbnail()){
        get_template_part( 'template-parts/post',$section );
        $vf = 'simple_days_' . $section . '_' . $type;
        $vf($format,$post_title_effects);
      }
      break;

      case 'content':
      echo '<article id="post_body" class="post_body clearfix post_item" itemprop="articleBody">';

        the_content();


      echo '</article>';

      break;

      case 'widget':
      if($type=='post'){
        $widget_name = 'under_post';
      }else{
        $widget_name = 'under_page';
      }
      
      if ( is_active_sidebar( $widget_name ) ) : ?>
        <aside class="post_widget post_item">
          <?php dynamic_sidebar( $widget_name ); ?>
        </aside>
      <?php endif;
      break;

      case 'page_link':

      get_template_part( 'template-parts/post',$section );

      break;



      case 'cta':
      if(!$switch['is_front_page']){
        $result = false;
        if($type=='post'){
          if( isset($yahman_addons_option['cta_social']['post']) )$result = true;
        }else{
          if( isset($yahman_addons_option['cta_social']['page']) )$result = true;
        }
        if($result){
          echo yahman_addons_cta_social();

        }
      }
      break;

      case 'share':
      if(!$switch['is_front_page']){
        $result = false;
        if($type=='post'){
          if( isset($yahman_addons_option['share']['post']) )$result = true;
        }else{
          if( isset($yahman_addons_option['share']['page']) )$result = true;
        }
        if($result){
          echo yahman_addons_social_share();
        }
      }
      break;

      case 'author_profile':
      if(!$switch['is_front_page']){
        $result = false;
        if($type=='post'){
          if(get_theme_mod( 'simple_days_posts_author_profile',true))$result = true;
        }else{
          if(get_theme_mod( 'simple_days_page_author_profile',false))$result = true;
        }
        if($result){
          get_template_part( 'inc/author','profile' );
          simple_days_author_profile();
        }
      }
      break;

      case 'related':
      if(!$switch['is_front_page']){
        if($type=='post' && get_theme_mod( 'simple_days_posts_related_post',true)){
          get_template_part( 'inc/related_posts' );
          simple_days_related_post();
        }elseif(get_theme_mod( 'simple_days_page_related_page',false) && $pwcat){
          get_template_part( 'inc/related_posts' );
          simple_days_related_page();
        }
      }
      break;

      case 'category':
      if(!$switch['is_front_page']){
        $result = false;
        if($type=='post'){
          $result = true;
          $category_icon = get_theme_mod( 'simple_days_posts_category_icon','fa-folder-o');
          $categories = get_the_category();
        }else{
          if($pwcat){
            $get_page_id = get_the_ID();
            $categories = get_the_category($get_page_id);
            if(!empty($categories)){
              $result = true;
              $category_icon = get_theme_mod( 'simple_days_page_category_icon','fa-folder-o');
            }
          }
        }
        if($result){
          echo '<div class="post_category post_item f_box f_wrap ai_c"><i class="fa '.esc_attr($category_icon).' mr10" aria-hidden="true"></i> ';
          foreach($categories as $category) {
            echo '<a href="'.esc_url(get_category_link($category->cat_ID)).'" rel="category" class="cat_tag_wrap fs13 fw6 box_shadow">'. esc_html($category->cat_name). '</a>';
          }
          echo '</div>';
          //the_category(' ');

        }
      }
      break;


      case 'tag':
      if(!$switch['is_front_page']){
        $result = false;
        if($type=='post'){
          if(has_tag())$result = true;
          $tag_icon = get_theme_mod( 'simple_days_posts_tag_icon','fa-tag');
        }else{
          if(has_tag() && $pwcat )$result = true;
          $tag_icon = get_theme_mod( 'simple_days_page_tag_icon','fa-tag');
        }
        if($result){
          echo '<div class="post_tag post_item f_box f_wrap ai_c" itemprop="keywords"><i class="fa '.esc_attr($tag_icon).' mr10" aria-hidden="true"></i> ';
          $tags = get_the_tags(get_the_ID());
          foreach($tags as $tag){
            echo '<a href="'.esc_url(get_tag_link($tag->term_id)).'" rel="tag" class="cat_tag_wrap fs13 fw6 box_shadow">'.esc_html($tag->name).'</a>';
          }
          echo '</div>';

        }
          //          the_tags('<i class="fa fa-tag" aria-hidden="true"></i> ', '');
      }
      break;

      case 'pagenation':
      if(!$switch['is_front_page']){
        get_template_part( 'template-parts/post',$section );
      }
      break;
      case 'comment':
      if(!$switch['is_front_page']){
        
        if ( comments_open() || get_comments_number() ){
          comments_template();
        }
      }
      break;






      default:
      
    }

    }//end foreach





  }


