<?php
/**
 * Social Navigation
 *
 * @package        Backdrop Core
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
function display_social() {
	if ( has_nav_menu( 'social' ) ) { ?>
		<nav id="site-social" class="site-social">
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'social',
						'container'       => 'nav',
						'container_id'    => 'menu-social',
						'container_class' => 'menu-social',
						'menu_id'         => 'menu-social-items',
						'menu_class'      => 'menu-items',
						'depth'           => 1,
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
						'fallback_cb'     => '',
					)
				);
			?>
		</nav>
		<?php
	}
}
