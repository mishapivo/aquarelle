<?php
/**
 * Sidebar for the banner area 
 * @package Seasonal
 *  
 */

if ( ! is_active_sidebar( 'banner' ) ) {
	return;
}
?>


    <aside id="page-banner" role="complementary">
    	<div id="banner"><?php dynamic_sidebar( 'banner' ); ?></div>
    </aside>

