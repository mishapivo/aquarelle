<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 *
 */
require_once( dirname( __FILE__ ) . '/options/options.php' );

/*
 * 
 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.
 * Simply include this function in the child themes functions.php file.
 *
 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use
 * get_template_directory_uri() if you want to use any of the built in icons
 *
 */
function add_another_section($sections){
	
	//$sections = array();
	$sections[] = array(
				'title' => __('A Section added by hook', 'nhp-opts'),
				'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'nhp-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',
				//Lets leave this as a blank section, no options just some intro text set above.
				'fields' => array()
				);
	
	return $sections;
	
}//function
//add_filter('nhp-opts-sections-twenty_eleven', 'add_another_section');


/*
 * 
 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.
 *
 */
function change_framework_args($args){
	
	//$args['dev_mode'] = false;
	
	return $args;
	
}//function
//add_filter('nhp-opts-args-twenty_eleven', 'change_framework_args');

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function setup_framework_options(){
$args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$args['dev_mode'] = false;
//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$args['stylesheet_override'] = true;

//Add HTML before the form
//$args['intro_text'] = __('<p>This is the HTML which can be displayed before the form, it isnt required, but more info is always better. Anything goes in terms of markup here, any HTML.</p>', 'nhp-opts');

//Setup custom links in the footer for share icons
$args['share_icons']['twitter'] = array(
										'link' => 'http://twitter.com/mythemeshopteam',
										'title' => 'Follow Us on Twitter', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/twitter.png'
										);
$args['share_icons']['linked_in'] = array(
										'link' => 'http://www.facebook.com/mythemeshop',
										'title' => 'Like us on Facebook', 
										'img' => NHP_OPTIONS_URL.'img/glyphicons/facebook.png'
										);

//Choose to disable the import/export feature
//$args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$args['opt_name'] = 'playbook';

//Custom menu icon
//$args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$args['menu_title'] = __('Playbook', 'nhp-opts');

//Custom Page Title for options page - default is "Options"
$args['page_title'] = __('Playbook', 'nhp-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"
$args['page_slug'] = 'theme_options';

//Custom page capability - default is set to "manage_options"
//$args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$args['page_position'] = 62;

//Custom page icon class (used to override the page icon next to heading)
//$args['page_icon'] = 'icon-themes';
		
//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-1',
							'title' => __('Support', 'nhp-opts'),
							'content' => __('<p>If you are facing any problem with our theme or theme option panel, head over to our <a href="http://mythemeshop.com/support">Knowledge Base</a></p>', 'nhp-opts')
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-3',
							'title' => __('Credit', 'nhp-opts'),
							'content' => __('<p>Options Panel created using the <a href="http://leemason.github.com/NHP-Theme-Options-Framework/" target="_blank">NHP Theme Options Framework</a> Version 1.0.5</p>', 'nhp-opts')
							);
$args['help_tabs'][] = array(
							'id' => 'nhp-opts-2',
							'title' => __('Earn Money', 'nhp-opts'),
							'content' => __('<p>Earn 50% commision on every sale by refering your friends and readers. Join our <a href="http://mythemeshop.com/affiliate-program/">Affiliate Program</a>.</p>', 'nhp-opts')
							);

//Set the Help Sidebar for the options page - no sidebar by default										
//$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'nhp-opts');



$sections = array();

$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/generalsetting.png',
				'title' => __('Общие настройки', 'nhp-opts'),
				'desc' => __('<p class="description">Эта вкладка содержит общие настройки, которые будут применены ко всей теме.</p>', 'nhp-opts'),
				'fields' => array(
				
					array(
						'id' => 'mts_logo',
						'type' => 'upload',
						'title' => __('Изображение логотипа', 'nhp-opts'), 
						'sub_desc' => __('Добавить логотип <strong>(Рекомендуемый размер 185x90px)</strong> с помощью кнопки Загрузить или URL вставки изображения.', 'nhp-opts')
						),
					array(
						'id' => 'mts_favicon',
						'type' => 'upload',
						'title' => __('Favicon', 'nhp-opts'), 
						'sub_desc' => __('Загрузить <strong>16 x 16 px</strong>  изображение, которое будет представлять Favicon вашего сайта', 'nhp-opts')
						),
					array(
						'id' => 'mts_header_code',
						'type' => 'textarea',
						'title' => __('Header Code', 'nhp-opts'), 
						'sub_desc' => __('Введите код, который вы должны поместить <strong> перед закрытием </head> tтега</strong>. (Например: Яндекс Метрику, Google Webmaster Tools verification, Bing Webmaster Center, BuySellAds Script, Alexa verification etc.)', 'nhp-opts')
						),
					array(
						'id' => 'mts_analytics_code',
						'type' => 'textarea',
						'title' => __('Footer Code', 'nhp-opts'), 
						'sub_desc' => __('Введите коды, которые нужно разместить в футере. <strong>(Например: Google Analytics, Clicky, STATCOUNTER, Woopra, Histats, etc.)</strong>.', 'nhp-opts')
						),
					array(
						'id' => 'mts_copyrights',
						'type' => 'textarea',
						'title' => __('Copyrights Text', 'nhp-opts'), 
						'sub_desc' => __('Вы можете изменить или удалить ссылку из футера и использовать свой ​​собственный текст. (Обратная ссылка всегда приветствуется)', 'nhp-opts'),
						'std' => 'Тема от <a href="http://mythemeshop.com/">MyThemeShop</a>, перевел <a href="http://wp-templates.ru/">WP-Templates.ru</a>, <a href="http://searchtimes.ru/">поддержка</a>.'
						),
	
					array(
						'id' => 'mts_pagenavigation',
						'type' => 'checkbox',
						'title' => __('Навигация', 'nhp-opts'),
						'sub_desc' => __('Включение и отключение навигации по страницам', 'nhp-opts'),
						'std' => '1'
						),	
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/stylesetting.png',
				'title' => __('Настройки дизайна', 'nhp-opts'),
				'desc' => __('<p class="description">Настроить внешний вид вашей теме, например, цвета, расположение и колонок, здесь.</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'mts_color_scheme',
						'type' => 'color',
						'title' => __('Цветовая схема', 'nhp-opts'), 
						'sub_desc' => __('Укажите желаемый цвет темы', 'nhp-opts'),
						'std' => '#FF6C00'
						),
					array(
						'id' => 'mts_layout',
						'type' => 'radio_img',
						'title' => __('Стиль сайдбара', 'nhp-opts'), 
						'sub_desc' => __('Выберите из <strong>2 разных вариантов</strong> для вашего сайта.', 'nhp-opts'),
						'options' => array(
										'cslayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/cs.png'),
										'sclayout' => array('img' => NHP_OPTIONS_URL.'img/layouts/sc.png')
											),
						'std' => 'cslayout'
						),
					array(
						'id' => 'mts_bg_color',
						'type' => 'color',
						'title' => __('Цвет фона', 'nhp-opts'), 
						'sub_desc' => __('Выберите желаемый цвет фона', 'nhp-opts'),
						'std' => '#EBEBEB'
						),
					array(
						'id' => 'mts_bg_pattern_upload',
						'type' => 'upload',
						'title' => __('Фоновое изображение', 'nhp-opts'), 
						'sub_desc' => __('Загрузите желаемое фоновое изображение', 'nhp-opts')
						),
					array(
						'id' => 'mts_custom_css',
						'type' => 'textarea',
						'title' => __('Custom CSS', 'nhp-opts'), 
						'sub_desc' => __('Вы можете ввести свои собственные CSS здесь для дальнейшей настройки темы. Это перекроет значение по умолчанию CSS на Вашем сайте.', 'nhp-opts')
						),																			
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/singlepost.png',
				'title' => __('Страница с записью', 'nhp-opts'),
				'desc' => __('<p class="description">Отсюда вы можете контролировать внешний вид и функциональность страницы с записями.</p>', 'nhp-opts'),
				'fields' => array(
					array(
						'id' => 'mts_headline_meta',
						'type' => 'button_set',
						'title' => __('Meta Инфо записи.', 'nhp-opts'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Используйте эту кнопку, чтобы показать или скрыть сообщения Мета информацию <strong>Имя автора и категории</strong> .', 'nhp-opts'),
						'std' => '1'
						),
					array(
						'id' => 'mts_related_posts',
						'type' => 'button_set',
						'title' => __('Похожие записи', 'nhp-opts'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Используйте эту кнопку, чтобы показать Похожие записи в конце страницы', 'nhp-opts'),
						'std' => '1'
						),
					array(
						'id' => 'mts_tags',
						'type' => 'button_set',
						'title' => __('Tag Links', 'nhp-opts'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Используйте эту кнопку, если вы хотите показать облако тегов ниже записи', 'nhp-opts'),
						'std' => '0'
						),
					array(
						'id' => 'mts_author_box',
						'type' => 'button_set',
						'title' => __('Об авторе', 'nhp-opts'), 
						'options' => array('0' => 'Off','1' => 'On'),
						'sub_desc' => __('Используйте эту кнопку, если вы хотите отобразить информацию об авторе.', 'nhp-opts'),
						'std' => '1'
						),
					)
				);
$sections[] = array(
				'icon' => NHP_OPTIONS_URL.'img/glyphicons/navsetting.png',
				'title' => __('Navigation', 'nhp-opts'),
				'desc' => __('<p class="description"><div class="controls"><b>Navigation settings can now be modified from the <a href="nav-menus.php">Menus Section</a>.</b><br></div></p>', 'nhp-opts')
				);
				
				
	$tabs = array();

	global $NHP_Options;
	$NHP_Options = new NHP_Options($sections, $args, $tabs);

}//function
add_action('init', 'setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function
?>