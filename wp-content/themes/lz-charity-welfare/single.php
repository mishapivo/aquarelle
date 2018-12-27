<?php
/**
 * The template for displaying all single posts
 * @package WordPress
 * @subpackage lz-charity-welfare
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container">
	<div class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			    $layout_option = get_theme_mod( 'lz_charity_welfare_theme_options',__( 'Right Sidebar','lz-charity-welfare' ) );
			    if($layout_option == 'Left Sidebar'){ ?>
			    	<div class="row">
				        <div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				        <div id="" class="content_area col-md-8 col-sm-8">
					    	<section id="post_section">
								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content-single' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

									the_post_navigation( array(
										'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'lz-charity-welfare' ) . '</span>',
										'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'lz-charity-welfare' ) . '</span> ',
									) );

								endwhile; // End of the loop.
								?>
							</section>
						</div>
						<div class="clearfix"></div>
					</div>			
			<?php }else if($layout_option == 'Right Sidebar'){ ?>
				<div class="row">
					<div id="" class="content_area col-md-8 col-sm-8">
						<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content-single' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'lz-charity-welfare' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'lz-charity-welfare' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
					<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				</div>
			<?php }else if($layout_option == 'One Column'){ ?>
					<div id="" class="content_area">
						<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content-single' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'lz-charity-welfare' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'lz-charity-welfare' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>			
			<?php }else if($layout_option == 'Three Columns'){ ?>	
				<div class="row">
					<div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1'); ?></div>	
					<div id="" class="content_area col-md-6 col-sm-6">
						<section id="post_section">
							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								get_template_part( 'template-parts/post/content-single' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								the_post_navigation( array(
									'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'lz-charity-welfare' ) . '</span>',
									'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'lz-charity-welfare' ) . '</span> ',
								) );

							endwhile; // End of the loop.
							?>
						</section>
					</div>
					<div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
				</div>
			<?php }else if($layout_option == 'Four Columns'){ ?>
				<div class="row">
					<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<div id="" class="content_area col-md-3">
						<section id="post_section">
								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content-single' );

									// If comments are open or we have at least one comment, load up the comment template.
									if ( comments_open() || get_comments_number() ) :
										comments_template();
									endif;

									the_post_navigation( array(
										'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'lz-charity-welfare' ) . '</span>',
										'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'lz-charity-welfare' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'lz-charity-welfare' ) . '</span> ',
									) );

								endwhile; // End of the loop.
								?>
						</section>
					</div>
					<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
			        <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
		        </div>
	    	<?php }else if($layout_option == 'Grid Layout'){ ?>
		    	<div class="row">
			    	<div id="" class="content_area col-md-8 col-sm-8">
						<section id="post_section">
							<div class="row">
								<?php
								if ( have_posts() ) :

									/* Start the Loop */
									while ( have_posts() ) : the_post();

										/*
										 * Include the Post-Format-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
										 */
										get_template_part( 'template-parts/post/content-single' );

									endwhile;					
								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif;
								?>
								<div class="navigation">
					                <?php
					                    // Previous/next page navigation.
					                    the_posts_pagination( array(
					                        'prev_text'          => __( 'Previous page', 'lz-charity-welfare' ),
					                        'next_text'          => __( 'Next page', 'lz-charity-welfare' ),
					                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-charity-welfare' ) . ' </span>',
					                    ) );
					                ?>
					                <div class="clearfix"></div>
					            </div>
							</div>
						</section>
					</div>
					<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?></div>	
				</div>		
			<?php } else { ?>
				<div class="row">
					<div id="" class="content_area col-md-8 col-sm-8">
						<section id="post_section">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content-single' );
								endwhile;
								else :

									get_template_part( 'template-parts/post/content', 'none' );
								endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'lz-charity-welfare' ),
				                        'next_text'          => __( 'Next page', 'lz-charity-welfare' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lz-charity-welfare' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?>
					</div>
				</div>
			<?php } ?>
		</main>
	</div>
</div>

<?php get_footer();