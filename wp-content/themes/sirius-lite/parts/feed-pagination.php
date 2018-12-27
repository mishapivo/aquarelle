<?php $sirius_blog_feed_sidebar_show = sirius_get_option('sirius_blog_feed_sidebar_show'); ?>
<?php if(get_next_posts_link() || get_previous_posts_link()) { ?>

<?php if($sirius_blog_feed_sidebar_show == 1) { ?>

<div class="post-pagination clearfix">
    <?php $args = array('prev_text' => __('Previous', 'sirius-lite'), 'next_text' => __('Next', 'sirius-lite'));  the_posts_navigation($args); ?>
</div>

<?php } else { ?>

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="post-pagination clearfix">
            <?php $args = array('prev_text' => __('Previous', 'sirius-lite'), 'next_text' => __('Next', 'sirius-lite'));  the_posts_navigation($args); ?>
        </div>
    </div>
</div>

<?php } }?>