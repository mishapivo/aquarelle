<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php if ( is_singular() && 'open' === get_option( 'default_ping_status' ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="main-wrapper">
	
    <!-- Header -->
	<header>
    
        <?php if ( has_nav_menu( 'top_left' ) || has_nav_menu('top_right') ) { ?>
		<!-- Header Row 1 -->
		<div class="header-row-1">
			<div class="container">
				<div class="row">
                
                    <!-- Left -->
					<div class="col-sm-6 header-row-1-left">
                    <?php if ( has_nav_menu( 'top_left' ) ) { wp_nav_menu( array( 'theme_location' => 'top_left', 'depth' => 1, 'container' => '', 'menu_class' => 'top-menu' ) ); } ?>
                    </div>
					<!-- /Left -->
                    
                    <!-- Right -->
                    <div class="col-sm-6 header-row-1-right">
                    <?php if ( has_nav_menu( 'top_right' ) ) { wp_nav_menu( array( 'theme_location' => 'top_right', 'depth' => 1, 'container' => '', 'menu_class' => 'social-menu top-menu' ) ); } ?>
                    </div>
					<!-- /Right -->
                    
				</div>
			</div>
		</div>
		<a href="javascript:;" class="header-row-1-toggle"></a>
		<!-- /Header Row 1 -->
        <?php } ?>
        
        
		<!-- Header Row 2 -->
		<div class="header-row-2">
			<div class="container">
				<!-- Left -->
				<div class="header-row-2-left">
					<div class="logo <?php if(sirius_get_option('sirius_image_logo_show') == 1) { ?>image-logo<?php } ?>">
                        <?php 
                        if(sirius_get_option('sirius_image_logo_show') == 1) { 
                            if ( function_exists( 'the_custom_logo' ) ) the_custom_logo(); 
                        } else { 
                            $sirius_text_logo = sirius_get_option('sirius_text_logo');
                            if($sirius_text_logo == '') $sirius_text_logo = get_bloginfo('name'); ?>
                            
                            <?php if ( is_front_page() ) { ?>
                            <h1 class="header-logo-text"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($sirius_text_logo) ?></a></h1>
                            <?php } else { ?>
                            <div class="header-logo-text"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($sirius_text_logo) ?></a></div>
                            <?php } ?>
                            
                        <?php } ?>
					</div>
				</div>
				<!-- /Left -->
				<!-- Right -->
				<div class="header-row-2-right">
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
								<span class="sr-only"><?php echo esc_html__('Toggle Navigation', 'sirius-lite'); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
                        <?php
                            $args = array('theme_location'    => 'main', 
                                          'depth'             => 2,
                                          'container'         => 'div',
                                          'container_class'   => 'collapse navbar-collapse',
                                          'menu_class'        => 'nav navbar-nav',
                                          'fallback_cb'       => 'sirius_default_nav',
                                          'walker'            => new wp_bootstrap_navwalker() );
                            wp_nav_menu( $args );
                        ?>
					</nav>
				</div>
				<!-- /Right -->
			</div>
		</div>
		<!-- /Header Row 2 -->
	</header>
	<!-- /Header -->
    