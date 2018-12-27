<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 *
 * @package salient themes
 * @subpackage st-blog
 * @since st-blog 1.0.0
 */


/**
 * st_blog_action_after_content hook
 * @since st-blog 1.0.0
 *
 * @hooked null
 */
do_action( 'st_blog_action_after_content' );

/**
 * st_blog_action_before_footer hook
 * @since st-blog 1.0.0
 *
 * @hooked st_blog_before_footer - 10
 */
do_action( 'st_blog_action_before_footer' );

/**
 * st_blog_action_widget_before_footer hook
 * @since st-blog 1.0.0
 *
 * @hooked st_blog_widget_before_footer - 10
 */
do_action( 'st_blog_action_widget_before_footer' );

/**
 * st_blog_action_footer hook
 * @since st-blog 1.0.0
 *
 * @hooked st_blog_footer - 10
 */
do_action( 'st_blog_action_footer' );

/**
 * st_blog_action_after_footer hook
 * @since st-blog 1.0.0
 *
 * @hooked null
 */
do_action( 'st_blog_action_after_footer' );

/**
 * st_blog_action_after hook
 * @since st-blog 1.0.0
 *
 * @hooked st_blog_page_end - 10
 */
do_action( 'st_blog_action_after' );
?>
<?php wp_footer(); ?>
</body>
</html>