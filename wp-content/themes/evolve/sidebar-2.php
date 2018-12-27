<?php

/*
   Display Sidebar 2
   ======================================= */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
} ?>

<aside id="secondary-2" class="aside <?php evolve_sidebar_class_2(); ?>">

	<?php dynamic_sidebar( 'sidebar-2' ); ?>

</aside><!-- #secondary-2 -->
