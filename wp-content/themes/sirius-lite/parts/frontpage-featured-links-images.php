<?php
$sirius_frontpage_order = sirius_get_option('sirius_frontpage_order');
if (in_array('frontpage_section_order_featured_links_images', $sirius_frontpage_order)) {
?>

<?php
$sirius_frontpage_featured_link_images_section_id = sirius_get_option('sirius_frontpage_featured_link_images_section_id');
$sirius_frontpage_featured_link_images_background_color = sirius_get_option('sirius_frontpage_featured_link_images_background_color');
$sirius_frontpage_featured_link_images_type = 'Pages';
?>

<?php
 
if($sirius_frontpage_featured_link_images_type == 'Pages') {
    
$sirius_frontpage_featured_link_images_pages = sirius_get_option('sirius_frontpage_featured_link_images_pages');     
if(count($sirius_frontpage_featured_link_images_pages)>0 && $sirius_frontpage_featured_link_images_pages) { 
?>
<section id="<?php echo esc_attr($sirius_frontpage_featured_link_images_section_id); ?>" <?php if($sirius_frontpage_featured_link_images_background_color != '') { ?> style="background-color:<?php echo esc_attr($sirius_frontpage_featured_link_images_background_color); ?>" <?php } ?> class="frontpage-featured-link-images">
    <div class="container">
        <div class="featured-container">
        <div class="row">
        
        <?php 
        global $post; $temp = $post; 
        foreach($sirius_frontpage_featured_link_images_pages as $item){
            $page  = $item['sirius_frontpage_featured_link_images_page'];
            $post = get_post( $page ); if($post) { setup_postdata( $post ); ?>
            <div class="col-md-6">
                <div class="entry feature <?php sirius_animate('fadeIn'); ?>">
                    
                    <div class="entry-thumb"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'sirius-related', array( 'alt' => get_the_title(), 'class'=>'img-responsive' ) ); ?></a></div>
                    
                    <div class="entry-body">
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="entry-summary"><?php the_excerpt(); ?></div>
                    </div>
                </div>
            </div>
            <?php } } wp_reset_postdata(); $post = $temp; ?>
        
        </div>
        </div>
    </div>
</section>
<?php
}
 
}
?>

<?php } ?>