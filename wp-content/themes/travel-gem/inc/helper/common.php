<?php
/**
 * Common helper functions
 *
 * @package Travel_Gem
 */

if ( ! function_exists( 'travel_gem_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length   Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance.
	 * @return string Excerpt.
	 */
	function travel_gem_the_excerpt( $length, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = strip_shortcodes( $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );

		return $trimmed_content;
	}

endif;

if ( ! function_exists( 'travel_gem_fonts_url' ) ) :

	/**
	 * Return fonts URL.
	 *
	 * @since 1.0.0
	 * @return string Font URL.
	 */
	function travel_gem_fonts_url() {

		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'travel-gem' ) ) {
			$fonts[] = 'Roboto:400italic,700italic,300,400,500,600,700';
		}

		/* translators: If there are characters in your language that are not supported by Poppins, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'travel-gem' ) ) {
			$fonts[] = 'Poppins:400italic,700italic,300,400,500,600,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}

endif;

if ( ! function_exists( 'travel_gem_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_primary_navigation_fallback() {

		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'travel-gem' ) . '</a></li>';

		$args = array(
			'posts_per_page' => 4,
			'post_type'      => 'page',
			'orderby'        => 'name',
			'order'          => 'ASC',
			);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {

			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
			}

			wp_reset_postdata();
		}

		echo '</ul>';
	}

endif;

if ( ! function_exists( 'travel_gem_get_single_post_category' ) ) :

	/**
	 * Get single post category.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Post $post_obj WP_Post instance.
	 * @param string $taxonomy Taxonomy.
	 * @return array Category details.
	 */
	function travel_gem_get_single_post_category( $post_obj = null, $taxonomy = 'category' ) {

		$output = array();

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$terms = get_the_terms( $post_obj, $taxonomy );

		if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
			$first_term = array_shift( $terms );
			$output['name']    = $first_term->name;
			$output['slug']    = $first_term->slug;
			$output['term_id'] = $first_term->term_id;
			$output['url']     = get_term_link( $first_term );
		}

		return $output;
	}

endif;

if ( ! function_exists( 'travel_gem_get_social_links' ) ) :

	/**
	 * Get social links.
	 *
	 * @since 1.0.0
	 *
	 * @return array Social links.
	 */
	function travel_gem_get_social_links() {

		$output = array();

		$social_links = travel_gem_get_option( 'social_links' );

		if ( ! empty( $social_links ) ) {
			$exploded = explode( '|', $social_links );
			if ( ! empty( $exploded ) ) {
				$output = $exploded;
			}
		}

		return $output;
	}

endif;

if ( ! function_exists( 'travel_gem_render_social_links' ) ) :

	/**
	 * Render social links.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_render_social_links( $type = 'circle' ) {

		$social_links = travel_gem_get_social_links();
		if ( empty( $social_links ) ) {
			return;
		}

		echo '<div class="social-links ' . esc_attr( $type ) . '">';
		echo '<ul>';
		foreach ( $social_links as $link ) {
			echo '<li><a href="' . esc_url( $link ) . '"></a></li>';
		}
		echo '</ul>';
		echo '</div>';
	}

endif;

if ( ! function_exists( 'travel_gem_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_simple_breadcrumb() {

		require_once trailingslashit( get_template_directory() ) . 'lib/breadcrumbs/breadcrumbs.php';

		$breadcrumb_home_text  = travel_gem_get_option( 'breadcrumb_home_text' );
		$breadcrumb_show_title = travel_gem_get_option( 'breadcrumb_show_title' );

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
			'show_title'  => ( true === $breadcrumb_show_title ) ? true : false,
			'labels'      => array(
				'home' => esc_html( $breadcrumb_home_text ),
				),
			);

		travel_gem_breadcrumb_trail( $breadcrumb_args );
	}

endif;

if ( ! function_exists( 'travel_gem_single_post_thumbnail' ) ) :

	/**
	 * Single post thumbnail.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_single_post_thumbnail() {

		if ( has_post_thumbnail() ) {

			$args = array(
				'class' => 'aligncenter',
			);
			echo '<div class="entry-thumb">';
			the_post_thumbnail( 'large', $args );
			echo '</div><!-- .entry-thumb -->';

		}
	}

endif;

if ( ! function_exists( 'travel_gem_archive_post_thumbnail' ) ) :

	/**
	 * Archive post thumbnail.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_archive_post_thumbnail() {

		$archive_image           = travel_gem_get_option( 'archive_image' );
		$archive_image_alignment = travel_gem_get_option( 'archive_image_alignment' );
		?>
		<div class="entry-thumb align<?php echo esc_attr( $archive_image_alignment ); ?>">
			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( esc_attr( $archive_image ) ); ?>
				<?php endif; ?>
			</a>
		</div><!-- .entry-thumb -->
		<?php
	}

endif;

if ( ! function_exists( 'travel_gem_render_site_branding' ) ) :

	/**
	 * Render site branding.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_render_site_branding() {

		$show_title   = travel_gem_get_option( 'show_title' );
		$show_tagline = travel_gem_get_option( 'show_tagline' );
		?>
		<div class="site-branding">
			<?php travel_gem_the_custom_logo(); ?>
			<?php if ( true === $show_title || true === $show_tagline ) : ?>
				<div id="site-identity">
					<?php if ( true === $show_title ) : ?>
						<?php if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif; ?>
					<?php endif; ?>
					<?php if ( true === $show_tagline ) : ?>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					<?php endif; ?>
				</div><!-- #site-identity -->
			<?php endif; ?>
		</div><!-- .site-branding -->
		<?php
	}

endif;

if ( ! function_exists( 'travel_gem_the_custom_logo' ) ) :

	/**
	 * Render logo.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_the_custom_logo() {

		if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		}

	}

endif;

if ( ! function_exists( 'travel_gem_render_contact_info' ) ) :

	/**
	 * Render contact info.
	 *
	 * @since 1.0.0
	 */
	function travel_gem_render_contact_info() {

		$contact_number  = travel_gem_get_option( 'contact_number' );
		$contact_email   = travel_gem_get_option( 'contact_email' );
		$contact_address = travel_gem_get_option( 'contact_address' );

		if ( empty( $contact_number ) && empty( $contact_email ) && empty( $contact_address ) ) {
			return;
		}
		?>
		<div id="quick-contact">
			<ul>
				<?php if ( ! empty( $contact_number ) ) : ?>
					<li class="quick-call">
						<a href="<?php echo esc_url( 'tel:' . preg_replace( '/\D+/', '', $contact_number ) ); ?>"><?php echo esc_html( $contact_number ); ?></a>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $contact_email ) ) : ?>
					<li class="quick-email">
						<a href="<?php echo esc_url( 'mailto:' . $contact_email ); ?>"><?php echo esc_html( antispambot( $contact_email ) ); ?></a>
					</li>
				<?php endif; ?>
				<?php if ( ! empty( $contact_address ) ) : ?>
					<li class="quick-address">
						<?php echo esc_html( $contact_address ); ?>
					</li>
				<?php endif; ?>
			</ul>
		</div><!-- #quick-contact -->
		<?php
	}

endif;

if ( ! function_exists( 'travel_gem_is_woocommerce_active' ) ) :

	/**
	 * Check if WooCommerce is active.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Active status.
	 */
	function travel_gem_is_woocommerce_active() {

		$output = false;

		if ( class_exists( 'WooCommerce' ) ) {
			$output = true;
		}

		return $output;
	}

endif;

if ( ! function_exists( 'travel_gem_render_trip_categories' ) ) :

	/**
	 * Render trip categories.
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id Post id.
	 * @param string $taxonomy Taxonomy.
	 *
	 * @return void
	 */
	function travel_gem_render_trip_categories( $post_id = null, $taxonomy = 'itinerary_types' ) {
		$terms = get_the_terms( $post_id, $taxonomy );

		if ( is_wp_error( $terms ) || empty( $terms ) || ! is_array( $terms ) ) {
			return;
		}

		$first_category = array_shift( $terms );
		?>
		<div class="trip-category-list">
			<a href="<?php echo esc_url( get_term_link( $first_category ) ); ?>"><?php echo esc_html( $first_category->name ); ?></a>
			<?php if ( ! empty( $terms ) ) : ?>
				<div class="trip-caret">
					<i class="fa fa-caret-down"></i>
					<div class="sub-category-items">
						<?php foreach ( $terms as $item ) : ?>
							<a href="<?php echo esc_url( get_term_link( $item ) ); ?>"><?php echo esc_html( $item->name ); ?></a>
						<?php endforeach; ?>
					</div><!-- .sub-category-items -->
				</div><!-- .trip-caret -->
			<?php endif; ?>
		</div><!-- .trip-category-list -->
		<?php
	}

endif;
