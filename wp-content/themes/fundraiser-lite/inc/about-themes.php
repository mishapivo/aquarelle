<?php
//about theme info
add_action( 'admin_menu', 'fundraiser_lite_abouttheme' );
function fundraiser_lite_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'fundraiser-lite'), esc_html__('About Theme', 'fundraiser-lite'), 'edit_theme_options', 'fundraiser_lite_guide', 'fundraiser_lite_mostrar_guide');   
} 
//guidline for about theme
function fundraiser_lite_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_attr_e('Theme Information', 'fundraiser-lite'); ?>
		   </div>
          <p><?php esc_attr_e('Fundraiser lite is a charity, ngo, non profit, non government organization, organizing fundraising, celebrity events, trust, donation, blood camps, relief material, rescue operations, welfare activities and other types of campaign websites. It can also be used by churches, political and non political organizations, non-profit, child, foundations and others. Responsive, compatible with page builders, compatible with donation plugins and WooCommerce for selling tickets or merchandise. Translation ready, SEO friendly compatible with contact form and other plugins like gallery and slider for extending functionality easily. Can change color, background, logo etc. Works with shortcodes, page builders and multilingual plugins.','fundraiser-lite'); ?></p>
		  <a href="<?php echo esc_url(FUNDRAISER_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(FUNDRAISER_LITE_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_attr_e('Live Demo', 'fundraiser-lite'); ?></a> | 
				<a href="<?php echo esc_url(FUNDRAISER_LITE_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_attr_e('Buy Pro', 'fundraiser-lite'); ?></a> | 
				<a href="<?php echo esc_url(FUNDRAISER_LITE_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_attr_e('Documentation', 'fundraiser-lite'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(FUNDRAISER_LITE_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>