<?php
/**
 * Theme options
 *
 * @package Blogger_Era
 */
if ( ! function_exists( 'blogger_era_text_align' ) ) :
    /**
     * Text Align
     * @return array text align options
     */
    function blogger_era_text_align() {
        $blogger_era_text_align = array(
            'left' 	=> esc_html__('Left', 'blogger-era'),
            'center' 	=> esc_html__('Center', 'blogger-era'),
            'right' 	=> esc_html__('Right', 'blogger-era'),
        );

        $output = apply_filters( 'blogger_era_text_align', $blogger_era_text_align );
        return $output;
    }
endif;