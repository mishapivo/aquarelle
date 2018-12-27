<div class="post-tags">
	<?php
	if( has_tag() ) {
	?>
		<div class="singletags"><?php the_tags( '<span class="fa fa-tags">' . __( 'Tags: ', 'di-blog' ) . '</span> ', ' ' ); ?></div>
	<?php
	}
	?>
</div>
