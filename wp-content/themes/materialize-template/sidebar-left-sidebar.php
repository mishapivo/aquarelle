<?php

if(is_active_sidebar('left-sidebar')) {
    ?>
    <aside class="sidebar col l3 s12">
		<?php dynamic_sidebar( 'left-sidebar' ); ?>
    </aside>
    <?php
}