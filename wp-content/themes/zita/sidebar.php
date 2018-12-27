<?php
/**
 * Primary sidebar
 *
 * @package Zita
 * @since 1.0.0
 */
$sidebar = apply_filters( 'zita_get_sidebar', 'sidebar-1' );
?>
<div id="sidebar-primary" class="widget-area sidebar" role="complementary">
	<div class="sidebar-main">
<?php
    if ( is_active_sidebar($sidebar) ){
    dynamic_sidebar($sidebar);
     }
?>
</div>
</div>