<?php
/**
* The template for displaying all single posts.
*
* @package CPMMagz
*/

get_header(); ?>

<div id="content" class="site-content">

	<div class="container">
		<div class="row">

			<?php

            $side_class = get_theme_mod('sidebar_toggle');
            if ($side_class == 'right')
				{
					$class = 'col l8 s12 m12';
                }  elseif ( $side_class == 'left' )
				{
                    $class = 'col l8 s12 m12';
			?>
				<div class="col l4 s12 m12 left">
					<aside id="sidebar" class="sidebar left-side">
						<?php get_sidebar(); ?>
					</aside>
				</div><!-- Col 4 Sidebar -->

			 <?php
					}
                    elseif ( $side_class == 'none'){
                        $class = 'col l12';
                    }
					else
					{
						$class = 'col l8 s12 m12';
					}
                ?>

				<div class="<?php echo esc_attr($class); ?>">
					<div id="primary" class="content-area ">
						<?php get_template_part('template-parts/content', 'single'); ?>
					</div> <!-- End Primary -->
				</div><!-- End Col 8 -->

				<?php if ($side_class == 'right'  || $side_class == '') { ?>
					<div class="col l4 s12 m12 right">
						<aside id="sidebar" class="sidebar right-side">
							<?php get_sidebar(); ?>
						</aside>
					</div><!-- Col 4 Sidebar -->
				<?php } ?>

		</div><!-- row -->

	</div><!-- container -->

</div><!-- End  Content-->
<?php get_footer(); ?>