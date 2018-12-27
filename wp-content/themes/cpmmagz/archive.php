<?php
/**
* The template for displaying archive pages.
*
* Learn more: http://codex.wordpress.org/Template_Hierarchy
*
* @package CPMMagz
*/
    get_header();
    $cat_name = get_queried_object();
    global $wp_query;
?>
<!-- Start Site Wrapper -->
<div id="main-wrapper">

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

                <div class="<?php echo esc_attr($class); ?>">
                    <div id="primary" class="content-area">
                        <?php
                            $year = get_query_var('year');
                            $month = get_query_var('monthnum');
                            $day = get_query_var('day');

                            if( isset($_GET['hr']) || isset($_GET['min'])|| !empty($day) || !empty($month) || !empty( $year)){

                                $archive_args = cpmmagz_archive_query(); // date query
                            }
                            else{
                                $archive_args = cpmmagz_archive_query($cat_name->name); //tag query
                            }
                            $archive_query = new WP_Query($archive_args);
							$arr = array();
                            if ($archive_query->have_posts()):
                                while ($archive_query->have_posts()):
                                    $archive_query->the_post();
                                    $arr[] = $post->ID;
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                        <main class="site-main" id="main" role="main">
                            <div class="post-header">
                                <div class="card">
                                    <div class="card-header">
                                        <?php the_archive_title('<h1 class="page-title">', '</h1>');?>
                                    </div>
                                </div>
                            </div>

                            <?php

							$first_post =  get_post(); ?>
                            <div class="card post-card news-big featured-card">

                                <article <?php post_class(); ?>>

                                    <div class="featured-media">
                                        <?php get_template_part('template-parts/content', get_post_format($first_post->ID)); ?>
                                    </div>

                                    <div class="card-desc">
                                        <div class="card-content card-wrapper">

                                            <header class="entry-header">
                                                 <span class="label waves-effect waves-light">
                                                    <?php  $category = cpmmagz_display_random_catname($post->ID, 'category'); ?>
                                                    <a href="<?php echo esc_url($category['link']);?>" >
                                                        <?php echo esc_attr($category['name']); ?>
                                                    </a>
                                                </span>
                                                <h2 class="entry-title">
                                                    <a href="<?php echo esc_url(get_permalink());?>">
                                                        <?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 95)); ?>
                                                    </a>
                                                </h2>
                                                <span class="entry-meta">
                                                   <?php cpmmagz_meta_data($first_post);?>
                                                </span>
                                            </header>
                                            <!-- Entry Header -->

                                            <div class="entry-content clearfix">
                                                <p>
                                                    <?php the_excerpt();?>
                                                </p>
                                            </div>
                                            <!-- Entry Content -->

                                        </div>
                                        <!-- Card Content -->
                                    </div>
                                    <!-- Card Desc -->

                                </article>

                            </div>
                            <!-- Post Card -->
                        <?php unset($arr[0]); ?>
                            <div class="article-wrapper archive-wrapper">
                             <?php foreach ($arr as $value){
                                $post =  get_post($value); ?>

                                    <div class="card archive-card news-medium hoverable">
                                        <article <?php post_class(); ?>>
                                            <?php get_template_part('template-parts/content', get_post_format($post->ID)); ?>
                                            <div class="card-desc valign-wrapper">
                                                <div class="card-content">
                                                    <h2>
                                                    <a href="<?php echo esc_url( get_permalink() );?>"><?php echo esc_attr(cpmmagz_limit_title(get_the_title(), 53)); ?></a>
                                                    </h2>
                                                    <span class="entry-meta">
                                                        <?php cpmmagz_meta_data($post);?>
                                                    </span>
                                                    <span class="label waves-effect waves-light">
                                                        <?php  $category = cpmmagz_display_random_catname($post->ID, 'category'); ?>
                                                        <a href="<?php echo esc_url($category['link']);?>" >
                                                            <?php echo esc_attr($category['name']); ?>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                <?php } ?>
                            </div><!-- Archive Wrapper -->

                            <!-- Pagination -->
                            <?php
                                // Pagination goes here
                                if (function_exists('wp_paginate')) { ?>
                                    <!-- If WP Paginate plugin is active -->
                                    <div class="pagination pagination-navi card clearfix right">
                                        <?php wp_paginate(); ?>
                                    </div>
                                <?php }
                                else{
                                    // If WP Paginate plugin is not active
                                    ?>
                                    <div class="cpm-pagination">
                                        <?php cpmmagz_navigation_page(); ?>
                                    </div>
                                    <?php
                                }
                            ?>
                            <!-- Pagination -->
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
                    </div><!-- Col 4 Sidebar -->
                    <?php } ?>
            </div>
            <!-- End Row -->
        </div>
        <!-- End Container -->
    </div>
    <!-- End  Content-->
</div>
<!-- End Site Wrapper -->
<?php get_footer(); ?>