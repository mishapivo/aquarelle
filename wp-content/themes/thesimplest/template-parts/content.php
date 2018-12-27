<?php
/**
 * The template part for displaying content
 *
 * @since TheSimplest 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">

        <?php if( is_sticky() && is_home() && ! is_paged() ) : ?>
            <div class="sticky-post"><?php esc_attr_e( 'Featured', 'thesimplest' ); ?></div>
        <?php endif; ?>

		<?php the_title( sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

        <div class="entry-info">
            <?php thesimplest_entry_meta(); ?>
        </div>
    </header>

    <?php thesimplest_post_thumbnail();  ?>

    <div class="entry-content">
        <?php
        thesimplest_excerpt();
        ?>
    </div><!-- .entry-content -->

	<?php thesimplest_entry_footer(); ?>

</article>
