<?php
/**
* The file for displaying the search form
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

<form role="search" method="get" class="blogwp-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<label>
    <span class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'blogwp' ); ?></span>
    <input type="search" class="blogwp-search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'blogwp' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
</label>
<input type="submit" class="blogwp-search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'blogwp' ); ?>" />
</form>