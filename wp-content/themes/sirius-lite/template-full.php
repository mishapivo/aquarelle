<?php
/**
 * Template Name: Full Width
 */
?>
<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section class="page-full">
    <div class="container">

        <?php get_template_part('parts/page', 'content'); ?>
        <?php if ( comments_open() ) { comments_template(); } ?>
        
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>