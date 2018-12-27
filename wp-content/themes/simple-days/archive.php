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
<main itemprop="mainContentOfPage" itemscope="itemscope" itemtype="https://schema.org/Blog">
  <div class="container m_con retaina_p0">
    <div class="contents index_contents f_box f_wrap<?php echo esc_attr($layout); ?>">
      <header class="archive_header box_shadow">
        <?php
        the_archive_title( '<h1 class="archive_title fs18">', '</h1>' );
        the_archive_description( '<div class="archive_description">', '</div>' );
        ?>
      </header>
      <?php
      if(have_posts()):
        //get_template_part( 'inc/breadcrumbs' );
        get_template_part( 'template-parts/content');

      else:
        get_template_part( 'template-parts/content', 'none' );
      endif; ?>
    </div>

    <?php if(SIMPLE_DAYS_SIDEBAR)get_sidebar(); ?>

  </div>
</main>
<?php get_footer();
