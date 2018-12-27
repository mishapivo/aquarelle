<?php
/**
 * The template part for header
 *
 * @package IT Company Lite 
 * @subpackage it_company_lite
 * @since IT Company Lite 1.0
 */
?>

<div class="main-header">
  <div class="container">
    <div id="top-header">
      <div class="row m-0">
        <div class="col-lg-3 col-md-4">
          <div class="logo">
            <?php if( has_custom_logo() ){ it_company_lite_the_custom_logo();
              }else{ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
              <p class="site-description"><?php echo esc_html($description); ?></p>
            <?php endif; } ?>
          </div>
        </div>
        <div class="col-lg-9 col-md-8">
          <?php get_template_part( 'template-parts/header/navigation' ); ?>
        </div>      
      </div>
      <?php get_template_part( 'template-parts/header/lower-header' ); ?>
    </div>
  </div>
</div>