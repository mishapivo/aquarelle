<?php

if ( ! function_exists( 'st_blog_set_global' ) ) :
/**
 * Setting global values for all saved customizer values
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function st_blog_set_global() {
    /*Getting saved values start*/
    $GLOBALS['st_blog_customizer_all_values'] = st_blog_get_all_options(1);
}
endif;
add_action( 'st_blog_action_before_head', 'st_blog_set_global', 0 );

if ( ! function_exists( 'st_blog_doctype' ) ) :
/**
 * Doctype Declaration
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function st_blog_doctype() {
    ?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>
<?php
}
endif;
add_action( 'st_blog_action_before_head', 'st_blog_doctype', 10 );

if ( ! function_exists( 'st_blog_before_wp_head' ) ) :
/**
 * Before wp head codes
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function st_blog_before_wp_head() {
    ?>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>
<?php
}
endif;
add_action( 'st_blog_action_before_wp_head', 'st_blog_before_wp_head', 10 );

if( ! function_exists( 'st_blog_default_layout' ) ) :
    /**
     * st-blog default layout function
     *
     * @since  st-blog 1.0.0
     *
     * @param int
     * @return string
     */
    function st_blog_default_layout( $post_id = null ){

        global $st_blog_customizer_all_values,$post;
        $st_blog_default_layout = $st_blog_customizer_all_values['st-blog-default-layout'];
        if( is_home()){
            $post_id = get_option( 'page_for_posts' );
        }
        if( null == $post_id && isset ( $post->ID ) ){
            $post_id = $post->ID;
        }
        $st_blog_default_layout_meta = get_post_meta( $post_id, 'st-blog-default-layout', true );

        if( false != $st_blog_default_layout_meta ) {
            $st_blog_default_layout = $st_blog_default_layout_meta;
        }
        return $st_blog_default_layout;
    }
endif;


if ( ! function_exists( 'st_blog_body_class' ) ) :
/**
 * add body class
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function st_blog_body_class( $st_blog_body_classes ) {
  global $st_blog_customizer_all_values;
  $st_blog_logo_layout  = $st_blog_customizer_all_values['st-blog-default-logo-layout'];
  $st_blog_body_layout = $st_blog_customizer_all_values['st-blog-default-body-layout'];
    
    if(!is_front_page() || ( is_front_page())){
        $st_blog_default_layout = st_blog_default_layout();
        if( !empty( $st_blog_default_layout ) ){
            if( 'left-sidebar' == $st_blog_default_layout ){
                $st_blog_body_classes[] = 'salient-left-sidebar '.  $st_blog_logo_layout .' '. $st_blog_body_layout;
            }
            elseif( 'right-sidebar' == $st_blog_default_layout ){
                $st_blog_body_classes[] = 'salient-right-sidebar '.  $st_blog_logo_layout .' '. $st_blog_body_layout ;
            }
            elseif( 'both-sidebar' == $st_blog_default_layout ){
                $st_blog_body_classes[] = 'salient-both-sidebar ' .  $st_blog_logo_layout .' '. $st_blog_body_layout ;
            }
            elseif( 'no-sidebar' == $st_blog_default_layout ){
                    $st_blog_body_classes[] = 'salient-no-sidebar '.  $st_blog_logo_layout .' '. $st_blog_body_layout ;
            }
            else{
                $st_blog_body_classes[] = 'salient-right-sidebar '.  $st_blog_logo_layout .' '. $st_blog_body_layout;
            }
        }
        else{
                $st_blog_body_classes[] = 'salient-right-sidebar ' .  $st_blog_logo_layout .' '. $st_blog_body_layout;
        }
    }
    return $st_blog_body_classes;

}
endif;
add_filter( 'body_class', 'st_blog_body_class', 10, 1);


if ( ! function_exists( 'st_blog_page_start' ) ) :
/**
 * page start
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function st_blog_page_start() {
?>
    <div id="page" class="site ">
<?php
}
endif;
add_action( 'st_blog_action_before', 'st_blog_page_start', 15 );

if ( ! function_exists( 'st_blog_skip_to_content' ) ) :
/**
 * Skip to content
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function st_blog_skip_to_content() {
    ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'st-blog' ); ?></a>
<?php
}
endif;
add_action( 'st_blog_action_before_header', 'st_blog_skip_to_content', 10 );

// Navigation
if ( ! function_exists( 'st_blog_header_navigation' ) ) :
/**
 * Main header
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function st_blog_header_navigation($search) {
?>
<!-- navigation -->
<div id="big-logo-site-nav" class="st-blog-header-row st-blog-big-logo-nav">
    <!-- full width nav -->
    <div class="text-right st-blog-menu-toggler-manage <?php if($search == 'with_search_box') echo 'st-blog-header-wrap-nav';?>">
        <button class="menu-toggler" id="menu-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <nav id="site-navigation" class="main-navigation">
            <div class="container">
                <!-- search box -->
                <?php
                if($search == 'with_search_box') {
                    ?>
                    <div class="st-blog-head-search">
                        <div class="container">
                            <?php get_search_form();?>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'st-blog' ); ?></button>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'menu-1',
                    'menu_id'        => 'primary-menu',
                    'fallback_cb'    => 'st_blog_primary_menu'
                ) );
                ?>

                <!-- search toggle icon -->
                <button class="st-blog-head-search-toggler d-none d-lg-block"><i class="fas fa-search"></i></button>
            </div>
        </nav><!-- #site-navigation -->     

        <!-- search toggle icon -->
            <button class="st-blog-head-search-toggler d-lg-none"><i class="fas fa-search"></i></button>
    </div><!-- site nav -->
</div>
<?php
}
endif;

if ( ! function_exists( 'st_blog_header' ) ) :
/**
 * Main header
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
function st_blog_header() {
    global$st_blog_customizer_all_values;
    ?>
    <!-- header -->
    <?php $header_image = get_header_image();
     ?>


    <?php if( st_blog_header_alignment() == 'nav_first') { ?>
        <?php st_blog_header_navigation('with_search_box');//requires search box here for nav_first ?>
    <?php } ?>

    <header id="masthead" class="site-header" >
        <div class="st-blog-header-wrap">
            <!-- search box -->
            <?php if( st_blog_header_alignment() == 'header_first') { ?>
                <div class="st-blog-head-search">
                    <div class="container">
                        <?php get_search_form();?>
                    </div>
                </div>
            <?php } ?>
            
            <div class="st-blog-header-wrap-nav">
                <!-- ticker -->
                <?php
                if(st_blog_ticker_position() == 'ticker_top')
                    st_blog_ticker();
                ?>

                <!-- header -->
                <div class="st-blog-header-bg img-cover" style="<?php echo 'background-image: url('. $header_image.');' ; ?>">
                    <div class="st-blog-header-overlay">
                        <div class="container">
                            <div class="st-blog-header-row">
                                <div class="st-blog-logo-manage">
                                    <div class="site-branding">
                                        <?php
                                        the_custom_logo();
                                         if ( is_front_page() && !is_home() ) :
                                            
                                            ?>
                                            
                                                <h1 class="site-title">
                                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                        <?php bloginfo('name'); ?>
                                                    </a>
                                                </h1>
                                            
                                            <?php
                                        else :
                                            ?>
                                            
                                            <h1 class="site-title">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                                    <?php bloginfo('name'); ?>
                                                </a>
                                            </h1>
                                            
                                            <?php
                                        endif;
                                        $st_blog_description = get_bloginfo( 'description', 'display' );
                                        if ( $st_blog_description || is_customize_preview() ) :
                                            ?>
                                            <?php if (!empty($st_blog_description)) { ?>
                                                <p class="site-description"><?php echo $st_blog_description; /* WPCS: xss ok. */ ?></p>
                                            <?php } ?>
                                        <?php endif; ?>
                                    </div><!-- .site-branding -->                   
                                </div><!-- site brand-->

                                <!-- left and right nav -->
                                <div class="text-right st-blog-logo-left-right-nav st-blog-menu-toggler-manage">
                                    <button class="menu-toggler" id="menu-icon">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </button>
                                    
                                    <nav id="site-navigation" class="main-navigation">
                                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'st-blog' ); ?></button>
                                        <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'menu-1',
                                            'menu_id'        => 'primary-menu',
                                            'fallback_cb'   => 'st_blog_primary_menu'
                                        ) );
                                        ?>

                                        <!-- search toggle icon -->
                                        
                                        <button class="st-blog-head-search-toggler d-none d-lg-block"><i class="fas fa-search"></i></button>
                                        
                                    </nav><!-- #site-navigation -->     

                                    <!-- search toggle icon -->
                                        <button class="st-blog-head-search-toggler d-lg-none"><i class="fas fa-search"></i></button>
                                </div><!-- site nav -->
                            </div>
                        </div>
                    </div>
                </div>

                <?php if( st_blog_header_alignment() == 'header_first') { ?>
                    <?php st_blog_header_navigation(''); ?>
                <?php } ?>

            </div>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content container">
        
        <?php
        if (  is_front_page() && !is_home() ) {
        } else {
            /**
             * st_blog_action_after_title hook
             * @since st-blog 1.0.0
             *
             * @hooked null
             */
            do_action( 'st_blog_action_after_title' );//breadcrumb
        }
        ?>

        <div class="st-blog-site-content">

<?php 
}
endif;
add_action( 'st_blog_action_header', 'st_blog_header', 10 );

if ( is_front_page() )
{
    do_action('st_blog_front_homepage');
}

if( ! function_exists( 'st_blog_main_slider_setion' ) ) :
/**
 * Main slider
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function st_blog_main_slider_setion(){
        if (  is_front_page() && !is_home() ) {
            do_action('st_blog_action_main_slider');
        }
    }
endif;
add_action( 'st_blog_action_on_header', 'st_blog_main_slider_setion', 10 );


if( ! function_exists( 'st_blog_add_breadcrumb' ) ) :

/**
 * Breadcrumb
 *
 * @since st-blog 1.0.0
 *
 * @param null
 * @return null
 *
 */
    function st_blog_add_breadcrumb(){
        global$st_blog_customizer_all_values;
        // Bail if Breadcrumb disabled
        $breadcrumb_enable_breadcrumb =$st_blog_customizer_all_values['st-blog-enable-breadcrumb' ];
        if ( 1 != $breadcrumb_enable_breadcrumb ) {
            return;
        }
        // Bail if Home Page
        if ( is_front_page() || is_home() ) {
            return;
        }
        echo '<div class="container">
        <div id="breadcrumb" class="wrapper wrap-breadcrumb">';
         st_blog_simple_breadcrumb();
        echo '</div><!-- .container --></div><!-- #breadcrumb -->';
        return;
    }
endif;
add_action( 'st_blog_action_after_title', 'st_blog_add_breadcrumb', 10 );


