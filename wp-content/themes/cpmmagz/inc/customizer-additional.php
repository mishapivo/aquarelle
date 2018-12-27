<?php
if(!function_exists('cpmmagz_additional_info')):
	function cpmmagz_additional_info( $wp_customize ) {

		$wp_customize->add_section(
		    'cpmmagz_support',
		    array(
		        'title' => __( 'Cpmmagz Support','cpmmagz' ),
		        'capability'=>'edit_theme_options',
		    )
	    );

	    $wp_customize->add_setting(
	        'cpmmagz_doc_supp',
	        array(
	            'default'=>'',
		        'type'              => 'option',
	            'sanitize_callback'=>'esc_html',
	            'capability'        => 'edit_theme_options',
	        )
	    );

	      $wp_customize->add_control( new Cpmmagz_Support_Custom_Text_Control( $wp_customize, 'cpmmagz_doc_supp', array(
				'section'  => 'cpmmagz_support',
				'type' => 'customtext',
				'settings'   => 'cpmmagz_doc_supp'
			))
		);
	}
	add_action( 'customize_register', 'cpmmagz_additional_info' );
endif;