<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Galway Lite
 */

?>
<div class="entry-content">
    <div class="pb-30 mb-40 twp-article-wrapper clearfix">
<?php if (!is_single()) {?>
	<header class="entry-header">
	                <div class="entry-meta entry-inner">
	<?php
	galway_lite_posted_details();?>
	</div><!-- .entry-meta -->
	            </header><!-- .entry-header -->
	<?php }?>
        <?php
$image_values = get_post_meta($post->ID, 'galway-lite-meta-image-layout', true);
if (empty($image_values)) {
	$values = esc_attr(galway_lite_get_option('single_post_image_layout'));
} else {
	$values = esc_attr($image_values);
}
if ('no-image' != $values) {
	if ('left' == $values) {
		echo "<div class='image-left'>";
		the_post_thumbnail('medium');
	} elseif ('right' == $values) {
		echo "<div class='image-right'>";
		the_post_thumbnail('medium');
	} else {
		echo "<div class='image-full'>";
		the_post_thumbnail('full');
	}
	echo "</div>";/*div end */
}
the_content();
wp_link_pages(array(
		'before' => '<div class="page-links">'.esc_html__('Pages:', 'galway-lite'),
		'after'  => '</div>',
	));
?>
</div>
</div><!-- .entry-content -->
<?php if (is_single()) {?>
	<div class="single-meta">
	<?php if (has_category('', $post->ID)) {?>
		<footer class="entry-footer alternative-bgcolor">
		<?php galway_lite_entry_category();?>
		</footer><!-- .entry-footer -->
		<?php }?>
	    <?php if (has_tag()) {?>
		<div class="post-tags alternative-bgcolor">
		<?php galway_lite_entry_tags();?>
		</div>
		<?php }?>
	</div>
	<?php }?>
</article><!-- #post-## -->