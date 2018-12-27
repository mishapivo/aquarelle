<?php
/**
 * ************************************************************************************************************************
 * Meritorious - content-single.php
 * ************************************************************************************************************************
 *
 * @package     Meritorious
 * @copyright   Copyright (C) 2018. Benjamin Lu
 * @license     GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author      Benjamin Lu (https://luthemes.com)
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php Benlumia007\Backdrop\Entry\display_entry_post_thumbnail(); ?>
	<header class="entry-header">
		<?php Benlumia007\Backdrop\Entry\display_entry_title(); ?>
	</header>
	<div class="entry-metadata">
		<?php Benlumia007\Backdrop\Entry\display_entry_posted_on(); ?>
	</div>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages(
				array(
					'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'meritorious' ),
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'meritorious' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">,</span> ',
				)
			);
		?>
	</div>
	<div class="entry-taxonomies">
		<?php Benlumia007\Backdrop\Entry\display_entry_taxonomies(); ?>
	</div>
</article>
