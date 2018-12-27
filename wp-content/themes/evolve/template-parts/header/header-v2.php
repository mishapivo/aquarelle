<header class="header-v2 header-wrapper" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
    <div class="top-bar py-2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-12">
					<?php if ( evolve_theme_mod( 'evl_social_links', 0 ) ) {
						evolve_social_media_links();
					} ?>
                </div>
                <div class="col-md-6 col-sm-12">

					<?php if ( class_exists( 'Woocommerce' ) ) {
						evolve_woocommerce_menu();
					} ?>

                </div>
            </div>
        </div>
    </div>
    <div class="header-pattern">

		<?php if ( get_header_image() ) {
			echo '<div class="custom-header">';
		} ?>

        <div class="header container">
            <div class="row align-items-center">

				<?php if ( '' != evolve_theme_mod( 'evl_header_logo', '' ) && evolve_logo_position() != "disable" && ( '' == evolve_theme_mod( 'evl_blog_title', '0' ) || evolve_theme_mod( 'evl_tagline_pos', 'disable' ) !== 'disable' ) ) { ?>
                <div class="col">
                    <div class="row align-items-center">
						<?php } ?>

						<?php if ( evolve_logo_position() != "disable" ) {
							evolve_header_logo();
						}

						get_template_part( 'template-parts/header/header', 'tagline-above' );

						if ( evolve_theme_mod( 'evl_blog_title', '0' ) != "1" ) {
							get_template_part( 'template-parts/header/header', 'website-title' );
						}

						get_template_part( 'template-parts/header/header', 'tagline-next-under' ); ?>

						<?php if ( '' != evolve_theme_mod( 'evl_header_logo', '' ) && evolve_logo_position() != "disable" && ( '' == evolve_theme_mod( 'evl_blog_title', '0' ) || evolve_theme_mod( 'evl_tagline_pos', 'disable' ) !== 'disable' ) ) { ?>
                    </div><!-- .row .align-items-center -->
                </div><!-- .col -->
			<?php } ?>

				<?php if ( evolve_theme_mod( 'evl_main_menu', false ) !== true ) {
					if ( has_nav_menu( 'primary-menu' ) ) {
						echo '<nav class="navbar navbar-expand-md main-menu mt-3 mt-md-0 order-3 col-sm-11' . ( evolve_theme_mod( 'evl_searchbox', true ) ? ' col-md-8' : ' col-md-9' ) . '">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-menu" aria-controls="primary-menu" aria-expanded="false" aria-label="' . __( "Primary", "evolve" ) . '">
                                    ' . evolve_get_svg( 'menu' ) . '
                                    </button>
                                <div id="primary-menu" class="collapse navbar-collapse" data-hover="dropdown" data-animations="fadeInUp fadeInDown fadeInDown fadeInDown">';
						wp_nav_menu( array(
							'theme_location' => 'primary-menu',
							'depth'          => 10,
							'container'      => false,
							'menu_class'     => 'navbar-nav mr-auto',
							'fallback_cb'    => 'evolve_custom_menu_walker::fallback',
							'walker'         => new evolve_custom_menu_walker()
						) );
						echo '</div></nav>';
					}
				} ?>

				<?php if ( evolve_theme_mod( 'evl_searchbox', true ) ) {
					evolve_header_search( '2' );
				} ?>

            </div><!-- .row .align-items-center -->
        </div><!-- .header .container -->

		<?php if ( get_header_image() ) {
			echo '</div><!-- .custom-header -->';
		} ?>

    </div><!-- .header-pattern -->
</header><!-- .header-v2 -->