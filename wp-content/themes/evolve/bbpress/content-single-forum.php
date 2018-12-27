<?php
/**
 * Single Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<div id="bbpress-forums">

	<?php bbp_forum_subscription_link( array(
		'before'      => '<div class="post-meta text-right mb-4">',
		'after'       => '</div>',
		'subscribe'   => evolve_get_svg( 'rss' ) . esc_html__( 'Subscribe', 'evolve' ),
		'unsubscribe' => evolve_get_svg( 'ok' ) . esc_html__( 'Subscribed', 'evolve' )
	) );

	if ( bbp_allow_search() ) : ?>

        <div class="search-full-width">

			<?php bbp_get_template_part( 'form', 'search' ); ?>

        </div><!-- .search-full-width -->

	<?php endif;

	if ( post_password_required() ) :

		bbp_get_template_part( 'form', 'protected' );

	else :

		if ( bbp_has_forums() ) :

			bbp_get_template_part( 'loop', 'forums' );

		endif;

		if ( ! bbp_is_forum_category() && bbp_has_topics() ) :

			bbp_get_template_part( 'loop', 'topics' );

			bbp_get_template_part( 'pagination', 'topics' );

			bbp_get_template_part( 'form', 'topic' );

        elseif ( ! bbp_is_forum_category() ) :

			bbp_get_template_part( 'feedback', 'no-topics' );

			bbp_get_template_part( 'form', 'topic' );

		endif;
	endif;

	do_action( 'bbp_template_after_single_forum' ); ?>

</div><!-- #bbpress-forums -->