<?php
if ( ! function_exists( 'salient_customizer_get_all_values' ) ) :
    /**
     * Function to get all value
     *
     * @access public
     * @since 0.0.1
     *
     * @param string $salient_customizer_name
     * @return array || other values
     *
     */
    function salient_customizer_get_all_values( $salient_customizer_name_args = null ){
        if( $salient_customizer_name_args ){
            $salient_customizer_name = $salient_customizer_name_args;
        }
        elseif(defined('SALIENT_CUSTOMIZER_NAME')){
            $salient_customizer_name = SALIENT_CUSTOMIZER_NAME;
        }
        else{
            $salient_customizer_name = 'salient_customizer_options';
        }

        if (defined('SALIENT_CUSTOMIZER_OPTION_MODE') && SALIENT_CUSTOMIZER_OPTION_MODE == 1 ) {
            $customizer_values = get_option( $salient_customizer_name);
        }
        else{
            $customizer_values = get_theme_mod( $salient_customizer_name );
        }

        return $customizer_values;
    }
endif;