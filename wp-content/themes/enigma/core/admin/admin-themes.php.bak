<?php if (!function_exists('enigma_info_page')) {
	function enigma_info_page() {
	$page1=add_theme_page(__('Welcome to Enigma', 'enigma'), __('Pro Themes & Plugin', 'enigma'), 'edit_theme_options', 'enigma', 'enigmadisplay_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'weblizar_admin_info');
	}	
}
add_action('admin_menu', 'enigma_info_page');

function weblizar_admin_info(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/core/admin/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin-themes.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome-4.7.0/css/font-awesome.css');
	//JS
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js',get_template_directory_uri() .'/core/admin/bootstrap/js/bootstrap.min.js');
} 
if (!function_exists('enigmadisplay_theme_info_page')) {
	function enigmadisplay_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
	<div class="wrap elw-page-welcome about-wrap seting-page">

    <div class="col-md-12 settings">
         <div class=" col-md-4">
            <div class="col-md-6">
					<img  src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo" />
            </div>
			
		</div>
       

        <div class=" col-md-8">
            <h2><span class="elw_shortcode_heading">Responsive WordPress Themes & Plugins</span></h2>
        </div>
		 
	</div>

            </header>
            <!-- Header -->
            <!-- Themes & Plugin -->
            <div class="col-md-12  product-main-cont">
                <ul class="nav nav-tabs product-tbs">
                    <li class="active"><a data-toggle="tab" href="#themesd"> Themes </a></li>
                    <li><a data-toggle="tab" href="#pluginsd">Plugins</a></li>
					<li><a data-toggle="tab" href="#offers">Offers</a></li>
                </ul>

                <div class="tab-content">
                    <div id="themesd" class="tab-pane fade in active">
                        <div class="space  theme active">

                            <div class=" p_head theme">
                                <h1 class="section-title">WordPress Themes</h1>
                            </div>							

                            <div class="row p_plugin blog_gallery">
                                <div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
                                    <div class="img-thumbnail">
										<img src="<?php echo get_template_directory_uri(); ?>/images/Enigma.jpg" class="img-responsive" alt="img"/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                    <div class="row p-box">
                                        <h2><a href="">Enigma- Modern & Clean Designed Multi-Purpose WordPress Theme</a></h2>
                                        <p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business, WordPress, Corporate, dark, real estate, shop, restaurant.</p>
                                        <div>
                                            <p><strong>Description: </strong> Enigma is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Cool Blog Layout and full width page also present.</p>
                                        </div>
	                                    <h3>And many more Pro Themes are available to know more 
	                                    	<a class="btn btn-primary title_offers" href="https://weblizar.com/themes/">Visit Here</a> 
	                                    </h3>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
                                    <div class="price">
                                        <span class="currency">USD</span>
                                        <span class="price-number">$<span>39</span></span>
                                    </div>
                                    <div class="btn-group-vertical">
                                        <a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/enigma-premium/">Detail</a>
                                        <a class="btn btn-success btn-lg" href="https://weblizar.com/themes/enigma-premium/">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----Plugin----->
                    <div id="pluginsd" class="tab-pane fade">
                        <div class="p_head theme">           
                                <h1 class="section-title">WordPress Plugins</h1>                      
                        </div>
						<div class="row p_plugin blog_gallery">
                            <div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
                                <div class="img-thumbnail">
                                	<img src="<?php echo get_template_directory_uri(); ?>/images/Clockin-Pro.jpg" class="img-responsive" alt="img"/>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                <div class="row p-box">
                                    <h2><a href="">Clockin Portal Pro</a></h2>
                                    <p><strong>Features: </strong>
                                        <ul>
                                            <li>Set Your TimeZone</li>
                                            <li>Salary status (Monthly or Hourly)</li>
                                            <li>IP Restriction</li>
                                            <li>Shift Management</li>
                                            <li>Holiday Listing</li>
                                            <li>Leave Management Module</li>
											<li>Event Management Module....etc many more.</li>
                                        </ul>
                                    </p>
                                    <h3>And many more Pro Plugins are available to know more 
                                    	<a class="btn btn-primary title_offers" href="https://weblizar.com/plugins/">Visit Here</a> 
                                    </h3>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
                                <div class="price">
                                    <span class="currency">USD</span>
                                    <span class="price-number"><span>$14</span></span>
                                </div>
                                <div class="btn-group-vertical">
                                    <a target="_blank" class="btn btn-primary btn-lg" href="https://weblizar.com/plugins/clockin-pro-plugin/">Demo</a>
                                    <a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/clockin-pro-plugin/">Buy Now</a>
                                </div>
                            </div>
                        </div>
                    </div>				
					<!--offers-->
					<div id="offers" class="tab-pane fade">
							<div class=" p_head theme">
                                <h1 class="section-title">Weblizar Offers</h1>
                            </div>
						<div class="row p_plugin blog_gallery">			
						 <div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
							<div class="img-thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/images/offer.jpg" class="img-responsive" alt="img"/>
							</div>						
						</div>
						 <div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
                                <div class="row p-box">
                                    <h2>Get the Exciting Deals here , Daily
                                    <a class="btn btn-primary title_offers" href="https://weblizar.com/offers/">Visit Here</a> 
                                    </h2>
                                </div>
                            </div>
							</div>
					</div>
                </div>
            </div>            
<?php
	}
}
?>