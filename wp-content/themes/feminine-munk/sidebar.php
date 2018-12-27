<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Feminine_Munk
 */

if (!is_active_sidebar( 'sidebar' )) {
    return;
}
?>

<!-- Sidebar -->

<div id="secondary" class="widget-area" role="complementary">
    <div class="side-bar">

        <!-- Sidebar Widgets -->
        <?php dynamic_sidebar( 'sidebar' ); ?>

    </div>
</div>