<?php
/**
 * The template for displaying author archive pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package CPMMagz
 */

get_header();
?>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <div class="col l8 s12 m12">
                <div id="primary" class="content-area">
                    <main class="site-main" id="main" role="main">
                         <?php if ( have_posts() ) : ?>
                        <!-- Post Header -->
                        <div class="post-header">
                            <div class="card">
                                <div class="card-header">
                                <?php
                                    the_post();
                                    printf(  '<h1 class="page-title">'.esc_attr(__( 'All posts by', 'cpmmagz' )).' <span>'. esc_attr( get_the_author() ).'</span></h1>', 'cpmmagz' );
                                ?>
                                </div>
                                <div class="card-content">
                                    <div class="card-desc">
                                    <div class="post-author center-align">
                                        <div class="author-img">
                                            <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>
                                        </div>
                                        <div class="author-desc">
                                            <h2><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_attr( get_the_author() ); ?></a></h2>
                                            <p><?php echo esc_html( get_the_author_meta('description') ); ?></p>
                                             <?php
                                                    $author_id = get_the_author_meta('ID');
                                                    $user_info = get_userdata($author_id);
                                                    $author_url = $user_info->user_url;
                                                ?>
                                            <div class="author-links">
                                                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php esc_attr_e( 'Author Archive', 'cpmmagz' ) ?>">
                                                    <?php esc_attr_e( 'Author Archives', 'cpmmagz' ) ?>
                                                </a>
                                                  <?php if (!empty($author_url)) :?>
                                                        <a href="<?php the_author_meta('url')  ?>" title="<?php esc_attr_e('Author URL', 'cpmmagz') ?>"><?php esc_attr_e('Author Website', 'cpmmagz') ?></a>
                                                <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Post Header -->
                        <!-- Archive Wrapper -->
                        <div class="article-wrapper archive-wrapper">
                            <?php  while ( have_posts() ) : the_post(); ?>
                            <div class="card archive-card news-medium news-medium-big hoverable">
                                <article <?php post_class(); ?>>
                                    <?php get_template_part( 'template-parts/content', get_post_format( $post->ID ) ); ?>
                                    <div class="card-desc valign-wrapper">
                                        <div class="card-content">
                                            <a href="<?php echo esc_url( get_permalink() );?>"><h2><?php echo esc_attr( cpmmagz_limit_title( get_the_title(), 53 ) ); ?> </h2></a>
                                            <span class="entry-meta">
                                                <?php cpmmagz_meta_data( $post );?>
                                            </span>
                                            <span class="label waves-effect waves-light">
                                                <?php  $category = cpmmagz_display_random_catname( $post->ID, 'category' ); ?>
                                                <a href="<?php echo esc_url( $category['link'] );?>" ><?php echo esc_attr( $category['name'] ); ?></a>
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php
                            endwhile;

                                endif;
                         ?>
                        </div>
                        <!-- End Archive Wrapper -->
                        <!-- Pagination -->
                        <?php
                            // Pagination goes here.
                            if ( function_exists( 'wp_paginate' ) ) { ?>
                                <!-- If WP Paginate plugin is active -->
                                <div class="pagination pagination-navi card clearfix right">
                                    <?php wp_paginate(); ?>
                                </div>
                            <?php }
                                else {
                                // If WP Paginate plugin is not active.
                                cpmmagz_navigation_page();
                            }
                        ?>
                    </main>
                    <!-- End Site-main -->
                </div>
                <!-- End Primary content-area -->
            </div>
            <!-- End Column -->
            <div class="col l4 s12 m12 right">
            	<aside id="sidebar" class="sidebar left-side">
            		<?php get_sidebar();?>
            	</aside>
            	<!-- Ad Widget -->
            </div>
            <!-- Col 4 Sidebar -->
        </div>
        <!-- End row -->
    </div>
    <!-- End container -->
</div>
<!-- End of content site-content -->
<?php get_footer();?>