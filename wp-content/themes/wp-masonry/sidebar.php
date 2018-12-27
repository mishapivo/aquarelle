<?php
/**
* The file for displaying the sidebars.
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<?php if( is_singular() ) { ?>

<div class="wp-masonry-sidebar-one-wrapper wp-masonry-sidebar-widget-areas clearfix" id="wp-masonry-sidebar-one-wrapper" itemscope="itemscope" itemtype="http://schema.org/WPSideBar" role="complementary">
<div class="theiaStickySidebar">
<div class="wp-masonry-sidebar-one-wrapper-inside clearfix">

<?php dynamic_sidebar( 'wp-masonry-sidebar-one' ); ?>

</div>
</div>
</div><!-- /#wp-masonry-sidebar-one-wrapper-->

<?php } ?>