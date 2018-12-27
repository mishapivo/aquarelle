<?php
/**
 * Backdrop Core (primary.php)
 *
 * @package        Backdrop
 * @copyright      Copyright (C) 2018. Benjamin Lu
 * @license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author         Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Benlumia007\Backdrop\Menu;

/**
 *  Table of Content
 *
 *  1.0 - Primary Menu
 */

/**
 *  1.0 - Primary Menu
 */
function display_primary() {
	if ( has_nav_menu( 'primary' ) ) { ?>
		<div class="main-navigation">
			<nav id="site-navigation" class="primary-navigation">
				<button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'meritorious' ); ?></button>
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'nav-menu',
						)
					);
				?>
			</nav>
		</div>
		<?php
	}
}
