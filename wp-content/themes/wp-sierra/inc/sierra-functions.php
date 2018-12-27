<?php

// Include the alternative webfonts loading method.
$file_path = wp_normalize_path( get_template_directory() . '/inc/class-kirki-modules-webfonts-link.php' );
if ( file_exists( $file_path ) && !class_exists( 'Kirki_Modules_Webfonts_Link' ) ) {
    include_once $file_path;
}
if ( !function_exists( 'wpsierra_change_fonts_load_method' ) ) {
    /**
     * Changes the font-loading method.
     *
     * @param string $method The font-loading method (async|link)
     */
    function wpsierra_change_fonts_load_method( $method )
    {
        // Check for a theme-mod.
        // We don't want to force the use of the link method for googlefonts loading
        // since the async method is better in general.
        if ( 'link' === get_theme_mod( 'webfonts_load_mothod' ) ) {
            return 'link';
        }
        return $method;
    }

}
add_filter( 'kirki_googlefonts_load_method', 'wpsierra_change_fonts_load_method' );
// Disable Elementor Default Fonts and Color settings
update_option( 'elementor_disable_color_schemes', 'yes' );
update_option( 'elementor_disable_typography_schemes', 'yes' );
update_option( 'elementor_container_width', '1200' );
// Disable Elementor welcome page
add_action( 'admin_init', function () {
    if ( did_action( 'elementor/loaded' ) ) {
        remove_action( 'admin_init', [ \Elementor\Plugin::$instance->admin, 'maybe_redirect_to_getting_started' ] );
    }
}, 1 );
// Add span to the post count in category and arhive widgets
add_filter( 'wp_list_categories', 'wpsierra_cat_count_span' );
function wpsierra_cat_count_span( $links )
{
    $links = str_replace( '</a> (', '</a> <span class="count">(', $links );
    $links = str_replace( ')', ')</span>', $links );
    return $links;
}

add_filter( 'get_archives_link', 'wpsierra_archive_count_span' );
function wpsierra_archive_count_span( $links )
{
    $links = str_replace( '</a>&nbsp;(', '</a> <span class="count">(', $links );
    $links = str_replace( ')', ')</span>', $links );
    return $links;
}

// Remove […] string
function wpsierra_excerpt_more( $more )
{
    return '&hellip;';
}

add_filter( 'excerpt_more', 'wpsierra_excerpt_more' );
//Add responsive container to embeds
function wpsierra_embed_html( $html )
{
    return '<div class="video-container">' . $html . '</div>';
}

add_filter(
    'embed_oembed_html',
    'wpsierra_embed_html',
    10,
    3
);
add_filter( 'video_embed_html', 'wpsierra_embed_html' );
//Tag Cloud
add_filter( 'widget_tag_cloud_args', 'wpsierra_filter_tag_cloud_widget' );
function wpsierra_filter_tag_cloud_widget()
{
    $args = array(
        'number'    => 20,
        'largest'   => 14,
        'smallest'  => 14,
        'unit'      => 'px',
        'separator' => '<span> | </span>',
        'echo'      => false,
    );
    return $args;
}

//Search Layout
function wpsierra_search_full()
{
    ?>
	<div id="sierra-search">
		<button type="button" class="close"></button>
			<div class="search-field">
				<form method="get" action="<?php 
    echo  esc_url( home_url() ) ;
    ?>/">
					<input type="search" placeholder="<?php 
    esc_attr_e( 'Search here...', 'wp-sierra' );
    ?>" name="s" id="s2">
				</form>
			</div>
	</div>
<?php 
}

// WP Sierra About Author
function wpsierra_about_author()
{
    
    if ( '1' == get_theme_mod( 'post_about_author', '1' ) ) {
        ?>
	<div class="container">
		<div class="single-post-author">
		<div id="authorarea">
						<?php 
        echo  get_avatar( get_the_author_meta( 'user_email' ), 400 ) ;
        ?>
						<div class="authorinfo">
								<h3 class="author-name"><?php 
        esc_html_e( 'by', 'wp-sierra' );
        ?> <?php 
        the_author_meta( 'display_name' );
        ?></h3>
								<p><?php 
        the_author_meta( 'description' );
        ?></p>
								<div class="author-archives">
										<?php 
        echo  '<h3 class="author-link widget-title-style">' ;
        ?>
												<a href="<?php 
        echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ;
        ?>" rel="author"><?php 
        esc_html_e( 'View all posts by', 'wp-sierra' );
        ?> <?php 
        the_author_meta( 'display_name' );
        ?></a>
										<?php 
        echo  '</h3>' ;
        ?>
								</div>
						</div><!--/.authorinfo-->
				</div><!--#authorarea-->
		</div><!--/.single-post-author-->
	</div><!--/.container-->
	<?php 
    }

}

add_action( 'wpsierra_post_about_author', 'wpsierra_about_author' );
//Mobile Menu
function wpsierra_mobile_menu()
{
    ?>
<div class="mobile-menu">
		<div class="container">
				<?php 
    if ( has_nav_menu( 'header-menu' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'menu_class'     => 'menu',
            'container'      => 'false',
        ) );
    }
    ?>
		</div><!--/.container-->
</div><!--/.mobile-menu-->

<?php 
}

//Read more button on blog
function wpsierra_read_more_btn()
{
    
    if ( class_exists( 'Kirki' ) ) {
        
        if ( '1' == get_theme_mod( 'read_more_button', '1' ) ) {
            ?>
		<a class="b-btn" href="<?php 
            the_permalink();
            ?>" rel="nofollow">
		<span class="button_text">
		<?php 
            esc_html_e( 'Read More', 'wp-sierra' );
            ?>
		</span>
		</a>
		<?php 
        } else {
            return;
        }
        
        ?>
 	<?php 
    } else {
        ?>
		<a class="b-btn" href="<?php 
        the_permalink();
        ?>" rel="nofollow">
		<span class="button_text">
		<?php 
        esc_html_e( 'Read More', 'wp-sierra' );
        ?>
		</span>
		</a>
	<?php 
    }

}

// Blog Styles
// Modern Style
function wpsierra_blog_style_modern( $thumb_post )
{
    global  $post ;
    global  $wp_query ;
    $author_id = $post->post_author;
    ?>
<div class="sierra-blog-default">

<?php 
    
    if ( has_post_thumbnail() ) {
        ?>
		<div class="p-image">
			<a href="<?php 
        the_permalink();
        ?>">
			<?php 
        the_post_thumbnail( $thumb_post, array(
            'title' => esc_attr( get_the_title() ),
            'alt'   => esc_attr( get_the_title() ),
        ) );
        ?>
			</a>
		</div>
<?php 
    }
    
    ?>
	<div class="sierra-blog-default-info">
		<h1 class="post-list-title">
			<a href="<?php 
    the_permalink();
    ?>"><?php 
    the_title();
    ?></a>
		</h1>
		<div class="post-excerpt">
			<?php 
    the_excerpt();
    ?>
		</div>
		<?php 
    wpsierra_read_more_btn();
    ?>
		<p class="widget-title-style">
		<?php 
    the_time( get_option( 'date_format' ) );
    ?><span> | </span>
		<?php 
    esc_html_e( 'by', 'wp-sierra' );
    ?>
		<a href="<?php 
    echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ;
    ?>" rel="author">
			<?php 
    echo  get_the_author( get_the_author_meta( 'name' ) ) ;
    ?>
		</a>
		</p>
	</div><!--/.sierra-blog-default-info-->
</div><!--/.sierra-blog-default-->
<?php 
}

// Lines Style
function wpsierra_blog_style_lines( $thumb_post )
{
    global  $post ;
    global  $wp_query ;
    $author_id = $post->post_author;
    ?>
<div class="sierra-blog-lines">

<?php 
    
    if ( has_post_thumbnail() ) {
        ?>
		<div class="p-image">
			<a href="<?php 
        the_permalink();
        ?>">
			<?php 
        the_post_thumbnail( $thumb_post, array(
            'title' => esc_attr( get_the_title() ),
            'alt'   => esc_attr( get_the_title() ),
        ) );
        ?>
			</a>
		</div>
<?php 
    }
    
    ?>
	<div class="sierra-blog-default-info">
		<h1 class="post-list-title">
			<a href="<?php 
    the_permalink();
    ?>"><?php 
    the_title();
    ?></a>
		</h1>
		<div class="post-excerpt">
			<?php 
    the_excerpt();
    ?>
		</div>
		<?php 
    wpsierra_read_more_btn();
    ?>
		<p class="widget-title-style">
		<?php 
    the_time( get_option( 'date_format' ) );
    ?><span> | </span>
		<?php 
    esc_html_e( 'by', 'wp-sierra' );
    ?>
		<a href="<?php 
    echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ;
    ?>" rel="author">
			<?php 
    echo  get_the_author( get_the_author_meta( 'name' ) ) ;
    ?>
		</a>
		</p>
	</div><!--/.sierra-blog-default-info-->
</div><!--/.sierra-blog-default-->
<?php 
}

// Blog style 2
function wpsierra_blog_style_2( $thumb_post )
{
    global  $post ;
    global  $wp_query ;
    $author_id = $post->post_author;
    ?>
<div class="blog-style2">

	<div class="blog-style2-relative">
	<?php 
    
    if ( has_post_thumbnail( get_the_ID() ) ) {
        the_post_thumbnail( $thumb_post, array(
            'title' => esc_attr( get_the_title() ),
            'alt'   => esc_attr( get_the_title() ),
        ) );
    } else {
        echo  '<img src="' . esc_url( get_template_directory_uri() ) . '/images/no-image.gif" alt="' . esc_attr__( 'no-image', 'wp-sierra' ) . '"/>' ;
    }
    
    ?>
		<a href="<?php 
    the_permalink();
    ?>">
		<div class="blog-post-gradient"></div>
		</a>
		<div class="blog-style2-info">
			<h1><a href="<?php 
    the_permalink();
    ?>"><?php 
    the_title();
    ?></a></h1>
			<div class="blog-style2-excerpt"><?php 
    the_excerpt();
    ?></div>
			<p class="widget-title-style">
			<?php 
    the_time( get_option( 'date_format' ) );
    ?><span> | </span>
		  <?php 
    esc_html_e( 'by', 'wp-sierra' );
    ?>
			<a href="<?php 
    echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ;
    ?>" rel="author">
				<?php 
    echo  get_the_author( get_the_author_meta( 'name' ) ) ;
    ?>
			</a>
			</p>
		</div><!--/.blog-style2-info-->
	</div><!--/.blog-style2-relative-->

</div><!--/.blog-style2-->
<?php 
}

// Blog Style Related
function wpsierra_blog_style_related( $thumb_post )
{
    global  $post ;
    global  $wp_query ;
    $author_id = $post->post_author;
    ?>
<div class="blog-style2">
	<a href="<?php 
    the_permalink();
    ?>">
	<div class="blog-style2-relative">
	<?php 
    
    if ( has_post_thumbnail( get_the_ID() ) ) {
        the_post_thumbnail( $thumb_post, array(
            'title' => esc_attr( get_the_title() ),
            'alt'   => esc_attr( get_the_title() ),
        ) );
    } else {
        echo  '<img src="' . esc_url( get_template_directory_uri() ) . '/images/no-image.gif" alt="' . esc_attr__( 'no-image', 'wp-sierra' ) . '"/>' ;
    }
    
    ?>
		<div class="blog-post-gradient"></div>
		<div class="blog-style2-info">
					<h1><?php 
    the_title();
    ?></h1>
		</div><!--/.blog-style2-info-->
	</div><!--/.blog-style2-relative-->
	</a>
</div><!--/.blog-style2-->
<?php 
}

// Post tags and social buttons
function wpsierra_posts_tags()
{
    ?>
<hr class="hr-signle-post-tags">
<div class="sierra-sinlge-tags">
		<div class="container" role="main">
				<div class="row">
					<div class="col-md-8 col-xs-12">
						<?php 
    
    if ( has_tag() ) {
        ?>
							<div class="single-post-tags">
									<?php 
        the_tags( '', ' <span>|</span> ', '' );
        ?>
							</div>
						<?php 
    }
    
    ?>
					</div>
					<div class="col-md-4 col-xs-12">
						<?php 
    
    if ( '1' == get_theme_mod( 'social_icons_post', '1' ) ) {
        ?>
							<?php 
        do_action( 'wpsierra_single_post_social' );
        ?>
						<?php 
    }
    
    ?>
					</div>
				</div><!-- /.row -->
		</div><!-- /.container -->
</div><!--/.sierra-next-post-bg -->
<?php 
}

// Blog Related Posts
function wpsierra_blog_related_posts()
{
    
    if ( '1' == get_theme_mod( 'related_posts', '1' ) ) {
        ?>
	<div class="container">
		<h3 class="related-posts"><?php 
        esc_html_e( 'Related Posts', 'wp-sierra' );
        ?></h3>
		<div class="related-posts-standard masonry-container pf-padding">
		<?php 
        $my_query = new WP_Query( array(
            'post_type'           => 'post',
            'posts_per_page'      => 3,
            'orderby'             => 'rand',
            'ignore_sticky_posts' => 1,
        ) );
        
        if ( $my_query->have_posts() ) {
            while ( $my_query->have_posts() ) {
                $my_query->the_post();
                ?>
		<div class="item col3">
			<?php 
                wpsierra_blog_style_related( 'large' );
                ?>
		</div><!--/.item-->

		<?php 
            }
            ?>

		<?php 
            wp_reset_query();
            ?>

		</div><!--/.related-posts-standard-->
	</div><!--/.container-->
	<?php 
        }
    
    }

}

add_action( 'wpsierra_related_posts', 'wpsierra_blog_related_posts' );
// Single post info
function wpsierra_single_post_info()
{
    global  $post ;
    $author_id = $post->post_author;
    ?>
	<h3 class="widget-title-style single-post-info-bottom">
		<?php 
    the_time( get_option( 'date_format' ) );
    ?><span> | </span>
	  <?php 
    esc_html_e( 'by', 'wp-sierra' );
    ?> <a href="<?php 
    echo  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ;
    ?>" rel="author"><?php 
    echo  get_the_author( get_the_author_meta( 'name' ) ) ;
    ?></a>
	</h3>
	<span class="single-post-categories">
		<?php 
    the_category( ' ' );
    ?>
	</span>
	<?php 
}

// Single post title
function wpsierra_single_post_title()
{
    echo  '<h1 class="single-post-title">' ;
    the_title();
    echo  '</h1>' ;
}

// Single post featured image
function wpsierra_featured_image()
{
    global  $post ;
    
    if ( has_post_thumbnail( $post->ID ) ) {
        ?>
		<div class="featured-image"><?php 
        the_post_thumbnail( 'large' );
        ?></div>
	<?php 
    }

}

// Single post area
function wpsierra_single_post_area()
{
    global  $post ;
    ?>

	<div class="single-post-area-info">

		<?php 
    
    if ( class_exists( 'Kirki' ) ) {
        
        if ( '0' == get_theme_mod( 'enable_single_post_header', '0' ) ) {
            ?>
				<div class="single-post-info">
					<?php 
            wpsierra_single_post_title();
            ?>
					<?php 
            wpsierra_single_post_info();
            ?>
				</div>
				<?php 
            wpsierra_featured_image();
            ?>
				<?php 
        }
    
    } else {
        ?>
			<div class="single-post-info">
				<?php 
        wpsierra_single_post_title();
        ?>
				<?php 
        wpsierra_single_post_info();
        ?>
			</div>
			<?php 
        wpsierra_featured_image();
        ?>
			<?php 
    }
    
    get_template_part( 'content', get_post_format() );
    ?>

	</div><!--/.single-post-area-info-->
<?php 
}

// WP Sierra logo
function wpsierra_logo()
{
    $logo_url = get_theme_mod( 'logo_url' );
    $alternative_logo = get_theme_mod( 'alternative_logo_url' );
    
    if ( !empty($alternative_logo) ) {
        ?>
	<div class="sierra-brand-alternative">
		<a href="<?php 
        echo  esc_url( home_url() ) ;
        ?>">
			<img src="<?php 
        echo  esc_url( $alternative_logo ) ;
        ?>" alt="<?php 
        bloginfo( 'name' );
        ?>">
		</a>
	</div><!--/.sierra-brand-alternative-->
  <?php 
    } else {
        ?>
		<div class="sierra-brand-title sierra-brand-alternative">
			<a href="<?php 
        echo  esc_url( home_url() ) ;
        ?>">
				<?php 
        bloginfo( 'name' );
        ?>
			</a>
		</div><!--/.sierra-brand-alternative-->
	<?php 
    }
    
    ?>
	<?php 
    
    if ( !empty($logo_url) ) {
        ?>
	<div class="sierra-brand">
		<a href="<?php 
        echo  esc_url( home_url() ) ;
        ?>">
			<img src="<?php 
        echo  esc_url( $logo_url ) ;
        ?>" alt="<?php 
        bloginfo( 'name' );
        ?>">
		</a>
	</div><!--/.sierra-brand-->
	<?php 
    } else {
        ?>
	<div class="sierra-brand-title sierra-brand">
		<a href="<?php 
        echo  esc_url( home_url() ) ;
        ?>"><?php 
        bloginfo( 'name' );
        ?></a>
	</div><!--/.sierra-brand-title-->
	<?php 
    }

}

// WP Sierra header classes
function wpsierra_header_classes()
{
    global  $wp_query ;
    $page_id = $wp_query->get_queried_object_id();
    $header_shadow = get_theme_mod( 'header_shadow', 1 );
    $post_transparent_header = get_theme_mod( 'enable_post_header_transparent', '0' );
    $post_header = get_theme_mod( 'enable_single_post_header', '0' );
    $post_alternative_logo = get_theme_mod( 'enable_post_header_alternative_logo', '0' );
    $alternative_logo = get_theme_mod( 'alternative_logo_url', '' );
    $archive_transparent_header = get_theme_mod( 'enable_archive_header_transparent', '1' );
    $archive_header = get_theme_mod( 'enable_archive_blog_header', '1' );
    $archive_alternative_logo = get_theme_mod( 'enable_archive_header_alternative_logo', '1' );
    $classes = 'resize-header sierra-sticky header-scroll-top sierra-header-default';
    //For Single Post Header
    if ( 1 == $post_transparent_header && 1 == $post_header && is_singular( 'post' ) ) {
        $classes .= ' sierra-header-transparent top';
    }
    if ( 1 == $post_alternative_logo && 1 == $post_header && !empty($alternative_logo) && is_singular( 'post' ) ) {
        $classes .= ' sierra-alternative-logo';
    }
    // For Archive Blog Header
    if ( 1 == $archive_transparent_header && 1 == $archive_header && is_home() ) {
        $classes .= ' sierra-header-transparent top';
    }
    if ( 1 == $archive_alternative_logo && 1 == $archive_header && !empty($alternative_logo) && is_home() ) {
        $classes .= ' sierra-alternative-logo';
    }
    // For Single Page Header
    if ( 'true' == get_post_meta( $page_id, 'page_transparent_header', true ) ) {
        $classes .= ' sierra-header-transparent top';
    }
    if ( 'true' == get_post_meta( $page_id, 'page_alternative_logo', true ) && !empty($alternative_logo) ) {
        $classes .= ' sierra-alternative-logo';
    }
    // For All Headers
    if ( 1 == $header_shadow ) {
        $classes .= ' sierra-header-shadow';
    }
    return $classes;
}

// Archive Blog Header
function wpsierra_archive_blog_header()
{
    global  $wp_query ;
    $page_id = $wp_query->get_queried_object_id();
    
    if ( class_exists( 'Kirki' ) ) {
        $archive_transparent_header = get_theme_mod( 'enable_archive_header_transparent', '1' );
        $archive_header = get_theme_mod( 'enable_archive_blog_header', '1' );
        $archive_header_height = get_theme_mod( 'archive_header_height', 'custom' );
        
        if ( '1' == get_theme_mod( 'enable_archive_blog_header', '1' ) ) {
            $header_class = 'archive-blog-header';
            if ( 'full' == $archive_header_height ) {
                $header_class .= ' mwp_fullscreen';
            }
            if ( 'true' == get_post_meta( $page_id, 'page_transparent_header', true ) ) {
                $header_class .= ' blog-header-transparent';
            }
            if ( '1' == $archive_header && '1' == $archive_transparent_header && is_home() ) {
                $header_class .= ' blog-header-transparent';
            }
            ?>
	<div class="<?php 
            echo  esc_attr( $header_class ) ;
            ?>">
		<?php 
            if ( '1' == get_theme_mod( 'enable_blog_header_overlay', '0' ) ) {
                ?>
		<div class="blog-header-overlay"></div>
		<?php 
            }
            ?>
		<div class="archive-blog-header-title">
		<div class="container">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<?php 
            
            if ( get_theme_mod( 'blog_heading_text', '' ) ) {
                ?>
					<h1><?php 
                echo  esc_html( get_theme_mod( 'blog_heading_text' ) ) ;
                ?></h1>
				<?php 
            } else {
                ?>
					<h1><?php 
                bloginfo( 'description' );
                ?></h1>
				<?php 
            }
            
            ?>
				<?php 
            
            if ( get_theme_mod( 'blog_tagline_text', '' ) ) {
                ?>
					<h2><?php 
                echo  esc_html( get_theme_mod( 'blog_tagline_text' ) ) ;
                ?></h2>
				<?php 
            }
            
            ?>
			</div>
			<div class="col-md-1"></div>
		</div>
		</div>
	</div>
	<?php 
        }
    
    } else {
        ?>
		<div class="archive-blog-header sierra-blog-header-default blog-header-transparent">
			<div class="archive-blog-header-title">
			<div class="container">
				<div class="col-md-1"></div>
				<div class="col-md-10">
						<h1><?php 
        bloginfo( 'description' );
        ?></h1>
				</div>
				<div class="col-md-1"></div>
			</div>
			</div>
		</div>
	<?php 
    }

}

// Archive Blog Title
function wpsierra_archive_blog_title()
{
    global  $wp_query ;
    $page_id = $wp_query->get_queried_object_id();
    
    if ( class_exists( 'Kirki' ) ) {
        
        if ( 'true' == get_theme_mod( 'enable_archive_blog_title', 'true' ) ) {
            ?>
		<?php 
            
            if ( is_home() && !is_front_page() ) {
                ?>
			<div class="page-header">
				<h1 class="entry-title"><?php 
                single_post_title();
                ?></h1>
			</div>
		<?php 
            } else {
                ?>
		<div class="page-header">
			<h1 class="entry-title"><?php 
                esc_html_e( 'Posts', 'wp-sierra' );
                ?></h1>
		</div>
		<?php 
            }
            
            ?>
	<?php 
        }
        
        ?>
	<?php 
    } else {
        ?>
	<div class="page-header">
		<h1 class="entry-title"><?php 
        esc_html_e( 'Posts', 'wp-sierra' );
        ?></h1>
	</div>
	<?php 
    }
    
    ?>
	<div class="page-margin-top"></div>
<?php 
}

function wpsierra_archive_blog_columns()
{
    
    if ( class_exists( 'Kirki' ) ) {
        $columns = get_theme_mod( 'archive_boxed_columns', 'col2' );
    } else {
        $columns = 'col2';
    }
    
    return $columns;
}

function wpsierra_archive_blog_width()
{
    $blog_width = 'container';
    return $blog_width;
}

function wpsierra_archive_blog_style()
{
    
    if ( class_exists( 'Kirki' ) ) {
        
        if ( 'modern' == get_theme_mod( 'archive_blog_layout' ) ) {
            wpsierra_blog_style_modern( 'large' );
        } elseif ( 'lines' == get_theme_mod( 'archive_blog_layout' ) ) {
            wpsierra_blog_style_lines( 'large' );
        } else {
            wpsierra_blog_style_modern( 'large' );
        }
    
    } else {
        wpsierra_blog_style_modern( 'large' );
    }

}

function wpsierra_archive_blog_margin()
{
    
    if ( class_exists( 'Kirki' ) ) {
        
        if ( 'modern' == get_theme_mod( 'archive_blog_layout' ) ) {
            $blog_margin = 'pf-padding';
        } elseif ( 'lines' == get_theme_mod( 'archive_blog_layout' ) ) {
            $blog_margin = 'pf-padding lines-style';
        } else {
            $blog_margin = 'pf-padding';
        }
    
    } else {
        $blog_margin = 'pf-padding';
    }
    
    return $blog_margin;
}

// Single Post Header
function wpsierra_single_post_header()
{
    global  $wp_query ;
    global  $post ;
    $page_id = $wp_query->get_queried_object_id();
    
    if ( class_exists( 'Kirki' ) ) {
        $post_header_height = get_theme_mod( 'post_header_height', 'full' );
        
        if ( 'true' == get_theme_mod( 'enable_single_post_header' ) ) {
            $header_class = 'post-header';
            if ( 'full' == $post_header_height ) {
                $header_class .= ' mwp_fullscreen';
            }
            if ( 1 == get_theme_mod( 'enable_post_header_transparent' ) ) {
                $header_class .= ' post-header-transparent';
            }
            ?>
			<?php 
            
            if ( has_post_thumbnail() ) {
                ?>
			<div class="<?php 
                echo  esc_attr( $header_class ) ;
                ?>" style="background-image: url(<?php 
                the_post_thumbnail_url();
                ?>)">
			<?php 
            } else {
                ?>
			<div class="<?php 
                echo  esc_attr( $header_class ) ;
                ?>">
			<?php 
            }
            
            ?>
				<?php 
            if ( 'true' == get_theme_mod( 'enable_post_header_overlay', 'true' ) ) {
                ?>
				<div class="post-header-overlay"></div>
				<?php 
            }
            ?>
				<div class="post-header-title">
				<div class="container">
					<div class="col-md-1"></div>
					<div class="col-md-10">
							<h1><?php 
            single_post_title();
            ?></h1>
							<?php 
            wpsierra_single_post_info();
            ?>
					</div>
					<div class="col-md-1"></div>
				</div>
				</div>
			</div>
	<?php 
        }
    
    }

}

// WP Sierra Copyright
function wpsierra_copyright()
{
    global  $wpdb ;
    $copyright_dates = $wpdb->get_results( "SELECT YEAR(min(post_date_gmt)) AS firstdate, YEAR(max(post_date_gmt)) AS lastdate FROM {$wpdb->posts} WHERE post_status = 'publish'" );
    $output = '';
    
    if ( $copyright_dates ) {
        $copyright = "&copy; " . $copyright_dates[0]->firstdate;
        if ( $copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate ) {
            $copyright .= '-' . $copyright_dates[0]->lastdate;
        }
        $output = $copyright;
    }
    
    return $output;
}

//Default Copyright
function wpsierra_default_copyright()
{
    ?>
	<p>
		<?php 
    echo  esc_html( wpsierra_copyright() ) ;
    ?> <?php 
    esc_html_e( 'by', 'wp-sierra' );
    ?> <?php 
    bloginfo( 'name' );
    ?>.
		<?php 
    echo  wp_kses_post( ' Powered by <a href="' . esc_url( 'https://wpsierra.com' ) . '" target="_blank"> WP Sierra </a>Wordpress Theme', 'wp-sierra' ) ;
    ?>
	</p>
<?php 
}

// WP Sierra Body Class
add_filter( 'body_class', 'wpsierra_body_class' );
function wpsierra_body_class( $classes )
{
    $post_image_shadow = get_theme_mod( 'enable_post_image_shadow', '1' );
    if ( '1' === $post_image_shadow ) {
        $classes[] = 'post-image-shadow';
    }
    return $classes;
}
