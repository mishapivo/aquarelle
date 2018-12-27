<?php
/**
 * Theme_Palace custom helper funtions
 *
 * This is the template that includes all the other files for core featured of Photo Fusion Pro
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

if( ! function_exists( 'edumag_check_enable_status' ) ):
	/**
	 * Check status of content.
	 *
	 * @since EduMag 0.1
	 */
  	function edumag_check_enable_status( $input, $content_enable ){
		$options = edumag_get_theme_options();

		// Content status.
		$content_status = $options[ $content_enable ];

		// Get Page ID outside Loop.
		$query_obj = get_queried_object();
		$page_id   = null;

	    if ( is_object( $query_obj ) && 'WP_Post' == get_class( $query_obj ) ) {
	    	$page_id = get_queried_object_id();
	    }

		if ( ( ! is_home() && is_front_page() ) && ( 'static-frontpage' === $content_status ) ) {
			$input = true;
		}
		else {
			$input = false;
		}

		return ( $input );
  	}
endif;
add_filter( 'edumag_section_status', 'edumag_check_enable_status', 10, 2 );

/**
 * Fallback function call for menu
 * @param  Mixed $args Menu arguments
 * @return String $output Return or echo the add menu link.       
 */
function edumag_menu_fallback_cb( $args ){
    if ( ! current_user_can( 'edit_theme_options' ) ){
	    return;
   	}
    // see wp-includes/nav-menu-template.php for available arguments
    $link = $args['link_before']
        	. '<a href="' .esc_url( admin_url( 'nav-menus.php' ) ) . '">' . $args['before'] . esc_html__( 'Add a menu','edumag' ) . $args['after'] . '</a>'
        	. $args['link_after'];

   	if ( FALSE !== stripos( $args['items_wrap'], '<ul' ) || FALSE !== stripos( $args['items_wrap'], '<ol' )
	){
		$link = "<li>$link</li>";
	}
	$output = sprintf( $args['items_wrap'], $args['menu_id'], $args['menu_class'], $link );
	if ( ! empty ( $args['container'] ) ){
		$output = sprintf( '<%1$s class="%2$s" id="%3$s">%4$s</%1$s>', $args['container'], $args['container_class'], $args['container_id'], $output );
	}
	if ( $args['echo'] ){
		echo $output;
	}
	return $output;
}

if ( ! function_exists( 'edumag_is_sidebar_enable' ) ) :
	/**
	 * Check if sidebar is enabled in meta box first then in customizer
	 *
	 * @since EduMag 0.1
	 */
	function edumag_is_sidebar_enable() {
		$options          = edumag_get_theme_options();
		$sidebar_position = $options['sidebar_position'];

        if ( is_home() ) {
            $post_id = get_option( 'page_for_posts' );
            if ( ! empty( $post_id ) ) {
                $post_sidebar_position = get_post_meta( $post_id, 'edumag-sidebar-position', true );
            }
            else {
                $post_sidebar_position = '';
            }
            
        } elseif ( is_archive() || is_search() ) {
            $post_sidebar_position = '';
        } else {
            $post_id = get_the_id();
            $post_sidebar_position = get_post_meta( $post_id, 'edumag-sidebar-position', true );
        }

        if ( ( $sidebar_position == 'no-sidebar' && $post_sidebar_position == "" ) || $post_sidebar_position == 'no-sidebar' ) {
            return false;
        } else {
            return true;
        }
	}
endif;



if ( ! function_exists( 'edumag_is_frontpage_content_enable' ) ) :
	/**
	 * Check home page ( static ) content status.
	 *
	 *.0
	 *
	 * @param bool $status Home page content status.
	 * @return bool Modified home page content status.
	 */
	function edumag_is_frontpage_content_enable( $status ) {
		if ( is_front_page() ) {
			$options = edumag_get_theme_options();
			$front_page_content_status = $options['enable_frontpage_content'];
			if ( false === $front_page_content_status ) {
				$status = false;
			}
		}
		return $status;
	}
endif;
add_filter( 'edumag_filter_frontpage_content_enable', 'edumag_is_frontpage_content_enable' );



if ( ! function_exists( 'edumag_simple_breadcrumb' ) ) :
	/**
	 * Simple breadcrumb.
	 *
	 *
	 * @param  array $args Arguments
	 */
	function edumag_simple_breadcrumb( $args = array() ) {

		/**
		 * Add breadcrumb.
		 *
		 */
		$options = edumag_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}

		$args = array(
			'show_on_front'   => false,
			'show_title'      => true,
			'show_browse'     => false,
		);
		breadcrumb_trail( $args );      

		return;
	}
endif;
add_action( 'edumag_simple_breadcrumb', 'edumag_simple_breadcrumb' , 10 );


if ( ! function_exists( 'edumag_pagination' ) ) :
	/**
	 * pagination.
	 *
	 * @since EduMag 0.1
	 */
	function edumag_pagination() {
		$options = edumag_get_theme_options();
		if ( true == $options['pagination_enable'] ) {
				the_posts_navigation();
		}
	}
endif;
add_action( 'edumag_action_pagination', 'edumag_pagination', 10 );

if( !function_exists( 'edumag_excerpt_length' ) ):
	/**
	 * long excerpt
	 * 
	 * @since EduMag 0.1
	 * @return  long excerpt value
	 */
	function edumag_excerpt_length( $length ){
		if( is_admin() ) 
			return $length;

		$options = edumag_get_theme_options();
		$length = $options['long_excerpt_length'];
		return $length;
	}
endif;
add_filter( 'excerpt_length', 'edumag_excerpt_length' );

if( !function_exists( 'edumag_excerpt_more' ) ) :
	// read more
	function edumag_excerpt_more( $more ){
		return '...';
	}
endif;
add_filter( 'excerpt_more', 'edumag_excerpt_more' );

if( !function_exists( 'edumag_trim_content' ) ) :
	/**
	 * custom excerpt function
	 * 
	 * @since EduMag 0.1
	 * @return  no of words to display
	 */
	function edumag_trim_content( $length = 40, $post_obj = null ) {
		global $post;
		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );
		if ( $length < 1 ) {
			$length = 40;
		}

		$source_content = $post_obj->post_content;
		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );

	   return apply_filters( 'edumag_trim_content', $trimmed_content );
	}
endif;

if ( ! function_exists( 'edumag_custom_content_width' ) ) :
	/**
	 * Custom content width.
	 *
	 * @since EduMag 0.1
	 */
	function edumag_custom_content_width() {

		global $content_width;
		$sidebar_position = edumag_layout();
		switch ( $sidebar_position ) {

		  case 'no-sidebar':
		    $content_width = 1170;
		    break;

		  case 'left-sidebar':
		  case 'right-sidebar':
		    $content_width = 819;
		    break;

		  default:
		    break;
		}
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$content_width = 1170;
		}
	}
endif;
add_action( 'template_redirect', 'edumag_custom_content_width' );


if ( ! function_exists( 'edumag_layout' ) ) :
	/**
	 * Check home page layout option
	 *
	 * @since EduMag 0.1
	 *
	 * @return string EduMag layout value
	 */
	function edumag_layout() {
		$options = edumag_get_theme_options();

		$sidebar_position = $options['sidebar_position'];
		$sidebar_position = apply_filters( 'edumag_sidebar_position', $sidebar_position );

		// Check if single and static blog page
		if ( is_singular() || is_home() ) {
			if ( is_home() ) {
				$post_sidebar_position = get_post_meta( get_option( 'page_for_posts' ), 'edumag-sidebar-position', true );
			} else {
				$post_sidebar_position = get_post_meta( get_the_id(), 'edumag-sidebar-position', true );
			}
			if ( isset( $post_sidebar_position ) && ! empty( $post_sidebar_position ) ) {
				$sidebar_position = $post_sidebar_position;
			}
		}
		return $sidebar_position;
	}
endif;

if ( ! function_exists( 'edumag_footer_sidebar_class' ) ) :
	/**
	 * Count the number of footer sidebars to enable dynamic classes for the footer
	 *
	 * @since EduMag 0.1
	 */
	function edumag_footer_sidebar_class() {
		$data = array();
		$active_id = array();
		$active_sidebar = array();
	   	$count = 0;

	   	if ( is_active_sidebar( 'edumag_footer_sidebar' ) ) {
	   		$active_id[] 		= '1';
	   		$active_sidebar[] 	= 'edumag_footer_sidebar';
	      	$count++;
	   	}

	   	if ( is_active_sidebar( 'edumag_footer_sidebar-2' ) ){
	   		$active_id[] 		= '2';
	   		$active_sidebar[] 	= 'edumag_footer_sidebar-2';
	      	$count++;
		}

	   	if ( is_active_sidebar( 'edumag_footer_sidebar-3' ) ){
	   		$active_id[] 		= '3';
	   		$active_sidebar[] 	= 'edumag_footer_sidebar-3';
	      	$count++;
	   	}

	   	if ( is_active_sidebar( 'edumag_footer_sidebar-4' ) ){
	   		$active_id[] 		= '4';
	   		$active_sidebar[] 	= 'edumag_footer_sidebar-4';
	      	$count++;
	   	}

	   	$class = '';

	   	switch ( $count ) {
        	case '1':
            $class = 'one-column';
            break;
        	case '2':
            $class = 'two-columns';
            break;
        	case '3':
            $class = 'three-columns';
            break;
            case '4':
            $class = 'four-columns';
            break;
	   	}

		$data['active_id'] 		= $active_id;
		$data['active_sidebar'] = $active_sidebar;
		$data['class']     		= $class;

	   	return $data;
	}
endif;


if ( ! function_exists( 'edumag_header_image_meta_option' ) ) :
	/**
	 * Check header image option meta
	 *
	 * @since EduMag 0.1
	 *
	 * @return string Header image meta option
	 */
	function edumag_header_image_meta_option() {
		
		global $post;

		if ( is_object( $post ) ) {
			$post_id = $post->ID;
			$header_image_meta = get_post_meta( $post_id, 'edumag-header-image', true );

			if ( 'enable' == $header_image_meta ) {
				if( has_post_thumbnail( $post_id ) ){

					return get_the_post_thumbnail( $post_id, 'full', $attr = array( 'alt' => the_title_attribute( array( 'echo' => false, 'post' => $post_id ) ) ) );
				} else{
					return '<img src="'. esc_url( get_template_directory_uri().'/assets/uploads/no-featured-image-1200x400.jpg' ) . '" alt="'. esc_attr__( 'Banner Image', 'edumag' ) .'"/>';
				}

			}elseif ( '' == $header_image_meta && get_header_image() ) {
				return '<img src="'. esc_url( get_header_image() ) .'" alt="'. esc_attr__( 'Banner Image', 'edumag' ).'"/>';
			} elseif ( 'disable' == $header_image_meta ) {
				return '';
			}
		} else {
			return '<img src="'. esc_url( get_header_image() ) .'" alt="'. esc_attr__( 'Banner Image', 'edumag' ).'"/>';
		}
	}
endif;

if ( ! function_exists( 'edumag_get_post_title' ) ) :
	/**
	 * post/ page titile.
	 *
	 * @since EduMag 0.1
	 */
	function edumag_get_post_title() {
		global $post;

		$post_title = get_the_title( $post );

		if( !empty( $post_title ) ): ?>

		<section id="page-heading" class="page-title">
            <header class="entry-header wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
                <h2 class="entry-title"><?php echo esc_html( $post_title ); ?></h2>
            </header>
        </section><!-- .page-title -->

		<?php
		endif;
	}
endif;
add_action( 'edumag_post_title', 'edumag_get_post_title', 10 );

if ( ! function_exists( 'edumag_get_thumbnail_image' ) ) :
	/**
	 * display post or page thumbnail image
	 *
	 * @since EduMag 0.1
	 *
	 * @return string value
	 */
	function edumag_get_thumbnail_image() {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( is_singular() ) {
			global $post;
			$post_id = $post->ID;

			$header_image_meta = get_post_meta( $post_id, 'edumag-header-image', true );

			if( 'enable' == $header_image_meta ) return; // retun if thumbnail image is used as a header image.
			the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); 

		} elseif( is_home() ){ ?>
			<a class="post-thumbnail" href="<?php echo esc_url( get_the_permalink() ); ?>" aria-hidden="true">
			<?php 
				if( has_post_thumbnail() ){
					the_post_thumbnail( 'edumag-blog-images',  array( 'alt' => the_title_attribute( 'echo=0' ) ) );
				} else { 
					echo '<img  src="'. esc_url( get_template_directory_uri() .'/assets/uploads/no-featured-image-175x230.jpg') .'" alt="'. the_title_attribute() .'">';
				}
			?>
			</a>
			<?php

		} elseif( is_archive() || is_search() ){ ?>

			<a class="post-thumbnail" href="<?php echo esc_url( get_the_permalink() ); ?>" aria-hidden="true">
			<?php 
				if( has_post_thumbnail() ){
					the_post_thumbnail( 'edumag-archive-search-image',  array( 'alt' => the_title_attribute( 'echo=0' ) ) );
				}else {
					echo '<img  src="'. esc_url( get_template_directory_uri() .'/assets/uploads/no-featured-image-350x265.jpg') .'" alt="'. the_title_attribute() .'">';
				}
			?>
			</a>
		<?php

		}
		else { ?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</a>
		<?php } 
	}
endif;

if( !function_exists( 'edumag_get_author_profile' ) ) :
	/*
	 * Function to get author profile
	 */           
	function edumag_get_author_profile(){
		$author_url = get_the_author_meta( 'user_url' ); 
	    $author_url = !empty( $author_url ) ? $author_url : '#' ;
	    $author_description = get_the_author_meta( 'description' );
	    ?>
	    <div id="about-author" class="page-section wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
			<header class="entry-header">
				<h2 class="entry-title"><?php esc_html_e( 'About the author', 'edumag' ); ?></h2>
			</header><!-- .entry-header -->
			<div class="entry-content">
				<div class="author-image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 100 );  ?>
				</div><!-- .author-image -->
				<div class="author-content">
					<div class="author-name clear">
				    	<h6><a href="<?php echo esc_url( $author_url ); ?>"><?php the_author_meta('display_name'); ?></a></h6>
				  	</div>
					<?php if( !empty( $author_description ) ) :
						echo '<p>'. esc_html( $author_description ) .'</p>';
					endif; ?>
				</div><!-- .author-content -->
			</div><!-- .entry-content -->
	    </div><!-- #about-author -->
	    <?php
	}
endif;
add_action( 'edumag_author_profile', 'edumag_get_author_profile' );

if( !function_exists( 'edumag_get_related_posts' ) ) :
	/*
	 * Function to get related posts
	 */           
	function edumag_get_related_posts(){
	    global $post;

	    $options = edumag_get_theme_options(); // get theme options

	    $post_categories = get_the_category( $post->ID ); // get category object
	    $category_ids = array(); // set an empty array
	    
	    if( empty( $post_categories ) ) {
	    	return;
	    }
	    foreach ( $post_categories as $post_category ) {
	      $category_ids[] = $post_category->term_id;
	    }

	    $qargs = array(
	            'posts_per_page'  => 3,
	            'category__in'    => $category_ids,
	            'post__not_in'    => array( $post->ID ),
	            'order'           => 'ASC',
	            'orderby'         => 'rand'
	       	);

	    $related_posts = get_posts( $qargs ); // custom posts

	    if( !empty( $related_posts ) ) : // check if related posts exists
	    ?>
	    <div id="related-posts" class="three-columns page-section clear wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="0.5s">
		    <header class="entry-header">
		        <h2 class="entry-title related_post_title"><?php esc_html_e( 'Related posts', 'edumag' ); ?></h2> 
		    </header>

			<div class="entry-content">
			<?php foreach ( $related_posts as $related_post ) :
		        if ( has_post_thumbnail( $related_post->ID ) ) {
		            $img_array = wp_get_attachment_image_src( get_post_thumbnail_id( $related_post->ID ), 'edumag-featured-category-image' );
		        } else {
		            $img_array = array( get_template_directory_uri() . '/assets/uploads/no-featured-image-450x300.jpg' );
		        }
		        $post_title = get_the_title( $related_post->ID );
		        $post_url   = get_permalink( $related_post->ID );
		        $post_date  = get_the_date( '', $related_post->ID);
		    ?>

				<article id="post-1" class="post has-post-thumbnail hentry">
					<div class="image-wrapper">
						<a class="post-thumbnail" href="<?php echo esc_url( $post_url );?>" aria-hidden="true">
						<img src="<?php echo esc_url( $img_array[0] ); ?>" alt="<?php echo esc_attr( $post_title ); ?>">
						</a><!-- end .post-thumbnail -->
					</div><!-- .image-wrapper -->

					<header class="entry-header">
						<h2 class="entry-title"><a href="<?php echo esc_url( $post_url ); ?>"><?php echo esc_html( $post_title ); ?></a></h2>  
						<time datetime="<?php echo date_i18n( esc_html__( 'M d, Y', 'edumag' ), strtotime( get_gmt_from_date( $post_date) ) ); ?>"><?php echo date_i18n( esc_html__( 'M d, Y', 'edumag' ), strtotime( $post_date ) ); ?></time>
					</header><!-- .entry-header -->
				</article><!-- #post-1 -->
			<?php endforeach; ?>

			</div><!-- .entry-content -->
		</div><!-- #related-posts -->
	<?php
		endif;   
	}
endif;
add_action( 'edumag_related_posts', 'edumag_get_related_posts' );



