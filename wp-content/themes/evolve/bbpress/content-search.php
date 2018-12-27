<?php
/**
 * Search Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<div id="bbpress-forums">

	<?php bbp_set_query_name( bbp_get_search_rewrite_id() );

	do_action( 'bbp_template_before_search' );

	if ( bbp_has_search_results() ) :

		bbp_get_template_part( 'pagination', 'search' );

		bbp_get_template_part( 'loop', 'search' );

		bbp_get_template_part( 'pagination', 'search' );

    elseif ( bbp_get_search_terms() ) :

		bbp_get_template_part( 'feedback', 'no-search' );

	else : ?>

        <div class="search-full-width">

			<?php bbp_get_template_part( 'form', 'search' ); ?>

        </div>

	<?php endif;

	do_action( 'bbp_template_after_search_results' ); ?>

</div>