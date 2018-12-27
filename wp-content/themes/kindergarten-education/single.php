<?php
/**
 * The Template for displaying all single posts.
 * @package Kindergarten Education
 */

get_header(); ?>

<div class="container">
    <div class="main-wrapper">
    	<?php
            $layout_option = get_theme_mod( 'kindergarten_education_layout_options','Right Sidebar');
            if($layout_option == 'One Column'){ ?>
			<div id="content_box">
				<?php while ( have_posts() ) : the_post(); ?>
					<h3><?php the_title();?></h3>
					<div class="metabox">
						<span class="entry-date"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
						<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
						<span class="entry-comments"> <?php comments_number( __('0 Comment', 'kindergarten-education'), __('0 Comments', 'kindergarten-education'), __('% Comments', 'kindergarten-education') ); ?> </span>
					</div>
					<?php if(has_post_thumbnail()) { ?>
						<div class="feature-box">	
							<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
						</div>				
					<?php } 
					the_content();

					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kindergarten-education' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
						'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>%',
						'separator'   => '<span class="screen-reader-text">, </span>',
					) );
						
					if ( is_singular( 'attachment' ) ) {
						// Parent post navigation.
						the_post_navigation( array(
							'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'kindergarten-education' ),
						) );
					} elseif ( is_singular( 'post' ) ) {
						// Previous/next post navigation.
						the_post_navigation( array(
							'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'kindergarten-education' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Next post:', 'kindergarten-education' ) . '</span> ' .
								'<span class="post-title">%title</span>',
							'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'kindergarten-education' ) . '</span> ' .
								'<span class="screen-reader-text">' . __( 'Previous post:', 'kindergarten-education' ) . '</span> ' .
								'<span class="post-title">%title</span>',
						) );
					}
	                
	                echo '<div class="clearfix"></div>';
	                
					the_tags(); 

	                // If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
	                ?>
	            <?php endwhile; // end of the loop. ?>
	       	</div>
	    <?php }else if($layout_option == 'Three Columns'){ ?>
	    	<div class="row">
				<div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
				<div class="col-md-6 col-sm-6" id="content_box">
					<?php while ( have_posts() ) : the_post(); ?>
						<h3><?php the_title();?></h3>
						<div class="metabox">
							<span class="entry-date"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
							<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
							<span class="entry-comments"> <?php comments_number( __('0 Comment', 'kindergarten-education'), __('0 Comments', 'kindergarten-education'), __('% Comments', 'kindergarten-education') ); ?> </span>
						</div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kindergarten-education' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'kindergarten-education' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		                ?>
		            <?php endwhile; // end of the loop. ?>
		       	</div>
				<div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
			</div>
		<?php }else if($layout_option == 'Four Columns'){ ?>
			<div class="row">	
				<div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
				<div class="col-md-3 col-sm-3" id="content_box">
					<?php while ( have_posts() ) : the_post(); ?>
						<h3><?php the_title();?></h3>
						<div class="metabox">
							<span class="entry-date"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
							<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
							<span class="entry-comments"> <?php comments_number( __('0 Comment', 'kindergarten-education'), __('0 Comments', 'kindergarten-education'), __('% Comments', 'kindergarten-education') ); ?> </span>
						</div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kindergarten-education' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'kindergarten-education' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		                ?>
		            <?php endwhile; // end of the loop. ?>
		       	</div>
				<div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
				<div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
			</div>
		<?php }else if($layout_option == 'Grid Layout'){ ?>
			<div class="row">
				<div class="col-md-8 col-sm-8" id="content_box">
					<?php while ( have_posts() ) : the_post(); ?>
						<h3><?php the_title();?></h3>
						<div class="metabox">
							<span class="entry-date"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
							<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
							<span class="entry-comments"> <?php comments_number( __('0 Comment', 'kindergarten-education'), __('0 Comments', 'kindergarten-education'), __('% Comments', 'kindergarten-education') ); ?> </span>
						</div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kindergarten-education' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'kindergarten-education' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		                ?>
		            <?php endwhile; // end of the loop. ?>
		       	</div>
				<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-2'); ?></div>
	    	</div>
	    <?php }else if($layout_option == 'Left Sidebar'){ ?>
	    	<div class="row">
	    		<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
				<div class="col-md-8 col-sm-8" id="content_box">
					<?php while ( have_posts() ) : the_post(); ?>
						<h3><?php the_title();?></h3>
						<div class="metabox">
							<span class="entry-date"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
							<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
							<span class="entry-comments"> <?php comments_number( __('0 Comment', 'kindergarten-education'), __('0 Comments', 'kindergarten-education'), __('% Comments', 'kindergarten-education') ); ?> </span>
						</div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kindergarten-education' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'kindergarten-education' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		                ?>
		            <?php endwhile; // end of the loop. ?>
		       	</div>
	    	</div>
	    <?php }else if($layout_option == 'Right Sidebar'){ ?>
		    <div class="row">
		       	<div class="col-md-8 col-sm-8" id="content_box">
					<?php while ( have_posts() ) : the_post(); ?>
						<h3><?php the_title();?></h3>
						<div class="metabox">
							<span class="entry-date"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
							<span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
							<span class="entry-comments"> <?php comments_number( __('0 Comment', 'kindergarten-education'), __('0 Comments', 'kindergarten-education'), __('% Comments', 'kindergarten-education') ); ?> </span>
						</div>
						<?php if(has_post_thumbnail()) { ?>
							<hr>
							<div class="feature-box">	
								<img src="<?php the_post_thumbnail_url('full'); ?>" width="100%">
							</div>
							<hr>					
						<?php } 
						the_content();

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'kindergarten-education' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );
							
						if ( is_singular( 'attachment' ) ) {
							// Parent post navigation.
							the_post_navigation( array(
								'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'kindergarten-education' ),
							) );
						} elseif ( is_singular( 'post' ) ) {
							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'kindergarten-education' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'kindergarten-education' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );
						}
		                
		                echo '<div class="clearfix"></div>';
		                
						the_tags(); 

		                // If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
		                ?>
		            <?php endwhile; // end of the loop. ?>
		       	</div>
				<div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-1'); ?></div>
			</div>
		<?php }?>
	    <div class="clearfix"></div>
    </div>
</div>
<?php get_footer(); ?>