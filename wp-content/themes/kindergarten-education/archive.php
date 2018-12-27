<?php
/**
 * The template for displaying Archive pages.
 * @package Kindergarten Education
 */

get_header(); ?>

<div class="container">
    <?php
        $layout_option = get_theme_mod( 'kindergarten_education_layout_options','Right Sidebar');
        if($layout_option == 'One Column'){ ?>
        <div id="services_section" class="blog-section">
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
            <?php if ( have_posts() ) :
                /* Start the Loop */          
                while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content' );           
                endwhile;
                else :
                    get_template_part( 'no-results' ); 
                endif; 
            ?>
            <div class="navigation">
                <?php
                    // Previous/next page navigation.
                    the_posts_pagination( array(
                        'prev_text'          => __( 'Previous page', 'kindergarten-education' ),
                        'next_text'          => __( 'Next page', 'kindergarten-education' ),
                        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>',
                    ) );
                ?>
                <div class="clearfix"></div>
            </div>
        </div>
    <?php }else if($layout_option == 'Three Columns'){ ?>
        <div class="row">
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
            <div id="services_section" class="blog-section col-md-6 col-sm-6">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                    /* Start the Loop */          
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content' );
                    endwhile;
                    else :
                        get_template_part( 'no-results' ); 
                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'kindergarten-education' ),
                            'next_text'          => __( 'Next page', 'kindergarten-education' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>',
                        ) );
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
        </div>
    <?php }else if($layout_option == 'Four Columns'){ ?>
        <div class="row">
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1'); ?></div>
            <div id="services_section" class="blog-section col-md-3 col-sm-3">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                /* Start the Loop */          
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content' );           
                    endwhile;
                    else :
                        get_template_part( 'no-results' ); 
                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'kindergarten-education' ),
                            'next_text'          => __( 'Next page', 'kindergarten-education' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>',
                        ) );
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2'); ?></div>
            <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-3'); ?></div>
        </div>
    <?php }else if($layout_option == 'Grid Layout'){ ?>
        <div class="row">
            <div id="services_section" class="blog-section col-md-8 col-sm-8">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <div class="row">
                    <?php if ( have_posts() ) :
                    /* Start the Loop */
                        while ( have_posts() ) : the_post();
                            get_template_part( 'template-parts/grid-layout' );
                        endwhile;
                        else :
                            get_template_part( 'no-results' ); 
                        endif; 
                    ?>
                </div>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'kindergarten-education' ),
                            'next_text'          => __( 'Next page', 'kindergarten-education' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>',
                        ) );
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
        </div>
    <?php }else if($layout_option == 'Left Sidebar'){ ?>
        <div class="row">
            <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
            <div id="services_section" class="blog-section col-md-8 col-sm-8">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>   
                <?php if ( have_posts() ) :
                    /* Start the Loop */          
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content' );           
                    endwhile;
                    else :
                        get_template_part( 'no-results' ); 
                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'kindergarten-education' ),
                            'next_text'          => __( 'Next page', 'kindergarten-education' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>',
                        ) );
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    <?php }else if($layout_option == 'Right Sidebar'){ ?>
        <div class="row">
            <div id="services_section" class="blog-section col-md-8 col-sm-8">
                <?php
                    the_archive_title( '<h1 class="page-title">', '</h1>' );
                    the_archive_description( '<div class="taxonomy-description">', '</div>' );
                ?>
                <?php if ( have_posts() ) :
                    /* Start the Loop */          
                    while ( have_posts() ) : the_post();
                        get_template_part( 'template-parts/content' );
                    endwhile;
                    else :
                        get_template_part( 'no-results' ); 
                    endif; 
                ?>
                <div class="navigation">
                    <?php
                        // Previous/next page navigation.
                        the_posts_pagination( array(
                            'prev_text'          => __( 'Previous page', 'kindergarten-education' ),
                            'next_text'          => __( 'Next page', 'kindergarten-education' ),
                            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'kindergarten-education' ) . ' </span>',
                        ) );
                    ?>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4"><?php get_sidebar(); ?></div>
        </div>
    <?php }?>
</div>
<div class="clearfix"></div>

<?php get_footer(); ?>