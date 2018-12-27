<?php
/**
 * The template part for topbar
 *
 * @package IT Company Lite 
 * @subpackage it_company_lite
 * @since IT Company Lite 1.0
 */
?>

<div id="topbar">
        <div class="container">
		<div class="row">
                	<div class="col-lg-5 col-md-5">
                		<?php if(get_theme_mod('it_company_lite_location') != ''){ ?>
                			<i class="fas fa-map-marker-alt"></i><span><?php echo esc_html(get_theme_mod('it_company_lite_location',''));?></span>
                		<?php }?>
        		</div>
                	<div class="col-lg-4 col-md-4">
                		<?php if(get_theme_mod('it_company_lite_email_address') != ''){ ?>
                			<i class="fas fa-envelope-open"></i><span><?php echo esc_html(get_theme_mod('it_company_lite_email_address',''));?></span>
                		<?php }?>
                	</div>
                	<div class="col-lg-3 col-md-3 inq-btn">
                		<?php if(get_theme_mod('it_company_lite_inquiry_btn_link') != '' | get_theme_mod('it_company_lite_inquiry_btn_text') != ''){ ?>
                			<a href="<?php echo esc_url(get_theme_mod('it_company_lite_inquiry_btn_link','#'));?>" ><?php echo esc_html(get_theme_mod('it_company_lite_inquiry_btn_text',''));?></a>
                		<?php }?>
                	</div>
                </div>
	</div>
</div>