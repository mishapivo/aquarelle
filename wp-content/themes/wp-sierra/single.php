<?php
/**
 * The default template for displaying single post
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */
 ?>
<?php get_header(); ?>
<?php do_action( 'wpsierra_before_container' ); ?>
  <?php while ( have_posts() ) : the_post(); ?>
    <?php wpsierra_single_post_header(); ?>
    <?php
    if ( class_exists( 'Kirki' ) ) {
      get_template_part( 'inc/blog-layout/single', get_theme_mod( 'post_layout', 'right-sidebar' ) );
    } else {
      get_template_part( 'inc/blog-layout/single', 'right-sidebar' );
    }
    ?>
  <?php endwhile; ?>
<?php do_action( 'wpsierra_after_container' ); ?>
<?php get_footer(); ?>
