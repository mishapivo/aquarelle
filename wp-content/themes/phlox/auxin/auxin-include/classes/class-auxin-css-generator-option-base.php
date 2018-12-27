<?php
/**
 * Base class for generating CSS for an option
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2018
 * @link       http://averta.net
 */
class Auxin_CSS_Generator_Option_Base {

    /**
     * Keeps styles for various breakpoints
     *
     * @var array
     */
    protected $styles_list = [];

    /**
     * The main CSS selector
     *
     * Sample: '.page-title'
     *
     * @var string
     */
    protected $selector = '';

    /**
     * A CSS placeholder for replacing the special tags
     *
     * Sample: '.page-title{ max-width:{{VALUE}}{{UNIT}}; }'
     *
     * @var string
     */
    protected $placeholder = '';

    /**
     * Default configs
     *
     * @var array
     */
    protected $defaults = [
        'breakpoint' => 'desktop'
    ];


    function __construct(){
        $this->reset();
    }

    /**
     * Collects and stacks css rules in a list
     *
     * @param  string $css        a CSS string.
     * @param  string $breakpoint The breakpoint that the $css belongs to.
     * @param  string $css_id     An optional identification for this CSS string.
     *
     * @return void
     */
    protected function stack_css( $css, $breakpoint = '', $css_id = '' ){
        if( empty( $breakpoint ) ){
            $breakpoint = $this->defaults['breakpoint'];
        }
        if( ! isset( $this->styles_list[ $breakpoint ] ) ){
            $this->styles_list[ $breakpoint ] = [];
        }

        if( ! empty( $css_id ) ){
            $this->styles_list[ $breakpoint ][ $css_id ] = $css;
        } else {
            $this->styles_list[ $breakpoint ][] = $css;
        }
    }

    /**
     * Sets a CSS selector for styles
     *
     * Sample: '.page-title'
     *
     * @param void
     */
    public function set_selector( $selector ){
        $this->selector = $selector;
    }

    /**
     * Sets a pleceholder that is consist of special tags
     *
     * Sample: '.page-title{ max-width:{{VALUE}}{{UNIT}}; }'
     *
     * @param void
     */
    public function set_placeholder( $placeholder ){
        $this->placeholder = $placeholder;
    }

    /**
     * Walk through all groups (popovers) and collect styles
     *
     * @param  array $info  Controls data
     *
     * @return void
     */
    protected function walk_control_groups( $groups ){
        foreach( $groups as $group_name => $group_info ) {
            $this->walk_breakpoints( $group_info );
        }
    }

    /**
     * Generates final CSS based on parsed breakpoint list.
     *
     * @return string  Final CSS for the controller
     */
    protected function generate_css(){
        $result = array();

        foreach( $this->styles_list as $breakpoint => $styles ) {
            if( empty( $styles ) ){
                continue;
            }
            // Join the list of styles for current breakpoint
            $styles = implode(" ", $styles);

            // If the selector is set, wrap the styles with selector
            if( ! empty( $this->selector ) ){
                $styles = $this->selector . '{ ' . $styles . ' } ';
            }

            $result[] = $breakpoint === $this->defaults['breakpoint'] ? $styles : "@media(max-width: {$breakpoint}px){ {$styles} } ";
        }

        return implode("\n", $result);
    }

    /**
     * Resets properties to default values
     *
     * @return void
     */
    public function reset(){
        $this->selector    = '';
        $this->placeholder = '';
        $this->styles_list = [
            'desktop' => [],
            '1024'    => [],
            '768'     => []
        ];
    }

    /**
     * Decode the string if it is JSON-encoded
     *
     * @param  string $data  JSON encoded data
     * @return array
     */
    private function maybe_decode_json( $data ){
        if( is_string( $data ) ){
            $parsed = json_decode( $data, true );
            if( is_array( $parsed ) && ( json_last_error() == JSON_ERROR_NONE ) ){
                return $parsed;
            }
        }

       return $data;
    }

    /**
     * Retrieves the generated CSS for the option
     *
     * @param  string|array  $data  Option data
     * @return string               Final CSS for the option
     */
    public function get_css( $data ){

        $parsed_data = $this->maybe_decode_json( $data, true );
        $this->walk_control_groups( $parsed_data );

        return $this->generate_css();
    }

}
