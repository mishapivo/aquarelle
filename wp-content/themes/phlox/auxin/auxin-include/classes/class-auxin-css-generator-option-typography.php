<?php
/**
 * Generates CSS for a typography option
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2018
 * @link       http://averta.net
 *
 * Sample data model:
 * [
 *   'typography' => [
 *       'font-family' => 'Abel:regular',
 *       'font-size'   => [
 *           '1024' => [
 *               'value' => '28',
 *               'unit' => 'px'
 *           ],
 *           'desktop' => [
 *               'value' => '31',
 *               'unit' => 'px'
 *           ]
 *       ],
 *       'font-weight' => '300',
 *       'text-transform' => 'uppercase',
 *       'font-style' => 'italic',
 *       'text-decoration' => 'underline',
 *       'line-height' => [
 *           'desktop' => [
 *               'value' => '14',
 *               'unit' => 'px'
 *           ]
 *       ],
 *       'letter-spacing' => [
 *           '1024' => [
 *               'value' => '2.4',
 *               'unit' => 'px'
 *           ],
 *           'desktop' => [
 *               'value' => '2.6',
 *               'unit' => 'px'
 *           ]
 *       ]
 *   ]
 * ];
 */
class Auxin_CSS_Generator_Option_Typography extends Auxin_CSS_Generator_Option_Base{

    /**
     * Crawls all controls if it is a group of controls
     *
     * @param  array $info  Controls data
     * @return void
     */
    protected function walk_control_groups( $groups ){
        foreach( $groups as $group_name => $group_info ) {
            $this->walk_properties( $group_info );
        }
    }

    /**
     * Crawls all css properties
     *
     * @param  array $properties  List of various CSS properties
     * @return void
     */
    protected function walk_properties( $properties ){
        foreach ( $properties as $prop => $propValue ) {
            if( is_array( $propValue ) ){
                $this->walk_breakpoints( $propValue, $prop );
            } else {
                $css = $this->get_sanitized_rule_string( $prop, $propValue );
                $this->stack_css( $css, $this->defaults['breakpoint'], $prop );
            }
        }
    }

    /**
     * Crawls all breakpoints, generates and collects CSS roles
     *
     * @param  array $breakpoints  Lits of breakpoints
     *
     * @return void
     */
    protected function walk_breakpoints( $breakpoints, $prop ){

        foreach( $breakpoints as $breakpoint => $units ) {
            if( !empty( $units['value'] ) && !empty( $units['unit'] ) ){
                $css = $prop . ":" . $units['value'] . $units['unit'] . ";";
                $this->stack_css( $css, $breakpoint );
            }
        }

    }

    /**
     * Sanitizes a CSS rule
     */
    private function get_sanitized_rule_string( $prop, $value ){
        if( $prop == "font-family" ){
            $face   = strtok( $value, ':');
            Auxin_Fonts::get_instance()->load_font( $face, $value );
            return  $prop . ":'" . $face . "';";
        }

        return  $prop . ":" . $value . ";";
    }

}
