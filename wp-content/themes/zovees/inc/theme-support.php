<?php
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 * @package Zovees
*/

function zovees_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zovees_content_width', 980 );
}
add_action( 'after_setup_theme', 'zovees_content_width', 0 );


if( ! function_exists( 'zovees_theme_setup' ) ) {

	function zovees_theme_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
       // Add title tag 
		add_theme_support( 'title-tag' );

		// Add default logo support		
        add_theme_support( 'custom-logo');

        add_theme_support('post-thumbnails');
                    
        // Add theme support for Semantic Markup
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) ); 

		$defaults = array(
			'default-image' => get_template_directory_uri() .'/img/bg/1.jpg',
			'width'         => 1920,
			'height'        => 540,
			'uploads'       => true,
			);
		add_theme_support( 'custom-header', $defaults );

		// Menus
		 register_nav_menus(array(
       'primary' => esc_html__('Primary Menu', 'zovees'),
       
       ));
		// add excerpt support for pages
        add_post_type_support( 'page', 'excerpt' );

        if ( is_singular() && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
        }
		  // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Custom Backgrounds
   		add_theme_support( 'custom-background', array(
  			'default-color' => 'ffffff',
    	) );

    	// To use additional css
 	    add_editor_style( 'assets/css/editor-style.css' );
	}
	add_action( 'after_setup_theme', 'zovees_theme_setup' );
}

/*
	============================
	 SIDEBAR FUNCTIONS
	============================
*/
function zovees_sidebar_init() {

	// Blog Post Sidebar

	register_sidebar( 
		array(
			'name' => esc_html__( 'Rumi Sidebar', 'zovees'),
			'id' => 'blog_post_sidebar',
			'description' => esc_html__('Dynamic Right Sidebar','zovees'),
			'before_widget' => '<aside id="%1$s" class="single-widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h4 class="widget-title"><div class="widget-content">',
			'after_title' => '</div></h4>'
		)
	);

	// Footer Sidebar
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 1', 'zovees'),
		'id' => 'zovees-footer-widget-area-1',
		'description' => esc_html__( 'The footer widget area 1', 'zovees'),
		'before_widget' => ' <div class="widget-item  %2$s">',
		'after_widget' => '</div> ',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 2', 'zovees'),
		'id' => 'zovees-footer-widget-area-2',
		'description' => esc_html__( 'The footer widget area 2', 'zovees'),
		'before_widget' => '<div class="widget-item  %2$s"> ',
		'after_widget' => ' </div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 3', 'zovees'),
		'id' => 'zovees-footer-widget-area-3',
		'description' => esc_html__( 'The footer widget area 3', 'zovees'),
		'before_widget' => '<div class=" widget-item  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
	register_sidebar(array(
		'name' => esc_html__( 'Footer Widget Area 4', 'zovees'),
		'id' => 'zovees-footer-widget-area-4',
		'description' => esc_html__( 'The footer widget area 4', 'zovees'),
		'before_widget' => '<div class=" widget-item  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));	
	
}
add_action( 'widgets_init', 'zovees_sidebar_init' );


function zovees_get_post_navigation(){
	
	if( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ):
		get_template_part( 'inc/templates/zovees', 'comment-nav' );	
	endif;
}


function zovees_comments_data( $comment, $args, $depth ) {  ?>
    <div <?php comment_class('comments'); ?> id="<?php comment_ID() ?>">
        <?php if ($comment->comment_approved == '0') : ?>
		    <div class="alert alert-info">
		      <p><?php esc_html__( 'Your comment is awaiting moderation.', 'zovees' ) ?></p>
		    </div>
	    <?php endif; ?>
        <li class="media">
        	<div class="media-left">
			<?php echo get_avatar( $comment,'88', null,'User', array( 'class' => array( 'media-object','' ) )); ?>
			</div>
			<div class="media-body">
				<h5 class="c-title">
				<?php 
						/* translators: '%1$s %2$s: edit term */
					printf(
						esc_html( '%1$s', 'zovees' ),
						get_comment_author_link() )
				?>
				</h5>
				<span class="time-reply">
					<p class="comment-time" datetime="<?php echo comment_time('Y-m-j'); ?>">
						<?php 
							$posted_on = human_time_diff( get_the_time('U') , current_time('timestamp') );
							echo esc_html($posted_on . ' ago', 'zovees');
						?>
					</p>
					<p class="reply">
						<a class="reply-link"><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></a>
					</p>
				</span>
				<?php 
					comment_text();

					printf(
						/* translators: '%1$s: edit term */
						esc_html( '%1$s', 'zovees' ),
						edit_comment_link(esc_html__( 'Edit', 'zovees' ))
					)
				?>

			</div>
        </li>
    </div>
<?php
} 