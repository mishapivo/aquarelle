<?php
/**
 * Meritorious - content.php
 *
 * @package     Meritorious
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://luthemes.com)
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-thumbnail">
		<?php Benlumia007\Backdrop\Entry\display_entry_post_thumbnail(); ?>
	</div>
	<header class="entry-header">
		<?php Benlumia007\Backdrop\Entry\display_entry_title(); ?>
		<span class="entry-timestamp"><?php Benlumia007\Backdrop\Entry\display_entry_timestamp(); ?></span>
	</header>
	<div class="entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>
