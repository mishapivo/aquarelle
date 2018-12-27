<?php
/**
 *
 *  The template part for displaying top post meta
 *  The top post meta containing the post date,
 *  post categories, post author and number of coments.
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

    if( (bool)get_theme_mod( 'mythemes-top-meta', true ) ){
?>
        <div class="mythemes-top-meta meta">

            <!-- date -->
            <?php
                $t_time = get_post_time( 'Y-m-d', false, $post );
                $u_time = get_post_time( esc_attr( get_option( 'date_format' ) ), false, $post, true );
            ?>

            <time datetime="<?php echo esc_attr( $t_time ); ?>"><i class="materialize-icon-calendar"></i><?php echo sprintf( __( 'on %1s' , 'materialize' ), $u_time ); ?></time>

            <div class="clear"></div>

            <!-- categories -->
            <?php the_category(); ?>

            <!-- author -->
            <?php $name = get_the_author_meta( 'display_name' , $post -> post_author ); ?>
            <a class="author waves-effect waves-dark grey lighten-4" href="<?php echo esc_url( get_author_posts_url( $post-> post_author ) ); ?>" title="<?php echo sprintf( __( 'written by %1s' , 'materialize' ) , esc_attr( $name ) ); ?>">
                <i class="materialize-icon-user-1"></i><?php echo sprintf( __( 'by %1s' , 'materialize' ) , esc_html( $name ) ); ?>
            </a>

            <!-- comments -->
            <?php
                if( $post -> comment_status == 'open' ) {
                    $nr = absint( get_comments_number( $post -> ID ) );
                    echo '<a class="comments waves-effect waves-dark grey lighten-4" href="' . esc_url( get_comments_link( $post -> ID ) ) . '">';
                    echo '<i class="materialize-icon-comment-5"></i>';
                    echo sprintf( _nx( '%1s Comment' , '%1s Comments' , absint( $nr ) , 'Number of comment(s) from post meta' , 'materialize' ) , number_format_i18n( $nr ) );
                    echo '</a>';
                }
            ?>
        </div><!-- .mythemes-top-meta -->
<?php
    }
?>
