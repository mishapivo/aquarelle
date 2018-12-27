<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Firm Graphy
 * @since Firm Graphy 1.0.0
 */
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
            </a>
        </div><!-- .featured-image -->
    <?php endif; ?>

    <div class="entry-container">
        <div class="entry-meta">
            <?php echo firm_graphy_article_footer_meta(); ?>     
        </div><!-- .entry-meta -->

        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-meta">
            <?php  
            echo firm_graphy_author();

            firm_graphy_posted_on();
            ?>
        </div><!-- .entry-meta -->
    </div><!-- .entry-container -->
</article><!-- #post-## -->
