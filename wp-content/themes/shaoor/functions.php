<?php


	function shaoor_blog_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Bottom Sidebar', 'shaoor' ),
			'id'            => 'sidebar-bottom',
			'description'   => esc_html__( 'Add widgets here for footer widget area.', 'shaoor' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
	add_action( 'widgets_init', 'shaoor_blog_widgets_init' );
	
	if( !function_exists( 'shaoor_blog_social_media' ) ):
		function shaoor_blog_social_media() {
			$get_social_media_icons = get_theme_mod( 'social_media_icons', '' );
			$get_decode_social_media = json_decode( $get_social_media_icons );
			if( ! empty( $get_decode_social_media ) ) {
				echo '<div class="cv-social-icons-wrapper">';
				foreach ( $get_decode_social_media as $single_icon ) {
					$icon_class = $single_icon->cv_icons_list;
					$icon_url = $single_icon->cv_url_field;
					if( !empty( $icon_url ) ) {
						echo '<span class="social-link"><a href="'. esc_url( $icon_url ) .'" target="_blank"><i class="'. esc_attr( $icon_class ) .'"></i></a></span>';
					}
				}
				echo '</div><!-- .cv-social-icons-wrapper -->';
			}
		}
	endif;
	if( ! function_exists( 'shaoor_blog_front_banner_content' ) ):
		/**
		 * function to define banner section
		 */
		function shaoor_blog_front_banner_content() {
			$shaoor_blog_front_banner_option = get_theme_mod( 'shaoor_blog_front_banner_option', true );
			if( $shaoor_blog_front_banner_option === false ) {
				return;
			}
			$shaoor_blog_front_banner_image = get_theme_mod( 'shaoor_blog_front_banner_image', '' );
			$shaoor_blog_banner_title 		= get_theme_mod( 'shaoor_blog_banner_title', __( 'Banner Title', 'shaoor' ) );
			$shaoor_blog_banner_content 	= get_theme_mod( 'shaoor_blog_banner_content', '' );
			$shaoor_blog_banner_btn_text 	= get_theme_mod( 'shaoor_blog_banner_btn_text', __( 'Discover', 'shaoor' ) );
			$shaoor_blog_banner_btn_link 	= get_theme_mod( 'shaoor_blog_banner_btn_link', '' );
			if( !empty( $shaoor_blog_front_banner_image ) ) {
	?>
				<div class="cv-banner-wrapper">
					<figure>
						<img src="<?php echo esc_url( $shaoor_blog_front_banner_image ); ?>">
					</figure>
					<div class="banner-content">
						<h2 class="banner-title"><?php echo esc_html( $shaoor_blog_banner_title ); ?></h2>
						<div class="banner-info"><?php echo wp_kses_post( $shaoor_blog_banner_content ); ?></div>
						<div class="banner-btn"><a href="<?php echo esc_url( $shaoor_blog_banner_btn_link ); ?>"><?php echo esc_html( $shaoor_blog_banner_btn_text ); ?> <i class="fa fa-long-arrow-right"></i></a></div>
					</div>
				</div><!-- .cv-banner-wrapper -->
	<?php
			}
		}
	endif;

	add_action( 'shaoor_blog_front_banner', 'shaoor_blog_front_banner_content', 10 );
	
	function shaoor_enqueue_styles() {
		
		wp_enqueue_style( 'shaoor-parent-style', get_template_directory_uri() . '/style.css' );
		
		wp_enqueue_style( 'shaoor-common-style', get_stylesheet_directory_uri() . '/css/normal.css?t='.time() );
		wp_enqueue_style( 'shaoor-wc-style', get_stylesheet_directory_uri() . '/css/wc.css?t='.time() );
		//wp_enqueue_style( 'shaoor-media-style', get_stylesheet_directory_uri() . '/css/mobile.css' );
		
		//wp_enqueue_script( 'shaoor-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array( 'jquery' ), '', true );
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}		
	}
	add_action('wp_enqueue_scripts', 'shaoor_enqueue_styles');
		
		
		
	add_filter( 'the_content', 'shaoor_filter_the_content' );
	 
	function shaoor_filter_the_content( $content ) {
	 
	 	
		// Check if we're inside the main loop in a single post page.
		if ( is_single() || is_page()) {
			$content = shaoor_breadcrumb().$content;
		}
	 
		return $content;
	}
		
	function shaoor_content_width() {
	
		$content_width = $GLOBALS['content_width'];
	
		// Get layout.
		$page_layout = get_theme_mod( 'page_layout' );
	
		// Check if layout is one column.
		if ( 'one-column' === $page_layout ) {
			if ( is_front_page() ) {
				$content_width = 644;
			} elseif ( is_page() ) {
				$content_width = 740;
			}
		}
	
		// Check if is single post and there is no sidebar.
		if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
			$content_width = 740;
		}
		$GLOBALS['content_width'] = apply_filters( 'shaoor_content_width', $content_width );
	}
	add_action( 'template_redirect', 'shaoor_content_width', 0 );	
	
	add_filter( 'document_title_parts', 'shaoor_remove_title_sitename' );
	  function shaoor_remove_title_sitename( $title ) {
		if ( is_search() || is_404() || is_author() || is_tag() ) {
		unset( $title['site'] );
		}
		return $title;
	  }
	
	// breadcrumb list
	if (!function_exists('shaoor_breadcrumb')) {
	  function shaoor_breadcrumb($divOption = array("id" => "wp_breadcrumb", "class" => "wp_breadcrumb inner wrap cf")){
		  global $post;
		  $str ='';
		  if(!get_option('side_options_pannavi')){
			if(!is_home()&&!is_front_page()&&!is_admin() ){
				$tagAttribute = '';
				foreach($divOption as $attrName => $attrValue){
					$tagAttribute .= sprintf(' %s="%s"', $attrName, esc_attr($attrValue));
				}
				$str.= '<div'. $tagAttribute .'>';
				$str.= '<ul itemscope itemtype="http://schema.org/BreadcrumbList">';
				$str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. esc_url( home_url() ) .'/" itemprop="item"><span itemprop="name">'.__('HOME', 'shaoor').'</span></a></li>';
	 
				if(is_category()) {
					$cat = get_queried_object();
					if($cat -> parent != 0){
						$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
						foreach($ancestors as $ancestor){
							$str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. esc_url( get_category_link($ancestor) ) .'" itemprop="item"><span itemprop="name">'. esc_html( get_cat_name($ancestor) ) .'</span></a></li>';
						}
					}
					$str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">'. esc_html($cat->name) . '</span></li>';
				} elseif(is_single()){
					$categories = get_the_category($post->ID);
					$cat = $categories[0];
					if($cat -> parent != 0){
						$ancestors = array_reverse(get_ancestors( $cat -> cat_ID, 'category' ));
						foreach($ancestors as $ancestor){
							$str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. esc_url( get_category_link($ancestor) ).'" itemprop="item"><span itemprop="name">'. esc_html( get_cat_name($ancestor) ). '</span></a></li>';
						}
					}
					$str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. esc_url( get_category_link($cat -> term_id) ). '" itemprop="item"><span itemprop="name">'. esc_html($cat-> cat_name) . '</span></a></li>';
					$str.= '<li>'. $post -> post_title .'</li>';
				} elseif(is_page()){
					if($post -> post_parent != 0 ){
						$ancestors = array_reverse(get_post_ancestors( $post->ID ));
						foreach($ancestors as $ancestor){
							$str.='<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="'. get_permalink($ancestor).'" itemprop="item"><span itemprop="name">'. esc_html( get_the_title($ancestor) ) .'</span></a></li>';
						}
					}
					$str.= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">'. esc_html($post->post_title) .'</span></li>';
				 } else{
					$str.='<li>'. wp_get_document_title('', false) .'</li>';
				}
				$str.='</ul>';
				$str.='</div>';
			}
		}
		  echo $str;
	  }
	}
	
	// Year of issue
	function shaoor_get_first_post_year(){
	  $year = null;
	  query_posts('posts_per_page=1&order=ASC');
	  if ( have_posts() ) : while ( have_posts() ) : the_post();
		$year = intval(get_the_time('Y'));
	  endwhile; endif;
	  wp_reset_query();
	  return $year;
	}
	 
	//Copyright
	function shaoor_get_copylight_credit(){
	  $site_tag = get_bloginfo('name');
	  return '&copy; '.shaoor_get_first_post_year().' '.$site_tag;
	}
	
	function shaoor_footer_scripts(){
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		$custom_logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		
?>
	<style type="text/css">
		<?php if(!empty($custom_logo)): ?>	
		body.home footer.site-footer:after{
			background: url("<?php echo esc_url($custom_logo[0]); ?>") no-repeat 0 0;
			background-size: auto 72px;
			background-position: bottom center;			
		}
		<?php endif; ?>
	</style>			
<?php			

		$svg_icons = get_theme_file_path( '/images/svg-icons.svg' );
	
		// If it exists, include it.
		if ( file_exists( $svg_icons ) ) {
			require_once( $svg_icons );
		}
	}
	
	add_action('wp_footer', 'shaoor_footer_scripts');
	
	function shaoor_setup() {
		
		register_nav_menus( array(
			'shaoor_blog_primary_menu' => esc_html__( 'Main Menu', 'shaoor' ),
			'shaoor_blog_footer_menu'  => esc_html__( 'Bottom Menu', 'shaoor' ),
		) );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
	
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
	
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
	
		add_image_size( 'shaoor-featured-image', 2000, 1200, true );
	
		add_image_size( 'shaoor-thumbnail-avatar', 100, 100, true );
	
		// Set the default content width.
		$GLOBALS['content_width'] = 525;
	
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'top'    => __( 'Top Menu', 'shaoor' ),
				'social' => __( 'Social Links Menu', 'shaoor' ),
			)
		);
	
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5', array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);
	
		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support(
			'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'audio',
			)
		);
	
		// Add theme support for Custom Logo.
		add_theme_support(
			'custom-logo', array(
				'width'      => 250,
				'height'     => 250,
				'flex-width' => true,
			)
		);
	
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
				
		$defaults = array(
			'default-color'          => '',
			'default-image'          => get_stylesheet_directory_uri().'/images/thermometer-833085_1920.jpg',
			'default-repeat'         => 'no-repeat',
			'default-position-x'     => 'center',
			'default-position-y'     => 'center',
			'default-size'           => 'cover',
			'default-attachment'     => 'fixed',
			'wp-head-callback'       => '_custom_background_cb',
			'admin-head-callback'    => '',
			'admin-preview-callback' => ''
		);
				
		add_theme_support( 'custom-background', $defaults );
		
		
	
		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, and column width.
		  */
		  
		if(function_exists('shaoor_fonts_url'))
		add_editor_style( array( 'assets/css/editor-style.css', shaoor_fonts_url() ) );
		
		
	
		// Define and register starter content to showcase the theme on new sites.
		$starter_content = array(
			'widgets'     => array(
				// Place three core-defined widgets in the sidebar area.
				'sidebar-1' => array(
					'text_business_info',
					'search',
					'text_about',
				),
	
				// Add the core-defined business info widget to the footer 1 area.
				'sidebar-2' => array(
					'text_business_info',
				),
	
				// Put two core-defined widgets in the footer 2 area.
				'sidebar-3' => array(
					'text_about',
					'search',
				),
			),
	
			// Specify the core-defined pages to create and add custom thumbnails to some of them.
			'posts'       => array(
				'home',
				'about'            => array(
					'thumbnail' => '{{image-sandwich}}',
				),
				'contact'          => array(
					'thumbnail' => '{{image-espresso}}',
				),
				'blog'             => array(
					'thumbnail' => '{{image-coffee}}',
				),
				'homepage-section' => array(
					'thumbnail' => '{{image-espresso}}',
				),
			),
	
			// Create the custom image attachments used as post thumbnails for pages.
			'attachments' => array(
				'image-espresso' => array(
					'post_title' => _x( 'Media #1', 'Shaoor starter content #1', 'shaoor' ),
					'file'       => 'images/checklist-3222079_640.jpg', // URL relative to the template directory.
				),
				'image-sandwich' => array(
					'post_title' => _x( 'Media #2', 'Shaoor starter content #2', 'shaoor' ),
					'file'       => 'images/close-up-1853400_640.jpg',
				),
				'image-coffee'   => array(
					'post_title' => _x( 'Media #3', 'Shaoor starter content #3', 'shaoor' ),
					'file'       => 'images/clinic-1807543_640.jpg',
				),
			),
	
			// Default to a static front page and assign the front and posts pages.
			'options'     => array(
				'show_on_front'  => 'page',
				'page_on_front'  => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),
	
			// Set the front page section theme mods to the IDs of the core-registered pages.
			'theme_mods'  => array(
				'panel_1' => '{{homepage-section}}',
				'panel_2' => '{{about}}',
				'panel_3' => '{{blog}}',
				'panel_4' => '{{contact}}',
			),
	
			// Set up nav menus for each of the two areas registered in the theme.
			'nav_menus'   => array(
				// Assign a menu to the "top" location.
				'top'    => array(
					'name'  => __( 'Top Menu', 'shaoor' ),
					'items' => array(
						'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
						'page_about',
						'page_blog',
						'page_contact',
					),
				),
	
				// Assign a menu to the "social" location.
				'social' => array(
					'name'  => __( 'Social Links Menu', 'shaoor' ),
					'items' => array(
						'link_yelp',
						'link_facebook',
						'link_twitter',
						'link_instagram',
						'link_email',
					),
				),
			),
		);
	
	
		$starter_content = apply_filters( 'shaoor_starter_content', $starter_content );
	
		add_theme_support( 'starter-content', $starter_content );
		
		
	}
	add_action( 'after_setup_theme', 'shaoor_setup' );
		
	function shaoor_get_svg( $args = array() ) {
		// Make sure $args are an array.
		if ( empty( $args ) ) {
			return __( 'Please define default parameters in the form of an array.', 'shaoor' );
		}
	
		// Define an icon.
		if ( false === array_key_exists( 'icon', $args ) ) {
			return __( 'Please define an SVG icon filename.', 'shaoor' );
		}
	
		// Set defaults.
		$defaults = array(
			'icon'     => '',
			'title'    => '',
			'desc'     => '',
			'fallback' => false,
		);
	
		// Parse args.
		$args = wp_parse_args( $args, $defaults );
	
		// Set aria hidden.
		$aria_hidden = ' aria-hidden="true"';
	
		// Set ARIA.
		$aria_labelledby = '';
	
		if ( $args['title'] ) {
			$aria_hidden     = '';
			$unique_id       = uniqid();
			$aria_labelledby = ' aria-labelledby="title-' . esc_attr($unique_id) . '"';
	
			if ( $args['desc'] ) {
				$aria_labelledby = ' aria-labelledby="title-' . esc_attr($unique_id) . ' desc-' . esc_attr($unique_id) . '"';
			}
		}
	
		// Begin SVG markup.
		$svg = '<svg class="icon icon-' . esc_attr( $args['icon'] ) . '"' . $aria_hidden . esc_attr($aria_labelledby) . ' role="img">';
	
		// Display the title.
		if ( $args['title'] ) {
			$svg .= '<title id="title-' . esc_attr($unique_id) . '">' . esc_html( $args['title'] ) . '</title>';
	
			// Display the desc only if the title is already set.
			if ( $args['desc'] ) {
				$svg .= '<desc id="desc-' . esc_attr($unique_id) . '">' . esc_html( $args['desc'] ) . '</desc>';
			}
		}
	
		/*
		 * Display the icon.
		 *
		 * The whitespace around `<use>` is intentional - it is a work around to a keyboard navigation bug in Safari 10.
		 *
		 * See https://core.trac.wordpress.org/ticket/38387.
		 */
		$svg .= ' <use href="#icon-' . esc_html( $args['icon'] ) . '" xlink:href="#icon-' . esc_html( $args['icon'] ) . '"></use> ';
	
		// Add some markup to use as a fallback for browsers that do not support SVGs.
		if ( $args['fallback'] ) {
			$svg .= '<span class="svg-fallback icon-' . esc_attr( $args['icon'] ) . '"></span>';
		}
	
		$svg .= '</svg>';
	
		return $svg;
	}	
	
	function shaoor_body_classes( $classes ) {	
	
	
		$image = get_background_image();
		if(empty($image)){
			$classes[] = 'bright';
		}
		
		
		return $classes;
	}	
	
	add_filter( 'body_class', 'shaoor_body_classes', 11 );