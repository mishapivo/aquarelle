<?php get_header();
$layout =get_theme_mod( 'simple_days_index_layout_list','list');
if($layout == 'list' ){
  $layout = ' lo_list';
}elseif($layout == 'grid3' ){
  $layout = ' lo_grid3';
}elseif($layout == 'grid2' ){
  $layout = ' lo_grid2';
}else{
  $layout = '';
}
?>
<div class="container m_con retaina_p0">
  <main class="contents index_contents f_box f_wrap<?php echo esc_attr($layout); ?>" itemprop="mainContentOfPage" itemscope="itemscope" itemtype="https://schema.org/Blog">
    <?php
    if(have_posts()):

      get_template_part( 'template-parts/content' );

    else:

      get_template_part( 'template-parts/content', 'none' );

    endif;?>
  </main>
  <?php if(SIMPLE_DAYS_SIDEBAR)get_sidebar(); ?>
</div>
<?php get_footer();
