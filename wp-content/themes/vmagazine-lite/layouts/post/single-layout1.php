<?php
/**
 * Template part for displaying single post layout 1
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */
$post_id = get_the_ID();
?>

<div id="primary" class="content-area post-single-layout1 vmagazine-lite-content">
	<main id="main" class="site-main" role="main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php vmagazine_lite_post_cat_lists(); ?>

			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header><!-- .entry-header -->

			<div class="entry-meta clearfix">
				<?php vmagazine_lite_icon_meta(); ?>
			</div><!-- .entry-meta -->
			<?php
			
					vmagazine_lite_single_post_featured_image();
			?>

			<div class="entry-content clearfix">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'vmagazine-lite' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'vmagazine-lite' ),
						'after'  => '</div>',
					) ); ?>
				</div>
				<div class="entry-content clearfix">	
                    <?php if( has_tag() ) : ?>
                    <div class="post-tag">
                    	<span class="tag-title"><?php echo esc_html__('Related tags : ','vmagazine-lite');?></span>
                    	 <?php vmagazine_lite_single_post_tags_list();?>
                    </div>
					<?php endif; ?>
					<?php 
					 $vmagazine_lite_post_share_option = get_theme_mod('vmagazine_lite_post_share_option','hide');
					 if( $vmagazine_lite_post_share_option == 'show' ):
					 ?>
			        <div class="access-social-share">
			            <?php
			            	if( class_exists('SC_PRO_Class') ) {
			               echo do_shortcode("[apss-share share_text='".esc_html__('Share it on:','vmagazine-lite')."']");
			           } ?>
			        </div>
			    	<?php endif; ?>
			    	
					<?php
					/** Post ADS **/
					$ads_url = get_post_meta( get_the_ID(), 'vmagazine_lite_ads_url', true ); 
					$ads_img = get_post_meta( get_the_ID(), 'vmagazine_lite_ads_img', true );
					if( $ads_img ){
					?>
					<div class="post-ads">
						<a href="<?php echo esc_url($ads_url);?>" target="_blank">
							<img src="<?php echo esc_url($ads_img);?>" >
						</a>
					</div>
					<?php 
					}
					/**
					 * Post navigation
					 */
					//the_post_navigation();
					the_post_navigation( array(
				            'prev_text'		=> __( '<span> Previous Article</span> <p>%title</p>','vmagazine-lite' ),
				            'next_text'     => __( '<span> Next Article</span> <p>%title</p>','vmagazine-lite' ),
				        ) );
				?>
			</div><!-- .entry-content -->
            
			<?php
             /**
			 * Related posts
			 */
			do_action( 'vmagazine_lite_related_posts' );
								
			// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			
				comment_form(array(
					'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title"><span class="title-bg">',
					'title_reply' => esc_html__('Comment here','vmagazine-lite'),
					'title_reply_after' => '</span></h4>',
					'comment_notes_before' => '',
					'label_submit'=> esc_html__('Comment','vmagazine-lite'),
					));
			?>

			<?php vmagazine_lite_entry_footer(); ?>
		</article><!-- #post-## -->
		<?php
			
		?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php		
	/**
	 * Post sidebar
	 */
	vmagazine_lite_get_sidebar();
?>