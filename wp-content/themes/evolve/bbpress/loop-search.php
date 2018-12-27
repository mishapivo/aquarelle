<?php
/**
 * Search Loop
 *
 * @package bbPress
 * @subpackage Theme
 */
do_action( 'bbp_template_before_search_results_loop' ); ?>

    <span class="badge badge-pill badge-info mr-2"><?php _e( 'Reply', 'evolve' ); ?></span>
    <span class="badge badge-pill badge-secondary mr-2"><?php _e( 'Topic', 'evolve' ); ?></span>
    <span class="badge badge-pill badge-success"><?php _e( 'Forum', 'evolve' ); ?></span>

    <ul class="mt-4 bbp-search-results bbp-forums">
        <li class="bbp-body">

			<?php while ( bbp_search_results() ) : bbp_the_search_result();

				bbp_get_template_part( 'loop', 'search-' . get_post_type() );

			endwhile; ?>

        </li><!-- .bbp-body -->
    </ul><!-- #bbp-search-results -->

<?php do_action( 'bbp_template_after_search_results_loop' );
