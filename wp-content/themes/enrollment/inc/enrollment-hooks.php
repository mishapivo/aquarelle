<?php
/**
 * File to define the custom hook functions 
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 *
 */
/*------------------------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'enrollment_header_section_start' ) ):

	/**
	 * function for header section start
	 */

	function enrollment_header_section_start() {
		echo '<header id="masthead" class="site-header" role="banner">';
        echo '<div class="cv-container">';		
	}

endif;


if( ! function_exists( 'enrollment_site_branding' ) ):

	/**
	 * function for site branding
	 */

	function enrollment_site_branding() {
?>
		
		<div class="site-branding">
			<?php if ( the_custom_logo() ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div><!-- .site-logo -->
			<?php } ?>
			<?php 
				$site_title_option = get_theme_mod( 'header_textcolor' );
				if( $site_title_option != 'blank' ) {
			?>
				<div class="site-title-wrapper">
					<?php
					if ( is_front_page() || is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div><!-- .site-title-wrapper -->
			<?php 
				}
			?>
		</div><!-- .site-branding -->			
<?php
	}

endif;


if( ! function_exists( 'enrollment_primary_menu_section' ) ):

	/**
	 * function for primary menu
	 */

	function enrollment_primary_menu_section() {
?>
		<div class="menu-search-wrapper">
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<div class="menu-toggle hide"> <i class="fa fa-navicon"> </i> </div>
					<?php wp_nav_menu( array( 'theme_location' => 'enrollment_primary_menu', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->

				<?php
					$enrollment_menu_search_option = get_theme_mod( 'enrollment_menu_search_option', true );
					if( $enrollment_menu_search_option === true ) {
				?>
					<div class="header-search-wrapper">
		                <span class="search-main"><i class="fa fa-search"></i></span>
		                <div class="search-form-main clearfix">
							<div class="cv-container">
			                	<?php get_search_form(); ?>
			                </div>
			            </div>
		            </div><!-- .header-search-wrapper -->
	            <?php } ?>
        </div><!-- .menu-search-wrapper -->
<?php
	}

endif;


if( ! function_exists( 'enrollment_header_section_end' ) ):

	/**
	 * function for header section end
	 */

	function enrollment_header_section_end() {
        echo '</div><!-- .cv-container -->';
		echo '</header><!-- #masthead -->';
	}

endif;

/**
 * managed function for header section
 *
 * @since 1.1.0
 */
add_action( 'enrollment_header_section', 'enrollment_header_section_start', 5 );
add_action( 'enrollment_header_section', 'enrollment_site_branding', 10 );
add_action( 'enrollment_header_section', 'enrollment_primary_menu_section', 15 );
add_action( 'enrollment_header_section', 'enrollment_header_section_end', 20 );

/*------------------------------------------------------------------------------------------------------------------------------------*/

if( ! function_exists( 'enrollment_slider_wrapper_start' ) ):

	/**
	 * function for slider wrapper start
	 */

	function enrollment_slider_wrapper_start() {
		echo '<div class="enrollment-slider-wrapper">';
	}

endif;


if( ! function_exists( 'enrollment_slider_content' ) ):

	/**
	 * function for slider content
	 */

	function enrollment_slider_content() {
		$slider_cat_slug = get_theme_mod( 'enrollment_slider_category', 0 );
		$slider_read_more = get_theme_mod( 'enrollment_slider_read_more', __( 'Learn More', 'enrollment' ) );
		if( empty( $slider_cat_slug ) ) {
			return;
		}
		$slider_args = array(
			'post_type' 	=> 'post',
			'category_name'	=> sanitize_text_field( $slider_cat_slug )
		);
		$slider_query = new WP_Query( $slider_args );
		if( $slider_query->have_posts() ) {
			echo '<ul class="homepage-slider cS-hidden">';
			while ( $slider_query->have_posts() ) {
				$slider_query->the_post();
				if( has_post_thumbnail() ) {
	?>
					<li>
						<div class="single-slide">
							<div class="slider-overlay"> </div>
							<div class="slide-thumb">
								<?php the_post_thumbnail( 'full' ); ?>
							</div>
							<div class="slider-content-wrapper">
								<div class="cv-container">
                                    <div class="slider-content-block">
    									<h2 class="slide-title"><?php the_title(); ?></h2>
    									<div class="slide-content"><?php the_excerpt(); ?></div>
                                        <div class="slider-btn-wrap"><a class="slider-btn" href="<?php the_permalink(); ?>"> <?php echo esc_html( $slider_read_more ); ?> </a></div>
                                    </div>
								</div>
							</div><!-- .slider-content-wrapper -->
						</div><!-- .single-slide -->
					</li>
	<?php
				}
			}
			echo '</ul>';
		}
	}

endif;


if( ! function_exists( 'enrollment_slider_wrapper_end' ) ):

	/**
	 * function for slider wrapper end
	 */

	function enrollment_slider_wrapper_end() {
		echo '</div><!-- .enrollment-slider-wrapper -->';
	}

endif;

/**
 * managed function for slider section
 */
add_action( 'enrollment_slider_section', 'enrollment_slider_wrapper_start', 5 );
add_action( 'enrollment_slider_section', 'enrollment_slider_content', 10 );
add_action( 'enrollment_slider_section', 'enrollment_slider_wrapper_end', 15 );