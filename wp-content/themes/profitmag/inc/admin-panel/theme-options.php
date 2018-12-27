<?php
/**
 * Magazine Theme Options
 * 
 * @package ProfitMag
 */


if( is_admin() ): // For admin view only

    
    function profitmag_enqueue_scripts() {
        wp_enqueue_media(); // for media upload
        
        // custom jquery
        wp_enqueue_script( 'profitmag_custom_js', get_template_directory_uri().'/inc/admin-panel/js/custom.js', array('jquery') );
        
        // JS for admin media
        wp_enqueue_script( 'profitmag-media-uploader', get_template_directory_uri().'/inc/admin-panel/js/media-uploader.js', array( 'jquery' ) );
        
        // CSS for admin panel
        wp_enqueue_style( 'profitmag_admin_css', get_template_directory_uri().'/inc/admin-panel/css/admin.css' );
                
    }
    add_action( 'admin_enqueue_scripts', 'profitmag_enqueue_scripts' );
    
    // Theme options default value
    $profitmag_default_options=array(
                             'responsive_design' => '',
                             'footer_copyright'  => get_bloginfo( 'name' ),
                             'media_upload' => '',
                             'webpage_layout' => 'Fullwidth',                             
                             'featured_block_beside' => '0',
                             'featured_block_one' => '0',
                             'no_of_block_one' => '6',
                             'featured_block_two' => '0',
                             'no_of_block_two' => '6',
                             'featured_block_three' => '0',
                             'no_of_block_three' => '10',
                             'featured_block_four' => '0',
                             'no_of_block_four' => '7',
                             'featured_block_left' => '0',
                             'no_of_block_left' => '3',
                             'featured_block_right' => '0',
                             'no_of_block_right' => '3',
                             
                             'left_cat_post_one' => '0',                             
                             'left_no_of_cat_post_one' => '3',
                             'left_cat_post_two' => '0',
                             'left_no_of_cat_post_two' => '3',
                             'left_sidebar_middle_ads' => '',
                             'left_sidebar_bottom_ads_one' => '',
                             'left_sidebar_bottom_ads_two' => '',
                             'right_cat_post_one' => '0',                             
                             'right_no_of_cat_post_one' => '3',
                             'right_cat_post_two' => '0',
                             'right_no_of_cat_post_two' => '3',
                             'right_sidebar_middle_ads' => '',
                             'right_sidebar_bottom_ads_one' => '',
                             'right_sidebar_bottom_ads_two' => '',       
                             
                             'sidebar_layout' => 'right_sidebar',                                                                                
                             
                             'show_search' => true,                             
                             'logo_pading_top' => '0',
                             'logo_pading_bottom' => '0',
                             'logo_pading_left' => '0',
                             'logo_pading_right' => '0',                             
                             
                             'slider_options' => 'single_post_slider',
                             'slider_cat' => '',
                             'slider1'=>'',
                             'slider2'=>'',
                             'slider3'=>'',
                             'slider4'=>'',
                             'slider4'=>'',                            
                             'slider_show_controls' => 'yes',                             
                             'slider_auto' => 'yes',
                             'slider_speed' => '2000', 
                             
                             'header_ads' => '',
                             'mid_section_ads' => '',  
                             'custom_css' => '',
                             'custom_code' => '',
                             'menu_alignment'=>'Left',                          
                             'show_social_header' => false,
                             'facebook' => '',
                             'twitter' => '',
                             'gplus' => '',
                             'youtube' => '',
                             'pinterest' => '',
                             'flickr' => '',
                             'vimeo' => '',
                             'stumbleupon' => '',
                             'dribble' => '',
                             'tumblr' => '',
                             'linkedin' => '',
                             'sound_cloud' => '',
                             'skype' => '',
                             'rss' => '',
                            
                              
                           ); 
                           
                           
    // Slider Show Hide
    $profitmag_slider_show=array(
                                'yes' => array(
                                        'value' => 'yes',
                                        'label' => 'Show',
                                        ),
                                'no' => array(
                                        'value' => 'no',
                                        'label' => 'Hide',
                                        ),
                                );
    
    
    $profitmag_slider_controls=array(
                                'yes' => array(
                                        'value' => 'yes',
                                        'label' => 'Show',
                                        ),
                                'no' => array(
                                        'value' => 'no',
                                        'label' => 'Hide',
                                        ),
                                );
                                
    $profitmag_slider_auto=array(
                                'yes' => array(
                                        'value' => 'yes',
                                        'label' => 'Yes',
                                        ),
                                'no' => array(
                                        'value' => 'no',
                                        'label' => 'No',
                                        ),
                                );

    
    
    
    $menu_alignment_arr = array( 'Left','Right' );
    
    // Store Posts in array
    $profitmag_postlist[0] = array(
    	'value' => 0,
    	'label' => '--choose--'
    );
    $arg = array('posts_per_page'   => -1);
    $profitmag_posts = get_posts($arg);
    foreach( $profitmag_posts as $profitmag_post ) :
    	$profitmag_postlist[$profitmag_post->ID] = array(
    		'value' => $profitmag_post->ID,
    		'label' => $profitmag_post->post_title
    	);
    endforeach;
    wp_reset_postdata();
                                        
    // Save category in an array
    $profitmag_cat_arr[0]=array(
                                'value' => 0,
                                'label' => '--Choose--',
                                );
    $cat_arg = array(
        	'hide_empty' => 0,
        	'orderby' => 'name',
          	'parent' => 0,
          	);
    $profitmag_cats = get_categories( $cat_arg );
    foreach( $profitmag_cats as $profitmag_cat ) {
        $profitmag_cat_arr[ $profitmag_cat->cat_ID ] = array(
                                                                'value' => $profitmag_cat->cat_ID,
                                                                'label' => $profitmag_cat->cat_name,
                                                                );
    }
    
    
    
    
    function profitmag_menu() {
        // Adds theme options page to the admin menu
        add_theme_page( __('Theme Options', 'profitmag'), __('Theme Options', 'profitmag'), 'edit_theme_options', 'theme_options', 'profitmag_theme_options_page' );
    }
    
    
    function profitmag_register_settings() {
        register_setting( 'profitmag_theme_options', 'profitmag_options', 'profitmag_validate_options' );
    }
    
    add_action( 'admin_init', 'profitmag_register_settings' );
    add_action( 'admin_menu', 'profitmag_menu');
       
    
    // Function to generate options page 
    function profitmag_theme_options_page() {
        global $profitmag_default_options, $profitmag_cat_arr, $profitmag_slider_show, $profitmag_slider_controls, $profitmag_slider_auto, $menu_alignment_arr, $profitmag_postlist;
       
        if ( ! isset( $_REQUEST['settings-updated'] ) )
		  $_REQUEST['settings-updated'] = false; // This checks whether the form has just been submitted. 
    ?> 
     <div class="wrap" id="optionsframework-wrap">
        
        <div class="profitmag-header">
            <div class="profitmag-logo">
                <img src="<?php echo get_template_directory_uri();?>/images/logo.png" alt="logo-backend" />      
            </div>
            
            <div class="ak-socials">
                <p><?php _e('Like/Follow our Page for New Updates','profitmag'); ?></p>
                <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Ffacebook.com%2FWPGaint%2F&amp;width&amp;layout=button&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:35px;" allowTransparency="true"></iframe>               
                <a href="<?php echo esc_url('https://twitter.com/WPGaint'); ?>" class="twitter-follow-button" data-show-count="false" data-lang="en">Follow @apthemes</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
            
            <div class="profitmag-title"><?php echo wp_get_theme(); ?></div>
        </div>
        <div class="clear"></div>
        
        <?php 	if ( false !== $_REQUEST['settings-updated'] ) : ?>
        	<div class="updated fade"><p><strong><?php _e( 'Options Saved' , 'profitmag' ); ?></strong></p></div>
        	<?php endif; // If the form has just been submitted, this shows the notification ?>
            
        <div class="wrapper-bg">
            <!-- Menu Tabs -->
            <div class="nav-tab-wrapper">
                <a id="options-group-1-tab" class="options-nav-tab" href="#options-group-1"><i class="fa fa-cog"></i><?php _e('Basic Settings','profitmag'); ?></a>                
                <a id="options-group-2-tab" class="options-nav-tab" href="#options-group-2"><i class="fa fa-desktop"></i><?php _e('Home Page Settings','profitmag'); ?></a>
                <a id="options-group-3-tab" class="options-nav-tab" href="#options-group-3"><i class="fa fa-sliders"></i><?php _e('Slider Settings','profitmag'); ?></a>
                <a id="options-group-4-tab" class="options-nav-tab" href="#options-group-4"><i class="fa fa-sidebar"></i><?php _e('Sidebar Posts Settings','profitmag'); ?></a>
                <a id="options-group-5-tab" class="options-nav-tab" href="#options-group-5"><i class="fa fa-ads"></i><?php _e('Advertising','profitmag'); ?></a>            	
            	<a id="options-group-6-tab" class="options-nav-tab" href="#options-group-6"><i class="fa fa-share-alt"></i><?php _e('Social Links','profitmag'); ?></a>
            	<a id="options-group-7-tab" class="options-nav-tab" href="#options-group-7"><i class="fa fa-magic"></i><?php _e('Tools','profitmag'); ?></a>
                <a id="options-group-8-tab" class="options-nav-tab" href="#options-group-8"><i class="fa fa-wordpress"></i><?php _e('About ProfitMag Theme','profitmag'); ?></a>
            	
            	
            </div> <!-- nav-tab-wrapper -->
            
            <div id="optionsframework-metabox">
                <div id="optionsframework" class="postbox">
                    <form id="form-options" method="post" action="options.php">
                        <?php
                            settings_fields( 'profitmag_theme_options' );
                            $settings=get_option( 'profitmag_options', $profitmag_default_options );
                                                                                
                        ?>
                        <!-- Basic Settings -->
            			<div id="options-group-1" class="group">
            			<h3><?php _e( 'Basic Settings', 'profitmag' ); ?></h3>
            				
                            <div class="form-row">
        						<label class="block" for="responsive_dsgn"><?php _e('Disable Responsive Design?','profitmag'); ?></label>
        						
        						<div class="checkbox">
        							<label for="responsive_design">
        							<input type="checkbox" id="responsive_design" name="profitmag_options[responsive_design]" value="1" <?php checked( true, $settings['responsive_design'] ); ?> />
        							<?php _e('Check to disable','profitmag'); ?></label>
        						</div>
        					</div>
                                                        
                       
                           <div class="form-row">
                                <label class="block"><?php _e('Web Page Layout','profitmag'); ?></label>
            					<?php $webpage_layouts = array('Fullwidth','Boxed'); ?>
            					<?php
            					foreach ( $webpage_layouts as $webpage_layout ) : ?>
            						<div class="checkbox">
            						<label for="<?php echo $webpage_layout; ?>">
            						<input type="radio" id="<?php echo esc_attr($webpage_layout); ?>" name="profitmag_options[webpage_layout]" value="<?php echo esc_attr($webpage_layout); ?>" <?php checked( $settings['webpage_layout'], esc_attr($webpage_layout) ); ?> />
            						<?php echo esc_attr($webpage_layout); ?>
            						</label>
            						</div>
            					<?php endforeach;
            					?>
           					</div>
                               
                            <div class="form-row">
            						<label class="block"><?php _e('Show Search in Menu?','profitmag'); ?></label>
            						<div class="checkbox">
            							<label for="show_search">
            							<input type="checkbox" id="show_search" name="profitmag_options[show_search]" value="1" <?php checked( true, $settings['show_search'] ); ?> />
            							<?php _e('Check to enable','profitmag'); ?>
            							</label>
            						</div>
           					</div>  
                               
                            <div class="form-row inline-label">
                					<label class="inline-block"><?php _e('Menu Alignment','profitmag'); ?></label>
                					<select id="menu_alignment" name="profitmag_options[menu_alignment]">
                					<?php
                                    
                					foreach( $menu_alignment_arr as $menu_alignment ) :                						
                						echo '<option  value="' . $menu_alignment  . '" ' . selected( $menu_alignment , $settings['menu_alignment'] ) . '>' . $menu_alignment . '</option>';
                					endforeach;
                					?>
                					</select>
                					
                                    
           					</div>   
                                
                            <div class="form-row">
                					<label class="block" for="favicon"><?php _e('Upload Favicon','profitmag'); ?></label>
                							<div class="profitmag_fav_icon">
                							  <input type="text" name="profitmag_options[media_upload]" id="profitmag_media_upload" value="<?php if(!empty($settings['media_upload'])){ echo $settings['media_upload']; }?>" />
                							  <input class="button" name="media_upload_button" id="profitmag_media_upload_button" value="<?php _e('Upload','profitmag'); ?>" type="button" />
                							  <em class="f13">&nbsp;&nbsp;<?php _e('Upload favicon(.png) with size of 16px X 16px','profitmag'); ?></em>
                
                							   <?php if(!empty($settings['media_upload'])){ ?>
                    							  <div id="profitmag_media_image">
                    							  <img src="<?php echo $settings['media_upload'] ?>" id="profitmag_show_image">
                    							  <div id="profitmag_fav_icon_remove"><?php _e('Remove','profitmag'); ?></div>
                    							  </div>
                 							  <?php }else{ ?>
                    							  <div id="profitmag_media_image" style="display:none">
                    							  <img src="<?php if(isset($settings['media_upload'])) { echo $settings['media_upload']; } ?>" id="profitmag_show_image">
                    							  <a href="javascript:void(0)" id="profitmag_fav_icon_remove" title="<?php _e('remove','profitmag'); ?>"><?php _e('Remove','profitmag'); ?></a>
                    							  </div>
                    							  <?php	} ?>
                							</div>
       					    </div>
                                
                            <div class="form-row">
                                <label class="block" for="site-logo"><?php _e( 'Upload Header Logo', 'profitmag' ); ?></label>
                                <a  class="button" href="<?php echo admin_url('/themes.php?page=custom-header'); ?>" ><?php _e( 'Upload', 'profitmag' ); ?></a>
                            </div>
                            
                            <div class="form-row">
                				<label class="block"><?php _e('Footer Copyright Text','profitmag'); ?></label>
                				<input id="footer_copyright" name="profitmag_options[footer_copyright]" type="text" value="<?php echo esc_attr($settings['footer_copyright']); ?>" />
            				</div>
                            
                            
            			</div> <!-- #options-group-1 -->
                        
                       
                        
                        <!-- Home Page Settings -->
            			<div id="options-group-2" class="group" style="display: none;">
            			     <h3><?php _e('Home Page Settings','profitmag'); ?></h3> 
                                 
                                 <div class="form-row inline-label">
                					<label class="block"><?php _e('Featured Block ( Besides Slider )','profitmag'); ?></label>
                					<select id="featured_block_beside" name="profitmag_options[featured_block_beside]">
                					<?php
                                    
                					foreach( $profitmag_cat_arr as $single_cat ) :
                						$label = $single_cat[ 'label' ];
                						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['featured_block_beside'] ) . '>' . $label . '</option>';
                					endforeach;
                					?>
                					</select>
                					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                    
            					</div>
                                 
                                 
                                 <div class="form-row inline-label">
                					<label class="block"><?php _e('Featured Block One ( 3 Column )','profitmag'); ?></label>
                					<select id="featured_block_one" name="profitmag_options[featured_block_one]">
                					<?php
                                    
                					foreach( $profitmag_cat_arr as $single_cat ) :
                						$label = $single_cat[ 'label' ];
                						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['featured_block_one'] ) . '>' . $label . '</option>';
                					endforeach;
                					?>
                					</select>
                					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                    
                                    <label class="block"><?php _e('No.of Block Post to Display','profitmag'); ?></label>
                                    <input type="text" name="profitmag_options[no_of_block_one]" value="<?php echo absint( $settings['no_of_block_one'] ); ?>" />
                   					
            					</div>
                                
                                
                                <div class="form-row inline-label">
                					<label class="block"><?php _e('Featured Block Two ( 3 Column )','profitmag'); ?></label>
                					<select id="featured_block_two" name="profitmag_options[featured_block_two]">
                					<?php
                                    
                					foreach( $profitmag_cat_arr as $single_cat ) :
                						$label = $single_cat[ 'label' ];
                						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['featured_block_two'] ) . '>' . $label . '</option>';
                					endforeach;
                					?>
                					</select>
                					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                    
                                    <label class="block"><?php _e('No.of Block Post to Display','profitmag'); ?></label>
                                    <input type="text" name="profitmag_options[no_of_block_two]" value="<?php echo absint( $settings['no_of_block_two'] ); ?>" />
                   					
            					</div>
                                
                                
                                <div class="form-row inline-label">
                					<label class="block"><?php _e('Featured Block Three ( 5 Column )','profitmag'); ?></label>
                					<select id="featured_block_three" name="profitmag_options[featured_block_three]">
                					<?php
                                    
                					foreach( $profitmag_cat_arr as $single_cat ) :
                						$label = $single_cat[ 'label' ];
                						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['featured_block_three'] ) . '>' . $label . '</option>';
                					endforeach;
                					?>
                					</select>
                					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                    
                                    <label class="block"><?php _e('No.of Block Post to Display','profitmag'); ?></label>
                                    <input type="text" name="profitmag_options[no_of_block_three]" value="<?php echo absint( $settings['no_of_block_three'] ); ?>" />
                   					
            					</div>
                                
                                
                                <div class="form-row inline-label">
                					<label class="block"><?php _e('Featured Block Four ( Excerpt Posts )','profitmag'); ?></label>
                					<select id="featured_block_four" name="profitmag_options[featured_block_four]">
                					<?php
                                    
                					foreach( $profitmag_cat_arr as $single_cat ) :
                						$label = $single_cat[ 'label' ];
                						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['featured_block_four'] ) . '>' . $label . '</option>';
                					endforeach;
                					?>
                					</select>
                					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                    
                                    <label class="block"><?php _e('No.of Block Post to Display','profitmag'); ?></label>
                                    <input type="text" name="profitmag_options[no_of_block_four]" value="<?php echo absint( $settings['no_of_block_four'] ); ?>" />
                   					
            					</div>
                                
                                
                                
                                <div class="form-row inline-label">
                					<div class="block-section-title">Блок записей Пятый</div>
                                    
                                    <div class="block-section-left">
                                        <label class="block"><?php _e('Featured Block Left','profitmag'); ?></label>
                    					<select id="featured_block_left" name="profitmag_options[featured_block_left]">
                    					<?php
                                        
                    					foreach( $profitmag_cat_arr as $single_cat ) :
                    						$label = $single_cat[ 'label' ];
                    						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['featured_block_left'] ) . '>' . $label . '</option>';
                    					endforeach;
                    					?>
                    					</select>
                    					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                        
                                        <label class="block"><?php _e('No.of Block Post to Display','profitmag'); ?></label>
                                        <input type="text" name="profitmag_options[no_of_block_left]" value="<?php echo absint( $settings['no_of_block_left'] ); ?>" />
                                    </div>
                                    
                                    <div class="block-section-right">
                                        <label class="block"><?php _e('Featured Block Right','profitmag'); ?></label>
                    					<select id="featured_block_right" name="profitmag_options[featured_block_right]">
                    					<?php
                                        
                    					foreach( $profitmag_cat_arr as $single_cat ) :
                    						$label = $single_cat[ 'label' ];
                    						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['featured_block_right'] ) . '>' . $label . '</option>';
                    					endforeach;
                    					?>
                    					</select>
                    					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                        
                                        <label class="block"><?php _e('No.of Block Post to Display','profitmag'); ?></label>
                                        <input type="text" name="profitmag_options[no_of_block_right]" value="<?php echo absint( $settings['no_of_block_right'] ); ?>" />
                                    </div>
                   					
            					</div>
                                
                                <div class="form-row clearfix">
						          <label class="block">Media Gallery</label>                                                                                                                                        
                                  <div class="media-image-fields clearfix">
                                    <?php
                                        $total_img = 0;
                                        if( !empty( $settings['media_gallery'] ) ):                                            
                                            $total_img = count( $settings['media_gallery'] );
                                            $img_counter = 0;
                                            foreach( $settings['media_gallery'] as $gallery_image ):                                               
                                               $attachment_id = profitmag_get_image_id( $gallery_image );
                                               $img_url = wp_get_attachment_image_src($attachment_id,'thumbnail'); 
                                            
                                    ?>
                                                <div class="gal-img-block">
                                                    
                                                    <div class="gal-img"><img src="<?php echo $img_url[0]; ?>" /><span class="fig-remove">Remove</span></div>
                                                    <input type="hidden" name="profitmag_options[media_gallery][<?php echo $img_counter; ?>]" class="hidden-media-gallery" value="<?php echo $gallery_image; ?>" />
                                                </div>
                                    <?php
                                                $img_counter++;
                                            endforeach; 
                                        endif;
                                    ?>                                    
                                  </div> 
                                  <input type="hidden" id="media_gallery_img_count" value="<?php echo $total_img; ?>" />                                                                       
                                  <a href="javascript:void(0)" class="media-add-gallery-image" class="button-primary"><?php _e('Add Image','profitmag'); ?></a>
	                           </div>
            
            					
                        </div>
                        <!-- End Home Page Settings -->
                        
                        
                        <!-- Slider Settings -->
            			<div id="options-group-3" class="group" style="display: none;">
            				<h3><?php _e( 'Slider Settings', 'profitmag' ); ?></h3>
            					
            					
                                
                                <div class="form-row">
                					<label class="inline-block"><?php _e('Show Slide From','profitmag'); ?></label>                					                                    
				                    <label class="checkbox" id="single_post_slider"><input value="single_post_slider" type="radio" name="profitmag_options[slider_options]" <?php checked($settings['slider_options'],'single_post_slider'); ?> /><?php _e('Single Posts','profitmag'); ?></label>                                                                      
                                    <label class="checkbox" id="cat_post_slider"><input value="cat_post_slider" name="profitmag_options[slider_options]" type="radio" <?php checked($settings['slider_options'],'cat_post_slider'); ?> /><?php _e('Category Posts','profitmag'); ?></label>                                                                        									            
            					</div>
                                
                                
                                <div class="form-row post-as-slider" >
                					<em class="f13"><?php _e('Select the post that you want to display as a Slider','profitmag'); ?></em>
                                    
                                    <div class="form-block-row">
                                        <label for="slider1" class="inline-block"><?php _e('Silder 1','profitmag'); ?></label>
                                        <select id="slider1" name="profitmag_options[slider1]">
                        					<?php                                            
                        					foreach ( $profitmag_postlist as $single_post ) :
                        						$label = $single_post['label'];
                        						echo '<option value="' . $single_post['value'] . '" ' . selected($single_post['value'] , $settings['slider1'] ). '>' . $label . '</option>';
                        					endforeach;
                        					?>
                    					</select>
                                    </div>
                					
                                                                        
                                    
                                    <div class="form-block-row">
                                        <label for="slider2" class="inline-block"><?php _e('Silder 2','profitmag'); ?></label>
                                        <select id="slider2" name="profitmag_options[slider2]">
                        					<?php
                        					foreach ( $profitmag_postlist as $single_post ) :
                        						$label = $single_post['label'];
                        						echo '<option value="' . $single_post['value'] . '" ' . selected($single_post['value'] , $settings['slider2'] ). '>' . $label . '</option>';
                        					endforeach;
                        					?>
                    					</select>
                                    </div>
                                    
                                    <div class="form-block-row">
                                        <label for="slider3" class="inline-block"><?php _e('Silder 3','profitmag'); ?></label>
                                        <select id="slider3" name="profitmag_options[slider3]">
                        					<?php
                        					foreach ( $profitmag_postlist as $single_post ) :
                        						$label = $single_post['label'];
                        						echo '<option value="' . $single_post['value'] . '" ' . selected($single_post['value'] , $settings['slider3'] ). '>' . $label . '</option>';
                        					endforeach;
                        					?>
                    					</select>
                                    </div>
                                    
                                    <div class="form-block-row">
                                        <label for="slider3" class="inline-block"><?php _e('Silder 4','profitmag'); ?></label>
                                        <select id="slider4" name="profitmag_options[slider4]">
                        					<?php
                        					foreach ( $profitmag_postlist as $single_post ) :
                        						$label = $single_post['label'];
                        						echo '<option value="' . $single_post['value'] . '" ' . selected($single_post['value'] , $settings['slider4'] ). '>' . $label . '</option>';
                        					endforeach;
                        					?>
                    					</select>
                                    </div>
                                                                        
            					</div>
                                
                                <div class="form-row cat-as-slider" >
                                        <label class="block"><?php _e('Select Category','profitmag'); ?></label>
                    					<select id="slider_cat" name="profitmag_options[slider_cat]">
                    					<?php
                                        
                    					foreach( $profitmag_cat_arr as $single_cat ) :
                    						$label = $single_cat[ 'label' ];
                    						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['slider_cat'] ) . '>' . $label . '</option>';
                    					endforeach;
                    					?>
                    					</select>                    					
                                </div>
                                                               
            
            					<div class="form-row">
            					<label class="block"><?php _e('Show Slider Controls (Arrows)','profitmag'); ?></label>
            					<?php foreach( $profitmag_slider_controls as $slider_controls ) : ?>
                					<div class="checkbox">
                					<label for="<?php echo $slider_controls['value']; ?>">
                					<input type="radio" id="<?php echo $slider_controls['value']; ?>" name="profitmag_options[slider_show_controls]" value="<?php echo $slider_controls['value']; ?>" <?php checked( $settings['slider_show_controls'], $slider_controls['value'] ); ?> />
                					<?php echo $slider_controls['label']; ?>
                					</label>
                					</div> 
            					<?php endforeach; ?>
            					</div>
            
            					<div class="form-row">
         					   <label class="block"><?php _e('Slider auto Transition','profitmag'); ?></label>
            					<?php foreach( $profitmag_slider_auto as $slider_autos) : ?>
            					<div class="checkbox">
            					<label for="<?php echo $slider_autos['value']; ?>">
            					<input type="radio" id="<?php echo $slider_autos['value']; ?>" name="profitmag_options[slider_auto]" value="<?php echo $slider_autos['value']; ?>" <?php checked( $settings['slider_auto'], $slider_autos['value'] ); ?> />
            					<?php echo $slider_autos['label']; ?>
            					</label>
            					</div>
            					<?php endforeach; ?>
            					</div>
            
            					
            
            					<div class="form-row">
            					<label class="block"><?php _e('Slider Speed','profitmag'); ?></label>
            					<input id="slider_speed" name="profitmag_options[slider_speed]" type="text" value="<?php echo $settings['slider_speed']; ?>" />
            					</div>
            
            					
            			</div>
                        
                        <!-- Sidebar Settings -->
            			<div id="options-group-4" class="group" style="display: none;">
            				<h3><?php _e( 'Sidebar Posts Settings', 'profitmag' ); ?></h3>
            				
                            <div class="option-sidebar-layout">
                                <div class="form-row form-row-layout-wrap clearfix">
                					<label for="sidebar_layout" class="sidebar_layout"><strong>Sidebar расположение</strong></label>
                                    
                                    <div class="layout-wrap">
                                    <img src="<?php echo get_template_directory_uri() . '/inc/admin-panel/images/left-sidebar.png'; ?>" />
                                    <label class="checkbox" id="single_post_slider">
                                    <input value="left_sidebar" type="radio" name="profitmag_options[sidebar_layout]" <?php checked($settings['sidebar_layout'],'left_sidebar'); ?> >
                                    <?php _e('Left Sidebar','profitmag'); ?></label>   
                                    </div>

                                    <div class="layout-wrap">
                                    <img src="<?php echo get_template_directory_uri() . '/inc/admin-panel/images/right-sidebar.png'; ?>" />
                                    <label class="checkbox" id="cat_post_slider">    
                                    <input value="right_sidebar" name="profitmag_options[sidebar_layout]" type="radio" <?php checked($settings['sidebar_layout'],'right_sidebar'); ?> >
                                    <?php _e('Right Sidebar','profitmag'); ?></label>
                                    </div>

                                    <div class="layout-wrap">
                                        <img src="<?php echo get_template_directory_uri() . '/inc/admin-panel/images/both-sidebar.png'; ?>" />
                                    <label class="checkbox" id="cat_post_slider"><input value="both_sidebar" name="profitmag_options[sidebar_layout]" type="radio" <?php checked($settings['sidebar_layout'],'both_sidebar'); ?> >
                                    
                                    <?php _e('Both Sidebar','profitmag'); ?></label>
                                    </div>

                                    <div class="layout-wrap">
                                        <img src="<?php echo get_template_directory_uri() . '/inc/admin-panel/images/no-sidebar.png'; ?>" />
                                    <label class="checkbox" id="cat_post_slider"><input value="no_sidebar" name="profitmag_options[sidebar_layout]" type="radio" <?php checked($settings['sidebar_layout'],'no_sidebar'); ?> >
                                    
                                   
                                    <?php _e('No Sidebar','profitmag'); ?></label>   
                                     </div>                                                                     									            
            					</div>
                            </div>
                            
                            
                            <div class="option-left-sidebar">

                                <h4><?php _e( 'Left Sidebar', 'profitmag' ); ?></h4>
                                <div class="form-row inline-label">
                    					<label class="inline-block"><?php _e('Category Posts One ( Middle of Sidebar )','profitmag'); ?></label>
                    					<select id="featured_block_beside" name="profitmag_options[left_cat_post_one]">
                    					<?php
                                        
                    					foreach( $profitmag_cat_arr as $single_cat ) :
                    						$label = $single_cat[ 'label' ];
                    						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['left_cat_post_one'] ) . '>' . $label . '</option>';
                    					endforeach;
                    					?>
                    					</select>
                    					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                        
                                        <label class="inline-block"><?php _e('No.of Post to Display','profitmag'); ?></label>
                                        <input type="text" name="profitmag_options[left_no_of_cat_post_one]" value="<?php echo absint( $settings['left_no_of_cat_post_one'] ); ?>" />
                                        
               					</div>	
                                
                                <div class="form-row inline-label">
                    					<label class="block"><?php _e('Middle Ads','profitmag'); ?></label>
                    					<textarea cols="60" rows="5" name="profitmag_options[left_sidebar_middle_ads]"><?php echo ( $settings['left_sidebar_middle_ads'] ); ?></textarea>
                                        <p><?php _e( 'Please insert the image of size ', 'profitmag'); ?></p>		
              					</div>
                                
                                <div class="form-row">
						          <label class="block">Photo Gallery</label>                                                                                                                                        
                                  <div class="left-image-fields clearfix">
                                    <?php
                                        $total_img = 0;
                                        if( !empty( $settings['left_side_gallery'] ) ):                                            
                                            $total_img = count( $settings['left_side_gallery'] );
                                            $img_counter = 0;
                                            foreach( $settings['left_side_gallery'] as $gallery_image ):                                               
                                               $attachment_id = profitmag_get_image_id( $gallery_image );
                                               $img_url = wp_get_attachment_image_src($attachment_id,'thumbnail'); 
                                            
                                    ?>
                                                <div class="gal-img-block">
                                                    
                                                    <div class="gal-img"><img src="<?php echo $img_url[0]; ?>" /><span class="fig-remove">Remove</span></div>
                                                    <input type="hidden" name="profitmag_options[left_side_gallery][<?php echo $img_counter; ?>]" class="hidden-left-gallery" value="<?php echo $gallery_image; ?>" />
                                                </div>
                                    <?php
                                                $img_counter++;
                                            endforeach; 
                                        endif;
                                    ?>                                    
                                  </div> 
                                  <input type="hidden" id="left_gallery_img_count" value="<?php echo $total_img; ?>" />                                                                       
                                  <a href="javascript:void(0)" class="left-add-gallery-image" class="button-primary"><?php _e('Add Image','profitmag'); ?></a>
	                           </div>
                                
                                <div class="form-row inline-label">
                    					<label class="inline-block"><?php _e('Category Posts Two( Middle of Sidebar )','profitmag'); ?></label>
                    					<select id="featured_block_beside" name="profitmag_options[left_cat_post_two]">
                    					<?php
                                        
                    					foreach( $profitmag_cat_arr as $single_cat ) :
                    						$label = $single_cat[ 'label' ];
                    						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['left_cat_post_two'] ) . '>' . $label . '</option>';
                    					endforeach;
                    					?>
                    					</select>
                    					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                        
                                        <label class="inline-block"><?php _e('No.of Post to Display','profitmag'); ?></label>
                                        <input type="text" name="profitmag_options[left_no_of_cat_post_two]" value="<?php echo absint( $settings['left_no_of_cat_post_two'] ); ?>" />
                                        
               					</div>
                                
                                <div class="form-row inline-label">
                    					<label class="block"><?php _e('Bottom Ads One','profitmag'); ?></label>
                    					<textarea cols="60" rows="5" name="profitmag_options[left_sidebar_bottom_ads_one]"><?php echo ( $settings['left_sidebar_bottom_ads_one'] ); ?></textarea>
                                        <p><?php _e( 'Please insert the image of size ', 'profitmag'); ?></p>		
              					</div>
                                
                                <div class="form-row inline-label">
                    					<label class="block"><?php _e('Bottom Ads Two','profitmag'); ?></label>
                    					<textarea cols="60" rows="5" name="profitmag_options[left_sidebar_bottom_ads_two]"><?php echo ( $settings['left_sidebar_bottom_ads_two'] ); ?></textarea>
                                        <p><?php _e( 'Please insert the image of size ', 'profitmag'); ?></p>		
              					</div>
          					</div><!-- .option-left-sidebar -->
                            
                            <div class="option-right-sidebar">
                                <h4><?php _e( 'Right Sidebar', 'profitmag' ); ?></h4>
                                <div class="form-row inline-label">
                    					<label class="inline-block"><?php _e('Category Posts One ( Middle of Sidebar )','profitmag'); ?></label>
                    					<select id="featured_block_beside" name="profitmag_options[right_cat_post_one]">
                    					<?php
                                        
                    					foreach( $profitmag_cat_arr as $single_cat ) :
                    						$label = $single_cat[ 'label' ];
                    						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['right_cat_post_one'] ) . '>' . $label . '</option>';
                    					endforeach;
                    					?>
                    					</select>
                    					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                        
                                        <label class="inline-block"><?php _e('No.of Post to Display','profitmag'); ?></label>
                                        <input type="text" name="profitmag_options[right_no_of_cat_post_one]" value="<?php echo absint( $settings['right_no_of_cat_post_one'] ); ?>" />
                                        
               					</div>	
                                
                                <div class="form-row inline-label">
                    					<label class="block"><?php _e('Middle Ads','profitmag'); ?></label>
                    					<textarea cols="60" rows="5" name="profitmag_options[right_sidebar_middle_ads]"><?php echo ( $settings['right_sidebar_middle_ads'] ); ?></textarea>
                                        <p><?php _e( 'Please insert the image of size ', 'profitmag'); ?></p>		
              					</div>
                                
                                <div class="form-row">
						          <label class="block">Photo Gallery</label>                                                                                                                                        
                                  <div class="right-image-fields clearfix">
                                    <?php
                                        $total_img = 0;
                                        if( !empty( $settings['right_side_gallery'] ) ):                                            
                                            $total_img = count( $settings['right_side_gallery'] );
                                            $img_counter = 0;
                                            foreach( $settings['right_side_gallery'] as $gallery_image ):                                                
                                               $attachment_id = profitmag_get_image_id( $gallery_image );
                                               $img_url = wp_get_attachment_image_src($attachment_id,'thumbnail'); 
                                            
                                    ?>
                                                <div class="gal-img-block">
                                                    
                                                    <div class="gal-img"><img src="<?php echo $img_url[0]; ?>" /><span class="fig-remove">Remove</span></div>
                                                    <input type="hidden" name="profitmag_options[right_side_gallery][<?php echo $img_counter; ?>]" class="hidden-right-gallery" value="<?php echo $gallery_image; ?>" />
                                                </div>
                                    <?php
                                                $img_counter++;
                                            endforeach; 
                                        endif;
                                    ?>                                    
                                  </div> 
                                  <input type="hidden" id="right_gallery_img_count" value="<?php echo $total_img; ?>" />                                                                       
                                  <a href="javascript:void(0)" class="right-add-gallery-image" class="button-primary"><?php _e('Add Image','profitmag'); ?></a>
	                           </div>
                                
                                <div class="form-row inline-label">
                    					<label class="inline-block"><?php _e('Category Posts Two( Middle of Sidebar )','profitmag'); ?></label>
                    					<select id="featured_block_beside" name="profitmag_options[right_cat_post_two]">
                    					<?php
                                        
                    					foreach( $profitmag_cat_arr as $single_cat ) :
                    						$label = $single_cat[ 'label' ];
                    						echo '<option  value="' . $single_cat['value']  . '" ' . selected( $single_cat['value'] , $settings['right_cat_post_two'] ) . '>' . $label . '</option>';
                    					endforeach;
                    					?>
                    					</select>
                    					<em class="f13">&nbsp;&nbsp;<?php _e('Category ','profitmag'); ?></em> <br />
                                        
                                        <label class="inline-block"><?php _e('No.of Post to Display','profitmag'); ?></label>
                                        <input type="text" name="profitmag_options[right_no_of_cat_post_two]" value="<?php echo absint( $settings['right_no_of_cat_post_two'] ); ?>" />
                                        
               					</div>
                                
                                <div class="form-row inline-label">
                    					<label class="block"><?php _e('Bottom Ads One','profitmag'); ?></label>
                    					<textarea cols="60" rows="5" name="profitmag_options[right_sidebar_bottom_ads_one]"><?php echo ( $settings['right_sidebar_bottom_ads_one'] ); ?></textarea>
                                        <p><?php _e( 'Please insert the image of size ', 'profitmag'); ?></p>		
              					</div>
                                
                                <div class="form-row inline-label">
                    					<label class="block"><?php _e('Bottom Ads Two','profitmag'); ?></label>
                    					<textarea cols="60" rows="5" name="profitmag_options[right_sidebar_bottom_ads_two]"><?php echo ( $settings['right_sidebar_bottom_ads_two'] ); ?></textarea>
                                        <p><?php _e( 'Please insert the image of size ', 'profitmag'); ?></p>		
              					</div>
          					</div><!-- .option-left-sidebar -->
            
            					
            			</div>
                        
                        
                        <!-- Advertising -->
                        <div id="options-group-5" class="group" style="display: none;">
            			     <h3><?php _e('Advertising','profitmag'); ?></h3>
                            <div class="form-row inline-label">
                					<label class="block"><?php _e('Header Ads','profitmag'); ?></label>
                					<textarea cols="60" rows="5" name="profitmag_options[header_ads]"><?php echo ( $settings['header_ads'] ); ?></textarea><br />
                                    <em class="f13"><?php _e( 'Please insert the image of size ', 'profitmag'); ?></em>		
          					</div>
                            <div class="form-row inline-label">
                					<label class="block"><?php _e('Home Page Ads ( Mid Section )','profitmag'); ?></label>
                					<textarea cols="60" rows="5" name="profitmag_options[mid_section_ads]"><?php echo ( $settings['mid_section_ads'] ); ?></textarea><br />
                                    <em class="f13"><?php _e( 'Please insert the image of size ', 'profitmag'); ?></em>		
          					</div>
            
            					
                        </div>
                        <!-- End Advertising -->
                        
                        
                        <!-- Social Links Settings -->
                        <div id="options-group-6" class="group" style="display: none;">
            			<h3><?php _e('Social links - Put your social url','profitmag'); ?></h3>
            					<div class="form-row">
            					<em class="f13"><?php _e('Put your social url below.. Leave blank if you don\'t want to show it.','profitmag'); ?></em>
            					</div>
            
            					<div class="form-row">
            					<label class="block"><?php _e('Disable Social icons in header?','profitmag'); ?></label>
            						<div class="checkbox">
            							<label for="show_social_header">
            							<input type="checkbox" id="show_social_header" name="profitmag_options[show_social_header]" value="1" <?php checked( true, $settings['show_social_header'] ); ?> />
            							<?php _e('Check to disable','profitmag'); ?>
            							</label>
            						</div>
            					</div>
            
            					<table class="social-urls">
            					<tr><td scope="row"><label for="facebook"><?php _e('Facebook','profitmag'); ?></label></td>
            					<td>
            					<input id="facebook" name="profitmag_options[facebook]" type="text" value="<?php echo $settings['facebook']; ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="twitter"><?php _e('Twitter','profitmag'); ?></label></td>
            					<td>
            					<input id="twitter" name="profitmag_options[twitter]" type="text" value="<?php echo esc_url($settings['twitter']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="gplus"><?php _e('Google plus','profitmag'); ?></label></td>
            					<td>
            					<input id="gplus" name="profitmag_options[gplus]" type="text" value="<?php echo esc_url($settings['gplus']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="youtube"><?php _e('Youtube','profitmag'); ?></label></td>
            					<td>
            					<input id="youtube" name="profitmag_options[youtube]" type="text" value="<?php echo esc_url($settings['youtube']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="pinterest"><?php _e('Pinterest','profitmag'); ?></label></td>
            					<td>
            					<input id="pinterest" name="profitmag_options[pinterest]" type="text" value="<?php echo esc_url($settings['pinterest']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="flickr"><?php _e('Flickr','profitmag'); ?></label></td>
            					<td>
            					<input id="flickr" name="profitmag_options[flickr]" type="text" value="<?php echo esc_url($settings['flickr']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="vimeo"><?php _e('Vimeo','profitmag'); ?></label></td>
            					<td>
            					<input id="vimeo" name="profitmag_options[vimeo]" type="text" value="<?php echo esc_url($settings['vimeo']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="stumbleupon"><?php _e('Stumbleupon','profitmag'); ?></label></td>
            					<td>
            					<input id="stumbleupon" name="profitmag_options[stumbleupon]" type="text" value="<?php echo esc_url($settings['stumbleupon']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="dribble"><?php _e('Dribble','profitmag'); ?></label></td>
            					<td>
            					<input id="dribble" name="profitmag_options[dribble]" type="text" value="<?php echo esc_url($settings['dribble']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="profitmag_tumblr"><?php _e('Tumblr','profitmag'); ?></label></td>
            					<td>
            					<input id="tumblr" name="profitmag_options[tumblr]" type="text" value="<?php echo esc_url($settings['tumblr']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="linkedin"><?php _e('Linkedin','profitmag'); ?></label></td>
            					<td>
            					<input id="linkedin" name="profitmag_options[linkedin]" type="text" value="<?php echo esc_url($settings['linkedin']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="sound_cloud"><?php _e('Sound Cloud','profitmag'); ?></label></td>
            					<td>
            					<input id="sound_cloud" name="profitmag_options[sound_cloud]" type="text" value="<?php echo esc_url($settings['sound_cloud']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="skype"><?php _e('Skype','profitmag'); ?></label></td>
            					<td>
            					<input id="skype" name="profitmag_options[skype]" type="text" value="<?php echo esc_attr($settings['skype']); ?>" />
            					</td>
            					</tr>
            
            					<tr><td scope="row"><label for="rss"><?php _e('RSS','profitmag'); ?></label></td>
            					<td>
            					<input id="rss" name="profitmag_options[rss]" type="text" value="<?php echo esc_url($settings['rss']); ?>" />
            					</td>
            					</tr>
            				</table>
            			</div> <!-- End of social links setting -->
                        
                        
                        <!-- Tools -->
            			<div id="options-group-7" class="group" style="display: none;">
                			<h3><?php _e('Tools','profitmag'); ?></h3>
                			<div class="form-row">
                				<label class="block"><?php _e('Custom CSS','profitmag'); ?></label>
                				<textarea id="custom_css" name="profitmag_options[custom_css]" rows="6" cols="60"><?php echo $settings['custom_css']; ?></textarea>
                				<p class="f13"><em><?php _e('Enter the custom css here','profitmag'); ?></em></p>
                			</div>
                
                			<div class="form-row">
                				<label class="block"><?php _e('Analytics Code','profitmag'); ?></label>
                				<textarea id="custom_code" name="profitmag_options[custom_code]" rows="6" cols="60"><?php echo $settings['custom_code']; ?></textarea>
                				<p class="f13"><em><?php _e('Enter the code from Facebook, Google or any other media here.','profitmag'); ?></em></p>
                			</div>                		
            			</div>
                        
                        <!-- About Magazine Theme -->
            			<div id="options-group-8" class="group" style="display: none;">
                			<h3><?php _e('Know more about ProfitMag Themes','profitmag'); ?></h3>
                				<div class="form-row">
                		      		<p><?php _e('This is ProfitMag Theme developed by', 'profitmag' ); ?><a href="<?php echo esc_url('http://www.wpgaint.com/'); ?>" target="_blank">WPGaint</a></p>
                				</div>				
            			</div>
     
			            <div id="optionsframework-submit">
            			     <input type="submit" class="button-primary" value="<?php esc_attr_e('Save Options','profitmag'); ?>" />
            			</div>
                        
                        
                        
                    </form>
                </div> <!-- #optionsframework -->
            </div> <!-- #optionsframework-metabox -->
            
        </div> <!-- .wrapper-bg -->
     </div> <!-- .wrap -->
     
    <?php    
    } // End profitmag_theme_options_page() 
    
    
    // Validation function
    function profitmag_validate_options( $input ) {
        
        
        // We strip all tags from the text field, to avoid vulnerablilties.
        $input['webpage_layout'] = sanitize_text_field( $input['webpage_layout'] );        
        $input['slider_options'] = wp_filter_nohtml_kses( $input['slider_options'] );        
        $input['slider_show_controls'] = sanitize_text_field( $input['slider_show_controls'] );
        $input['slider_auto'] = sanitize_text_field( $input['slider_auto'] );
        $input['featured_block_beside'] = wp_filter_nohtml_kses( $input['featured_block_beside'] );
        $input['featured_block_one'] = wp_filter_nohtml_kses( $input['featured_block_one'] );
        $input['featured_block_two'] = wp_filter_nohtml_kses( $input['featured_block_two'] );
        $input['featured_block_three'] = wp_filter_nohtml_kses( $input['featured_block_three'] );
        $input['featured_block_four'] = wp_filter_nohtml_kses( $input['featured_block_four'] );
        $input['featured_block_left'] = wp_filter_nohtml_kses( $input['featured_block_left'] );
        $input['featured_block_right'] = wp_filter_nohtml_kses( $input['featured_block_right'] );
        
        $input['left_cat_post_one'] = wp_filter_nohtml_kses( $input['left_cat_post_one'] );
        $input['left_cat_post_two'] = wp_filter_nohtml_kses( $input['left_cat_post_two'] );
        $input['right_cat_post_one'] = wp_filter_nohtml_kses( $input['right_cat_post_one'] );
        $input['right_cat_post_two'] = wp_filter_nohtml_kses( $input['right_cat_post_two'] );
        
        $input['footer_copyright'] = wp_filter_nohtml_kses( $input['footer_copyright'] );
        
        
        
        
        // If the checkbox has not been checked, we void it
    	if ( ! isset( $input['responsive_design'] ) )
    		$input['responsive_design'] = null;
        // We verify if the input is a boolean value
     	$input['responsive_design'] = ( $input['responsive_design'] == 1 ? 1 : 0 );
               
        
        if ( ! isset( $input['show_search'] ) )
	       	$input['show_search'] = null;
        $input['show_search'] = ( $input['show_search'] == 1 ? 1 : 0 );
        
        if ( isset( $input['no_of_block_one'] ) ){
            if(is_numeric($input['no_of_block_one'])){
                $input['no_of_block_one'] = absint($input['no_of_block_one']);
            }else{
            	 $input['no_of_block_one'] = '6' ;
            }
        }
        
        if ( isset( $input['no_of_block_two'] ) ){
            if(is_numeric($input['no_of_block_two'])){
                $input['no_of_block_two'] = absint($input['no_of_block_two']);
            }else{
            	 $input['no_of_block_two'] = '6' ;
            }
        }
        
        if ( isset( $input['no_of_block_three'] ) ){
            if(is_numeric($input['no_of_block_three'])){
                $input['no_of_block_three'] = absint($input['no_of_block_three']);
            }else{
            	 $input['no_of_block_three'] = '10' ;
            }
        }
        
        if ( isset( $input['no_of_block_four'] ) ){
            if(is_numeric($input['no_of_block_four'])){
                $input['no_of_block_four'] = absint($input['no_of_block_four']);
            }else{
            	 $input['no_of_block_four'] = '7' ;
            }
        }
        
        if ( isset( $input['no_of_block_left'] ) ){
            if(is_numeric($input['no_of_block_left'])){
                $input['no_of_block_four'] = absint($input['no_of_block_four']);
            }else{
            	 $input['no_of_block_left'] = '3' ;
            }
        }
        
        if ( isset( $input['no_of_block_right'] ) ){
            if(is_numeric($input['no_of_block_right'])){
                $input['no_of_block_right'] = absint($input['no_of_block_right']);
            }else{
            	 $input['no_of_block_right'] = '3' ;
            }
        }
        
        if (isset( $input['slider_speed'] ) ){
            if(is_numeric($input['slider_speed'])){
                $input['slider_speed'] = absint($input['slider_speed']);
            }else{
            	 $input['slider_speed'] = '2000' ;
            }
        }
        
        if (isset( $input['left_no_of_cat_post_one'] ) ){
            if(is_numeric($input['left_no_of_cat_post_one'])){
                $input['left_no_of_cat_post_one'] = absint($input['left_no_of_cat_post_one']);
            }else{
            	 $input['left_no_of_cat_post_one'] = '3' ;
            }
        }
        
        if (isset( $input['left_no_of_cat_post_two'] ) ){
            if(is_numeric($input['left_no_of_cat_post_two'])){
                $input['left_no_of_cat_post_two'] = absint($input['left_no_of_cat_post_two']);
            }else{
            	 $input['left_no_of_cat_post_two'] = '3' ;
            }
        }
        
        if (isset( $input['right_no_of_cat_post_one'] ) ){
            if(is_numeric($input['right_no_of_cat_post_one'])){
                $input['right_no_of_cat_post_one'] = absint($input['right_no_of_cat_post_one']);
            }else{
            	 $input['right_no_of_cat_post_one'] = '3' ;
            }
        }
        
        if (isset( $input['right_no_of_cat_post_two'] ) ){
            if(is_numeric($input['right_no_of_cat_post_two'])){
                $input['right_no_of_cat_post_two'] = absint($input['right_no_of_cat_post_two']);
            }else{
            	 $input['right_no_of_cat_post_two'] = '3' ;
            }
        }
                
        
        if ( ! isset( $input['tc_activate'] ) )
		  $input['tc_activate'] = null;
        $input['tc_activate'] = ( $input['tc_activate'] == 1 ? 1 : 0 );
        
        // For Social Links
        if ( ! isset( $input['show_social_header'] ) )
            $input['show_social_header'] = null;
        	$input['show_social_header'] = ( $input['show_social_header'] == 1 ? 1 : 0 );
        
        	 // data validation for Social Icons
        	if( isset( $input[ 'facebook' ] ) ) {
        		$input[ 'facebook' ] = esc_url_raw( $input[ 'facebook' ] );
        	};
        	if( isset( $input[ 'twitter' ] ) ) {
        		$input[ 'twitter' ] = esc_url_raw( $input[ 'twitter' ] );
        	};
        	if( isset( $input[ 'gplus' ] ) ) {
        		$input[ 'gplus' ] = esc_url_raw( $input[ 'gplus' ] );
        	};
        	if( isset( $input[ 'youtube' ] ) ) {
        		$input[ 'youtube' ] = esc_url_raw( $input[ 'youtube' ] );
        	};
        	if( isset( $input[ 'pinterest' ] ) ) {
        		$input[ 'pinterest' ] = esc_url_raw( $input[ 'pinterest' ] );
        	};
        	if( isset( $input[ 'linkedin' ] ) ) {
        		$input[ 'linkedin' ] = esc_url_raw( $input[ 'linkedin' ] );
        	};
        	if( isset( $input[ 'flickr' ] ) ) {
        		$input[ 'flickr' ] = esc_url_raw( $input[ 'flickr' ] );
        	};
        	if( isset( $input[ 'vimeo' ] ) ) {
        		$input[ 'vimeo' ] = esc_url_raw( $input[ 'vimeo' ] );
        	};
        	if( isset( $input[ 'stumbleupon' ] ) ) {
        		$input[ 'stumbleupon' ] = esc_url_raw( $input[ 'stumbleupon' ] );
        	};
        	if( isset( $input[ 'dribble' ] ) ) {
        		$input[ 'dribble' ] = esc_url_raw( $input[ 'dribble' ] );
        	};
        	if( isset( $input[ 'accesspress_pro_tumblr' ] ) ) {
        		$input[ 'tumblr' ] = esc_url_raw( $input[ 'atumblr' ] );
        	};
        	if( isset( $input[ 'skype' ] ) ) {
        		$input[ 'skype' ] = esc_attr($input[ 'skype' ]) ;
        	};
        	if( isset( $input[ 'rss' ] ) ) {
        		$input[ 'rss' ] = esc_url_raw( $input[ 'rss' ] );
        	};
        	if( isset( $input[ 'tc_bg_image' ] ) ) {
        		$input[ 'tc_bg_image' ] = esc_url_raw( $input[ 'tc_bg_image' ] );
        	};
    
        return $input;
    }
    
endif; // End is_admin()
    ?>