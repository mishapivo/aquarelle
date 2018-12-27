<?php
/**
 * The template for displaying image attachments.
 * @package Kindergarten Education
 */

get_header(); ?>

<div class="container">
    <div class="main-wrapper">
        <?php
            $layout_option = get_theme_mod( 'kindergarten_education_layout_options','Right Sidebar');
            if($layout_option == 'Left Sidebar'){ ?>
            <div class="row">
                <div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-2');?></div>
                <div class="col-md-8 col-sm-8">
        			<?php while ( have_posts() ) : the_post(); ?>    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <h1><?php the_title();?></h1>    
                                <div class="entry-attachment">
                                    <div class="attachment">
                                        <?php kindergarten_education_the_attached_image(); ?>
                                    </div>
            
                                    <?php if ( has_excerpt() ) : ?>
                                        <div class="entry-caption">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>    
                                <?php
                                    the_content();
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'kindergarten-education' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div>    
                            <?php edit_post_link( __( 'Edit', 'kindergarten-education' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                        </article>    
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>    
                    <?php endwhile; // end of the loop. ?>
                </div>
            </div>
        <?php }else if($layout_option == 'Right Sidebar'){ ?>
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <?php while ( have_posts() ) : the_post(); ?>    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <h1><?php the_title();?></h1>    
                                <div class="entry-attachment">
                                    <div class="attachment">
                                        <?php kindergarten_education_the_attached_image(); ?>
                                    </div>
            
                                    <?php if ( has_excerpt() ) : ?>
                                        <div class="entry-caption">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>    
                                <?php
                                    the_content();
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'kindergarten-education' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div>    
                            <?php edit_post_link( __( 'Edit', 'kindergarten-education' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                        </article>    
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>    
                    <?php endwhile; // end of the loop. ?>
                </div>
                <div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-2');?></div>
            </div>
        <?php }else if($layout_option == 'One Column'){ ?>
            <?php while ( have_posts() ) : the_post(); ?>    
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <h1><?php the_title();?></h1>    
                        <div class="entry-attachment">
                            <div class="attachment">
                                <?php kindergarten_education_the_attached_image(); ?>
                            </div>
    
                            <?php if ( has_excerpt() ) : ?>
                                <div class="entry-caption">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif; ?>
                        </div>    
                        <?php
                            the_content();
                            wp_link_pages( array(
                                'before' => '<div class="page-links">' . __( 'Pages:', 'kindergarten-education' ),
                                'after'  => '</div>',
                            ) );
                        ?>
                    </div>    
                    <?php edit_post_link( __( 'Edit', 'kindergarten-education' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                </article>    
                <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if ( comments_open() || '0' != get_comments_number() )
                        comments_template();
                ?>    
            <?php endwhile; // end of the loop. ?>
        <?php }else if($layout_option == 'Three Columns'){ ?>
            <div class="row">
                <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1');?></div>
                <div class="col-md-6 col-sm-6">
                    <?php while ( have_posts() ) : the_post(); ?>    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <h1><?php the_title();?></h1>    
                                <div class="entry-attachment">
                                    <div class="attachment">
                                        <?php kindergarten_education_the_attached_image(); ?>
                                    </div>
            
                                    <?php if ( has_excerpt() ) : ?>
                                        <div class="entry-caption">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>    
                                <?php
                                    the_content();
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'kindergarten-education' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div>    
                            <?php edit_post_link( __( 'Edit', 'kindergarten-education' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                        </article>    
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>    
                    <?php endwhile; // end of the loop. ?>
                </div>
                <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2');?></div>
            </div>
        <?php }else if($layout_option == 'Four Columns'){ ?>
            <div class="row">
                <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-1');?></div>
                <div class="col-md-6 col-sm-6">
                    <?php while ( have_posts() ) : the_post(); ?>    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <h1><?php the_title();?></h1>    
                                <div class="entry-attachment">
                                    <div class="attachment">
                                        <?php kindergarten_education_the_attached_image(); ?>
                                    </div>
            
                                    <?php if ( has_excerpt() ) : ?>
                                        <div class="entry-caption">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>    
                                <?php
                                    the_content();
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'kindergarten-education' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div>    
                            <?php edit_post_link( __( 'Edit', 'kindergarten-education' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                        </article>    
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>    
                    <?php endwhile; // end of the loop. ?>
                </div>
                <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-2');?></div>
                <div id="sidebar" class="col-md-3 col-sm-3"><?php dynamic_sidebar('sidebar-3');?></div>
            </div>
        <?php }else if($layout_option == 'Grid Layout'){ ?>
            <div class="row">
                <div class="col-md-8 col-sm-8 row">
                    <?php while ( have_posts() ) : the_post(); ?>    
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="entry-content">
                                <h1><?php the_title();?></h1>    
                                <div class="entry-attachment">
                                    <div class="attachment">
                                        <?php kindergarten_education_the_attached_image(); ?>
                                    </div>
            
                                    <?php if ( has_excerpt() ) : ?>
                                        <div class="entry-caption">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>    
                                <?php
                                    the_content();
                                    wp_link_pages( array(
                                        'before' => '<div class="page-links">' . __( 'Pages:', 'kindergarten-education' ),
                                        'after'  => '</div>',
                                    ) );
                                ?>
                            </div>    
                            <?php edit_post_link( __( 'Edit', 'kindergarten-education' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
                        </article>    
                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || '0' != get_comments_number() )
                                comments_template();
                        ?>    
                    <?php endwhile; // end of the loop. ?>
                </div>
                <div id="sidebar" class="col-md-4 col-sm-4"><?php dynamic_sidebar('sidebar-2');?></div>
            </div>
        <?php }?>
        <div class="clear"></div>
    </div>
</div>

<?php get_footer(); ?>