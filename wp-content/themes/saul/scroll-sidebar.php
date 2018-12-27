<div id="sidebar-wrapper">
	
	<div id="scroll-sidebar" class="clearfix">
    
		<div class="navigation"><i class="fa fa-times open"></i></div>	

		<?php if ( saul_is_mobile() == true ) : ?>
        
            <div class="post-article">
    
                <div class="title-container">
                	<h3 class="title"><?php esc_html_e('Menu', 'saul');?></h3>
                </div>
        
                <nav id="widget-menu" class="custommenu">
                
                    <?php 
					
						wp_nav_menu( 
						
							array(
								'menu' => 'main-menu', 
								'container' => 'false',
								'depth' => 3, 
								'menu_id' => 'widgetmenus'
							)
						
						);
                    
					?>
                
                </nav>                
            
            </div>

		<?php 
			
			endif;
        
			if ( is_active_sidebar(jaxlite_sidebar_name('scroll'))) { 
                                
				dynamic_sidebar(jaxlite_sidebar_name('scroll'));
                                
			} else { 

				the_widget(
					
					'WP_Widget_Calendar',
					array( 'title'=> esc_html__('Calendar', 'saul')),
					array(
						'before_widget' => '<div class="post-article widget-box widget_calendar">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="title-container"><h3 class="title">',
						'after_title'   => '</h3></div>'
					)
				
				);
                    
				the_widget(
					
					'WP_Widget_Archives',
					array( 'title'=> esc_html__('Archives', 'saul')),
					array(
						'before_widget' => '<div class="post-article widget-box widget_calendar">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="title-container"><h3 class="title">',
						'after_title'   => '</h3></div>'
					)
				
				);
                    
				the_widget(
					
					'WP_Widget_Categories',
					array( 'title'=> esc_html__('Categories', 'saul')),
					array(
						'before_widget' => '<div class="post-article widget-box widget_calendar">',
						'after_widget'  => '</div>',
						'before_title'  => '<div class="title-container"><h3 class="title">',
						'after_title'   => '</h3></div>'
					)
				
				);
                                
			} 
                            
		?>
	    
		<div class="post-article">

			<div class="copyright">
	                
				<p>
				
					<?php 
					
						if ( jaxlite_setting('jaxlite_copyright_text') ): 
							
							echo stripslashes(jaxlite_setting('jaxlite_copyright_text'));
							
						else:
						
							echo esc_html__('Copyright ', 'saul') . get_bloginfo("name") . " " . date("Y");
						
						endif; 
							
						echo " | " . esc_html__('Theme by ', 'saul'); 
					?> 
                    
                    	<a href="<?php echo esc_url('https://www.themeinprogress.com/'); ?>" target="_blank"><?php esc_html_e('ThemeinProgress ', 'saul');?></a> |
                        <a href="<?php echo esc_url('http://wordpress.org/'); ?>" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'saul' ); ?>" rel="generator"><?php printf( esc_html__( 'Proudly powered by %s', 'saul' ), 'WordPress' ); ?></a>
                    
				</p>
	                    
			</div>

			<?php do_action('jaxlite_socials'); ?>

		</div>
	    
	</div>

</div>