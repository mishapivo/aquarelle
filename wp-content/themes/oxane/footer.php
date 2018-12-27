<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package oxane
 */
?>

	</div><!-- #content -->

	<?php get_sidebar('footer'); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info container">
			<a href="http://inkhive.com/" rel="nofollow">InkHive</a> / <a href="http://wp-templates.ru/" title="Шаблоны WordPress">WP</a> / <a href="http://builderbody.ru/" rel="nofollow" title="Бодибилдинг и фитнес - упражнения, тренировки, спортивное питание" target="_blank">Фитнес</a>
			<span class="sep"></span>
			<?php echo ( get_theme_mod('oxane_footer_text') == '' ) ? ('&copy; '.date_i18n( __( 'Y', 'oxane' ) ).' '.get_bloginfo('name').__('. All Rights Reserved. ','oxane')) : esc_html(get_theme_mod('oxane_footer_text')); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
