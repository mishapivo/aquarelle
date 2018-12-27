<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package CPMMagz
 */
get_header();
$hero = get_option('showcase-single-hero'); ?>
<div id="content" class="site-content">
  <div class="container">
    <div class="row">
      <div class="col l8 s12 m12">
        <div id="primary" class="content-area">
          <main class="site-main" id="main" role="main">
            <div class="post-header">
              <div class="card">
                <div class="card-header">
                  <h1 class="page-title"><span>   <?php esc_attr_e(' 404-', 'cpmmagz');?> </span>
                    <?php esc_attr_e(' Page Not Found.', 'cpmmagz');?>
                  </h1>
                </div>
                <div class="card-content">
                  <h4><?php esc_attr_e('It looks like nothing was found at this location. Maybe try a search below or', 'cpmmagz');?> <a href="<?php echo esc_url(home_url()); ?>"><?php esc_attr_e('return to homepage', 'cpmmagz');?></a></h4>
                  <?php get_search_form(); ?>
                </div>
              </div>
            </div>
            <div class="post-header">
              <div class="card">
                <div class="card-header">
                  <h1 class="page-title" ><?php esc_attr_e('Here are our latest articles...', 'cpmmagz');?> </h1>
                </div>
              </div>
            </div>
            <?php
            $args_404 = array(
             'post_type' => 'post',
             'orderby' => 'date',
             'order'   => 'DESC',
             'posts_per_page' => 5,

             );
            $query_404 = new WP_Query($args_404);
            if ($query_404->have_posts()) :

             $arr = array();

           while ($query_404->have_posts()) : $query_404->the_post();

           $arr[] = $post->ID;
           endwhile;
           endif;
           wp_reset_postdata();
           if (! empty($arr[0])) {
             $args_404_1 = array(
              'post_type' => 'post',
              'p'  => $arr[0],
              );
             $query_404_1 = new WP_Query($args_404_1);

             if ( $query_404_1->have_posts()) :
              while ( $query_404_1->have_posts() ) :
                $query_404_1->the_post();
              ?>
              <div class="card post-card news-big 404ured-card">

                <article <?php post_class(); ?>>
                  <div class="404ured-media">
                   <?php get_template_part('template-parts/content', get_post_format($post->ID)); ?>
                 </div>
                 <div class="card-desc">
                  <div class="card-content card-wrapper">
                    <header class="entry-header">
                     <span class="label waves-effect waves-light">
                      <?php  $category = cpmmagz_display_random_catname($post->ID, 'category'); ?>
                      <a href="<?php echo esc_attr($category['link']);?>" ><?php echo esc_attr( $category['name'] ); ?></a>
                    </span>
                    <h2><a href="<?php echo esc_url( get_permalink() );?>" title="<?php echo esc_attr( get_the_title() );?>"><?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 95)); ?></a></h2>
                    <span class="entry-meta">
                      <?php cpmmagz_meta_data($post); ?>
                    </span>
                  </header>
                  <!-- Entry Header -->
                  <div class="entry-content clearfix">
                   <p><?php  echo esc_attr(strip_shortcodes(wp_trim_words(get_the_content(), 28, '...'))); ?></p>
                 </div>
                 <!-- Entry Content -->
               </div>
               <!-- Card Content -->
             </div>
             <!-- Card Desc -->
           </article>
         </div><!-- Post Card -->
       <?php endwhile;
       endif;
       wp_reset_postdata();
     } ?>
     <div class="article-wrapper archive-wrapper">
      <?php
      $a = array();
      if (! empty($arr)) {
        foreach ($arr as $key => $value) {
         if ($key != 0) {
          $a[] = $value;
        }
      }
      if (! empty($a)) {
       $args_404_2 = array(
        'post_type' => 'post',
        'post__in'  => $a,
        );
       $query_404_2 = new WP_Query($args_404_2);
       if ($query_404_2->have_posts()) :
        while ($query_404_2->have_posts()) :
          $query_404_2->the_post();
        ?>
        <div class="card archive-card news-medium news-medium-big hoverable">
         <article <?php post_class(); ?> >
          <?php get_template_part('template-parts/content', get_post_format($post->ID)); ?>
          <div class="card-desc valign-wrapper">
           <div class="card-content">
             <h2><a href="<?php echo esc_url(get_permalink());?>" title="<?php echo esc_attr(get_the_title());?>"><?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 53)); ?></a></h2>
             <span class="entry-meta">
              <?php cpmmagz_meta_data($post); ?>
            </span>
            <span class="label waves-effect waves-light">
              <?php  $category = cpmmagz_display_random_catname($post->ID, 'category'); ?>
              <a href="<?php echo esc_url($category['link']); ?>" ><?php echo esc_attr($category['name']); ?></a>
            </span>
          </div>
        </div>
      </article>
    </div>
  <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php } ?>
<?php } ?>
</div>
<!-- Archive Wrapper -->
</main>
</div>
<!-- End Primary -->
</div>
<!-- End Col 8 -->
<div class="col l4 s12 m12 right">
  <?php get_sidebar(); ?>
</div>
<!-- Col 4 Sidebar -->
</div>
</div>
</div>
<?php get_footer(); ?>