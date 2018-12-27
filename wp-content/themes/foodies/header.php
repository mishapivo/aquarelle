<?php
/*
 * The Header template for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
    <div class="foodies-wrapper">
        <div class="side-bar clearfix">
        <div class="navbar">
                <div class="navbar-header">
                    <!-- toggle button start -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".side-bar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- toggle button end -->
                    <!-- Logo start -->
                    <div class="navbar-brand" href="">
                        <div class="logo">
						<a href="<?php echo home_url();?>">
                            <?php 
                            $logo_image = '';
                            if (function_exists('get_custom_logo')) {
                                $logo_image = has_custom_logo(); 
                                $output_logo = get_custom_logo();
                            }
                            if(empty($logo_image)){
                                    echo $foodies_logo = '<div class="site-title">'.get_bloginfo('name').'</div><small class="site-description">'.get_bloginfo('description').'</small>';
                            }else{
                                echo $output_logo;
                            } ?>
						</a>
                     </div>
                    </div>
                    <!-- Logo end -->
                </div>
                <!-- Menu start -->
                <div class="side-bar-collapse collapse">
                    <!-- All cuisines-modal start-->
                    <?php $foodies_menu_name = foodies_get_menu_by_location('primary');
                    if(isset($foodies_menu_name->name)) {
                        echo "<h4>".esc_html($foodies_menu_name->name)."</h4>"; 
                    }
                    wp_nav_menu( array('theme_location' => 'primary',
                                        'container_class' => 'dl-menu',
                                        'container' => 'ul' ) ); ?>
                    <!-- All cuisines-modal end -->
                    <?php get_template_part('sidebar'); ?>
                    <div class="link">
                       <a target="_blank" href="https://indigothemes.com/products/foodies-wordpress-theme/">Foodies</a> - <a target="_blank" href="http://fishingday.org/category/kulinariya/" rel="nofollow">FishinDay.org</a>
                    </div>
                </div>
            </div>
            <!-- Menu end -->
        </div>