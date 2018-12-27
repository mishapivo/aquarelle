<?php

/*
    Page Part
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

do_action( 'evolve_before_post_title' );

if ( have_posts() ) :

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/page/content', 'page' );

		/*
			After Post Content

			---------------------------------------
			Hooked: evolve_comments_template() - 30
			--------------------------------------- */

		do_action( 'evolve_after_post_content' );

	endwhile;

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