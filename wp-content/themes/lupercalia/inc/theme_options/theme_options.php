<?php

class lupercaliaSettings {

    private $general_settings_key = 'lupercalia_general_settings';
	private $front_settings_key = 'lupercalia_front_settings';
    private $blog_settings_key = 'lupercalia_blog_settings';
	private $contact_settings_key = 'lupercalia_contact_settings';
    private $options_key = 'lupercalia_options';
    private $settings_tabs = array();

    function __construct() {

		add_action( 'init', array( &$this, 'load_settings' ) );
		add_action( 'admin_init', array( $this, 'register_general_settings' ) );
		add_action( 'admin_init', array( $this, 'register_front_settings' ) );
		add_action( 'admin_init', array( $this, 'register_blog_settings' ) );
		add_action( 'admin_init', array( &$this, 'register_contact_settings' ) );
		add_action( 'admin_menu', array( &$this, 'add_admin_menus' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_header' ) );
	}

/* ----------------------------------------------------------------------- */	
/* LOAD VARIABLES
/* ----------------------------------------------------------------------- */	
	
	function load_settings() {
		$this->general_settings = (array) get_option( $this->general_settings_key );
		$this->front_settings = (array) get_option( $this->front_settings_key );
		$this->blog_settings = (array) get_option( $this->blog_settings_key );
		$this->contact_settings = (array) get_option( $this->contact_settings_key );

		// Merge with defaults
		$this->general_settings = array_merge( array(
			'logo' => '',
			'breadcrumb' => 'no',
			'color' => 'deeppink',
		), $this->general_settings );
		
		$this->front_settings = array_merge( array (
			'front_slider' => array (
				'height' => 40,
				'width' => 1280,
				'image' => array (
					0 => get_template_directory_uri().'/imgs/tmp/slider-sample.png'
				),
				'title' => array (
					0 => 'Image Title'
				),
				'desc' => array (
					0 => 'Image Description'
				),
				'url' => array (
					0 => ''
				),
				'target' => array (
					0 => '_self'
				),
			),
			'last_entries' => array (
				'show' => 'no',
				'title' => 'Last Entries From Blog',
				'category' => 0,
				'offset' => 0,
				'orderby' => 'asc'
			),
		
		
		), $this->front_settings );
		
		$this->blog_settings = array_merge( array(
			'blog_slider' => array (
				'show' => 'no',
				'category' => 0,
				'showposts' => 3,
				'offset' => 0,
				'orderby' => 'asc'
			),
			'related_posts' => array (
				'show' => 'no'
			),

		), $this->blog_settings );

		$this->contact_settings = array_merge( array(
			'facebook' => '',
			'flickr' => '',
			'gplus' => '',
			'instagram' => '',
			'linkedin' => '',
			'pinterest' => '',
			'tumblr' => '',
			'twitter' => '',
			'vimeo' => '',
			'youtube' => '',
			'address' => '',
			'phone' => '',
			'email' => '',
		), $this->contact_settings );
	}
	
/* ----------------------------------------------------------------------- */	
/* GENERAL SECTION AND FIELDS
/* ----------------------------------------------------------------------- */
	
	function register_general_settings() {
		$this->settings_tabs[$this->general_settings_key] = esc_html__('General', 'lupercalia');

		register_setting( $this->general_settings_key, $this->general_settings_key, array( $this, 'general_sanitize' ) );
		add_settings_section( 'section_general', esc_html__( 'General Settings.', 'lupercalia' ), array( &$this, 'section_general_desc' ), $this->general_settings_key );
		add_settings_field( 'logo', esc_html__('Logo', 'lupercalia'), array( &$this, 'general_logo_callback' ), $this->general_settings_key, 'section_general' );
		add_settings_field( 'breadcrumb', esc_html__('Breadcrumb', 'lupercalia'), array( &$this, 'general_breadcrumb_callback' ), $this->general_settings_key, 'section_general' );
		add_settings_field( 'color', esc_html__('Color Scheme', 'lupercalia'), array( &$this, 'general_color_callback' ), $this->general_settings_key, 'section_general' );
	}	
	
	function section_general_desc() { 
		echo esc_html__( 'Manage your general settings.', 'lupercalia' ); 
	}
	
	function general_logo_callback() {
		printf(
			'<input type="text" name="%1$s" size="80" class="logo_image" value="%2$s" placeholder="%3$s" />',
			esc_attr ( $this->general_settings_key ) . '[logo]',
			stripslashes( ( $this->general_settings['logo']) ), 
			esc_html__('Click on Upload Logo button to upload your logo', 'lupercalia')
		);
		
		printf(
			'<input type="submit" class="image_button button" value="%1$s" />',
			esc_html__('Upload Logo', 'lupercalia')
		);		
		
	}
	
	function general_breadcrumb_callback() {
		
		printf(
            '<input name="%1$s" value="yes" type="checkbox" %2$s />',
            esc_attr ( $this->general_settings_key ) . '[breadcrumb]',
			checked('yes', $this->general_settings['breadcrumb'], false)
		);
		esc_html_e('Check to hide it.', 'lupercalia');		
	
	}
	
	function general_color_callback() {
		?>
		<select name="<?php echo ( $this->general_settings_key ) . '[color]'; ?>" id="<?php echo ( $this->general_settings_key ) . '[color]'; ?>">
			<option class="level-0" value="burlywood" <?php selected( $this->general_settings['color'], 'burlywood' ); ?>>Burlywood</option>
			<option class="level-0" value="cadetblue" <?php selected( $this->general_settings['color'], 'cadetblue' ); ?>>Cadet Blue</option>
			<option class="level-0" value="coral" <?php selected( $this->general_settings['color'], 'coral' ); ?>>Coral</option>
			<option class="level-0" value="cornflowerblue" <?php selected( $this->general_settings['color'], 'cornflowerblue' ); ?>>Cornflower Blue</option>
			<option class="level-0" value="crimson" <?php selected( $this->general_settings['color'], 'crimson' ); ?>>Crimson</option>
			<option class="level-0" value="darkcyan" <?php selected( $this->general_settings['color'], 'darkcyan' ); ?>>Dark Cyan</option>
			<option class="level-0" value="darkorange" <?php selected( $this->general_settings['color'], 'darkorange' ); ?>>Dark Orange</option>
			<option class="level-0" value="darkorchid" <?php selected( $this->general_settings['color'], 'darkorchid' ); ?>>Dark Orchid</option>
			<option class="level-0" value="darkseagreen" <?php selected( $this->general_settings['color'], 'darkseagreen' ); ?>>Dark Sea Green</option>
			<option class="level-0" value="darkturquoise" <?php selected( $this->general_settings['color'], 'darkturquoise'  ); ?>>Dark Turquoise</option>
			<option class="level-0" value="deeppink" <?php selected( $this->general_settings['color'], 'deeppink' ); ?>>Deep Pink</option>			
			<option class="level-0" value="goldenrod" <?php selected( $this->general_settings['color'], 'goldenrod' ); ?>>Golden Rod</option>
			<option class="level-0" value="magenta" <?php selected( $this->general_settings['color'], 'magenta' ); ?>>Magenta</option>
		</select>
		<?php
	}
	
/* ----------------------------------------------------------------------- */	
/* GENERAL SANITIZE
/* ----------------------------------------------------------------------- */	

function general_sanitize( $input ) {
	
	$new_input = array();
	
	$new_input['logo'] = esc_url_raw( $input['logo'] );	
	
	$new_input['breadcrumb'] = $input['breadcrumb'];	
	
	$new_input['color'] = $input['color'];	
	
	return $new_input;
	
}

/* ----------------------------------------------------------------------- */	
/* FRONT-PAGE SECTION AND FIELDS
/* ----------------------------------------------------------------------- */
	
	function register_front_settings() {
		$this->settings_tabs[$this->front_settings_key] = esc_html__('Front Page', 'lupercalia');

		register_setting( $this->front_settings_key, $this->front_settings_key, array( $this, 'front_sanitize' ) );
		add_settings_section( 'section_front', esc_html__( 'Front-Page Settings.', 'lupercalia' ), array( &$this, 'section_front_desc' ), $this->front_settings_key );
		add_settings_field( 'front_slider', esc_html__( 'Slider Section', 'lupercalia' ), array( $this, 'front_slider_callback' ), $this->front_settings_key, 'section_front' );
		add_settings_field( 'last_entries', esc_html__( 'Last Entries Section', 'lupercalia' ), array( $this, 'last_entries_callback' ), $this->front_settings_key, 'section_front' );
	}

/* ----------------------------------------------------------------------- */	
/* FRONT-PAGE CALLBACK
/* ----------------------------------------------------------------------- */	

	function section_front_desc() { 
		echo esc_html__( 'Manage your front page settings.', 'lupercalia' ); 
	}

	/* FRONT PAGE SLIDER */	

	function front_slider_callback() { ?>
	
		<?php printf (
			'<input type="text" size="5" name="%1$s" value="%2$s" maxlength="4" />',
			esc_attr ( $this->front_settings_key ) . '[front_slider][width]',
			esc_attr ( $this->front_settings['front_slider']['width'] )
		); echo " X "; ?>
		
		<?php printf (
			'<input type="text" size="5" name="%1$s" value="%2$s" maxlength="2" />',
			esc_attr ( $this->front_settings_key ) . '[front_slider][height]',
			esc_attr ( $this->front_settings['front_slider']['height'] )
		); echo esc_html__(' width (px) x height (%)', 'lupercalia') ?> <br /><br />

		<div id="p_scents">
		
		<?php $arrayimg = count( $this->front_settings['front_slider']['image'] ); ?>
		
		<?php for ($i = 0; $i < $arrayimg; $i++) : ?>
		
			<?php printf(
				'<div class="first"><p><input type="text" id="p_scnt" size="64" name="%1$s" value="%2$s" placeholder="%3$s" class="%4$s" /> <input type="submit" class="button sliderbutton" id="%5$s" value="%6$s" /></p>',
				esc_attr ( $this->front_settings_key ) . '[front_slider][image]'.'['.$i.']',
				esc_url ( $this->front_settings['front_slider']['image'][$i] ), 
				esc_html__ ( 'Click on "upload image" button to choose your image', 'lupercalia' ),
				esc_attr ('slider_image_' . $i),
				esc_attr ($i),
				esc_html__('Upload Image', 'lupercalia') 
			); ?>
			
			<?php printf (
				'<p><input type="text" id="p_scnt" size="80" name="%1$s" value="%2$s" placeholder="%3$s" /></p>',
				esc_attr ( $this->front_settings_key ) . '[front_slider][title]'.'['.$i.']',
				esc_attr ( $this->front_settings['front_slider']['title'][$i] ),
				esc_html__ ( 'Type a title to this image(optional)', 'lupercalia' )
			); ?>
		
			<?php printf (
				'<p><input type="text" id="p_scnt" size="80" name="%1$s" value="%2$s" placeholder="%3$s" /></p>',
				esc_attr ( $this->front_settings_key ) . '[front_slider][desc]'.'['.$i.']',
				esc_attr ( $this->front_settings['front_slider']['desc'][$i] ),
				esc_html__ ( 'Type a description to this image(optional)', 'lupercalia' )
			); ?>
			
			<?php printf (
				'<p><input type="text" id="p_scnt" size="68" name="%1$s" value="%2$s" placeholder="%3$s" />',
				esc_attr ( $this->front_settings_key ) . '[front_slider][url]'.'['.$i.']',
				esc_url_raw ( $this->front_settings['front_slider']['url'][$i] ),
				esc_html__ ( 'Link to redirect the image(optional)', 'lupercalia' )
			); ?>
			
			<?php printf (
				'<select name="%1$s" id="%1$s"><option class="level-0" value="_self" %2$s >_self</option><option class="level-0" value="_blank" %3$s >_blank</option></select>',
				esc_attr ( $this->front_settings_key ) . '[front_slider][target]'.'['.$i.']',
				esc_attr ( selected( $this->front_settings['front_slider']['target'][$i], '_self', false ) ),
				esc_attr ( selected( $this->front_settings['front_slider']['target'][$i], '_blank', false ) )
			); ?>

			<a href="#" id="remScnt">X</a></p></div>	
		
		<?php endfor; ?>
		
	</div>	

	<div style="margin-top:30px;"><a href="#" id="addScnt"><?php esc_html_e('Add Slider Item', 'lupercalia'); ?></a></div>
	
	<?php }
	
	/* LAST ENTRIES */

	function last_entries_callback() { 
	
		echo "<table class='group'><tr><td>";
	
		printf(
            '<input name="%1$s" value="yes" type="checkbox" %2$s />',
            esc_attr ( $this->front_settings_key ) . '[last_entries][show]',
			checked('yes', $this->front_settings['last_entries']['show'], false)
		);
		esc_html_e('Check to hide it.', 'lupercalia');
		
		echo "</td><td>";
		
			echo esc_html__('Enable/Disable "Last Entries" section from the front page.', 'lupercalia');
		
		echo "</td></tr><tr><td>";
		
		printf(
			'<input type="text" name="%1$s" size="40" value="%2$s" />',
			esc_attr ( $this->front_settings_key ) . '[last_entries][title]',
			esc_attr ( $this->front_settings['last_entries']['title'] )			
		);
		
		echo "</td><td>";
		
			echo esc_html__('Give a title to the "Last Entries" section.', 'lupercalia');
		
		echo "</td></tr><tr><td>";
		
		wp_dropdown_categories('show_option_all='.esc_html__('All categories', 'lupercalia').'&hierarchical=1&orderby=name&selected='.$this->front_settings['last_entries']['category'].'&name='.$this->front_settings_key.'[last_entries][category]');
		
		echo "</td><td>";
		
			echo esc_html__('Pick which category to display on the "Last Entries" section.', 'lupercalia');
			
		echo "</td></tr><tr><td>";	
		
		printf(
            '<input type="text" name="%1$s" size="2" maxlength="1" value="%2$s" />',
			esc_attr ( $this->front_settings_key ) . '[last_entries][offset]',
			esc_attr ( $this->front_settings['last_entries']['offset'] )	
		);
		esc_html_e(' Post offset', 'lupercalia');

		echo "</td><td>";
		
			echo esc_html__('Choose the number of post(s) to be skipped.', 'lupercalia');		
		
		echo "</td></tr><tr><td>";	
		
		printf (
			'<select name="%1$s" id="%1$s"><option class="level-0" value="asc" %2$s >%3$s</option><option class="level-0" value="rand" %4$s >%5$s</option></select>',
			esc_attr ( $this->front_settings_key ) . '[last_entries][orderby]',
			esc_attr ( selected( $this->front_settings['last_entries']['orderby'], 'asc', false ) ),
			esc_html__('Ascending', 'lupercalia'),
			esc_attr ( selected( $this->front_settings['last_entries']['orderby'], 'rand', false ) ),
			esc_html__('Random', 'lupercalia')
		);
		
		echo "</td><td>";
		
			echo esc_html__('Choose how the post(s) should be displayed.', 'lupercalia');		
		
		echo "</td></tr></table>";
		
	}

/* ----------------------------------------------------------------------- */	
/* FRONT-PAGE SANITIZE
/* ----------------------------------------------------------------------- */	

function front_sanitize( $input ) {
	
	$new_input = array();
	
	/* FRONT PAGE SLIDER */
	
	$new_input['front_slider']['width'] = absint( $input['front_slider']['width'] );
	$new_input['front_slider']['height'] = absint( $input['front_slider']['height'] ); 
	
	foreach ( $input['front_slider']['image'] as $image ) :
		
		$new_input['front_slider']['image'][] = esc_url_raw($image); 
	
	endforeach;
	
	foreach ( $input['front_slider']['title'] as $title ) :
		
		$new_input['front_slider']['title'][] = sanitize_text_field($title); 
	
	endforeach;
	
	foreach ( $input['front_slider']['desc'] as $desc ) :
		
		$new_input['front_slider']['desc'][] = sanitize_text_field($desc); 
	
	endforeach;
	
	foreach ( $input['front_slider']['url'] as $url ) :
		
		$new_input['front_slider']['url'][] = esc_url_raw($url); 
	
	endforeach;
	
	foreach ( $input['front_slider']['target'] as $target ) :
		
		$new_input['front_slider']['target'][] = $target; 
	
	endforeach;
	
	/* LAST ENTRIES */
	
	$new_input['last_entries']['show'] = $input['last_entries']['show'];
	
	$new_input['last_entries']['title'] = sanitize_text_field( $input['last_entries']['title'] );
	
	$new_input['last_entries']['category'] = absint( $input['last_entries']['category'] );
	
	$new_input['last_entries']['offset'] = absint( $input['last_entries']['offset'] );
	
	$new_input['last_entries']['orderby'] = $input['last_entries']['orderby'];

	return $new_input;	

}

/* ----------------------------------------------------------------------- */	
/* BLOG SECTION AND FIELDS
/* ----------------------------------------------------------------------- */
	
	function register_blog_settings() {
		$this->settings_tabs[$this->blog_settings_key] = esc_html__('Blog', 'lupercalia');

		register_setting( $this->blog_settings_key, $this->blog_settings_key, array( $this, 'blog_sanitize' ) );
		add_settings_section( 'section_blog', esc_html__( 'Blog Settings.', 'lupercalia' ), array( &$this, 'section_blog_desc' ), $this->blog_settings_key );
		add_settings_field( 'blog_slider', esc_html__( 'Blog Slider', 'lupercalia' ), array( $this, 'blog_slider_callback' ), $this->blog_settings_key, 'section_blog' );
		add_settings_field( 'related_posts', esc_html__( 'Related Posts', 'lupercalia' ), array( $this, 'related_posts_callback' ), $this->blog_settings_key, 'section_blog' );

	}
	
/* ----------------------------------------------------------------------- */	
/* BLOG FIELDS CALLBACK
/* ----------------------------------------------------------------------- */	

	function section_blog_desc() { 
		echo esc_html__( 'Manage your blog settings.', 'lupercalia' ); 
	}		

	function blog_slider_callback() { 
	
		echo "<table class='group'><tr><td>";
	
		printf(
            '<input name="%1$s" value="yes" type="checkbox" %2$s />',
            esc_attr ( $this->blog_settings_key ) . '[blog_slider][show]',
			checked('yes', $this->blog_settings['blog_slider']['show'], false)
		);
		esc_html_e(' Check to hide it.', 'lupercalia');
		
		echo "</td><td>";
		
			echo esc_html__('Enable/Disable "Blog Slider" section from the blog page.', 'lupercalia');
		
		echo "</td></tr><tr><td>";
		
		wp_dropdown_categories('show_option_all='.esc_html__('All categories', 'lupercalia').'&hierarchical=1&orderby=name&selected='.$this->blog_settings['blog_slider']['category'].'&name='.$this->blog_settings_key.'[blog_slider][category]');
		
		echo "</td><td>";
		
			echo esc_html__('Pick which category to display on the "Blog Slider" section.', 'lupercalia');
	
		echo "</td></tr><tr><td>";	
		
		printf(
            '<input type="text" name="%1$s" size="2" maxlength="1" value="%2$s" />',
			esc_attr ( $this->blog_settings_key ) . '[blog_slider][showposts]',
			esc_attr ( $this->blog_settings['blog_slider']['showposts'] )	
		);
		esc_html_e(' Number of Posts', 'lupercalia');

		echo "</td><td>";
		
			echo esc_html__('Choose the number of post(s) to be displayed.', 'lupercalia');		
			
		echo "</td></tr><tr><td>";	
		
		printf(
            '<input type="text" name="%1$s" size="2" maxlength="1" value="%2$s" />',
			esc_attr ( $this->blog_settings_key ) . '[blog_slider][offset]',
			esc_attr ( $this->blog_settings['blog_slider']['offset'] )	
		);
		esc_html_e(' Post offset', 'lupercalia');

		echo "</td><td>";
		
			echo esc_html__('Choose the number of post(s) to be skipped.', 'lupercalia');		
		
		echo "</td></tr><tr><td>";	
		
		printf (
			'<select name="%1$s" id="%1$s"><option class="level-0" value="asc" %2$s >%3$s</option><option class="level-0" value="rand" %4$s >%5$s</option></select>',
			esc_attr ( $this->blog_settings_key ) . '[blog_slider][orderby]',
			esc_attr ( selected( $this->blog_settings['blog_slider']['orderby'], 'asc', false ) ),
			esc_html__('Ascending', 'lupercalia'),
			esc_attr ( selected( $this->blog_settings['blog_slider']['orderby'], 'rand', false ) ),
			esc_html__('Random', 'lupercalia')
		);
		
		echo "</td><td>";
		
			echo esc_html__('Choose how the post(s) should be displayed.', 'lupercalia');		
		
		echo "</td></tr></table>";
		
	}	
	
	function related_posts_callback() {
	
		printf(
            '<input name="%1$s" value="yes" type="checkbox" %2$s />',
            esc_attr ( $this->blog_settings_key ) . '[related_posts][show]',
			checked('yes', $this->blog_settings['related_posts']['show'], false)
		);
		esc_html_e(' Check to hide it.', 'lupercalia');

	}
	
/* ----------------------------------------------------------------------- */	
/* BLOG SANITIZE
/* ----------------------------------------------------------------------- */	
	
	function blog_sanitize( $input ) {
		
		$new_input = array();
		
		/* BLOG SLIDER */
		
		$new_input['blog_slider']['show'] = $input['blog_slider']['show'];
	
		$new_input['blog_slider']['category'] = absint( $input['blog_slider']['category'] );
	
		$new_input['blog_slider']['showposts'] = absint( $input['blog_slider']['showposts'] );
		
		$new_input['blog_slider']['offset'] = absint( $input['blog_slider']['offset'] );
	
		$new_input['blog_slider']['orderby'] = $input['blog_slider']['orderby'];

		/* RELATED POSTS */
		
		$new_input['related_posts']['show'] = $input['related_posts']['show'];
		
		return $new_input;
	
	}
	
	
/* ----------------------------------------------------------------------- */	
/* CONTACT SECTION AND FIELDS
/* ----------------------------------------------------------------------- */

	function register_contact_settings() {
		$this->settings_tabs[$this->contact_settings_key] = esc_html__('Contact', 'lupercalia');

		register_setting( $this->contact_settings_key, $this->contact_settings_key, array( $this, 'contact_sanitize' ) );
		add_settings_section( 'section_contact', esc_html__( 'Contact Settings.', 'lupercalia' ) , array( &$this, 'section_contact_desc' ), $this->contact_settings_key );
		add_settings_field( 'facebook', esc_html__('Facebook URL', 'lupercalia'), array($this, 'contact_facebook_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'flickr', esc_html__('Flickr URL', 'lupercalia'), array($this, 'contact_flickr_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'gplus', esc_html__('Google+ URL', 'lupercalia'), array($this, 'contact_gplus_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'instagram', esc_html__('Instagram URL', 'lupercalia'), array($this, 'contact_instagram_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'linkedin', esc_html__('Linkedin URL', 'lupercalia'), array($this, 'contact_linkedin_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'pinterest', esc_html__('Pinterest URL', 'lupercalia'), array($this, 'contact_pinterest_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'tumblr', esc_html__('Tumblr URL', 'lupercalia'), array($this, 'contact_tumblr_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'twitter', esc_html__('Twitter URL', 'lupercalia'), array($this, 'contact_twitter_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'vimeo', esc_html__('Vimeo URL', 'lupercalia'), array($this, 'contact_vimeo_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'youtube', esc_html__('YouTube URL', 'lupercalia'), array($this, 'contact_youtube_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'address', esc_html__('Address', 'lupercalia'), array($this, 'contact_address_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'phone', esc_html__('Phone Number', 'lupercalia'), array($this, 'contact_phone_callback'), $this->contact_settings_key, 'section_contact' );
		add_settings_field( 'email', esc_html__('Email', 'lupercalia'), array($this, 'contact_email_callback'), $this->contact_settings_key, 'section_contact' );
	}
	
/* ----------------------------------------------------------------------- */	
/* CONTACT FIELDS CALLBACK
/* ----------------------------------------------------------------------- */	

	function section_contact_desc() { 
		echo esc_html__( 'Manage your contact settings.', 'lupercalia' ); 
	}
	
	/* CONTACT FACEBOOK */
	
	function contact_facebook_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[facebook]',
			esc_attr ( $this->contact_settings['facebook'] ),
			esc_html__( 'www.facebook.com/user-or-page-name', 'lupercalia' )			
		);
	
	}
	
	/* CONTACT FLICKR */
	
	function contact_flickr_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[flickr]',
			esc_attr ( $this->contact_settings['flickr'] ),
			esc_html__( 'www.flickr.com/photos/username', 'lupercalia' )			
		);
	
	}	
	
	/* CONTACT GOOGLE PLUS */
	
	function contact_gplus_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[gplus]',
			esc_attr ( $this->contact_settings['gplus'] ),
			esc_html__( 'www.plus.google.com/user-number', 'lupercalia' )			
		);
	
	}

	/* CONTACT INSTAGRAM */
	
	function contact_instagram_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[instagram]',
			esc_attr ( $this->contact_settings['instagram'] ),
			esc_html__( 'www.instagram.com/username', 'lupercalia' )			
		);
	
	}
	
	/* CONTACT LINKEDIN */
	
	function contact_linkedin_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[linkedin]',
			esc_attr ( $this->contact_settings['linkedin'] ),
			esc_html__( 'www.linkedin.com/profile/view?id=id-number', 'lupercalia' )			
		);
	
	}

	/* CONTACT PINTEREST */
	
	function contact_pinterest_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[pinterest]',
			esc_attr ( $this->contact_settings['pinterest'] ),
			esc_html__( 'www.pinterest.com/username', 'lupercalia' )			
		);
	
	}	
	
	/* CONTACT TUMBLR */
	
	function contact_tumblr_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[tumblr]',
			esc_attr ( $this->contact_settings['tumblr'] ),
			esc_html__( 'username.tumblr.com', 'lupercalia' )			
		);
	
	}	
	
	/* CONTACT TWITTER */
	
	function contact_twitter_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[twitter]',
			esc_attr ( $this->contact_settings['twitter'] ),
			esc_html__( 'wwww.twitter.com/username', 'lupercalia' )			
		);
	
	}	
	
	/* CONTACT TWITTER */
	
	function contact_vimeo_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[vimeo]',
			esc_attr ( $this->contact_settings['vimeo'] ),
			esc_html__( 'www.vimeo.com/username', 'lupercalia' )			
		);
	
	}		
	
	/* CONTACT YOUTUBE */
	
	function contact_youtube_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[youtube]',
			esc_attr ( $this->contact_settings['youtube'] ),
			esc_html__( 'www.youtube.com/user/username', 'lupercalia' )			
		);
	
	}	
	
	/* CONTACT ADDRESS */
	
	function contact_address_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[address]',
			esc_attr ( $this->contact_settings['address'] ),
			esc_html__( 'Av. Street. etc', 'lupercalia' )			
		);
	
	}	

	/* CONTACT PHONE */
	
	function contact_phone_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[phone]',
			esc_attr ( $this->contact_settings['phone'] ),
			esc_html__( '+00 0000 0000', 'lupercalia' )			
		);
	
	}

	/* CONTACT EMAIL */
	
	function contact_email_callback() {
	
		printf(
            '<input type="text" name="%1$s" size="80" value="%2$s" placeholder="%3$s" />',
            esc_attr ( $this->contact_settings_key ) . '[email]',
			esc_attr ( $this->contact_settings['email'] ),
			esc_html__( 'name@provider', 'lupercalia' )			
		);
	
	}

/* ----------------------------------------------------------------------- */	
/* CONTACT SANITIZE
/* ----------------------------------------------------------------------- */	

function contact_sanitize( $input ) {
	
	$new_input = array();
	
	$new_input['facebook'] = ($input['facebook']) ? esc_url_raw($input['facebook']) : '';
	$new_input['flickr'] = ($input['flickr']) ? esc_url_raw($input['flickr']) : '';
	$new_input['gplus'] = ($input['gplus']) ? esc_url_raw($input['gplus']) : '';
	$new_input['instagram'] = ($input['instagram']) ? esc_url_raw($input['instagram']) : '';
	$new_input['linkedin'] = ($input['linkedin']) ? esc_url_raw($input['linkedin']) : '';
	$new_input['pinterest'] = ($input['pinterest']) ? esc_url_raw($input['pinterest']) : '';
	$new_input['tumblr'] = ($input['tumblr']) ? esc_url_raw($input['tumblr']) : '';
	$new_input['twitter'] = ($input['twitter']) ? esc_url_raw($input['twitter']) : '';
	$new_input['vimeo'] = ($input['vimeo']) ? esc_url_raw($input['vimeo']) : '';
	$new_input['youtube'] = ($input['youtube']) ? esc_url_raw($input['youtube']) : '';
	$new_input['address'] = ($input['address']) ? sanitize_text_field($input['address']) : '';
	$new_input['phone'] = ($input['phone']) ? sanitize_text_field($input['phone']) : '';
	$new_input['email'] = ($input['email']) ? sanitize_email($input['email']) : '';
	
	return $new_input;
	
}
	

/* ----------------------------------------------------------------------- */
/* ADD THEME OPTION MENU
/* ----------------------------------------------------------------------- */
	
	function add_admin_menus() {
		add_theme_page( 'lupercalia Settings', esc_html__('Theme Options', 'lupercalia'), 'edit_theme_options', $this->options_key, array( &$this, 'lupercalia_options_page' ) );
	}

/* ----------------------------------------------------------------------- */
/* TABS 
/* ----------------------------------------------------------------------- */	
	
	function options_tabs() {
		$current_tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->general_settings_key;

		screen_icon();
		echo '<h2 class="nav-tab-wrapper">';
		foreach ( $this->settings_tabs as $tab_key => $tab_caption ) {
			$active = $current_tab == $tab_key ? 'nav-tab-active' : '';
			echo '<a class="nav-tab ' . $active . '" href="?page=' . $this->options_key . '&tab=' . $tab_key . '">' . $tab_caption . '</a>';
		}
		echo '<a class="nav-tab" href="https://docs.google.com/document/d/1aBQ80-gAujy_wqnimnYYtPsYKK4QXNb1PQuSUcHe2nQ/" target="_blank">' . esc_html__('Help', 'lupercalia') . '</a>';
		echo '</h2>';

	}
	
/* ----------------------------------------------------------------------- */
/* PAGE
/* ----------------------------------------------------------------------- */	
	
	function lupercalia_options_page() {
		$tab = isset( $_GET['tab'] ) ? $_GET['tab'] : $this->general_settings_key;
		?>
		<div class="wrap">
			<?php $this->options_tabs(); ?>
			<form method="post" action="options.php">
				<?php wp_nonce_field( 'update-options' ); ?>
				<?php settings_fields( $tab ); ?>
				<?php do_settings_sections( $tab ); ?>
				<?php submit_button(); ?>
			</form>
		</div>
    <?php
	

	}	
	
	
	function admin_header() {
	
		wp_enqueue_script('admin-script', get_template_directory_uri().'/inc/theme_options/js/script.js', array('jquery'), '', true);
		wp_enqueue_style( 'admin-style', get_template_directory_uri() . "/inc/theme_options/style.css" );
		wp_enqueue_media();
	
	}

}

$lupercaliaSettings = new lupercaliaSettings();

?>