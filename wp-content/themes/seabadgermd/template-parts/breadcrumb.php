<?php
// Breadcrumbs
// Source : https://www.thewebtaylor.com/articles/wordpress-creating-breadcrumbs-without-a-plugin
function seabadgermd_breadcrumbs() {
	// Settings
	if ( ! get_theme_mod( 'seabadgermd_breadcrumb_show', false ) ) {
		return;
	}
	$home_title = get_theme_mod( 'seabadgermd_breadcrumb_home', __( 'Homepage', 'seabadgermd' ) );

	// If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
	$custom_taxonomy = 'product_cat';

	// Get the query & post information
	global $post,$wp_query;

	// Do not display on the homepage
	if ( ! is_front_page() ) {

		// Build the breadcrums
		echo '<nav class="breadcrumb container themecolor">';

		// Home page
		echo '<a class="breadcrumb-item" href="' . esc_url( get_home_url() ) .
		'" title="' . esc_attr( $home_title ) . '">' . esc_html( $home_title ) . '</a>';

		if ( is_archive() && is_tax() && ! is_category() && ! is_tag() ) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if ( 'post' !== $post_type ) {

				$post_type_object  = get_post_type_object( $post_type );
				$post_type_archive = get_post_type_archive_link( $post_type );

				echo '<a class="breadcrumb-item" href="' . esc_attr( $post_type_archive ) .
				'" title="' . esc_html( wp_strip_all_tags( $post_type_object->labels->name ) ) .
				'">' . esc_html( $post_type_object->labels->name ) . '</a>';

			}

			$custom_tax_name = get_queried_object()->name;
			echo '<span class="breadcrumb-item active">' . esc_html( $custom_tax_name ) . '</span>';

		} elseif ( is_single() ) {

			// If post is a custom post type
			$post_type = get_post_type();

			// If it is a custom post type display name and link
			if ( 'post' !== $post_type ) {

				$post_type_object  = get_post_type_object( $post_type );
				$post_type_archive = get_post_type_archive_link( $post_type );

				echo '<a class="breadcrumb-item" href="' . esc_url( $post_type_archive ) .
				'" title="' . esc_attr( wp_strip_all_tags( $post_type_object->labels->name ) ) .
				'">' . esc_html( $post_type_object->labels->name ) . '</a>';
			}

			// Get post category info
			$category = get_the_category();

			if ( ! empty( $category ) ) {

				// Get last category post is in
				$categories    = array_values( $category );
				$last_category = end( $categories ); // end() expects variable

				// Get parent any categories and create array
				$get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
				$cat_parents     = explode( ',', $get_cat_parents );

				// Loop through parent categories and store in variable $cat_display
				$cat_display = '';
				foreach ( $cat_parents as $parents ) {
					$cat_display .= '<span class="breadcrumb-item">' . $parents . '</span>';
				}
			}

			// If it's a custom post type within a custom taxonomy
			$taxonomy_exists = taxonomy_exists( $custom_taxonomy );
			if ( empty( $last_category ) && ! empty( $custom_taxonomy ) && $taxonomy_exists ) {

				$taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
				$cat_id         = $taxonomy_terms[0]->term_id;
				$cat_nicename   = $taxonomy_terms[0]->slug;
				$cat_link       = get_term_link( $taxonomy_terms[0]->term_id, $custom_taxonomy );
				$cat_name       = $taxonomy_terms[0]->name;

			}

			// Check if the post is in a category
			if ( ! empty( $last_category ) ) {
				echo $cat_display;
				echo '<span class="breadcrumb-item active" title="' .
				the_title_attribute( array( 'echo' => false ) ) . '">' . get_the_title() . '</span>';

				// Else if post is in a custom taxonomy
			} elseif ( ! empty( $cat_id ) ) {

				echo '<a class="breadcrumb-item" href="' . esc_url( $cat_link ) .
				'" title="' . esc_attr( $cat_name ) . '">' . esc_html( $cat_name ) . '</a>';
				echo '<span class="breadcrumb-item active" title="' .
				the_title_attribute( array( 'echo' => false ) ) . '">' . get_the_title() . '</span>';

			} else {

				echo '<span class="breadcrumb-item active" title="' .
				the_title_attribute( array( 'echo' => false ) ) . '">' . get_the_title() . '</span>';

			}
		} elseif ( is_category() ) {

			// Category page
			echo '<span class="breadcrumb-item active">' . single_cat_title( '', false ) . '</span>';

		} elseif ( is_page() ) {

			// Standard page
			if ( $post->post_parent ) {

				// If child page, get parents
				$anc = get_post_ancestors( $post->ID );

				// Get parents in the right order
				$anc = array_reverse( $anc );

				// Parent page loop
				if ( ! isset( $parents ) ) {
					$parents = null;
				}
				foreach ( $anc as $ancestor ) {
					$parents .= '<a class="breadcrumb-item" href="' .
					esc_url( get_permalink( $ancestor ) ) .
					'" title="' . wp_strip_all_tags( get_the_title( $ancestor ) ) . '">' .
					get_the_title( $ancestor ) . '</a>';
				}

				// Display parent pages
				echo $parents;

				// Current page
				echo '<span class="breadcrumb-item active" title="' .
				the_title_attribute( array( 'echo' => false ) ) . '"> ' . get_the_title() . '</span>';

			} else {

				// Just display current page if not parents
				echo '<span class="breadcrumb-item active"> ' . get_the_title() . '</span>';

			}
		} elseif ( is_tag() ) {

			// Tag page

			// Get tag information
			$term_id       = get_query_var( 'tag_id' );
			$taxonomy      = 'post_tag';
			$args          = 'include=' . $term_id;
			$terms         = get_terms( $taxonomy, $args );
			$get_term_id   = $terms[0]->term_id;
			$get_term_slug = $terms[0]->slug;
			$get_term_name = $terms[0]->name;

			// Display the tag name
			echo '<span class="breadcrumb-item active">' . esc_html( $get_term_name ) . '</span>';

		} elseif ( is_day() ) {
			// Day archive
			// Year link
			echo '<a class="breadcrumb-item" href="' .
			esc_url( get_year_link( get_the_time( 'Y' ) ) ) .
			'" title="' . esc_html( get_the_time( 'Y' ) ) .
			'">' . esc_html( get_the_time( 'Y' ) ) . '</a>';
			// Month link
			echo '<a class="breadcrumb-item" href="' .
			esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) .
			'" title="' . esc_html( get_the_time( 'M' ) ) .
			'">' . esc_html( get_the_time( 'M' ) ) . '</a>';
			// Day display
			echo '<span class="breadcrumb-item active"> ' . esc_html( get_the_time( 'jS' ) ) . '</span>';
		} elseif ( is_month() ) {
			// Month Archive
			// Year link
			echo '<a class="breadcrumb-item" href="' .
			escl_url( get_year_link( get_the_time( 'Y' ) ) ) .
			'" title="' . esc_html( get_the_time( 'Y' ) ) . '">' .
			esc_html( get_the_time( 'Y' ) ) . '</a>';
			// Month display
			echo '<span class="breadcrumb-item active" title="' .
			esc_html( get_the_time( 'M' ) ) . '">' .
			esc_html( get_the_time( 'M' ) ) . '</span>';
		} elseif ( is_year() ) {
			// Display year archive
			echo '<span class="breadcrumb-item active" title="' .
			esc_html( get_the_time( 'Y' ) ) . '">' .
			esc_html( get_the_time( 'Y' ) ) . '</span>';
		} elseif ( is_author() ) {
			// Auhor archive
			// Get the author information
			global $author;
			$userdata = get_userdata( $author );
			// Display author name
			echo '<span class="breadcrumb-item active" title="' .
			esc_attr( $userdata->display_name ) . '"><i class="fa fa-user"></i> '
			. esc_html( $userdata->display_name ) . '</span>';
		} elseif ( get_query_var( 'paged' ) ) {
			// Paginated archives
			echo '<span class="breadcrumb-item active" title="' .
			esc_attr__( 'Page', 'seabadgermd' ) .
			esc_attr( get_query_var( 'paged' ) ) . '">' .
			esc_html__( 'Page', 'seabadgermd' ) . ' ' . esc_html( get_query_var( 'paged' ) ) .
			'</span>';
		} elseif ( is_404() ) {
			// 404 page
			echo '<span class="breadcrumb-item active">' .
			esc_html__( 'Not found', 'seabadgermd' ) . '</span>';
		} elseif ( is_archive() && ! is_tax() && ! is_category() && ! is_tag() ) {
			echo '<span class="breadcrumb-item active">' . post_type_archive_title( $prefix, false ) . '</span>';
		} // End if().
		if ( is_search() ) {
			// Search results page
			echo '<span class="breadcrumb-item active" title="' .
			esc_attr__( 'Search results for: ', 'seabadgermd' ) .
			esc_attr( wp_strip_all_tags( get_search_query() ) ) . '">' .
			esc_html__( 'Search results for: ', 'seabadgermd' ) . esc_html( get_search_query() ) .
			'</span>';
		}
		echo '</nav>';
	} // End if().
}

seabadgermd_breadcrumbs();
