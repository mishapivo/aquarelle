<?php
/**
 * select a category
 * @package IWeb_Pathology
 */

// Function for select a category for Latest News Section and Slider

if ( class_exists( 'WP_Customize_control' ) ) :
	class Iwebpatho_WP_Customize_Category_Control extends WP_Customize_Control {

		public function render_content() {
			$dropdown = wp_dropdown_categories(
				array(
					'name'              => '_customize-dropdown-categories-' . $this->id,
					'echo'              => 0,
					'show_option_none'  => __( '&mdash; Select &mdash;','iweb-pathology' ),
					'option_none_value' => '0',
					'selected'          => $this->value(),
					)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
				esc_html( $this->label ), $dropdown
			);
		}
	}
	endif;

