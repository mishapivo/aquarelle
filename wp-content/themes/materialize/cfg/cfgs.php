<?php
$cfgs = array(

    /* AUTHOR */
    'author'        => array(
        'name'              => 'myThem.es',
        'description'       => __( 'myThem.es Marketplace provides WordPress themes with the best quality and the smallest prices.' , 'materialize' ),
        'url'               => 'http://mythem.es/'
    ),

    /* THEMES */
    'theme'         => array(
        'type'              => 'free',
        'description'       => __( 'Materialize - Best WordPress Theme based on Material Design.' , 'materialize' ),
        //'premium'           => 'http://mythem.es/item/cannyon-premium-multipurpose-wordpress-theme/'
    ),

    /* LINKS */
    'links'         => array(
        'referrals'         => 'http://mythem.es/referrals/',
        'affiliates'        => 'http://mythem.es/affiliates/',
        'plugins'           => 'javascript:void(null);',
        'items'             => 'http://mythem.es/our-items/'
    ),

    'faqs'          => array(
        array(
            'title'     => __( 'Welcome Message !' , 'materialize' ),
            'content'   =>

                '<p>' . __( 'Thank you for choosing myThem.es and use one of our WordPress Themes your choice is greatly appreciated!' , 'materialize' ) . '</p>' .

                '<p>' . __( 'If you have any questions ask!' , 'materialize' ) . '</p>' .

                '<p>' . __( 'And please help us to increase the theme quality ( report bugs ).' , 'materialize' ) . '</p>' .

                '<p>' . __( 'Also please help us to increase the theme rank!' , 'materialize' ) . '</p>'
        ),
        array(
            'title'     => __( 'Custom CSS and Customizations' , 'materialize' ),
            'content'   =>

                '<p>' . __( 'This theme comes with special option. This option allow add custom css to customize your web site to your needs.' , 'materialize' ) . '</p>' .

                '<p>' . __( 'To use it go to Admin Dashboard' , 'materialize' ) . '</p>' .

                '<p><strong>' . __( 'Appearance &rsaquo; Customize &rsaquo; Additional CSS.' , 'materialize' ) . '</strong></p>' .

                '<p>' . __( 'You can use it for multiple case, just is need to add you css in this field.' , 'materialize' ) . '</p>'
        ),
        array(
            'title'     => __( 'Customize the Theme' , 'materialize' ),
            'content'   =>

                '<p>' . __( 'This theme comes with a set of options what allow you to customize content, header, layouts, social items and others.' , 'materialize' ) . '</p>' .

                '<p>' . __( 'You can see theme options if you go to Admin Dashboard' , 'materialize' ) . '</p>' .

                '<p>' . __( 'Appearance &rsaquo; Customize' , 'materialize' ) . '</p>' .

                '<p>' . __( 'Here you can see:' , 'materialize' ) . '</p>' .

                '<br/>' .

                '<p>' . __( '01. Site Identity' , 'materialize' ) . '</p>' .
                '<p>' . __( '02. Colors' , 'materialize' ) . '</p>' .
                '<p>' . __( '03. Background Image' , 'materialize' ) . '</p>' .
                '<p>' . __( '04. Header Image' , 'materialize' ) . '</p>' .
                '<p>' . __( '05. Header Elements' , 'materialize' ) . '</p>' .
                '<p>' . __( '06. Breadcrumbs' , 'materialize' ) . '</p>' .
                '<p>' . __( '07. Additional' , 'materialize' ) . '</p>' .
                '<p>' . __( '08. Layout' , 'materialize' ) . '</p>' .
                '<p>' . __( '09. Social' , 'materialize' ) . '</p>' .
                '<p>' . __( '10. Others' , 'materialize' ) . '</p>' .
                '<p>' . __( '11. Menu' , 'materialize' ) . '</p>' .
                '<p>' . __( '12. Widgets' , 'materialize' ) . '</p>' .
                '<p>' . __( '13. Static Front Page' , 'materialize' ) . '</p>' .

                '<br/>' .

                '<p>' . __( 'All you have to do is play with them and view live changes.' , 'materialize' ) . '</p>' .

                '<p>' . __( 'Try and you will discover how easy it is to customize your own style.' , 'materialize' ) . '</p>'
        )

    )
);

mythemes_cfg::set( $cfgs );
?>
