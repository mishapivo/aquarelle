<?php get_header(); ?>

<?php if(is_front_page() && !is_paged() ) { get_template_part('parts/frontpage', 'banner'); } ?>

<?php $sirius_blog_feed_sidebar_show = sirius_get_option('sirius_blog_feed_sidebar_show'); ?>

<section class="blog-feed">
    <div class="container">
        
        <?php if($sirius_blog_feed_sidebar_show == 1) { ?>
        
        <div class="row">
            <div class="col-md-8">
                <div class="main-column two-columns">
                <h1 class="feed-title"><?php echo esc_html(get_the_archive_title()); ?></h1>
                <?php get_template_part('parts/feed'); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar">
                <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
        
        <?php } else { ?>
        <div class="main-column one-column">
            <h1 class="feed-title"><?php echo esc_html(get_the_archive_title()); ?></h1>
            <?php get_template_part('parts/feed'); ?>
        </div>
        <?php get_template_part('parts/feed', 'pagination'); ?>
        
        <?php } ?>
    
    </div>
</section>
<?php get_footer(); ?>