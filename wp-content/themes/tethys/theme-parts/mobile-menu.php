<div class="space-mobile-menu fixed">
	<div class="space-mobile-menu-block absolute">
		<div class="space-mobile-menu-header relative">
			<div class="space-mobile-menu-header-ins relative">
				<div class="space-header-logo text-center relative">
					<?php
						$custom_logo_id = get_theme_mod( 'custom_logo' );
						$logo = wp_get_attachment_image_src( $custom_logo_id , 'tethys-custom-logo' );
						$image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);

							if ( has_custom_logo() ) {
								echo '<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( get_bloginfo( 'name' ) ) .'"><img src="'. esc_url( $logo[0] ) .'" alt="'. esc_attr( $image_alt ) .'"></a>';
							} else {
								echo '<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( get_bloginfo( 'name' ) ) .'" class="text-logo">'. esc_html( get_bloginfo( 'name' ) ) .'<span>'. esc_html( get_bloginfo( 'description' ) ) .'</span></a>';
							}
					?>
				</div>
				<div class="space-mobile-search-form relative">
					<?php get_search_form(); ?>
				</div>
			</div>
			<div class="space-close-icon space-mobile-menu-close-button absolute">
				<div class="to-right absolute"></div>
				<div class="to-left absolute"></div>
			</div>
		</div>
		<div class="space-mobile-menu-list relative">
			<?php wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'main-menu', 'theme_location' => 'main-menu', 'depth' => 3, 'fallback_cb' => '__return_empty_string' ) ); ?>
		</div>
	</div>
</div>