<?php
/**
 * @package ProfitMag
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php  profitmag_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="single-feat clearfix">
        <figure class="single-thumb">
            <?php 
                if( has_post_thumbnail() ):
                    $img_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-thumb' );
            ?>
                    <img src="<?php echo $img_url[0]; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
            <?php
                endif; 
            ?>
        </figure>
        
        <div class="related-post">
            <h2 class="block-title"><span class="bordertitle-red"></span><?php echo _e( 'Related Post', 'profitmag'); ?></h2>
            <?php profitmag_related_post( get_the_ID() ); ?>
            <ul>
                
            </ul>
        </div>
    </div>
    
    <div class="entry-content">
		
        <figure></figure>
        <?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'profitmag' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		
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
		     
	

		<?php edit_post_link( __( 'Edit', 'profitmag' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
