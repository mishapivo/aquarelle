<?php
/**
* Template part - Call Section
*
* @package Zovees
*/

$zovees_call_section = get_theme_mod( 'zovees_call_section_hideshow','hide');

$zovees_calltext = get_theme_mod( "zovees_calltext", '' );
$zovees_call_btntxt = get_theme_mod( "zovees_call_btntxt", '' );
$zovees_call_btnurl = get_theme_mod( "zovees_call_btnurl", '' );

$call_args  = array(
        'post_type' => 'post',
        'posts_per_page' => 1
    ); 

$call_query = new wp_Query( $call_args );

if( $zovees_call_section == "show" ) : ?>

    <!-- start call to action -->
    <div class="content-section red-bg ptb-60">
        <div class="container">
            <?php
                while( 
                    $call_query->have_posts()) :
                    $call_query->the_post();
            ?>
            <div class="row">
                <div class="col-md-9 col-sm-8">
                    <div class="call-to-action">
                        <?php if ( $zovees_calltext ): ?>
                            <h2><?php echo esc_html($zovees_calltext); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="call-to-action-btn">
                        <?php if ( $zovees_call_btntxt ): ?>
                            <a href="<?php echo esc_attr($zovees_call_btnurl); ?>" class="button active"><?php echo esc_html($zovees_call_btntxt); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
                endwhile;
                wp_reset_postdata();
            ?>
        </div>
    </div>
    <!-- End call to action -->

<?php endif; ?>