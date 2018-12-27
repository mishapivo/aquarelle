<?php

add_action( 'admin_menu', 'di_blog_theme_page' );
function di_blog_theme_page() {
    add_theme_page(
        __( 'Di Blog Theme', 'di-blog' ),
        __( 'Di Blog Theme', 'di-blog' ),
        'manage_options',
        'di-blog-theme',
        'di_blog_theme_page_callback'
    );
}

function di_blog_theme_page_callback() {
?>
    <div class="wrap">

        <h1><?php _e( 'Di Blog Theme Info', 'di-blog' ); ?></h1>
        <br />

        <div class="container-fluid" style="border: 2px dashed #C3C3C3;">
            <div class="row">

                <div class="col-md-6" style="padding:0px;">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri() . '/screenshot.png'; ?>" />
                </div>

                <div class="col-md-6">

                    <h2><?php _e( 'Di Blog WordPress Theme', 'di-blog' ); ?></h2>

                    <p style="font-size:16px;"><?php _e( 'Di Blog is a Clean, Modern, Responsive, SEO Friendly, Customizable and Powerful WordPress Theme for Creatives and Bloggers.', 'di-blog' ); ?></p>

                    <p style="font-size:16px;"><?php _e( 'Theme Features: One Click Demo Import, Front Page Slider, Typography Options, Social Profile and Icons, Three Level Responsive Menu, Custom Logo, Page Layouts (Full Width, Left Sidebar, Right Sidebar), Advance Footer Widgets with Layout Selection, Footer Copyright Section, Fully Compatible with popular plugin like Page Builder, WooCommerce, Contact Form 7, WordPress SEO etc.', 'di-blog' ); ?></p>

                    <?php
                    if( ! function_exists( 'di_blog_pro' ) ) {
                    ?>
                    <p style="font-size:16px;"><b><?php _e( 'Di Blog Pro Features: ', 'di-blog' ); ?></b><?php _e( 'Widget Area Creation and Selection, Advance Header Image Options, Slider in Header, All Color Options, Options to Update Footer Front Credit Link, Premium Support.', 'di-blog' ); ?><p>
                    <?php
                    }
                    ?>

                    <a target="_blank" class="btn btn-outline-success btn-sm" href="http://demo.dithemes.com/di-blog/" role="button"><?php _e( 'Theme Demo', 'di-blog' ); ?></a>

                    <a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/di-blog-free-wordpress-theme-documentation/" role="button"><?php _e( 'Theme Docs', 'di-blog' ); ?></a>

                    <a target="_blank" class="btn btn-outline-success btn-sm" href="<?php echo get_dashboard_url().'customize.php'; ?>" role="button"><?php _e( 'Theme Options', 'di-blog' ); ?></a>

                    <?php
                    if( function_exists( 'di_blog_pro' ) ) {
                    ?>
                    <a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/my-tickets/" role="button"><?php _e( 'Get Premium Support', 'di-blog' ); ?></a>
                    <?php
                    } else {
                    ?>
                    <a target="_blank" class="btn btn-outline-success btn-sm" href="https://dithemes.com/product/di-blog-pro-wordpress-theme/" role="button"><?php _e( 'Get Di Blog Pro', 'di-blog' ); ?></a>
                    <?php
                    }
                    ?>

                    <br /><br />

                </div>
            </div>
        </div>
    </div>
<?php
}


// Enqueue js css files only if pagenow is themes.php and query string is page=di-blog-theme.
global $pagenow;
if ( 'themes.php' === $pagenow  && 'page=di-blog-theme' === $_SERVER['QUERY_STRING'] ) {
    add_action( 'admin_enqueue_scripts', 'di_blog_admin_js_css' );
}

function di_blog_admin_js_css() {
    // Load bootstrap css.
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css', array(), '4.0.0', 'all' );
    // Load bootstrap js.
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.js', array( 'jquery' ), '4.0.0', true );
}
