<?php
/**
 * Theme Welcome page function
 *
 * @package Advik Blog Lite
 * @since 1.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// Action to add menu
add_action('admin_menu', 'advik_blog_lite_register_design_page');

/**
 * Register Theme Welcome page in admin menu
 * 
 * @package Advik Blog Lite
 * @since 1.0
 */

  $theme = wp_get_theme();
  $theme_name  = $theme->name;
  $theme_slug  = $theme->template;
  $theme_version  = $theme->version;
  $theme_description  = $theme->description;
 
  
 add_action( 'admin_enqueue_scripts', 'advik_blog_lite_enqueue_scripts'); 
 
 function advik_blog_lite_enqueue_scripts( $hook ) {
        global $theme_name,$theme_slug;
        if ( "appearance_page_{$theme_slug}" !== $hook ) {
                return;
        }
        wp_enqueue_style( "{$theme_slug}-dashboard-style", get_template_directory_uri() . '/includes/dashboard/css/dashboard-style.css' );
}
 

  

function advik_blog_lite_register_design_page() {
    
    global $theme_name,$theme_slug;
    
    add_theme_page(
			 $theme_name,
			 __('Advik Blog Lite', 'advik-blog-lite'),
			 'edit_theme_options',
			 'advik-blog-lite',
			 'advik_blog_lite_designs_page' 
    );
}

/**
 * Function to display Welcome page
 * 
 * @package Advik Blog Lite
 * @since 1.0
 */
function advik_blog_lite_designs_page() {
    
        global $theme_name,$theme_slug,$theme_version,$theme_description;
	$wpos_feed_tabs = advik_blog_lite_help_tabs();
	$active_tab 	= isset($_GET['tab']) ? $_GET['tab'] : 'getting-started';
?>
		
	<div class="wrap advik-blog-lite-postformate-wrap-custom about-wrap">
        <?php include get_template_directory() . '/includes/dashboard/sections/welcome.php'; ?>
		<h2 class="nav-tab-wrapper">
                    <?php
                    foreach ($wpos_feed_tabs as $tab_key => $tab_val) {
                            $tab_name	= $tab_val['name'];
                            $active_cls = ($tab_key == $active_tab) ? 'nav-tab-active' : '';
                            $tab_link 	= add_query_arg( array( 'page' => 'advik-blog-lite', 'tab' => $tab_key), admin_url('themes.php') );
                    ?>

                    <a class="nav-tab <?php echo esc_attr($active_cls); ?>" href="<?php echo esc_url($tab_link); ?>"><?php echo $tab_name; ?></a>

			<?php } ?>
		</h2>
		
		<div class="advik-blog-lite-postformate-tab-cnt-wrp">
		<?php
			if( isset($active_tab) && $active_tab == 'getting-started' ) {
				advik_blog_lite_getting_started_page();
			}
			else if( isset($active_tab) && $active_tab == 'support' ) {
				advik_blog_lite_support_page();
			} 
		?>
		</div><!-- end .advik-blog-lite-postformate-tab-cnt-wrp -->

	</div><!-- end .advik-blog-lite-postformate-wrap -->

<?php } 

/**
 * Function to get plugin feed tabs
 *
 * @package Advik Blog Lite
 * @since 1.0
 */
function advik_blog_lite_help_tabs() {
	$wpos_feed_tabs = array(
                                'getting-started' 	=> array(
                                                            'name'              => __('Getting Started', 'advik-blog-lite'),
                                                        ),
                                'support' 	=> array(
                                                            'name'              => __('Support', 'advik-blog-lite'),
                                                        )                                
                                );
	return $wpos_feed_tabs;
}

/**
 * Function to Display getting started tab
 *
 * @package Advik Blog Lite
 * @since 1.0
 */
function advik_blog_lite_getting_started_page() { ?>
	<div class="post-box-container">
		<div id="poststuff">
			<?php include get_template_directory() . '/includes/dashboard/sections/getting-started.php'; ?>				
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }

/**
 * Function to Display support tab
 *
 * @package Advik Blog Lite
 * @since 1.0
 */
function advik_blog_lite_support_page() { ?>
	<div class="post-box-container">
		<div id="poststuff">
			<?php include get_template_directory() . '/includes/dashboard/sections/support.php'; ?>				
		</div><!-- #poststuff -->
	</div><!-- #post-box-container -->
<?php }