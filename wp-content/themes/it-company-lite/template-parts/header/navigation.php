<?php
/**
 * The template part for header
 *
 * @package IT Company Lite 
 * @subpackage it_company_lite
 * @since IT Company Lite 1.0
 */
?>

<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','it-company-lite'); ?></a></div>
<div id="header" class="menubar">
	<div class="nav">
		<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
	</div>
</div>