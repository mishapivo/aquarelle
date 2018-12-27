<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div>

</div><!--/#greatwp-content-wrapper -->
</div><!--/#greatwp-wrapper -->


<?php if ( !(greatwp_get_option('hide_footer_widgets')) ) { ?>
<?php if ( is_active_sidebar( 'greatwp-footer-1' ) || is_active_sidebar( 'greatwp-footer-2' ) || is_active_sidebar( 'greatwp-footer-3' ) || is_active_sidebar( 'greatwp-footer-4' ) ) : ?>
<div class='clearfix' id='greatwp-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='greatwp-container clearfix'>
<div class="greatwp-outer-wrapper">

<div class='greatwp-footer-block-1'>
<?php dynamic_sidebar( 'greatwp-footer-1' ); ?>
</div>

<div class='greatwp-footer-block-2'>
<?php dynamic_sidebar( 'greatwp-footer-2' ); ?>
</div>

<div class='greatwp-footer-block-3'>
<?php dynamic_sidebar( 'greatwp-footer-3' ); ?>
</div>

<div class='greatwp-footer-block-4'>
<?php dynamic_sidebar( 'greatwp-footer-4' ); ?>
</div>

</div>
</div>
</div><!--/#greatwp-footer-blocks-->
<?php endif; ?>
<?php } ?>


<div class='clearfix' id='greatwp-footer'>
<div class='greatwp-foot-wrap greatwp-container'>
<div class="greatwp-outer-wrapper">

<?php if ( greatwp_get_option('footer_text') ) : ?>
  <p class='greatwp-copyright'><?php echo esc_html(greatwp_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='greatwp-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'greatwp' ), esc_html(date_i18n(__('Y','greatwp'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<p class='greatwp-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'greatwp' ), 'ThemesDNA.com' ); ?></a></p>

</div>
</div>
</div><!--/#greatwp-footer -->

<?php wp_footer(); ?>
</body>
</html>