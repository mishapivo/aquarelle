<?php
$sirius_frontpage_order = sirius_get_option('sirius_frontpage_order');
if (in_array('frontpage_section_order_cta_2', $sirius_frontpage_order)) {
?>

<?php
$sirius_frontpage_cta_2_section_id = sirius_get_option('sirius_frontpage_cta_2_section_id');
$sirius_frontpage_cta_2_background_color = sirius_get_option('sirius_frontpage_cta_2_background_color');

$sirius_frontpage_cta_2_parallax = sirius_get_option('sirius_frontpage_cta_2_parallax');
$sirius_frontpage_cta_2_parallax_image = sirius_get_option('sirius_frontpage_cta_2_parallax_image');

$class = 'color-bg';
if($sirius_frontpage_cta_2_parallax == 1 && $sirius_frontpage_cta_2_parallax_image != '') { $class = 'parallax'; } 
else if($sirius_frontpage_cta_2_parallax == 1 && $sirius_frontpage_cta_2_parallax_image == '') { $class = 'color-bg'; } 
else if($sirius_frontpage_cta_2_parallax == 0 && $sirius_frontpage_cta_2_parallax_image == '') { $class = 'color-bg'; }
else if($sirius_frontpage_cta_2_parallax == 0 && $sirius_frontpage_cta_2_parallax_image != '') { $class = 'no-parallax'; }


$sirius_frontpage_cta_2 = sirius_get_option('sirius_frontpage_cta_2');
$sirius_frontpage_cta_2_page = get_post($sirius_frontpage_cta_2); 

if($sirius_frontpage_cta_2_page) { 

$sirius_frontpage_cta_2_page_content = apply_filters( 'the_content', $sirius_frontpage_cta_2_page->post_content );
?>

<section class="<?php echo esc_attr($class); ?> frontpage-cta2" id="<?php echo esc_attr($sirius_frontpage_cta_2_section_id); ?>" <?php if($class == 'color-bg' && $sirius_frontpage_cta_2_background_color != '' ) { ?>style="background-color:<?php echo esc_attr($sirius_frontpage_cta_2_background_color); ?>"<?php } ?> >
    <div class="container <?php sirius_animate('fadeIn'); ?>">
        <?php echo $sirius_frontpage_cta_2_page_content; ?>
    </div>
</section>

<?php }
} ?>