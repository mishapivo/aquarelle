<?php
get_header();

$mainDivCols = materialize_template_main_col_number();

while (have_posts()) : the_post();

?>

<main role="main">
    <?php
        $image = materialize_template_default_image();
        if ($image != '') {
            ?>
                <div class="parallax-container">
                    <div class="parallax"><img src="<?php echo $image; ?>"></div>
                </div>
            <?php
        }
    ?>
    <div class="white" style="background-color: #<?php background_color(); ?>!important; background-image: url(<?php background_image(); ?>); background-size: cover;">
        <div class="container row">
            <?php get_sidebar('left-sidebar'); ?>
            <div class="col s12 l<?php echo $mainDivCols; ?>">
                <h2 class="header"><?php the_title(); ?></h2>

                <?php the_content(); ?>

                <?php wp_link_pages(); ?>

                <?php if ((is_single()) && ('post' === get_post_type())) : ?>
                    <ul class="comment-footer inline">
                        <li><i class="material-icons">account_box</i> <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
                        <li><i class="material-icons">date_range</i> <?php the_date(); ?></li>
                        <li><i class="material-icons">bookmark</i> <?php the_category(', '); ?></li>
                        <li><?php the_tags('<i class="material-icons">flag</i> ', ', '); ?></li>
                    </ul>
                <?php endif; ?>

                <?php if ( is_single() && get_the_author_meta( 'description' ) ) :
                    ?>
                    <div class="hidden">
                        <?php
                        wp_list_comments(array());
                        ?>
                    </div>
                    <?php
                    get_template_part( 'template-parts/author-bio' );
                endif; ?>

                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if ( comments_open() || '0' != get_comments_number() )
                    comments_template();
                ?>
            </div>
	        <?php get_sidebar('right-sidebar'); ?>
        </div>
    </div>
</main>

<?php endwhile; ?>

<?php get_footer(); ?>