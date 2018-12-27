<?php
/**
 * User Details
 *
 * @package bbPress
 * @subpackage Theme
 */
do_action( 'bbp_template_before_user_details' );

if ( bbp_allow_search() ) : ?>

    <div class="search-full-width">

		<?php bbp_get_template_part( 'form', 'search' ); ?>

    </div><!-- .search-full-width -->

<?php endif; ?>

    <div id="bbp-single-user-details">
        <div class="bbp-user-navigation">
            <div class="row">
                <div class="col-lg-10">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link url fn<?php if ( bbp_is_single_user_profile() ) : ?> active<?php endif; ?>"
                               href="<?php bbp_user_profile_url(); ?>"
                               title="<?php printf( esc_attr__( "%s's Profile", 'evolve' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"
                               rel="me"><?php esc_html_e( 'Profile', 'evolve' ); ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php bbp_user_topics_created_url(); ?>"
                               class="nav-link<?php if ( bbp_is_single_user_topics() ) : ?> active<?php endif; ?>"
                               title="<?php printf( esc_attr__( "%s's Topics Started", 'evolve' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Topics Started', 'evolve' ); ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php bbp_user_replies_created_url(); ?>"
                               class="nav-link<?php if ( bbp_is_single_user_replies() ) : ?> active<?php endif; ?>"
                               title="<?php printf( esc_attr__( "%s's Replies Created", 'evolve' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Replies Created', 'evolve' ); ?></a>
                        </li>

						<?php if ( bbp_is_favorites_active() ) : ?>

                            <li class="nav-item">
                                <a href="<?php bbp_favorites_permalink(); ?>"
                                   class="nav-link<?php if ( bbp_is_favorites() ) : ?> active<?php endif; ?>"
                                   title="<?php printf( esc_attr__( "%s's Favorites", 'evolve' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Favorites', 'evolve' ); ?></a>
                            </li>

						<?php endif;

						if ( bbp_is_user_home() || current_user_can( 'edit_users' ) ) :

							if ( bbp_is_subscriptions_active() ) : ?>

                                <li class="nav-item">
                                    <a class="nav-link<?php if ( bbp_is_subscriptions() ) : ?> active<?php endif; ?>"
                                       href="<?php bbp_subscriptions_permalink(); ?>"
                                       title="<?php printf( esc_attr__( "%s's Subscriptions", 'evolve' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Subscriptions', 'evolve' ); ?></a>
                                </li>

							<?php endif; ?>

                            <li class="nav-item">
                                <a class="nav-link<?php if ( bbp_is_single_user_edit() ) : ?> active<?php endif; ?>"
                                   href="<?php bbp_user_profile_edit_url(); ?>"
                                   title="<?php printf( esc_attr__( "Edit %s's Profile", 'evolve' ), bbp_get_displayed_user_field( 'display_name' ) ); ?>"><?php esc_html_e( 'Edit', 'evolve' ); ?></a>
                            </li>

						<?php endif; ?>

                    </ul>
                </div>
                <div class="col-lg-2">
                    <span class='vcard'>
                        <a class="url fn n" href="<?php bbp_user_profile_url(); ?>"
                           title="<?php bbp_displayed_user_field( 'display_name' ); ?>" rel="me">
                            <?php echo get_avatar( bbp_get_displayed_user_field( 'user_email', 'raw' ), apply_filters( 'bbp_single_user_details_avatar_size', 60 ), '', '', array( 'class' => 'rounded-circle' ) ); ?>
                        </a>
                    </span>
                </div>
            </div>
        </div><!-- #bbp-user-navigation -->
    </div><!-- #bbp-single-user-details -->

<?php do_action( 'bbp_template_after_user_details' );
