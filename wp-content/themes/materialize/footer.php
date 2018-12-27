<?php
/**
 *
 *  The template for displaying the footer
 *
 *  Contains the footer sidebars, social items,
 *  content copyright, theme copyright
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */
?>
        <footer>
            <?php
                $are_active_sidebras =  is_active_sidebar( 'footer-first' ) ||
                                        is_active_sidebar( 'footer-second' ) ||
                                        is_active_sidebar( 'footer-third' ) ||
                                        is_active_sidebar( 'footer-fourth' );

                if( $are_active_sidebras || (bool)get_theme_mod( 'mythemes-default-content', true ) ){
            ?>
                    <!-- footer sidebars -->
                    <aside class="mythemes-footer-sidebars">

                        <!-- the sidebars container ( align to center ) -->
                        <div class="container">
                            <div class="row">

                                <!-- first footer sidebar -->
                                <div class="col s12 m6 l3">
                                    <?php get_sidebar( 'footer-first' ); ?>
                                </div>

                                <!-- second footer sidebar -->
                                <div class="col s12 m6 l3">
                                    <?php get_sidebar( 'footer-second' ); ?>
                                </div>

                                <!-- third footer sidebar -->
                                <div class="col s12 m6 l3">
                                    <?php get_sidebar( 'footer-third' ); ?>
                                </div>

                                <!-- fourth footer sidebar -->
                                <div class="col s12 m6 l3">
                                    <?php get_sidebar( 'footer-fourth' ); ?>
                                </div>

                            </div>
                        </div><!-- .container -->
                    </aside><!-- .mythemes-footer-sidebars -->
            <?php
                }
            ?>

            <!-- dark mask social and copyright wrapper -->
            <div class="mythemes-dark-mask">

                <?php

                    $social_items = array(
                        'github',           'gitlab',           'instagram',        'evernote',     'vimeo',
                        'vimeo-circled',    'twitter', 			'skype',		    'renren',       'rdio',
                        'linkedin',         'behance',          'dropbox',          'flickr', 	 	'vkontakte',
                        'facebook',         'tumblr',           'picasa',			'dribbble',		'stumbleupon',
                        'lastfm', 		    'gplus',            'google-circles', 	'youtube-play', 'youtube',
                        'pinterest',        'smashing',         'soundcloud', 		'flattr',		'odnoklassniki',
                        'mixi',             'reddit',           'rss'
                    );


                    //$rss        = esc_url( get_theme_mod( 'mythemes-rss', esc_url( get_bloginfo('rss2_url') ) ) );

                    $empty_social_items = true;

                    foreach( $social_items as $item ){
                        $url = esc_url( get_theme_mod( "mythemes-{$item}" ) );

                        if( $item == 'rss' ){
                            if( (bool)get_theme_mod( 'mythemes-display-rss', true ) ){
                                $empty_social_items = $empty_social_items && empty( $url );
                            }

                            continue;
                        }

                        $empty_social_items = $empty_social_items && empty( $url );
                    }

                    if( !$empty_social_items ){
                ?>
                        <!-- social items -->
                        <div class="container mythemes-social">
                            <div class="row">

                                <div class="col s12">
                                    <?php
                                        foreach( $social_items as $item ){
                                            $url = esc_url( get_theme_mod( "mythemes-{$item}" ) );

                                            if( $item == 'rss' ){
                                                if( (bool)get_theme_mod( 'mythemes-display-rss', true ) && !empty( $url ) ){
                                                    echo '<a href="' . esc_url( $url ) . '" class="btn-floating waves-effect waves-light materialize-icon-' . esc_attr( $item ) . '" target="_blank" rel="nofollow"></a>';
                                                }

                                                continue;
                                            }

                                            if( !empty( $url ) ){
                                                echo '<a href="' . esc_url( $url ) . '" class="btn-floating waves-effect waves-light materialize-icon-' . esc_attr( $item ) . '" target="_blank" rel="nofollow"></a>';
                                            }
                                        }
                                    ?>
                                </div>
                            </div>
                        </div><!-- .mythemes-social -->
                <?php
                    }
                ?>

                <!-- copyright -->
                <div class="mythemes-copyright">

                    <!-- copyright container ( align to center ) -->
                    <div class="container">
                        <div class="row">

                            <div class="col s12">
                                <p>

                                    <?php
                                        /**
                                         *
                                         *  Content Copyright
                                         *  Customer can overwrite Content Copyright from the theme options
                                         *
                                         *  Appearance / Customize / Others - option "Content Copyright"
                                         */
                                    ?>

                                    <span class="copyright"><?php echo mythemes_validate_copyright( get_theme_mod( 'mythemes-copyright' , sprintf( __( 'Copyright &copy; %s %s. Powered by %s.' , 'materialize' ) , date( 'Y' ) , esc_html( get_bloginfo( 'name' ) ) , '<a href="http://wordpress.org/">WordPress</a>' ) ) ); ?></span>

                                    <?php
                                        /**
                                         *
                                         *  Materialize WordPress Theme Copyright and Credit Link
                                         *
                                         *  We strongly recommend do not alter, modify, change or / and overwrite this section.
                                         *  Also we strongly recommend do not alter, modify, change or / and overwrite the visula
                                         *  appearance for this section by using css rules or JavaScript code.
                                         *
                                         *  Before make some changes to this section please consult
                                         *  the license terms of use. Also you can discus this with
                                         *  your law consultant.
                                         *
                                         *  @link : http://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
                                         */
                                    ?>

                                    <span><?php printf( __( 'Designed by %s.' , 'materialize' ) , '<a href="' . esc_url( mythemes_core::author( 'url' ) ) . '" target="_blank" title="' . esc_attr( mythemes_core::author( 'name' ) ) . '" class="mythemes">' . mythemes_core::author( 'name' ) . '</a>' ); ?></span>
                                </p>
                            </div>

                        </div>
                    </div><!-- .container -->
                </div><!-- .mythemes-copyright -->
            </div>

        </footer>

        <?php wp_footer(); ?>

    </body>
</html>
