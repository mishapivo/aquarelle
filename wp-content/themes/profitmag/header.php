<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package ProfitMag
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
        $settings = get_option( 'profitmag_options' );    
?>

<div id="page" class="hfeed site">
	

	<header id="masthead" class="site-header clearfix" role="banner">
        <div class="top-header-block clearfix">
            <div class="wrapper">
                        <?php 
                            $recent_args = array(
                                            'numberposts' => 5,
                                            'post_status' => 'publish',      
                                            );
                            $recent_posts = wp_get_recent_posts( $recent_args );
                            if( !empty( $recent_posts ) ):
                        ?>
                                <div class="header-latest-posts f-left">                                                                    
                                    <ul id="js-latest" class="js-hidden">                        
                                    <?php foreach( $recent_posts as $recent ): ?>
                                            
                                            <li><a href="<?php echo get_permalink( $recent["ID"] ); ?>" title="<?php echo esc_attr( $recent['post_title'] ); ?>"><?php echo $recent['post_title']; ?></a></li>
                                             
                                    <?php endforeach; ?>
                                    </ul>
                                </div> <!-- .header-latest-posts -->
                        <?php                    
                           endif; 
                        ?>
                        
                        <div class="right-header f-right">
                            <?php
                                if( $settings['show_social_header'] == 0 ) {
                                    do_action( 'profitmag_social_links' );   
                                }
                            ?>
                        </div>
             </div>          
         </div><!-- .top-header-block -->

        <div class="wrapper header-wrapper clearfix">
        		<div class="header-container"> 
                
                    
                    
                    <div class="site-branding clearfix">
            			<div class="site-logo f-left">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php if( get_header_image() ): ?>
                                    <img src="<?php header_image(); ?>" alt="<?php bloginfo('name') ?>" />
                                <?php endif; ?>
                            </a>
                        </div>
                        
                        <?php if( !empty( $settings['header_ads'] ) && $settings['header_ads'] != '' ): ?>
                                   <div class="header-ads f-right">
                                        <?php echo $settings['header_ads']; ?>
                                   </div>
                        <?php endif; ?>
                        			
            		</div>
            
            		<nav id="site-navigation" class="main-navigation clearfix <?php do_action( 'profitmag_menu_alignment' ); ?>" role="navigation" >
            			<div class="desktop-menu clearfix">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                        <div class="search-block">
                            <?php if( !empty( $settings['show_search']) && $settings['show_search'] == 1 ): ?>
                                <?php echo get_search_form(); ?>
                            <?php endif; ?>
                        </div>
                        </div>
                        <div class="responsive-slick-menu clearfix"></div>
                        
            		</nav><!-- #site-navigation -->
        
                </div> <!-- .header-container -->
        </div><!-- header-wrapper-->
        
	</header><!-- #masthead -->
    

    <div class="wrapper content-wrapper clearfix">

        <div class="slider-feature-wrap clearfix">
            <!-- Slider -->
            <?php do_action( 'profitmag_slider' ); ?>
            
            <!-- Featured Post Beside Slider -->
            <?php do_action( 'profitmag_featured_post_beside' ); ?>
        	
            <?php
            	if(is_home() || is_front_page() ){
            	$profitmag_content_id = "home-content";
            	}else{
            	$profitmag_content_id ="content";
            	} 
             ?>
        </div>    
            <div id="<?php echo $profitmag_content_id; ?>" class="site-content">
    
   