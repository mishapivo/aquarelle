<?php 
/**
 * The header for our theme.
 *
 * Displays all of the <head> section 
 *
 * @package Medipress
 */
 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php global $medipress_themes; ?>
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- LOADER -->
     
    <?php  
        $medipress_header_section = get_theme_mod('medipress_header_section_hideshow' ,'show');
        if ($medipress_header_section =='show') { 
        $medipress_phone_value = get_theme_mod('medipress_header_phone_value');
        $medipress_email_value = get_theme_mod('medipress_header_email_value');
        $medipress_social_link_1 = get_theme_mod('medipress_header_social_link_1');
        $medipress_social_link_2 = get_theme_mod('medipress_header_social_link_2');
        $medipress_social_link_3 = get_theme_mod('medipress_header_social_link_3');
        $medipress_social_link_4 = get_theme_mod('medipress_header_social_link_4');
    ?>

    <!-- top bar -->
    <div class="h-top clearfix">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <ul class="top-info list-inline">
                        <?php
                            if (!empty($medipress_email_value)) {
                        ?>
                        <li>
                            <span><?php echo esc_html__( 'Email Us :', 'medipress' ); ?></span> <?php echo esc_html($medipress_email_value); ?>
                        </li>
                        <?php } 

                            if (!empty($medipress_phone_value)) {
                        ?>
                        <li>
                            <span><?php echo esc_html__( 'Call Us :', 'medipress' ); ?></span> <?php echo esc_html($medipress_phone_value); ?></li>
                            <?php } ?>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <div class="social-icon-top text-right">
                        <?php 
                            if (!empty($medipress_social_link_1)) { ?>
                                <a href="<?php echo esc_url($medipress_social_link_1); ?>">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </a>
                        <?php } ?>
                        <?php 
                            if (!empty($medipress_social_link_2)) { ?>
                                <a href="<?php echo esc_url($medipress_social_link_2); ?>">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </a>
                        <?php } ?>
                        <?php 
                            if (!empty($medipress_social_link_3)) { ?>
                                <a href="<?php echo esc_url($medipress_social_link_3); ?>">
                                    <i class="fa fa-google" aria-hidden="true"></i>
                                </a>
                        <?php } ?>
                        <?php 
                            if (!empty($medipress_social_link_4)) { ?>
                                <a href="<?php echo esc_url($medipress_social_link_4); ?>">
                                    <i class="fa fa-instagram" aria-hidden="true"></i>
                                </a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!-- HEADER -->
    <header class="header landing-header  header-type-2 medical-header" id="mynav">
        <div class="container">
            <div class="nav-panel clearfix">
                    <?php if (has_custom_logo()) : ?> 
                        <span><?php the_custom_logo(); ?></span>
                    <?php endif;   
					if (display_header_text()==true){ ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"  >
						<span class="site-title"><?php bloginfo( 'title' ); ?></span></a>
						<?php 
					} ?>
                
                <div class="info-panel">
                    <a class="open-menu" href="#">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
                <nav class="nav">
                    <?php wp_nav_menu( array
                            (
                                'menu'              => 'primary',
                                'container'         => 'ul', 
                                'theme_location'    => 'primary', 
                                'menu_class'        => 'menu', 
                                'items_wrap'        => '<ul>%3$s</ul>',
                                'fallback_cb'       => 'medipress_wp_bootstrap_navwalker::fallback',
                                'walker'            => new medipress_wp_bootstrap_navwalker()
                            )); 
                        ?>  
                </nav>
            </div>
        </div>
    </header>