<?php
/**
 *
 *
 *  Materialize Template <http://wordpress.org>
 *
 *  By KRATZ Geoffrey AKA Jul6art AKA VanIllaSkype
 *  for VsWeb <https://vsweb.be>
 *
 *  https://vsweb.be
 *  admin@vsweb.be
 *
 *  Special thanks to Brynnlow
 *  for his contribution
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The flex one, in a flex world
 *
 *     __    __    ___            __    __    __   ____
 *     \ \  / /   / __|           \ \  /  \  / /  |  __\   __
 *      \ \/ / _  \__ \  _         \ \/ /\ \/ /   |  __|  |  _\
 *       \__/ (_) |___/ (_)         \__/  \__/    |  __/  |___/
 *
 *                    https://vsweb.be
 *
 */

add_action( 'tgmpa_register', 'materialize_template_register_required_plugins' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

/**
 * @return int
 */
function materialize_template_main_col_number()
{
	$number = 12;
	if (is_active_sidebar('left-sidebar')) {
		$number -= 3;
	}
	if (is_active_sidebar('right-sidebar')) {
		$number -= 3;
	}

	return $number;
}

/***********************************Menus & sidebars************************************************/
function materialize_template_widgets_init()
{
    if (function_exists('register_nav_menus')) {
        register_nav_menus(
            array(
                'main' => __( 'Main menu', 'materialize-template' ),
                'footer' => __( 'Footer menu', 'materialize-template' ),
                'profile_1' => __( 'First zone of profile menu', 'materialize-template' ),
                'profile_2' => __( 'Second zone of profile menu', 'materialize-template' ),
                'actions_mobile' => __( 'Action buttons zone of mobile menu', 'materialize-template' ),
            )
        );
    }

    if (function_exists('register_sidebar')) {
        register_sidebar( array(
            'name'          => __( 'Footer sidebar 1', 'materialize-template' ),
            'id'            => 'footer-widgets-1',
            'description'   => __( 'First widgets area of the footer', 'materialize-template' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h5 class="white-text">',
            'after_title'   => '</h5>',
        ));

        register_sidebar( array(
            'name'          => __( 'Footer sidebar 2', 'materialize-template' ),
            'id'            => 'footer-widgets-2',
            'description'   => __( 'Second widgets area of the footer', 'materialize-template' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h5 class="white-text">',
            'after_title'   => '</h5>',
        ));

        register_sidebar( array(
            'name'          => __( 'Footer sidebar 3', 'materialize-template' ),
            'id'            => 'footer-widgets-3',
            'description'   => __( 'Third widgets area of the footer', 'materialize-template' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h5 class="white-text">',
            'after_title'   => '</h5>',
        ));

        register_sidebar( array(
            'name'          => __( 'Footer profile', 'materialize-template' ),
            'id'            => 'footer-profile-widgets',
            'class'         => 'collection',
            'description'   => __( 'Profile area of the footer', 'materialize-template' ),
            'before_widget' => '<li id="%1$s" class="collection-item avatar widget %2$s">',
            'after_widget'  => '</li>',
            'before_title'  => '<h5 class="white-text">',
            'after_title'   => '</h5>',
        ));

        register_sidebar( array(
            'name'          => __( 'Left sidebar', 'materialize-template' ),
            'id'            => 'left-sidebar',
            'description'   => __( 'Widgets area for left sidebar', 'materialize-template' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h3 class="white-text">',
            'after_title'   => '</h3>',
        ));

        register_sidebar( array(
            'name'          => __( 'Right sidebar', 'materialize-template' ),
            'id'            => 'right-sidebar',
            'description'   => __( 'Widgets area for right sidebar', 'materialize-template' ),
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '<h3 class="white-text">',
            'after_title'   => '</h3>',
        ));
    }
}

add_action( 'widgets_init', 'materialize_template_widgets_init' );

/**
 * @param $classes
 * @param $item
 * @param $args
 *
 * @return array
 */
function materialize_template_mobile_menu_actions_classes($classes, $item, $args) {
	if($args->theme_location == 'actions_mobile') {
		$classes[] = 'btn-floating';
		$classes[] = 'blue';
	}
	return $classes;
}

add_filter('nav_menu_css_class', 'materialize_template_mobile_menu_actions_classes', 1, 3);

/***********************************Theme support************************************************/
function materialize_template_theme_support()
{

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );

    add_theme_support( "custom-header");

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    add_theme_support( 'custom-background', apply_filters( 'materialize_template_custom_background_args', array(
        'default-color'      => "F1F1F1",
        'default-attachment' => 'fixed',
    ) ) );

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 250,
        'height'      => 250,
        'flex-width'  => true,
    ) );

	add_filter('get_custom_logo', 'materialize_template_logo_class');


    load_theme_textdomain( 'materialize-template', get_template_directory() . '/languages' );
}

/**
 * @param $html
 *
 * @return mixed
 */
function materialize_template_logo_class($html)
{

	$html = str_replace( 'custom-logo-link', 'brand-logo', $html );

	return $html;
}

add_action( 'after_setup_theme', 'materialize_template_theme_support' );

/***********************************Images****************************************************/
/**
 * @return string
 */
function materialize_template_default_image()
{
    $attachments = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    if ($attachments[0] != '') {
        $image = $attachments[0];
    } else {
        $image = get_header_image();
	    if (!strlen($image)) $image = get_theme_mod( 'default_image',  get_template_directory_uri() . '/img/default-parallax-header-image.jpeg');
    }
    return $image;
}

/**
 * @return string
 */
function materialize_template_card_image()
{
	$image = get_the_post_thumbnail();
    if ($image == '') {
	    $images = get_posts( array(
		    'post_type' => 'attachment',
		    'posts_per_page' => -1,
		    'post_parent' => get_the_ID(),
	    ) );
	    if (isset($images[0])) {
		    return wp_get_attachment_link( $images[0]->ID, 'thumbnail-size', true );
        }
    }
    return $image;
}

/***********************************Comments template***********************************************/
/**
 * @param $comments
 */
function materialize_template_comment($comments)
{
    global $current_user;
    wp_get_current_user();
    foreach($comments as $comment) {
        $post_id = get_the_ID();
        $comment_id = $comment->comment_ID;

        $author_email = get_comment_author_email($comment_id);

        //get the setting configured in the admin panel under settings discussions "Enable threaded (nested) comments  levels deep"
        $max_depth = get_option('thread_comments_depth');
        //add max_depth to the array and give it the value from above and set the depth to 1
        $default = array(
            'add_below'  => 'comment',
            'respond_id' => 'respond',
            'reply_text' => '<i class="material-icons">reply</i>',
            'login_text' => __('Log in to Reply', 'materialize-template'),
            'depth'      => 1,
            'before'     => '',
            'after'      => '',
            'max_depth'  => $max_depth
        );

        ?>

        <li id="comment-<?php echo $comment_id ?>" class="collection-item avatar<?php if ($comment->comment_parent != 0){ echo " comment-response"; } ?>">
            <img src="<?php echo get_avatar_url(get_comment_author_email($comment)); ?>" alt="" class="circle">

            <span class="title">
                <?php if ($comment->comment_parent != 0){ echo '<i class="material-icons">reply</i>'; } ?>
                <a href="<?php echo get_comment_author_url($comment) ?>">
                    <?php echo esc_attr(get_comment_author($comment)); ?>
                </a>
            </span>

            <p>
                <?php comment_text($comment) ?>
            </p>
            <p class="">
                <ul class="comment-footer inline">
                    <li><i class="material-icons">account_box</i> <?php echo esc_html(get_comment_author($comment)); ?></li>
                    <li><i class="material-icons">date_range</i> <?php comment_date('j F Y H:i', $comment_id) ?> </li>
                    <?php
                    if ($author_email == $current_user->user_email){
                        ?>
                        <li><a href="<?php echo get_edit_comment_link($comment_id) ?>"><i class="material-icons">edit</i></a></li>
                        <?php
                    }
//                    ?>
                </ul>
            <?php
             if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) {
     	                $link = sprintf( '<a rel="nofollow" class="comment-reply-login" href="%s">%s</a>',
         	                        esc_url( wp_login_url( get_permalink() ) ),
                            $default['login_text']
	                );
	        } else {
                     $onclick = sprintf( 'return addComment.moveForm( "%1$s-%2$s", "%2$s", "%3$s", "%4$s" )',
                         $default['add_below'], $comment->comment_ID, $default['respond_id'], $post_id
	                );

	                $link = sprintf( "<a rel='nofollow' class='comment-reply-link secondary-content' href='%s' onclick='%s' aria-label='%s'>%s</a>",
         	                        esc_url( add_query_arg( 'replytocom', $comment->comment_ID, get_permalink( $post_id ) ) ) . "#" . $default['respond_id'],
	                        $onclick,
	                        esc_attr( sprintf( $default['reply_text'], $comment->comment_author ) ),
                            $default['reply_text']
	                );
                 echo $link;
	        }
            ?>
        <?php
    }
}

/**
 * Function that declare the recommended plugins for the theme
 */
function materialize_template_register_required_plugins() {
	$plugins = array(
		array(
			'name'               => 'Materialize Contact Form', // The plugin name.
			'slug'               => 'materialize-contact-form', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),
		array(
			'name'               => 'Menu Icons', // The plugin name.
			'slug'               => 'menu-icons', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'force_activation'   => true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		),

	);

	$config = array();

	tgmpa( $plugins, $config );
}
