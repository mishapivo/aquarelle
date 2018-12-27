<?php
$sirius_frontpage_order = sirius_get_option('sirius_frontpage_order');
if (in_array('frontpage_section_order_recent_posts', $sirius_frontpage_order)) {
?>

<?php
$sirius_frontpage_recent_posts_section_id = sirius_get_option('sirius_frontpage_recent_posts_section_id');
$sirius_frontpage_recent_posts_background_color = sirius_get_option('sirius_frontpage_recent_posts_background_color');

$sirius_frontpage_recent_posts_heading = sirius_get_option('sirius_frontpage_recent_posts_heading');
$sirius_frontpage_recent_posts_text = sirius_get_option('sirius_frontpage_recent_posts_text');
$sirius_frontpage_recent_posts_number = sirius_get_option('sirius_frontpage_recent_posts_number');
?>

<section id="<?php echo esc_attr($sirius_frontpage_recent_posts_section_id); ?>" <?php if($sirius_frontpage_recent_posts_background_color != '') { ?> style="background-color:<?php echo esc_attr($sirius_frontpage_recent_posts_background_color); ?>" <?php } ?> class="frontpage-section frontpage-recent-posts">

    <div class="container">

        <?php if($sirius_frontpage_recent_posts_heading != '') { ?>
        <h2 class="text-center <?php sirius_animate('zoomIn'); ?>"><?php echo esc_html($sirius_frontpage_recent_posts_heading); ?></h2>
        <?php } ?>
        
        <?php if($sirius_frontpage_recent_posts_text != '') { ?>
        <div class="section-description text-center <?php sirius_animate('zoomIn'); ?>"><?php echo wp_kses_post($sirius_frontpage_recent_posts_text); ?></div>
        <?php } ?>
        
        <div class="row">
        
            <?php 
            global $post; $temp = $post; $i=0;
            $args = array( 'numberposts' => $sirius_frontpage_recent_posts_number );
            $recent_posts = get_posts( $args ); 
            foreach( $recent_posts as $post ){
            setup_postdata( $post ); 
            ?>
            <?php if($i%2 == 0 && $i!=0) { ?><div class="row"><?php } ?>
            <div class="col-md-6 <?php sirius_animate('zoomIn'); ?>"><?php get_template_part('parts/entry'); $i++; ?></div>
            <?php if($i%2 == 0) { ?></div><?php } ?>
            <?php } wp_reset_postdata(); $post = $temp; ?>
        </div>
    </div>
</section>

<?php } ?>
