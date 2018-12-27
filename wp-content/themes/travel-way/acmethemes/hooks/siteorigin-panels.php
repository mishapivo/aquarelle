<?php
/**
 * Adds Travel Way Theme Widgets in SiteOrigin Pagebuilder Tabs
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return null
 *
 */
function travel_way_siteorigin_widgets($widgets) {
    $theme_widgets = array(
        'Travel_Way_Posts_Col',
        'Travel_Way_Contact',
	    'Travel_Way_Gallery',
	    'Travel_Way_Feature',
	    'Travel_Way_Service',
        'Travel_Way_Team',
        'Travel_Way_Testimonial',
    );

	if ( travel_way_is_woocommerce_active() ) :
		$theme_widgets[] =  'Travel_Way_Wc_Feature_Cats';
		$theme_widgets[] =  'Travel_Way_Wc_Products';
	endif;

    foreach($theme_widgets as $theme_widget) {
        if( isset( $widgets[$theme_widget] ) ) {
            $widgets[$theme_widget]['groups'] = array('travel-way');
            $widgets[$theme_widget]['icon']   = 'dashicons dashicons-screenoptions';
        }
    }
    return $widgets;
}
add_filter('siteorigin_panels_widgets', 'travel_way_siteorigin_widgets');

/**
 * Add a tab for the theme widgets in the page builder
 *
 * @since Travel Way 1.0.0
 *
 * @param null
 * @return null
 *
 */
function travel_way_siteorigin_widgets_tab($tabs){
    $tabs[] = array(
        'title'  => esc_html__('AT Travel Way Widgets', 'travel-way'),
        'filter' => array(
            'groups' => array('travel-way')
        )
    );
    return $tabs;
}
add_filter('siteorigin_panels_widget_dialog_tabs', 'travel_way_siteorigin_widgets_tab', 20 );