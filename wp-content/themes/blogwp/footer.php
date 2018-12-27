<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#blogwp-content-wrapper -->
</div><!--/#blogwp-wrapper -->

<?php if ( !(blogwp_get_option('hide_footer_widgets')) ) { ?>
<?php if ( is_active_sidebar( 'blogwp-footer-1' ) || is_active_sidebar( 'blogwp-footer-2' ) || is_active_sidebar( 'blogwp-footer-3' ) || is_active_sidebar( 'blogwp-footer-4' ) ) : ?>
<div class='clearfix' id='blogwp-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='blogwp-container clearfix'>
<div class="blogwp-outer-wrapper">

<div class='blogwp-footer-block'>
<?php dynamic_sidebar( 'blogwp-footer-1' ); ?>
</div>

<div class='blogwp-footer-block'>
<?php dynamic_sidebar( 'blogwp-footer-2' ); ?>
</div>

<div class='blogwp-footer-block'>
<?php dynamic_sidebar( 'blogwp-footer-3' ); ?>
</div>

</div>
</div>
</div><!--/#blogwp-footer-blocks-->
<?php endif; ?>
<?php } ?>

<div class='clearfix' id='blogwp-footer'>
<div class='blogwp-foot-wrap blogwp-container'>
<div class="blogwp-outer-wrapper">

<?php if ( blogwp_get_option('footer_text') ) : ?>
  <p class='blogwp-copyright'><?php echo esc_html(blogwp_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='blogwp-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'blogwp' ), esc_html(date_i18n(__('Y','blogwp'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='blogwp-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'blogwp' ), 'ThemesDNA.com' ); ?></a></p>

</div>
</div>
</div><!--/#blogwp-footer -->

<?php wp_footer(); ?>
</body>
</html>