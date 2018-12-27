<?php
/**
 *
 *
 *  Materialize Template <http://wordpress.org>
 *
 *  By KRATZ Geoffrey AKA Jul6art AKA VanIllaSkype
 *  for VsWeb <https://vsweb.be>
 *
 *  https://vsweb.be
 *  admin@vsweb.be
 *
 *  Special thanks to Brynnlow
 *  for his contribution
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The flex one, in a flex world
 *
 *     __    __    ___            __    __    __   ____
 *     \ \  / /   / __|           \ \  /  \  / /  |  __\   __
 *      \ \/ / _  \__ \  _         \ \/ /\ \/ /   |  __|  |  _\
 *       \__/ (_) |___/ (_)         \__/  \__/    |  __/  |___/
 *
 *                    https://vsweb.be
 *
 */
?>
<footer class="page-footer blue-custom darken-2">
    <div class="container">
        <div class="row">
            <div class="col l3 s12">
                <?php dynamic_sidebar( 'footer-widgets-1' ); ?>
            </div>
            <div class="col l4 s12">
                <?php dynamic_sidebar( 'footer-widgets-2' ); ?>
            </div>
            <div class="col l5 s12">
                <?php dynamic_sidebar( 'footer-widgets-3' ); ?>
            </div>
        </div>
        <?php if ( has_nav_menu( 'footer' ) ) : ?>
            <nav class="nav-extended blue-custom darken-2">
                <div class="nav-wrapper hide-on-med-and-down">
                    <?php wp_nav_menu( array('theme_location' => 'footer')); ?>
                </div>
            </nav>
        <?php endif; ?>
    </div>
    <div class="footer-copyright blue-custom darken-4">
        <div class="container">
            <p>
                <span class="text">
                    <?php if ( is_active_sidebar( 'footer-profile-widgets' ) ) : ?>
                        <a href="#footerProfile"><?php _e('about us', 'materialize-template'); ?></a>
                    <?php endif; ?>
                    <?php echo esc_attr(get_theme_mod('copyright_text', '&copy; 2018 credits')); ?>
                </span>
                <span class="right hide-on-small-only">
                    <?php esc_html_e( 'theme by', 'materialize-template' ); ?> <a href="https://vsweb.be/" target="_blank">Geoffrey Kratz</a>
                </span>
            </p>
        </div>
    </div>

    <?php if ( is_active_sidebar( 'footer-profile-widgets' ) ) : ?>
        <!-- Modal Structure -->
        <div id="footerProfile" class="modal bottom-sheet">
            <div class="modal-content">
                <h4><?php bloginfo('name') ?></h4>
                <ul class="collection">
                    <?php dynamic_sidebar( 'footer-profile-widgets' ); ?>
                </ul>
            </div>
            <div class="modal-footer">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank" class="waves-effect waves-green btn-flat"><?php echo esc_url( home_url() ) ?></a>
            </div>
        </div>
    <?php endif; ?>
</footer>
<a class="btn-floating btn-large grey pulse hide" id="scroll_to_top" href="#!"><i class="material-icons">expand_less</i></a>
<?php wp_footer(); ?>
</body>
</html>
