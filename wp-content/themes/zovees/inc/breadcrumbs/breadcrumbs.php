<?php
/**
 * @package Zovees
 */

if( !function_exists('zovees_breadcrumbs') ):
    function zovees_breadcrumbs() { 
            
        global $post;
        $homeLink = home_url();
    ?>
    <!-- End Header Style Section -->
    <div class="banner-area banner-bg-1 ptb-100 bg-opacity-black-80 text-center" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-wrapper">
                        <h2><?php wp_title(''); ?></h2>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Main content Wrapper -->
    <?php }
endif
?>