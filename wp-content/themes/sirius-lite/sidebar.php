<!-- Sidebar -->

<?php 
if(is_single()) 
    if(is_active_sidebar('sidebar-single')) { ?><div class="sidebar-single"><?php dynamic_sidebar('sidebar-single'); ?></div><?php } 
if(is_page())   
    if(is_active_sidebar('sidebar-page'))   { ?><div class="sidebar-page"><?php dynamic_sidebar('sidebar-page'); ?></div><?php } 

if(is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } ?>

<!-- /Sidebar -->