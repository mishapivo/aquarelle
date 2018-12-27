<?php
/*I have added it through action so that it is flexible to the developer to adapt change*/
add_action('salient_customizer_add_setting_control','salient_customizer_add_setting_control_callback', 12, 5);

if ( ! function_exists( 'salient_customizer_add_setting_control_callback' ) ) :
    /**
     * Function to add customizer setting and controls
     *
     * @access public
     * @since 0.0.1
     *
     * @param object $salient_customizer_wp_customize
     * @param string $salient_customizer_customizer_name common name for all setting and controls
     * @param array $salient_customizer_basic_control_types
     * @param string $salient_customizer_setting_control_key
     * @param array $salient_customizer_settings_control
     * @return void
     *
     */
    function salient_customizer_add_setting_control_callback( $salient_customizer_wp_customize, $salient_customizer_customizer_name, $salient_customizer_basic_control_types, $salient_customizer_setting_control_key, $salient_customizer_settings_control ){
        $salient_customizer_wp_customize->add_setting( esc_attr( $salient_customizer_customizer_name.'['.$salient_customizer_setting_control_key.']' ), $salient_customizer_settings_control['setting']);

        $salient_customizer_control_field_type = $salient_customizer_settings_control['control']['type'];

        /*check if basic control types*/
        if ( in_array( $salient_customizer_control_field_type, $salient_customizer_basic_control_types ) ) {
            $salient_customizer_wp_customize->add_control( esc_attr( $salient_customizer_customizer_name.'['.$salient_customizer_setting_control_key.']' ), $salient_customizer_settings_control['control']);
        }
        else {
            /*Check for default WP_Customize_Custom_Control defined*/
            $salient_customizer_Explode_Customize_Custom_Control_class_name = explode('_', strtolower( $salient_customizer_control_field_type ));
            $salient_customizer_Ucfirst_Customize_Custom_Control_class_name_array = array_map('ucfirst', $salient_customizer_Explode_Customize_Custom_Control_class_name);
            $salient_customizer_Implode_Customize_Custom_Control_class_name = implode('_', $salient_customizer_Ucfirst_Customize_Custom_Control_class_name_array);

            $salient_customizer_New_Customize_Custom_Control_class_name = 'WP_Customize_'.$salient_customizer_Implode_Customize_Custom_Control_class_name.'_Control';
            $salient_customizer_customizer_class_exist = false;
            if ( class_exists( $salient_customizer_New_Customize_Custom_Control_class_name ) ) {
                $salient_customizer_customizer_class_exist = true;
            }
            else{
                $salient_customizer_New_Customize_Custom_Control_class_name = 'Salient_Customizer_'.$salient_customizer_Implode_Customize_Custom_Control_class_name.'_Control';
                if ( class_exists( $salient_customizer_New_Customize_Custom_Control_class_name ) ) {
                    $salient_customizer_customizer_class_exist = true;
                }
            }
            if($salient_customizer_customizer_class_exist){
                $salient_customizer_wp_customize->add_control(
                    new $salient_customizer_New_Customize_Custom_Control_class_name(
                        $salient_customizer_wp_customize,
                        esc_attr( $salient_customizer_customizer_name.'['.$salient_customizer_setting_control_key.']'),
                        $salient_customizer_settings_control['control']
                    )
                );
            }
            else {
            }

        }
    }
endif;