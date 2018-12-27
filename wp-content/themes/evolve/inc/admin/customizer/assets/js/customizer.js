function active_header_widgets(value) {
    if (value == 'disable') {
        wp.customize.section('sidebar-widgets-header').deactivate();
        wp.customize.section('sidebar-widgets-header-2').deactivate();
        wp.customize.section('sidebar-widgets-header-3').deactivate();
        wp.customize.section('sidebar-widgets-header-4').deactivate();
    }
    if (value == 'one') {
        wp.customize.section('sidebar-widgets-header').activate();
        wp.customize.section('sidebar-widgets-header-2').deactivate();
        wp.customize.section('sidebar-widgets-header-3').deactivate();
        wp.customize.section('sidebar-widgets-header-4').deactivate();
    }
    if (value == 'two') {
        wp.customize.section('sidebar-widgets-header').activate();
        wp.customize.section('sidebar-widgets-header-2').activate();
        wp.customize.section('sidebar-widgets-header-3').deactivate();
        wp.customize.section('sidebar-widgets-header-4').deactivate();
    }
    if (value == 'three') {
        wp.customize.section('sidebar-widgets-header').activate();
        wp.customize.section('sidebar-widgets-header-2').activate();
        wp.customize.section('sidebar-widgets-header-3').activate();
        wp.customize.section('sidebar-widgets-header-4').deactivate();
    }
    if (value == 'four') {
        wp.customize.section('sidebar-widgets-header').activate();
        wp.customize.section('sidebar-widgets-header-2').activate();
        wp.customize.section('sidebar-widgets-header-3').activate();
        wp.customize.section('sidebar-widgets-header-4').activate();
    }
}

function active_footer_widgets(value) {
    if (value == 'disable') {
        wp.customize.section('sidebar-widgets-footer').deactivate();
        wp.customize.section('sidebar-widgets-footer-2').deactivate();
        wp.customize.section('sidebar-widgets-footer-3').deactivate();
        wp.customize.section('sidebar-widgets-footer-4').deactivate();
    }
    if (value == 'one') {
        wp.customize.section('sidebar-widgets-footer').activate();
        wp.customize.section('sidebar-widgets-footer-2').deactivate();
        wp.customize.section('sidebar-widgets-footer-3').deactivate();
        wp.customize.section('sidebar-widgets-footer-4').deactivate();
    }
    if (value == 'two') {
        wp.customize.section('sidebar-widgets-footer').activate();
        wp.customize.section('sidebar-widgets-footer-2').activate();
        wp.customize.section('sidebar-widgets-footer-3').deactivate();
        wp.customize.section('sidebar-widgets-footer-4').deactivate();
    }
    if (value == 'three') {
        wp.customize.section('sidebar-widgets-footer').activate();
        wp.customize.section('sidebar-widgets-footer-2').activate();
        wp.customize.section('sidebar-widgets-footer-3').activate();
        wp.customize.section('sidebar-widgets-footer-4').deactivate();
    }
    if (value == 'four') {
        wp.customize.section('sidebar-widgets-footer').activate();
        wp.customize.section('sidebar-widgets-footer-2').activate();
        wp.customize.section('sidebar-widgets-footer-3').activate();
        wp.customize.section('sidebar-widgets-footer-4').activate();
    }
}

jQuery(function ($) {

    // Bootstrap Slider

    wp.customize('evl_bootstrap_slider_front_page', function (setting) {
        setting.bind(function (value) {
            var evl_front_elements_header_area = wp.customize.value('evl_front_elements_header_area').get();
            if (value) {
                if (!(evl_front_elements_header_area.indexOf("bootstrap_slider") >= 0)) {
                    jQuery('li.kirki-sortable-item[data-value="bootstrap_slider"] .dashicons-visibility').trigger('click');
                }
            } else {
                if (evl_front_elements_header_area.indexOf("bootstrap_slider") >= 0) {
                    jQuery('li.kirki-sortable-item[data-value="bootstrap_slider"] .dashicons-visibility').trigger('click');
                }
            }
        });
    });

    wp.customize('evl_front_elements_header_area', function (setting) {
        setting.bind(function (value) {
            var evl_bootstrap_slider_front_page = wp.customize.value('evl_bootstrap_slider_front_page').get();
            if (value) {
                if (value.indexOf("bootstrap_slider") >= 0) {
                    if (wp.customize.value('evl_bootstrap_slider_front_page').get() != true) {
                        wp.customize.value('evl_bootstrap_slider_front_page')(true);
                    }
                }
                else {
                    if (wp.customize.value('evl_bootstrap_slider_front_page').get() != false) {
                        wp.customize.value('evl_bootstrap_slider_front_page')(false);
                    }
                }
            }
        });
    });

    wp.customize('evl_bootstrap_slider', function (setting) {
        setting.bind(function (value) {
            wp.customize.value('evl_bootstrap_slider_front_page')(value);
        });
    });

    // Parallax Slider

    wp.customize('evl_parallax_slider_front_page', function (setting) {
        setting.bind(function (value) {
            var evl_front_elements_header_area = wp.customize.value('evl_front_elements_header_area').get();
            if (value) {
                if (!(evl_front_elements_header_area.indexOf("parallax_slider") >= 0)) {
                    jQuery('li.kirki-sortable-item[data-value="parallax_slider"] .dashicons-visibility').trigger('click');
                }
            } else {
                if (evl_front_elements_header_area.indexOf("parallax_slider") >= 0) {
                    jQuery('li.kirki-sortable-item[data-value="parallax_slider"] .dashicons-visibility').trigger('click');
                }
            }
        });
    });

    wp.customize('evl_front_elements_header_area', function (setting) {
        setting.bind(function (value) {
            var evl_parallax_slider_front_page = wp.customize.value('evl_parallax_slider_front_page').get();
            if (value) {
                if (value.indexOf("parallax_slider") >= 0) {
                    if (wp.customize.value('evl_parallax_slider_front_page').get() != true) {
                        wp.customize.value('evl_parallax_slider_front_page')(true);
                    }
                }
                else {
                    if (wp.customize.value('evl_parallax_slider_front_page').get() != false) {
                        wp.customize.value('evl_parallax_slider_front_page')(false);
                    }
                }
            }
        });
    });

    wp.customize('evl_parallax_slider', function (setting) {
        setting.bind(function (value) {
            wp.customize.value('evl_parallax_slider_front_page')(value);
        });
    });

    // Posts Slider

    wp.customize('evl_carousel_slider_front_page', function (setting) {
        setting.bind(function (value) {
            var evl_front_elements_header_area = wp.customize.value('evl_front_elements_header_area').get();
            if (value) {
                if (!(evl_front_elements_header_area.indexOf("posts_slider") >= 0)) {
                    jQuery('li.kirki-sortable-item[data-value="posts_slider"] .dashicons-visibility').trigger('click');
                }
            } else {
                if (evl_front_elements_header_area.indexOf("posts_slider") >= 0) {
                    jQuery('li.kirki-sortable-item[data-value="posts_slider"] .dashicons-visibility').trigger('click');
                }
            }
        });
    });

    wp.customize('evl_front_elements_header_area', function (setting) {
        setting.bind(function (value) {
            var evl_carousel_slider_front_page = wp.customize.value('evl_carousel_slider_front_page').get();
            if (value) {
                if (value.indexOf("posts_slider") >= 0) {
                    if (wp.customize.value('evl_carousel_slider_front_page').get() != true) {
                        wp.customize.value('evl_carousel_slider_front_page')(true);
                    }
                }
                else {
                    if (wp.customize.value('evl_carousel_slider_front_page').get() != false) {
                        wp.customize.value('evl_carousel_slider_front_page')(false);
                    }
                }
            }
        });
    });

    wp.customize('evl_posts_slider', function (setting) {
        setting.bind(function (value) {
            wp.customize.value('evl_carousel_slider_front_page')(value);
        });
    });

    // Content Boxes

    wp.customize('evl_content_boxes_front_page', function (setting) {
        setting.bind(function (value) {
            var evl_front_elements_content_area = wp.customize.value('evl_front_elements_content_area').get();
            if (value) {
                if (!(evl_front_elements_content_area.indexOf("content_box") >= 0)) {
                    jQuery('li.kirki-sortable-item[data-value="content_box"] .dashicons-visibility').trigger('click');
                }
            } else {
                if (evl_front_elements_content_area.indexOf("content_box") >= 0) {
                    jQuery('li.kirki-sortable-item[data-value="content_box"] .dashicons-visibility').trigger('click');
                }
            }
        });
    });

    wp.customize('evl_front_elements_content_area', function (setting) {
        setting.bind(function (value) {
            var evl_content_boxes_front_page = wp.customize.value('evl_content_boxes_front_page').get();
            if (value) {
                if (value.indexOf("content_box") >= 0) {
                    if (wp.customize.value('evl_content_boxes_front_page').get() != true) {
                        wp.customize.value('evl_content_boxes_front_page')(true);
                    }
                }
                else {
                    if (wp.customize.value('evl_content_boxes_front_page').get() != false) {
                        wp.customize.value('evl_content_boxes_front_page')(false);
                    }
                }
            }
        });
    });

    // Testimonials

    wp.customize('evl_testimonials_front_page', function (setting) {
        setting.bind(function (value) {
            var evl_front_elements_content_area = wp.customize.value('evl_front_elements_content_area').get();
            if (value) {
                if (!(evl_front_elements_content_area.indexOf("testimonial") >= 0)) {
                    jQuery('li.kirki-sortable-item[data-value="testimonial"] .dashicons-visibility').trigger('click');
                }
            } else {
                if (evl_front_elements_content_area.indexOf("testimonial") >= 0) {
                    jQuery('li.kirki-sortable-item[data-value="testimonial"] .dashicons-visibility').trigger('click');
                }
            }
        });
    });

    wp.customize('evl_front_elements_content_area', function (setting) {
        setting.bind(function (value) {
            var evl_testimonials_front_page = wp.customize.value('evl_testimonials_front_page').get();
            if (value) {
                if (value.indexOf("testimonial") >= 0) {
                    if (wp.customize.value('evl_testimonials_front_page').get() != true) {
                        wp.customize.value('evl_testimonials_front_page')(true);
                    }
                }
                else {
                    if (wp.customize.value('evl_testimonials_front_page').get() != false) {
                        wp.customize.value('evl_testimonials_front_page')(false);
                    }
                }
            }
        });
    });

    // Counter Circles

    wp.customize('evl_counter_circle_front_page', function (setting) {
        setting.bind(function (value) {
            var evl_front_elements_content_area = wp.customize.value('evl_front_elements_content_area').get();
            if (value) {
                if (!(evl_front_elements_content_area.indexOf("counter_circle") >= 0)) {
                    jQuery('li.kirki-sortable-item[data-value="counter_circle"] .dashicons-visibility').trigger('click');
                }
            } else {
                if (evl_front_elements_content_area.indexOf("counter_circle") >= 0) {
                    jQuery('li.kirki-sortable-item[data-value="counter_circle"] .dashicons-visibility').trigger('click');
                }
            }
        });
    });

    wp.customize('evl_front_elements_content_area', function (setting) {
        setting.bind(function (value) {
            var evl_counter_circle_front_page = wp.customize.value('evl_counter_circle_front_page').get();
            if (value) {
                if (value.indexOf("counter_circle") >= 0) {
                    if (wp.customize.value('evl_counter_circle_front_page').get() != true) {
                        wp.customize.value('evl_counter_circle_front_page')(true);
                    }
                }
                else {
                    if (wp.customize.value('evl_counter_circle_front_page').get() != false) {
                        wp.customize.value('evl_counter_circle_front_page')(false);
                    }
                }
            }
        });
    });

    // Custom Content

    wp.customize('evl_custom_content_front_page', function (setting) {
        setting.bind(function (value) {
            var evl_front_elements_content_area = wp.customize.value('evl_front_elements_content_area').get();
            if (value) {
                if (!(evl_front_elements_content_area.indexOf("custom_content") >= 0)) {
                    jQuery('li.kirki-sortable-item[data-value="custom_content"] .dashicons-visibility').trigger('click');
                }
            } else {
                if (evl_front_elements_content_area.indexOf("custom_content") >= 0) {
                    jQuery('li.kirki-sortable-item[data-value="custom_content"] .dashicons-visibility').trigger('click');
                }
            }
        });
    });

    wp.customize('evl_front_elements_content_area', function (setting) {
        setting.bind(function (value) {
            var evl_custom_content_front_page = wp.customize.value('evl_custom_content_front_page').get();
            if (value) {
                if (value.indexOf("custom_content") >= 0) {
                    if (wp.customize.value('evl_custom_content_front_page').get() != true) {
                        wp.customize.value('evl_custom_content_front_page')(true);
                    }
                }
                else {
                    if (wp.customize.value('evl_custom_content_front_page').get() != false) {
                        wp.customize.value('evl_custom_content_front_page')(false);
                    }
                }
            }
        });
    });

    wp.customize('evl_widgets_header', function (setting) {
        setting.bind(function (value) {
            console.log(value);
            active_header_widgets(value);
        });
    });
    wp.customize('evl_widgets_num', function (setting) {
        setting.bind(function (value) {
            console.log(value);
            active_footer_widgets(value);
        });
    });
    wp.customize('evl_bootstrap_slider_support', function (setting) {
        setting.bind(function (value) {
            console.log(value);
            var status = 'ACTIVE';
            if (value == false) {
                status = 'INACTIVE';
            }
            jQuery('li.kirki-sortable-item[data-value="bootstrap_slider"] span').html('Bootstrap Slider (' + status + ')');
        });
    });
    wp.customize('evl_parallax_slider_support', function (setting) {
        setting.bind(function (value) {
            console.log(value);
            var status = 'ACTIVE';
            if (value == false) {
                status = 'INACTIVE';
            }
            jQuery('li.kirki-sortable-item[data-value="parallax_slider"] span').html('Parallax Slider (' + status + ')');
        });
    });
    wp.customize('evl_carousel_slider', function (setting) {
        setting.bind(function (value) {
            console.log(value);
            var status = 'ACTIVE';
            if (value == false) {
                status = 'INACTIVE';
            }
            jQuery('li.kirki-sortable-item[data-value="posts_slider"] span').html('Posts Slider (' + status + ')');
        });
    });
});

/*
    Color Schemes
    ======================================= */

var ColorPalettes = {
    baseName: 'evl_options',
    colorpalettesFieldName: 'evl_color_palettes',
    colorpalettesValue: {
        'color_palette_1': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#aaaaaa'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#51545c'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#51545c'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#51545C'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#51545C'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: '#f9f9f9'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#6b6b6b'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#51545c'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#51545c'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#51545c'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#51545c'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#51545c'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#51545c'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#313a43'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: ''},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: ''},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#0d9078'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#fcfcfc'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#0d9078'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#0d9078'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#313a43'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#313a43'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#f4f4f4'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#1d6e72'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#0d9078'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#313a43'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#0d9078'},
        ],
        'color_palette_2': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#4c4c4c'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#4c4c4c'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#727272'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#444444'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: '#474747'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#d4c081'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#f9f9f9'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#f4f4f4'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#f4f4f4'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#9b9b9b'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#f4f4f4'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#f4f4f4'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#d4c081'},
        ],
        'color_palette_3': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#b2b2b2'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: '#474747'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#d4c081'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#a2c43c'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#f9f9f9'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#3d3d3d'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#d6d6d6'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#a2c43c'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#4c4c4c'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#4c4c4c'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#6d6d6d'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#6d6d6d'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#f4f4f4'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#4c4c4c'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#4c4c4c'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#6d6d6d'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#a2c43c'},
        ],
        'color_palette_4': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#242c42'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: '#f5f8fe'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#f7505a'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#444444'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#282c59'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#f7505a'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#fab0ad'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#282c59'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#f7505a'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#f7505a'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#3d3d3d'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#3d3d3d'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#f4f4f4'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#f7505a'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#f7505a'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#3d3d3d'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#f7505a'},
        ],
        'color_palette_5': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#d4c081'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#d4c081'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: '#474747'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#d4c081'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#d1d1d1'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#d4c081'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#d4c081'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#D4C081'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#D4C081'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#f4f4f4'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#D4C081'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#D4C081'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#D4C081'},
        ],
        'color_palette_6': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#4c4c4c'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#bcbcbc'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#4c4c4c'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#666666'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#444444'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: '#474747'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#d4c081'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#0f0f0f'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#273039'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#3d3d3d'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#222222'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#222222'},
        ],
        'color_palette_7': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#ff8d52'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#bcbcbc'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#ff8d52'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#3c4d56'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#3c4d56'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: 'transparent'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#3c4d56'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#f0f0f0'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#f0f0f0'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#ff8d52'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#3c4d56'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#ff8d52'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#ff8d52'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#ff8d52'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#ff8d52'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#ff8d52'},
        ],
        'color_palette_8': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#000000'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#09589e'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#3c4d56'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: 'transparent'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#3c4d56'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#09589e'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#f0f0f0'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#3c4d56'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#09589e'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#09589e'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#09589e'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#09589e'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#09589e'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#09589e'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#09589e'},
        ],
        'color_palette_9': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#444444'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#bcbcbc'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#444444'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#444444'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: 'transparent'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#3c4d56'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#333333'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#f0f0f0'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#171715'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#22b5ce'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#22b5ce'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#22b5ce'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#E0E0E0'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#22b5ce'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#22b5ce'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#22b5ce'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#22b5ce'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#787878'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#22b5ce'},
        ],
        'color_palette_10': [
            {fieldType: 'color', fieldName: 'evl_title_font', fieldValue: '#cbbde2'},
            {fieldType: 'color', fieldName: 'evl_tagline_font', fieldValue: '#aaaaaa'},
            {fieldType: 'color', fieldName: 'evl_menu_blog_title_font', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_menu_font', fieldValue: '#999999'},
            {fieldType: 'color', fieldName: 'evl_widget_title_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_widget_content_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_post_font', fieldValue: '#ffe484'},
            {fieldType: 'color', fieldName: 'evl_content_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_content_box_background_color', fieldValue: '#f9f9f9'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_title_font', fieldValue: '#6b6b6b'},
            {fieldType: 'color', fieldName: 'evl_content_boxes_description_font', fieldValue: '#888888'},
            {fieldType: 'color', fieldName: 'evl_content_h1_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_content_h2_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_content_h3_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_content_h4_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_content_h5_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_content_h6_font', fieldValue: '#bababa'},
            {fieldType: 'color', fieldName: 'evl_header_background_color', fieldValue: '#563d7c'},
            {fieldType: 'color', fieldName: 'evl_header_footer_back_color', fieldValue: '#563d7c'},
            {fieldType: 'color', fieldName: 'evl_menu_back_color', fieldValue: '#232323'},
            {fieldType: 'color', fieldName: 'evl_top_menu_back', fieldValue: '#483667'},
            {fieldType: 'color', fieldName: 'evl_top_menu_hover_font_color', fieldValue: '#ffffff'},
            {fieldType: 'color', fieldName: 'evl_scheme_widgets', fieldValue: '#232323'},
            {fieldType: 'color', fieldName: 'evl_content_background_color', fieldValue: '#232323'},
            {fieldType: 'color', fieldName: 'evl_general_link', fieldValue: '#563d7c'},
            {fieldType: 'color', fieldName: 'evl_secondary_link', fieldValue: '#757575'},
            {fieldType: 'color', fieldName: 'evl_form_bg_color', fieldValue: '#1e1e1e'},
            {fieldType: 'color', fieldName: 'evl_form_text_color', fieldValue: '#c9c9c9'},
            {fieldType: 'color', fieldName: 'evl_form_border_color', fieldValue: '#262626'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_color', fieldValue: '#232323'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_color', fieldValue: '#232323'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_top_hover_color', fieldValue: '#ffe484'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_gradient_bottom_hover_color', fieldValue: '#ffe484'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_color', fieldValue: '#ffe484'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_accent_hover_color', fieldValue: '#563d7c'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_bevel_color', fieldValue: '#ffe484'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_color', fieldValue: '#ffe484'},
            {fieldType: 'color', fieldName: 'evl_shortcode_button_border_hover_color', fieldValue: '#ffe484'},
            {fieldType: 'color', fieldName: 'evl_form_item_color', fieldValue: '#ffe484'},
        ]
    }
    ,
    bind: function () {
        var t = this;
        $(document).on('click', '#input_evl_color_palettes input:checked + label', function (event) {
            event.preventDefault();
        });

        $(document).on('click', '#input_evl_color_palettes input:not(:checked) + label', function (event) {
            event.preventDefault();
            var currentValue = jQuery(this).attr('for');
            currentValue = currentValue.replace('evl_color_palettes', '');
            wp.customize.value('evl_color_palettes')(currentValue);
            if (t.colorpalettesValue.hasOwnProperty(currentValue)) {
                console.log('do changes');
                var cgs = t.colorpalettesValue[currentValue];
                jQuery.each(cgs, function (i, v) {
                    try {
                        if (wp.customize.control(v.fieldName).params.type == 'kirki-typography') {
                            var old_value = wp.customize.value(v.fieldName).get();
                            old_value.color = v.fieldValue;
                            wp.customize.value(v.fieldName)(JSON.stringify(old_value));
                            wp.customize.value(v.fieldName)((old_value));
                        }
                        else {
                            wp.customize.value(v.fieldName)(v.fieldValue);
                        }
                    }
                    catch (err) {
                        console.log(err);
                    }
                })
            }

        });
    }

};

jQuery(document).ready(function ($) {
    ColorPalettes.bind();
    active_header_widgets(wp.customize.value('evl_widgets_header').get());
    active_footer_widgets(wp.customize.value('evl_widgets_num').get());
});