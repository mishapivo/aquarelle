<?php
/**
 * The template part for displaying slider
 * @package Kindergarten Education
 * @subpackage kindergarten_education
 * @since 1.0
 */
?>
<div class="col-md-4 col-sm-4">
  <div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>    
    <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>  
    <div class="box-image">
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>
    </div>
    <div class="new-text">
      <p><?php the_excerpt();?></p>
    </div>
    <div class="postbtn">
      <a href="<?php the_permalink(); ?>"><?php esc_html_e('Veiw More','kindergarten-education'); ?></a>
    </div>
  </div>
</div>