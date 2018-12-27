<?php

/*
   Display Sidebar 1
   ======================================= */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
} ?>

<aside id="secondary" class="aside <?php evolve_sidebar_class(); ?>">

	<?php dynamic_sidebar( 'sidebar-1' ); ?>

</aside><!-- #secondary -->