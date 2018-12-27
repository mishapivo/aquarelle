<?php

get_header();

?>

	<div class="grid-x cell medium-10 medium-offset-1 small-12 main-content">
		<aside class="cell medium-3 sidebar sidebar-right grid-y">
			<?php
			get_template_part( 'template-parts/sidebar-right' );
			get_sidebar( 'right_sidebar' );
			?>
		</aside>
		<div class="cell medium-6 index-posts archive-page">
			<h2 class="cell medium-12 archive-title"><?php the_archive_title() ?></h2>
			<?php
			get_template_part('template-parts/single-post');
			the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-angle-right"> </i>',
				'next_text'          => '<i class="fa fa-angle-left"> </i>',
				'screen_reader_text' => ' '
			) );
			?>
		</div>
		<aside class="cell medium-3 sidebar sidebar-left grid-y">
			<?php
			get_template_part('template-parts/sidebar-left');
			get_template_part('template-parts/sidebar-ads');
			?>

		</aside>
	</div>
<?php
get_footer();
