<?php
/**
 *
 * @package Simple Days
 */

$mod_value = array(
  'layout' => get_theme_mod( 'simple_days_index_layout_list','list'),
  'date_format' => get_theme_mod( 'simple_days_top_date_format','1'),
  'more_link_class' => get_theme_mod( 'simple_days_read_more_position','right'),
  'date_position' => get_theme_mod( 'simple_days_index_date_position','left'),
  'thumbnail_position' => get_theme_mod( 'simple_days_index_thumbnail','left'),
  'category_position' => get_theme_mod( 'simple_days_index_category_position','right'),
  'excerpt_length' => get_theme_mod( 'simple_days_excerpt_length_customize','150'),
  'excerpt_ellipsis' => get_theme_mod( 'simple_days_excerpt_ellipsis','&hellip;'),
  'typical' => get_theme_mod( 'simple_days_index_typical','original'),
  'sidebar' => get_theme_mod( 'simple_days_sidebar_layout','3'),
  'index_list_position' => get_theme_mod( 'simple_days_index_list_widget_position','after'),
  'index_list_num' => get_theme_mod( 'simple_days_index_list_widget_number',3),
);
$pc_list = '';
if($mod_value['layout'] == 'list' ){
  $mod_value['layout'] = ' lo_list';
  $pc_list = ' p_c_list';
}elseif($mod_value['layout'] == 'grid3' ){
  $mod_value['layout'] = ' lo_grid3';
}elseif($mod_value['layout'] == 'grid2' ){
  $mod_value['layout'] = ' lo_grid2';
}else{
  $mod_value['layout'] = '';
}


$i = 1;

$col = $list_card = '';
if($mod_value['layout'] == ' lo_list' ){
  $col = '110';
  $list_card = ' list_card';
}

while(have_posts()): the_post();?>

  <article itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting" <?php post_class('post_card f_box f_col'.$col.$list_card.' box_shadow' ); ?>>
   <header>
     <?php get_template_part( 'inc/header_meta','microdata' );?>
   </header>

   <?php if($mod_value['thumbnail_position'] != 'none'){ ?>
    <div class="post_card_thum<?php echo esc_attr($pc_list); ?>">
      <a href="<?php the_permalink(); ?>" class="fit_box_img_wrap post_card_thum_img">
        <?php

        $thumurl = simple_days_get_thumbnail( '' , 'medium' , $post);
        $title = get_the_title();
        echo '<'.( (YA_AMP )?'amp-img layout="responsive"':'img').' src="'.esc_url($thumurl[0]).'"  width="'.esc_attr($thumurl[1]).'" height="'.esc_attr($thumurl[2]).'" class="scale_13 trans_10" alt="'.get_the_title().'" title="'.get_the_title().'" />';
        ?>
      </a>
      <?php
      if($mod_value['thumbnail_position'] != 'none' && $mod_value['typical'] == 'original'){
        simple_days_index_category($mod_value['category_position']);
        simple_days_index_date($mod_value['date_position'],$mod_value['date_format']);
      }
      ?>
    </div>
  <?php  } ?>
  <div class="post_card_meta w100 f_box f_col jc_sa">
    <h2 class="post_card_title"><?php if(is_sticky())echo '<span class="sticky_icon"><i class="fa fa-thumb-tack" aria-hidden="true"></i> </span>';?><a href="<?php the_permalink(); ?>" class="entry_title" title="<?php the_title(); ?>"><?php echo esc_attr(mb_strimwidth(get_the_title(), 0, 48 ,'&hellip;')); ?></a></h2>
    <?php
    if($mod_value['typical'] == 'typical'){
      ?>
      <div class="typical"><span><i class="fa fa-calendar-check-o" aria-hidden="true"></i> <?php esc_html(the_date()); ?></span> <span><i class="fa fa-folder-o" aria-hidden="true"></i> <?php simple_days_index_category_typical($mod_value['category_position']); ?></span></div>
      <?php
    }
    ?>
    <?php
    $itemprop = ( is_search() ? 'description' : 'articleBody'); ?>

    <div class="summary" itemprop="<?php echo esc_attr($itemprop); ?>">
      <?php
      echo mb_strimwidth( wp_strip_all_tags(strip_shortcodes(get_the_content()), true), 0 , absint( $mod_value['excerpt_length'] ), $mod_value['excerpt_ellipsis'] );
    //the_excerpt(); ?>

  </div>
  <?php if($mod_value['more_link_class'] != 'none'){ ?>
    <div class="more_read_box">
      <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"  class="more_read fs14 dib non_hover trans_10"><?php echo esc_html__( 'Read More', 'simple-days' ); ?> <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
    </div>
  <?php } ?>
  <?php
  if($mod_value['thumbnail_position'] == 'none' && $mod_value['typical'] == 'original'){
    simple_days_index_category($mod_value['category_position']);
    simple_days_index_date($mod_value['date_position'],$mod_value['date_format']);
  }
  ?>

</div>

</article>
<?php
if ( is_active_sidebar( 'index_list' ) ){
  if( ($mod_value['index_list_num'] == $i && $mod_value['index_list_position'] == 'after') || ( $i % $mod_value['index_list_num'] == 0 && $mod_value['index_list_position'] == 'every') ){ ?>
    <article class="in_feed post_card f_box f_col<?php echo esc_attr($list_card); ?> box_shadow">
     <?php dynamic_sidebar( 'index_list' ); ?>
   </article>
   <?php
 }
}
++$i;
endwhile;


get_template_part( 'template-parts/content', 'pagination' );

function simple_days_index_category($category_position){
 if($category_position == 'none') return;
 $category = get_the_category();
 if(!empty($category)){
   echo '<a href="' . esc_url(get_category_link( $category[0]->term_id )) . '" class="post_card_category non_hover">' . esc_html($category[0]->cat_name) . '</a>';
 }
}

function simple_days_index_date($date_position,$date_format){
 if($date_position == 'none' || is_sticky()) return; ?>

 <div class="post_date_circle fs16 posi_ab ta_c">
   <?php if($date_format == "1" ){ ?>
     <span class="day db fs15"><?php echo esc_html(get_the_time('j')); ?></span>
     <span class="month db fs14"><?php echo esc_html(get_the_time('M')); ?></span>
   <?php }else{ ?>
     <span class="month db fs15"><?php echo esc_html(get_the_time('M')); ?></span>
     <span class="day db fs14"><?php echo esc_html(get_the_time('j')); ?></span>
   <?php } ?>
   <span class="year db fs10"><?php echo esc_html(get_the_time('Y')); ?></span>
 </div>

 <?php
}

function simple_days_index_category_typical($category_position){
 if($category_position == 'none') return;
 $category = get_the_category();
 if(!empty($category)){
   echo '<a href="' . esc_url(get_category_link( $category[0]->term_id )) . '">' . esc_html($category[0]->cat_name) . '</a>';
 }
}
