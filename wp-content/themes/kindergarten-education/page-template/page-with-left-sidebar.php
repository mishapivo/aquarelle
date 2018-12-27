<?php
/**
 * Template Name:Page with Left Sidebar
 */

get_header(); ?>

<?php do_action( 'kindergarten_education_pageleft_header' ); ?>

<div class="container">
    <div class="main-wrapper row">       
		<div id="sidebar" class="col-md-4 col-sm-4">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>		 
		<div class="col-md-8 col-sm-8" id="content_box" >
			<?php while ( have_posts() ) : the_post(); ?>
                <img src="<?php the_post_thumbnail_url(); ?>" width="100%">
                <h1><?php the_title();?></h1> 
                <?php the_content(); ?>                
            <?php endwhile; // end of the loop. ?>
            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || '0' != get_comments_number() ) {
                    comments_template();
                }
            ?>
        </div>
        <div class="clear"></div>    
    </div>
</div>

<?php do_action( 'kindergarten_education_pageleft_footer' ); ?>

<?php get_footer(); ?>
