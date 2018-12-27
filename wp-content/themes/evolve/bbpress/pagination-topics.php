<?php
/**
 * Pagination for pages of topics (when viewing a forum)
 *
 * @package bbPress
 * @subpackage Theme
 */
do_action( 'bbp_template_before_pagination_loop' );

if ( ! bbp_get_forum_pagination_links() ) {
	return;
} ?>

    <div class="row">
        <div class="col-md-6">
            <nav aria-label="<?php _e( "Navigation", "evolve" ); ?>" class="navigation">

				<?php bbp_forum_pagination_links(); ?>

            </nav>
        </div>
        <div class="post-meta col-md-6 text-right mb-4 mb-lg-0">

			<?php bbp_forum_pagination_count(); ?>

        </div>
    </div>

<?php do_action( 'bbp_template_after_pagination_loop' );
