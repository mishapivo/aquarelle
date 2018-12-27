<?php

if ( ! function_exists( 'business_click_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_click_set_global() {
    /*Getting saved values start*/
    $GLOBALS['business_click_customizer_all_values'] = business_click_get_all_options(1);
}
endif;
add_action( 'business_click_action_before_head', 'business_click_set_global', 0 );

if ( ! function_exists( 'business_click_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_click_doctype() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'business_click_action_before_head', 'business_click_doctype', 10 );

if ( ! function_exists( 'business_click_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_click_before_wp_head() {
    ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'/>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

<?php
}
endif;
add_action( 'business_click_action_before_wp_head', 'business_click_before_wp_head', 10 );

if( ! function_exists( 'business_click_default_layout' ) ) :
    /**
     * business-click default layout function
     *
     * @since  business-click 1.0.0
     *
     * @param int
     * @return string
     */
    function business_click_default_layout( $post_id = null ){

        global $business_click_customizer_all_values,$post;
        $business_click_default_layout = $business_click_customizer_all_values['business-click-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $business_click_default_layout_meta = get_post_meta( $post_id, 'business-click-default-layout', true );

        if( false != $business_click_default_layout_meta ) {
            $business_click_default_layout = $business_click_default_layout_meta;
        }
        return $business_click_default_layout;
    }
endif;

if ( ! function_exists( 'business_click_body_class' ) ) :
/**
 * add body class
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_click_body_class( $business_click_body_classes ) {
  global $business_click_customizer_all_values;
  $business_click_transparent_header = '';
    $transparant_header = $business_click_customizer_all_values['business-click-enable-transparent-header'];
    
    if($transparant_header == 1 &&  ($business_click_customizer_all_values['business-click-enbale-slider'] == 1) ){
        $business_click_transparent_header = "transparent-header";
    }
    else{
        $business_click_transparent_header = "non-tarnsparent";
    }
    
    if( is_home() ) {
        //hide on blog
        if( 1 == $business_click_customizer_all_values['business-click-slider-enable-blog'] ) {
            $business_click_transparent_header = 'non-tarnsparent';  
        }
    }
    
    
    if ( is_front_page() ) {
        if( 1 == $business_click_customizer_all_values['business-click-enbale-slider'] ){
            $business_click_has_feature_slider = 'has-featured-slider';
        }
        else{
            $business_click_has_feature_slider = 'no-featured-slider';
        }

    }
    else {
        $business_click_has_feature_slider = '';
    }
    
    if( is_home() ) {
        if( 1 == $business_click_customizer_all_values['business-click-slider-enable-blog'] ) {
            $business_click_has_feature_slider = 'no-featured-slider';  
        }
    }

    if(!is_front_page() || ( is_front_page())){
        $business_click_default_layout = business_click_default_layout();
        if( !empty( $business_click_default_layout ) ){
            if( 'left-sidebar' == $business_click_default_layout ){
                $business_click_body_classes[] = 'evt-left-sidebar'.' '. $business_click_transparent_header . ' ' . $business_click_has_feature_slider;
            }
            elseif( 'right-sidebar' == $business_click_default_layout ){ 
                $business_click_body_classes[] = 'evt-right-sidebar'.' '. $business_click_transparent_header . ' ' . $business_click_has_feature_slider;
            }
            elseif( 'both-sidebar' == $business_click_default_layout ){
                $business_click_body_classes[] = 'evt-both-sidebar'.' '. $business_click_transparent_header  . ' ' . $business_click_has_feature_slider;
            }
            elseif( 'no-sidebar' == $business_click_default_layout ){
                $business_click_body_classes[] = 'evt-no-sidebar'.' '. $business_click_transparent_header . ' ' . $business_click_has_feature_slider;
            }
            
            else{
                $business_click_body_classes[] = 'evt-'. $business_click_customizer_all_values['business-click-default-layout'].' '. $business_click_transparent_header . ' ' . $business_click_has_feature_slider;
            }
        }
        else{
            $business_click_body_classes[] = 'evt-right-sidebar'.' '. $business_click_transparent_header . ' ' . $business_click_has_feature_slider;
        }
    }
    return $business_click_body_classes;

}
endif;
add_filter( 'body_class', 'business_click_body_class', 10, 1);

if ( ! function_exists( 'business_click_before_page_start' ) ) :
/**
 * intro loader
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_click_before_page_start() {
    global $business_click_customizer_all_values;
    /*intro loader*/
}
endif;
add_action( 'business_click_action_before', 'business_click_before_page_start', 10 );

if ( ! function_exists( 'business_click_page_start' ) ) :
/**
 * page start
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_click_page_start() {
?>
    <div id="page" class="site clearfix">
<?php
}
endif;
add_action( 'business_click_action_before', 'business_click_page_start', 15 );

if ( ! function_exists( 'business_click_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
function business_click_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'business-click' ); ?></a>
<?php
}
endif;
add_action( 'business_click_action_before_header', 'business_click_skip_to_content', 10 );

   if ( ! function_exists( 'business_click_navigation_page_start' ) ) :
   /**
    * Skip to content
    *
    * @since business-click 1.0.0
    *
    * @param null
    * @return null
    *
    */
   function business_click_navigation_page_start() {
       global $business_click_customizer_all_values;
       ?>
        <!-- preloader -->
        <div id="evt-preloader" style="">
            <div id="status" style="">
                <i class="fa fa-times evt-preloader-close"></i>
                
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>

        <?php $header_image = get_header_image();
        ?>
        <header id="masthead" class="site-header img-cover" style="<?php echo 'background-image: url('. esc_url($header_image) .');' ; ?>">
        <div class="evt-header-wrap">

            <?php if (1 == $business_click_customizer_all_values['business-click-enbale-top-bar-header']) { ?>
            <div id="evt-top-header" class="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 evt-head-list-item-wrap" >
                            <!-- head list item -->
                            <div id="evt-head-list-item">
                                <?php 
                                    global $business_click_customizer_all_values;
                                    $business_click_phone_number = esc_html($business_click_customizer_all_values['business-click-top-bar-phone']);
                                    $business_click_email_address = esc_html($business_click_customizer_all_values['bussiness-click-top-bar-email']);
                                    $business_click_location= esc_html($business_click_customizer_all_values['bussiness-click-top-bar-location']);
                                ?>
                                <ul>
                                    <?php if (!empty($business_click_phone_number)) { ?>
                                    <li><span><i class="fa fa-phone"></i><?php echo esc_html($business_click_phone_number);?></span></li>
                                    <?php } ?>
                                    <?php if (!empty($business_click_email_address)) { ?>
                                    <li><a href="mailto:<?php echo esc_html($business_click_email_address);?>"><i class="fa fa-envelope"></i><?php echo esc_html($business_click_email_address);?></a></li>
                                    <?php } ?>
                                    <?php if (!empty($business_click_location)) { ?>
                                    <li><span><i class="fas fa-map-marker-alt"></i><?php echo esc_html($business_click_location);?></span></li>
                                    <?php } ?>
                                </ul>
                            </div>                            
                        </div>

                        <div class="col-lg-4">
                            <a href="#!" class="head-list-toggle float-left d-lg-none"></a>

                            <div class="evt-social-icons-wrap">
                                <div class="evt-head-search">
                                    <?php get_search_form();?>
                                </div>
                                <!-- search toggle icon -->
                                <button class="evt-head-search-toggler float-right"><i class="fas fa-search"></i></button> 

                                <!-- social icons -->
                                <div id="evt-social-icons" class="float-right">
                                    <?php
                                        wp_nav_menu( array(
                                        'theme_location' => 'menu-2',
                                        'menu_id'        => 'social-menu',
                                        'fallback_cb'    => 'business_click_social_menu'
                                        ) );
                                    
                                    ?> 
                                </div>                          
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php } ?>

            <div class="evt-header-wrap-nav">
                <div class="container">
                    <div class="evt-header-row row align-items-center">
                        <div class="evt-logo-manage">
                            <div class="site-branding">
                                <?php
                                the_custom_logo();
                                if ( is_front_page() && is_home() ) :
                                    ?>
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <?php bloginfo( 'name' ); ?>
                                        </a>
                                    </h1>
                                    <?php
                                    
                                else :
                                    ?>
                                    <h1 class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <?php bloginfo( 'name' ); ?>
                                        </a>
                                    </h1>
                                    <?php
                                    
                                endif;
                                $evt_description = get_bloginfo( 'description', 'display' );
                                if ( $evt_description || is_customize_preview() ) :
                                    ?>
                                    <p class="site-description"><?php echo $evt_description; /* WPCS: xss ok. */ ?></p>
                                <?php endif; ?>
                            </div><!-- .site-branding -->                   
                        </div><!-- site brand-->

                        <!-- left and right nav -->
                        <div class="text-right evt-logo-left-right-nav evt-menu-toggler-manage">
                            <!-- search toggle icon -->
                                                       
                            <?php global $business_click_customizer_all_values;  ?>
                            <?php if(1 == $business_click_customizer_all_values['business-click-enable-extra-button'] && !empty($business_click_customizer_all_values['business-click-text-extra-button-text']) ) { ?>
                            <?php $extra_button_name = esc_html($business_click_customizer_all_values['business-click-text-extra-button-text']);
                                  $extra_button_url  = esc_url($business_click_customizer_all_values['business-click-link-extra-button']);
                             ?>
                                <a href="<?php echo esc_url($extra_button_url); ?>" id="evt-buy-btn" class="btn d-none d-sm-block float-right" target="_blank"><?php echo esc_html($extra_button_name) ?></a>
                            <?php }?>    

                            <button class="menu-toggler" id="menu-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                            
                            <nav id="site-navigation" class="main-navigation float-right">
                                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'business-click' ); ?></button>
                                <?php
                                wp_nav_menu( array(
                                    'theme_location' => 'menu-1',
                                    'menu_id'        => 'primary-menu',
                                    'fallback_cb'    => 'busienss_click_primary_menu_mobile_callback'
                                ) );
                                ?>

                            </nav><!-- #site-navigation -->     
                        </div><!-- site nav -->
                    </div>
                </div>

            </div>
        </div>
    </header><!-- #masthead --> 


<div id="content" class="site-content">

<?php
}
endif;
add_action( 'business_click_action_nav_page_start', 'business_click_navigation_page_start', 10 );


if( ! function_exists( 'business_click_main_slider_setion' ) ) :
/**
 * Main slider
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function business_click_main_slider_setion(){
        if (  is_front_page() && !is_home() ) {
            do_action('business_click_action_main_slider');
        } else {
            /**
             * business_click_action_after_title hook
             * @since business-click 1.0.0
             *
             * @hooked null
             */
            do_action( 'business_click_action_after_title' );
        }
    }
endif;
add_action( 'business_click_action_on_header', 'business_click_main_slider_setion', 10 );


if( ! function_exists( 'business_click_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since business-click 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function business_click_add_breadcrumb(){
        global $business_click_customizer_all_values;
        // $business_click_customizer_all_values = business_click_defauts_value();
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb = $business_click_customizer_all_values['business-click-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div id="breadcrumb" class="wrapper wrap-breadcrumb"><div class="container">';
         business_click_simple_breadcrumb();
        echo '</div><!-- .container --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'business_click_action_after_title', 'business_click_add_breadcrumb', 10 );  


    
    


