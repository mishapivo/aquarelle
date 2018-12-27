<?php
/**
 * Template part for displaying front page blog section.
 *
 * @package Moral
 */

// Get default  mods value.
$blog_section = get_theme_mod( 'store_mall_blog_section', 'disable' );

if ( 'disable' === $blog_section ) {
	return;
}

$default = store_mall_get_default_mods();

$img_position = 'before-title';
$btn_txt = esc_html__( 'View All', 'store-mall' );
?>

<div id="latest-news" class="relative page-section">
    <div class="wrapper">
        <div class="section-header">
        	<?php  
        	$section_title =  get_theme_mod( 'store_mall_blog_section_title', $default['store_mall_blog_section_title'] );
        	if ( ! empty( $section_title ) ) : ?>
            	<h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
        	<?php endif; ?>
        </div><!-- .section-header -->

        <!-- supports col-1, col-2, col-3, col-4 -->
        <?php $posts_per_page = 3; ?>
        <div class="blog-posts-wrapper col-3">
        	<?php  
        	$btn_link = get_permalink( get_option( 'page_for_posts' ) );

            $args = array();
        	if ( 'recent-posts' === $blog_section ) {
            	$args = array(
            			'posts_per_page' => $posts_per_page,
            			'ignore_sticky_posts' => true,
            		);
        	}

        	$query = new WP_Query( $args );

			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post(); 

						$img_html = '';

						if ( has_post_thumbnail() ) {
                        	$img_html = '<div class="featured-image">' . get_the_post_thumbnail( get_the_ID(), 'store-mall-home-blog' ) . '</div>' ;
						}

						$class = ( has_post_thumbnail() ) ? 'has-post-thumbnail' : '';
						?>
		                <article class="<?php echo esc_attr( $class );?>">
		                    
		                    <?php
		                    if ( 'before-title' === $img_position ) {
		                    	echo $img_html;
		                    }
		                    ?>

		                    <div class="entry-container">
		                        <div class="entry-meta">
		                            <?php store_mall_posted_on();?>
		                        </div><!-- .entry-meta -->

		                        <header class="entry-header">
		                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
		                        </header>
		                        <div class="entry-content">
		                            <?php the_excerpt(); ?>
		                        </div><!-- .entry-content -->
		                        <a href="<?php the_permalink(); ?>" class="more-link"><?php esc_html_e( 'Read More', 'store-mall' ); ?>
		                            <?php echo store_mall_get_svg( array( 'icon' => 'arrow-right' ) ); ?>
		                        </a>
		                    </div><!-- .entry-container -->
		                </article>
		        <?php endwhile; ?>
		        <?php wp_reset_postdata(); ?>
        	<?php endif; ?>
        </div><!-- .blog-posts-wrapper -->
        <div class="more-link more-blog-posts">
            <a href="<?php echo esc_url( $btn_link ); ?>" class="btn btn-primary"><span><?php echo esc_html( $btn_txt );  ?></span></a>
        </div><!-- .more-link -->
    </div><!-- .wrapper -->
</div><!-- #latest-posts -->