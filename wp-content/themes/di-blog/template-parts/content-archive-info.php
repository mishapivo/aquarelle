<div class="container-fluid archive-info-outer">
	<div class="container">
		<div class="row">
			<div class="col-md-12 archive-info">

				<?php
				if( is_search() ) {
					echo '<span class="topspan">' . esc_attr__( 'Search results for:', 'di-blog' ) . '</span>';
					echo '<h1 class="bottomhdln">' . esc_attr( get_search_query() ) . '</h1>';
				} elseif( is_archive() ) {
					echo '<span class="topspan">' . esc_attr__( 'Browsing: ', 'di-blog' ) . '</span>';
					the_archive_title( '<h1 class="bottomhdln">', '</h1>' );
				} else {
					
				}

				?>
				
			</div>
		</div>
	</div>
</div>
