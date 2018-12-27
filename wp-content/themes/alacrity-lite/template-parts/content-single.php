<?php
/**
 *
 * @package Alacrity Lite
 */
?>
<div class="blog_wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>    
    <div class="post-content">
    <header class="entry-header">
      <h2><?php the_title(); ?></h2>
      <?php if ( 'post' == get_post_type() ) : ?>
      <div class="post-meta">
        <div class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date( get_option('date_format') );?></div> 
        <div class="post-author"> &nbsp;&nbsp; <i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta( 'ID' )));?>"> <?php the_author(); ?></a></div>
        <div class="post-comment"> &nbsp;&nbsp; <i class="fa fa-comments"></i><a href="<?php esc_url(comments_link()); ?>"> <?php comments_number(); ?> </a></div>
        <div class="post-categories"> &nbsp;&nbsp; <i class="fa fa-th-list"></i><?php the_category( __( ', ', 'alacrity-lite' )); ?> </div>
      </div>
      <!-- postmeta -->
      <?php endif; ?>
    </header>
    <!-- .entry-header -->    
   
    <div class="entry-content">
      <?php the_content(); wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'alacrity-lite' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'alacrity-lite' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) );

      ?>
    </div>

   <!-- .entry-content -->
    <div class="clear"></div>
  </div> <!-- .post-content-- >
  </article> <!-- #post-## --> 
</div><!-- .blog_wrapper -->