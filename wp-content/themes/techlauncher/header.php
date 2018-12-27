<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package techlauncher
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="Wrapper">
  <header>
    <div class="clearfix"></div>
    <div class="TL-main-nav">
        <div class="container">
          <div class="row">
              <div class="col-xs-12 col-sm-3">
                <div class="navbar-header">
                <!-- Logo -->
                <?php
                if(has_custom_logo()){
                  // Display the Custom Logo
                  the_custom_logo();
                }
                else { if( display_header_text() ){ ?>
                  <a class="navbar-brand" href="<?php echo esc_url(home_url( '/' )); ?>"><span class="Site-title"><?php bloginfo('name'); ?></span>
      			      <br>
                  <span class="Site-description"><?php echo esc_html(get_bloginfo( 'description', 'display' )); ?></span>   
                  </a>      
                <?php } } ?>
                <!-- Logo -->
                </div>
              </div>
              <div class="col-xs-12 col-sm-9 Main-Menu" >
                <nav class="navbar navbar-default navbar-static-top navbar-wp">
                  <!-- navbar-toggle -->
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-wp"> <span class="sr-only"><?php __('Toggle Navigation','techlauncher'); ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                  <!-- /navbar-toggle --> 
                  <!-- Navigation -->
                  
                  <div class="collapse navbar-collapse" id="navbar-wp">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'fallback_cb' => 'techlauncher_custom_navwalker::fallback' , 'walker' => new techlauncher_custom_navwalker() ) ); ?>

                  </div>
                  <!-- /Navigation -->
                </nav>
              </div>
          </div>
        </div>
    </div>
  </header>
  <!-- #masthead --> 
    <?php if( get_header_image() != '' ) : ?>
      <div class="container header-image-container">
          <div class="header-image-div">
            <img src="<?php echo esc_url( get_header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>" />
          </div>
      </div>
  <?php endif; ?>