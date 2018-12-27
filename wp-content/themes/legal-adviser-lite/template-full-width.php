<?php
/**
 * The Template Name: Full Width
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Legal Adviser Lite
 */

get_header(); ?>

<div class="container">
<div class="pagefixer_legal">
     <section class="pgecontent_layout fullwidth">               
            <?php while( have_posts() ) : the_post(); ?>
				  <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>    
                   <div class="entry-content">
                            <?php the_content(); ?>
                            <?php
                                wp_link_pages( array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'legal-adviser-lite' ),
                                'after'  => '</div>',
                                ) );
                            ?>
                            <?php
                                //If comments are open or we have at least one comment, load up the comment template
                                if ( comments_open() || '0' != get_comments_number() )
                                    comments_template();
                                ?>
                </div><!-- entry-content -->
            <?php endwhile; ?>                    		
    </section><!-- section-->   
</div><!-- .pagefixer_legal --> 
</div><!-- .container --> 
<?php get_footer(); ?>