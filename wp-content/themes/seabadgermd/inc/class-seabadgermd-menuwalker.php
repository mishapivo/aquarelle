<?php
/*
=================================================
Bootstrap 4.0.0-alpha2 nav walker extension class
Source: http://simonpadbury.github.io/2016/03/09/bootstrap-4-navbar-with-dropdowns-for-wordpress.html
=================================================
*/
class Seabadgermd_Menuwalker extends Walker_Nav_menu {

	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		// ul
			$indent = str_repeat( "\t", $depth ); // indents the outputted HTML
			$submenu = ( $depth > 0 ) ? ' sub-menu' : '';
			$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth themecolor\">\n";
	}

	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		// li a span

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
				$class_names = '';
				$value = '';

				$classes = empty( $item->classes ) ? array() : (array) $item->classes;

				$classes[] = ( $args->walker->has_children ) ? 'dropdown' : '';
				$classes[] = ( $item->current || $item->current_item_anchestor ) ? 'active' : '';
				$classes[] = 'nav-item';
				$classes[] = 'nav-item-' . $item->ID;
				$classes[] = 'themecolor';
		if ( $depth && $args->walker->has_children ) {
				$classes[] = 'dropdown-menu';
		}

				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = ' class="' . esc_attr( $class_names ) . '"';

				$id = apply_filters( 'nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args );
				$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

				$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

				$attributes = ! empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
				$attributes .= ! empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
				$attributes .= ! empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
				$attributes .= ! empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';

				$attributes .= ( $args->walker->has_children ) ? ' class="nav-link dropdown-toggle themecolor" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link themecolor"';

				$item_output = $args->before;
				$item_output .= ( $depth > 0 ) ? '<a class="dropdown-item themecolor"' . $attributes . '>' : '<a' . $attributes . '>';
				$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
				$item_output .= '</a>';
				$item_output .= $args->after;

				$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

	}
}
