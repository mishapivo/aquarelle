<?php

if(is_active_sidebar('right-sidebar')) {
    ?>
    <aside class="sidebar col l3 s12">
		<?php dynamic_sidebar( 'right-sidebar' ); ?>
    </aside>
    <?php
}