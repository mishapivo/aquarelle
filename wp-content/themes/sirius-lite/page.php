<?php get_header(); ?>
<?php $sirius_pages_sidebar = sirius_get_option('sirius_pages_sidebar'); ?>

<?php while ( have_posts() ) : the_post(); ?>

<section class="page">
    <div class="container">
        
        <?php if($sirius_pages_sidebar == 1) { ?>
        
        <div class="row">
            <div class="col-md-8">
                <div class="main-column two-columns">
                    <?php get_template_part('parts/page', 'content'); ?>
                    <?php if ( comments_open() ) { comments_template(); } ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        
        <?php } else { ?>
        
        
        <?php get_template_part('parts/page', 'content'); ?>
        <?php if ( comments_open() ) { comments_template(); } ?>
   
        
        <?php } ?>
        
    </div>
</section>

<?php endwhile; ?>

<?php get_footer(); ?>