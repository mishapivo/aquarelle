<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Shuban
 */

?>

			</div><!-- #content -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.st-content-area -->

	<?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
	<div id="footer-instagram">
		<?php dynamic_sidebar( 'sidebar-footer' ) ?>
	</div>
	<?php endif; ?>

	<div class="st-footer-area">

		<div class="container">
			<footer id="colophon" class="site-footer row" role="contentinfo">

				<aside class="shuban-footer" role="complementary">
					<?php if ( is_active_sidebar( 'first-footer' ) ) : ?>
					    <div class="col-md-4 widget-area">
					        <?php dynamic_sidebar( 'first-footer' ); ?>
					    </div><!-- .first .widget-area -->
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'second-footer' ) ) : ?>
					    <div class="col-md-4 widget-area">
					        <?php dynamic_sidebar( 'second-footer' ); ?>
					    </div><!-- .second .widget-area -->
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'third-footer' ) ) : ?>
					    <div class="col-md-4 widget-area">
					        <?php dynamic_sidebar( 'third-footer' ); ?>
					    </div><!-- .third .widget-area -->
					<?php endif; ?>

				</aside><!-- #shuban-footer -->

			</footer><!-- #colophon -->
		</div>
		<!-- /.container -->

		<div class="site-info">

			<div class="container">
				<footer id="colophon" class="site-footer row" role="contentinfo">
					<div class="col-md-6 text-left">
						<h6 class="mb-0"><?php echo wp_kses_post(get_theme_mod('shuban_footer_text_left', '&copy; Copyright 2017 - All Rights Reserved')); ?></h6>
					</div>

					<div class="col-md-6 text-right">
						<h6 class="mb-0"><a href="https://themes.salttechno.com">Themes</a> - <a href="https://rastenievod.com/" rel="nofollow" title="Комнатные цветы и растения, садовые цветы и их названия" target="_blank">Rastenievod.com</a></h6>
					</div>
				</footer><!-- #colophon -->
			</div>
			<!-- /.container -->
		</div><!-- .site-info -->
	</div>
	<!-- /.st-footer-area -->

	<div class="scroll-to-top">
		<i class="fa fa-arrow-up"></i>
	</div>
	<!-- /.scroll-to-top -->


</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
