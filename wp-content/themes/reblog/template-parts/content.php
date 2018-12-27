<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moral
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
	    <div class="post-thumbnail">
	        <a href="<?php the_permalink(); ?>">
	        	<?php the_post_thumbnail( 'medium_large', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	        </a>
	    </div><!-- .post-thumbnail -->
	<?php endif; ?>

    <div class="entry-container">
        <div class="entry-meta">
            <?php  
				reblog_posted_on(); 

				reblog_cats();
            ?>

        </div><!-- .entry-meta  -->

        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->
    </div><!-- .entry-container -->
</article>

