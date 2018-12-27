<?php 
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="logo">
    <?php if( has_custom_logo() ){ relief_medical_hospital_the_custom_logo();
      }else{ ?>
      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
    <?php $description = get_bloginfo( 'description', 'display' );
    if ( $description || is_customize_preview() ) : ?> 
      <p class="site-description"><?php echo esc_html($description); ?></p> 
    <?php endif; }?>
  </div>
  <div class="clear"></div>
</div> 