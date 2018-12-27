<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package st-blog
 */

/**
 * st_blog_action_before_head hook
 * @since st-blog 1.0.0
 *
 * @hooked st_blog_set_global -  0
 * @hooked st_blog_doctype -  10
 */
do_action( 'st_blog_action_before_head' );?>

<head>

	<?php
	/**
	 * st_blog_action_before_wp_head hook
	 * @since st-blog 1.0.0
	 *
	 * @hooked st_blog_before_wp_head -  10
	 */
	do_action( 'st_blog_action_before_wp_head' );

	wp_head();

	/**
	 * st_blog_action_after_wp_head hook
	 * @since st-blog 1.0.0
	 *
	 * @hooked null
	 */
	do_action( 'st_blog_action_after_wp_head' );
	?>

</head>

<body <?php body_class(); ?>>
<div id="preloader" style="">
	<div id="status" style=""><i class="fa fa-spinner fa-spin"></i></div>
</div>
<?php
/**
 * st_blog_action_before hook
 * @since st-blog 1.0.0
 *
 * @hooked st_blog_page_start - 15
 */
do_action( 'st_blog_action_before' );

/**
 * st_blog_action_before_header hook
 * @since st-blog 1.0.0
 *
 * @hooked st_blog_skip_to_content - 10
 */
do_action( 'st_blog_action_before_header' );

/**
 * st_blog_action_header hook
 * @since st-blog 1.0.0
 *
 * @hooked st_blog_after_header - 10
 */
do_action( 'st_blog_action_header' );

/**
 * st_blog_action_nav_page_start hook
 * @since st-blog 1.0.0
 *
 * @hooked page start and navigations - 10
 */
do_action( 'st_blog_action_nav_page_start' );

/**
 * st_blog_action_on_header hook
 * @since st-blog 1.0.0
 *
 * @hooked page start and navigations - 10
 */
do_action( 'st_blog_action_on_header' );

/**
 * st_blog_action_before_content hook
 * @since st-blog 1.0.0
 *
 * @hooked null
 */
do_action( 'st_blog_action_before_content' );
?>





	

	

