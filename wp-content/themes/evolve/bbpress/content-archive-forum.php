<?php
/**
 * Archive Forum Content Part
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

	do_action( 'bbp_template_before_forums_index' );

	if ( bbp_has_forums() ) :

		bbp_get_template_part( 'loop', 'forums' );

	else :

		bbp_get_template_part( 'feedback', 'no-forums' );

	endif;

	do_action( 'bbp_template_after_forums_index' ); ?>

</div>