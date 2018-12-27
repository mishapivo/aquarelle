<?php

/**
 * The default template for displaying blog masonry
 *
 * @package WordPress
 * @subpackage WP Sierra Theme
 */

if ( have_posts() ) {
    ?>

<div class="masonry-container <?php 
    echo  esc_attr( wpsierra_archive_blog_margin() ) ;
    ?>">
<?php 
    while ( have_posts() ) {
        the_post();
        ?>

<?php 
        $featured_post = get_post_meta( $post->ID, 'featured_post', true );
        ?>

<?php 
        
        if ( is_sticky() ) {
            ?>

	<?php 
            ?>

		<article id="post-<?php 
            the_ID();
            ?>" <?php 
            post_class();
            ?>>

			<div class="item <?php 
            echo  esc_attr( wpsierra_archive_blog_columns() ) ;
            ?>">

				<?php 
            wpsierra_blog_style_2( 'large' );
            ?>

			</div><!--/.item-->

		</article>

	<?php 
            ?>


<?php 
        } elseif ( $featured_post ) {
            ?>

	<article id="post-<?php 
            the_ID();
            ?>" <?php 
            post_class();
            ?>>

		<div class="item <?php 
            echo  esc_attr( wpsierra_archive_blog_columns() ) ;
            ?>">

			<?php 
            wpsierra_blog_style_2( 'large' );
            ?>

		</div><!--/.item-->

	</article>

<?php 
        } else {
            ?>

	<article id="post-<?php 
            the_ID();
            ?>" <?php 
            post_class();
            ?>>

		<div class="item <?php 
            echo  esc_attr( wpsierra_archive_blog_columns() ) ;
            ?>">

			<?php 
            wpsierra_archive_blog_style();
            ?>

		</div><!--/.item-->

	</article>

<?php 
        }
        
        ?>

<?php 
        wp_reset_postdata();
        ?>

<?php 
    }
    ?>

</div><!--/.masonry-container-->

<?php 
    the_posts_pagination();
    ?>


<?php 
} else {
    get_template_part( 'content', 'none' );
}
