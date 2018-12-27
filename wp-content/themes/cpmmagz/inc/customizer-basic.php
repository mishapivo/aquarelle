<?php
/**
*
* Panel for customizers
*
**/
if(!function_exists('cpmmagz_customizer_panels')):
    function cpmmagz_customizer_panels( $wp_customize ) {

        $wp_customize->add_panel( 'cpm_theme_options_panel', array(
            'priority'       => 25,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_attr( __( 'Theme Options', 'cpmmagz' ) ),
            'description'    => '',
            ) );
        }
    add_action( 'customize_register', 'cpmmagz_customizer_panels' );
endif;
/****************************************************************************/
/*                 Front Page Setting for the site                             */
/****************************************************************************/
get_template_part( 'inc/customizer','social' );
get_template_part( 'inc/customizer','highlight' );
get_template_part( 'inc/customizer','hero' );
get_template_part( 'inc/customizer','whot' );
get_template_part( 'inc/customizer','category' );
get_template_part( 'inc/customizer','theme-color' );

/****************************************************************************/
/*                 Header Setting for the site                             */
/****************************************************************************/
if(!function_exists('cpmmagz_header_section_customizer')):
    function cpmmagz_header_section_customizer( $wp_customize ) {
    	$wp_customize->remove_section( 'colors');
    	$wp_customize->remove_section( 'background_image');

        //Contact us iframe
         $wp_customize->add_section( 'contact_page', array(
                'title'       => esc_attr( __( 'Contact Page', 'cpmmagz' ) ),
                'priority'    =>10,
                'panel'       => 'cpm_theme_options_panel',
            ) );

        // iframe for google map
        $wp_customize->add_setting( 'map', array(
            'default' =>  '',
    		'sanitize_callback' => 'esc_html'
        ) );

        // add control for page comment toggle checkbox
        $wp_customize->add_control( 'map', array(
            'label'     => esc_attr( __( 'Add map source ', 'cpmmagz' ) ),
            'description' => esc_attr( __( 'Adds map in contact page', 'cpmmagz') ),
            'section'   => 'contact_page',
            'settings' => 'map',
            'type'      => 'text'
        ) );

        /*** Blog Options ***/
        $wp_customize->add_section( 'blog_options', array(
            'title'       => esc_attr( __( 'Blog Option', 'cpmmagz' ) ),
            'panel'       => 'cpm_theme_options_panel',
            'priority'    => 11,
        ) );


        // add setting for page comment toggle checkbox
        $wp_customize->add_setting( 'author_toggle', array(
            'default' => 1 ,
           'sanitize_callback' => 'cpmmagz_sanitize_checkbox'
        ) );

        // add control for page comment toggle checkbox
        $wp_customize->add_control( 'author_toggle', array(
            'label'     => esc_attr( __( 'Show Author Description in Single Posts?', 'cpmmagz' ) ),
            'section'   => 'blog_options',
            'settings' => 'author_toggle',
            'type'      => 'checkbox'
        ) );

        $wp_customize->add_setting( 'blog_category', array(
            'default' =>  '',
            'sanitize_callback' => 'esc_html'
        ) );

        $wp_customize->add_control( 'blog_category', array(
            'label'     => esc_attr( __( 'Select blog category ', 'cpmmagz' ) ),
            'description' => esc_attr( __( 'displays blog with selected category', 'cpmmagz') ),
            'section'   => 'blog_options',
            'settings' => 'blog_category',
            'type'      => 'select',
            'choices'    => cpmmagz_get_categories_select(),
        ) );





         //sidebar

        $wp_customize->add_section( 'sidebar_position', array(
            'title'       => esc_attr( __( 'Sidebar Position', 'cpmmagz' ) ),
            'priority'    => 2,
            'panel'       => 'cpm_theme_options_panel',
        ) );

        //show sidebar
        $wp_customize->add_setting( 'sidebar_toggle', array(
            'default' => '',
            'sanitize_callback' => 'esc_html'
        ) );


        $wp_customize->add_control( 'sidebar_toggle', array(
            'label'     => esc_attr( __( 'Show Sidebar in single page.', 'cpmmagz' ) ),
            'section'   => 'sidebar_position',
            'settings' => 'sidebar_toggle',
            'type'      => 'radio',
            'choices'    => array(
                'right'      => esc_attr( __( 'Right Sidebar', 'cpmmagz' ) ),
                'left'       => esc_attr( __( 'Left Sidebar', 'cpmmagz' ) ),
                'none'      => esc_attr( __( 'No Sidebar', 'cpmmagz' ) ),
            ),
        ) );

        $wp_customize->add_section( 'search_toggle', array(
            'title'       => esc_attr( __( 'Search', 'cpmmagz' ) ),
            'priority'    => 3,
            'panel'       => 'cpm_theme_options_panel',
        ) );

        //show sidebar
        $wp_customize->add_setting( 'search_toggle', array(
            'default' => '',
            'sanitize_callback' => 'esc_html'
        ) );
        $wp_customize->add_control( 'search_toggle', array(
            'label'     => esc_attr( __( 'Show search in header?', 'cpmmagz' ) ),
            'section'   => 'search_toggle',
            'settings' => 'search_toggle',
            'type'      => 'radio',
            'choices'    => array(
                'yes'      => esc_attr( __('Yes', 'cpmmagz') ),
                'no'      => esc_attr( __('No', 'cpmmagz') ),

            ),
        ) );


         //ADD/CHANGE CSS
        $version_wp = get_bloginfo('version');
        if($version_wp < 4.7){
            $wp_customize->add_section(
            'change_css',
            array(
                'title' => __( 'Custom CSS','cpmmagz' ),
                'description' => __( 'Here you can customize Your theme\'s CSS' , 'cpmmagz' ),
                'capability'=>'edit_theme_options',
                'panel'       => 'cpm_theme_options_panel',
                'priority' => 29,
            )
            );
            $wp_customize->add_setting(
                'css_change',
                array(
                    'default'=>'',
                    'sanitize_callback'=>'cpmmagz_sanitize_css',
                    'capability'        => 'edit_theme_options',
                )
            );
            $wp_customize->add_control( 'cpmmagz_css_change', array(
                'label'        => __( 'Add CSS', 'cpmmagz' ),
                'type'=>'textarea',
                'section'    => 'change_css',
                'settings'   => 'css_change',
            ) );
        }
    }
    add_action( 'customize_register', 'cpmmagz_header_section_customizer' );
endif;