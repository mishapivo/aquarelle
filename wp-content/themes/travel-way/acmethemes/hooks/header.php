<?php
/**
 * Setting global variables for all theme options saved values
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'travel_way_set_global' ) ) :
    function travel_way_set_global() {
        /*Getting saved values start*/
        $travel_way_saved_theme_options = travel_way_get_theme_options();
        $GLOBALS['travel_way_customizer_all_values'] = $travel_way_saved_theme_options;
    }
endif;
add_action( 'travel_way_action_before_head', 'travel_way_set_global', 0 );

/**
 * Doctype Declaration
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'travel_way_doctype' ) ) :
    function travel_way_doctype() {
        ?>
        <!DOCTYPE html><html <?php language_attributes(); ?>>
        <?php
    }
endif;
add_action( 'travel_way_action_before_head', 'travel_way_doctype', 10 );

/**
 * Code inside head tage but before wp_head funtion
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'travel_way_before_wp_head' ) ) :

    function travel_way_before_wp_head() {
        ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
         <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="profile" href="//gmpg.org/xfn/11">
        <?php
    }
endif;
add_action( 'travel_way_action_before_wp_head', 'travel_way_before_wp_head', 10 );

/**
 * Add body class
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return array
 *
 */
if ( ! function_exists( 'travel_way_body_class' ) ) :

    function travel_way_body_class( $travel_way_body_classes ) {

        global $travel_way_customizer_all_values;
        $travel_way_enable_animation = $travel_way_customizer_all_values['travel-way-enable-animation'];
        $travel_way_enable_transparent = $travel_way_customizer_all_values['travel-way-enable-transparent'];

        /*wow animation*/
        if( 1 != $travel_way_enable_animation ){
            $travel_way_body_classes[] = 'acme-animate';
        }
        $travel_way_body_classes[] = travel_way_sidebar_selection();

        if( 1 == $travel_way_enable_transparent  ){
            $travel_way_body_classes[] = 'header-transparent';
            $travel_way_enable_header_top = $travel_way_customizer_all_values['travel-way-enable-header-top'];
            if( 1 == $travel_way_enable_header_top  ){
                $travel_way_body_classes[] = 'header-enable-top';
            }
         }

         $travel_way_enable_feature = $travel_way_customizer_all_values['travel-way-enable-feature'];

         if ( 1 != $travel_way_enable_feature && is_front_page()){
            $travel_way_body_classes[] = 'at-front-no-feature';
         }
        return $travel_way_body_classes;
    }
endif;
add_action( 'body_class', 'travel_way_body_class', 10, 1 );

/**
 * Start site div
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return null
 *
 */
if ( ! function_exists( 'travel_way_site_start' ) ) :

    function travel_way_site_start() {
        ?>
        <div class="site" id="page">
        <?php
    }
endif;
add_action( 'travel_way_action_before', 'travel_way_site_start', 20 );

/**
 * Skip to content
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'travel_way_skip_to_content' ) ) :

    function travel_way_skip_to_content() {
        ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travel-way' ); ?></a>
        <?php
    }
endif;
add_action( 'travel_way_action_before_header', 'travel_way_skip_to_content', 10 );

/**
 * Main header
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'travel_way_header' ) ) :
    function travel_way_header() {
        global $travel_way_customizer_all_values;
        $travel_way_enable_header_top = $travel_way_customizer_all_values['travel-way-enable-header-top'];
	    $travel_way_nav_class = '';
	    $travel_way_enable_sticky = $travel_way_customizer_all_values['travel-way-enable-sticky'];
        $travel_way_enable_transparent = $travel_way_customizer_all_values['travel-way-enable-transparent'];
	    if( 1 == $travel_way_enable_sticky || 1 == $travel_way_enable_transparent  ){
		    $travel_way_nav_class .= ' travel-way-sticky';
	    }
    
        if( 1 == $travel_way_enable_header_top ){
            ?>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            <?php
                                $travel_way_header_top_menu_display_selection = $travel_way_customizer_all_values['travel-way-header-top-menu-display-selection'];
                                $travel_way_header_top_info_display_selection = $travel_way_customizer_all_values['travel-way-header-top-info-display-selection'];
                                $travel_way_header_top_social_display_selection = $travel_way_customizer_all_values['travel-way-header-top-social-display-selection'];

                                if( 'left' == $travel_way_header_top_menu_display_selection ){
                                    do_action('travel_way_action_top_menu');
                                }
                                if( 'left' == $travel_way_header_top_social_display_selection ){
                                    do_action('travel_way_action_social_links');
                                }
                                if( 'left' == $travel_way_header_top_info_display_selection ){
                                    do_action('travel_way_action_feature_info');
                                }
                            ?>
                        </div>
                        <div class="col-sm-6 text-right">
                            <?php
                                if( 'right' == $travel_way_header_top_menu_display_selection ){
                                    do_action('travel_way_action_top_menu');
                                }
                                if( 'right' == $travel_way_header_top_social_display_selection ){
                                    do_action('travel_way_action_social_links');
                                }
                                if( 'right' == $travel_way_header_top_info_display_selection ){
                                    do_action('travel_way_action_feature_info');
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="navbar at-navbar <?php echo  $travel_way_nav_class;?>" id="navbar" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></button>
                    <?php
                    $travel_way_display_site_logo = $travel_way_customizer_all_values['travel-way-display-site-logo'];
	                $travel_way_display_site_title = $travel_way_customizer_all_values['travel-way-display-site-title'];
	                $travel_way_display_site_tagline = $travel_way_customizer_all_values['travel-way-display-site-tagline'];
	                
                    if( 1== $travel_way_display_site_logo || 1 == $travel_way_display_site_title || 1 == $travel_way_display_site_tagline ):
                        if ( 1 == $travel_way_display_site_logo && function_exists( 'the_custom_logo' ) ):
                            the_custom_logo();
                        endif;
                        if ( 1== $travel_way_display_site_title  ):
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </h1>
                            <?php else : ?>
                                <p class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
                                </p>
                            <?php endif;
                        endif;
                        if ( 1== $travel_way_display_site_tagline  ):
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo esc_html( $description ); ?></p>
                            <?php endif;
                        endif;
                    endif;
                    ?>
                </div>
                <div class="at-beside-navbar-header">
	                <?php
	                 travel_way_primary_menu();
	                ?>
                </div>
                <!--.at-beside-navbar-header-->
            </div>
        </div>
        <?php
    }
endif;
add_action( 'travel_way_action_header', 'travel_way_header', 10 );