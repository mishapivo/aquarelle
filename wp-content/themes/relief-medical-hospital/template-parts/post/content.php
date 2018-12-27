<?php
/**
 * The template part for displaying post
 * @package Relief Medical Hospital 
 * @subpackage relief_medical_hospital
 * @since 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-wrap">
    <div class="box-image">
      <?php 
        if(has_post_thumbnail()) {
          the_post_thumbnail(); 
        }
      ?>
    </div>    
    <div class="post-main">
      <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>
      <div class="adminbox">        
        <i class="fas fa-user"></i><span class="entry-author"> <?php the_author(); ?> </span>
        <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( esc_html__('0 Comments','relief-medical-hospital'), esc_html__('0 Comments','relief-medical-hospital'), esc_html__('0 % Comments','relief-medical-hospital')); ?>
        </span>
      </div>    
      <div class="new-text">
        <?php the_excerpt();?>
      </div>
      <div class="continue-read">
        <a href="<?php the_permalink(); ?>"><span><?php esc_html_e('READ MORE...','relief-medical-hospital'); ?></span></a>
      </div>
    </div>
  </div>
</div>