<?php
/**
 * The Header for our theme.
 * @package Ecommerce Solution
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'ecommerce-solution' ) ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="toggle"><a class="toggletopMenu" href="#"><?php esc_html_e('Woocommerce Menu','ecommerce-solution'); ?></a></div>

<div id="header">
  <div class="topbar">
    <div  class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <?php if ( get_theme_mod('ecommerce_solution_phone_number','') != "" ) {?>
            <p><i class="fas fa-phone"></i><?php echo esc_html( get_theme_mod('ecommerce_solution_phone_number',__('Call us: +00-123-4456-789','ecommerce-solution')) ); ?></p>
          <?php }?>
        </div>
        <div class="col-lg-8 col-md-8">
          <div class="nav">
            <?php wp_nav_menu( array('theme_location'  => 'topmenus') ); ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mid-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-12">
          <div class="logo">
            <?php if( has_custom_logo() ){ ecommerce_solution_the_custom_logo();
              }else{ ?>
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?> 
              <p class="site-description"><?php echo esc_html($description); ?></p>       
            <?php endif; }?>
          </div>     
        </div>
        <?php if(class_exists('woocommerce')){ ?>
          <div class="col-lg-6 col-md-8">
            <div class="search-cat-box">
              <div class="row">
                <div class="col-lg-6 col-md-6 border-cat">
                  <button class="product-btn"><i class="fa fa-bars" aria-hidden="true"></i><?php echo esc_html_e('ALL CATEGORIES','ecommerce-solution'); ?><i class="fas fa-sort-down"></i></button>
                  <div class="product-cat">
                    <?php
                      $args = array(
                        //'number'     => $number,
                        'orderby'    => 'title',
                        'order'      => 'ASC',
                        'hide_empty' => 0,
                        'parent'  => 0
                        //'include'    => $ids
                      );
                      $product_categories = get_terms( 'product_cat', $args );
                      $count = count($product_categories);
                      if ( $count > 0 ){
                          foreach ( $product_categories as $product_category ) {
                            $cat_id   = $product_category->term_id;
                            $cat_link = get_category_link( $cat_id );
                            if ($product_category->category_parent == 0) { ?>
                          <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                          <?php
                        }
                          echo esc_html( $product_category->name ); ?></a><i class="fas fa-chevron-right"></i></li>
                          <?php
                          }
                        }
                    ?>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <?php get_product_search_form()?>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
        <div class="col-lg-3 col-md-4 login-box">
          <?php if(class_exists('woocommerce')){ ?>
            <?php if ( is_user_logged_in() ) { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('My Account','ecommerce-solution'); ?>"><i class="fas fa-sign-in-alt"></i><?php esc_html_e('My Account','ecommerce-solution'); ?></a>
            <?php } 
            else { ?>
              <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_html_e('Login / Register','ecommerce-solution'); ?>"><i class="fas fa-user"></i><?php esc_html_e('Login / Register','ecommerce-solution'); ?></a>
            <?php } ?>
          <?php }?>
        </div>
      </div>
    </div>
  </div>

  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','ecommerce-solution'); ?></a></div>
  <div class="menu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10">
          <div class="nav">
            <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </div>
        </div>
        <div class="col-lg-2 col-md-2 cat-content">
          <?php if(class_exists('woocommerce')){ ?>
            <span class="cart_no">              
              <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_html_e( 'shopping cart','ecommerce-solution' ); ?>"><?php esc_html_e( 'Cart item','ecommerce-solution' ); ?><i class="fas fa-shopping-cart"></i></a>
              <span class="cart-value"> <?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
            </span>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>