<?php

/**
* Theme Constants
*/
define( 'SEABADGERMD_THEME_DIR', get_template_directory() );
define( 'SEABADGERMD_THEME_DIR_URI', get_template_directory_uri() );
define( 'SEABADGERMD_STYLESHEET_DIR', get_stylesheet_directory() );
define( 'SEABADGERMD_STYLESHEET_DIR_URI', get_stylesheet_directory_uri() );
$sbmd_theme = wp_get_theme();
define( 'SEABADGERMD_THEME_VERSION', $sbmd_theme->get( 'Version' ) );

/**
* Include external files
*/
require_once SEABADGERMD_THEME_DIR . '/inc/seabadgermd-customizer.php';
require_once SEABADGERMD_THEME_DIR . '/inc/class-seabadgermd-menuwalker.php';
require_once SEABADGERMD_THEME_DIR . '/inc/seabadgermd-pagination.php';
require_once SEABADGERMD_THEME_DIR . '/widgets/class-seabadgermd-widget-archives.php';
require_once SEABADGERMD_THEME_DIR . '/widgets/class-seabadgermd-widget-recent-posts-grid.php';
require_once SEABADGERMD_THEME_DIR . '/widgets/frontpage/class-seabadgermd-widget-fp-posts.php';
require_once SEABADGERMD_THEME_DIR . '/widgets/frontpage/class-seabadgermd-widget-fp-postcards.php';
require_once SEABADGERMD_THEME_DIR . '/widgets/frontpage/class-seabadgermd-widget-fp-pagecards.php';

/**
 * Include CSS/JS dependencies
 */
function seabadgermd_theme_enqueue_scripts() {
	wp_enqueue_style( 'SEABADGERMD_Font_Awesome', SEABADGERMD_THEME_DIR_URI . '/css/font-awesome.min.css', array(), '4.7.0' );
	wp_enqueue_style( 'SEABADGERMD_Bootstrap_css', SEABADGERMD_THEME_DIR_URI . '/css/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'SEABADGERMD_MDB_css', SEABADGERMD_THEME_DIR_URI . '/css/mdb.min.css', array(), '4.4.3' );
	wp_enqueue_style( 'SEABADGERMDStyle', SEABADGERMD_THEME_DIR_URI . '/style.css', array(), SEABADGERMD_THEME_VERSION );
	wp_enqueue_script( 'SEABADGERMD_Tether', SEABADGERMD_THEME_DIR_URI . '/js/popper.min.js', array(), '1.0.0', true );
	wp_enqueue_script( 'SEABADGERMD_Bootstrap', SEABADGERMD_THEME_DIR_URI . '/js/bootstrap.min.js', array( 'jquery', 'SEABADGERMD_Tether' ), '4.0.0', true );
	wp_enqueue_script( 'SEABADGERMD_MDB', SEABADGERMD_THEME_DIR_URI . '/js/mdb.min.js', array( 'SEABADGERMD_Bootstrap' ), '4.4.3', true );
	wp_enqueue_script( 'SEABADGERMDJS', SEABADGERMD_THEME_DIR_URI . '/js/site.min.js', array( 'SEABADGERMD_MDB' ), SEABADGERMD_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'seabadgermd_theme_enqueue_scripts' );

/**
 * Setup Theme
 */
function seabadgermd_setup() {
	// Let WP manage the title tag
	add_theme_support( 'title-tag' );
	// Automated feed link support
	add_theme_support( 'automatic-feed-links' );
	// Default width to bootstrap lg container width
	if ( ! isset( $content_width ) ) {
		$content_width = 1170;
	}
	// Add text domain
	load_theme_textdomain( 'seabadgermd', SEABADGERMD_THEME_DIR . '/languages' );
	// Navigation Menus
	register_nav_menus(
		array(
			'navbar' => esc_html__( 'Navbar Menu', 'seabadgermd' ),
			'footer' => esc_html__( 'Footer Menu', 'seabadgermd' ),
		)
	);
	// Add featured image support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'seabadgermd-main-full', 1078, 516, false ); // main post image in full width
	add_image_size( 'seabadgermd-small-size', 300 );
	add_image_size( 'seabadgermd-large-size', 750 );
	set_post_thumbnail_size( 750, 250, array( 'center', 'center' ) );
	// Allow custom background
	add_theme_support( 'custom-background' );
	// Support custom header image
	add_theme_support( 'custom-header',
		array(
			'width'              => 1160,
			'flex-width'         => true,
			'flex-height'        => true,
			'header-text'        => true,
			'default-text-color' => '#ffffff',
		)
	);
	// Support custom logo in page header
	add_theme_support(
		'custom-logo', array(
			'height' => 150,
			'width'  => 150,
		)
	);
}
add_action( 'after_setup_theme', 'seabadgermd_setup' );

function seabadgermd_editor_style() {
	// Add some text style to the editor
	add_editor_style( 'css/bootstrap.min.css' );
	add_editor_style( 'css/mdb.min.css' );
	add_editor_style( 'style.css' );
	add_editor_style( seabadgermd_get_colortheme_css() );
}
add_action( 'admin_init', 'seabadgermd_editor_style' );

function seabadgermd_posts_link_attributes() {
	return 'class="page-link"';
}

add_filter( 'next_posts_link_attributes', 'seabadgermd_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'seabadgermd_posts_link_attributes' );


/* Fetch path of current color theme css */
function seabadgermd_get_colortheme_css() {
	$color_theme = get_theme_mod( 'seabadgermd_color_theme' );
	if ( ! seabadgermd_color_theme_exists( $color_theme ) ) {
		$color_theme = 'mdb_dark';
	}
	$color_theme_conf = seabadgermd_get_color_theme( $color_theme );
	return $color_theme_conf['css'];
}

/* Load custom CSS based on the selected color theme and settings */
function seabadgermd_customize_css() {
	wp_enqueue_style( 'ColorTheme_css', get_template_directory_uri() . seabadgermd_get_colortheme_css() );
}
add_action( 'wp_enqueue_scripts', 'seabadgermd_customize_css' );

/**
 * Register sidebars and widgetized areas.
 */

function seabadgermd_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'seabadgermd' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Main sidebar', 'seabadgermd' ),
			'before_widget' => '<div id="%1$s" class="card widget %2$s"><div class="card-body">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<div class="card-title widget-title themecolor">',
			'after_title'   => '</div>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'seabadgermd' ),
			'id'            => 'footer',
			'description'   => esc_html__( 'Footer area', 'seabadgermd' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<span style="display:none">',
			'after_title'   => '</span>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Front page', 'seabadgermd' ),
			'id'            => 'frontpage',
			'description'   => esc_html__( 'Front page content', 'seabadgermd' ),
			'before_widget' => '<div class="row fp-widget"><div class="col-12 posts-col">',
			'after_widget'  => '</div></div>',
			'before_title'  => '<h4 class="fp-widget-title">',
			'after_title'   => '</h4>',
		)
	);

	// unregister_widget( 'WP_Widget_Archives' );
	register_widget( 'Seabadgermd_Widget_Archives' );
	register_widget( 'Seabadgermd_Widget_Recent_Posts_Grid' );
	register_widget( 'Seabadgermd_Widget_Fp_Posts' );
	register_widget( 'Seabadgermd_Widget_Fp_Postcards' );
	register_widget( 'Seabadgermd_Widget_Fp_Pagecards' );
}

add_action( 'widgets_init', 'seabadgermd_widgets_init' );

function seabadgermd_post_navigation() {
	if ( '' !== get_adjacent_post( false, '', false ) || '' !== get_adjacent_post( false, '', true ) ) :
?>
	<div class="row post-navigation">
		<div class="col-6 post-navigation-next">
<?php
if ( '' !== get_adjacent_post( false, '', false ) ) :
	next_post_link( '%link', esc_html__( 'Next post', 'seabadgermd' ) );
	endif;
?>
		</div>
		<div class="col-6 post-navigation-prev">
<?php
if ( '' !== get_adjacent_post( false, '', true ) ) :
	previous_post_link( '%link', esc_html__( 'Previous post', 'seabadgermd' ) );
	endif;
?>
		</div>
	</div>
<?php
endif;
}

/** https://justinklemm.com/add-class-to-wordpress-next_post_link-and-previous_post_link-links/ **/
add_filter( 'next_post_link', 'seabadgermd_post_navlink_attributes' );
add_filter( 'previous_post_link', 'seabadgermd_post_navlink_attributes' );

function seabadgermd_post_navlink_attributes( $output ) {
	$class = 'class="btn themecolor"';
	return str_replace( '<a href=', '<a ' . $class . ' href=', $output );
}


function seabadgermd_comments_callback( $comment, $args, $depth ) {
?>
	<div class="row media comment" id="comment-<?php comment_ID(); ?>">
		<?php
		echo get_avatar( $comment, $args['avatar_size'], null, '',
			array(
				'class' => 'd-flex rounded-circle mr-3',
			)
		);
		?>
		<div class="col-12 media-body comment">
			<h5 class="mt-0 comment-header">
			<?php
			echo get_comment_author_link( $comment );
			/* translators: %: human readable time diff since comment made, e.g. 1 day */
			printf( esc_html__( '%s ago', 'seabadgermd' ),
				esc_html(
					human_time_diff( get_comment_time( 'U' ), current_time( 'timestamp' ) )
				)
			);
			?>
			</h5>
			<?php
			if ( '0' === $comment->comment_approved ) {
				echo '<div class="alert alert-warning">' .
				esc_html__( 'Your comment is awaiting moderation', 'seabadgermd' ) .
				'</div>';
			}
				comment_text();
				echo preg_replace(
					'/comment-reply-link/', 'comment-reply-link btn btn-sm themecolor',
					get_comment_reply_link(
						array_merge(
							$args, array(
								'add_below' => 'div-comment',
								'depth'     => $depth,
								'max_depth' => $args['max_depth'],
							)
						)
					)
				);
				printf(
					'<a href="%s" class="comment-edit-link btn btn-sm themecolor">%s</a>',
					esc_url( get_edit_comment_link( $comment ) ), esc_html__( 'Edit', 'seabadgermd' )
				);
			?>
		</div>
	</div>
<?php
}

function seabadgermd_wp_link_pages_link( $link ) {
	if ( ! preg_match( '/href=/', $link ) ) {
		return preg_replace( '/class="/', 'class="active ', $link );
	}
	return $link;
}
add_filter( 'wp_link_pages_link', 'seabadgermd_wp_link_pages_link' );

// https://wordpress.stackexchange.com/questions/43558/how-to-manually-fix-the-wordpress-gallery-code-using-php-in-functions-php
// responsive image gallery
function seabadgermd_post_gallery( $output, $attr ) {
	global $post;

	static $instance = 0;
	$instance++;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( ! $attr['orderby'] ) {
			unset( $attr['orderby'] );
		}
	}

	$satts      = shortcode_atts(
		array(
			'order'   => 'ASC',
			'orderby' => 'menu_order ID',
			'id'      => $post->ID,
			'columns' => 3,
			'size'    => 'thumbnail',
			'include' => '',
			'exclude' => '',
		), $attr
	);
	$satts_keys = array( 'order', 'orderby', 'id', 'columns', 'size', 'include', 'exclude' );
	foreach ( $satts_keys as $k ) {
		$$k = $satts[ $k ];
	}

	$id = intval( $id );
	if ( 'RAND' === $order ) {
		$orderby = 'none';
	}

	if ( ! empty( $include ) ) {
		$include      = preg_replace( '/[^0-9,]+/', '', $include );
		$_attachments = get_posts(
			array(
				'include'        => $include,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => $order,
				'orderby'        => $orderby,
			)
		);

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[ $val->ID ] = $_attachments[ $key ];
		}
	} elseif ( ! empty( $exclude ) ) {
		$exclude     = preg_replace( '/[^0-9,]+/', '', $exclude );
		$attachments = get_children(
			array(
				'post_parent'    => $id,
				'exclude'        => $exclude,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => $order,
				'orderby'        => $orderby,
			)
		);
	} else {
		$attachments = get_children(
			array(
				'post_parent'    => $id,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => $order,
				'orderby'        => $orderby,
			)
		);
	} // End if().

	if ( empty( $attachments ) ) {
		return '';
	}

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment ) {
			$output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
		}
		return $output;
	}

	$columns = intval( $columns );
	if ( $columns > 12 ) {
		$columns = 12;
	} elseif ( 0 !== 12 % $columns ) {
		while ( 0 !== 12 % $columns ) {
			$columns--;
		}
	}
	$itemwidth = $columns > 0 ? 12 / $columns : 12;

	$selector = "gallery-{$instance}";

	$size_class = sanitize_html_class( $size );
	$output     = "<div id='$selector' class='row gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output    .= '<div class="col-12">';

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$get_icon = isset( $attr['link'] ) && 'file' === $attr['link'];
		$src      = wp_get_attachment_image_src( $id, $size, $get_icon );
		if ( is_array( $src ) ) {
			$src = $src[0];
			if ( 0 === $i ) {
				$output .= '<div class="row">';
			}
			$output .= sprintf( "<div class='col-xs-12 col-md-%d gallery-item'>", $itemwidth );
			$srcs    = array();
			foreach ( get_intermediate_image_sizes() as $s ) {
				$imgsrc = wp_get_attachment_image_src( $id, $s, $get_icon );
				if ( $imgsrc ) {
					array_push( $srcs, $imgsrc[0] . ' ' . $imgsrc[1] . 'w' );
				}
			}
			$srcset   = implode( ',', $srcs );
			$sizelist = array();
			array_push( $sizelist, '(max-width: 767px) 750px' ); // no columns on xs screen
			array_push( $sizelist, sprintf( '(max-width: 992px) %dpx', 750 / $columns ) ); // a very rough maximum width of space to fill
			array_push( $sizelist, sprintf( '(max-width: 1200px) %dpx', 970 / $columns ) );
			array_push( $sizelist, sprintf( '%dpx', 1170 / $columns ) );
			$sizes = implode( ',', $sizelist );
			if ( array_key_exists( 'link', $attr ) ) {
				if ( 'file' === $attr['link'] ) {
					$link = wp_get_attachment_url( $id );
				} else {
					$link = '';
				}
			} else {
				$link = get_attachment_link( $id );
			}
			if ( $link ) {
				$output .= sprintf( '<a href="%s">', $link );
			}
			$meta     = wp_prepare_attachment_for_js( $id );
			$imgtitle = '' === $meta['title'] ?
				esc_html_e( 'Missing title', 'seabadgermd' ) :
				$meta['title'];
			$imgalt   = '' === $meta['alt'] ? $imgtitle : $meta['alt'];
			$output  .= sprintf( '<img src="%s" srcset="%s" sizes="%s" alt="%s" title="%s" class="img-thumbnail">',
			$src, $srcset, $sizes, $imgalt, $imgtitle );
			if ( $link ) {
				$output .= '</a>';
			}
			if ( trim( $attachment->post_excerpt ) ) {
				$output .= "
					<p class='wp-caption-text gallery-caption'>
					" . wptexturize( $attachment->post_excerpt ) . '
					</p>';
			} else {
				$output .= '<p class="wp-caption-text gallery-caption"><!-- no caption --></p>';
			} // End if().
			$output .= '</div>';
			if ( ++$i === $columns ) {
				$output .= '</div>'; //close row
				$i       = 0;
			}
		} // End is_array($src)
	} // End foreach().
	// close partial row
	if ( 0 !== $i ) {
		$output .= '</div>';
	}

	$output .= "</div>
		</div>\n";

	return $output;
}
add_filter( 'post_gallery', 'seabadgermd_post_gallery', 10, 2 );

function seabadgermd_default_table_format( $content ) {
	return str_replace( '<table>', '<table class="table">', $content );
}
add_filter( 'the_content', 'seabadgermd_default_table_format' );

function seabadgermd_format_passwordform( $output ) {
	$post   = get_post();
	$label  = 'pwbox-' . ( empty( $post->ID ) ? rand() : $post->ID );
	$output = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
		    <p>' . esc_html__( 'This content is password protected. To view it please enter your password below:', 'seabadgermd' ) . '</p>
			<div class="form-row align-items-center">
				<div class="col-auto">
					<label for="' . $label . '" class="sr-only">' . esc_html__( 'Password', 'seabadgermd' ) . '</label>
					<input class="form-control" name="post_password" id="' . $label . '" type="password" size="20" placeholder="' . esc_attr__( 'Password', 'seabadgermd' ) . '">
				</div>
				<div class="col-auto">
					<input class="btn themecolor" type="submit" name="Submit" value="' . esc_attr_x( 'Enter', 'post password form', 'seabadgermd' ) . '">
				</div>
			</div>
			</form>
			';
	return $output;
}
add_filter( 'the_password_form', 'seabadgermd_format_passwordform' );

function seabadgermd_has_readmore() {
	global $post;
	if ( has_excerpt( $post ) || ( preg_match( '/<!--more( .*? )?-->/', $post->post_content ) ||
		preg_match( '/<!--nextpage-->/', $post->post_content ) ) || ! $post->post_title ) {
		return true;
	}
	return false;
}

?>
