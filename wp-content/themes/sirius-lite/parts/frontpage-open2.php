<?php
$sirius_frontpage_order = sirius_get_option('sirius_frontpage_order');
if (in_array('frontpage_section_order_open_2', $sirius_frontpage_order)) {
?>

<?php
$sirius_frontpage_open_content_2_section_id = sirius_get_option('sirius_frontpage_open_content_2_section_id');
$sirius_frontpage_open_content_2_background_color = sirius_get_option('sirius_frontpage_open_content_2_background_color');

$sirius_frontpage_open_content_2 = sirius_get_option('sirius_frontpage_open_content_2');
$sirius_frontpage_open_content_2_page = get_post($sirius_frontpage_open_content_2); 

if($sirius_frontpage_open_content_2_page) { 
$sirius_frontpage_open_content_2_page_content = apply_filters( 'the_content', $sirius_frontpage_open_content_2_page->post_content );
?>

<section id="<?php echo esc_attr($sirius_frontpage_open_content_2_section_id); ?>" <?php if($sirius_frontpage_open_content_2_background_color != '') { ?> style="background-color:<?php echo esc_attr($sirius_frontpage_open_content_2_background_color); ?>" <?php } ?> class="frontpage-open2">
    <div class="container <?php sirius_animate('fadeIn'); ?>">
        <?php echo $sirius_frontpage_open_content_2_page_content; ?>
    </div>
</section>

<?php }
} ?>