<?php $sirius_blog_feed_sidebar_show = sirius_get_option('sirius_blog_feed_sidebar_show'); ?>

<?php 
$i=0;
if ( have_posts() ) { 
    while ( have_posts() ) : the_post(); 
    if($sirius_blog_feed_sidebar_show == 0 && $i%2 == 0) { ?> <div class="row"> <?php }
    if($sirius_blog_feed_sidebar_show == 0) { ?> <div class="col-md-6"> <?php }
    get_template_part('parts/entry');
    $i++;
    if($sirius_blog_feed_sidebar_show == 0) { ?> </div> <?php } 
    if($sirius_blog_feed_sidebar_show == 0 && $i%2 == 0) { ?> </div> <?php  }
    endwhile;
    if($sirius_blog_feed_sidebar_show == 0 && $i%2 != 0) { ?> </div> <?php  }
}

?>

<?php if($sirius_blog_feed_sidebar_show == 1) get_template_part('parts/feed', 'pagination'); ?>