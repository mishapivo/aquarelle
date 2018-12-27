<?php
if ( ! function_exists( 'salient_customizer_get_single_value' ) ) :
    /**
     * Function to get single value
     *
     * @access public
     * @since 0.0.1
     *
     * @param string $single_value_name
     * @return array || other values
     *
     */
    function salient_customizer_get_single_value ( $single_value_name ){
        $customizer_values = salient_customizer_get_all_values();
        if(!isset($customizer_values[$single_value_name])){
            return null;
        }
        return $customizer_values[$single_value_name];
    }
endif;