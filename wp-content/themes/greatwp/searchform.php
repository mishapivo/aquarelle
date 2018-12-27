<?php
/**
* The file for displaying the search form
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<form role="search" method="get" class="greatwp-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
    <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'greatwp' ); ?></span>
    <input type="search" class="greatwp-search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'greatwp' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</label>
<input type="submit" class="greatwp-search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'greatwp' ); ?>" />
</form>