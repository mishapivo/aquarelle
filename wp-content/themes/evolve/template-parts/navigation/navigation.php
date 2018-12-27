<?php

/*
   Displays Blog Pagination
   ======================================= */

global $paged;
if ( is_front_page() && ! is_home() ) {
	$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;
} else {
	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
} ?>

<nav aria-label="<?php _e( "Navigation", "evolve" ); ?>"
     class="<?php if ( evolve_theme_mod( 'evl_pagination_type', 'pagination' ) != "number_pagination" || ( is_single() && ! is_singular( array(
			     'page',
			     'attachment'
		     ) ) ) ) {
	     echo 'row ';

	     if ( ( class_exists( 'Woocommerce' ) && ! is_shop() ) || ! class_exists( 'Woocommerce' ) ) {
		     echo 'infinite ';
	     }
     } ?>navigation">

	<?php if ( is_single() && ! is_singular( array( 'page', 'attachment' ) ) ) { ?>

        <div class="col-sm-6 nav-next"><?php next_post_link( '%link', '%title' ); ?></div>
        <div class="col-sm-6 nav-previous"><?php previous_post_link( '%link', '%title' ); ?></div>

	<?php } else {
		if ( evolve_theme_mod( 'evl_pagination_type', 'pagination' ) == "number_pagination" ) {
			evolve_number_pagination();
		} else { ?>

            <div class="col-sm-6 nav-next"><?php previous_posts_link( __( 'Newer Entries', 'evolve' ) ); ?></div>
            <div class="col-sm-6 nav-previous"><?php next_posts_link( __( 'Older Entries', 'evolve' ) ); ?></div>

		<?php }
	} ?>

</nav><!-- .row .navigation -->