<?php
/**
 *
 * Materia Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2017-2018 Iceable Media - Mathieu Sarrasin
 *
 * Navbar template
 *
 */

?>
<div id="nav-wrap">
	<?php

	$materia_responsive_menu = get_theme_mod( 'materia_mobile_menu', 'mobile' );

	if ( 'mobile' === $materia_responsive_menu ) :
		?>
		<span class="icefit-mobile-menu-open"><i class="fa fa-bars"></i></span>
		<?php
	endif;

	?>
	<div id="navbar" class="container">
		<?php

		wp_nav_menu(
			array(
				'container'       => 'nav',
				'container_class' => 'navigation main-nav',
				'theme_location'  => 'primary',
				'items_wrap'       => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>',
			)
		);

		if ( 'dropdown' === $materia_responsive_menu ) :
			materia_dropdown_nav_menu();
		endif;

		?>
	</div>

</div>
<?php

if ( 'mobile' === $materia_responsive_menu ) :
	?>
	<div id="icefit-mobile-menu">
		<?php
		echo '<span class="icefit-mobile-menu-close"><i class="fa fa-times-circle"></i></span>' . get_search_form( false );
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			)
		);
		?>
	</div>
	<?php
endif;
