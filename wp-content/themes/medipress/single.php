<?php
/**
 * The template for displaying all single posts.
 *
 * @package Medipress
 */
 get_header(); 
 
 ?>
   <div class="grey-title">
        <div class="container">
            <div class="">
                <h2 class="title"><?php wp_title(''); ?></h2>
            </div>
        </div>
    </div>
    
<!-- End page-title -->


	<main class="main-blog start-block">
         <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
					<?php if(have_posts()) : ?>
                        <?php while(have_posts()) : the_post(); ?>
                            <?php  get_template_part( 'content-parts/content', 'single' ); ?>
                        <?php endwhile; ?>
                    <?php else :  
                        get_template_part( 'content-parts/content', 'none' );
                    endif; ?>
				</div>
				<div class="col-sm-4 col-md-3">
                    <?php get_sidebar(); ?>
                </div>
		    </div>
		</div>
	</main>
        <?php get_footer(); ?>