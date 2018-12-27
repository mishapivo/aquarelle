<?php
/**
 * The template part for displaying slider
 * @package Kindergarten Education
 * @subpackage kindergarten_education
 * @since 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="row">
    <div class="col-md-2 p-0">
      <div class="datebox">
        <div class="datewrap">
          <span class="date-day"><?php echo esc_html( get_the_date( 'd') ); ?></span>
        </div>
        <div class="month-yearwrap">
          <span class="date-month"><?php echo esc_html( get_the_date( 'M' ) ); ?></span>
          <span class="date-year"><?php echo esc_html( get_the_date( 'Y' ) ); ?></span>
        </div>
      </div>
    </div>
    <div class="col-md-10 inner-box">
      <div class="row">
        <div class="col-md-5">
          <div class="box-image">
            <?php 
              if(has_post_thumbnail()) { 
                the_post_thumbnail(); 
              }
            ?>
          </div>
        </div>
        <div class="<?php if(has_post_thumbnail()) { ?>col-md-7"<?php } else { ?>col-md-12"<?php } ?>">
          <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h3>      
          <div class="new-text">
            <p><?php the_excerpt();?></p>
          </div>
        </div>
      </div>
      <div class="row inner-box-cat-tag">
        <div class="col-md-6">
          <p class="cats"><span class="cats-1"><?php esc_html_e( 'Category: ','kindergarten-education' ); ?></span><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?>
          </p>
          <p class="tag">
            <span class="tags-1"><?php esc_html_e( 'Tags: ','kindergarten-education' ); ?></span><?php
              if( $tags = get_the_tags() ) {
                echo '<span class="meta-sep"></span>';
                foreach( $tags as $tag ) {
                  $sep = ( $tag === end( $tags ) ) ? '' : ' ';
                  echo '<a href="' . esc_url(get_term_link( $tag, $tag->taxonomy )) . '">#' . esc_html($tag->name) . '</a>' . esc_html($sep);
                }
              }
            ?>
          </p>        
        </div>
        <div class="col-md-6">
          <div class="postbtn">
            <a href="<?php the_permalink(); ?>"><?php esc_html_e('Veiw More','kindergarten-education'); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>