<?php
/**
 * Featured Slider array creation
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'corporate_plus_display_feature_slider_array' ) ) :

	function corporate_plus_display_feature_slider_array( ){
		global $corporate_plus_customizer_all_values;
		$corporate_plus_no_image_large = get_template_directory_uri()."/assets/img/startup-slider.jpg";

		$corporate_plus_slider_number = absint( $corporate_plus_customizer_all_values['corporate-plus-featured-slider-number']);
		$corporate_plus_slider_args = array();

		$corporate_plus_feature_page = $corporate_plus_customizer_all_values['corporate-plus-feature-page'];
		if( 0 != $corporate_plus_feature_page ) :
			$corporate_plus_slider_args = array(
				'post_parent'         => $corporate_plus_feature_page,
				'posts_per_page'      => $corporate_plus_slider_number,
				'post_type'           => 'page',
				'no_found_rows'       => true,
				'post_status'         => 'publish'
			);
			$slider_query = new WP_Query( $corporate_plus_slider_args );
			if ( !$slider_query->have_posts() ){
				$corporate_plus_slider_args = array(
					'page_id'         => $corporate_plus_feature_page,
					'posts_per_page'      => $corporate_plus_slider_number,
					'post_type'           => 'page',
					'no_found_rows'       => true,
					'post_status'         => 'publish'
				);
			}
		endif;

		if( !empty( $corporate_plus_slider_args ) ){
			// the query
			$corporate_plus_slider_post_query = new WP_Query( $corporate_plus_slider_args );
			if ( $corporate_plus_slider_post_query->have_posts() ) :
				$corporate_plus_slider_contents_array = array();
				$i = 0;
				while ( $corporate_plus_slider_post_query->have_posts() ) : $corporate_plus_slider_post_query->the_post();
					if (has_post_thumbnail()) {
						$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
					}
					else {
						$image_url[0] = $corporate_plus_no_image_large;
					}
					$corporate_plus_slider_contents_array[$i]['corporate-plus-slider-image'] = $image_url[0];

					if( get_the_title() ){
						$corporate_plus_slider_contents_array[$i]['corporate-plus-slider-title'] = get_the_title();
					}
					if( get_the_excerpt() ){
						$corporate_plus_slider_contents_array[$i]['corporate-plus-slider-desc'] = get_the_excerpt();
					}
					$corporate_plus_slider_contents_array[$i]['corporate-plus-slider-link'] = get_the_permalink();
					$i++;
				endwhile;
				wp_reset_postdata();
				return $corporate_plus_slider_contents_array;
			endif;
		}
		else{
			corporate_plus_default_slider();
		}
		return null;
	}
endif;

/**
 * Display default slider
 *
 * @since Corporate Plus 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('corporate_plus_default_slider') ) :
    function corporate_plus_default_slider(){

        $bg_image_style = '';
        if ( get_header_image() ) :
            $bg_image_style .= 'background-image:url(' . esc_url( get_header_image() ) . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;';
        else:
            $bg_image_style .= 'background-image:url(' . esc_url( get_template_directory_uri()."/assets/img/startup-slider.jpg" ) . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;';
        endif; // End header image check.
        ?>
        <section id="at-banner-slider" class="home-fullscreen  at-parallax  full-screen-bg " style="<?php echo $bg_image_style; ?>">
            <div class="slide slide at-slide-wrap">
                <ul class="text-slider at-featured-text-slider clearfix">
                    <li class="clearfix">
                        <div class="at-overlay">
                            <div class="container text-slider-wrapper">
                                <span class="lead banner-title init-animate fadeInRight"><?php _e('Welcome to Corporate Plus','corporate-plus' );?></span>
                                <div class="banner-title-line line init-animate fadeInLeft"><span></span></div>
                                <div class="text-slider-caption init-animate fadeInDown">
		                            <?php _e('Really Awesome Theme For Your Business-Corporate House or Personal Freelancing Sites','corporate-plus' );?>
                                </div>
                                <a href="http://acmethemes.com/themes/corporate-plus" class="init-animate fadeInUp btn btn-primary outline-outward banner-btn">
		                            <?php _e('Know More','corporate-plus'); ?>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <a href="#about" class="scroll-wrap arrow">
                <span>
                    <span class="fa fa-angle-down fa-2x"></span>
                </span>
            </a>
        </section>
        <?php
    }
endif;

/**
 * Featured Slider display
 *
 * @since Corporate Plus 1.1.0
 *
 * @param null
 * @return void
 */
if ( ! function_exists( 'corporate_plus_display_text_slider' ) ) :

    function corporate_plus_display_text_slider( ){
        global $corporate_plus_customizer_all_values;
        $corporate_plus_feature_page = $corporate_plus_customizer_all_values['corporate-plus-feature-page'];
	    $corporate_plus_fs_image_display_options = $corporate_plus_customizer_all_values['corporate-plus-fs-image-display-options'];
	    $corporate_plus_feature_slider_image_only = $corporate_plus_customizer_all_values['corporate-plus-feature-slider-image-only'];

	    $corporate_plus_featured_slider_number = $corporate_plus_customizer_all_values['corporate-plus-featured-slider-number'];

	    if( 1 == $corporate_plus_feature_slider_image_only ){
		    $corporate_plus_featured_slider_number = 1;/*set num 1 if img only*/
        }
	    $corporate_plus_slider_know_more_text = $corporate_plus_customizer_all_values['corporate-plus-slider-know-more-text'];
	    $corporate_plus_go_down = $corporate_plus_customizer_all_values['corporate-plus-go-down'];
        if( 0 != $corporate_plus_feature_page ) :
            $corporate_plus_child_page_args = array(
                'post_parent'         => $corporate_plus_feature_page,
                'posts_per_page'      => $corporate_plus_featured_slider_number,
                'post_type'           => 'page',
                'no_found_rows'       => true,
                'post_status'         => 'publish'
            );
            $slider_query = new WP_Query( $corporate_plus_child_page_args );
            if ( !$slider_query->have_posts() ){
                $corporate_plus_child_page_args = array(
                    'page_id'         => $corporate_plus_feature_page,
                    'posts_per_page'      => $corporate_plus_featured_slider_number,
                    'post_type'           => 'page',
                    'no_found_rows'       => true,
                    'post_status'         => 'publish'
                );
                $slider_query = new WP_Query( $corporate_plus_child_page_args );
            }
            /*The Loop*/
            if ( $slider_query->have_posts() ):

                $bg_image_style = '';
                $bg_image_class = '';
	            $corporate_plus_fs_image = '';
                if ( get_header_image()  ) :
	                $corporate_plus_fs_image = get_header_image();
                endif; // End header image check.
	            if( 'full-screen-bg' == $corporate_plus_fs_image_display_options ){
		            $bg_image_style .= 'background-image:url(' . get_header_image() . ');background-repeat:no-repeat;background-size:cover;background-attachment:fixed;';
		            $bg_image_class = ' at-parallax';
	            }
                ?>
                <section id="at-banner-slider" class="home-fullscreen <?php echo $bg_image_class.' num-'.$corporate_plus_feature_slider_image_only; ?> <?php echo $corporate_plus_fs_image_display_options; ?> " style="<?php echo $bg_image_style; ?>">
                    <div class="slide at-slide-wrap">
                        <ul class="text-slider at-featured-text-slider clearfix">
			                <?php
			                while( $slider_query->have_posts() ):$slider_query->the_post();
				                ?>
                                <li class="clearfix">
                                    <div class="at-overlay">
						                <?php
						                if( 'responsive-img' == $corporate_plus_fs_image_display_options ){
							                echo '<img src="'.esc_url( $corporate_plus_fs_image ).'"/>';
						                }
	                                    if( 1 != $corporate_plus_feature_slider_image_only ){
		                                    ?>
                                            <div class="container text-slider-wrapper">
                                                <span class="lead banner-title init-animate fadeInRight"><?php the_title()?></span>
                                                <div class="banner-title-line line init-animate fadeInLeft"><span></span></div>
                                                <div class="text-slider-caption init-animate fadeInDown">
				                                    <?php the_excerpt();?>
                                                </div>
                                                <?php
                                                if( !empty( $corporate_plus_slider_know_more_text ) ){
                                                ?>
                                                    <a href="<?php the_permalink()?>" class="init-animate fadeInUp btn btn-primary outline-outward banner-btn">
		                                                <?php echo esc_html( $corporate_plus_slider_know_more_text ); ?>
                                                    </a>
                                                    <?php
                                                }
                                                ?>
                                            </div>
		                                    <?php
	                                    }
	                                    ?>
                                    </div>
                                </li>
				                <?php
			                endwhile;
			                ?>
                        </ul>
                    </div>
                    <?php
                    if( !empty( $corporate_plus_go_down )){
                        ?>
                        <a href="<?php echo esc_attr( $corporate_plus_go_down ); ?>" class="scroll-wrap arrow">
                            <span>
                                <span class="fa fa-angle-down fa-2x"></span>
                            </span>
                        </a>
                        <?php
                    }
                    ?>
                </section>
                <?php
            endif;
        else:
            corporate_plus_default_slider();
        endif;
	    wp_reset_postdata();
    }
endif;

/**
 * Image Slider
 *
 * @since Corporate Plus 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('corporate_plus_display_image_slider') ) :
	function corporate_plus_display_image_slider() {
		global $corporate_plus_customizer_all_values;
		$corporate_plus_display_feature_slider_arrays = corporate_plus_display_feature_slider_array();
		$corporate_plus_feature_slider_image_only = $corporate_plus_customizer_all_values['corporate-plus-feature-slider-image-only'];
		$corporate_plus_fs_image_display_options = $corporate_plus_customizer_all_values['corporate-plus-fs-image-display-options'];

		if( !empty( $corporate_plus_display_feature_slider_arrays ) ){
            $corporate_plus_slider_know_more_text = $corporate_plus_customizer_all_values['corporate-plus-slider-know-more-text'];
			?>
            <section id="at-banner-slider" class="home-fullscreen image-slider <?php echo $corporate_plus_fs_image_display_options; ?>">
                <div class="at-slide-wrap image-slider-wrapper">
                    <ul class="image-slider-container ">
			            <?php
			            foreach( $corporate_plus_display_feature_slider_arrays as $corporate_plus_display_feature_slider_array ){
				            if(empty($corporate_plus_display_feature_slider_array['corporate-plus-slider-image'])){
					            $corporate_plus_fs_image = get_template_directory_uri().'/assets/img/no-image-126_530.jpg';
				            }
				            else{
					            $corporate_plus_fs_image =$corporate_plus_display_feature_slider_array['corporate-plus-slider-image'];
				            }
				            $bg_image_style = '';
				            if( 'full-screen-bg' == $corporate_plus_fs_image_display_options ){
					            $bg_image_style = 'background-image:url(' . esc_url( $corporate_plus_fs_image ) . ');background-repeat:no-repeat;background-size:cover;background-position:center;';
				            }
				            ?>
                            <li style="<?php echo $bg_image_style; ?>">
                                <div class="at-overlay">
						            <?php
						            if( 'responsive-img' == $corporate_plus_fs_image_display_options ){
							            echo '<img src="'.esc_url( $corporate_plus_fs_image ).'"/>';
						            }
						            if( 1 != $corporate_plus_feature_slider_image_only ){
							            ?>
                                        <div class="container text-slider-wrapper">
								            <?php
								            if( isset( $corporate_plus_display_feature_slider_array['corporate-plus-slider-title'] ) && !empty( $corporate_plus_display_feature_slider_array['corporate-plus-slider-title'] ) ){
									            ?>
                                                <span class="lead banner-title init-animate fadeInRight">
                                                    <?php echo esc_html( $corporate_plus_display_feature_slider_array['corporate-plus-slider-title'] ); ?>
                                                </span>
									            <?php
								            }
								            if( isset( $corporate_plus_display_feature_slider_array['corporate-plus-slider-desc'] )){
									            echo '<div class="banner-title-line line init-animate fadeInLeft"><span></span></div>';
									            $content = $corporate_plus_display_feature_slider_array['corporate-plus-slider-desc'];
									            echo '<div class="text-slider-caption init-animate fadeInDown">'.esc_html( $content ).'</div>';
								            }
								            if( isset( $corporate_plus_display_feature_slider_array['corporate-plus-slider-link'] ) &&  !empty( $corporate_plus_slider_know_more_text ) ){
									            ?>
                                                <a href="<?php echo esc_url( $corporate_plus_display_feature_slider_array['corporate-plus-slider-link'] ); ?>" class="init-animate fadeInUp btn btn-primary outline-outward banner-btn">
										            <?php echo esc_html( $corporate_plus_slider_know_more_text ); ?>
                                                </a>
									            <?php
								            }
								            ?>
                                        </div>
							            <?php
						            }
						            ?>
                                </div>
                            </li>
				            <?php
			            }
			            ?>
                    </ul>
                </div>
                <?php
				$corporate_plus_go_down = $corporate_plus_customizer_all_values['corporate-plus-go-down'];
				if( !empty( $corporate_plus_go_down ) ){
					?>
                    <a href="<?php echo esc_attr( $corporate_plus_go_down ); ?>" class="scroll-wrap arrow">
                        <span>
                            <span class="fa fa-angle-down fa-2x"></span>
                        </span>
                    </a>
					<?php
				}
				?>
            </section><!-- slider section -->
			<?php
		}
	}
endif;

/**
 * Display related posts from same category
 *
 * @since Corporate Plus 1.0.0
 *
 * @return void
 *
 */
if ( !function_exists('corporate_plus_feature_slider') ) :
    function corporate_plus_feature_slider() {
	    global $corporate_plus_customizer_all_values;
	    $corporate_plus_slider_type = $corporate_plus_customizer_all_values['corporate-plus-slider-type'];
	    $corporate_plus_fs_image_display_options = $corporate_plus_customizer_all_values['corporate-plus-fs-image-display-options'];
	    ?>
        <div class="home-bxslider <?php echo esc_attr( $corporate_plus_fs_image_display_options ); ?>">
            <?php
            if( 'text-slider' == $corporate_plus_slider_type ){
	            corporate_plus_display_text_slider();
            }
            else{
	            corporate_plus_display_image_slider();
            }
            ?>
        </div>
        <div class="clearfix"></div>
        <?php
    }
endif;
add_action( 'corporate_plus_action_feature_slider', 'corporate_plus_feature_slider', 0 );