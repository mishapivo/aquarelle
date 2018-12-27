<?php
/**
 * @package Zovees
 */

$zovees_header_section = get_theme_mod( 'zovees_header_section_hideshow','hide');

$zovees_header_email = get_theme_mod( "zovees_header_email", '' );
$zovees_header_phone = get_theme_mod( "zovees_header_phone", '' );
$zovees_header_time = get_theme_mod( "zovees_header_time", '' );
$zovees_header_text = get_theme_mod( "zovees_header_text", '' );
$zovees_header_button_text = get_theme_mod( "zovees_header_button_text", '' );
$zovees_header_button_url = get_theme_mod( "zovees_header_button_url", '' );

$header_args  = array(
    'posts_per_page' => 1
); 

$header_query = new wp_Query( $header_args ); ?>
<!-- Start Header Style Section -->
<header>
    <div class="header-area">
        <?php if( $zovees_header_section == "show" && $header_query->have_posts() ) : ?>
        <!-- start header top area -->
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-7 col-sm-9 hidden-xs">
                        <ul class="header-top-left">
                            <?php if ($zovees_header_email) : ?>
                            <li>
                                <i class="fa fa-envelope-o"></i> 
                                <?php echo esc_html($zovees_header_email); ?>
                            </li>
                            <?php endif; if ($zovees_header_phone) : ?>
                            <li>
                                <i class="fa fa-phone"></i> 
                                <?php echo esc_html($zovees_header_phone); ?>
                            </li>
                            <?php endif; if ($zovees_header_time) : ?>
                            <li>
                                <i class="fa fa-clock-o"></i> 
                                <?php echo esc_html($zovees_header_time); ?>
                            </li>
                        <?php endif; ?>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-3">
                        <span class="header_info hidden-sm">
                            <?php echo esc_html($zovees_header_text); ?>
                        </span>
                        <?php if ($zovees_header_button_text) : ?>
                            <a class="quote-btn" href="<?php echo esc_attr($zovees_header_button_url); ?>">
                                <?php echo esc_html($zovees_header_button_text); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End header top area -->
        <?php endif; wp_reset_postdata(); ?>

        <div class="main-header">
            <div id="sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="logo">
                                <?php if (has_custom_logo()) : ?>
                                   <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?><?php the_custom_logo(); ?></a>
                                   <?php endif; ?>
                                  <?php
                                    if (display_header_text()==true){ ?>
                                <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?><span>.</span></a></h2>
                                <?php } ?>
                            </div>
                        </div>
                        <?php if ( has_nav_menu( 'primary' ) ) : ?>
                            <div class="col-md-9 col-sm-10 hidden-xs hidden-sm mainmenu-main-wrapper">
                                <div class="menu-area add-search">
                                    <nav>
                                        <?php
                                            wp_nav_menu( array(
                                                'theme_location' => 'primary',
                                                'container' => false,
                                                'menu_class' => 'main-menu hover-style-one clearfix',
                                                'walker' => new Zovees_Walker_Nav_Primary()
                                            ) );    
                                        ?>
                                    </nav>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Style Section -->
<div class="mobile-menu-area">
    <div class="logo">
        <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?><span>.</span></a></h2>
    </div>
    <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <div class="mobile-menu-custom">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => '',
                'walker' => new Zovees_Walker_Mobile_Nav_Primary()
            ) );    
        ?>
        </div>
    <?php endif; ?>
</div>
<!-- End Header Style Section -->