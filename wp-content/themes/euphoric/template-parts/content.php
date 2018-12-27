<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package euphoric
 */

?>
<?php 
$disable_category = get_theme_mod('disable-cateogry',0);
$disable_date = get_theme_mod('disable-date',0);
$disable_author = get_theme_mod('disable-author',0);
$disable_comments = get_theme_mod('disable-comments',0);
$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'euphoric' ) );
$excerpt_display = get_theme_mod('excerpt-display','excerpt-display');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
	$disable_featured_image_single = get_theme_mod('disable_featured_image_single',0);
	if($disable_featured_image_single !=0 && is_single() ): 
	// Silence is Golder
	else :
		euphoric_post_thumbnail();
	endif; ?>
	<header class="entry-header">
		<?php
		$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','euphoric'));
		

		if ( 'post' === get_post_type() ) :
			if($disable_category ==0 || !empty($tags_list) ){ ?>
			<div class="entry-meta">
				<?php
					if($disable_category ==0) {
						euphoric_cat_lists ();
					}
					if(!empty($tags_list)){
						euphoric_tag_lists();
					}
				?>
			</div><!-- .entry-meta -->
			<?php }

		if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
		do_action('euphoric_frontpage_breadcrumbs');
		if( $disable_date ==0 ){ ?>
		<div class="entry-meta">
			<?php euphoric_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php } 

	 endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php
		if(is_single()){
			the_content();
		} else {
			if($excerpt_display == 'full-content'){
				the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					$excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );
			} else {
				the_excerpt();
			}
		}
		

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'euphoric' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
	<?php if($disable_author ==0 || $disable_comments ==0 ) { ?>
		<footer class="entry-footer">
			<div class="entry-meta">
				<?php
					if($disable_author ==0){
						euphoric_posted_by();
					}
					if($disable_comments ==0) {
						euphoric_comment_links();
					}
				?>
			</div><!-- .entry-meta -->
		</footer><!-- .entry-footer -->
			
	<?php } ?>
</article><!-- #post-<?php the_ID(); ?> -->
