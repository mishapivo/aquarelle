<?php

/*
    Displays Error 404 Page
    ======================================= */

/*
    Header Area
    --------------------------------------- */

get_header();

/*
	Before Content Area

	---------------------------------------
	Hooked: evolve_primary_container_open() - 10
	--------------------------------------- */

do_action( 'evolve_before_content_area' );

/*
	Before Post Title

	---------------------------------------
	Hooked: evolve_breadcrumbs() - 10
	--------------------------------------- */

do_action( 'evolve_before_post_title' ); ?>

    <h1 class="display-4"><?php _e( 'Yay! 404 Not Found', 'evolve' ); ?></h1>

    <p class="lead"><?php _e( 'Sorry, but you are looking for something that isn\'t here or it\'s been moved. Try a search?', 'evolve' ); ?></p>

    <div class="search-full-width mb-0">

		<?php get_search_form(); ?>

    </div><!-- .search-full-width -->

<?php

/*
   	After Content Area

	---------------------------------------
	Hooked: evolve_primary_container_close() - 10
	--------------------------------------- */

do_action( 'evolve_after_content_area' );

get_footer();
