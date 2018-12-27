<?php
if ( !function_exists('st_blog_widget_blcok') ) :

	/**
     * Blank Block Widgeet Section
     *
     * @since st-blog 1.0.0
     *
     * @param null
     * @return null
     *
     */
	function st_blog_widget_blcok()
	{
		global $st_blog_customizer_all_values;

		if ( is_active_sidebar('full-width-widget')  ) {  ?>
			<!-- instagram -->
			<section class="st-blog-full-width-widget clearfix" id="st-full-width">
				<div class="container">
					<?php dynamic_sidebar('full-width-widget'); ?>
				</div>			
			</section>
		<?php }
	}
endif;
add_action('st_blog_action_front_page','st_blog_widget_blcok');