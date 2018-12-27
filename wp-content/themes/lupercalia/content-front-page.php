<?php if ( is_active_sidebar('front') ) : ?>

	<div class="row">
	
		<div class="wrapper">
		
			<section class="front-top">
			
				<div class="row-post">
				
					<?php dynamic_sidebar('front'); ?>
				
				</div> <!-- .row-post -->
				
			</section> <!-- .front-top -->
			
		</div> <!-- .wrapper -->
		
	</div>	<!-- .row -->

<?php endif; ?>

<?php lupercalia_last_entries(); ?>	
	
	
	
	