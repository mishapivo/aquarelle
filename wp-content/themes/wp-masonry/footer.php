<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div><!--/#wp-masonry-content-wrapper -->
</div><!--/#wp-masonry-wrapper -->
</div>

<div class="wp-masonry-outer-wrapper">
<?php wp_masonry_bottom_wide_widgets(); ?>
</div>

<?php if ( !(wp_masonry_get_option('hide_footer_widgets')) ) { ?>
<?php if ( is_active_sidebar( 'wp-masonry-footer-1' ) || is_active_sidebar( 'wp-masonry-footer-2' ) || is_active_sidebar( 'wp-masonry-footer-3' ) || is_active_sidebar( 'wp-masonry-footer-4' ) ) : ?>
<div class='clearfix' id='wp-masonry-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='wp-masonry-container clearfix'>
<div class="wp-masonry-outer-wrapper">

<div class='wp-masonry-footer-block'>
<?php dynamic_sidebar( 'wp-masonry-footer-1' ); ?>
</div>

<div class='wp-masonry-footer-block'>
<?php dynamic_sidebar( 'wp-masonry-footer-2' ); ?>
</div>

<div class='wp-masonry-footer-block'>
<?php dynamic_sidebar( 'wp-masonry-footer-3' ); ?>
</div>

<div class='wp-masonry-footer-block'>
<?php dynamic_sidebar( 'wp-masonry-footer-4' ); ?>
</div>

</div>
</div><!--/#wp-masonry-footer-blocks-->
</div>
<?php endif; ?>
<?php } ?>

<div class='clearfix' id='wp-masonry-footer'>
<div class='wp-masonry-foot-wrap wp-masonry-container'>
<div class="wp-masonry-outer-wrapper">
<?php if ( wp_masonry_get_option('footer_text') ) : ?>
  <p class='wp-masonry-copyright'><?php echo esc_html(wp_masonry_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='wp-masonry-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'wp-masonry' ), esc_html(date_i18n(__('Y','wp-masonry'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='wp-masonry-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'wp-masonry' ), 'ThemesDNA.com' ); ?></a></p>
</div>
</div><!--/#wp-masonry-footer -->
</div>

<?php wp_footer(); ?>
</body>
</html>