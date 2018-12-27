<?php
function optionsframework_option_name() {
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __('One', 'options_framework_theme'),
		'two' => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four' => __('Four', 'options_framework_theme'),
		'five' => __('Five', 'options_framework_theme')
	);
	
	$options = array();

	$options[] = array(
		'name' => __('Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Колличество комментариев на главной', 'options_framework_theme'),
		'desc' => __('Введите 0, чтобы скрыть комментарии на главной странице', 'options_framework_theme'),
		'id' => 'frontpage_comments_number',
		'std' => '3',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Facebook Icon URL', 'options_framework_theme'),
		'desc' => __('Leave blank to hide facebook icon in header', 'options_framework_theme'),
		'id' => 'facebook_icon_url',
		'std' => 'http://facebook.com/#',
		'class' => 'wide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Twitter Icon URL', 'options_framework_theme'),
		'desc' => __('Leave blank to hide twitter icon in header', 'options_framework_theme'),
		'id' => 'twitter_icon_url',
		'std' => 'http://twitter.com/#',
		'class' => 'wide',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Header Logo', 'options_framework_theme'),
		'desc' => __('Logo height should be 40px. Width is flexible. Leave blank to use site title text.', 'options_framework_theme'),
		'id' => 'logo',
		'type' => 'upload');

	return $options;
}
?>