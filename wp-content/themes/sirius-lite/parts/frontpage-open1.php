<?php
$sirius_frontpage_order = sirius_get_option('sirius_frontpage_order');
if (in_array('frontpage_section_order_open_1', $sirius_frontpage_order)) {
?>

<?php
$sirius_frontpage_open_content_1_section_id = sirius_get_option('sirius_frontpage_open_content_1_section_id');
$sirius_frontpage_open_content_1_background_color = sirius_get_option('sirius_frontpage_open_content_1_background_color');

$sirius_frontpage_open_content_1 = sirius_get_option('sirius_frontpage_open_content_1');
$sirius_frontpage_open_content_1_page = get_post($sirius_frontpage_open_content_1); 

if($sirius_frontpage_open_content_1_page) { 

$sirius_frontpage_open_content_1_page_content = apply_filters( 'the_content', $sirius_frontpage_open_content_1_page->post_content );
?>

<section id="<?php echo esc_attr($sirius_frontpage_open_content_1_section_id); ?>" <?php if($sirius_frontpage_open_content_1_background_color != '') { ?> style="background-color:<?php echo esc_attr($sirius_frontpage_open_content_1_background_color); ?>" <?php } ?> class="frontpage-open1 shadow-on">
    <div class="container <?php sirius_animate('fadeIn'); ?>">
        <?php echo $sirius_frontpage_open_content_1_page_content; ?>
    </div>
</section>

<?php }
} ?>