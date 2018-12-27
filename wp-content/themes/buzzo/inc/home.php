<?php
/**
 * Buzzo Home page module
 *
 * @package Buzzo
 */

/**
 * Class Buzzo_Home_Page
 */
class Buzzo_Home_Page {

	/**
	 * Class Buzzo_Home_Page construct.
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register' ) );

		add_action( 'widgets_init', array( $this, 'register_column_sidebars' ) );
	}


	/**
	 * Register customize settings.
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	public function register( $wp_customize ) {
		$wp_customize->add_panel( 'buzzo_home_page', array(
			'title'    => __( 'Sections page template', 'buzzo' ),
			'priority' => 85,
		) );

		/*
		 * Featured section.
		 */
		$wp_customize->add_section( 'buzzo_home_featured', array(
			'title' => __( 'Featured section', 'buzzo' ),
			'panel' => 'buzzo_home_page',
		) );

		// Featured category.
		$wp_customize->add_setting( 'buzzo_home_featured_cat', array(
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( 'buzzo_home_featured_cat', array(
			'label'   => __( 'Featured category', 'buzzo' ),
			'section' => 'buzzo_home_featured',
			'type'    => 'select',
			'choices' => $this->_get_option_cats(),
		) );

		// Featured background.
		$wp_customize->add_setting( 'buzzo_home_featured_bg_image', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'buzzo_home_featured_bg_image', array(
			'label'   => __( 'Featured background image', 'buzzo' ),
			'section' => 'buzzo_home_featured',
		) ) );

		// Number of posts.
		$wp_customize->add_setting( 'buzzo_home_featured_number', array(
			'default'           => 9,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( 'buzzo_home_featured_number', array(
			'label'   => __( 'Number of posts', 'buzzo' ),
			'section' => 'buzzo_home_featured',
			'type'    => 'text',
		) );

		foreach ( $this->_get_sections() as $section_name => $section_title ) {
			$this->_register_section_settings( $wp_customize, $section_name, $section_title );
		}

		/*
		 * Columns section.
		 */
		$wp_customize->add_section( 'buzzo_home_columns', array(
			'title' => __( 'Columns section', 'buzzo' ),
			'panel' => 'buzzo_home_page',
		) );

		// Show this section.
		$wp_customize->add_setting( 'buzzo_home_columns_show', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( 'buzzo_home_columns_show', array(
			'label'   => __( 'Show this section', 'buzzo' ),
			'section' => 'buzzo_home_columns',
			'type'    => 'checkbox',
		) );

		// Columns layout.
		$wp_customize->add_setting( 'buzzo_home_columns_layout', array(
			'default'           => '1_1_1',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( 'buzzo_home_columns_layout', array(
			'label'   => __( 'Columns layout', 'buzzo' ),
			'section' => 'buzzo_home_columns',
			'type'    => 'select',
			'choices' => $this->_get_option_columns_layout(),
		) );

		// Background color.
		$wp_customize->add_setting( 'buzzo_home_columns_bg_color', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'buzzo_home_columns_bg_color', array(
			'label' => __( 'Background color', 'buzzo' ),
			'section' => 'buzzo_home_columns',
		) ) );
	}

	/**
	 * Register home column sidebar.
	 */
	public function register_column_sidebars() {
		register_sidebars( 3, array(
			/* translators: %s: Home colunm sidebar number */
			'name'          => __( 'Home column %s', 'buzzo' ),
			'id'            => 'buzzo-home-column',
			'description'   => __( 'Use in section home columns', 'buzzo' ),
			'class'         => '',
			'before_widget' => '<div id="%1$s" class="%2$s widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="widget-title">',
			'after_title'   => '</div>',
		) );
	}

	/**
	 * Register home section settings.
	 *
	 * @param  object $wp_customize  WP_Customize object.
	 * @param  string $section_name  Section name.
	 * @param  string $section_title Section title.
	 */
	protected function _register_section_settings( $wp_customize, $section_name, $section_title ) {
		$section_id = 'buzzo_home_' . $section_name;

		$wp_customize->add_section( $section_id, array(
			'title' => $section_title,
			'panel' => 'buzzo_home_page',
		) );

		// Show this section.
		$wp_customize->add_setting( $section_id . '_show', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( $section_id . '_show', array(
			'label'   => __( 'Show this section', 'buzzo' ),
			'section' => $section_id,
			'type'    => 'checkbox',
		) );

		// Title.
		$wp_customize->add_setting( $section_id . '[title]', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $section_id . '[title]', array(
			'label'   => __( 'Title', 'buzzo' ),
			'section' => $section_id,
			'type'    => 'text',
		) );

		// Category.
		$wp_customize->add_setting( $section_id . '[cat]', array(
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( $section_id . '[cat]', array(
			'label'   => __( 'Choose category', 'buzzo' ),
			'section' => $section_id,
			'type'    => 'select',
			'choices' => $this->_get_option_cats(),
		) );

		// Number of posts.
		$wp_customize->add_setting( $section_id . '[number]', array(
			'default'           => 9,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( $section_id . '[number]', array(
			'label'   => __( 'Number of posts', 'buzzo' ),
			'section' => $section_id,
			'type'    => 'text',
		) );

		// Show list categories.
		$wp_customize->add_setting( $section_id . '[show_list_cats]', array(
			'default'           => false,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( $section_id . '[show_list_cats]', array(
			'label'       => __( 'Show list categories', 'buzzo' ),
			'description' => __( 'Display list categories in the bottom of section title.', 'buzzo' ),
			'section'     => $section_id,
			'type'        => 'checkbox',
		) );

		// List categories.
		$wp_customize->add_setting( $section_id . '[list_cats]', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $section_id . '[list_cats]', array(
			'label'   => __( 'List categories', 'buzzo' ),
			'section' => $section_id,
			'type'    => 'text',
			'active_callback' => $section_id . '_show_list_cats',
		) );

		// Show view more.
		$wp_customize->add_setting( $section_id . '[show_view_more]', array(
			'default'           => 'no',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $section_id . '[show_view_more]', array(
			'label'       => __( 'Show view more link', 'buzzo' ),
			'section'     => $section_id,
			'type'        => 'select',
			'choices'     => array(
				'no' => __( 'Not show', 'buzzo' ),
				'in_bottom' => __( 'In the bottom of section', 'buzzo' ),
				'in_list_cats' => __( 'In list categories', 'buzzo' ),
			),
		) );

		// View more text.
		$wp_customize->add_setting( $section_id . '[view_more_text]', array(
			'default'           => __( 'View more', 'buzzo' ),
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $section_id . '[view_more_text]', array(
			'label'   => __( 'View more text', 'buzzo' ),
			'section' => $section_id,
			'type'    => 'text',
			'active_callback' => $section_id . '_show_view_more',
		) );

		// View more url.
		$wp_customize->add_setting( $section_id . '[view_more_url]', array(
			'default'           => '#',
			'transport'         => 'refresh',
			'sanitize_callback' => 'esc_url',
		) );
		$wp_customize->add_control( $section_id . '[view_more_url]', array(
			'label'   => __( 'View more url', 'buzzo' ),
			'section' => $section_id,
			'type'    => 'url',
			'active_callback' => $section_id . '_show_view_more',
		) );

		// Title align.
		$wp_customize->add_setting( $section_id . '[title_align]', array(
			'default'           => 'left',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_text_field',
		) );
		$wp_customize->add_control( $section_id . '[title_align]', array(
			'label'       => __( 'Title align', 'buzzo' ),
			'section'     => $section_id,
			'type'        => 'select',
			'choices'     => array(
				'left'   => __( 'Left', 'buzzo' ),
				'center' => __( 'Center', 'buzzo' ),
				'right'  => __( 'Right', 'buzzo' ),
			),
		) );

		// Background color.
		$wp_customize->add_setting( $section_id . '[bg_color]', array(
			'default'           => '',
			'transport'         => 'refresh',
			'sanitize_callback' => 'sanitize_hex_color',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $section_id . '[bg_color]', array(
			'label' => __( 'Background color', 'buzzo' ),
			'section' => $section_id,
		) ) );

		// Priority.
		$wp_customize->add_setting( $section_id . '[priority]', array(
			'default'           => 0,
			'transport'         => 'refresh',
			'sanitize_callback' => 'absint',
		) );
		$wp_customize->add_control( $section_id . '[priority]', array(
			'label'       => __( 'Priority', 'buzzo' ),
			'description' => __( 'Lowest priority will be shown first.', 'buzzo' ),
			'section'     => $section_id,
			'type'        => 'text',
		) );
	}

	/**
	 * Get categories options.
	 *
	 * @return array
	 */
	protected function _get_option_cats() {
		$option_cats = get_categories( array(
			'hide_empty' => false,
			'fields'     => 'id=>name',
		) );

		$option_cats = array(
			0 => __( 'All categories', 'buzzo' ),
		) + $option_cats;

		return $option_cats;
	}

	/**
	 * Get sections options.
	 *
	 * @return array
	 */
	protected function _get_sections() {
		return array(
			'grid'     => __( 'Grid posts section', 'buzzo' ),
			'carousel' => __( 'Carousel posts section', 'buzzo' ),
			'grid_2'   => __( 'Grid-2 posts section', 'buzzo' ),
		);
	}

	/**
	 * Get home columns layout options.
	 *
	 * @return array
	 */
	protected function _get_option_columns_layout() {
		$options = array(
			'1_1_1' => '1/3 + 1/3 + 1/3',
			'2_1'   => '2/3 + 1/3',
			'1_2'   => '1/3 + 2/3',
			'3'     => '1/1',
		);

		return apply_filters( 'buzzo_home_option_columns_layout', $options );
	}

	/**
	 * Get sections data.
	 *
	 * @return array
	 */
	public static function get_sections_data() {
		$sections = array();
		$sections_name = array( 'grid', 'carousel', 'grid_2' );

		foreach ( $sections_name as $name ) {
			if ( ! get_theme_mod( 'buzzo_home_' . $name . '_show', true ) ) {
				continue;
			}

			$sections[ $name ] = get_theme_mod( 'buzzo_home_' . $name, array() );
		}

		uasort( $sections, array( __CLASS__, 'sort_sections' ) );

		return apply_filters( 'buzzo_home_sections_data', $sections );
	}

	/**
	 * Sort sections callback by priority.
	 *
	 * @param  array $section1 Section 1.
	 * @param  array $section2 Section 2.
	 * @return int
	 */
	public static function sort_sections( $section1, $section2 ) {
		if ( ! isset( $section1['priority'] ) ) {
			$section1['priority'] = 0;
		}

		if ( ! isset( $section2['priority'] ) ) {
			$section2['priority'] = 0;
		}

		if ( $section1['priority'] == $section2['priority'] ) {
			return 0;
		}

		return $section1['priority'] < $section2['priority'] ? -1 : 1;
	}

	/**
	 * Get home columns layout.
	 *
	 * @return string
	 */
	public static function get_home_columns_layout() {
		return get_theme_mod( 'buzzo_home_columns_layout', '1_1_1' );
	}

	/**
	 * Get home columns classes.
	 *
	 * @return array
	 */
	public static function get_home_columns_css_classes() {
		$layout = self::get_home_columns_layout();

		$classes = array();

		switch ( $layout ) {
			case '2_1':
				$classes = array( 'col-sm-8', 'col-sm-4' );
				break;

			case '1_2':
				$classes = array( 'col-sm-4', 'col-sm-8' );
				break;

			case '3':
				$classes = array( 'col-sm-12' );
				break;

			default:
				$classes = array( 'col-sm-4', 'col-sm-4', 'col-sm-4' );
		}

		return apply_filters( 'buzzo_home_columns_css_classes', $classes, $layout );
	}
}
new Buzzo_Home_Page();


function buzzo_home_grid_show_list_cats() {
	$data = get_theme_mod( 'buzzo_home_grid' );

	return ! empty( $data['show_list_cats'] );
}


function buzzo_home_carousel_show_list_cats() {
	$data = get_theme_mod( 'buzzo_home_carousel' );

	return ! empty( $data['show_list_cats'] );
}


function buzzo_home_grid_2_show_list_cats() {
	$data = get_theme_mod( 'buzzo_home_grid_2' );

	return ! empty( $data['show_list_cats'] );
}


function buzzo_home_grid_show_view_more() {
	$data = get_theme_mod( 'buzzo_home_grid' );

	return ! empty( $data['show_view_more'] ) && 'no' != $data['show_view_more'];
}


function buzzo_home_carousel_show_view_more() {
	$data = get_theme_mod( 'buzzo_home_carousel' );

	return ! empty( $data['show_view_more'] ) && 'no' != $data['show_view_more'];
}


function buzzo_home_grid_2_show_view_more() {
	$data = get_theme_mod( 'buzzo_home_grid_2' );

	return ! empty( $data['show_view_more'] ) && 'no' != $data['show_view_more'];
}


if ( ! function_exists( 'buzzo_featured_section' ) ) {
	/**
	 * Display featured posts section.
	 */
	function buzzo_featured_section() {
		$query_args = array(
			'posts_per_page'      => get_theme_mod( 'buzzo_home_featured_number', 9 ),
			'ignore_sticky_posts' => true,
		);

		if ( get_theme_mod( 'buzzo_home_featured_cat' ) ) {
			$query_args['cat'] = get_theme_mod( 'buzzo_home_featured_cat' );
		}

		$query = new WP_Query( $query_args );

		if ( ! $query->have_posts() ) {
			return;
		}
		?>
		<!-- Featured section -->
		<?php if ( get_theme_mod( 'buzzo_home_featured_bg_image' ) ) : ?>
			<section class="home-featured-posts" style="background-image: url(<?php echo esc_url( get_theme_mod( 'buzzo_home_featured_bg_image' ) ); ?>);">
		<?php else : ?>
			<section class="home-featured-posts no-bg">
		<?php endif; ?>

			<div class="home-featured-posts__data">
				<div class="home-featured-posts__first">
					<?php $query->the_post(); ?>
					<div class="container">
						<?php get_template_part( 'template-parts/loop-no-thumbnail' ); ?>
					</div>
				</div>

				<div class="home-featured-posts__bottom">
					<nav class="home-featured-posts__arrow">
						<a href="#" class="slick-arrow-prev slick-arrow" id="featured-carousel-prev"><span class="arrow arrow-left"></span></a>
						<a href="#" class="slick-arrow-next slick-arrow" id="featured-carousel-next"><span class="arrow arrow-right"></span></a>
					</nav>

					<?php if ( $query->have_posts() ) : ?>
						<div class="container">
							<div class="featured-carousel home-featured-posts__carousel">
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>
									<?php get_template_part( 'template-parts/loop-no-thumbnail' ); ?>
								<?php endwhile;
								wp_reset_postdata(); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
		<!-- / Feature section -->
		<?php
	}
} // End if().
add_action( 'buzzo_featured_section', 'buzzo_featured_section' );

/**
 * Display home sections.
 */
function buzzo_home_sections() {
	$sections = Buzzo_Home_Page::get_sections_data();

	foreach ( $sections as $section_name => $section_data ) {
		do_action( 'buzzo_home_section', $section_name, $section_data );
	}
}
add_action( 'buzzo_home_sections', 'buzzo_home_sections' );

if ( ! function_exists( 'buzzo_home_section_header' ) ) :
	/**
	 * Show home section header.
	 *
	 * @param  array $data Section data.
	 */
	function buzzo_home_section_header( $data ) {
		if ( empty( $data['title'] ) && empty( $data['show_list_cats'] ) ) {
			return;
		}

		$align_class = ! empty( $data['title_align'] ) ? 'text-' . $data['title_align'] : 'text-left';
		?>
		<header class="section-heading <?php echo esc_attr( $align_class ); ?>">
			<?php if ( ! empty( $data['title'] ) ) : ?>
				<div class="section-title">
					<?php echo esc_html( $data['title'] ); ?>
				</div>
			<?php endif; ?>

			<?php
			if ( ! empty( $data['show_list_cats'] ) ) {
				buzzo_home_section_list_cats( $data );
			}
			?>
		</header>
		<?php
	}
endif;

if ( ! function_exists( 'buzzo_home_section_view_more_link' ) ) :
	/**
	 * Show home section view more.
	 *
	 * @param  array   $data Section data.
	 * @param  boolean $echo Echo view more.
	 * @return string
	 */
	function buzzo_home_section_view_more_link( $data, $echo = true ) {
		$view_more_text = ! empty( $data['view_more_text'] ) ? $data['view_more_text'] : __( 'View more', 'buzzo' );
		$view_more_url = ! empty( $data['view_more_url'] ) ? $data['view_more_url'] : '#';

		$output = sprintf( '<a href="%s" class="view-more-link">%s</a>', esc_url( $view_more_url ), esc_html( $view_more_text ) );

		if ( ! $echo ) {
			return $output;
		}

		echo $output; // WPCS: xss ok.
	}
endif;

if ( ! function_exists( 'buzzo_home_section_list_cats' ) ) :
	/**
	 * Show home section list categories.
	 *
	 * @param  array $data Section data.
	 */
	function buzzo_home_section_list_cats( $data ) {
		$list_cats = ! empty( $data['list_cats'] ) ? explode( ',', $data['list_cats'] ) : array();
		$list_cats = array_map( 'trim', $list_cats );

		$output = '';
		foreach ( $list_cats as $cat_id ) {
			$cat_name = get_cat_name( $cat_id );

			if ( ! $cat_name ) {
				continue;
			}

			$cat_link = get_category_link( $cat_id );

			$output .= sprintf( '<a href="%s">%s</a>', esc_url( $cat_link ), esc_html( $cat_name ) );
		}

		if ( ! empty( $data['show_view_more'] ) && 'in_list_cats' == $data['show_view_more'] ) {
			$output .= buzzo_home_section_view_more_link( $data, false );
		}

		if ( ! empty( $output ) ) {
			printf( '<nav class="list-cats">%s</nav>', $output ); // WPCS: xss ok.
		}
	}
endif;

if ( ! function_exists( 'buzzo_home_section_footer' ) ) :
	/**
	 * Display home section footer.
	 *
	 * @param  array $data Section data.
	 */
	function buzzo_home_section_footer( $data ) {
		if ( ! empty( $data['show_view_more'] ) && 'in_bottom' == $data['show_view_more'] ) : ?>
			<footer class="section-footer">
				<div class="view-more">
					<?php buzzo_home_section_view_more_link( $data ) ?>
				</div>
			</footer>
		<?php endif;
	}
endif;

/**
 * Get home section query args.
 *
 * @param  array $data Section data.
 * @return array
 */
function buzzo_get_home_section_query_args( $data ) {
	$query_args = array(
		'ignore_sticky_posts' => true,
		'posts_per_page'      => ! empty( $data['number'] ) ? absint( $data['number'] ) : 9,
	);

	if ( ! empty( $data['cat'] ) ) {
		$query_args['cat'] = $data['cat'];
	}

	return apply_filters( 'buzzo_home_section_query_args', $query_args, $data );
}

/**
 * Display home section.
 *
 * @param  string $name Section name.
 * @param  array  $data Section data.
 */
function buzzo_home_section( $name, $data ) {
	$query_args = buzzo_get_home_section_query_args( $data );
	$query = new WP_Query( $query_args );

	if ( ! $query->have_posts() ) {
		return;
	}

	$custom_css = '';

	if ( ! empty( $data['bg_color'] ) ) {
		$custom_css = sprintf( 'style="background-color: %s;"', esc_attr( $data['bg_color'] ) );
	}
	?>
	<!-- Section -->
	<section class="buzzo-section <?php echo esc_attr( $name ); ?>-section" <?php print $custom_css; // WPCS: xss ok. ?>>
		<div class="container">
			<div class="<?php echo esc_attr( $name ); ?>-posts-section">
				<?php buzzo_home_section_header( $data ); ?>

				<div class="section-content">
					<?php
					do_action( 'buzzo_home_section_content_' . $name, $data, $query );
					?>
				</div>

				<?php buzzo_home_section_footer( $data ); ?>
			</div>
		</div>
	</section>
	<!-- / Section -->
	<?php
}
add_action( 'buzzo_home_section', 'buzzo_home_section', 10, 2 );


function buzzo_home_section_content_grid( $data, $query ) {
	$query->the_post(); ?>
	<div class="first-post">
		<?php get_template_part( 'template-parts/loop-grid-first' ); ?>
	</div>

	<?php if ( $query->found_posts > 1 ) : ?>
		<div class="row">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="col-xs-6 col-sm-3">
					<?php get_template_part( 'template-parts/loop-grid' ); ?>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	<?php endif;
}
add_action( 'buzzo_home_section_content_grid', 'buzzo_home_section_content_grid', 10, 2 );


function buzzo_home_section_content_carousel( $data, $query ) {
	?>
	<div class="row">
		<div class="carousel-posts">
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part( 'template-parts/loop-standard-overlay' ); ?>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
	<?php
}
add_action( 'buzzo_home_section_content_carousel', 'buzzo_home_section_content_carousel', 10, 2 );


function buzzo_home_section_content_grid_2( $data, $query ) {
	if ( ! $query->have_posts() ) {
		return;
	}

	$post_count = 0;
	?>
	<div class="row">
		<div class="col-md-9">
			<div class="row">
				<div class="col-md-8 col-md-push-4 col-center">
					<?php
					$query->the_post();

					get_template_part( 'template-parts/loop-grid-2-center' );

					$post_count++;
					?>
				</div>

				<?php if ( $query->found_posts > $post_count ) : ?>
					<div class="col-md-4 col-md-pull-8 col-left">
						<?php
						$count = 1;
						while ( $query->have_posts() ) {
							if ( $count > 2 ) {
								break;
							}

							$query->the_post();

							get_template_part( 'template-parts/loop-grid' );

							$post_count++;
							$count++;
						}
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( $query->found_posts > $post_count ) : ?>
			<div class="col-md-3 col-right">
				<?php
				$count = 1;
				while ( $query->have_posts() ) {
					if ( $count > 2 ) {
						break;
					}

					$query->the_post();

					get_template_part( 'template-parts/loop-grid' );

					$post_count++;
					$count++;
				}
				?>
			</div>
		<?php endif; ?>

		<?php if ( $query->found_posts > $post_count ) : ?>
			<div class="col-md-12 col-bottom">
				<div class="row">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
						<div class="col-sm-3">
							<?php get_template_part( 'template-parts/loop-grid' ); ?>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
	<?php
	wp_reset_postdata();
}
add_action( 'buzzo_home_section_content_grid_2', 'buzzo_home_section_content_grid_2', 10, 2 );

/**
 * Display home columns.
 */
function buzzo_home_columns() {
	$classes = Buzzo_Home_Page::get_home_columns_css_classes();

	if ( get_theme_mod( 'buzzo_home_columns_bg_color' ) ) :
		?>
		<div class="footer-columns" style="background-color: <?php echo esc_attr( get_theme_mod( 'buzzo_home_columns_bg_color' ) ); ?>">
	<?php else : ?>
		<div class="footer-columns">
	<?php endif; ?>

		<div class="container">
			<div class="row">
				<?php foreach ( $classes as $key => $value ) : ?>
					<div class="<?php echo esc_attr( $value ); ?>">
						<?php dynamic_sidebar( ( 0 == $key ) ? 'buzzo-home-column' : 'buzzo-home-column-' . ( $key + 1 ) ); ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php
}
add_action( 'buzzo_home_columns', 'buzzo_home_columns' );

/**
 * Add extra body class to home page.
 *
 * @param  array $classes Body classes.
 * @return array
 */
function buzzo_home_content_no_padding_top( $classes ) {
	if ( is_page_template( 'page-templates/sections.php' ) ) {
		$classes[] = 'content-no-padding';
		$classes[] = 'content-no-margin';
	}

	return $classes;
}
add_filter( 'body_class', 'buzzo_home_content_no_padding_top' );
