<?php if ( 'page' == get_option( 'show_on_front' ) ) : ?>
			
	<?php get_header(); ?>			
	<?php get_template_part( 'content', 'front-page'); ?>
	<?php get_footer(); ?>

<?php else : ?>

	<?php get_template_part( 'index' ); ?>

<?php endif; ?>