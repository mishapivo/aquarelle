<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Tourable
 * @since Tourable 1.0.0
 */
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
$options = tourable_get_theme_options();
$readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'tourable' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <div class="post-item-wrapper clear">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="featured-image matchheight" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');">
                <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
            </div><!-- .featured-image -->
        <?php endif; ?>

        <div class="entry-container matchheight">
            <div class="entry-meta">
                <?php tourable_posted_on(); ?>
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

            <?php echo tourable_article_header_meta(); ?>

            <a href="<?php the_permalink(); ?>" class="more-link">
                <?php 
                    echo esc_html( $readmore );
                    echo tourable_get_svg( array( 'icon' => 'down' ) );
                ?>
            </a><!-- .more-link -->
        </div><!-- .entry-container -->
    </div><!-- .post-item-wrapper -->

</article><!-- #post-## -->
