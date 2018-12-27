<div class="post-date">
	<p>
		<?php
		if( get_theme_mod( 'dispostdt', 'published' ) == 'published' ) {
			the_date();
		} else {
			the_modified_date();
		}
		?>
	</p>
</div>
