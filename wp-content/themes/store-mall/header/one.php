<?php
/**
 * The header one option
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Moral
 */
?>
<header id="masthead" class="site-header" role="banner">
    <div class="wrapper">
        <div class="site-branding">
            <?php if ( has_custom_logo() ) : ?>
                <div class="site-logo">
                    <?php the_custom_logo(); ?>
                </div><!-- .site-logo -->
            <?php endif; ?>

            <div id="site-identity">
                <?php
                if ( is_front_page() && is_home() ) :
                    ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                else :
                    ?>
                    <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                    <?php
                endif;
                $store_mall_description = get_bloginfo( 'description', 'display' );
                if ( $store_mall_description || is_customize_preview() ) :
                    ?>
                    <p class="site-description"><?php echo $store_mall_description; /* WPCS: xss ok. */ ?></p>
                <?php endif; ?>
            </div><!-- #site-identity -->
        </div><!-- .site-branding -->
        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php  esc_html_e( 'Primary Menu', 'store-mall' ); ?>">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="menu-label"><?php esc_html_e( 'Menu', 'store-mall' ); ?></span>
                <?php echo store_mall_get_svg( array( 'icon' => 'menu' ) ); ?>
                <?php echo store_mall_get_svg( array( 'icon' => 'close' ) ); ?>
            </button>

            <?php if ( has_nav_menu( 'primary' ) ) :
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'    => 'primary-menu',
                    'menu_class'     => 'menu nav-menu',
                    'container'     => '',
                    'container_class' => '',
                ) );
            endif; ?>

            <ul class="search-cart-wrapper">
                <?php if( get_theme_mod( 'store_mall_show_search', true ) ) : ?>
                    <li class="search-menu">
                        <a href="#"><span class="screen-reader-text"><?php esc_html_e( 'Search', 'store-mall' );?></span>
                        
                        <?php echo store_mall_get_svg( array( 'icon' => 'search' ) ); ?>
                        <?php echo store_mall_get_svg( array( 'icon' => 'close' ) ); ?>
                        </a>

                        <div id="search">
                            <?php get_search_form();?>
                        </div><!-- #search -->
                    </li><!-- .search-menu -->
                <?php endif;?>
                <?php if ( store_mall_is_yww_activate() && get_theme_mod( 'store_mall_show_wishlist', true ) ) : 
                    $wish_page_id = yith_wcwl_object_id( get_option( 'yith_wcwl_wishlist_page_id' ) );

                    ?>
                    <li class="wishlist">
                        <a href="<?php echo esc_url( get_the_permalink( $wish_page_id ) ); ?>">
                            <?php echo store_mall_get_svg( array( 'icon' => 'wishlist-o' ) ); ?>
                                
                        </a>
                        <?php  ?>
                    </li>
                <?php endif; ?>
                <?php 
                if( store_mall_is_woocommerce_activated() ) : 
                    if ( get_theme_mod( 'store_mall_show_ac_link', true ) ) : ?>
                        <li class="user-login">
                            <a href="<?php echo esc_url( store_mall_get_woo_page_link( 'myaccount' ) ); ?>">
                                <?php echo store_mall_get_svg( array( 'icon' => 'user' ) ); ?>
                                    
                            </a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if ( get_theme_mod( 'store_mall_show_cart_link', true ) ) : ?>
                        <li class="cart-count">
                            <?php 
                            if ( store_mall_is_woocommerce_activated() ) {
                                store_mall_get_cart_link();
                            }
                            ?>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul><!-- .search-cart-wrapper -->            
        </nav><!-- .main-navigation-->
    </div><!-- .wrapper -->
</header><!-- #masthead -->