				<div class="space-single-page-read-more relative">
					<div class="space-widget relative">
						<div class="space-widget-title relative">
							<div class="space-widget-title-line relative"></div>
							<span><?php esc_html_e( 'Read More', 'tethys' ); ?></span>
						</div>
						<div class="space-news-widget-10 relative">
							<ul class="space-news-widget-10-items relative">
								<?php
									$args = array( 'posts_per_page' => 3, 'category__in' => wp_get_post_categories($post->ID), 'exclude' => $post->ID);
									$saturn_related = get_posts( $args );
									if( $saturn_related ) foreach( $saturn_related as $post ){ setup_postdata($post);
								?>
								<li class="space-news-widget-10-item relative">
									<div class="space-news-widget-10-item-ins case-15 white relative">
										<?php 
											$related_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-loop-img'); 
											$related_img_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
											if ($related_img) { ?>
										<div class="space-news-widget-10-item-img relative">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
												<img src="<?php echo esc_url($related_img[0]); ?>" alt="<?php echo esc_attr($related_img_alt); ?>">
												<?php if ( has_post_format( 'video' )) { ?>
													<div class="space-post-format absolute"><i class="fa fa-play" aria-hidden="true"></i></div>
												<?php } ?>
												<?php if ( has_post_format( 'image' )) { ?>
													<div class="space-post-format absolute"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
												<?php } ?>
												<?php if ( has_post_format( 'gallery' )) { ?>
													<div class="space-post-format absolute"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
												<?php } ?>
											</a>
										</div>
										<?php } ?>
										<div class="space-news-widget-10-item-title relative">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
											<span class="date"><i class="fa fa-calendar-o" aria-hidden="true"></i> <?php if( get_theme_mod('tethys_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'tethys' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
										</div>
									</div>
								</li>
								<?php } else { ?>
									<div class="space-archive-loop-items-not-found relative">
										<div class="space-archive-loop-items-not-found-ins case-15 white relative">
											<div class="space-archive-loop-item-title-ins no-image relative">
												<h2><?php esc_html_e( 'Posts not found.', 'tethys' ); ?></h2>
												<p>
													<?php esc_html_e( 'Sorry, no other posts related this article.', 'tethys' ); ?> 
												</p>
											</div>
										</div>
									</div>
								<?php } wp_reset_postdata(); ?>
							</ul>
						</div>
					</div>
				</div>