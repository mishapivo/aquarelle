<?php
/**
 * Meritorious (footer.php)
 *
 * The (footer.php) template file contains all of the codes that will render in the footer. This file is a template partial,
 * which uses get_footer(); to render only the footer and should not include any contents.
 *
 * @package     Meritorious
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://getbenonit.com)
 */

?>
	</section>
	<footer id="footer" class="site-footer">
		<div class="site-info">
			<?php
				printf(
					// Translators: 1 = Date, 2 = Site Link.
					esc_html__( 'Copyright &#169; %1$s. %2$s', 'meritorious' ),
					absint( date_i18n( 'Y' ) ),
					Benlumia007\Backdrop\Site\output_site_link()
				); // WPCS XSS OK.
				?>
			<br />
			<?php
				printf(
					// Translators: 1 = WordPress Link, 2 = Theme Link.
					esc_html__( 'Powered By %1$s and %2$s', 'meritorious' ),
					Benlumia007\Backdrop\Site\output_wp_link(),
					Benlumia007\Backdrop\Site\output_theme_link()
				); // WPCS XSS OK.
				?>
		</div>
	</footer>
</section>
<?php wp_footer(); ?>
</body>
</html>
