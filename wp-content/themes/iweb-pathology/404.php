<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package IWeb_Pathology
 */

get_header();
?>

<div id="iwebpath-bckgr">
	  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/404.jpg" alt="<?php echo esc_attr__( '404 pages-Not Found','iweb-pathology' ); ?>" />
</div>

<?php
get_footer();
