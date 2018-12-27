<?php
/**
 * Default custom background callback.
 *
 * @since WordPress 3.0.0
 */
 
 
function seasonal_custom_background() {
    // $background is the saved custom image, or the default image.
    $background = set_url_scheme( get_background_image() );
    
    $custom_post_background = false;
    
    if( is_singular() ) {
      global $post;
      
      $background_image_id = get_post_meta( $post->ID, 'sidebar_background_image_id', true );
      
      if( $background_image_id ) {
        $post_background_image = wp_get_attachment_image_src( $background_image_id, 'full' );
        
        if( $post_background_image ) {
          $custom_post_background = true;
          $background = esc_url( $post_background_image[0] );
        }
      }
    }
    
    // $color is the saved custom color.
    // A default has to be specified in style.css. It will not be printed here.
    $color = get_background_color();

    if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
      $color = false;
    }

    if ( ! $background && ! $color )
      return;

    $style = $color ? "background-color: #$color;" : '';
    $sidebar_before_opacity = '';
    
    if ( $background ) {
      $image = " background-image: url('$background');";

      $repeat = esc_html(get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) ) );
      if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
        $repeat = 'repeat';
      $repeat = " background-repeat: $repeat;";

      $position = esc_html(get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) ) );
      if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
        $position = 'left';
      $position = " background-position: top $position;";

      $attachment = esc_html(get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) ) );
      if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
        $attachment = 'scroll';
      $attachment = " background-attachment: $attachment;";

      $size = esc_html(get_theme_mod( 'background_image_size', 'cover' ) );
      if ( ! in_array( $size, array( 'auto', 'cover', 'contain' ) ) || $custom_post_background )
        $size = 'cover';
      $size = " background-size: $size;";

      $opacity = esc_attr(get_theme_mod( 'background_overlay_opacity', 0.3 ) );
      if( $opacity && is_numeric( $opacity ) && $opacity >= 0 && $opacity <= 1 )
        $sidebar_before_opacity = " opacity: $opacity;";      
		
		$style .= $image . $repeat . $position . $attachment . $size;			
		
	}
	
?>
<style type="text/css" id="custom-background-css">
.sidebar { <?php echo trim( $style ); ?> }
.custom-background .sidebar:before {<?php echo trim( $sidebar_before_opacity ); ?>}
</style>
<?php
}