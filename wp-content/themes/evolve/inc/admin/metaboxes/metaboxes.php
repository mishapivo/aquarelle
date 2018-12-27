<?php

if ( ! class_exists( 'evolve_Metaboxes' ) ) {
	class evolve_Metaboxes {

		public function __construct() {
			add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
			add_action( 'save_post', array( $this, 'save_meta_boxes' ) );
			add_action( 'admin_print_scripts-post.php', array( $this, 'print_metabox_scripts' ) );
			add_action( 'admin_print_scripts-post-new.php', array( $this, 'print_metabox_scripts' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_script_loader' ) );
		}

		function admin_script_loader() {
			global $pagenow;
			if ( is_admin() && ( $pagenow == 'post-new.php' || $pagenow == 'post.php' ) ) {
				wp_register_script( 'evolve-metaboxes', get_template_directory_uri() . '/inc/admin/metaboxes/metaboxes.min.js' );
				wp_enqueue_script( 'evolve-metaboxes' );
			}
		}

		public function add_meta_boxes() {
			$this->evolve_add_meta_box( 'post_options', __( 'Post Options', 'evolve' ), 'post' );
			$this->evolve_add_meta_box( 'page_options', __( 'Page Options', 'evolve' ), 'page' );
			$this->evolve_add_meta_box( 'woocommerce_options', __( 'Product Options', 'evolve' ), 'product' );
		}

		public function evolve_add_meta_box( $id, $label, $post_type ) {
			add_meta_box(
				'evolve_' . $id, $label, array( $this, $id ), $post_type
			);
			add_filter( 'postbox_classes_post_evolve_' . $id, 'evolve_metabox_classes' );
			add_filter( 'postbox_classes_page_evolve_' . $id, 'evolve_metabox_classes' );
		}

		public function save_meta_boxes( $post_id ) {
			if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
				return;
			}

			foreach ( $_POST as $key => $value ) {
				if ( strstr( $key, 'evolve_' ) ) {
					update_post_meta( $post_id, $key, $value );
				}
			}
		}

		public function post_options() {
			wp_enqueue_style( 'evolve-metaboxes', get_template_directory_uri() . '/inc/admin/css/style.min.css' );
			$this->evolve_render_option_tabs( array( 'layout', 'header', 'pagetitlebar', 'slider' ) );
		}

		public function page_options() {
			wp_enqueue_style( 'evolve-metaboxes', get_template_directory_uri() . '/inc/admin/css/style.min.css' );
			$this->evolve_render_option_tabs( array( 'layout', 'header', 'pagetitlebar', 'slider' ) );
		}

		public function woocommerce_options() {
			wp_enqueue_style( 'evolve-metaboxes', get_template_directory_uri() . '/inc/admin/css/style.min.css' );
			$this->evolve_render_option_tabs( array( 'layout', 'header', 'pagetitlebar', 'slider' ) );
		}

		public function print_metabox_scripts() {
			wp_register_style( 'evolve-metaboxes-icon', get_template_directory_uri() . '/inc/admin/customizer/assets/fonts/fontastic/styles.min.css', array(), time(), 'all' );
			wp_enqueue_style( 'evolve-metaboxes-icon' );
			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_script( 'wp-color-picker-alpha', get_template_directory_uri() . '/inc/admin/customizer/kirki-framework/assets/vendor/wp-color-picker-alpha/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '', true );
		}

		public function evolve_text( $id, $label, $desc = '' ) {
			global $post;

			$html = '';
			$html .= '<div class="evolve-metabox-field">';
			$html .= '<label for="evolve_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			if ( $desc ) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
			$html .= '<div class="field">';
			$html .= '<input type="text" id="evolve_' . $id . '" name="evolve_' . $id . '" value="' . get_post_meta( $post->ID, 'evolve_' . $id, true ) . '" />';
			$html .= '</div>';
			$html .= '</div>';

			echo $html;
		}

		public function evolve_color( $type, $id, $label, $desc = '' ) {
			global $post;

			$html = '';
			$html .= '<div class="evolve-metabox-field">';
			$html .= '<label for="evolve_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			if ( $desc ) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
			$html .= '<div class="field">';
			$html .= '<input' . ( ( $type == 'color_rgba' ) ? " class='evolve-color-field' data-alpha='true'" : " class='evolve-color-field'" ) . ' type="text" id="evolve_' . $id . '" name="evolve_' . $id . '" value="' . get_post_meta( $post->ID, 'evolve_' . $id, true ) . '" />';
			$html .= '</div>';
			$html .= '</div>';

			echo $html;
		}

		public function evolve_select( $id, $label, $desc = '', $options ) {
			global $post;

			$html = '';
			$html .= '<div class="evolve-metabox-field">';
			$html .= '<label for="evolve_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			if ( $desc ) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
			$html .= '<div class="field">';
			$html .= '<select id="evolve_' . $id . '" name="evolve_' . $id . '">';
			foreach ( $options as $key => $option ) {
				if ( get_post_meta( $post->ID, 'evolve_' . $id, true ) == $key ) {
					$selected = 'selected="selected"';
				} else {
					$selected = '';
				}

				$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
			}
			$html .= '</select>';
			$html .= '</div>';
			$html .= '</div>';

			echo $html;
		}

		public function evolve_multiple( $id, $label, $desc = '', $options ) {
			global $post;

			$html = '';
			$html .= '<div class="evolve-metabox-field">';
			$html .= '<label for="evolve_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			if ( $desc ) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
			$html .= '<div class="field">';
			$html .= '<select multiple="multiple" id="evolve_' . $id . '" name="evolve_' . $id . '[]">';
			foreach ( $options as $key => $option ) {
				if ( is_array( get_post_meta( $post->ID, 'evolve_' . $id, true ) ) && in_array( $key, get_post_meta( $post->ID, 'evolve_' . $id, true ) ) ) {
					$selected = 'selected="selected"';
				} else {
					$selected = '';
				}

				$html .= '<option ' . $selected . 'value="' . $key . '">' . $option . '</option>';
			}
			$html .= '</select>';
			$html .= '</div>';
			$html .= '</div>';

			echo $html;
		}

		public function evolve_textarea( $id, $label, $desc = '', $default = '' ) {
			global $post;

			$db_value = get_post_meta( $post->ID, 'evolve_' . $id, true );

			$value = $db_value;

			$html = '';
			$html .= '<div class="evolve-metabox-field">';
			$html .= '<label for="evolve_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			if ( $desc ) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
			$html .= '<div class="field">';
			$html .= '<textarea cols="120" rows="10" id="evolve_' . $id . '" name="evolve_' . $id . '">' . $value . '</textarea>';
			$html .= '</div>';
			$html .= '</div>';

			echo $html;
		}

		public function evolve_image_radio_button( $id, $add_class, $label, $desc = '', $options, $default = '' ) {
			global $post;
			$class = '';
			if ( $add_class ) {
				$add_class = ' ' . $add_class;
			}
			$checked        = '';
			$javascript_ids = '';
			foreach ( $options as $k => $v ) {
				$javascript_ids .= "#image_{$k},";
			}
			$javascript_ids = rtrim( $javascript_ids, "," );

			$html = '';
			$html .= '<div class="evolve-metabox-field">';
			$html .= '<label for="evolve_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			if ( $desc ) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
			$html .= '<div class="field' . $add_class . '">';
			foreach ( $options as $key => $option ) {
				$html .= '<input type="radio" style="display: none;" id="' . $id . '-' . $key . '" name="evolve_' . $id . '" value="' . $key . '" ';
				if ( get_post_meta( $post->ID, 'evolve_' . $id, true ) == $key ) {
					$checked = 'checked="checked"';
					$class   = 'evolve-radio evolve-img-selected-' . $id;
				} elseif ( get_post_meta( $post->ID, 'evolve_' . $id, true ) == '' && $key == $default ) {
					$checked = 'checked="checked"';
					$class   = 'evolve-radio evolve-img-selected-' . $id;
				} else {
					$checked = '';
					$class   = 'evolve-radio';
				}

				$html .= $checked . ">";
				$html .= "<img src='$option' alt='' id='image_$key' class='$class' onclick='document.getElementById(\"$id-$key\").checked=true;jQuery(\"$javascript_ids\").removeClass(\"evolve-img-selected-$id\");jQuery(this).addClass(\"evolve-img-selected-$id\");' />";
			}
			$html .= '</div>';
			$html .= '</div>';

			echo $html;
		}

		public function evolve_upload( $id, $label, $desc = '' ) {
			global $post;

			$upload_img_id = get_post_meta( $post->ID, 'evolve_' . $id, true );
			$upload_src    = wp_get_attachment_url( $upload_img_id );

			$html = '';
			$html .= '<div class="evolve-metabox-field">';
			$html .= '<label for="evolve_' . $id . '">';
			$html .= $label;
			$html .= '</label>';
			if ( $desc ) {
				$html .= '<span class="description">' . $desc . '</span>';
			}
			$html  .= '<div class="field">';
			$hide1 = '';
			$hide2 = '';
			if ( $upload_src ) {
				$hide1 = 'hidden';
			}
			if ( ! $upload_src ) {
				$hide2 = 'hidden';
			}

			$html .= '<input type="text" id="evolve-media-remove-extra-' . $id . '" class="upload_field ' . $hide1 . '" value="" /></br>';

			$html .= '<div id="evolve-media-display-' . $id . '">';
			if ( $upload_src ) :
				$html .= '<input type="text" class="upload_field" value="' . $upload_src . '" /></br>';
				if ( $id != 'webm' && $id != 'mp4' && $id != 'ogv' ) {
					$html .= '<img src="' . $upload_src . '" style="width:60px; height:60px;" />';
				}
			endif;
			$html .= '</div>';

			$html .= '<input class="evolve-upload-button button ' . $hide1 . '" id="evolve-media-upload-' . $id . '" id="evolve-media-upload-' . $id . '" data-media-id="' . $id . '" type="button" value="' . __( 'Upload', 'evolve' ) . '" />';
			$html .= '<input class="evolve-remove-button button ' . $hide2 . '" id="evolve-media-remove-' . $id . '" id="evolve-media-upload-' . $id . '" data-media-id="' . $id . '" type="button" value="' . __( 'Remove', 'evolve' ) . '" />';
			$html .= '</div></div>';
			$html .= '<input type="hidden" id="evolve_' . $id . '" name="evolve_' . $id . '" value="' . get_post_meta( $post->ID, 'evolve_' . $id, true ) . '" />';

			echo $html;
		}

		public function evolve_render_option_tabs( $requested_tabs, $post_type = 'default' ) {
			$tabs_names = array(
				'layout'       => __( 'Layout', 'evolve' ),
				'header'       => __( 'Header', 'evolve' ),
				'pagetitlebar' => __( 'Breadcrumbs', 'evolve' ),
				'slider'       => __( 'Slider', 'evolve' )
			);

			$tabs_icons = array(
				'layout'       => 'evolve-icon-general',
				'header'       => 'evolve-icon-header',
				'pagetitlebar' => 'evolve-icon-breadcrumbs',
				'slider'       => 'evolve-icon-parallax'
			);

			echo '<ul class="evolve-metabox-tabs">';

			foreach ( $requested_tabs as $key => $tab_name ) {
				$class_active = '';
				if ( $key === 0 ) {
					$class_active = ' class="active"';
				}

				if ( $tab_name == 'page' &&
				     $post_type == 'product'
				) {
					printf( '<li%s><a href="%s">%s</a></li>', $class_active, $tab_name, $tabs_names[ $post_type ] );
				} else {
					printf( '<li%s><a href="%s"><i class="%s"></i>%s</a></li>', $class_active, $tab_name, $tabs_icons[ $tab_name ], $tabs_names[ $tab_name ] );
				}
			}

			echo '</ul>';

			echo '<div class="evolve-metabox-content">';

			foreach ( $requested_tabs as $key => $tab_name ) {
				$class_active = '';
				if ( $key === 0 ) {
					$class_active = 'active';
				}
				printf( '<div class="evolve-metabox-tab %s" id="evolve-tab-%s">', $class_active, $tab_name );
				get_template_part( 'inc/admin/metaboxes/page-tabs/tab', $tab_name );
				echo '</div>';
			}

			echo '</div>';
			echo '<div class="clear"></div>';
		}
	}
}

if ( ! function_exists( 'evolve_metabox_classes' ) ) {
	function evolve_metabox_classes( $classes ) {
		array_push( $classes, 'evolve-postbox' );

		return $classes;
	}
}

$evolve_metaboxes = new evolve_Metaboxes;