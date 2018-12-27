<?php

/*
   Displays Page Content
   ======================================= */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope"
         itemtype="http://schema.org/BlogPosting" itemprop="blogPost">

	<?php if ( class_exists( 'bbPress' ) && ( bbp_is_reply_edit() || bbp_is_topic_edit() ) ) {
	} else {
		if ( is_page() && ( get_post_meta( $post->ID, 'evolve_page_title', true ) == "yes" || get_post_meta( $post->ID, 'evolve_page_title', true ) == "" ) ) {
			the_title( '<h1 class="post-title" itemprop="name">', '</h1>' );
		}
	}

	if ( evolve_theme_mod( 'evl_edit_post', '0' ) == "1" ) {
		if ( current_user_can( 'edit_post', $post->ID ) ):
			edit_post_link( '', '<span class="btn btn-sm edit-post">' . evolve_get_svg( 'pencil' ) . '', '</span>' );
		endif;
	}

	/*
		After Post Title

		---------------------------------------
		Hooked: evolve_100_width_container_close() - 10
		--------------------------------------- */

	do_action( 'evolve_after_post_title' );

	evolve_featured_image( '1' ); ?>

    <div class="post-content" itemprop="mainContentOfPage">

		<?php the_content();
		evolve_wp_link_pages(); ?>

    </div><!-- .post-content -->

</article><!-- #post -->