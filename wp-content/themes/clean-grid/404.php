<?php
/**
* The template for displaying 404 pages (not found).
*
* @link https://codex.wordpress.org/Creating_an_Error_404_Page
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

get_header(); ?>

<div class='clean-grid-main-wrapper clearfix' id='clean-grid-main-wrapper' itemscope='itemscope' itemtype='http://schema.org/Blog' role='main'>
<div class='theiaStickySidebar'>

<div class='clean-grid-posts-wrapper clean-grid-box' id='clean-grid-posts-wrapper'>

<div class='clean-grid-posts'>

<header class="page-header">
    <h1 class="page-title"><?php esc_html_e( 'Sorry! the requested page cannot be found.', 'clean-grid' ); ?></h1>
</header><!-- .page-header -->

<div class='clean-grid-posts-content'>

    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'clean-grid' ); ?></p>

    <?php get_search_form(); ?>

    <?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
    
    <div>
        <h2><?php esc_html_e( 'Most Used Categories', 'clean-grid' ); ?></h2>
        <ul>
        <?php
                wp_list_categories( array(
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                        'show_count' => 1,
                        'title_li'   => '',
                        'number'     => 10,
                ) );
        ?>
        </ul>
    </div>

    <?php
        /* translators: %1$s: smiley */
        $clean_grid_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'clean-grid' ), convert_smilies( ':)' ) ) . '</p>';
        the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$clean_grid_archive_content" );
    ?>

    <?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

</div>

</div>

</div><!--/#clean-grid-posts-wrapper -->

</div>
</div><!-- /#clean-grid-main-wrapper -->

<?php get_footer(); ?>