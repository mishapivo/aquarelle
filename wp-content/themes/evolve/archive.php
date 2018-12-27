<?php

/*
    Displays Archive Page
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

if ( have_posts() ) :

	/*
		Before Post Title

		---------------------------------------
		Hooked: evolve_breadcrumbs() - 10
				evolve_archive_page_title() - 20
		--------------------------------------- */

	do_action( 'evolve_before_post_title' );

	/*
		Before Archive Loop

		---------------------------------------
		Hooked: evolve_pagination_before() - 10
				evolve_posts_loop_open() - 20
		--------------------------------------- */

	do_action( 'evolve_before_posts_loop' );

	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/post/content', 'post' );
	endwhile;

	/*
		After Archive Loop

	---------------------------------------
	Hooked: evolve_posts_loop_close() - 10
			evolve_pagination_after() - 20
	--------------------------------------- */

	do_action( 'evolve_after_posts_loop' );

else :

	get_template_part( 'template-parts/post/content', 'none' );

endif;

/*
   	After Content Area

	---------------------------------------
	Hooked: evolve_primary_container_close() - 10
	--------------------------------------- */

do_action( 'evolve_after_content_area' );

/*
	Sidebars

	---------------------------------------
	Hooked: evolve_sidebars() - 10
	--------------------------------------- */

do_action( 'evolve_sidebars_area' );

/*
	Footer Area
	--------------------------------------- */

get_footer();