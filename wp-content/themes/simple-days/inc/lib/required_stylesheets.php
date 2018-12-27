<?php
defined( 'ABSPATH' ) || exit;

require_once ABSPATH . 'wp-admin/includes/file.php';
WP_Filesystem();
global $wp_filesystem;

$upload_dir = wp_upload_dir();

$check_file = $upload_dir['basedir']. '/simple_days_cache/style.min.css';

if ( file_exists ($check_file)) {
  $css_url = $check_file;
}else{
  $css_url = SIMPLE_DAYS_THEME_URI . 'assets/css/style.min.css';
}


if(get_theme_mod( 'simple_days_skin_style_random',false)){
  $skins_list = array('red_orange','orange','rose_peche','grape_juice','blue_yellow','blue_ocean','petrole','apple_green','yellow_mustard','brown_bread','gray_horse','black_coffee','moss_green','cinnamon');
}else{
  $skins_list = 'none';
}

if (!YA_AMP){

  
  if(get_theme_mod( 'simple_days_inline_style_css',false)){
    wp_register_style( 'simple_days_style', false, array(), wp_get_theme(get_template())->Version );
    wp_enqueue_style( 'simple_days_style' );
    wp_add_inline_style( 'simple_days_style', $wp_filesystem->get_contents( $css_url ) );


  }else{
    if ( file_exists ($check_file)) {
      $css_url = $upload_dir['baseurl'] . '/simple_days_cache/style.min.css';
    }
    wp_enqueue_style('simple_days_style', $css_url, array(), wp_get_theme(get_template())->Version);
  }
      //wp_enqueue_style('simple_days_style', SIMPLE_DAYS_THEME_URI . 'assets/css/style.min.css', array(), wp_get_theme(get_template())->Version);

  if($skins_list != 'none'){
    $skins_list_key = array_rand($skins_list);
    wp_enqueue_style('simple_days_skin_style', SIMPLE_DAYS_THEME_URI . 'assets/skins/'.$skins_list[$skins_list_key].'.min.css', array('simple_days_style'));
  }

  if ( is_customize_preview() ) {
    if(get_theme_mod( 'simple_days_skin_style','none') != 'none'){
      wp_enqueue_style('simple_days_skin_style', SIMPLE_DAYS_THEME_URI . 'assets/skins/'.get_theme_mod( 'simple_days_skin_style').'.min.css', array('simple_days_style'));
    }
  }

  
  $simple_days_plus_css = get_theme_mod( 'simple_days_plus_inline_style_css','none');
  if( $simple_days_plus_css != 'none'){
    if( $simple_days_plus_css == 'min')$simple_days_plus_css= 'min.css';
    $simple_days_plus_css = $wp_filesystem->get_contents(get_theme_file_path('style.'.$simple_days_plus_css));
    if ($simple_days_plus_css != ''){
      add_action( 'wp_enqueue_scripts', 'simple_days_plus_delete_stylesheets', 10000000 );
      wp_register_style( 'simple_days_plus', false, array('simple_days_style'), wp_get_theme(get_template())->Version );
      wp_enqueue_style( 'simple_days_plus' );
      wp_add_inline_style( 'simple_days_plus', $simple_days_plus_css );
    }
  }



  
  if ( is_singular() && comments_open() && get_option( 'thread_comments' )) {
   wp_enqueue_script( 'comment-reply' );
 }

}else{

 $yahman_option = get_option('yahman_addons') ;

 $amp_yahman['amp_word_balloon'] = isset($yahman_option['amp']['word_balloon']) ? true: false;




 
 if ( file_exists ($check_file)) {
   $css_url = $check_file;
 }else{
  $css_url = SIMPLE_DAYS_THEME_DIR . 'assets/css/style.min.css';
}
$css = $wp_filesystem->get_contents($css_url);
if ($css == ''){
  require_once ABSPATH . 'wp-load.php';
  $css_remote = wp_remote_get( $css_url );
  $css = $css_remote['body'];
}



if ( function_exists( 'has_blocks' ) ) {
  if(SIMPLE_DAYS_SIDEBAR){
    $css_url =  SIMPLE_DAYS_THEME_DIR . 'assets/css/gutenberg-front-style.min.css';
  }else{
    $css_url =  SIMPLE_DAYS_THEME_DIR . 'assets/css/gutenberg-front-one-column-style.min.css';
  }
  $css_gutenberg = $wp_filesystem->get_contents($css_url);
  if ($css_gutenberg == ''){
    $css_remote = wp_remote_get( $css_url );
    $css_gutenberg = $css_remote['body'];
  }
  $css .= $css_gutenberg;
}






if($skins_list != 'none'){
  $skins_list_key = array_rand($skins_list);
  $css_url =  SIMPLE_DAYS_THEME_DIR . 'assets/skins/'.$skins_list[$skins_list_key].'.min.css';
  $css_skin = $wp_filesystem->get_contents($css_url);
  if ($css_skin == ''){
    $css_remote = wp_remote_get( $css_url );
    $css_skin = $css_remote['body'];
  }
  $css .= $css_skin;


}


if (get_theme_file_uri('style.css') != SIMPLE_DAYS_THEME_URI .'/style.css'){
  $css_child = $wp_filesystem->get_contents(get_theme_file_path('style.min.css'));
  if ($css_child == ''){
    $css_child_remote = wp_remote_get( get_theme_file_uri('style.min.css'));
    $css_child = $css_child_remote['body'];
  }
  $css .= $css_child;
}

if( $amp_yahman['amp_word_balloon'] ){
  require_once ABSPATH . 'wp-admin/includes/plugin.php';
  if ( is_plugin_active( 'word-balloon/word-balloon.php' ) ) {
    $css_word_balloon = $wp_filesystem->get_contents(plugin_dir_path('word-balloon/css/word_balloon_user.min.css'));
    if ($css_word_balloon == ''){
      $css_word_balloon_remote = wp_remote_get( plugins_url('word-balloon/css/word_balloon_user.min.css'));
      $css_word_balloon = $css_word_balloon_remote['body'];
    }
    $css .= $css_word_balloon;
  }
}





$simpleicons_url = YAHMAN_ADDONS_DIR .'assets/fonts/simpleicons/style.min.css';
$simpleicons = $wp_filesystem->get_contents($simpleicons_url);
if ($simpleicons == ''){
  $simpleicons_remote = wp_remote_get( $simpleicons_url );
  $simpleicons = $simpleicons_remote['body'];
}


$css .= str_replace('url(\'simpleicons','url(\''.esc_url(YAHMAN_ADDONS_URI) .'assets/fonts/simpleicons/simpleicons',$simpleicons);
      //$fontawesome4 = $wp_filesystem->get_contents(SIMPLE_DAYS_THEME_URI .'assets/fonts/fontawesome/style.min.css');
      //$css .= str_replace('url(\'../fonts/','url(\''.esc_url(SIMPLE_DAYS_THEME_URI) .'assets/fonts/fontawesome/fonts/',$fontawesome4);








$css .= "\n";
$css .= wp_get_custom_css();
wp_register_style( 'amp-custom', false ); wp_enqueue_style( 'amp-custom' );
wp_add_inline_style( 'amp-custom', $css );


$maxcdn = 'https://maxcdn.bootstrapcdn.com';
wp_enqueue_style('font-awesome4_cdn', $maxcdn.'/font-awesome/4.7.0/css/font-awesome.min.css', array(), null);
}

if ( ! function_exists( 'simple_days_plus_delete_stylesheets' ) ) :
  function simple_days_plus_delete_stylesheets() {
    wp_dequeue_style( 'simple_days_plus_style' );
    wp_deregister_style( 'simple_days_plus_style' );
  }
endif;
