<?php
if( !class_exists( 'mythemes_setup' ) ){

class mythemes_setup
{
	static function sidebars()
	{
        register_sidebar(array(
            'id'            => 'main',
            'name'          => __( 'Main Sidebar' , 'materialize' ),
            'description'   => __( 'Main Sidebar - is used by default for next templates: Blog, Archives, Author, Categories, Tags and Search Results.' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'id'            => 'front-page',
            'name'          => __( 'Front Page Sidebar' , 'materialize' ),
            'description'   => __( 'Front Page Sidebar - is used by default for Front Page template.' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'id'            => 'post',
            'name'          => __( 'Post Sidebar' , 'materialize' ),
            'description'   => __( 'Post Sidebar - is used by default for single post template.' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'id'            => 'page',
            'name'          => __( 'Page Sidebar' , 'materialize' ),
            'description'   => __( 'Page Sidebar - is used by default for page template.' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        register_sidebar(array(
            'id'            => 'special-page',
            'name'          => __( 'Special Page Sidebar' , 'materialize' ),
            'description'   => __( 'Special Page Sidebar - by default is used for Special Page Layout.' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>'
        ));

        /* HEADER SIDEBARS */
        register_sidebar(array(
            'id'            => 'front-page-header-first',
            'name'          => __( 'Header - First Front Page Sidebar' , 'materialize' ),
            'description'   => __( 'Content for left front page header Sidebar' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ));

        register_sidebar(array(
            'id'            => 'front-page-header-second',
            'name'          => __( 'Header - Second Front Page Sidebar' , 'materialize' ),
            'description'   => __( 'Content for middle front page header Sidebar' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ));

        register_sidebar(array(
            'id'            => 'front-page-header-third',
            'name'          => __( 'Header - Third Front Page Sidebar' , 'materialize' ),
            'description'   => __( 'Content for right front page header Sidebar' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>'
        ));

        /* FOOTER SIDEBARS */
        register_sidebar(array(
            'id'            => 'footer-first',
            'name'          => __( 'Footer - First Sidebar' , 'materialize' ),
            'description'   => __( 'Content for first footer Sidebar' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>'
        ));

        register_sidebar(array(
            'id'            => 'footer-second',
            'name'          => __( 'Footer - Second Sidebar' , 'materialize' ),
            'description'   => __( 'Content for second footer Sidebar' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>'
        ));

        register_sidebar(array(
            'id'            => 'footer-third',
            'name'          => __( 'Footer - Third Sidebar' , 'materialize' ),
            'description'   => __( 'Content for third footer Sidebar' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>'
        ));

        register_sidebar(array(
            'id'            => 'footer-fourth',
            'name'          => __( 'Footer - Fourth Sidebar' , 'materialize' ),
            'description'   => __( 'Content for fourth footer Sidebar' , 'materialize' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>'
        ));
	}

	static function menus()
    {
        register_nav_menus(array(
            'header' => __( 'Header menu' , 'materialize' )
        ));
    }
}

}   /* END IF CLASS EXISTS */
?>