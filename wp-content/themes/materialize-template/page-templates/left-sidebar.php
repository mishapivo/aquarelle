<?php
/*
Template Name: Left sidebar
*/
get_header();

if (have_posts()) :
    while ( have_posts() ) : the_post();

?>



    <main role="main">
        <?php
        $image = materialize_template_default_image();
        if ($image != '') {
            ?>
            <div class="parallax-container">
                <div class="parallax"><img src="<?php echo esc_url($image); ?>"></div>
            </div>
            <?php
        }
        ?>
        <div class="white" style="background-color: #<?php background_color(); ?>!important; background-image: url(<?php background_image(); ?>); background-size: cover;">
            <div class="row container">
                <aside class="sidebar col m4 s12">
                    <?php dynamic_sidebar( 'left-sidebar' ); ?>
                </aside>
                <section class="section col m8 s12">
                    <h2 class="header"><?php the_title(); ?></h2>

                    <?php the_content(); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                    ?>
                </section>
            </div>
        </div>
    </main>



<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>