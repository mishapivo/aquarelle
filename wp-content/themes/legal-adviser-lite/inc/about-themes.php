<?php
/**
 *Legal Adviser Lite About Theme
 *
 * @package Legal Adviser Lite
 */

//about theme info
add_action( 'admin_menu', 'legal_adviser_lite_abouttheme' );
function legal_adviser_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'legal-adviser-lite'), __('About Theme Info', 'legal-adviser-lite'), 'edit_theme_options', 'legal_adviser_lite_guide', 'legal_adviser_lite_mostrar_guide');   
} 

//Info of the theme
function legal_adviser_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'legal-adviser-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Legal Adviser Lite is a responsive, beautiful, simple and easy to use lawyer WordPress theme. It is developed to create a resourceful and powerful websites for solicitor, lawyer, law firm, attorneys and legal counseling agency. This theme can also used to create websites for corporate, restaurants, hotel, photography, portfolio, blog, personal and multipurpose projects. This theme is perfect platform for creating a professional legal counseling website for various agencies and law firm.','legal-adviser-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'legal-adviser-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'legal-adviser-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'legal-adviser-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'legal-adviser-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'legal-adviser-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'legal-adviser-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'legal-adviser-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'legal-adviser-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'legal-adviser-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( LEGAL_ADVISER_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'legal-adviser-lite'); ?></a> | 
            <a href="<?php echo esc_url( LEGAL_ADVISER_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'legal-adviser-lite'); ?></a> | 
            <a href="<?php echo esc_url( LEGAL_ADVISER_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'legal-adviser-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>