
<?php
/**
 *
 *  The template part for displaying blog post classic view
 *
 *  @package WordPress
 *  @subpackage Materialize
 *  @since Materialize 1.0
 */

    global $post, $posts_total, $posts_index;
?>

    <!-- post content wrapper -->
    <article <?php post_class(); ?>>

        <?php
            // post thumbnail
        	$p_thumbnail = get_post( get_post_thumbnail_id( $post -> ID ) );

            if( has_post_thumbnail( $post -> ID ) && isset( $p_thumbnail -> ID ) ){
        ?>
                <!-- the post thumbnail wrapper -->
                <div class="post-thumbnail overflow-wrapper">
                    <?php
                        // the post thumbnail
                    	echo get_the_post_thumbnail( $post -> ID ,  'mythemes-classic' , array(
                    		'alt' 	=> mythemes_post::title( $post -> ID, true ),
                    	 	'class' => 'img-background effect-scale'
                    	 ));
                    ?>

                    <!-- the post thumbnail permalink ( go to single post ) -->
                    <a href="<?php echo get_permalink( $post -> ID ); ?>" class="valign-cell-wrapper" title="<?php echo mythemes_post::title( $post -> ID, true ); ?>">
                    </a>


                    <?php
                        // the post thumbnail caption
                        $c_thumbnail = isset( $p_thumbnail -> post_excerpt ) ? esc_html( $p_thumbnail -> post_excerpt ) : null;

                        if( !empty( $c_thumbnail ) ){
                            echo '<div class="valign-bottom-cell-wrapper">';
                            echo '<figcaption class="valign-cell">' . $c_thumbnail . '</figcaption>';
                            echo '</div>';
                        }
                    ?>
                </div><!-- .post-thumbnail -->
        <?php
            }
        ?>

        <!-- the post title -->
        <h2 class="post-title">
            <?php if( !empty( $post -> post_title ) ) { ?>

                <a href="<?php the_permalink() ?>" title="<?php echo mythemes_post::title( $post -> ID, true ); ?>"><?php the_title(); ?></a>

            <?php } else { ?>
        
                <!-- if the title is empty show "Read more about .." text -->
                <a href="<?php the_permalink() ?>"><?php _e( 'Read more about ..' , 'materialize' ) ?></a>
        
            <?php } ?>
        </h2>

        <?php
            
            /**
             *
             *  The template part for displaying top post meta
             *  If you want to override this in a child theme, then include a file
             *  called top.php and that will be used instead.
             */

            get_template_part( 'templates/meta/top' );
        ?>

        <!-- the post content -->
        <div class="post-content">

            <?php

                // the content for button read more
                $read_more_link =   '<span class="hide-on-small-only">' . __( 'Read More' , 'materialize' ) . '</span>'.
                                    '<span class="hide-on-med-and-up">&rarr;</span>';

                // show the excerpt ( if exists )
                if( !empty( $post -> post_excerpt ) ){
                    the_excerpt();
                    echo '<a href="' . get_permalink( $post -> ID ) . '" class="more-link">';
                    echo $read_more_link;
                    echo '</a>';
                }

                // show the content
                else{
                    the_content( $read_more_link );
                }
            ?>
            
            <div class="clearfix"></div>
        </div>
    </article>