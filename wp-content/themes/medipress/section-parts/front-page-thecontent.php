<?php 
// To display The Content section on front page
if(have_posts()) : 
	while(have_posts()) : the_post();  
		if(get_the_content()!= "")
		{
		?>
			<section class="section">
				<div class="container">
					<?php the_content(); ?> 
				</div> 
			</section>	
		<?php 
		}	
	endwhile;
endif; ?>