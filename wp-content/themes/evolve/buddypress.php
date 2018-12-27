<?php

/*
    Main Template For BuddyPress
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

if ( have_posts() ): the_post(); ?>

    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <span class="post-title" style="display: none;"><?php the_title(); ?></span>
        <span class="vcard" style="display: none;"><span
                    class="fn"><?php the_author_posts_link(); ?></span></span>
        <div class="post-content" itemprop="mainContentOfPage">
			<?php the_content();
			evolve_wp_link_pages(); ?>
        </div>
    </div>

<?php endif;

/*
   	After Content Area

	---------------------------------------
	Hooked: evolve_primary_container_close() - 10
	--------------------------------------- */

do_action( 'evolve_after_content_area' );

wp_reset_query();

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