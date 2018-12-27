<?php
/**
 * Template part for displaying results in search pages
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
$excerpt_display = get_theme_mod('excerpt-display','full-content');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php euphoric_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
		$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','euphoric'));

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
		<?php } ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
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
