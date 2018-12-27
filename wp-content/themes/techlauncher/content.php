<?php 
/**
 * The template for displaying the content.
 * @package techlauncher
 */
?>
<div class="col-lg-12">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="TL-blog-post-box">
			<?php if(has_post_thumbnail()): ?>
				<div class="Post-thumb-img">
					<a href="<?php the_permalink(); ?>" class="TL-blog-thumb">
						<?php if(has_post_thumbnail()): ?>
						<?php $defalt_arg =array('class' => "img-responsive"); ?>
						<?php the_post_thumbnail('', $defalt_arg); ?>
						<?php endif; ?>
					</a>
				</div>
			<?php else : ?>
				<div class="Post-thumb-img">
					<a href="<?php the_permalink(); ?>" class="TL-blog-thumb">
						<?php 
							$img =get_template_directory_uri().'/images/overlay.png';
							echo '<img src="'. esc_url($img) .'"class="Overlay-image">'; 
						?>
					</a>
				</div>
			<?php endif; ?>
			<h1 class="Post-title-head">
				<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h1>
			<article class="Small">
				<div class="TL-blog-category Post-meta-data"> 
					<i class="fa fa-user Meta-fa-icon-user"></i>
					<a class="Meta-user-des" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) ));?>">
						<?php the_author(); ?>
					</a>
					<i class="fa fa-calendar Meta-fa-icons"></i>
					<span class="Meta-data-date"><?php echo get_the_date( get_option( 'date_format' ) ); ?></span>
				</div>
				<div class="row">
						
						<div class="col-lg-12 col-md-12 col-xs-12">
					
						<p>
							<?php
								the_excerpt();
							?>
						</p>
						<?php wp_link_pages( array( 'before' => '<div class="link">' . __( 'Pages:', 'techlauncher' ), 'after' => '</div>' ) ); ?>
							</div> <!-- Ending -->
				</div>
	<hr>
				<div class="Category-tag-div">
					<?php $cat_list = get_the_category_list();
					if(!empty($cat_list)) { ?>
						<i class="fa fa-folder-open Meta-fa-icons"></i>
							<?php if(!empty($cat_list)) { ?>
								<?php the_category(', '); ?>
						<?php }
					} ?>
					<br>
					<?php the_tags( '<i class="fa fa-tag" aria-hidden="true"></i> ', ', ', '<br />' ); ?>
				</div>
			</article>
		</div>
	</div>
</div>