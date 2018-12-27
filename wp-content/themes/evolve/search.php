<?php

/*
    Displays Search Results Content
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

if ( have_posts() ) : ?>

    <div class="alert alert-success mb-5" role="alert">
        <h1 class="page-title"><?php printf( __( 'Search results for %s', 'evolve' ), '<b>' . get_search_query() . '</b>' ); ?></h1>
    </div>

<?php else : ?>

    <div class="alert alert-warning mb-5" role="alert">
        <h1 class="page-title"><?php printf( __( 'Your search for %s didn\'t match any entries', 'evolve' ), '<b>' . get_search_query() . '</b>' ); ?></h1>
    </div>

<?php endif;

if ( have_posts() ) :

	/*
		Before Search Loop

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
		After Search Loop

	    ---------------------------------------
	    Hooked: evolve_posts_loop_close() - 10
	            evolve_pagination_after() - 20
	    --------------------------------------- */

	do_action( 'evolve_after_posts_loop' );

else :

	echo '<h2 class="display-4">' . __( 'Suggestions', 'evolve' ) . '</h2>
			        <ul class="lead">
		                <li>' . __( 'Make sure all words are spelled correctly.', 'evolve' ) . '</li>
                        <li>' . __( 'Try different keywords.', 'evolve' ) . '</li>
                        <li>' . __( 'Try more general keywords.', 'evolve' ) . '</li>
                    </ul>
                    
                  <div class="search-full-width">';

	get_search_form();

	echo '</div><!-- .search-full-width -->';

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