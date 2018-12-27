<?php
/**
 * The template for displaying archive pages
 * @package WordPress
 * @subpackage chalak-driving-school
 * @since 1.0
 * @version 0.1
 */

get_header(); ?>

<div class="container">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
		</header>
	<?php endif; ?>

	<div class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			    $layout_option = get_theme_mod('chalak_driving_school_theme_options',__( 'Right Sidebar','chalak-driving-school') );
			    if($layout_option == 'Left Sidebar'){ ?>
			    	<div class="row">
			        	<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				        <div id="" class="content_area col-md-8 col-sm-8">
					    	<section id="post_section">
								<?php
								if ( have_posts() ) : ?>
									<?php
									while ( have_posts() ) : the_post();
										
										get_template_part( 'template-parts/post/content' );

									endwhile;

									else :

										get_template_part( 'template-parts/post/content', 'none' );

									endif; 
								?>
								<div class="navigation">
					                <?php
					                    the_posts_pagination( array(
					                        'prev_text'          => __( 'Previous page', 'chalak-driving-school' ),
					                        'next_text'          => __( 'Next page', 'chalak-driving-school' ),
					                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'chalak-driving-school' ) . ' </span>',
					                    ) );
					                ?>
					                <div class="clearfix"></div>
					            </div>
							</section>
						</div>
						<div class="clearfix"></div>
					</div>			
			<?php }else if($layout_option == 'Right Sidebar'){ ?>
				<div class="row">
					<div id="" class="content_area col-md-8 col-sm-8">
						<section id="post_section">
							<?php
							if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif; 
							?>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'chalak-driving-school' ),
				                        'next_text'          => __( 'Next page', 'chalak-driving-school' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'chalak-driving-school' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?>
					</div>
				</div>
			<?php }else if($layout_option == 'One Column'){ ?>			
					<div id="" class="content_area">
						<section id="post_section">
							<?php
							if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif; 
							?>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'chalak-driving-school' ),
				                        'next_text'          => __( 'Next page', 'chalak-driving-school' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'chalak-driving-school' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
			<?php }else if($layout_option == 'Three Columns'){ ?>	
				<div class="row">
					<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>	
					<div id="" class="content_area col-md-6 col-sm-6">
						<section id="post_section">
							<?php
							if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile;
								
								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif;
							?>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'chalak-driving-school' ),
				                        'next_text'          => __( 'Next page', 'chalak-driving-school' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'chalak-driving-school' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
				</div>
			<?php }else if($layout_option == 'Four Columns'){ ?>
				<div class="row">
					<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
					<div id="" class="content_area col-md-3">
						<section id="post_section">
							<?php
							if ( have_posts() ) : ?>
								<?php
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );

								endwhile;

								else :

									get_template_part( 'template-parts/post/content', 'none' );

								endif; 
							?>
							<div class="navigation">
				                <?php
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'chalak-driving-school' ),
				                        'next_text'          => __( 'Next page', 'chalak-driving-school' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'chalak-driving-school' ) . ' </span>',
				                    ) );
				                ?>
				                <div class="clearfix"></div>
				            </div>
						</section>
					</div>
					<div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
			        <div id="sidebar" class="col-md-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
		        </div>
	   		<?php }else if($layout_option == 'Grid Layout'){ ?>
		    	<div class="row">
			    	<div id="" class="content_area col-md-8 col-sm-8">
						<section id="post_section" >
							<div class="row">
								<?php
								if ( have_posts() ) : ?>
									<?php
									while ( have_posts() ) : the_post();

										get_template_part( 'template-parts/post/grid-layout' );

									endwhile;

									else :

										get_template_part( 'template-parts/post/grid-layout', 'none' );

									endif; 
								?>
								<div class="navigation">
					                <?php
					                    the_posts_pagination( array(
					                        'prev_text'          => __( 'Previous page', 'chalak-driving-school' ),
					                        'next_text'          => __( 'Next page', 'chalak-driving-school' ),
					                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'chalak-driving-school' ) . ' </span>',
					                    ) );
					                ?>
					                <div class="clearfix"></div>
					            </div>
							</div>
						</section>
					</div>
					<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?>			
					</div>	
				</div>	
			<?php } else { ?>
				<div class="row">
					<div id="" class="content_area col-md-8 col-sm-8">
						<section id="post_section">
							<?php
							if ( have_posts() ) :
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									get_template_part( 'template-parts/post/content' );
								endwhile;
								else :

									get_template_part( 'template-parts/post/content', 'none' );
								endif;
							?>
							<div class="navigation">
				                <?php
				                    // Previous/next page navigation.
				                    the_posts_pagination( array(
				                        'prev_text'          => __( 'Previous page', 'chalak-driving-school' ),
				                        'next_text'          => __( 'Next page', 'chalak-driving-school' ),
				                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'chalak-driving-school' ) . ' </span>',
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
