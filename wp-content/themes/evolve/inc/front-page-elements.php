<?php

/*
    Bootstrap Slider
    ======================================= */

if ( ! function_exists( 'evolve_frontpage_bootstrap_slider' ) ) {
	function evolve_frontpage_bootstrap_slider() {
		if ( ( evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == "1" && is_front_page() ) || ( evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == "1" && is_home() ) ):
			if ( evolve_theme_mod( 'evl_bootstrap_slider_support', '0' ) == "1" ):
				if ( evolve_theme_mod( "evl_bootstrap_slide1", '0' ) == false && evolve_theme_mod( "evl_bootstrap_slide2", '0' ) == false && evolve_theme_mod( "evl_bootstrap_slide3", '0' ) == false && evolve_theme_mod( "evl_bootstrap_slide4", '0' ) == false && evolve_theme_mod( "evl_bootstrap_slide5", '0' ) == false && is_user_logged_in() && is_customize_preview() ) {
					echo '<h3 class="no-content no-bootstrap-slider py-5 text-center d-block">' . __( 'Bootstrap Slider will be displayed here', 'evolve' ) . ' <span class="badge badge-pill badge-secondary">' . __( 'Add slides', 'evolve' ) . '</span></h3>';
				}
				evolve_bootstrap();
			endif;
		endif;
	}
}

/*
    Parallax Slider
    ======================================= */

if ( ! function_exists( 'evolve_frontpage_parallax_slider' ) ) {
	function evolve_frontpage_parallax_slider() {
		if ( ( evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == "1" && is_front_page() ) || ( evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == "1" && is_home() ) ):
			if ( evolve_theme_mod( 'evl_parallax_slider_support', '0' ) == "1" ):
				if ( evolve_theme_mod( "evl_show_slide1", '0' ) == false && evolve_theme_mod( "evl_show_slide2", '0' ) == false && evolve_theme_mod( "evl_show_slide3", '0' ) == false && evolve_theme_mod( "evl_show_slide4", '0' ) == false && evolve_theme_mod( "evl_show_slide5", '0' ) == false && is_user_logged_in() && is_customize_preview() ) {
					echo '<h3 class="no-content no-parallax-slider py-5 text-center d-block">' . __( 'Parallax Slider will be displayed here', 'evolve' ) . ' <span class="badge badge-pill badge-secondary">' . __( 'Add slides', 'evolve' ) . '</span></h3>';
				}
				evolve_parallax();
			endif;
		endif;
	}
}

/*
    Posts Slider
    ======================================= */

if ( ! function_exists( 'evolve_frontpage_post_slider' ) ) {
	function evolve_frontpage_post_slider() {
		$post_on = evolve_theme_mod( 'evl_carousel_slider', '1' );
		if ( ( $post_on == "1" && is_front_page() ) || ( $post_on == "1" && is_home() ) ):
			$carousel_slider = evolve_theme_mod( 'evl_carousel_slider', '1' );
			if ( $carousel_slider == "1" ):
				evolve_posts_slider();
			endif;
		endif;
	}
}

/*
    Content Boxes
    ======================================= */

if ( ! function_exists( 'evolve_content_boxes' ) ) {
	function evolve_content_boxes() {
		$content_box1_enable = evolve_theme_mod( 'evl_content_box1_enable', '0' );
		if ( $content_box1_enable === false ) {
			$content_box1_enable = '';
		}
		$content_box2_enable = evolve_theme_mod( 'evl_content_box2_enable', '0' );
		if ( $content_box2_enable === false ) {
			$content_box2_enable = '';
		}
		$content_box3_enable = evolve_theme_mod( 'evl_content_box3_enable', '0' );
		if ( $content_box3_enable === false ) {
			$content_box3_enable = '';
		}
		$content_box4_enable = evolve_theme_mod( 'evl_content_box4_enable', '0' );
		if ( $content_box4_enable === false ) {
			$content_box4_enable = '';
		}
		$BoxCount = 0;
		if ( $content_box1_enable == true ) {
			$BoxCount ++;
		}
		if ( $content_box2_enable == true ) {
			$BoxCount ++;
		}
		if ( $content_box3_enable == true ) {
			$BoxCount ++;
		}
		if ( $content_box4_enable == true ) {
			$BoxCount ++;
		}
		switch ( $BoxCount ):
			case $BoxCount == 1:
				$BoxClass = 'col';
				break;
			case $BoxCount == 2:
				$BoxClass = 'col-sm-12 col-md-6';
				break;
			case $BoxCount == 3:
				$BoxClass = 'col-sm-12 col-lg-4';
				break;
			case $BoxCount == 4:
				$BoxClass = 'col-sm-12 col-md-6 col-lg-3';
				break;
			default:
				$BoxClass = ' col-md-3';
		endswitch;
		echo "<div class='home-content-boxes'><div class='container'>";
		$content_box_section_title = evolve_theme_mod( 'evl_content_boxes_title', '' );

		if ( evolve_theme_mod( 'evl_content_boxes_title', '' ) == '' && $content_box1_enable == false && $content_box2_enable == false && $content_box3_enable == false && $content_box4_enable == false && is_user_logged_in() && is_customize_preview() ) {
			echo '<h3 class="no-content text-center d-block">' . __( 'Content boxes element will be displayed here', 'evolve' ) . ' <span class="badge badge-pill badge-secondary">' . __( 'Edit', 'evolve' ) . '</span></h3>';
		}

		if ( evolve_theme_mod( 'evl_content_boxes_title', '' ) ) {
			$content_box_section_title = '<div class="col-12"><h3 class="content-box-section-title section-title">' . evolve_theme_mod( 'evl_content_boxes_title', '' ) . '</h3></div>';
		}

		echo "<div class='row'>" . $content_box_section_title . "<div class='card-deck mb-0 mb-lg-3'>";

		$content_box1_title = evolve_theme_mod( 'evl_content_box1_title', '' );
		if ( $content_box1_title === false ) {
			$content_box1_title = '';
		}
		$content_box1_desc = evolve_theme_mod( 'evl_content_box1_desc', '' );
		if ( $content_box1_desc === false ) {
			$content_box1_desc = '';
		}
		$content_box1_button = evolve_theme_mod( 'evl_content_box1_button', '' );
		if ( $content_box1_button === false ) {
			$content_box1_button = '';
		}
		$content_box1_icon = evolve_theme_mod( 'evl_content_box1_icon', '' );
		if ( $content_box1_icon === false ) {
			$content_box1_icon = '';
		}
		if ( $content_box1_enable == true ) {
			echo "<div class='$BoxClass content-box content-box-1'><div class='card text-center mb-4 mb-lg-0 w-100'><div class='card-img-top'><i class='" . $content_box1_icon . "'></i></div>";
			echo "<div class='card-body'>";
			echo "<h5 class='card-title'>" . esc_attr( $content_box1_title ) . "</h5>";
			echo "<p class='card-text'>" . do_shortcode( $content_box1_desc ) . "</p>";
			echo "</div><div class='card-footer'>" . do_shortcode( $content_box1_button ) . "</div>";
			echo "</div></div>";
		}
		$content_box2_title = evolve_theme_mod( 'evl_content_box2_title', '' );
		if ( $content_box2_title === false ) {
			$content_box2_title = '';
		}
		$content_box2_desc = evolve_theme_mod( 'evl_content_box2_desc', '' );
		if ( $content_box2_desc === false ) {
			$content_box2_desc = '';
		}
		$content_box2_button = evolve_theme_mod( 'evl_content_box2_button', '' );
		if ( $content_box2_button === false ) {
			$content_box2_button = '';
		}
		$content_box2_icon = evolve_theme_mod( 'evl_content_box2_icon', '' );
		if ( $content_box2_icon === false ) {
			$content_box2_icon = '';
		}
		if ( $content_box2_enable == true ) {
			echo "<div class='$BoxClass content-box content-box-2'><div class='card text-center mb-4 mb-lg-0 w-100'><div class='card-img-top'><i class='" . $content_box2_icon . "'></i></div>";
			echo "<div class='card-body'>";
			echo "<h5 class='card-title'>" . esc_attr( $content_box2_title ) . "</h5>";
			echo "<p class='card-text'>" . do_shortcode( $content_box2_desc ) . "</p>";
			echo "</div><div class='card-footer'>" . do_shortcode( $content_box2_button ) . "</div>";
			echo "</div></div>";
		}
		$content_box3_title = evolve_theme_mod( 'evl_content_box3_title', '' );
		if ( $content_box3_title === false ) {
			$content_box3_title = '';
		}
		$content_box3_desc = evolve_theme_mod( 'evl_content_box3_desc', '' );
		if ( $content_box3_desc === false ) {
			$content_box3_desc = '';
		}
		$content_box3_button = evolve_theme_mod( 'evl_content_box3_button', '' );
		if ( $content_box3_button === false ) {
			$content_box3_button = '';
		}
		$content_box3_icon = evolve_theme_mod( 'evl_content_box3_icon', '' );
		if ( $content_box3_icon === false ) {
			$content_box3_icon = '';
		}
		if ( $content_box3_enable == true ) {
			echo "<div class='$BoxClass content-box content-box-3'><div class='card text-center mb-4 mb-lg-0 w-100'><div class='card-img-top'><i class='" . $content_box3_icon . "'></i></div>";
			echo "<div class='card-body'>";
			echo "<h5 class='card-title'>" . esc_attr( $content_box3_title ) . "</h5>";
			echo "<p class='card-text'>" . do_shortcode( $content_box3_desc ) . "</p>";
			echo "</div><div class='card-footer'>" . do_shortcode( $content_box3_button ) . "</div>";
			echo "</div></div>";
		}
		$content_box4_title = evolve_theme_mod( 'evl_content_box4_title', '' );
		if ( $content_box4_title === false ) {
			$content_box4_title = '';
		}
		$content_box4_desc = evolve_theme_mod( 'evl_content_box4_desc', '' );
		if ( $content_box4_desc === false ) {
			$content_box4_desc = '';
		}
		$content_box4_button = evolve_theme_mod( 'evl_content_box4_button', '' );
		if ( $content_box4_button === false ) {
			$content_box4_button = '';
		}
		$content_box4_icon = evolve_theme_mod( 'evl_content_box4_icon', '' );
		if ( $content_box4_icon === false ) {
			$content_box4_icon = '';
		}
		if ( $content_box4_enable == true ) {
			echo "<div class='$BoxClass content-box content-box-4'><div class='card text-center mb-4 mb-lg-0 w-100'><div class='card-img-top'><i class='" . $content_box4_icon . "'></i></div>";
			echo "<div class='card-body'>";
			echo "<h5 class='card-title'>" . esc_attr( $content_box4_title ) . "</h5>";
			echo "<p class='card-text'>" . do_shortcode( $content_box4_desc ) . "</p>";
			echo "</div><div class='card-footer'>" . do_shortcode( $content_box4_button ) . "</div>";
			echo "</div></div>";
		}
		echo "</div></div></div></div>";
	}
}

/*
    Testimonials
    ======================================= */

if ( ! function_exists( 'evolve_testimonials' ) ) {
	function evolve_testimonials() {
		$html                 = '';
		$testimonials_counter = 0;

		echo "<div class='home-testimonials'><div class='container'>";
		$testimonials_section_title = evolve_theme_mod( 'evl_testimonials_title', '' );

		if ( evolve_theme_mod( 'evl_testimonials_title', '' ) == '' && evolve_theme_mod( "evl_fp_testimonial1", '0' ) != 1 && evolve_theme_mod( "evl_fp_testimonial2", '0' ) != 1 && is_user_logged_in() && is_customize_preview() ) {
			echo '<h3 class="no-content text-center d-block">' . __( 'Testimonials element will be displayed here', 'evolve' ) . ' <span class="badge badge-pill badge-secondary">' . __( 'Edit', 'evolve' ) . '</span></h3>';
		}

		if ( evolve_theme_mod( 'evl_testimonials_title', '' ) ) {
			$testimonials_section_title = '<div class="col-12"><h3 class="testimonials-section-title section-title">' . evolve_theme_mod( 'evl_testimonials_title', '' ) . '</h3></div>';
		}
		echo "<div class='row'>" . $testimonials_section_title . "<div class='col-12'><div class='carousel slide carousel-fade' data-ride='carousel'><div class='carousel-inner'>";

		for ( $i = 1; $i <= 2; $i ++ ) {
			$active  = "";
			$enabled = evolve_theme_mod( "evl_fp_testimonial{$i}", '0' );
			if ( $enabled == 1 ) {
				$name   = evolve_theme_mod( "evl_fp_testimonial{$i}_name", '' );
				$avatar = 'image';
				$image  = evolve_theme_mod( "evl_fp_testimonial{$i}_avatar", '' );
				if ( isset( $image['url'] ) ) {
					$image = $image['url'];
				}

				$content = evolve_theme_mod( "evl_fp_testimonial{$i}_content", '' );

				$inner_content = $testimonials_thumbnail = $pic = $alt = '';
				if ( $name ) {
					if ( $avatar == 'image' && $image ) {
						$attr['src'] = $image;
						$attr['alt'] = $alt;
						$image_id    = evolve_get_attachment_id_from_url( $image );
						$image_url   = wp_get_attachment_image_src( $image_id, 'evolve-testimonial-avatar' );
						$image       = $image_url[0];
						if ( $image_id ) {
							$alt = get_post_field( 'post_excerpt', $image_id );
						}
						$pic = "<img class='testimonial-image rounded-circle mx-auto d-block' src='$image' alt='$alt' />";
					}
					if ( $avatar == 'image' &&
					     ! $image
					) {
						$avatar = 'none';
					}
					if ( $avatar != 'none' ) {
						$testimonials_thumbnail = $pic;
					}
					$inner_content .= "<footer class='blockquote-footer'><strong>$name</strong>$testimonials_thumbnail</footer>";
				}
				if ( $testimonials_counter == 0 ) {
					$active = ' active';
				}
				$html .= "<blockquote class='carousel-item blockquote item-{$i} text-center" . $active . "'><p class='mb-0'>" . do_shortcode( $content ) . "</p>$inner_content</blockquote>";
				++ $testimonials_counter;
			}

		}
		$html .= "</div></div></div></div></div></div>";
		echo $html;
	}
}

if ( ! function_exists( 'evolve_get_attachment_id_from_url' ) ) {
	function evolve_get_attachment_id_from_url( $attachment_url = '' ) {
		global $wpdb;
		$attachment_id = false;
		if ( $attachment_url == '' ) {
			return;
		}
		$upload_dir_paths = wp_upload_dir();
		// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
		if ( false !== strpos( $attachment_url, $upload_dir_paths['baseurl'] ) ) {
			// If this is the URL of an auto-generated thumbnail, get the URL of the original image
			$attachment_url = preg_replace( '/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url );
			// Remove the upload path base directory from the attachment URL
			$attachment_url = str_replace( $upload_dir_paths['baseurl'] . '/', '', $attachment_url );
			// Run a custom database query to get the attachment ID from the modified attachment URL
			$attachment_id = $wpdb->get_var( $wpdb->prepare( "SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url ) );
		}

		return $attachment_id;
	}
}

/*
    Counter Circle
    ======================================= */

if ( ! function_exists( 'evolve_counter_circle' ) ) {
	function evolve_counter_circle() {

		$html = '';

		echo "<div class='home-counter-circle'><div class='container'>";
		$counter_circle_section_title = evolve_theme_mod( 'evl_counter_circle_title', '' );

		if ( evolve_theme_mod( 'evl_counter_circle_title', '' ) == '' && evolve_theme_mod( "evl_fp_counter_circle1", '0' ) != 1 && evolve_theme_mod( "evl_fp_counter_circle2", '0' ) != 1 && evolve_theme_mod( "evl_fp_counter_circle3", '0' ) != 1 && is_user_logged_in() && is_customize_preview() ) {
			echo '<h3 class="no-content text-center d-block">' . __( 'Counter circles element will be displayed here', 'evolve' ) . ' <span class="badge badge-pill badge-secondary">' . __( 'Edit', 'evolve' ) . '</span></h3>';
		}

		if ( evolve_theme_mod( 'evl_counter_circle_title', '' ) ) {
			$counter_circle_section_title = '<div class="row"><div class="col-12"><h3 class="counter-circle-section-title section-title">' . evolve_theme_mod( 'evl_counter_circle_title', '' ) . '</h3></div></div>';
		}
		echo $counter_circle_section_title . "<div class='row'>";
		for ( $i = 1; $i <= 3; $i ++ ) {
			$enabled = evolve_theme_mod( "evl_fp_counter_circle{$i}", '0' );
			if ( $enabled == 1 ) {
				$title               = evolve_theme_mod( "evl_fp_counter_circle{$i}_text" );
				$value               = evolve_theme_mod( "evl_fp_counter_circle{$i}_percentage" );
				$filledcolor         = evolve_theme_mod( "evl_fp_counter_circle{$i}_filledcolor" );
				$unfilledcolor       = evolve_theme_mod( "evl_fp_counter_circle{$i}_unfilledcolor" );
				$size                = '220';
				$icon                = "<div class='counter-icon'><i class='" . evolve_theme_mod( "evl_fp_counter_circle{$i}_icon" ) . "'></i></div>";
				$scales              = 'no';
				$countdown           = 'no';
				$speed               = '1500';
				$multiplicator       = $size / 220;
				$stroke_size         = 11 * $multiplicator;
				$circle_title        = "<div class='counter-circle-text'>{$icon}<h5 class='counter-text-title'>" . $title . "</h5></div>";
				$data_percent        = $value;
				$data_countdown      = ( $countdown == 'no' ) ? '' : 1;
				$data_filledcolor    = $filledcolor;
				$data_unfilledcolor  = $unfilledcolor;
				$data_scale          = ( $scales == 'no' ) ? '' : 1;
				$data_size           = $size;
				$data_speed          = $speed;
				$data_strokesize     = $stroke_size;
				$child_wrapper_style = sprintf( 'height:%spx;width:%spx;', $size, $size );
				$output              = "<div data-percent='{$data_percent}' data-countdown='{$data_countdown}' data-filledcolor='{$data_filledcolor}' data-unfilledcolor='{$data_unfilledcolor}' data-scale='{$data_scale}' data-size='{$data_size}' data-speed='{$data_speed}' data-strokesize='{$data_strokesize}' class='counter-circle-content' style='{$child_wrapper_style}'>{$circle_title}</div>";
				$html                .= "<div class='col mb-4 mb-lg-0'><div class='counter-circle item-{$i}' style='{$child_wrapper_style}'>{$output}</div></div>";
			}
		}
		$html .= "</div></div></div>";
		echo $html;
	}
}

/*
    WooCommerce Product
    ======================================= */

if ( ! function_exists( 'evolve_woocommerce_products' ) ) {
	function evolve_woocommerce_products() {
		$product_categories = evolve_theme_mod( "evl_fp_woo_product" );
		$product_number     = evolve_theme_mod( "evl_fp_woo_product_number", "4" );
		$product_cat        = '';
		if ( $product_categories ) {
			$product_cat = implode( ",", $product_categories );
		}

		$html = '';

		echo "<div class='home-woo-product'><div class='container'>";

		$woo_product_section_title = evolve_theme_mod( 'evl_woo_product_title', '' );
		if ( evolve_theme_mod( 'evl_woo_product_title', '' ) ) {
			$woo_product_section_title = '<div class="row"><div class="col-12"><h3 class="woo-product-section-title section-title">' . evolve_theme_mod( 'evl_woo_product_title', '' ) . '</h3></div></div>';
		}
		echo $woo_product_section_title . "<div class='row'><div class='col'>";

		if ( $product_cat ) {
			$html .= do_shortcode( '[products category="' . $product_cat . '" limit="' . $product_number . '" orderby="title" order="asc"]' );
		} else {
			$html .= do_shortcode( '[products limit="' . $product_number . '" category="" orderby="title" order="asc"]' );
		}
		$html .= "</div></div></div></div>";
		echo $html;
	}
}

/*
    Custom Content
    ======================================= */

if ( ! function_exists( 'evolve_custom_content' ) ) {
	function evolve_custom_content() {
		$content = evolve_theme_mod( "evl_fp_custom_content_editor", '' );

		$html = '';

		echo "<div class='home-custom-content'><div class='container'>";

		$custom_content_section_title = evolve_theme_mod( 'evl_custom_content_title', '' );

		if ( evolve_theme_mod( 'evl_custom_content_title', '' ) ) {
			$custom_content_section_title = '<div class="row"><div class="col-12"><h3 class="custom-content-section-title section-title">' . evolve_theme_mod( 'evl_custom_content_title', '' ) . '</h3></div></div>';
		}
		echo $custom_content_section_title . "<div class='row'>";

		$html .= "<div class='custom-content-wrapper col'>" . $content . "</div>";
		$html .= "</div></div></div>";
		echo $html;
	}
}

/*
    Blog/Page Content
    ======================================= */

if ( ! function_exists( 'evolve_blog_page_content' ) ) {
	function evolve_blog_page_content() {

		if ( have_posts() ) :

			/*
				Before Posts Loop

				---------------------------------------
				Hooked: evolve_pagination_before() - 10
						evolve_posts_loop_open() - 20
				--------------------------------------- */

			do_action( 'evolve_before_posts_loop' );

			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/post/content', 'post' );
			endwhile;

			/*
				After Posts Loop

				---------------------------------------
				Hooked: evolve_posts_loop_close() - 10
						evolve_pagination_after() - 20
				--------------------------------------- */

			do_action( 'evolve_after_posts_loop' );

		else :

			get_template_part( 'template-parts/post/content', 'none' );

		endif;
	}
}