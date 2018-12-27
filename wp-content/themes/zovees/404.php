<?php
/**
* @package Zovees
*/

get_header(); 
?>
	<section class="page404">
		<div class="container">
	    	<div class="row">
	    		<div class="col-md-12">
	    			<div class="error_pagenotfound">    	
				        <strong><?php echo esc_html__('404','zovees') ?></strong>
				        <br>
				        <?php echo esc_html__('The page you are looking for no longer exists. Perhaps you can return back to the sites homepage see you can find what you are looking for.','zovees'); ?>			        
				        <div class="clearfix mar_top3"></div>
				       
				       	<a class="but_goback" href="<?php echo esc_html(site_url());?>"><i class="ti-arrow-circle-left" aria-hidden="true"></i> <?php echo esc_html__('Back To Home','zovees'); ?></a>
				       
				    </div>
	    		</div>
	       </div> 	
	    </div><!-- end container -->
	</section>

<?php get_footer(); ?>