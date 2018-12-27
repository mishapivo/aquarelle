<?php
/**
 * Displaying single post content
 * @package Relief Medical Hospital
 * @subpackage relief-medical-hospital
 * @since 1.0
 */
?>

<h1><?php the_title();?></h1>
<div class="adminbox">
	<i class="fas fa-calendar-alt"></i><span><?php echo esc_html( get_the_date() ); ?></span>
	<i class="fas fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
	<i class="fas fa-comments"></i><span class="entry-comments"> <?php comments_number( esc_html__('0 Comment', 'relief-medical-hospital'), esc_html__('0 Comments', 'relief-medical-hospital'), esc_html__('% Comments', 'relief-medical-hospital') ); ?> </span>
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
	'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'relief-medical-hospital' ) . '</span>',
	'after'       => '</div>',
	'link_before' => '<span>',
	'link_after'  => '</span>',
	'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'relief-medical-hospital' ) . ' </span>%',
	'separator'   => '<span class="screen-reader-text">, </span>',
) );
	
if ( is_singular( 'attachment' ) ) {
	// Parent post navigation.
	the_post_navigation( array(
		'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'relief-medical-hospital' ),
	) );
} elseif ( is_singular( 'post' ) ) {
	// Previous/next post navigation.
	the_post_navigation( array(
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next page', 'relief-medical-hospital' ) . '</span> ' .
			'<span class="screen-reader-text">' . esc_html__( 'Next post:', 'relief-medical-hospital' ) . '</span> ' .
			'<span class="post-title">%title</span>',
		'prev_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous page', 'relief-medical-hospital' ) . '</span> ' .
			'<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'relief-medical-hospital' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}

echo '<div class="clearfix"></div>';

the_tags();

if ( comments_open() || get_comments_number() ) {
	comments_template();
}
?>
<?php edit_post_link( esc_html__( 'Edit', 'relief-medical-hospital' ), '<span class="edit-link">', '</span>' ); ?>