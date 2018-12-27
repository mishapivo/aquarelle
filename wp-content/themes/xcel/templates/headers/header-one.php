<?php global $woocommerce; ?>
<div class="site-container">
	
	<div class="site-header-left">
		
		<?php if( get_header_image() ) : ?>
			<div class="site-branding-image">
            	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><img src="<?php esc_url( header_image() ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" /></a>
            </div>
        <?php else : ?>
	        <div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		<?php endif; ?>
		
	</div>
	
	<div class="site-header-right">
		
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<span class="header-menu-button"><i class="fa fa-bars"></i><span><?php echo esc_attr( get_theme_mod( 'xcel-header-menu-text', 'menu' ) ); ?></span></span>
            <div id="main-menu" class="main-menu-container">
                <div class="main-menu-close"><i class="fa fa-angle-right"></i><i class="fa fa-angle-left"></i></div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'main-navigation-inner' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
		
		<?php
        if ( xcel_is_woocommerce_activated() ) { ?>
            <div class="header-cart">
                <a class="header-cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart', 'xcel' ); ?>">
                    <span class="header-cart-amount">
                        <?php echo $woocommerce->cart->get_cart_total(); ?> <?php echo sprintf( _n( '(%d)', '(%d)', $woocommerce->cart->cart_contents_count, 'xcel' ), $woocommerce->cart->cart_contents_count ); ?>
                    </span>
                    <span class="header-cart-checkout<?php echo ( $woocommerce->cart->cart_contents_count > 0 ) ? ' cart-has-items' : ''; ?>">
                        <i class="fa fa-shopping-cart"></i>
                    </span>
                </a>
            </div>
        <?php
        } ?>
		
		<?php
        if( get_theme_mod( 'xcel-setting-header-search' ) ) :
            echo '<i class="fa fa-search search-btn"></i>';
        	echo '<div class="search-block">';
                get_search_form();
            echo '</div>';
        endif; ?>
        
    </div>
	
</div>