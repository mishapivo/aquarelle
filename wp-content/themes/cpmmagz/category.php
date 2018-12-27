<?php
/**
 * The template for displaying category pages.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 * @package CPMMagz
 */

get_header();
$cat_name = get_queried_object();
global $wp_query;
?>
<div id="content" class="site-content">
    <div class="container">
        <div class="row">
            <?php
                $side_class = get_theme_mod('sidebar_toggle');
                if ($side_class == 'right')
				{
					$class = 'col l8 s12 m12';
                }
                elseif ($side_class == 'left')
				{
                    $class = 'col l8 s12 m12';
            ?>
						<div class="col l4 s12 m12 left">
							<aside id="sidebar" class="sidebar left-side">
								<?php get_sidebar(); ?>
							</aside>
						</div><!-- Col 4 Sidebar -->
            <?php
				}

                elseif ($side_class == 'none') {
                    $class = 'col l12';
                }
				else
				{
					$class = 'col l8 s12 m12';
				}
            ?>
            <div class="<?php echo esc_attr( $class ); ?>">
                <div id="primary" class="content-area">
                    <?php
                         $t_id = $cat_name->term_id;
                         if ($t_id) {
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $category_args = array(
                                    'post_type' => 'post',
                                    'cat' => $t_id,
                                    'post_status' => 'publish',
                                    'paged' => $paged,
                                    );
                        } else {
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                 $category_args = array(
                                    'paged' => $paged
                                    );
                            }
                        $category_query = new WP_Query($category_args);
                        if ($category_query->have_posts()) :
                            $arr = array();
                        while ($category_query->have_posts()) : $category_query->the_post();
                        $arr[] = $post->ID;
                        endwhile;
                        endif;
                        wp_reset_postdata();
                    ?>
                    <main class="site-main" id="main" role="main">
                            <div class="post-header">
                                <div class="card">
                                    <div class="card-header">
                                        <?php the_archive_title( '<h1 class="page-title">', '</h1>' );?>
                                        <p><?php echo category_description(); ?></p>
                                    </div>
                                </div>
                            </div>
                                <!-- loop 1 goes here -->
                                <?php $first_post = get_post($arr[0]); ?>
                            <div class="card post-card news-big featured-card">
                                <article <?php post_class(); ?>>
                                    <div class="featured-media">
                                        <?php get_template_part('template-parts/content', get_post_format($first_post->ID)); ?>
                                    </div>
                                    <div class="card-desc">
                                        <div class="card-content card-wrapper">
                                            <header class="entry-header">
                                                <span class="label waves-effect waves-light">
                                                    <a href="#">
                                                        <?php echo esc_attr(cpmmagz_display_category_name($t_id));?>
                                                    </a>
                                                </span>
                                                <h2>
                                                    <a href="<?php echo esc_url( get_permalink() );?>">
                                                        <?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 95)); ?>
                                                    </a>
                                                </h2>
                                                <span class="entry-meta">
                                                    <?php cpmmagz_meta_data($first_post);?>
                                                </span>
                                            </header>
                                            <!-- Entry Header -->
                                            <div class="entry-content clearfix">
                                                <?php the_excerpt();?>
                                            </div>
                                            <!-- Entry Content -->
                                        </div>
                                        <!-- Card Content -->
                                    </div>
                                    <!-- Card Desc -->
                                </article>
                            </div><!-- Post Card -->

                        <?php unset($arr[0]); ?>
                        <div class="article-wrapper archive-wrapper">
                            <?php foreach ($arr as $value){
                                $post = get_post($value); ?>
                            <div class="card archive-card news-medium hoverable">
                                <article <?php post_class(); ?>>
                                        <?php get_template_part('template-parts/content', get_post_format($post->ID)); ?>
                                    <div class="card-desc valign-wrapper">
                                        <div class="card-content">
                                            <h2><a href="<?php echo esc_url(get_permalink());?>"><?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 53)); ?></a></h2>
                                            <span class="entry-meta">
                                                <?php cpmmagz_meta_data($post); ?>
                                            </span>
                                            <span class="label waves-effect waves-light"><a href="#"><?php echo esc_attr(cpmmagz_display_category_name($t_id));?></a>
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php } ?>
                        </div>
                        <!-- End Archive Wrapper -->
                        <?php
                            // Pagination goes here
                            if (function_exists('wp_paginate')) { ?>
                                <div class="pagination pagination-navi card clearfix right">
                                    <?php wp_paginate(); ?>
                                </div>
                            <?php }
                            else {
                               cpmmagz_navigation_page();
                            }
                        ?>
                    </main>
                </div>
                <!-- End Primary -->
            </div>
            <!-- End Col 8 -->
            <?php
                if ($side_class == 'right' || $side_class == '') {
            ?>
                <div class="col l4 s12 m12 right">
                    <aside id="sidebar" class="sidebar right-side">
                        <?php get_sidebar(); ?>
                    </aside>
                </div>
                <!-- End Col 4 Sidebar -->
            <?php } ?>
        </div>
    </div>
</div>
<?php get_footer();?>