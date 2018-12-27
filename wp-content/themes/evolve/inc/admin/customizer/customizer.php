<?php

/*
    Customizer Setup

    Table of Contents:

    - Init Customizer
    - Main Styles/Scripts To Enqueue
    - Global Customizer Values
    - Default WordPress Customizer Sections (Moved To Bottom)
    - Get List of Categories
    - Number Of WooCommerce Products
    - Old Data Migration (Version 3.3)
    - Fix Data When Convert
    - Convert Framework (Redux => Kirki)
    - Convert Old Theme Options to New Theme Options with Front Page Elements
    - postMessage Support For Website Title and Description
    - Partial Refresh For Website Title
    - Partial Refresh For Website Description
    - Build The Section Class
    - Enqueue Google Fonts on The Front End
    - Font Awesome 4 To 5 Conversion
    - Load The Theme Options


    Init Customizer
    ======================================= */

define( 'EVOLVE_THEME_DIR', plugin_dir_path( __FILE__ ) );
global $evolve_store_customize_controls_array;

if ( is_user_logged_in() ) {
	require get_parent_theme_file_path( '/inc/admin/customizer/render-callback.php' );
	require get_parent_theme_file_path( '/inc/admin/customizer/kirki-framework/kirki.php' );

	Kirki::add_config( 'kirki_evolve_options', array(
		'option_type' => 'theme_mod',
		'capability'  => 'edit_theme_options'
	) );
}

/*
    Main Styles/Scripts To Enqueue
    ======================================= */

if ( ! class_exists( 'evolve_Customizer' ) ) {
	class evolve_Customizer {

		function __construct() {
			add_action( 'customize_controls_enqueue_scripts', array( $this, 'custom_customize_enqueue' ), 9999 );
			add_action( 'customize_controls_print_footer_scripts', array(
				$this,
				'filter_ajax_url_for_customizer_live_preview'
			), 9999 );
		}

		public function filter_ajax_url_for_customizer_live_preview() {
			?>
            <script type="text/javascript">
                if (_wpCustomizeSettings.theme.active == false) {
                    ajaxurl = '<?php echo admin_url( 'admin-ajax.php' ); ?>?customize_changeset_uuid=' + _wpCustomizeSettings.changeset.uuid + '&customize_theme=' + _wpCustomizeSettings.theme.stylesheet;
                }
            </script>
			<?php
		}

		public function custom_customize_enqueue() {
			wp_enqueue_style( 'evolve-customizer-icon', get_template_directory_uri() . '/inc/admin/customizer/assets/fonts/fontastic/styles.min.css', array(), '', 'all' );
			wp_enqueue_style( 'evolve-customizer-css', get_template_directory_uri() . '/inc/admin/customizer/assets/css/customizer.min.css', array(), '', 'all' );
			wp_enqueue_script( 'evolve-customizer-js', get_template_directory_uri() . '/inc/admin/customizer/assets/js/customizer.min.js', array(
				'customize-preview',
				'jquery'
			), '', true );
		}
	}
}

$evolve_Customizer = new evolve_Customizer();

/*
    Global Customizer Values
    ======================================= */

if ( ! function_exists( 'evolve_global_customizer_value' ) ) {
	function evolve_global_customizer_value() {

		/*
            Main Value Definitions
  		    --------------------------------------- */

		$prefix               = "evl";
		$opt_name             = "evl_options";
		$rss_url              = get_bloginfo( 'rss_url' );
		$home_url             = esc_url( "https://theme4press.com/" );
		$support_url          = esc_url( "http://wordpress.org/" );
		$video_url            = esc_url( "https://youtu.be/dgvjt6dJfWM" );
		$customizer_images    = get_template_directory_uri() . '/inc/admin/customizer/assets/images/';
		$frontend_images      = get_template_directory_uri() . '/assets/images/';
		$button_classes       = ".btn, a.btn, button, .button, .widget .button, input#submit, input[type=submit], .post-content a.btn, .carousel-control-button, .woocommerce .button";
		$button_hover_classes = ".btn:hover, a.btn:hover, button:hover, .button:hover, .widget .button:hover, input#submit:hover, input[type=submit]:hover, .carousel-control-button:hover, .header-wrapper .woocommerce-menu .btn:hover";
		$product_taxonomy     = array();

		/*
            Front Page Elements
  		    --------------------------------------- */

		if ( class_exists( 'Woocommerce' ) ) {
			global $wpdb;
			$term_query = "SELECT * from " . $wpdb->prefix . "terms as wpt, " . $wpdb->prefix . "term_taxonomy as wptt where wpt.term_id = wptt.term_id AND wptt.taxonomy = 'product_cat'";
			$terms      = $wpdb->get_results( $term_query );
			if ( $terms ) {
				foreach ( $terms as $term ) {
					$product_taxonomy[ $term->slug ] = $term->name;
				}
			} else {
				$product_taxonomy = array( 'none' => __( 'No categories found', 'evolve' ) );
			}

			$content_area = array(
				'enabled'  => array(
					'blog_post' => esc_attr__( 'Blog/Page Content (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'content_box'         => esc_attr__( 'Content Boxes', 'evolve' ),
					'testimonial'         => esc_attr__( 'Testimonials', 'evolve' ),
					'counter_circle'      => esc_attr__( 'Counter Circles', 'evolve' ),
					'woocommerce_product' => esc_attr__( 'WooCommerce Products', 'evolve' ),
					'custom_content'      => esc_attr__( 'Custom Content', 'evolve' )
				)
			);
		} else {
			$content_area = array(
				'enabled'  => array(
					'blog_post' => esc_attr__( 'Blog/Page Content (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'content_box'    => esc_attr__( 'Content Boxes', 'evolve' ),
					'testimonial'    => esc_attr__( 'Testimonials', 'evolve' ),
					'counter_circle' => esc_attr__( 'Counter Circles', 'evolve' ),
					'custom_content' => esc_attr__( 'Custom Content', 'evolve' ),
				)
			);
		}

		return [
			'prefix'               => $prefix,
			'opt_name'             => $opt_name,
			'rss_url'              => $rss_url,
			'home_url'             => $home_url,
			'support_url'          => $support_url,
			'video_url'            => $video_url,
			'customizer_images'    => $customizer_images,
			'frontend_images'      => $frontend_images,
			'button_classes'       => $button_classes,
			'button_hover_classes' => $button_hover_classes,
			'product_taxonomy'     => $product_taxonomy,
			'content_area'         => $content_area
		];
	}
}

/*
    Default WordPress Customizer Sections (Moved To Bottom)
    ======================================= */

if ( ! function_exists( 'evolve_register_custom_section' ) ) {
	function evolve_register_custom_section( $wp_customize ) {
		$wp_customize->get_section( 'title_tagline' )->priority     = 101;
		$wp_customize->get_section( 'colors' )->priority            = 102;
		$wp_customize->get_section( 'header_image' )->priority      = 103;
		$wp_customize->get_section( 'background_image' )->priority  = 104;
		$wp_customize->get_section( 'static_front_page' )->priority = 105;
	}
}

add_action( 'customize_register', 'evolve_register_custom_section' );

/*
    Get List of Categories
    ======================================= */

if ( ! function_exists( 'evolve_list_categories' ) ) {
	function evolve_list_categories( $taxonomy, $empty_choice = false ) {
		if ( $empty_choice == true ) {
			$post_categories[''] = __( 'Default', 'evolve' );
		}

		$get_categories = get_categories( 'hide_empty=0&taxonomy=' . $taxonomy );

		if ( ! array_key_exists( 'errors', $get_categories ) ) {
			if ( $get_categories && is_array( $get_categories ) ) {
				foreach ( $get_categories as $cat ) {
					$post_categories[ $cat->slug ] = $cat->name;
				}
			}

			if ( isset( $post_categories ) ) {
				return $post_categories;
			}
		}
	}
}

/*
    Number Of WooCommerce Products
    ======================================= */

if ( ! function_exists( 'evolve_woocommerce_product_number' ) ) {
	function evolve_woocommerce_product_number( $range, $all = true, $default = false, $range_start = 1 ) {
		if ( $all ) {
			$number_of_products['-1'] = __( 'All', 'evolve' );
		}

		if ( $default ) {
			$number_of_products[''] = __( 'Default', 'evolve' );
		}

		foreach ( range( $range_start, $range ) as $number ) {
			$number_of_products[ $number ] = $number;
		}

		return $number_of_products;
	}
}

/*
    Old Data Migration (Version 3.3)
    ======================================= */

if ( ! function_exists( 'evolve_convert_33' ) ) {
	function evolve_convert_33() {
		$evolve_global_customizer_value = evolve_global_customizer_value();
		$migrate_done                   = get_option( 'evl_33_migrate', false );
		if ( $migrate_done !== 'done' ) {
			$newData = get_option( 'evl_options', false );
			if ( empty( $newData ) ) {
				$config = get_option( 'evolve' );
				if ( isset( $config['id'] ) ) {
					$oldData = get_option( $config['id'], array() );
					if ( ! empty( $oldData ) ) {
						foreach ( $oldData as $key => $value ) {
							$fontKeys  = array(
								'evl_bootstrap_slide_subtitle_font',
								'evl_bootstrap_slide_title_font',
								'evl_carousel_slide_subtitle_font',
								'evl_carousel_slide_title_font',
								'evl_content_font',
								'evl_content_h1_font',
								'evl_content_h2_font',
								'evl_content_h3_font',
								'evl_content_h4_font',
								'evl_content_h5_font',
								'evl_content_h6_font',
								'evl_menu_font',
								'evl_parallax_slide_subtitle_font',
								'evl_parallax_slide_title_font',
								'evl_post_font',
								'evl_tagline_font',
								'evl_title_font',
								'evl_widget_content_font',
								'evl_widget_title_font',
							);
							$mediaKeys = array(
								'evl_bootstrap_slide1_img',
								'evl_bootstrap_slide2_img',
								'evl_bootstrap_slide3_img',
								'evl_bootstrap_slide4_img',
								'evl_bootstrap_slide5_img',
								'evl_content_background_image',
								'evl_favicon',
								'evl_footer_background_image',
								'evl_header_logo',
								'evl_scheme_background',
								'evl_slide1_img',
								'evl_slide2_img',
								'evl_slide3_img',
								'evl_slide4_img',
								'evl_slide5_img',
								'evl_content_boxes_section_background_image',
								'evl_testimonials_section_background_image',
							);
							// Typography SHIM
							if ( in_array( $key, $fontKeys ) ) {
								if ( isset( $value['size'] ) ) {
									$value['font-size'] = $value['size'];
									unset( $value['size'] );
								}
								if ( isset( $value['face'] ) ) {
									$value['font-family'] = $value['face'];
									unset( $value['face'] );
								}
								if ( isset( $value['style'] ) ) {
									$value['font-style'] = $value['style'];
									unset( $value['style'] );
								}
								$oldData[ $key ] = $value;
							} elseif ( in_array( $key, $mediaKeys ) ) {
								$oldData[ $key ] = array( 'url' => isset( $value ) ? $value : '' );
							}
						}

						update_option( $evolve_global_customizer_value['opt_name'], $oldData );
						update_option( 'evl_33_migrate', 'done' );
					}
				}
			}
		}
	}
}

add_action( 'after_setup_theme', 'evolve_convert_33', 10, 2 );

/*
    Fix Data When Convert
    ======================================= */

if ( ! function_exists( 'evolve_fix_data' ) ) {
	function evolve_fix_data( $value ) {
		$evolve_global_customizer_value = evolve_global_customizer_value();
		$bootstrapsliderKeys            = array(
			'evl_bootstrap_slide1_img',
			'evl_bootstrap_slide2_img',
			'evl_bootstrap_slide3_img',
			'evl_bootstrap_slide4_img',
			'evl_bootstrap_slide5_img',
		);
		$parallaxsliderKeys             = array(
			'evl_slide1_img',
			'evl_slide2_img',
			'evl_slide3_img',
			'evl_slide4_img',
			'evl_slide5_img',
		);

		if ( isset( $key ) && in_array( $key, $bootstrapsliderKeys ) ) {
			$img_name               = basename( $value['url'] );
			$plugin_options[ $key ] = array( 'url' => "{$evolve_global_customizer_value['frontend_images']}bootstrap-slider/{$img_name}" );
		} elseif ( isset( $key ) && in_array( $key, $parallaxsliderKeys ) ) {
			$img_name               = basename( $value['url'] );
			$plugin_options[ $key ] = array( 'url' => "{$evolve_global_customizer_value['frontend_images']}parallax/{$img_name}" );
		} else {
			if ( isset( $key ) && isset( $plugin_options[ $key ] ) && $plugin_options[ $key ] != $value ) {
				$changed_values[ $key ] = $value;
				$plugin_options[ $key ] = $value;
			}
		}
		if ( $value && is_array( $value ) && count( $value ) && isset( $value["disabled"] ) && is_array( $value["disabled"] ) && count( $value["disabled"] ) ) {
			if ( ! isset( $value["enabled"] ) ) {
				$enabled_temp = array();
				if ( isset( $value["disabled"]["blog_post"] ) ) {
					$enabled_temp[] = 'blog_post';
				}

				return $enabled_temp;
			}
		}
		if ( $value && is_array( $value ) && count( $value ) && isset( $value["enabled"] ) && is_array( $value["enabled"] ) && count( $value["enabled"] ) ) {
			$enabled_temp = array();
			foreach ( $value["enabled"] as $enabled_key => $items ) {
				if ( 'placebo' != $enabled_key && 'google_map' != $enabled_key ) {
					$enabled_temp[] = $enabled_key;
				}
			}
			if ( isset( $value["disabled"]["blog_post"] ) ) {
				$enabled_temp[] = 'blog_post';
			}
			$value = $enabled_temp;
		}
		if ( isset( $value['color'] ) && isset( $value['alpha'] ) ) {
			//binbin debug
			return evolve_hex_rgba( $value['color'], $value['alpha'] );
		}

		if ( $value && is_array( $value ) && count( $value ) && isset( $value["url"] ) ) {
			$value = $value["url"];
		}
		if ( $value && is_array( $value ) && count( $value ) && isset( $value["color"] ) ) {
			// $value = $value["color"];
		}
		if ( isset( $value['rgba'] ) ) {
			$value = $value['rgba'];
		}
		if ( isset( $value['font-style'] ) ) {
			$value['variant'] = $value['font-style'];
		}
		if ( isset( $value['padding-top'] ) ) {
			$value['top'] = $value['padding-top'];
		}
		if ( isset( $value['padding-right'] ) ) {
			$value['right'] = $value['padding-right'];
		}
		if ( isset( $value['padding-bottom'] ) ) {
			$value['bottom'] = $value['padding-bottom'];
		}
		if ( isset( $value['padding-left'] ) ) {
			$value['left'] = $value['padding-left'];
		}
		if ( ! is_array( $value ) ) {
			$value = str_replace( 'far fa-', '', $value );
			$value = str_replace( 'fas fa-', '', $value );
			$value = str_replace( 'fa fa-', '', $value );
			$value = str_replace( 'fa-', '', $value );
		}

		return $value;
	}
}

/*
    Convert Framework (Redux => Kirki)
    ======================================= */

if ( is_user_logged_in() ) {

	if ( ! function_exists( 'evolve_convert_framework' ) ) {
		function evolve_convert_framework() {
			$convert_framework = get_option( 'evolve_convert_framework', false );
			if ( $convert_framework == false ) {
				$data_options = get_option( 'evl_options' );
				if ( $data_options ) {
					foreach ( $data_options as $key => $value ) {
						$value = evolve_fix_data( $value );
						set_theme_mod( $key, $value );
					}
				}
				update_option( 'evolve_convert_framework', time() );
			}
		}
	}

	add_action( 'after_setup_theme', 'evolve_convert_framework', 10, 3 );
}

/*
    Convert Old Theme Options to New Theme Options with Front Page Elements
    ======================================= */

if ( is_user_logged_in() && get_option( 'old_new_upgrade_themeoptions', 'false' ) == 'false' ) {
	//homepage and fronpage conditions and get frontpage ID
	$is_homepage  = get_option( 'show_on_front' );
	$frontpage_id = get_option( 'page_on_front' );
	$postspage_id = get_option( 'page_for_posts' );
	//get all theme options
	$evolve_options = get_option( 'evl_options' );

	//get old theme options
	$evolve_layout                  = isset( $evolve_options['evl_layout'] ) ? $evolve_options['evl_layout'] : '2cl';
	$evolve_width_layout            = isset( $evolve_options['evl_width_layout'] ) ? $evolve_options['evl_width_layout'] : 'fixed';
	$evolve_bootstrap_slider        = isset( $evolve_options['evl_bootstrap_slider'] ) ? $evolve_options['evl_bootstrap_slider'] : '';
	$evolve_parallax_slider_support = isset( $evolve_options['evl_parallax_slider_support'] ) ? $evolve_options['evl_parallax_slider_support'] : '';
	$evolve_parallax_slider         = isset( $evolve_options['evl_parallax_slider'] ) ? $evolve_options['evl_parallax_slider'] : '';
	$evolve_carousel_slider         = isset( $evolve_options['evl_carousel_slider'] ) ? $evolve_options['evl_carousel_slider'] : '';
	$evolve_posts_slider            = isset( $evolve_options['evl_posts_slider'] ) ? $evolve_options['evl_posts_slider'] : '';

	//Set Layout of front page
	if ( isset( $frontpage_id ) && $frontpage_id ) {
		$evolve_sidebar_position = get_post_meta( $frontpage_id, 'evolve_sidebar_position', true );
		$evolve_full_width       = get_post_meta( $frontpage_id, 'evolve_full_width', true );

		if ( isset( $evolve_sidebar_position ) && $evolve_sidebar_position ) {
			if ( isset( $evolve_full_width ) && $evolve_full_width == 'yes' && $evolve_sidebar_position == 'default' ) {
				$evolve_options['evl_frontpage_layout'] = '1c';
			} else {
				$evolve_options['evl_frontpage_layout'] = $evolve_sidebar_position;
			}
		} else {
			$evolve_options['evl_frontpage_layout'] = $evolve_layout;
		}
	} else {
		$evolve_options['evl_frontpage_layout'] = $evolve_layout;
	}

	//Set Layout Style of front page
	$evolve_options['evl_frontpage_width_layout'] = $evolve_width_layout;

	//Reset content boxes section settings
	$evolve_options['evl_content_boxes_title']                             = '';
	$evolve_options['evl_content_boxes_section_padding']['padding-top']    = '25px';
	$evolve_options['evl_content_boxes_section_padding']['padding-bottom'] = '25px';
	$evolve_options['evl_content_boxes_section_padding']['padding-left']   = '0';
	$evolve_options['evl_content_boxes_section_padding']['padding-right']  = '0';

	//for bootstrap slider
	switch ( $evolve_bootstrap_slider ) {
		case 'homepage':
			$evolve_options['evl_bootstrap_slider_support'] = '1';
			break;
		case 'post':
			$evolve_options['evl_bootstrap_slider_support'] = '1';
			break;
		case 'all':
			$evolve_options['evl_bootstrap_slider_support'] = '1';
			$evolve_options['evl_bootstrap_slider']         = '1';
			break;
	}

	//for parallax slider
	if ( $evolve_parallax_slider_support == '1' && $evolve_parallax_slider == 'all' ) {
		$evolve_options['evl_parallax_slider'] = '1';
	}

	//for post slider
	if ( $evolve_carousel_slider == '1' && $evolve_posts_slider == 'all' ) {
		$evolve_options['evl_posts_slider'] = '1';
	}

	//set slider on homepage/frontpage
	( $evolve_parallax_slider_support == '1' ) ? $parallaxslider_status = esc_attr__( ' (ACTIVE)', 'evolve' ) : $parallaxslider_status = esc_attr__( ' (INACTIVE)', 'evolve' );
	( $evolve_carousel_slider == '1' ) ? $postslider_status = esc_attr__( ' (ACTIVE)', 'evolve' ) : $postslider_status = esc_attr__( ' (INACTIVE)', 'evolve' );

	$evolve_current_post_slider_position = get_post_meta( $postspage_id, 'evolve_slider_position', true );
	$evolve_current_post_slider_position = get_post_meta( $frontpage_id, 'evolve_slider_position', true );
	$evolve_current_post_slider_position = empty( $evolve_current_post_slider_position ) ? 'default' : $evolve_current_post_slider_position;

	if ( $is_homepage == 'posts' || ( $is_homepage == 'page' && $evolve_current_post_slider_position != 'above' ) ) {
		if ( $evolve_bootstrap_slider == 'homepage' && $evolve_parallax_slider != 'homepage' && $evolve_posts_slider != 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'          => 'placebo',
					'header'           => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
				),
				'disabled' => array(
					'placebo'         => 'placebo',
					'parallax_slider' => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
					'posts_slider'    => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider != 'homepage' && $evolve_parallax_slider == 'homepage' && $evolve_posts_slider != 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'         => 'placebo',
					'header'          => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
					'parallax_slider' => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
				),
				'disabled' => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'posts_slider'     => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider != 'homepage' && $evolve_parallax_slider != 'homepage' && $evolve_posts_slider == 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'      => 'placebo',
					'header'       => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
					'posts_slider' => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				),
				'disabled' => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'parallax_slider'  => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider == 'homepage' && $evolve_parallax_slider == 'homepage' && $evolve_posts_slider != 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'          => 'placebo',
					'header'           => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'parallax_slider'  => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
				),
				'disabled' => array(
					'placebo'      => 'placebo',
					'posts_slider' => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider == 'homepage' && $evolve_parallax_slider != 'homepage' && $evolve_posts_slider == 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'          => 'placebo',
					'header'           => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'posts_slider'     => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				),
				'disabled' => array(
					'placebo'         => 'placebo',
					'parallax_slider' => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider != 'homepage' && $evolve_parallax_slider == 'homepage' && $evolve_posts_slider == 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'         => 'placebo',
					'header'          => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
					'parallax_slider' => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
					'posts_slider'    => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				),
				'disabled' => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
				)
			);
		}
		if ( $evolve_bootstrap_slider == 'homepage' && $evolve_parallax_slider == 'homepage' && $evolve_posts_slider == 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'          => 'placebo',
					'header'           => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'parallax_slider'  => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
					'posts_slider'     => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				),
				'disabled' => array(
					'placebo' => 'placebo',
				)
			);
		}
	}

	if ( $is_homepage == 'page' && $evolve_current_post_slider_position == 'above' ) {
		if ( $evolve_bootstrap_slider == 'homepage' && $evolve_parallax_slider != 'homepage' && $evolve_posts_slider != 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'header'           => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'placebo'         => 'placebo',
					'parallax_slider' => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
					'posts_slider'    => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider != 'homepage' && $evolve_parallax_slider == 'homepage' && $evolve_posts_slider != 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'         => 'placebo',
					'parallax_slider' => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
					'header'          => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'posts_slider'     => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider != 'homepage' && $evolve_parallax_slider != 'homepage' && $evolve_posts_slider == 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'      => 'placebo',
					'posts_slider' => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
					'header'       => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'parallax_slider'  => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider == 'homepage' && $evolve_parallax_slider == 'homepage' && $evolve_posts_slider != 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'parallax_slider'  => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
					'header'           => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'placebo'      => 'placebo',
					'posts_slider' => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider == 'homepage' && $evolve_parallax_slider != 'homepage' && $evolve_posts_slider == 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'posts_slider'     => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
					'header'           => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'placebo'         => 'placebo',
					'parallax_slider' => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
				)
			);
		}
		if ( $evolve_bootstrap_slider != 'homepage' && $evolve_parallax_slider == 'homepage' && $evolve_posts_slider == 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'         => 'placebo',
					'parallax_slider' => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
					'posts_slider'    => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
					'header'          => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
				)
			);
		}
		if ( $evolve_bootstrap_slider == 'homepage' && $evolve_parallax_slider == 'homepage' && $evolve_posts_slider == 'homepage' ) {
			$evolve_options['evl_front_elements_header_area'] = array(
				'enabled'  => array(
					'placebo'          => 'placebo',
					'bootstrap_slider' => esc_attr__( 'Bootstrap Slider (ACTIVE)', 'evolve' ),
					'parallax_slider'  => esc_attr__( 'Parallax Slider', 'evolve' ) . $parallaxslider_status,
					'posts_slider'     => esc_attr__( 'Posts Slider', 'evolve' ) . $postslider_status,
					'header'           => esc_attr__( 'Header (REORDER ONLY)', 'evolve' ),
				),
				'disabled' => array(
					'placebo' => 'placebo',
				)
			);
		}
	}

	update_option( 'evl_options', $evolve_options );
	update_option( 'old_new_upgrade_themeoptions', 'true' );
}


/*
    postMessage Support For Website Title and Description
    ======================================= */

if ( ! function_exists( 'evolve_postmessage_default' ) ) {
	function evolve_postmessage_default( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '#website-title a',
			'render_callback' => 'evolve_refresh_website_title',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '#tagline',
			'render_callback' => 'evolve_refresh_website_description',
		) );
	}
}

add_action( 'customize_register', 'evolve_postmessage_default', 10, 3 );

/*
    Partial Refresh For Website Title
    ======================================= */

if ( ! function_exists( 'evolve_refresh_website_title' ) ) {
	function evolve_refresh_website_title() {
		bloginfo( 'name' );
	}
}

/*
    Partial Refresh For Website Description
    ======================================= */

if ( ! function_exists( 'evolve_refresh_website_description' ) ) {
	function evolve_refresh_website_description() {
		bloginfo( 'description' );
	}
}

/*
    Build The Section Class
    ======================================= */

global $evolve_customizer_sections, $evolve_customizer_fields;
$evolve_panel             = '';
$evolve_index_control     = 0;
$evolve_customizer_fields = array();

if ( ! class_exists( 'evolve_Kirki' ) ) {
	class evolve_Kirki {
		static function setSection( $param1, $param2 ) {
			if ( true || isset( $_REQUEST['evolve_write_json_configs'] ) ) {
				if ( true || is_user_logged_in() ) {
					global $evolve_panel, $evolve_index_control, $evolve_customizer_sections;
					$evolve_index_control ++;
					if ( isset( $param2['iconfix'] ) && ! empty( $param2['iconfix'] ) ) {
						$param2['icon'] = $param2['iconfix'];
					}
					if ( isset( $param2['fields'] ) && is_array( $param2['fields'] ) && count( $param2['fields'] ) ) {
						if ( ! isset( $param2['subsection'] ) ) {
							$evolve_panel = $param2['id'];
							if ( is_user_logged_in() && is_customize_preview() ) {
								Kirki::add_section( $param2['id'], array(
									'title'    => $param2['title'],
									'priority' => $evolve_index_control,
									'icon'     => isset( $param2['icon'] ) ? $param2['icon'] : '',
								) );
								$evolve_customizer_sections[] = array(
									'type' => 'add_section',
									'id'   => $param2['id'],
									'args' => array(
										'title'    => $param2['title'],
										'priority' => $evolve_index_control,
										'icon'     => isset( $param2['icon'] ) ? $param2['icon'] : '',
									)
								);
							}
						} else {
							if ( is_user_logged_in() && is_customize_preview() ) {
								Kirki::add_section( $param2['id'], array(
									'title'    => $param2['title'],
									'panel'    => $evolve_panel,
									'priority' => $evolve_index_control,
									'icon'     => isset( $param2['icon'] ) ? $param2['icon'] : '',
								) );
								$evolve_customizer_sections[] = array(
									'type' => 'add_section',
									'id'   => $param2['id'],
									'args' => array(
										'title'    => $param2['title'],
										'panel'    => $evolve_panel,
										'priority' => $evolve_index_control,
										'icon'     => isset( $param2['icon'] ) ? $param2['icon'] : '',
									)
								);
							}
						}
						evolve_Kirki::call_kirki_from_old_field( $param2['fields'], $param2['id'] );
					} else {
						$evolve_panel = $param2['id'];
						if ( is_user_logged_in() && is_customize_preview() ) {
							Kirki::add_panel( $param2['id'], array(
								'title'    => $param2['title'],
								'priority' => $evolve_index_control,
								'icon'     => $param2['icon'],
							) );
							$evolve_customizer_sections[] = array(
								'type' => 'add_panel',
								'id'   => $param2['id'],
								'args' => array(
									'title'    => $param2['title'],
									'priority' => $evolve_index_control,
									'icon'     => $param2['icon'],
								)
							);
						}
					}
				}
			}
		}

		static function google_webfont_url( $fonts ) {
			$link    = "";
			$subsets = array();
			if ( $fonts ) {
				foreach ( $fonts as $family => $font ) {
					// if( !isset($font['google']) || $font['google'] != 1 ){
					// continue;
					// }
					if ( ! isset( $font['font-family'] ) || $font['font-family'] == '' ) {
						continue;
					}
					$family = $font['font-family'];
					if ( ( $link != "" ) ) {
						$link .= "|"; // Append a new font to the string
					}
					$link .= $family;

					// if ( isset( $font['font-style'] ) && ( $font['font-style'] != '' ) ) {
					// $link .= ':'.$font['font-style'];
					// }
					if ( isset( $font['font-weight'] ) && ( $font['font-weight'] != '' ) ) {
						$link .= ':' . $font['font-weight'];
					}
					if ( isset( $font['variant'] ) && ( $font['variant'] != '' ) ) {
						$link .= ':' . $font['variant'];
					}

					if ( isset( $font['subset'] ) ) {
						foreach ( $font['subset'] as $subset ) {
							if ( ! in_array( $subset, $subsets ) ) {
								array_push( $subsets, $subset );
							}
						}
					}
				}

				if ( isset( $subsets ) && count( $subsets ) ) {
					$link .= "&subset=" . implode( ',', $subsets );
				}
			}

			return '//fonts.googleapis.com/css?family=' . str_replace( '|', '|', $link );
		}

		static function call_kirki_from_old_field( $array_items, $section = 'kirki_frontpage-content-boxes-tab', $setting = 'kirki_evolve_options' ) {
			global $evolve_customizer_fields, $evolve_list_google_fonts;
			foreach ( $array_items as $value ) {
				if (
					isset( $value['type'] ) && (
						$value['type'] == 'text'
						|| $value['type'] == 'radio'
						|| $value['type'] == 'select'
						|| $value['type'] == 'checkbox'
						|| $value['type'] == 'textarea'
						|| $value['type'] == 'editor'
						|| $value['type'] == 'fontawesome'
						|| $value['type'] == 'switch'
						|| $value['type'] == 'slider'
						|| $value['type'] == 'spinner'
						|| $value['type'] == 'sorter'
						|| $value['type'] == 'color'
						|| $value['type'] == 'typography'
						|| $value['type'] == 'media'
						|| $value['type'] == 'image_select'
						|| $value['type'] == 'info'
						|| $value['type'] == 'palette'
						|| $value['type'] == 'spacing'
						|| $value['type'] == 'color_rgba'
					) ) {
					$value_temp = array(
						'type'        => $value['type'],
						'settings'    => $value['id'],
						'label'       => isset( $value['title'] ) ? $value['title'] : ' ',
						'description' => isset( $value['subtitle'] ) ? $value['subtitle'] : ' ',
						'section'     => $section,
						'default'     => isset( $value['default'] ) ? $value['default'] : null,
						'priority'    => 10,
					);
					if ( 'typography' == $value['type'] && ! is_customize_preview() ) {
						$evolve_list_google_fonts[] = evolve_theme_mod( $value['id'], $value['default'] );
					}

					if ( isset( $value['default'] ) ) {
						$value_temp['default'] = $value['default'];
						if ( isset( $value_temp['default']['font-style'] ) ) {
							$value_temp['default']['variant'] = $value_temp['default']['font-style'];
						}
						if ( isset( $value_temp['default']['padding-top'] ) ) {
							$value_temp['default']['top'] = $value_temp['default']['padding-top'];
							unset( $value_temp['default']['units'] );
							unset( $value_temp['default']['padding-top'] );
						}
						if ( isset( $value_temp['default']['padding-right'] ) ) {
							$value_temp['default']['right'] = $value_temp['default']['padding-right'];
							unset( $value_temp['default']['padding-right'] );
						}
						if ( isset( $value_temp['default']['padding-bottom'] ) ) {
							$value_temp['default']['bottom'] = $value_temp['default']['padding-bottom'];
							unset( $value_temp['default']['padding-bottom'] );
						}
						if ( isset( $value_temp['default']['padding-left'] ) ) {
							$value_temp['default']['left'] = $value_temp['default']['padding-left'];
							unset( $value_temp['default']['padding-left'] );
						}
						if ( ! is_array( $value['default'] ) ) {
							$value_temp['default'] = str_replace( 'fas fa-', '', $value_temp['default'] );
							$value_temp['default'] = str_replace( 'far fa-', '', $value_temp['default'] );
							$value_temp['default'] = str_replace( 'fa fa-', '', $value_temp['default'] );
							$value_temp['default'] = str_replace( 'fa-', '', $value_temp['default'] );
						}
					}
					if ( isset( $value['type'] ) && $value['type'] == 'select' ) {
						if ( isset( $value['multi'] ) && $value['multi'] == true ) {
							$value_temp['multiple'] = 999;
						}
					}
					if ( isset( $value['type'] ) && $value['type'] == 'palette' ) {
						if ( isset( $value['palettes'] ) && $value['palettes'] == true ) {
							$value_temp['choices'] = $value['palettes'];
						}
					}
					if ( isset( $value['type'] ) && $value['type'] == 'media' ) {
						$value_temp['type'] = 'image';
					}
					if ( isset( $value['type'] ) && $value['type'] == 'info' ) {
						$value_temp['type'] = 'custom';
					}
					if ( isset( $value['type'] ) && $value['type'] == 'image_select' ) {
						$value_temp['type'] = 'radio-image';
					}
					if ( isset( $value['type'] ) && $value['type'] == 'color_rgba' ) {
						$value_temp['type'] = 'color';
						if ( isset( $value['default']['color'] ) ) {
							$value_temp['default']          = evolve_hex_rgba( $value['default']['color'], $value['default']['alpha'] );
							$value_temp['choices']['alpha'] = true;
						}
					}
					if ( isset( $value['type'] ) && $value['type'] == 'slider' ) {
						$value_temp['choices'] = array(
							'min'  => isset( $value['min'] ) ? $value['min'] : 0,
							'max'  => isset( $value['max'] ) ? $value['max'] : 9999,
							'step' => isset( $value['step'] ) ? $value['step'] : 1,
						);
					}
					if ( isset( $value['type'] ) && $value['type'] == 'spinner' ) {
						$value_temp['type'] = 'number';
						if ( isset( $value['min'] ) ) {
							$value_temp['choices']['min'] = $value['min'];
						}
						if ( isset( $value['max'] ) ) {
							$value_temp['choices']['max'] = $value['max'];
						}
						if ( isset( $value['step'] ) ) {
							$value_temp['choices']['step'] = $value['step'];
						}
					}
					if ( isset( $value['class'] ) && $value['class'] == 'iconpicker-icon' ) {
						$value_temp['type'] = 'fontawesome';
					}
					if ( isset( $value['desc'] ) ) {
						$value_temp['description'] = $value['desc'];
					}
					if ( isset( $value['required'] ) && is_array( $value['required'] ) ) {
						$active_callback = array();
						if ( count( $value['required'] ) ) {
							foreach ( $value['required'] as $required ) {
								if ( isset( $required[2] ) && $required[2] == '=' ) {
									$required[2] = '==';
								}
								$active_callback[] = array(
									'setting'  => $required[0],
									'operator' => $required[1],
									'value'    => $required[2]
								);

							}
							$value_temp['active_callback'] = $active_callback;
						}
					}
					if ( isset( $value['options'] ) ) {
						$value_temp['choices'] = $value['options'];
					}
					if ( $value['type'] == 'sorter' ) {
						$value_temp['type'] = 'sortable';
						$choices_array      = $value["options"]['disabled'];
						if ( isset( $value["options"]['enabled'] ) && is_array( $value["options"]['enabled'] ) && count( $value["options"]['enabled'] ) ) {
							$value_temp['default'] = array();
							foreach ( $value["options"]['enabled'] as $default_key => $default_value ) {
								if ( $default_key != 'placebo' ) {
									$value_temp['default'][]       = $default_key;
									$choices_array[ $default_key ] = $default_value;
								}
							}
						}
						if ( $choices_array && is_array( $choices_array ) && isset( $choices_array['placebo'] ) ) {
							unset( $choices_array['placebo'] );
						}
						$value_temp['choices'] = $choices_array;
					}
					if ( $value['type'] == 'switch' ) {
						$value_temp['choices'] = array(
							'on'  => isset( $value['on'] ) ? $value['on'] : esc_attr__( 'Enabled', 'evolve' ),
							'off' => isset( $value['off'] ) ? $value['off'] : esc_attr__( 'Disabled', 'evolve' ),
						);
					}

					if ( isset( $value['selector'] ) ) {
						$value_temp['partial_refresh'] = array(
							$value['id'] => array(
								'selector'        => $value['selector'],
								'render_callback' => 'evolve_get_render_callback'
							)
						);
					}
					if ( isset( $value['transport'] ) ) {
						$value_temp['transport'] = $value['transport'];
					}
					if ( isset( $value['js_vars'] ) ) {
						$value_temp['js_vars'] = $value['js_vars'];
					}
					if ( isset( $value['input_attrs'] ) ) {
						$value_temp['input_attrs']['placeholder'] = $value['input_attrs'];
					} else {
						if ( $value_temp['type'] == 'text' || $value_temp['type'] == 'textarea' || $value_temp['type'] == 'editor' ) {
							if ( isset( $value_temp['default'] ) ) {
								$value_temp['input_attrs']['placeholder'] = $value_temp['default'];
							}
						}
					}
					$evolve_customizer_fields[ $value['id'] ] = array(
						'value'      => $value,
						'value_temp' => $value_temp,
					);
					if ( is_user_logged_in() && is_customize_preview() ) {
						Kirki::add_field( $setting, $value_temp );
					}
				}
			}
		}
	}
}

/*
    Enqueue Google Fonts on The Front End
    ======================================= */

if ( ! is_customize_preview() ) {

	if ( ! function_exists( 'evolve_enqueue_google_fonts' ) ) {
		function evolve_enqueue_google_fonts() {
			$protocol = is_ssl() ? "https:" : "http:";
			global $evolve_list_google_fonts;
			wp_register_style( 'evolve-google-fonts', $protocol . evolve_Kirki::google_webfont_url( $evolve_list_google_fonts ), '' );
			wp_enqueue_style( 'evolve-google-fonts' );
		}
	}

	add_action( 'get_footer', 'evolve_enqueue_google_fonts' );
}

/*
    Font Awesome 4 To 5 Conversion
    ======================================= */

require get_parent_theme_file_path( '/inc/admin/customizer/font-awesome-v4-shims.php' );

/*
    Load The Theme Options
    ======================================= */

if ( ! function_exists( 'evolve_load_the_theme_options' ) ) {
	function evolve_load_the_theme_options() {
		$my_theme = wp_get_theme();
		if ( $my_theme->exists() ) {
			if ( $my_theme->get( 'Name' ) == 'evolve' ) {
				update_option( 'old_evolve_theme_mod', get_stylesheet() );
			} else {
				if ( $my_theme->get( 'Name' ) == 'evolve Plus' ) {
					$is_update_from_evolve_free = get_option( 'is_update_from_evolve_free', false );
					if ( $is_update_from_evolve_free == false ) {
						$old_evolve_theme_mods = get_option( 'theme_mods_' . get_option( 'old_evolve_theme_mod', 'evolve' ), false );
						if ( $old_evolve_theme_mods ) {
							update_option( 'theme_mods_' . get_stylesheet(), $old_evolve_theme_mods );
							update_option( 'is_update_from_evolve_free', time() );
						}
					}
				}
			}
		}
		if ( is_admin() || isset( $_REQUEST['evolve_write_json_configs'] ) ) {
			require get_parent_theme_file_path( '/inc/admin/customizer/customizer-options.php' );
			evolve_customizer_options();
			if ( is_customize_preview() ) {
				evolve_write_json_configs();
			}
		} else {
			evolve_get_controls_from_json();
			if ( is_customize_preview() ) {
				evolve_call_customize_register();
			}
		}
	}
}
add_action( 'init', 'evolve_load_the_theme_options', 10 );

if ( ! function_exists( 'evolve_write_json_configs' ) ) {
	function evolve_write_json_configs() {
		global $evolve_list_google_fonts, $evolve_customizer_sections, $evolve_customizer_fields;
		$global_value = evolve_global_customizer_value();

		global $wp_filesystem;
		// Initialize the WP filesystem, no more using 'file-put-contents' function
		if ( empty( $wp_filesystem ) ) {
			require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}

		$theme_path = str_replace( ABSPATH, $wp_filesystem->abspath(), EVOLVE_THEME_DIR );

		$store_customize_controls = array(
			'global_value'               => $global_value,
			'evolve_customizer_sections' => $evolve_customizer_sections,
			'evolve_customizer_fields'   => $evolve_customizer_fields,
		);
		$wp_filesystem->put_contents(
			$theme_path . '/customizer-controls.json',
			json_encode( $store_customize_controls ),
			FS_CHMOD_FILE // predefined mode settings for WP files
		);
	}
}

if ( ! function_exists( 'evolve_get_controls_from_json' ) ) {
	function evolve_get_controls_from_json() {
		global $evolve_store_customize_controls_array, $evolve_customizer_fields, $evolve_list_google_fonts, $wp_filesystem;
		// Initialize the WP filesystem, no more using 'file-put-contents' function
		if ( empty( $wp_filesystem ) ) {
			require_once wp_normalize_path( ABSPATH . '/wp-admin/includes/file.php' );
			WP_Filesystem();
		}
		$theme_path = str_replace( ABSPATH, $wp_filesystem->abspath(), EVOLVE_THEME_DIR );
		ob_start();
		$json_path = wp_normalize_path( $theme_path . '/customizer-controls.json' );
		include $json_path;
		$store_customize_controls = ob_get_clean();
		//set json_decode(string, true) to get array not object
		$evolve_store_customize_controls_array = json_decode( $store_customize_controls, true );
		$evolve_customizer_fields              = $evolve_store_customize_controls_array['evolve_customizer_fields'];
		if ( $evolve_customizer_fields ) {
			if ( ! is_admin() ) {
				foreach ( $evolve_customizer_fields as $field ) {
					if ( 'typography' == $field['value_temp']['type'] ) {
						$evolve_list_google_fonts[] = evolve_theme_mod( $field['value']['id'], $field['value_temp']['default'] );
					}
				}
			}
		}
	}
}

if ( ! function_exists( 'evolve_call_customize_register' ) ) {
	function evolve_call_customize_register() {
		global $evolve_store_customize_controls_array;
		$global_value               = evolve_global_customizer_value();
		$evolve_customizer_fields   = $evolve_store_customize_controls_array['evolve_customizer_fields'];
		$evolve_customizer_sections = $evolve_store_customize_controls_array['evolve_customizer_sections'];
		if ( $evolve_customizer_fields && is_array( $evolve_customizer_fields ) && count( $evolve_customizer_fields ) ) {
			if ( $evolve_customizer_sections && is_array( $evolve_customizer_sections ) && count( $evolve_customizer_sections ) ) {
				foreach ( $evolve_customizer_sections as $section ) {
					if ( 'add_panel' == $section['type'] ) {
						//kirki add panel
						Kirki::add_panel( $section['id'], $section['args'] );
					} else {
						//kirki add section
						Kirki::add_section( $section['id'], $section['args'] );
					}
				}
			}
			foreach ( $evolve_customizer_fields as $field ) {
				//kirki add field
				Kirki::add_field( 'kirki_evolve_options', $field['value_temp'] );
			}
		}
	}
}

if ( ! class_exists( 'evolve_upgrade_button' ) ) {
	class evolve_upgrade_button {

		function __construct() {
			add_action( 'customize_controls_print_footer_scripts', array(
				$this,
				'add_upgrade_customizer'
			), 9999 );
		}

		public function add_upgrade_customizer() { ?>
            <script type="text/javascript">
                (function ($) {
                    "use strict";
                    var upgrade = $('<a class="evolve-upgrade-button"></a>')
                        .attr('href', '<?php echo esc_url( 'https://theme4press.com/evolve-multipurpose-wordpress-theme/?utm_source=evolve-customizer&utm_medium=customizer-top-link&utm_campaign=theme-customizer' ); ?>')
                        .attr('target', '_blank')
                        .text('<?php _e( 'Upgrade to premium', 'evolve' ); ?>');
                    setTimeout(function () {
                        $('.preview-notice').append(upgrade);
                        $('.customize-panel-back').css('height', '97px');
                    }, 200);
                })(jQuery);
            </script>
			<?php
		}
	}
}
$evolve_upgrade_button = new evolve_upgrade_button();