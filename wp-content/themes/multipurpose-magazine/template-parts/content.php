<?php
/**
 * The template part for displaying post
 * @package Multipurpose Magazine
 * @subpackage multipurpose_magazine
 * @since 1.0
 */
?>
<div class="blog-sec animated fadeInDown">
  <?php if(has_post_thumbnail()) { ?>
    <div class="mainimage">    
      <?php the_post_thumbnail(); ?>      
    </div>
    <div class="post-info">
      <div class="dateday"><?php echo esc_html( get_the_date( 'd') ); ?></div>
      <hr class="metahr m-0 p-0">
      <div class="month"><?php echo esc_html( get_the_date( 'M' ) ); ?></div>
      <div class="year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></div>
    </div>
  <?php }?>
  <h3><a href="<?php echo esc_url(get_permalink() ); ?>"><?php the_title(); ?></a></h3>
  <p><?php the_excerpt(); ?></p>
  <div class="blogbtn">
    <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read Full', 'multipurpose-magazine' ); ?>"><?php esc_html_e('Read Full','multipurpose-magazine'); ?></a>
  </div>
</div>