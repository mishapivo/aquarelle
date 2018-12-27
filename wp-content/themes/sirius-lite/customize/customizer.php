<?php
/**
 * Customizer functionality
 *
 */
?>
<?php 
/*------------------------------
 Panels and Sections
 ------------------------------*/

function sirius_customizer_panels_sections( $wp_customize ) {
    
    #sirius_section_theme_info
    $wp_customize->add_section( 'sirius_section_theme_info', array(
        'title'       => esc_html__( 'Sirius - Info', 'sirius-lite' ),
        'priority'    => 0
    ) );
    
    #sirius_panel_frontpage
    $wp_customize->add_panel( 'sirius_panel_frontpage', array(
        'priority'    => 61,
        'title'       => esc_html__( 'Front Page', 'sirius-lite' ),
    ) );
    $wp_customize->add_section( 'sirius_section_frontpage_order', array(
        'title'       => esc_html__( 'Sections Order', 'sirius-lite' ),
        'priority'    => 63,
        'panel'       => 'sirius_panel_frontpage',
    ) );
    $wp_customize->add_section( 'sirius_section_frontpage_featured_links_images', array(
        'title'       => esc_html__( 'Featured Links / Pages (Images)', 'sirius-lite' ),
        'priority'    => 64,
        'panel'       => 'sirius_panel_frontpage',
    ) );
    $wp_customize->add_section( 'sirius_section_frontpage_open_content_1', array(
        'title'       => esc_html__( 'Open Content - 1', 'sirius-lite' ),
        'priority'    => 65,
        'panel'       => 'sirius_panel_frontpage',
    ) );
    $wp_customize->add_section( 'sirius_section_frontpage_cta_1', array(
        'title'       => esc_html__( 'Call to Action - 1', 'sirius-lite' ),
        'priority'    => 66,
        'panel'       => 'sirius_panel_frontpage',
    ) );
    $wp_customize->add_section( 'sirius_section_frontpage_open_content_2', array(
        'title'       => esc_html__( 'Open Content - 2', 'sirius-lite' ),
        'priority'    => 67,
        'panel'       => 'sirius_panel_frontpage',
    ) );
    $wp_customize->add_section( 'sirius_section_frontpage_featured_links_icons', array(
        'title'       => esc_html__( 'Featured Links / Pages (Icons)', 'sirius-lite' ),
        'priority'    => 68,
        'panel'       => 'sirius_panel_frontpage',
    ) );
    $wp_customize->add_section( 'sirius_section_frontpage_recent_posts', array(
        'title'       => esc_html__( 'Recent Posts', 'sirius-lite' ),
        'priority'    => 71,
        'panel'       => 'sirius_panel_frontpage',
    ) );
    $wp_customize->add_section( 'sirius_section_frontpage_cta_2', array(
        'title'       => esc_html__( 'Call to Action - 2', 'sirius-lite' ),
        'priority'    => 72,
        'panel'       => 'sirius_panel_frontpage',
    ) );
    
    #sirius_section_blog_feed
    $wp_customize->add_section( 'sirius_section_blog_feed', array(
        'title'       => esc_html__( 'Blog Feed', 'sirius-lite' ),
        'priority'    => 90
    ) );
    
    #sirius_section_posts
    $wp_customize->add_section( 'sirius_section_posts', array(
        'title'       => esc_html__( 'Posts', 'sirius-lite' ),
        'priority'    => 91,
    ) );
   
    #sirius_section_pages
    $wp_customize->add_section( 'sirius_section_pages', array(
        'title'       => esc_html__( 'Pages', 'sirius-lite' ),
        'priority'    => 92,
    ) );
    
    #sirius_section_advanced
    if(sirius_show_custom_css_field()) {
    $wp_customize->add_section( 'sirius_section_advanced', array(
        'title'       => esc_html__( 'Advanced', 'sirius-lite' ),
        'priority'    => 96,
    ) );
    }
    
}

add_action( 'customize_register', 'sirius_customizer_panels_sections' );


/*------------------------------
 Fields
 ------------------------------*/
 
function sirius_customizer_fields( $fields ) {
    
    global $sirius_defaults;
    
    #sirius_section_theme_info
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_theme_info',
        'label'       => esc_html__( 'Sirius PRO', 'sirius-lite' ),
        'description' => wp_kses_post(__( '
        <h1>Sirius Pro</h1>
        <p><a class="button" href="https://www.lyrathemes.com/sirius-pro/" target="_blank">Upgrade to Sirius Pro</a></p>
        <p>Upgrade for the many awesome features and expert support included with the pro version of this theme. View the <a href="https://www.lyrathemes.com/preview/?theme=sirius-pro" target="_blank">Sirius Pro Demo</a> to see the additional features and functionality available in your upgrade.</p>
        <p>Pro Features:
        <ul>
            <li>&raquo; Front Page Slider</li>
            <li>&raquo; Built-in Portfolio/Projects</li>
            <li>&raquo; Built-in Searchable FAQ</li>
            <li>&raquo; Built-in Shortcodes for Info Cards</li>
            <li>&raquo; Front Page Testimonials</li>
            <li>&raquo; Front Page Team</li>
            <li>&raquo; Front Page Featured Pages with Images (Flexible)</li>
            <li>&raquo; One on one personal support and continuous theme updates</li>
        </ul>
        </p>
        <hr />
        <h1>Current Theme: Sirius Lite</h1>
        <h3>Demo Site</h3>
        <p>Head on over to the <a  href="https://www.lyrathemes.com/preview/?theme=sirius" target="_blank">Sirius demo</a> to see what you can accomplish with this theme!</p>
        <h3>Documentation</h3>
        <p>Read how to customize the theme, set up widgets, and learn of all the possible options available to you.</p>
        <p><a class="button" href="https://www.lyrathemes.com/documentation/sirius.pdf" target="_blank">Sirius Documentation</a></p>
        <h3>Sample Data</h3>
        <p>You can install the content and settings shown on our demo site by importing this sample data.</p>
        <p><a class="button" href="https://www.lyrathemes.com/sample-data/sirius-sample-data.zip" target="_blank">Sirius Sample Data</a></p>
        <h3>Feedback and Support</h3>
        <p>For feedback and support, please contact us and we would be happy to assist!</p>
        <p><a class="button" href="https://www.lyrathemes.com/support" target="_blank">Sirius Support</a></p>
        ', 'sirius-lite' ) ),
        'section'     => 'sirius_section_theme_info',
        'priority'    => 1,

        );    
    
    #title_tagline
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'     => 'sirius_image_logo_show',
        'label'       => esc_html__( 'Show Image Logo?', 'sirius-lite' ),
        'description' => esc_html__( 'Choose whether to display the image logo.', 'sirius-lite' ),
        'section'     => 'title_tagline',
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_image_logo_show'],
        'choices'     => array( 'on'  => esc_attr__( 'SHOW', 'sirius-lite' ), 'off' => esc_attr__( 'HIDE', 'sirius-lite' ) ),
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'sirius_text_logo',
        'label'       => esc_html__( 'Text Logo', 'sirius-lite' ),
        'description' => esc_html__( 'Displayed when `Show Image Logo?` is set to `Show` or if there is no logo image uploaded.', 'sirius-lite' ),
        'section'     => 'title_tagline',
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_text_logo'],
        'active_callback'  => array( array( 'setting'  => 'sirius_image_logo_show', 'operator' => '==', 'value'    => '0' ) ),
        'sanitize_callback'=> 'sanitize_text_field'
    );
    
    $fields[] = array(
        'type'        => 'custom',
        'settings'     => 'sirius_text_logo_sep1',
        'label'       => '<hr />', 
        'section'     => 'title_tagline',
        'priority'    => 3
    );
    
    $fields[] = array(
        'type'        => 'textarea',
        'settings'     => 'sirius_footer_copyright',
        'label'       => esc_html__( 'Copyright Text', 'sirius-lite' ),
        'description' => esc_html__( 'Accepts HTML.', 'sirius-lite' ),
        'section'     => 'title_tagline',
        'priority'    => 100,
        'default'     => $sirius_defaults['sirius_footer_copyright'],
        'sanitize_callback' => 'wp_kses_post',
    );
   
    #header_image
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_banner_heading',
        'label'       => esc_html__( 'Caption Heading', 'sirius-lite' ),
        'section'     => 'header_image',
        'priority'    => 10,
        'default'     => $sirius_defaults['sirius_banner_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type'        => 'textarea',
        'settings'    => 'sirius_banner_description',
        'label'       => esc_html__( 'Caption Description', 'sirius-lite' ),
        'section'     => 'header_image',
        'priority'    => 11,
        'default'     => $sirius_defaults['sirius_banner_description'],
        'sanitize_callback' => 'wp_kses_post'
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_banner_button_1_label',
        'label'       => esc_html__( 'Button 1 - Label', 'sirius-lite' ),
        'section'     => 'header_image',
        'priority'    => 12,
        'default'     => $sirius_defaults['sirius_banner_button_1_label'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_banner_button_1_url',
        'label'       => esc_html__( 'Button 1 - URL', 'sirius-lite' ),
        'section'     => 'header_image',
        'priority'    => 13,
        'default'     => $sirius_defaults['sirius_banner_button_1_url'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_banner_button_2_label',
        'label'       => esc_html__( 'Button 2 - Label', 'sirius-lite' ),
        'section'     => 'header_image',
        'priority'    => 14,
        'default'     => $sirius_defaults['sirius_banner_button_2_label'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_banner_button_2_url',
        'label'       => esc_html__( 'Button 2 - URL', 'sirius-lite' ),
        'section'     => 'header_image',
        'priority'    => 15,
        'default'     => $sirius_defaults['sirius_banner_button_2_url'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    
    #sirius_section_frontpage_order
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'sortable',
        'settings'    => 'sirius_frontpage_order',
        'label'       => esc_html__( 'Order of Frontpage Sections', 'sirius-lite' ),
        'description' => esc_html__( 'Choose which sections to display by clicking on the `eye` icon and rearrange them in the order you would like them displayed.', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_order',
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_frontpage_order'],
        'choices'     => array(
                                'frontpage_section_order_content' => esc_attr__( 'Frontpage Content', 'sirius-lite' ),
                                'frontpage_section_order_featured_links_images' => esc_attr__( 'Featured Links/Pages (Images)', 'sirius-lite' ),
                                'frontpage_section_order_open_1' => esc_attr__( 'Open Content - 1', 'sirius-lite' ),
                                'frontpage_section_order_cta_1' => esc_attr__( 'Call to Action - 1', 'sirius-lite' ),
                                'frontpage_section_order_open_2' => esc_attr__( 'Open Content - 2', 'sirius-lite' ),
                                'frontpage_section_order_featured_links_icons' => esc_attr__( 'Featured Links/Pages (Icons)', 'sirius-lite' ),
                                'frontpage_section_order_recent_posts' => esc_attr__( 'Recent Posts', 'sirius-lite' ),
                                'frontpage_section_order_cta_2' => esc_attr__( 'Call to Action - 2', 'sirius-lite' ),
                            ),
    );
    
    #sirius_section_frontpage_featured_links_images
    #-----------------------------------------
    
    
    $fields[] = array(
        'type'        => 'repeater',
        'settings'    => 'sirius_frontpage_featured_link_images_pages',
        'label'       => esc_html__( 'Featured Link / Page', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_featured_links_images',
        'description' => esc_html__('These items will be shown 2 in a row. You can add as many as you like. Click `Add new row` to add a new item.', 'sirius-lite'),
        'priority'    => 3,
        'fields' => array(
            'sirius_frontpage_featured_link_images_page' => array(
                'type'        => 'dropdown-pages',
                'label'       => esc_attr__( 'Select Page', 'sirius-lite' ),
            )
        )
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_frontpage_featured_link_images_sep',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_frontpage_featured_links_images',
        'priority'    => 4
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_frontpage_featured_link_images_section_id',
        'label'       => esc_html__( 'Section ID', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_featured_links_images',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'sirius-lite'),
        'priority'    => 5,
        'default'     => $sirius_defaults['sirius_frontpage_featured_link_images_section_id'],
        'sanitize_callback'=>'sanitize_html_class',
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'sirius_frontpage_featured_link_images_background_color',
        'label'       => esc_html__( 'Section Background Color', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_featured_links_images',
        'priority'    => 6,
        'default'     => $sirius_defaults['sirius_frontpage_featured_link_images_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    
    #sirius_section_frontpage_open_content_1
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'dropdown-pages',
        'settings'    => 'sirius_frontpage_open_content_1',
        'label'       => esc_html__( 'Select Page', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_open_content_1',
        'description' => esc_html__('Select the page that has the content you would like to show in this section.', 'sirius-lite'),
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_frontpage_open_content_1'],
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_frontpage_open_content_1_sep',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_frontpage_open_content_1',
        'priority'    => 2
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_frontpage_open_content_1_section_id',
        'label'       => esc_html__( 'Section ID', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_open_content_1',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'sirius-lite'),
        'priority'    => 3,
        'default'     => $sirius_defaults['sirius_frontpage_open_content_1_section_id'],
        'sanitize_callback'=>'sanitize_html_class',
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'sirius_frontpage_open_content_1_background_color',
        'label'       => esc_html__( 'Section Background Color', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_open_content_1',
        'priority'    => 4,
        'default'     => $sirius_defaults['sirius_frontpage_open_content_1_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    
    #sirius_section_frontpage_cta_1
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'dropdown-pages',
        'settings'    => 'sirius_frontpage_cta_1',
        'label'       => esc_html__( 'Select Page', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_cta_1',
        'description' => esc_html__('Select the page that has the content you would like to show in this section.', 'sirius-lite'),
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_frontpage_cta_1'],
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'     => 'sirius_frontpage_cta_1_parallax',
        'label'       => esc_html__( 'Enable Parallax Background?', 'sirius-lite' ),
        'description' => esc_html__( 'Use the image uploaded next as a background with a parallax effect.', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_cta_1',
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_frontpage_cta_1_parallax'],
    );
    $fields[] = array(
        'type'        => 'image',
        'settings'     => 'sirius_frontpage_cta_1_parallax_image',
        'label'       => esc_html__( 'Background Image', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_cta_1',
        'priority'    => 3,
        'default'     => $sirius_defaults['sirius_frontpage_cta_1_parallax_image'],
        'description' => esc_html__('If parallax is disabled above, this image will be used as a simple background image.', 'sirius-lite'),
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_frontpage_cta_1_sep',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_frontpage_cta_1',
        'priority'    => 3
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_frontpage_cta_1_section_id',
        'label'       => esc_html__( 'Section ID', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_cta_1',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'sirius-lite'),
        'priority'    => 4,
        'default'     => $sirius_defaults['sirius_frontpage_cta_1_section_id'],
        'sanitize_callback'=>'sanitize_html_class',
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'sirius_frontpage_cta_1_background_color',
        'label'       => esc_html__( 'Section Background Color', 'sirius-lite' ),
        'description' => esc_html__('This will be used if no background image has been supplied for this section.', 'sirius-lite'),
        'section'     => 'sirius_section_frontpage_cta_1',
        'priority'    => 5,
        'default'     => $sirius_defaults['sirius_frontpage_cta_1_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    
    #sirius_section_frontpage_open_content_2
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'dropdown-pages',
        'settings'    => 'sirius_frontpage_open_content_2',
        'label'       => esc_html__( 'Select Page', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_open_content_2',
        'description' => esc_html__('Select the page that has the content you would like to show in this section.', 'sirius-lite'),
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_frontpage_open_content_2'],
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_frontpage_open_content_2_sep',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_frontpage_open_content_2',
        'priority'    => 1
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_frontpage_open_content_2_section_id',
        'label'       => esc_html__( 'Section ID', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_open_content_2',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'sirius-lite'),
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_frontpage_open_content_2_section_id'],
        'sanitize_callback'=>'sanitize_html_class',
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'sirius_frontpage_open_content_2_background_color',
        'label'       => esc_html__( 'Section Background Color', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_open_content_2',
        'priority'    => 3,
        'default'     => $sirius_defaults['sirius_frontpage_open_content_2_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    
    #sirius_section_frontpage_featured_links_icons
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'sirius_frontpage_featured_link_icons_heading',
        'label'       => esc_html__( 'Heading', 'sirius-lite' ),
        'description' => esc_html__( 'Heading for the featured links (icons) section.', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_featured_links_icons',
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_frontpage_featured_link_icons_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type'        => 'textarea',
        'settings'     => 'sirius_frontpage_featured_link_icons_text',
        'label'       => esc_html__( 'Text/Description', 'sirius-lite' ),
        'description' => esc_html__( 'Text to be displayed under the heading.', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_featured_links_icons',
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_frontpage_featured_link_icons_text'],
        'sanitize_callback' => 'wp_kses_post',
    );
    $fields[] = array(
        'type'        => 'repeater',
        'settings'    => 'sirius_frontpage_featured_link_icons',
        'label'       => esc_html__( 'Featured Link / Page', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_featured_links_icons',
        'description' => esc_html__('These items will be shown 3 or 4 in a row. You can add as many as you like. Click `Add new row` to add a new item. For a complete list of icons that can be used, please go to http://fontawesome.io/icons/', 'sirius-lite'),
        'priority'    => 3,
        'fields' => array(
            'sirius_frontpage_featured_link_icons_page' => array(
                'type'        => 'dropdown-pages',
                'label'       => esc_attr__( 'Select Page', 'sirius-lite' ),
            ),
            'sirius_frontpage_featured_link_icons_icon' => array(
                'type'        => 'text',
                'label'       => esc_attr__( 'Font Awesome Icon', 'sirius-lite' ),
                'sanitize_callback'=>'sanitize_html_class',
            ),
            'sirius_frontpage_featured_link_icons_color' => array(
                'type'        => 'color',
                'label'       => esc_attr__( 'Icon Color', 'sirius-lite' ),
                'sanitize_callback' => 'sanitize_hex_color',
            ),
        )
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_frontpage_featured_link_icons_sep',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_frontpage_featured_links_icons',
        'priority'    => 4
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_frontpage_featured_link_icons_section_id',
        'label'       => esc_html__( 'Section ID', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_featured_links_icons',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'sirius-lite'),
        'priority'    => 5,
        'default'     => $sirius_defaults['sirius_frontpage_featured_link_icons_section_id'],
        'sanitize_callback'=>'sanitize_html_class',
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'sirius_frontpage_featured_link_icons_background_color',
        'label'       => esc_html__( 'Section Background Color', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_featured_links_icons',
        'priority'    => 6,
        'default'     => $sirius_defaults['sirius_frontpage_featured_link_icons_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    
    
    #sirius_section_frontpage_recent_posts
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'text',
        'settings'     => 'sirius_frontpage_recent_posts_heading',
        'label'       => esc_html__( 'Heading', 'sirius-lite' ),
        'description' => esc_html__( 'Heading for the recent posts section.', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_recent_posts',
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_frontpage_recent_posts_heading'],
        'sanitize_callback' => 'sanitize_text_field',
    );
    $fields[] = array(
        'type'        => 'textarea',
        'settings'     => 'sirius_frontpage_recent_posts_text',
        'label'       => esc_html__( 'Text/Description', 'sirius-lite' ),
        'description' => esc_html__( 'Text to be displayed under the heading.', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_recent_posts',
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_frontpage_recent_posts_text'],
        'sanitize_callback' => 'wp_kses_post',
    );    
    $fields[] = array(
        'type'        => 'select',
        'settings'    => 'sirius_frontpage_recent_posts_number',
        'label'       => esc_html__( 'Number of Posts to Display', 'sirius-lite' ),
        'description' => esc_html__('Posts display 2 in a row. Choose how many you want to show in the recent posts section on the front page.', 'sirius-lite'),
        'section'     => 'sirius_section_frontpage_recent_posts',
        'priority'    => 3,
        'default'     => $sirius_defaults['sirius_frontpage_recent_posts_number'],
        'choices'     => array('2'=>'2','4'=>'4','6'=>'6','8'=>'8','10'=>'10'),  
        'sanitize_callback' => 'absint',
    );    
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_frontpage_recent_posts_sep',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_frontpage_recent_posts',
        'priority'    => 3
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_frontpage_recent_posts_section_id',
        'label'       => esc_html__( 'Section ID', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_recent_posts',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'sirius-lite'),
        'priority'    => 4,
        'default'     => $sirius_defaults['sirius_frontpage_recent_posts_section_id'],
        'sanitize_callback'=>'sanitize_html_class',
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'sirius_frontpage_recent_posts_background_color',
        'label'       => esc_html__( 'Section Background Color', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_recent_posts',
        'priority'    => 5,
        'default'     => $sirius_defaults['sirius_frontpage_recent_posts_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    
    #sirius_section_frontpage_cta_2
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'dropdown-pages',
        'settings'    => 'sirius_frontpage_cta_2',
        'label'       => esc_html__( 'Select Page', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_cta_2',
        'description' => esc_html__('Select the page that has the content you would like to show in this section.', 'sirius-lite'),
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_frontpage_cta_2'],
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'     => 'sirius_frontpage_cta_2_parallax',
        'label'       => esc_html__( 'Enable Parallax Background?', 'sirius-lite' ),
        'description' => esc_html__( 'Use the image uploaded next as a background with a parallax effect.', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_cta_2',
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_frontpage_cta_2_parallax'],
    );
    $fields[] = array(
        'type'        => 'image',
        'settings'     => 'sirius_frontpage_cta_2_parallax_image',
        'label'       => esc_html__( 'Background Image', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_cta_2',
        'priority'    => 3,
        'default'     => $sirius_defaults['sirius_frontpage_cta_2_parallax_image'],
        'description' => esc_html__('If parallax is disabled above, this image will be used as a simple background image.', 'sirius-lite'),
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_frontpage_cta_2_sep',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_frontpage_cta_2',
        'priority'    => 3
    );
    $fields[] = array(
        'type'        => 'text',
        'settings'    => 'sirius_frontpage_cta_2_section_id',
        'label'       => esc_html__( 'Section ID', 'sirius-lite' ),
        'section'     => 'sirius_section_frontpage_cta_2',
        'description' => esc_html__('Enter the ID for this section. This will allow the user to scroll down to this area when the corresponding link in the top navigation is clicked.', 'sirius-lite'),
        'priority'    => 4,
        'default'     => $sirius_defaults['sirius_frontpage_cta_2_section_id'],
        'sanitize_callback'=>'sanitize_html_class',
    );
    $fields[] = array(
        'type'        => 'color',
        'settings'    => 'sirius_frontpage_cta_2_background_color',
        'label'       => esc_html__( 'Section Background Color', 'sirius-lite' ),
        'description' => esc_html__('This will be used if no background image has been supplied for this section.', 'sirius-lite'),
        'section'     => 'sirius_section_frontpage_cta_2',
        'priority'    => 5,
        'default'     => $sirius_defaults['sirius_frontpage_cta_2_background_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    );
    
    /* sirius_section_blog_feed */
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'sirius_blog_feed_meta_show',
        'label'       => esc_html__( 'Show Meta?', 'sirius-lite' ),
        'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts in the blog feed. This applies to all blog feeds on all pages, including the front page.', 'sirius-lite' ),
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_blog_feed_meta_show'],
        'choices' => array( 'on'  => esc_attr__( 'SHOW', 'sirius-lite' ), 'off' => esc_attr__( 'HIDE', 'sirius-lite' ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_blog_feed_date_show',
        'label'       => esc_html__( 'Show Date?', 'sirius-lite' ),
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_blog_feed_date_show'],
        'active_callback'  => array( array( 'setting'  => 'sirius_blog_feed_meta_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_blog_feed_category_show',
        'label'       => esc_html__( 'Show Category?', 'sirius-lite' ),
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 3,
        'default'     => $sirius_defaults['sirius_blog_feed_category_show'],
        'active_callback'  => array( array( 'setting'  => 'sirius_blog_feed_meta_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_blog_feed_author_show',
        'label'       => esc_html__( 'Show Author?', 'sirius-lite' ),
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 4,
        'default'     => $sirius_defaults['sirius_blog_feed_author_show'],
        'active_callback'  => array( array( 'setting'  => 'sirius_blog_feed_meta_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_blog_feed_comments_show',
        'label'       => esc_html__( 'Show Comments?', 'sirius-lite' ),
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 5,
        'default'     => $sirius_defaults['sirius_blog_feed_comments_show'],
        'active_callback'  => array( array( 'setting'  => 'sirius_blog_feed_meta_show', 'operator' => '==', 'value'    => '1', ),)
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_blog_feed_sep1',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 6
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_blog_feed_sidebar_show',
        'label'       => esc_html__( 'Show Sidebar?', 'sirius-lite' ),
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 7,
        'description' => esc_html__( 'Sidebar is not shown by default. If the sidebar is disabled, then the blog feed will be shown in a two-column layout.', 'sirius-lite'),
        'default'     => $sirius_defaults['sirius_blog_feed_sidebar_show'],
    );
    $fields[] = array(
        'type'        => 'radio',
        'settings'    => 'sirius_blog_feed_post_format',
        'label'       => esc_html__( 'Post Display Format (With Sidebar)', 'sirius-lite' ),
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 7,
        'description' => esc_html__('This setting is ignored and only excerpts will be displayed (`Excerpt Only`) in a two-column format if the sidebar is disabled.', 'sirius-lite'),
        'default'     => $sirius_defaults['sirius_blog_feed_post_format'],
        'choices'     => array(
                            'Full'  => array(
                                esc_attr__( 'Full Content', 'sirius-lite' ),
                            ),
                            'Small'   => array(
                                esc_attr__( 'Excerpt Only', 'sirius-lite' ),
                            ), 
                        ),
    );
    $fields[] = array(
        'type'        => 'radio',
        'settings'    => 'sirius_blog_feed_post_images',
        'label'       => esc_html__( 'Post Images', 'sirius-lite' ),
        'section'     => 'sirius_section_blog_feed',
        'priority'    => 8,
        'description' => esc_html__('Choosing `None` will hide all featured images from the blog feed. `Images - Always` will show the posts with their featured images and the theme default/sample images in place of any missing featured images. `Images - Available` will only show the featured images you have uploaded and no sample images will be shown for the posts where the featured image is missing.', 'sirius-lite'),
        'default'     => $sirius_defaults['sirius_blog_feed_post_images'],
        'choices'     => array(
                            'None'  => array(
                                esc_attr__( 'None', 'sirius-lite' ),
                            ),
                            'Always'   => array(
                                esc_attr__( 'Images - Always', 'sirius-lite' ),
                            ), 
                            'Available'   => array(
                                esc_attr__( 'Images - Available', 'sirius-lite' ),
                            ), 
                        ),
    );
    
    /* sirius_section_posts */
    #-----------------------------------------
    
    $fields[] = array(
        'type'        => 'switch',
        'settings'    => 'sirius_posts_meta_show',
        'label'       => esc_html__( 'Show Meta?', 'sirius-lite' ),
        'description' => esc_html__( 'Choose whether to display date, category, author, tags for posts on the post page.', 'sirius-lite' ),
        'section'     => 'sirius_section_posts',
        'priority'    => 1,
        'default'     => $sirius_defaults['sirius_posts_meta_show'],
        'choices' => array( 'on'  => esc_attr__( 'SHOW', 'sirius-lite' ), 'off' => esc_attr__( 'HIDE', 'sirius-lite' ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_posts_date_show',
        'label'       => esc_html__( 'Show Date?', 'sirius-lite' ),
        'section'     => 'sirius_section_posts',
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_posts_date_show'],
        'active_callback'  => array( array( 'setting'  => 'sirius_posts_meta_show', 'operator' => '==', 'value'    => '1', ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_posts_category_show',
        'label'       => esc_html__( 'Show Category?', 'sirius-lite' ),
        'section'     => 'sirius_section_posts',
        'priority'    => 3,
        'default'     => $sirius_defaults['sirius_posts_category_show'],
        'active_callback'  => array( array( 'setting'  => 'sirius_posts_meta_show', 'operator' => '==', 'value'    => '1', ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_posts_author_show',
        'label'       => esc_html__( 'Show Author?', 'sirius-lite' ),
        'section'     => 'sirius_section_posts',
        'priority'    => 4,
        'default'     => $sirius_defaults['sirius_posts_author_show'],
        'active_callback'  => array( array( 'setting'  => 'sirius_posts_meta_show', 'operator' => '==', 'value'    => '1', ), )
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_posts_tags_show',
        'label'       => esc_html__( 'Show Tags?', 'sirius-lite' ),
        'section'     => 'sirius_section_posts',
        'priority'    => 5,
        'default'     => $sirius_defaults['sirius_posts_tags_show'],
        'active_callback'  => array( array( 'setting'  => 'sirius_posts_meta_show', 'operator' => '==', 'value'    => '1', ), )
    );
    $fields[] = array(
        'type'        => 'custom',
        'settings'    => 'sirius_posts_sep1',
        'label'       => '<hr />', 
        'section'     => 'sirius_section_posts',
        'priority'    => 6
    );
    $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'sirius_posts_sidebar',
        'label'       => esc_html__( 'Layout', 'sirius-lite' ),
        'description' => esc_html__( 'Choose whether to display the sidebar.', 'sirius-lite' ),
        'section'     => 'sirius_section_posts',
        'default'     => $sirius_defaults['sirius_posts_sidebar'],
        'priority'    => 7,
        'choices'     => array( '0' => trailingslashit( get_template_directory_uri() ) . 'customize/images/full.png',
                                '1' => trailingslashit( get_template_directory_uri() ) . 'customize/images/sidebar.png', ),
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_posts_featured_image_show',
        'label'       => esc_html__( 'Show Featured Image?', 'sirius-lite' ),
        'description' => esc_html__( 'Whether to show featured image at the beginning of the post.', 'sirius-lite' ),
        'section'     => 'sirius_section_posts',
        'priority'    => 8,
        'default'     => $sirius_defaults['sirius_posts_featured_image_show']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_posts_featured_image_full',
        'label'       => esc_html__( 'Show Banner in Full Size?', 'sirius-lite' ),
        'description' => esc_html__( 'Whether to show featured image in full size on the post page.', 'sirius-lite' ),
        'section'     => 'sirius_section_posts',
        'priority'    => 8,
        'default'     => $sirius_defaults['sirius_posts_featured_image_full']
    );
        
    /* sirius_section_pages */
    #-----------------------------------------
    
   $fields[] = array(
        'type'        => 'radio-image',
        'settings'    => 'sirius_pages_sidebar',
        'label'       => esc_html__( 'Layout', 'sirius-lite' ),
        'description' => esc_html__( 'Choose whether to display the sidebar.', 'sirius-lite' ),
        'section'     => 'sirius_section_pages',
        'default'     => $sirius_defaults['sirius_pages_sidebar'],
        'priority'    => 1,
        'choices'     => array( '0' => trailingslashit( get_template_directory_uri() ) . 'customize/images/full.png',
                                '1' => trailingslashit( get_template_directory_uri() ) . 'customize/images/sidebar.png', ),
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_pages_featured_image_show',
        'label'       => esc_html__( 'Show Featured Image ?', 'sirius-lite' ),
        'description' => esc_html__( 'Whether to show featured image at the beginning of the page.', 'sirius-lite' ),
        'section'     => 'sirius_section_pages',
        'priority'    => 2,
        'default'     => $sirius_defaults['sirius_pages_featured_image_show']
    );
    $fields[] = array(
        'type'        => 'toggle',
        'settings'    => 'sirius_pages_featured_image_full',
        'label'       => esc_html__( 'Show Banner in Full Size?', 'sirius-lite' ),
        'description' => esc_html__( 'Whether to show featured image in full size on the page.', 'sirius-lite' ),
        'section'     => 'sirius_section_pages',
        'priority'    => 8,
        'default'     => $sirius_defaults['sirius_pages_featured_image_full']
    );
        
   /* sirius_section_advanced */
   #-----------------------------------------
   if(sirius_show_custom_css_field()) {
   $fields[] = array(
        'type'        => 'code',
        'settings'    => 'sirius_advanced_css',
        'label'       => esc_html__( 'Custom CSS', 'sirius-lite' ),
        'description' => esc_html__( 'Custom CSS code to modify styling.', 'sirius-lite' ),
        'section'     => 'sirius_section_advanced',
        'priority'    => 2,
        'choices'     => array( 'language' => 'css', 'theme'    => 'monokai', 'height'   => 250, ),
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    );
   }
    
    return $fields;
}

add_filter( 'kirki/fields', 'sirius_customizer_fields' );
?>