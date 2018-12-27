				<div class="space-archive-loop-item case-15 white relative">
					<?php
						$archive_loop_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'tethys-loop-img');
						$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
						if ($archive_loop_img) { ?>
					<div class="space-archive-loop-item-img box-50 left relative">
						<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
							<div class="space-archive-loop-item-img-ins relative">
								<img src="<?php echo esc_url($archive_loop_img[0]); ?>" alt="<?php echo esc_attr($image_alt); ?>">
								<div class="space-archive-loop-item-category absolute"><?php echo esc_html(strip_tags(get_the_term_list( $post->ID, 'category', '', ', ', '' ))); ?></div>
								<?php if ( has_post_format( 'video' )) { ?>
									<div class="space-post-format absolute"><i class="fa fa-play" aria-hidden="true"></i></div>
								<?php } ?>
								<?php if ( has_post_format( 'image' )) { ?>
									<div class="space-post-format absolute"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
								<?php } ?>
								<?php if ( has_post_format( 'gallery' )) { ?>
									<div class="space-post-format absolute"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
								<?php } ?>				
							</div>
						</a>
					</div>
					<div class="space-archive-loop-item-title box-50 left relative">
						<div class="space-archive-loop-item-title-ins relative">
							<div class="space-archive-loop-item-title-meta relative">
								<?php the_author_posts_link(); ?> <span>&raquo;</span> <?php if( get_theme_mod('tethys_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'tethys' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?>
							</div>
							<div class="space-archive-loop-item-title-link relative">
								<?php if ( is_sticky() ) { ?><i class="fa fa-paperclip" aria-hidden="true"></i> <?php } ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
							</div>
							<div class="space-archive-loop-item-title-excerpt relative">
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
					</div>
					<?php } else { ?>
					<div class="space-archive-loop-item-title box-100 relative">
						<div class="space-archive-loop-item-title-ins no-image relative">
							<div class="space-archive-loop-item-title-meta-category relative">
								<?php the_category(', '); ?>
							</div>
							<div class="space-archive-loop-item-title-link relative">
								<?php if ( is_sticky() ) { ?><i class="fa fa-paperclip" aria-hidden="true"></i> <?php } ?><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
							</div>
							<div class="space-archive-loop-item-title-meta relative">
								<?php the_author_posts_link(); ?> <span>&raquo;</span> <?php if( get_theme_mod('tethys_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'tethys' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?>
							</div>
							<div class="space-archive-loop-item-title-excerpt relative">
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>