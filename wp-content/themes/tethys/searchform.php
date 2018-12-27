									<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
										<input type="text" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo esc_attr_x( 'Enter keyword...', 'placeholder', 'tethys' ); ?>">
									</form>