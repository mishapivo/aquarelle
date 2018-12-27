<?php
/**
 * Map / Contact Element
 *
 * Please do not edit this file. This file is part of the CyberChimps Framework and all modifications
 * should be made in a child theme.
 *
 * @category CyberChimps Framework
 * @package  Framework
 * @since    1.0
 * @author   CyberChimps
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v3.0 (or later)
 * @link     http://www.cyberchimps.com/
 */
// Don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

if ( ! class_exists( 'CyberChimpsContactUs' ) ) {

	class CyberChimpsContactUs {

		protected static $instance;
		public $options;

		/* Static Singleton Factory Method */

		public static function instance() {
			if ( ! isset( self::$instance ) ) {
				$className = __CLASS__;
				self::$instance = new $className;
			}

			return self::$instance;
		} //end of instance

		/**
		 * Initializes plugin variables and sets up WordPress hooks/actions.
		 *
		 * @return void
		 */
		protected function __construct() {
			add_action( 'map_contact', array( $this, 'render_display' ) );
			add_action( 'init', array( $this, 'meta_box' ) );

			$this->options = get_option( 'cyberchimps_options' );
		} //end of construct

		public function render_display() {

			global $post, $post_id;
                        if(is_page())
                        {
			$post_id = $post->ID;
                        $custom_contact_title =	        get_post_meta( $post->ID, 'custom_contact_title', true );
			$custom_contact_address =	get_post_meta( $post->ID, 'custom_contact_address', true );
			$custom_contact_number =	get_post_meta( $post->ID, 'custom_contact_number', true );
			$custom_contact_email =		get_post_meta( $post->ID, 'custom_contact_email', true );
			$contactus_element_text = 	get_post_meta( $post->ID, 'contactus_element_text', true );

                        }
                        else
                        {

                        $custom_contact_title =	        cyberchimps_get_option('custom_contact_title');
			$custom_contact_address =	cyberchimps_get_option('custom_contact_address');
			$custom_contact_number =	cyberchimps_get_option('custom_contact_number');
			$custom_contact_email =		cyberchimps_get_option('custom_contact_email');
			$contactus_element_text = 	cyberchimps_get_option('contactus_element_text');

                        }
                if (!empty($custom_contact_title) || !empty($custom_contact_number) || !empty($custom_contact_email) ) {
                        ?>

                            <style>
                                #map_contact_section{
                                  background-image:url('<?php echo get_template_directory_uri().'/cyberchimps/lib/images/contact_bg.jpg' ?>');
                                  background-position: center;
                                  background-size: cover;
								  margin: 60px 0;

                                }
                            </style>

                    <div id="contact_us" class="row-fluid">
                        <div class="span12">
                            <h2 class="contact_title"><?php if(!empty($custom_contact_title)){echo $custom_contact_title; }?></h2>
                        </div>
                        <div class="contactus_wrapper span12">

                                <div class="span6">
                                    <div class="span12 contact_left_sec">
                                        <?php if(!empty($custom_contact_address)){?>
                                        <div class="row-fluid contact_addr">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                    <div class="span1"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                                    <div class="span10"><?php echo esc_html($custom_contact_address);?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }
                                       if(!empty($custom_contact_number)){
                                        ?>
                                        <div class="row-fluid contact_addr">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                <div class="span1"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                                <div class="span10"><?php echo esc_html($custom_contact_number);?></div>
                                                </div>
                                            </div>
                                        </div>
                                       <?php }
                                        if(!empty($custom_contact_email)){
                                       ?>
                                        <div class="row-fluid contact_addr">
                                            <div class="span12">
                                                <div class="row-fluid">
                                                <div class="span1"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                                <div class="span10"><?php echo esc_html($custom_contact_email);?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>


                            <div class="span6">
                                 <div class="span12 contact_right_sec">
                                        <?php echo do_shortcode($contactus_element_text);?>
                                 </div>
                            </div>
                        </div>
                    </div>
			<?php
			}
		} //end of render_display

		public function meta_box() {

			$page_fields = array(
				array(
					'type'    => 'text',
					'id'      => 'custom_contact_title',
					'class'   => '',
					'name'    => __( 'Contact Section Title', 'cyberchimps_core' )
				),
				array(
					'type'    => 'text',
					'id'      => 'custom_contact_address',
					'class'   => '',
					'name'    => __( 'Contact Address', 'cyberchimps_core' )
				),
				array(
					'type'    => 'text',
					'id'      => 'custom_contact_number',
					'class'   => '',
					'name'    => __( 'Contact Number', 'cyberchimps_core' )
				),
				array(
					'type'    => 'text',
					'id'      => 'custom_contact_email',
					'class'   => '',
					'name'    => __( 'Contact Email', 'cyberchimps_core' )
				),

				array(
					'type'    => 'text',
					'id'      => 'contactus_element_text',
					'class'   => '',
					'name'    => __( 'Additional data', 'cyberchimps_core' ),
					'desc' => __('Recommended: Contact Form', 'cyberchimps_core')
				),



			);
			/*
			 * configure your meta box
			 */
			$page_config = array(
				'id'             => 'map_contact_options', // meta box id, unique per meta box
				'title'          => __( 'Custom Contact Options', 'cyberchimps_core' ), // meta box title
				'pages'          => array( 'page' ), // post types, accept custom post types as well, default is array('post'); optional
				'context'        => 'normal', // where the meta box appear: normal (default), advanced, side; optional
				'priority'       => 'high', // order of meta box: high (default), low; optional
				'fields'         => apply_filters( 'cyberchimps_custom_contact_metabox_fields', $page_fields, 'map_contact' ), // list of meta fields (can be added by field arrays)
				'local_images'   => false, // Use local or hosted images (meta box images for add/remove)
				'use_with_theme' => true //change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
			);

			/*
			 * Initiate your meta box
			 */
			$page_meta = new Cyberchimps_Meta_Box( $page_config );
		}

	}
}
CyberChimpsContactUs::instance();
