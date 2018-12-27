<?php

function di_blog_post_thumbnail() {
	if( has_post_thumbnail() ) {
	?>
	<div class="post-thumbnail">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'aligncenter' ) ); ?>
	</div>
	<?php
	}
}

// Menu Fallback.
function di_blog_nav_fallback( $args ) {
	extract( $args );
	$output = null;
	if( $container ) {
		$output = '<' . $container;
		if ( $container_id ) {
			$output .= ' id="' . $container_id . '"';
		}
		if ( $container_class ) {
			$output .= ' class="' . $container_class . '"';
		}
		$output .= '>';
	}
	
	$output .= '<ul';
	if( $menu_id ) {
		$output .= ' id="' . $menu_id . '"';
	}
	if( $menu_class ) {
		$output .= ' class="' . $menu_class . '"';
	}
	$output .= '>';
	
	$output .= '<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item current_page_item active"><a class="nav-link" href="' . esc_url( home_url( '/' ) ) . '">'. __( 'Home', 'di-blog' ) .'</a></li>';
	
	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Blog', 'di-blog' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Responsive', 'di-blog' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'SEO Friendly', 'di-blog' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Customizable', 'di-blog' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Page Builder', 'di-blog' ) .'</a></li>';

	$output .= '<li class="menu-item menu-item-type-custom"><a class="nav-link" href="#">'. __( 'Typography', 'di-blog' ) .'</a></li>';
	
	$output .= '</ul>';
	if( $container ) {
		$output .= '</' . $container . '>';
	}
	echo $output;
}
