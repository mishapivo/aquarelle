<?php
/**
 * The template part for header
 *
 * @package VW Health Coaching 
 * @subpackage vw_health_coaching
 * @since VW Health Coaching 1.0
 */
?>

<div class="main-header">
  <div class="main-header-inner">
    <div class="container">
      <div class="row m-0">
        <div class="col-lg-11 col-md-11 p-0">
          <?php get_template_part( 'template-parts/header/navigation' ); ?>
        </div>
        <div class="col-lg-1 col-md-1">
          <div class="search-box">
            <span><i class="fas fa-search"></i></span>
          </div>
        </div>
      </div>
      <div class="serach_outer">
        <div class="closepop"><i class="far fa-window-close"></i></div>
        <div class="serach_inner">
          <?php get_search_form(); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="logo">
    <div class="logo-inner">
      <?php if( has_custom_logo() ){ vw_health_coaching_the_custom_logo();
        }else{ ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
        <p class="site-description"><?php echo esc_html($description); ?></p>
      <?php endif; } ?>
    </div>
  </div>
</div>