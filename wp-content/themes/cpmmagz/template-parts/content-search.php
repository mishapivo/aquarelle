<?php
/**
* The template part for displaying results in search pages.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package CPMMagz
*/
?>
<?php if (have_posts()) :  ?>
<div id="content" class="site-content">
<div class="container">
	<div class="row">
		<div class="col l8 s12 m12">
			<div id="primary" class="content-area">
				<main class="site-main" id="main" role="main">
					<div class="post-header">
						<div class="card">
							<div class="card-header">
								<h1 class="page-title"><?php printf(esc_html(__('Search Results for: %s', 'cpmmagz')), '<span>' . get_search_query() . '</span>' ); ?>
								</h1>
							</div>
							<div class="card-content">
								<?php get_search_form(); ?>
							</div>
						</div>
					</div>
					<?php  while (have_posts()) :
							 the_post();
					?>
						<div class="card post-card news-big ">
							<article class="post">
								<div class="featured-media">
									<?php get_template_part('content', get_post_format($post->ID)); ?>
								</div>
								<div class="card-desc">
									<div class="card-content card-wrapper">
										<header class="entry-header">
											<?php
											$cats = cpmmagz_all_taxonomy_name($post->ID, 'category');
											$links = cpmmagz_all_taxonomy_link($post->ID, 'category');
											foreach ($cats as $cat) {
												cpmmagz_cat_names($cat , $links);
											}
											?>
											<h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
											<span class="entry-meta">
												<?php cpmmagz_meta_data($post);?>
											</span>
										</header>
										<!-- Entry Header -->
										<div class="entry-content clearfix">
											<?php the_excerpt(); ?>
										</div>
										<!-- Entry Content -->

										<?php
										$posttags = get_the_tags();
										$tagid = cpmmagz_all_taxonomy_link($post->ID, 'category');
										if ($posttags) { ?>
										<footer class="entry-footer">
											<div class="footer-meta-wrap">
												<div class="row valign-wrapper">
													<div class="col l12">
														<div class="footer-meta">
															<?php
															foreach ($posttags as $tags) {
																cpmmagz_tag_link($tags, $tagid);
															}
															?>
														</div>
													</div>
												</div>
											</div>
										</footer>
										<!-- Entry Footer -->
										<?php } ?>

									</div>
									<!-- Card Content -->
								</div>
								<!-- Card Desc -->
							</article>
						</div>
					<?php endwhile; // End of the loop. ?>

				<?php else : ?>
					<?php get_template_part('template-parts/content', 'none'); ?>
				<?php endif; ?>
				<!-- Pagination -->
				<?php
					// Pagination goes here
					if (function_exists('wp_paginate')) { ?>
						<!-- If WP Paginate plugin is active -->
						<div class="pagination pagination-navi card clearfix right">
							<?php wp_paginate(); ?>
						</div>
					<?php }
					else {
	                    				// If WP Paginate plugin is not active
						cpmmagz_navigation_page();
					}
				?>
			</main>
		</div>
		<!-- End Primary -->
	</div>
	<!-- End Column 8 -->
	<div class="col l4 s12 m12 right">
		<?php get_sidebar(); ?>
	</div>
	<!--End Column 4 Sidebar -->
</div>
</div>
</div>