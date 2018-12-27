<?php
add_action('wp_enqueue_scripts', 'greenigma_removeScripts' , 20);
function greenigma_removeScripts() {
//De-Queuing Styles sheet 
wp_dequeue_style( 'default',get_template_directory_uri() .'/css/default.css'); 
//EN-Queing Style sheet

	$parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
   
wp_enqueue_style('lite-brown', get_stylesheet_directory_uri() . '/green.css');
}?>
<?php
function greenigma_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'after_setup_theme', 'greenigma_add_editor_styles' );

?>