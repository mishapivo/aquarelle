<?php
/**
 * Display Feature Columns
 * @since Travel Way 1.0.0
 *
 * @return void
 *
 */
if ( !function_exists('travel_way_feature_info') ) :
	function travel_way_feature_info() {
		global $travel_way_customizer_all_values;
		$travel_way_feature_info_number = $travel_way_customizer_all_values['travel-way-feature-info-number'];
		echo '<div class="info-icon-box-wrapper">';
		$number = $travel_way_feature_info_number;

		$travel_way_basic_info_data = array();

		$travel_way_first_info_icon = $travel_way_customizer_all_values['travel-way-first-info-icon'] ;
		$travel_way_first_info_title = $travel_way_customizer_all_values['travel-way-first-info-title'];
		$travel_way_first_info_desc = $travel_way_customizer_all_values['travel-way-first-info-desc'];
		$travel_way_basic_info_data[] = array(
			"icon"  => $travel_way_first_info_icon,
			"title" => $travel_way_first_info_title,
			"desc"  => $travel_way_first_info_desc
		);

		$travel_way_second_info_icon = $travel_way_customizer_all_values['travel-way-second-info-icon'] ;
		$travel_way_second_info_title = $travel_way_customizer_all_values['travel-way-second-info-title'];
		$travel_way_second_info_desc = $travel_way_customizer_all_values['travel-way-second-info-desc'];
		$travel_way_basic_info_data[] = array(
			"icon"  => $travel_way_second_info_icon,
			"title" => $travel_way_second_info_title,
			"desc"  => $travel_way_second_info_desc
		);

		$travel_way_third_info_icon = $travel_way_customizer_all_values['travel-way-third-info-icon'] ;
		$travel_way_third_info_title = $travel_way_customizer_all_values['travel-way-third-info-title'];
		$travel_way_third_info_desc = $travel_way_customizer_all_values['travel-way-third-info-desc'];
		$travel_way_basic_info_data[] = array(
			"icon"  => $travel_way_third_info_icon,
			"title" => $travel_way_third_info_title,
			"desc"  => $travel_way_third_info_desc
		);

		$travel_way_forth_info_icon = $travel_way_customizer_all_values['travel-way-forth-info-icon'] ;
		$travel_way_forth_info_title = $travel_way_customizer_all_values['travel-way-forth-info-title'];
		$travel_way_forth_info_desc = $travel_way_customizer_all_values['travel-way-forth-info-desc'];
		$travel_way_basic_info_data[] = array(
			"icon"  => $travel_way_forth_info_icon,
			"title" => $travel_way_forth_info_title,
			"desc"  => $travel_way_forth_info_desc
		);

		$col = " init-animate zoomIn";

		$i=0;
		foreach ( $travel_way_basic_info_data as $base_basic_info_data) {
			if( $i >= $number ){
				break;
			}
			?>
            <div class="info-icon-box <?php echo $col;?>">
				<?php
				if( !empty( $base_basic_info_data['icon'])){
					?>
                    <div class="info-icon">
                        <i class="fa <?php echo esc_attr( $base_basic_info_data['icon'] );?>"></i>
                    </div>
					<?php
				}
				if( !empty( $base_basic_info_data['title']) || !empty( $base_basic_info_data['desc']) ){
					?>
                    <div class="info-icon-details">
						<?php
						if( !empty( $base_basic_info_data['title']) ){
							echo '<h6 class="icon-title">'.esc_html( $base_basic_info_data['title'] ).'</h6>';
						}
						if( !empty( $base_basic_info_data['desc']) ){
							echo '<span class="icon-desc">'.wp_kses_post( $base_basic_info_data['desc'] ).'</span>';
						}
						?>
                    </div>
					<?php
				}
				?>
            </div>
			<?php
			$i++;
		}
		echo "</div>";/*.infowrapper*/
	}
endif;
add_action( 'travel_way_action_feature_info', 'travel_way_feature_info', 20 );