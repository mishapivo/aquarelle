<?php
/**
 * Moral Theme Customizer
 *
 * @package Moral
 */

/**
 * Get all the default values of the theme mods.
 */
function store_mall_get_default_mods() {
	$store_mall_default_mods = array(
		// Featured
		'store_mall_featured_title' => esc_html__( 'Featured Collection', 'store-mall' ),

		// Popular
		'store_mall_popular_title' => esc_html__( 'Popular Products', 'store-mall' ),

		// Testimonials
		'store_mall_testimonial_title' => esc_html__( 'Happy Customers', 'store-mall' ),

		// Blog section
		'store_mall_blog_section_title' => esc_html__( 'From Our Blog', 'store-mall' ),
	);

	return apply_filters( 'store_mall_default_mods', $store_mall_default_mods );
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function store_mall_customize_register( $wp_customize ) {
	/**
	 * Separator custom control
	 *
	 * @version 1.0.0
	 * @since  1.0.0
	 */
	class Store_Mall_Multi_Custom_Control extends WP_Customize_Control {
		/**
		 * Control type
		 *
		 * @var string
		 */
		public $type = 'store-mall-separator';

		/**
		 * Control type
		 *
		 * @var string
		 */
		public $content = '';

		/**
		 * Control method
		 *
		 * @since 1.0.0
		 */
		public function render_content() {
			if ( 'store-mall-separator' === $this->type ) : ?>
				<p><hr style="border-color: #222; opacity: 0.2;"></p>
			<?php endif; ?>

			<?php if ( 'store-mall-custom' === $this->type ) : ?>
				<?php echo wp_kses_post( $this->content );?>
			<?php endif; 
		}
	}

	class Store_Mall_Customize_Control_Range_Value extends WP_Customize_Control {
		public $type = 'range-value';

		/**
		* Add custom parameters to pass to the JS via JSON.
		*
		* @access public
		* @return void
		*/
	  	public function to_json() {
		  	parent::to_json();

		  	$this->json['link']    		= $this->get_link();
		  	$this->json['value']  		= $this->value();
		  	$this->json['id']      		= $this->id;
		  	$this->json['input_attrs']      		= $this->input_attrs;
	  	}

		/**
		 * Render the control's content.
		 *
		 */
		public function content_template() {
			?>
			<label>
		    	<# if ( data.label ) { #>
					<span class="customize-control-title">{{ data.label }}</span>
				<# } #>
				<div class="range-slider"  style="width:100%; display:flex;flex-direction: row;justify-content: flex-start;">
					<span  style="width:100%; flex: 1 0 0; vertical-align: middle;"><input class="range-slider__range" type="range" value="{{{ data.value }}}" 
						<# _.each( data.input_attrs, function( input_value, attr ) { #>
							{{{attr}}} = {{{input_value}}}
		        		<# } ) #>
						{{{ data.link }}}>
					<span class="range-slider__value">0</span></span>
				</div>
		    	<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>
			</label>
			<?php
		}
	}

	$wp_customize->register_control_type( 'Store_Mall_Customize_Control_Range_Value' );

	$default = store_mall_get_default_mods();

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'store_mall_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'store_mall_customize_partial_blogdescription',
		) );
	}

	/**
	 *
	 * 
	 * Header panel
	 *
	 * 
	 */
	// Header panel
	$wp_customize->add_panel(
		'store_mall_header_panel',
		array(
			'title' => esc_html__( 'Header', 'store-mall' ),
			'priority' => 100
		)
	);

	$wp_customize->get_section( 'title_tagline' )->panel         = 'store_mall_header_panel';
	$wp_customize->get_section( 'title_tagline' )->priority = 170;

	// Header image section
	$wp_customize->get_section( 'header_image' )->panel         = 'store_mall_header_panel';
	$wp_customize->get_section( 'header_image' )->priority = 180;

	// Header section
	$wp_customize->add_section(
		'store_mall_header_section',
		array(
			'title' => esc_html__( 'Header', 'store-mall' ),
			'panel' => 'store_mall_header_panel',
		)
	);

	// Header search form settings
	$wp_customize->add_setting(
		'store_mall_show_search',
		array(
			'sanitize_callback' => 'store_mall_sanitize_checkbox',
			'default' => true
		)
	);

	$wp_customize->add_control(
		'store_mall_show_search',
		array(
			'section'		=> 'store_mall_header_section',
			'label'			=> esc_html__( 'Show search.', 'store-mall' ),
			'type'			=> 'checkbox',
		)
	);

	if ( store_mall_is_woocommerce_activated() ) :
		// Header show account link settings
		$wp_customize->add_setting(
			'store_mall_show_ac_link',
			array(
				'sanitize_callback' => 'store_mall_sanitize_checkbox',
				'default' => true
			)
		);

		$wp_customize->add_control(
			'store_mall_show_ac_link',
			array(
				'section'		=> 'store_mall_header_section',
				'label'			=> esc_html__( 'Show account link.', 'store-mall' ),
				'type'			=> 'checkbox',
			)
		);

		// Header show cart link settings
		$wp_customize->add_setting(
			'store_mall_show_cart_link',
			array(
				'sanitize_callback' => 'store_mall_sanitize_checkbox',
				'default' => true
			)
		);

		$wp_customize->add_control(
			'store_mall_show_cart_link',
			array(
				'section'		=> 'store_mall_header_section',
				'label'			=> esc_html__( 'Show cart link.', 'store-mall' ),
				'type'			=> 'checkbox',
			)
		);

		// Header show woshlist settings
		$wp_customize->add_setting(
			'store_mall_show_wishlist',
			array(
				'sanitize_callback' => 'store_mall_sanitize_checkbox',
				'default' => true
			)
		);

		$wp_customize->add_control(
			'store_mall_show_wishlist',
			array(
				'section'		=> 'store_mall_header_section',
				'label'			=> esc_html__( 'Show wishlist link.', 'store-mall' ),
				'type'			=> 'checkbox',
			)
		);
	endif;

	/**
	 *
	 * 
	 * Home sections panel
	 *
	 * 
	 */
	// Home sections panel
	$wp_customize->add_panel(
		'store_mall_home_panel',
		array(
			'title' => esc_html__( 'Homepage', 'store-mall' ),
			'priority' => 105
		)
	);

	$wp_customize->get_section( 'static_front_page' )->panel         = 'store_mall_home_panel';

	// Your latest posts title setting
	$wp_customize->add_setting(	
		'store_mall_your_latest_posts_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'Blogs', 'store-mall' ),
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'store_mall_your_latest_posts_title',
		array(
			'section'		=> 'static_front_page',
			'label'			=> esc_html__( 'Title:', 'store-mall' ),
			'active_callback' => 'store_mall_is_latest_posts'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'store_mall_your_latest_posts_title', 
		array(
	        'selector'            => '.home.blog #page-header .page-title',
			'render_callback'     => 'store_mall_your_latest_posts_partial_title',
    	) 
    );

	/**
	 * Slider section
	 */
	// Slider section
	$wp_customize->add_section(
		'store_mall_slider',
		array(
			'title' => esc_html__( 'Slider', 'store-mall' ),
			'panel' => 'store_mall_home_panel',
		)
	);

	// Slider enable settings
	$wp_customize->add_setting(
		'store_mall_slider',
		array(
			'sanitize_callback' => 'store_mall_sanitize_select',
			'default' => 'disable'
		)
	);

	$choices =  array( 
					'disable' => esc_html__( '--Disable--', 'store-mall' ),
					'page' => esc_html__( 'Page', 'store-mall' ),
			 	);

	if ( store_mall_is_woocommerce_activated() ) {
		$choices['product'] = esc_html__( 'Products', 'store-mall' );
	}

	$wp_customize->add_control(
		'store_mall_slider',
		array(
			'section'		=> 'store_mall_slider',
			'label'			=> esc_html__( 'Content type:', 'store-mall' ),
			'description'			=> esc_html__( 'Choose where you want to render the content from.', 'store-mall' ),
			'type'			=> 'select',
			'choices'		=> $choices,
		)
	);

	// Slider overlay setting
	$wp_customize->add_setting(
		'store_mall_slider_overlay',
		array(
			'sanitize_callback' => 'store_mall_sanitize_number_range',
			'default' => 0,
		)
	);

	$wp_customize->add_control( new Store_Mall_Customize_Control_Range_Value( 
			$wp_customize,
			'store_mall_slider_overlay',
			array(
				'section'		=> 'store_mall_slider',
				'label'			=> esc_html__( 'Overlay value:', 'store-mall' ),
				'description'			=> esc_html__( 'Min: 0 | Max: 1', 'store-mall' ),
				'active_callback' => 'store_mall_if_slider_not_disabled',
				'type'			=> 'range-value',
				'input_attrs'	=> array( 'min' => 0, 'max' => 1, 'step' => 0.1 ),
			)
		)
	);

	// Slider number separator setting
	$wp_customize->add_setting(
		'store_mall_slider_num_separator',
		array(
			'sanitize_callback' => 'store_mall_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new Store_Mall_Multi_Custom_Control( 
		$wp_customize,
		'store_mall_slider_num_separator',
			array(
				'section'		=> 'store_mall_slider',
				'active_callback' => 'store_mall_if_slider_not_disabled',
				'type'			=> 'store-mall-separator',
			)
		)
	);

	$slider_num = 3;
	for ( $i=1; $i <= $slider_num; $i++ ) { 
		// Slider page setting
		$wp_customize->add_setting(
			'store_mall_slider_page_' . $i,
			array(
				'sanitize_callback' => 'store_mall_sanitize_dropdown_pages',
				'default' => 0,
			)
		);

		$wp_customize->add_control(
			'store_mall_slider_page_' . $i,
			array(
				'section'		=> 'store_mall_slider',
				'label'			=> esc_html__( 'Page ', 'store-mall' ) . $i,
				'type'			=> 'dropdown-pages',
				'active_callback' => 'store_mall_if_slider_page'
			)
		);

		if ( store_mall_is_woocommerce_activated () ) {
			// Slider product setting
			$wp_customize->add_setting(
				'store_mall_slider_product_' . $i,
				array(
					'sanitize_callback' => 'store_mall_sanitize_select',
					'default' => 0,
				)
			);

			$wp_customize->add_control(
				'store_mall_slider_product_' . $i,
				array(
					'section'		=> 'store_mall_slider',
					'label'			=> esc_html__( 'Product ', 'store-mall' ) . $i,
					'type'			=> 'select',
					'choices'		=> store_mall_get_woo_product(),
					'active_callback' => 'store_mall_if_slider_product'
				)
			);
		}
	}

	/**
	 * Featured section
	 */
	// Featured section
	$wp_customize->add_section(
		'store_mall_featured',
		array(
			'title' => esc_html__( 'Featured', 'store-mall' ),
			'panel' => 'store_mall_home_panel',
		)
	);

	if ( store_mall_is_woocommerce_activated () ) :
		// Featured enable settings
		$wp_customize->add_setting(
			'store_mall_featured',
			array(
				'sanitize_callback' => 'store_mall_sanitize_select',
				'default' => 'disable'
			)
		);

		$choices =  array( 
						'disable' => esc_html__( '--Disable--', 'store-mall' ),
				 	);

		if ( store_mall_is_woocommerce_activated() ) {
			$choices['featured-products'] = esc_html__( 'Featured products', 'store-mall' );
		}

		$wp_customize->add_control(
			'store_mall_featured',
			array(
				'section'		=> 'store_mall_featured',
				'label'			=> esc_html__( 'Content type:', 'store-mall' ),
				'description'			=> esc_html__( 'Choose where you want to render the content from.', 'store-mall' ),
				'type'			=> 'select',
				'choices'		=> $choices,
			)
		);

		// Featured title setting
		$wp_customize->add_setting(
			'store_mall_featured_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => $default['store_mall_featured_title'],
				'transport'	=> 'postMessage',
			)
		);

		$wp_customize->add_control(
			'store_mall_featured_title',
			array(
				'section'		=> 'store_mall_featured',
				'label'			=> esc_html__( 'Title:', 'store-mall' ),
				'active_callback' => 'store_mall_if_featured_not_disabled'
			)
		);

		$wp_customize->selective_refresh->add_partial( 
			'store_mall_featured_title', 
			array(
		        'selector'            => '#featured-products .section-title',
				'render_callback'     => 'store_mall_featured_partial_title',
	    	) 
	    );
	else: 
		// Testimonial number separator setting
		$wp_customize->add_setting(
			'store_mall_featured_woo_install',
			array(
				'sanitize_callback' => 'store_mall_sanitize_html',
			)
		);

		$wp_customize->add_control(
			new Store_Mall_Multi_Custom_Control( 
			$wp_customize,
			'store_mall_featured_woo_install',
				array(
					'section'		=> 'store_mall_featured',
					'type'			=> 'store-mall-custom',
					'content' => sprintf( esc_html__( '%1$sInstall & Activate WooCommerce%2$s for this section to work.%3$s', 'store-mall' ), '<h3><a target="_blank" href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '">', '</a>', '</h3>' ),
				)
			)
		);
	endif;

	/**
	 * Popular section
	 */
	// Popular section
	$wp_customize->add_section(
		'store_mall_popular',
		array(
			'title' => esc_html__( 'Popular', 'store-mall' ),
			'description' => esc_html__( 'Recommended image ratio: 2:3', 'store-mall' ),
			'panel' => 'store_mall_home_panel',
		)
	);

	if ( store_mall_is_woocommerce_activated () ) :
		// Popular enable settings
		$wp_customize->add_setting(
			'store_mall_popular',
			array(
				'sanitize_callback' => 'store_mall_sanitize_select',
				'default' => 'disable'
			)
		);

		$choices =  array( 
						'disable' => esc_html__( '--Disable--', 'store-mall' ),
				 	);

		if ( store_mall_is_woocommerce_activated() ) {
			$choices['popular-products'] = esc_html__( 'Popular products', 'store-mall' );
		}

		$wp_customize->add_control(
			'store_mall_popular',
			array(
				'section'		=> 'store_mall_popular',
				'label'			=> esc_html__( 'Content type:', 'store-mall' ),
				'description'			=> esc_html__( 'Choose where you want to render the content from.', 'store-mall' ),
				'type'			=> 'select',
				'choices'		=> $choices,
			)
		);

		// Popular title setting
		$wp_customize->add_setting(
			'store_mall_popular_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default' => $default['store_mall_popular_title'],
				'transport'	=> 'postMessage',
			)
		);

		$wp_customize->add_control(
			'store_mall_popular_title',
			array(
				'section'		=> 'store_mall_popular',
				'label'			=> esc_html__( 'Title:', 'store-mall' ),
				'active_callback' => 'store_mall_if_popular_not_disabled'
			)
		);

		$wp_customize->selective_refresh->add_partial( 
			'store_mall_popular_title', 
			array(
		        'selector'            => '#popular-products .section-title',
				'render_callback'     => 'store_mall_popular_partial_title',
	    	) 
	    );

		// Popular button url setting
		$wp_customize->add_setting(
			'store_mall_popular_btn_url',
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default' => '#',
			)
		);

		$wp_customize->add_control(
			'store_mall_popular_btn_url',
			array(
				'section'		=> 'store_mall_popular',
				'active_callback' => 'store_mall_if_popular_not_disabled',
				'label'			=> esc_html__( 'Button url:', 'store-mall' ),
			)
		);
	else: 
		// Testimonial number separator setting
		$wp_customize->add_setting(
			'store_mall_popular_woo_install',
			array(
				'sanitize_callback' => 'store_mall_sanitize_html',
			)
		);

		$wp_customize->add_control(
			new Store_Mall_Multi_Custom_Control( 
			$wp_customize,
			'store_mall_popular_woo_install',
				array(
					'section'		=> 'store_mall_popular',
					'type'			=> 'store-mall-custom',
					'content' => sprintf( esc_html__( '%1$sInstall & Activate WooCommerce%2$s for this section to work.%3$s', 'store-mall' ), '<h3><a target="_blank" href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '">', '</a>', '</h3>' ),
				)
			)
		);
	endif;

	/**
	 * CTA section
	 */
	// CTA section
	$wp_customize->add_section(
		'store_mall_cta',
		array(
			'title' => esc_html__( 'CTA', 'store-mall' ),
			'panel' => 'store_mall_home_panel',
		)
	);

	// CTA enable settings
	$wp_customize->add_setting(
		'store_mall_cta',
		array(
			'sanitize_callback' => 'store_mall_sanitize_select',
			'default' => 'disable'
		)
	);

	$wp_customize->add_control(
		'store_mall_cta',
		array(
			'section'		=> 'store_mall_cta',
			'label'			=> esc_html__( 'Content type:', 'store-mall' ),
			'description'			=> esc_html__( 'Choose where you want to render the content from.', 'store-mall' ),
			'type'			=> 'select',
			'choices'		=> array( 
					'disable' => esc_html__( '--Disable--', 'store-mall' ),
					'page' => esc_html__( 'Page', 'store-mall' ),
			 	)
		)
	);

	// CTA page setting
	$wp_customize->add_setting(
		'store_mall_cta_page',
		array(
			'sanitize_callback' => 'store_mall_sanitize_dropdown_pages',
			'default' => 0,
		)
	);

	$wp_customize->add_control(
		'store_mall_cta_page',
		array(
			'section'		=> 'store_mall_cta',
			'label'			=> esc_html__( 'Page:', 'store-mall' ),
			'type'			=> 'dropdown-pages',
			'active_callback' => 'store_mall_if_cta_page'
		)
	);

	/**
	 * Category tab section
	 */
	// Category tab section
	$wp_customize->add_section(
		'store_mall_cat_tab',
		array(
			'title' => esc_html__( 'Category tab', 'store-mall' ),
			'description' => esc_html__( 'Recommended image ratio: 2:3', 'store-mall' ),
			'panel' => 'store_mall_home_panel',
		)
	);

	if ( store_mall_is_woocommerce_activated() ) :
		// Category tab enable settings
		$wp_customize->add_setting(
			'store_mall_cat_tab_enable',
			array(
				'sanitize_callback' => 'store_mall_sanitize_checkbox',
				'default' => false
			)
		);

		$wp_customize->add_control(
			'store_mall_cat_tab_enable',
			array(
				'section'		=> 'store_mall_cat_tab',
				'label'			=> esc_html__( 'Enable category tab.', 'store-mall' ),
				'type'			=> 'checkbox',
			)
		);

		$cat_tab_num = 4;
		for ( $i=1; $i <= $cat_tab_num; $i++ ) { 
			// Slider product category setting
			$wp_customize->add_setting(
				'store_mall_cat_tab_cat_' . $i,
				array(
					'sanitize_callback' => 'store_mall_sanitize_select',
					'default' => 0,
				)
			);

			$wp_customize->add_control(
				'store_mall_cat_tab_cat_' . $i,
				array(
					'section'		=> 'store_mall_cat_tab',
					'label'			=> esc_html__( 'Product category ', 'store-mall' ) . $i,
					'type'			=> 'select',
					'choices'		=> store_mall_get_woo_product_cat(),
					'active_callback' => 'store_mall_if_category_tab_not_disabled'
				)
			);
		}
	else: 
		// Testimonial number separator setting
		$wp_customize->add_setting(
			'store_mall_cta_woo_install',
			array(
				'sanitize_callback' => 'store_mall_sanitize_html',
			)
		);

		$wp_customize->add_control(
			new Store_Mall_Multi_Custom_Control( 
			$wp_customize,
			'store_mall_cta_woo_install',
				array(
					'section'		=> 'store_mall_cat_tab',
					'type'			=> 'store-mall-custom',
					'content' => sprintf( esc_html__( '%1$sInstall & Activate WooCommerce%2$s for this section to work.%3$s', 'store-mall' ), '<h3><a target="_blank" href="' . esc_url( admin_url( 'themes.php?page=tgmpa-install-plugins' ) ) . '">', '</a>', '</h3>' ),
				)
			)
		);
	endif;

	/**
	 * Widget area section
	 */
	// Widget area section
	$wp_customize->add_section(
		'store_mall_widget_area',
		array(
			'title' => esc_html__( 'Widget area', 'store-mall' ),
			'panel' => 'store_mall_home_panel',
		)
	);

	// Widget area manage setting
	$wp_customize->add_setting(
		'store_mall_widget_area_info',
		array(
			'sanitize_callback' => 'store_mall_sanitize_html',
		)
	);

	$wp_customize->add_control(
		new Store_Mall_Multi_Custom_Control( 
		$wp_customize,
		'store_mall_widget_area_info',
			array(
				'section'		=> 'store_mall_widget_area',
				'type'			=> 'store-mall-custom',
				'content' => sprintf( __( '<label class="customize-control-title">Widget Area setting:</label>
					%1$sMange the widgets from here.%2$s OR Go to %3$sDashboard->Appearance->Widgets->Homepage Widget Area%4$s', 'store-mall' ), '<h4><a class="store-mall-widget-jump-to-widget"  href="#">', '</a>', '<a href="'. esc_url( admin_url( 'widgets.php' ) ) .'">', '</a></h4>' ),
			)
		)
	);

	/**
	 * Testimonial section
	 */
	// Testimonial section
	$wp_customize->add_section(
		'store_mall_testimonial',
		array(
			'title' => esc_html__( 'Testimonial', 'store-mall' ),
			'panel' => 'store_mall_home_panel',
		)
	);

	// Testimonial enable settings
	$wp_customize->add_setting(
		'store_mall_testimonial',
		array(
			'sanitize_callback' => 'store_mall_sanitize_select',
			'default' => 'disable'
		)
	);

	$wp_customize->add_control(
		'store_mall_testimonial',
		array(
			'section'		=> 'store_mall_testimonial',
			'label'			=> esc_html__( 'Content type:', 'store-mall' ),
			'description'			=> esc_html__( 'Choose where you want to render the content from.', 'store-mall' ),
			'type'			=> 'select',
			'choices'		=> array( 
					'disable' => esc_html__( '--Disable--', 'store-mall' ),
					'post' => esc_html__( 'Post', 'store-mall' ),
			 	)
		)
	);

	// Testimonial title setting
	$wp_customize->add_setting(
		'store_mall_testimonial_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => $default['store_mall_testimonial_title'],
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'store_mall_testimonial_title',
		array(
			'section'		=> 'store_mall_testimonial',
			'label'			=> esc_html__( 'Title:', 'store-mall' ),
			'active_callback' => 'store_mall_if_testimonial_not_disabled'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'store_mall_testimonial_title', 
		array(
	        'selector'            => '#testimonial-slider .section-title',
			'render_callback'     => 'store_mall_testimonial_partial_title',
    	) 
    );

	$testimonial_num = 3;
	for ( $i=1; $i <= $testimonial_num; $i++ ) { 
		// Testimonial post setting
		$wp_customize->add_setting(
			'store_mall_testimonial_post_' . $i,
			array(
				'sanitize_callback' => 'store_mall_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control(
			'store_mall_testimonial_post_' . $i,
			array(
				'section'		=> 'store_mall_testimonial',
				'label'			=> esc_html__( 'Post ', 'store-mall' ) . $i,
				'active_callback' => 'store_mall_if_testimonial_post',
				'type'			=> 'select',
				'choices'		=> store_mall_get_post_choices(),
			)
		);
	}

	/**
	 * Blog section section
	 */
	// Blog section section
	$wp_customize->add_section(
		'store_mall_blog_section',
		array(
			'title' => esc_html__( 'Blog section', 'store-mall' ),
			'description' => esc_html__( 'Recommended image ratio: 4:3', 'store-mall' ),
			'panel' => 'store_mall_home_panel',
		)
	);

	// Blog section enable settings
	$wp_customize->add_setting(
		'store_mall_blog_section',
		array(
			'sanitize_callback' => 'store_mall_sanitize_select',
			'default' => 'disable'
		)
	);

	$wp_customize->add_control(
		'store_mall_blog_section',
		array(
			'section'		=> 'store_mall_blog_section',
			'label'			=> esc_html__( 'Content type:', 'store-mall' ),
			'description'			=> esc_html__( 'Choose where you want to render the content from.', 'store-mall' ),
			'type'			=> 'select',
			'choices'		=> array( 
					'disable' => esc_html__( '--Disable--', 'store-mall' ),
					'recent-posts' => esc_html__( 'Recent Posts', 'store-mall' ),
			 	)
		)
	);

	// Blog section title setting
	$wp_customize->add_setting(
		'store_mall_blog_section_title',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => $default['store_mall_blog_section_title'],
			'transport'	=> 'postMessage',
		)
	);

	$wp_customize->add_control(
		'store_mall_blog_section_title',
		array(
			'section'		=> 'store_mall_blog_section',
			'label'			=> esc_html__( 'Title:', 'store-mall' ),
			'active_callback' => 'store_mall_if_blog_section_not_disabled'
		)
	);

	$wp_customize->selective_refresh->add_partial( 
		'store_mall_blog_section_title', 
		array(
	        'selector'            => '#latest-news .section-title',
			'render_callback'     => 'store_mall_blog_section_partial_title',
    	) 
    );

	/**
	 *
	 * General settings panel
	 * 
	 */
	// General settings panel
	$wp_customize->add_panel(
		'store_mall_general_panel',
		array(
			'title' => esc_html__( 'Advanced Settings', 'store-mall' ),
			'priority' => 107
		)
	);

	$wp_customize->get_section( 'colors' )->panel         = 'store_mall_general_panel';
	
	$wp_customize->get_section( 'background_image' )->panel         = 'store_mall_general_panel';
	$wp_customize->get_section( 'custom_css' )->panel         = 'store_mall_general_panel';

	/**
	 * General settings
	 */
	// General settings
	$wp_customize->add_section(
		'store_mall_general_section',
		array(
			'title' => esc_html__( 'General', 'store-mall' ),
			'panel' => 'store_mall_general_panel',
		)
	);

	// Breadcrumb enable setting
	$wp_customize->add_setting(
		'store_mall_breadcrumb_enable',
		array(
			'sanitize_callback' => 'store_mall_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'store_mall_breadcrumb_enable',
		array(
			'section'		=> 'store_mall_general_section',
			'label'			=> esc_html__( 'Enable breadcrumb.', 'store-mall' ),
			'type'			=> 'checkbox',
		)
	);

	// Backtop enable setting
	$wp_customize->add_setting(
		'store_mall_back_to_top_enable',
		array(
			'sanitize_callback' => 'store_mall_sanitize_checkbox',
			'default' => true,
		)
	);

	$wp_customize->add_control(
		'store_mall_back_to_top_enable',
		array(
			'section'		=> 'store_mall_general_section',
			'label'			=> esc_html__( 'Enable Scroll up.', 'store-mall' ),
			'type'			=> 'checkbox',
		)
	);

	/**
	 * Blog/Archive section 
	 */
	// Blog/Archive section 
	$wp_customize->add_section(
		'store_mall_archive_settings',
		array(
			'title' => esc_html__( 'Archive/Blog', 'store-mall' ),
			'description' => esc_html__( 'Settings for archive pages including blog page too.', 'store-mall' ),
			'panel' => 'store_mall_general_panel',
		)
	);

	// Archive excerpt setting
	$wp_customize->add_setting(
		'store_mall_archive_excerpt',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => esc_html__( 'View the post', 'store-mall' ),
		)
	);

	$wp_customize->add_control(
		'store_mall_archive_excerpt',
		array(
			'section'		=> 'store_mall_archive_settings',
			'label'			=> esc_html__( 'Excerpt more text:', 'store-mall' ),
		)
	);

	// Archive excerpt length setting
	$wp_customize->add_setting(
		'store_mall_archive_excerpt_length',
		array(
			'sanitize_callback' => 'store_mall_sanitize_number_range',
			'default' => 60,
		)
	);

	$wp_customize->add_control(
		'store_mall_archive_excerpt_length',
		array(
			'section'		=> 'store_mall_archive_settings',
			'label'			=> esc_html__( 'Excerpt more length:', 'store-mall' ),
			'type'			=> 'number',
			'input_attrs'   => array( 'min' => 5 ),
		)
	);

	// Pagination type setting
	$wp_customize->add_setting(
		'store_mall_archive_pagination_type',
		array(
			'sanitize_callback' => 'store_mall_sanitize_select',
			'default' => 'numeric',
		)
	);

	$archive_pagination_description = '';
	$archive_pagination_choices = array( 
				'disable' => esc_html__( '--Disable--', 'store-mall' ),
				'numeric' => esc_html__( 'Numeric', 'store-mall' ),
				'older_newer' => esc_html__( 'Older / Newer', 'store-mall' ),
			);
	if ( ! class_exists( 'JetPack' ) ) {
		$archive_pagination_description = sprintf( esc_html__( 'We recommend to install %1$sJetpack%2$s and enable %3$sInfinite Scroll%4$s feature for automatic loading of posts.', 'store-mall' ), '<a target="_blank" href="http://wordpress.org/plugins/jetpack">', '</a>', '<b>', '</b>' );
	} else {
		$archive_pagination_choices['infinite_scroll'] = esc_html__( 'Infinite Load', 'store-mall' );
	}
	$wp_customize->add_control(
		'store_mall_archive_pagination_type',
		array(
			'section'		=> 'store_mall_archive_settings',
			'label'			=> esc_html__( 'Pagination type:', 'store-mall' ),
			'description'			=>  $archive_pagination_description,
			'type'			=> 'select',
			'choices'		=> $archive_pagination_choices,
		)
	);

	if ( store_mall_is_woocommerce_activated() ) :
		// Woo products per page
		$wp_customize->add_setting(
			'store_mall_woo_products_per_page',
			array(
				'sanitize_callback' => 'store_mall_sanitize_number_range',
				'default' => 12,
			)
		);

		$wp_customize->add_control(
			'store_mall_woo_products_per_page',
			array(
				'section'		=> 'woocommerce_product_catalog',
				'label'			=> esc_html__( 'Products per page', 'store-mall' ),
				'type'			=> 'number',
				'input_attrs'	=> array( 'min' => 0 ),
			)
		);
	endif;
}
add_action( 'customize_register', 'store_mall_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function store_mall_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function store_mall_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function store_mall_customize_preview_js() {
	wp_enqueue_script( 'store-mall-customizer', get_theme_file_uri( '/assets/js/customizer.js' ), array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'store_mall_customize_preview_js' );

/**
 * Binds JS handlers for Customizer controls.
 */
function store_mall_customize_control_js() {


	wp_enqueue_style( 'store-mall-customize-style', get_theme_file_uri( '/assets/css/customize-controls.css' ), array(), '20151215' );

	wp_enqueue_script( 'store-mall-customize-control', get_theme_file_uri( '/assets/js/customize-control.js' ), array( 'jquery', 'customize-controls' ), '20151215', true );
	$localized_data = array( 
		'refresh_msg' => esc_html__( 'Refresh the page after Save and Publish.', 'store-mall' ),
		'reset_msg' => esc_html__( 'Warning!!! This will reset all the settings. Refresh the page after Save and Publish to reset all.', 'store-mall' ),
	);

	wp_localize_script( 'store-mall-customize-control', 'localized_data', $localized_data );
}
add_action( 'customize_controls_enqueue_scripts', 'store_mall_customize_control_js' );

/**
 *
 * Sanitization callbacks.
 * 
 */

/**
 * Checkbox sanitization callback example.
 * 
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function store_mall_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}


/**
 * HEX Color sanitization callback example.
 *
 * - Sanitization: hex_color
 * - Control: text, WP_Customize_Color_Control
 *
 */
function store_mall_sanitize_hex_color( $hex_color, $setting ) {
	// Sanitize $input as a hex value without the hash prefix.
	$hex_color = sanitize_hex_color( $hex_color );
	
	// If $input is a valid hex value, return it; otherwise, return the default.
	return ( ! is_null( $hex_color ) ? $hex_color : $setting->default );
}

/**
 * Image sanitization callback example.
 *
 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
 * send back the filename, otherwise, return the setting default.
 *
 * - Sanitization: image file extension
 * - Control: text, WP_Customize_Image_Control
 */
function store_mall_sanitize_image( $image, $setting ) {
	/*
	 * Array of valid image file types.
	 *
	 * The array includes image mime types that are included in wp_get_mime_types()
	 */
    $mimes = array(
        'jpg|jpeg|jpe' => 'image/jpeg',
        'gif'          => 'image/gif',
        'png'          => 'image/png',
        'bmp'          => 'image/bmp',
        'tif|tiff'     => 'image/tiff',
        'ico'          => 'image/x-icon',
        'svg'          => 'image/svg+xml'
    );
	// Return an array with file extension and mime_type.
    $file = wp_check_filetype( $image, $mimes );
	// If $image has a valid mime_type, return it; otherwise, return the default.
    return ( $file['ext'] ? $image : $setting->default );
}

/**
 * Select sanitization callback example.
 *
 * - Sanitization: select
 * - Control: select, radio
 */
function store_mall_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Drop-down Pages sanitization callback example.
 *
 * - Sanitization: dropdown-pages
 * - Control: dropdown-pages
 * 
 */
function store_mall_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

/**
 * Number Range sanitization callback example.
 *
 * - Sanitization: number_range
 * - Control: number, tel
 * 
 */
function store_mall_sanitize_number_range( $number, $setting ) {
	
	// Ensure input is an absolute integer.
	$number = floatval( $number );
	
	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;
	
	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );
	
	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );
	
	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );
	
	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_float( $number / $step ) ? $number : $setting->default );
}

/**
 * HTML sanitization callback example.
 *
 * - Sanitization: html
 * - Control: text, textarea
 *
 * @param string $html HTML to sanitize.
 * @return string Sanitized HTML.
 */
function store_mall_sanitize_html( $html ) {
	return wp_filter_post_kses( $html );
}

/**
 *
 * Active callbacks.
 * 
 */

/**
 * Check if the about is page
 */
function store_mall_if_cta_page( $control ) {
	return 'page' === $control->manager->get_setting( 'store_mall_cta' )->value();
}

/**
 * Check if the featured is not disabled
 */
function store_mall_if_featured_not_disabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'store_mall_featured' )->value();
}

/**
 * Check if the popular is not disabled
 */
function store_mall_if_popular_not_disabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'store_mall_popular' )->value();
}

/**
 * Check if the testimonial is not disabled
 */
function store_mall_if_testimonial_not_disabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'store_mall_testimonial' )->value();
}

/**
 * Check if the testimonial is post
 */
function store_mall_if_testimonial_post( $control ) {
	return 'post' === $control->manager->get_setting( 'store_mall_testimonial' )->value();
}

/**
 * Check if the slider is not disabled
 */
function store_mall_if_slider_not_disabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'store_mall_slider' )->value();
}

/**
 * Check if the category tab is not disabled
 */
function store_mall_if_category_tab_not_disabled( $control ) {
	return $control->manager->get_setting( 'store_mall_cat_tab_enable' )->value();
}

/**
 * Check if the slider is page
 */
function store_mall_if_slider_page( $control ) {
	return 'page' === $control->manager->get_setting( 'store_mall_slider' )->value();
}

/**
 * Check if the slider is product.
 */
function store_mall_if_slider_product( $control ) {
	return 'product' === $control->manager->get_setting( 'store_mall_slider' )->value();
}

/**
 * Check if the blog section is not disabled
 */
function store_mall_if_blog_section_not_disabled( $control ) {
	return 'disable' != $control->manager->get_setting( 'store_mall_blog_section' )->value();
}

/**
 * Selective refresh.
 */

/**
 * Selective refresh for featured title.
 */
function store_mall_featured_partial_title() {
	return esc_html( get_theme_mod( 'store_mall_featured_title' ) );
}

/**
 * Selective refresh for popular title.
 */
function store_mall_popular_partial_title() {
	return esc_html( get_theme_mod( 'store_mall_popular_title' ) );
}

/**
 * Selective refresh for testimonial title.
 */
function store_mall_testimonial_partial_title() {
	return esc_html( get_theme_mod( 'store_mall_testimonial_title' ) );
}

/**
 * Selective refresh for blog section title.
 */
function store_mall_blog_section_partial_title() {
	return esc_html( get_theme_mod( 'store_mall_blog_section_title' ) );
}

/**
 * Selective refresh for your latest posts title.
 */
function store_mall_your_latest_posts_partial_title() {
	return esc_html( get_theme_mod( 'store_mall_your_latest_posts_title' ) );
}