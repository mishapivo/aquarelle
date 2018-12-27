<?php
/**
 * Single Topic Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<div id="bbpress-forums">

	<?php if ( bbp_allow_search() ) : ?>

        <div class="search-full-width">

			<?php bbp_get_template_part( 'form', 'search' ); ?>

        </div><!-- .search-full-width -->

	<?php endif;

	do_action( 'bbp_template_before_single_topic' );

	if ( post_password_required() ) :

		bbp_get_template_part( 'form', 'protected' );

	else :

		if ( bbp_show_lead_topic() ) :

			bbp_get_template_part( 'content', 'single-topic-lead' );

			bbp_topic_tag_list( bbp_get_topic_id(), array(
				'before' => '<div class="post-meta mb-4">' . evolve_get_svg( 'tag' ),
				'after'  => '</div>',
				'sep'    => ', '
			) );

		endif;

		if ( bbp_has_replies() ) :

			bbp_get_template_part( 'loop', 'replies' );

			bbp_get_template_part( 'pagination', 'replies' );

		endif;

		bbp_get_template_part( 'form', 'reply' );

	endif;

	do_action( 'bbp_template_after_single_topic' ); ?>

</div><!-- #bbpress-forums -->
