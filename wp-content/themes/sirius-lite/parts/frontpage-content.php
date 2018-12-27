<?php while ( have_posts() ) : the_post(); ?>
<section id="welcome" class="frontpage-content">
    <div class="container">
        <h1 class="text-center <?php sirius_animate('zoomIn'); ?>"><?php the_title(); ?></h1>
        <div class="frontpage-text <?php sirius_animate('fadeInUp'); ?>"><?php the_content(); ?></div>
    </div>
</section>
<?php endwhile; ?>