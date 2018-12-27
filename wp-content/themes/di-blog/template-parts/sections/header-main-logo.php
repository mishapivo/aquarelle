<div class="container-fluid mainlogooutr" >
	<div class="container" >
		<div class="row" >
			<div class="col-md-12" >
				<div class="mainlogoinr" >
					<?php
					if( has_custom_logo() ) {
					?>
						<div itemscope itemtype="http://schema.org/Organization" class="hdrlogoimg" >
							<?php the_custom_logo(); ?>
						</div>
					<?php
					} else {
						echo "<h3 class='site-name-pr'>";
							do_action( 'di_blog_header_file_blogname' );
						echo "</h3>";
						
						echo "<p class='site-description-pr'>";
							do_action( 'di_blog_header_file_blogdescription' );
						echo "</p>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>