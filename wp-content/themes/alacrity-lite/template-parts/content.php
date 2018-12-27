<?php
/**
 *
 * @package Alacrity Lite
 */
?>

<div class="blog_wrapper">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail() ){ ?>
  	<div class="post-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail();?></a>
	  </div>
    <?php }?>
    <div class="post-content">
    <header class="entry-header">
      <h2><a href="<?php the_permalink(); ?>" rel="bookmark">
        <?php the_title(); ?>
        </a></h2>
      <?php if ( 'post' == get_post_type() ) : ?>
      <div class="post-meta">
        <div class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date( get_option('date_format') ); ?></div> 
        <div class="post-author"><i class="fa fa-user"></i><a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta( 'ID' )));?>"> <?php the_author(); ?></a></div>
        <div class="post-comment"><i class="fa fa-comments"></i><a href="<?php esc_url(comments_link()); ?>"> <?php comments_number(); ?> </a></div>
        <div class="post-categories"><i class="fa fa-th-list"></i><?php the_category( __( ', ', 'alacrity-lite' )); ?></div>
      </div>
      <!-- postmeta -->
      <?php endif; ?>
    </header>
    <!-- .entry-header -->
    
    <?php if ( is_search() || !is_single() ) : // Only display Excerpts for Search ?>
    <div class="entry-summary">
      <?php echo esc_html(wp_strip_all_tags(alacrity_lite_excerpt(25)));?>
      <a class="read-more" href="<?php the_permalink(); ?>">
      <?php esc_html_e('+ Read More','alacrity-lite'); ?>
      </a> </div>
    <!-- .entry-summary -->
    <?php else : ?>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <!-- .entry-content -->
    <?php endif; ?>
    <div class="clear"></div>
  </div> <!-- .post-content-- >
  </article> <!-- #post-## --> 
</div><!-- .blog_wrapper -->