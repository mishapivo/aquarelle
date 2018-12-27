<?php
/**
*Inline style to use color options
**/
if( ! function_exists( 'business_click_inline_style' ) ) :

    /**
     * style to use color options
     *
     * @since  flare 1.0.1
     */
    function business_click_inline_style()
    {
      
        global $business_click_customizer_all_values;

        global $business_click_google_fonts;
        $business_click_customizer_defaults['business-click-font-family-site-identity']         = 'Raleway:400,300,500,600,700,900';
        $business_click_customizer_defaults['business-click-font-family-menu']                  = 'Raleway:400,300,500,600,700,900';
        $business_click_customizer_defaults['business-click-font-family-h1-h6']                 = 'Raleway:400,300,500,600,700,900';
        $business_click_customizer_defaults['business-click-font-family-body-p']                = 'Raleway:400,300,500,600,700,900';
        $business_click_customizer_defaults['business-click-font-family-button-text']           = 'Roboto+Condensed:400,300,400italic,700';
        $business_click_customizer_defaults['business-click-footer-copy-right-text']            = 'Open+Sans:400,400italic,600,700';

        $business_click_font_family_site_identity           = $business_click_google_fonts[$business_click_customizer_all_values['business-click-font-family-site-identity']];
        $business_click_font_family_menu_text               = $business_click_google_fonts[$business_click_customizer_all_values['business-click-font-family-menu']];
        $business_click_font_family_h1_h6                   = $business_click_google_fonts[$business_click_customizer_all_values['business-click-font-family-h1-h6']];
        $business_click_font_family_body_paragraph          = $business_click_google_fonts[$business_click_customizer_all_values['business-click-font-family-body-p']];
        $business_click_font_family_button_text             = $business_click_google_fonts[$business_click_customizer_all_values['business-click-font-family-button-text']];
        $business_click_font_family_footer_copyright_text   = $business_click_google_fonts[$business_click_customizer_all_values['business-click-footer-copy-right-text']];
        // size
        $business_click_font_title_size                     = $business_click_customizer_all_values['business-click-font-family-title-size'];
        $business_click_font_content_size                   = $business_click_customizer_all_values['business-click-font-family-content-size'];

        
        //*color options*/
        $business_click_background_color                        = get_background_color();
        $business_click_site_identity_color_option              = $business_click_customizer_all_values['business-click-site-identity-color'];
        $business_click_top_header_bar_background_color         = $business_click_customizer_all_values['business-click-top-header-background-bar-color'];
        $business_click_menu_header_background_color            = $business_click_customizer_all_values['business-click-menu-header-background-color'];
        $business_click_h1_h6                                   = $business_click_customizer_all_values['business-click-business-clcik-h1-h6'];
        $business_click_footer_background                       = $business_click_customizer_all_values['business-click-footer-background-color'];
        $business_click_contaner_width                          = $business_click_customizer_all_values['business-click-conatiner-width-layout'];
       
        ?>
      
      <style type="text/css">

        /*site identity font family*/
            .site-title,
            .site-title a,
            .site-description,
            .site-description a {
                font-family: '<?php echo esc_attr( $business_click_font_family_site_identity ); ?>';
            }
                        
            h2, h2 a, .h2, .h2 a, 
            h2.widget-title, .h1, .h3, .h4, .h5, .h6, 
            h1, h3, h4, h5, h6 .h1 a, .h3 a, .h4 a,
            .h5 a, .h6 a, h1 a, h3 a, h4 a, h5 a, 
            h6 a {
                font-family: '<?php echo esc_attr( $business_click_font_family_h1_h6 ); ?>';
            }

            /* readmore and fonts*/
            .readmore, .business-click-header-wrap .business-click-head-search form .search-submit, .widget_search form .search-submit, a.btn, .btn, a.readmore, .readmore, .wpcf7-form .wpcf7-submit, button, input[type="button"], input[type="reset"], input[type="submit"], .dark-theme .site-content a.readmore, .dark-theme .site-content .readmore, .dark-theme #business-click-social-icons ul li a, .dark-theme-coloured .btn, .dark-theme-coloured a.btn, .dark-theme-coloured button, .dark-theme-coloured input[type="submit"], .dark-theme-coloured .business-click-header-wrap .business-click-head-search form .search-submit {
                font-family: '<?php echo esc_attr( $business_click_font_family_button_text ); ?>';
            }

            /*font family menu text*/
             nav#site-navigation ul a
            {
                font-family: '<?php echo esc_attr( $business_click_font_family_menu_text ); ?>';
            }

            /*font family body paragraph text*/
            p
            {
                font-family: '<?php echo esc_attr( $business_click_font_family_body_paragraph ); ?>';
            }

            /*font family footer copyright  text*/
            .evt-copyright 
            {
                font-family: '<?php echo esc_attr( $business_click_font_family_footer_copyright_text ); ?>';
            }


             
            .widget-title, .widgettitle, .page-title, body .entry-title,
            .elementor-heading-title {
                font-size: <?php echo esc_attr( $business_click_font_title_size ); ?>px;
            }
            body, html {
                font-size: <?php echo esc_attr( $business_click_font_content_size ); ?>px;
            }




        /*=====COLOR OPTION=====*/
        /*Color*/
        /*----------------------------------*/
        <?php 
        if( !empty($business_click_site_identity_color_option) ){
        ?>
            /*Site identity / logo & tagline*/
            body:not(.transparent-header) .site-branding a,
            body:not(.transparent-header) .site-branding p,
            body.home.transparent-header.small-header .site-branding a,
            body.home.transparent-header.small-header .site-branding p {
              color: <?php echo esc_attr( $business_click_site_identity_color_option );?>;
            }
        <?php
        }

        /*top-header bar background color*/
        if( !empty($business_click_top_header_bar_background_color) ){?>
            #evt-top-header
            {
                background-color: <?php echo esc_attr($business_click_top_header_bar_background_color);?>;
            }

        <?php }

        /*container*/
        if( !empty($business_click_contaner_width) ){?>
            @media (min-width: 1200px) {
                .container {
                    max-width: <?php echo esc_attr($business_click_contaner_width);?>px;
                }
            }

        <?php }



        /*menu-background color*/
        if( !empty($business_click_menu_header_background_color) )
        {?>
            header.site-header
            {
                background-color: <?php echo esc_attr($business_click_menu_header_background_color);?>;
            }

        <?php }

        /*h1-h6 color*/   
        if( !empty($business_click_h1_h6) )
        {
        ?>
            .widget-title, .widgettitle, .page-title, .entry-title, .widget-title a, .widgettitle a, .page-title a, .entry-title a
            {
                color: <?php echo esc_attr($business_click_h1_h6);?>;
            }

        <?php 
        }

        /*Free Section heading buttom border*/   
        ?>
            .widget-title:before, .widgettitle:before, .page-title:before, .entry-title:before
            {
                display: none;
            }
            .widget-title, .widgettitle, .page-title, body .entry-title {
                margin-bottom: 0;
            }

            .slick-slider .slick-arrow {
                margin-top: -52px;
            }


        <?php 

        /*footer background*/
        if( !empty($business_click_footer_background) )
        {?>
            .site-footer
            {
                background-color: <?php echo esc_attr($business_click_footer_background);?>;
            }

        <?php } 

        /*header extra-button */
        if( $business_click_customizer_all_values['business-click-text-extra-button-text'] == 1 )
        {?>
            #site-navigation {
                /*padding-right: 0 !important;*/
            }

        <?php 
        } 

        /* testimonial */
        if( $business_click_customizer_all_values['business-click-testimonila-enable']  == 1 )
        {?>
            #evt-testimonials {
                display: block;
            }

        <?php 
        }  
        else { 
        ?>
            #evt-testimonials {
                display: none;
            }
        <?php 
        }
        // end testimonial

        /* feature */
        if( $business_click_customizer_all_values['business-click-feature-enable']  == 1 )
        {?>
            #evt-featured {
                display: block;
            }

        <?php 
        }  
        else { 
        ?>
            #evt-featured {
                display: none;
            }
        <?php 
        }
        // end feature

        /* blog */
        if( $business_click_customizer_all_values['business-click-blog-section-enable']  == 1 )
        {?>
            #evt-blog {
                display: block;
            }

        <?php 
        }  
        else { 
        ?>
            #evt-blog {
                display: none;
            }
        <?php 
        }
        // end blog

        /* contact */
        if( $business_click_customizer_all_values['business-click-contact-section-enable']  == 1 )
        {?>
            #evt-contact {
                display: block;
            }

        <?php 
        }  
        else { 
        ?>
            #evt-contact {
                display: none;
            }
        <?php 
        }
        // end contact

        if( $business_click_customizer_all_values['business-click-feature-background-image'] != '') {
        ?>
            #evt-featured,
            .evt-featured-item-wrap .evt-featured-item .evt-featured-title a,
            #evt-featured .widget-title {
                color: #fff;
            }
            #evt-featured .evt-img-overlay {
                background-color: rgba(0,0,0,0.3);
            }
        <?php 
        }

        if($business_click_customizer_all_values['business-click-about-us-background-image'] != '') {
        ?>
            #evt-why-us,
            #evt-why-us .widget-title {
                color: #fff;
            }
            #evt-why-us .evt-img-overlay {
                background-color: rgba(0,0,0,0.3);
            }
        <?php 
        }

        if($business_click_customizer_all_values['business-click-blog-background-image'] != '') { 
        ?>
            #evt-blog .widget-title,
            #evt-blog .evt-blog-slider .evt-box-caption, 
            #evt-blog .evt-blog-slider .evt-box-caption a {
                color: #fff;
            }
            #evt-blog .evt-img-overlay {
                background-color: rgba(0,0,0,0.3);
            }
        <?php 
        }

        if($business_click_customizer_all_values['business-click-contact-background-image'] != '') { 
        ?>
            #evt-contact,
            #evt-contact .widget-title {
                color: #fff;
            }
            #evt-contact .evt-img-overlay {
                background-color: rgba(0,0,0,0.3);
            }
        <?php 
        } 
        ?>
       </style>
    <?php

    
    }
endif;
add_action( 'wp_head', 'business_click_inline_style' );

