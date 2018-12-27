<?php
if( !function_exists( 'corporate_plus_demo_nav_data') ){
    function corporate_plus_demo_nav_data(){
        $demo_navs = array(
            'one-page' => 'One Page Menu',
            'primary'  => 'Inner Page Menu'
        );
        return $demo_navs;
    }
}
add_filter('acme_demo_setup_nav_data','corporate_plus_demo_nav_data');

if( !function_exists( 'corporate_plus_demo_wp_options_data') ){
    function corporate_plus_demo_wp_options_data(){
        $wp_options = array(
            'blogname'       => 'Corporate Plus',
            'page_on_front'  => 'Home',
            'page_for_posts' => 'Blog',
        );
        return $wp_options;
    }
}
add_filter('acme_demo_setup_wp_options_data','corporate_plus_demo_wp_options_data');