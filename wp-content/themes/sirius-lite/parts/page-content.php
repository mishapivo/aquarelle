<?php 
$sirius_pages_featured_image_show = sirius_get_option('sirius_pages_featured_image_show'); 
$sirius_pages_featured_image_full = sirius_get_option('sirius_pages_featured_image_full');
$banner_size = $sirius_pages_featured_image_full == 1 ? 'full' : 'sirius-banner';
?>

<!-- Page Content -->
<div id="page-<?php the_ID(); ?>" <?php post_class('entry details entry-page'); ?>>

    <?php /* Featured Image */
    if($sirius_pages_featured_image_show == 1 && has_post_thumbnail()) { ?>
    <div class="entry-thumb"><?php the_post_thumbnail( $banner_size, array( 'alt' => the_title_attribute( array('echo' => false) ), 'class'=>'img-responsive' ) ); ?></div>
    <?php } ?>
    
    <div class="entry-body">
    
        <?php /* Title */ 
        if(get_the_title() != '') { ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <?php } else { ?>
        <h1 class="entry-title"><?php echo esc_html__('Post ID: ', 'sirius-lite'); the_ID(); ?></h1>
        <?php } ?>
        
        <div class="entry-content clearfix">
            <?php the_content(); wp_link_pages(); ?>
        </div>
        
    </div>
    
</div>
<!-- /Page Content -->