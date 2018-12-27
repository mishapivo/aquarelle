<?php
/**
 *
 *
 *  Materialize Template <http://wordpress.org>
 *
 *  By KRATZ Geoffrey AKA Jul6art AKA VanIllaSkype
 *  for VsWeb <https://vsweb.be>
 *
 *  https://vsweb.be
 *  admin@vsweb.be
 *
 *  Special thanks to Brynnlow
 *  for his contribution
 *
 *  It is free software; you can redistribute it and/or modify it under
 *  the terms of the GNU General Public License, either version 2
 *  of the License, or any later version.
 *
 *  For the full copyright and license information, please read the
 *  LICENSE.txt file that was distributed with this source code.
 *
 *  The flex one, in a flex world
 *
 *     __    __    ___            __    __    __   ____
 *     \ \  / /   / __|           \ \  /  \  / /  |  __\   __
 *      \ \/ / _  \__ \  _         \ \/ /\ \/ /   |  __|  |  _\
 *       \__/ (_) |___/ (_)         \__/  \__/    |  __/  |___/
 *
 *                    https://vsweb.be
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!--Let browser know website is optimized for mobile-->
    <?php if (is_single()) : ?>
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php else : ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php endif; ?>
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
<header>
    <nav class="nav-extended blue-custom">
        <div class="nav-wrapper">
	        <?php get_search_form() ?>
        </div>
        <div class="nav-wrapper blue-custom lighten-2">
            <?php materialize_template_the_custom_logo(); ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="brand-logo">
                <?php bloginfo("name"); ?>
            </a>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" data-activates="mobile-menu" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <?php if (current_user_can('manage_options')) : ?>
                    <li><a href="<?php echo esc_url( get_admin_url() ); ?>"><i class="material-icons">view_module</i></a></li>
                <?php endif; ?>
                <li><a href="#!" data-activates="slide-out" class="profile-menu"><i class="material-icons">more_vert</i></a></li>
            </ul>
        </div>

        <?php if ( has_nav_menu( 'main' ) ) : ?>
            <div class="nav-wrapper hide-on-med-and-down">
                <?php wp_nav_menu( array('theme_location' => 'main')); ?>
            </div>
        <?php endif; ?>
    </nav>

    <div class="side-nav" id="mobile-menu">
        <h4 class="black-text truncate center-align"><?php bloginfo("name") ?></h4>
		<?php if ( has_nav_menu( 'main' ) ) : ?>
			<?php wp_nav_menu( array('theme_location' => 'main')); ?>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'actions_mobile' ) ) : ?>
            <div class="fixed-action-btn horizontal click-to-toggle hide-on-large-only">
                <a class="btn-floating btn-large grey pulse">
                    <i class="material-icons">more_vert</i>
                </a>
				<?php wp_nav_menu( array('theme_location' => 'actions_mobile', 'container' => '')); ?>
            </div>
		<?php endif; ?>
    </div>

    <ul id="slide-out" class="side-nav">
        <li>
            <div class="user-view">
				<?php
				global $current_user;
				wp_get_current_user();
				?>
                <div class="background">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/img/profile-bg.jpg'); ?>">
                </div>
                <a href="<?php echo esc_url( get_edit_user_link( $current_user->ID ) ); ?>"><img class="circle" src="<?php echo esc_url( get_avatar_url( $current_user->ID )); ?>"></a>
                <a href="<?php echo esc_url( get_edit_user_link( $current_user->ID ) ); ?>"><span class="white-text text-lighten-2 name"><?php echo esc_attr($current_user->display_name); ?></span></a>
                <a href="<?php echo esc_url( get_edit_user_link( $current_user->ID ) ); ?>"><span class="white-text text-lighten-3 email"><?php echo esc_attr($current_user->user_email); ?></span></a>
            </div>
        </li>
		<?php if ( has_nav_menu( 'profile_1' ) ) : ?>
			<?php wp_nav_menu( array('theme_location' => 'profile_1')); ?>
		<?php endif; ?>
        <li>
            <div class="divider"></div>
        </li>
		<?php if ( has_nav_menu( 'profile_2' ) ) : ?>
			<?php wp_nav_menu( array('theme_location' => 'profile_2')); ?>
		<?php endif; ?>
    </ul>

</header>
