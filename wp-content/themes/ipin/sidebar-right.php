<div id="sidebar-right" class="sidebar">
<?php if ( !dynamic_sidebar('sidebar-right') ) : ?>
	<h4><?php _e('Archives', 'ipin'); ?></h4>
	<ul>
		<?php wp_get_archives( 'type=monthly' ); ?>
	</ul>
<?php endif ?>
</div>