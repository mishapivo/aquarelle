<?php
/**
 * The Footer for our theme.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Alacrity Lite
 */
?>
</div> <!-- #page -->
<footer id="colophon" class="site-footer" role="contentinfo">
    	<div class="row footer-top">    			
    		<div class="container">
         		<?php
					if ( is_active_sidebar( 'footer-1' ) ) { ?>
						<div class="col footer-widget-1">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					<?php }
					if ( is_active_sidebar( 'footer-2' ) ) { ?>
						<div class="col footer-widget-2">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					<?php }?>

					<?php
					$cnt_info_title = get_theme_mod('cnt_info_title');
					$cnt_info_text = get_theme_mod('cnt_info_text');
	                $cnt_address = get_theme_mod('cnt_address');
	                $cnt_number = get_theme_mod('cnt_number');
	                $cnt_fax_number = get_theme_mod('cnt_fax_number');
	                $cnt_email = sanitize_email(get_theme_mod('cnt_email'));
	                ?>
					<div class="col footer-widget-3">
						<div class="footer-info">
							<?php if (!empty($cnt_info_title)) { ?>
							<h3 class="widget-title"><?php echo esc_html($cnt_info_title);?></h3>
							<?php } ?>
							<?php if (!empty($cnt_info_text)) { ?>
							<p><?php echo esc_html($cnt_info_text);?></p>
							<?php } ?>
							<?php if (!empty($cnt_address)) { ?>
							<p><i class="fa fa-map-marker"></i><?php echo esc_html($cnt_address);?></p>
							<?php } ?>
							<?php if (!empty($cnt_number)) { ?>
							<p><i class="fa fa-phone"></i><?php echo esc_html($cnt_number);?></p>
							<?php } ?>
							<?php if (!empty($cnt_fax_number)) { ?>
							<p><i class="fa fa-fax"></i><?php echo esc_html($cnt_fax_number);?></p>
							<?php } ?>
							<?php if (!empty($cnt_email)) { ?>
                 			<p><a href="mailto:<?php echo esc_html( antispambot( $cnt_email )); ?>"><i class="fa fa-envelope "></i><?php echo esc_html( antispambot( $cnt_email )); ?></a></p>
                 			<?php } ?>
                 		</div>
						<?php alacrity_lite_social_links();?>
					</div>
			</div>					
		</div> <!-- .footer-top -->
		<div class="row footer-bottom">
	    	<div class="container">
				<div class="copyright left"><span class="crf"><?php echo esc_html__('Copyright &copy;','alacrity-lite');?> <?php echo esc_html(date_i18n(__('Y','alacrity-lite'))); ?> <?php esc_html_e('All Rights Reserved.','alacrity-lite');?></span></div>					
				<div class="powered_by right"><?php esc_html_e('Proudly Powered By ','alacrity-lite'); ?>
					<a href="<?php echo esc_url('https://wordpress.org'); ?>"><?php esc_html_e('WordPress','alacrity-lite'); ?></a>
					</div>
			</div>
		</div> <!-- .footer-bottom -->
</footer><!-- #colophon -->
<?php wp_footer(); ?>
</body>
</html>