<?php
/**
 * Template Name:Page with Left Sidebar
 */

get_header(); ?>

<?php do_action( 'relief_medical_hospital_pageleft_header' ); ?>

<div class="container">
    <div class="wrapper row">       
		<div id="sidebar" class="col-lg-4 col-md-4">
			<?php dynamic_sidebar('sidebar-2'); ?>
		</div>		 
		<div class="col-lg-8 col-md-8" id="main-content" >
			<?php while ( have_posts() ) : the_post(); ?>
                <h1><?php the_title();?></h1>
                <img src="<?php the_post_thumbnail_url(); ?>" width="100%">
                <?php the_content();
                
               	if ( comments_open() || '0' != get_comments_number() )
                    	comments_template();
                ?>
            <?php endwhile; // end of the loop. ?>
        </div>
        <div class="clearfix"></div>    
    </div>
</div>

<?php do_action( 'relief_medical_hospital_pageleft_footer' ); ?>

<?php get_footer(); ?>