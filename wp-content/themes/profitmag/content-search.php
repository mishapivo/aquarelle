<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ProfitMag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php profitmag_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="post-thumb">
        <?php 
            if( has_post_thumbnail() ):
                $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'archive-thumb' );
        ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $image_url[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" /></a>
        <?php
            endif;
        ?>
    </div>
    
    
    <div class="entry-content">
		<?php
			the_excerpt();            
		?>
		<a class="read-more" href="<?php echo get_permalink( get_the_ID() ); ?> "><?php _e('Read More', 'profitmag'); ?></a>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'profitmag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'profitmag' ) );
				if ( $categories_list && profitmag_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'profitmag' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'profitmag' ) );
				if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'profitmag' ), $tags_list ); ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'profitmag' ), __( '1 Comment', 'profitmag' ), __( '% Comments', 'profitmag' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'profitmag' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->