<?php
/**
 * Template Name: Home
 */
?>
<?php get_header(); ?>

<?php get_template_part('parts/frontpage', 'banner'); ?>

<?php
$sirius_frontpage_order = sirius_get_option('sirius_frontpage_order');
if ( ! empty( $sirius_frontpage_order ) && is_array( $sirius_frontpage_order ) ) {
    foreach($sirius_frontpage_order as $frontpage_section) {
        switch($frontpage_section){
            case 'frontpage_section_order_content':                 get_template_part('parts/frontpage', 'content');    break;
            case 'frontpage_section_order_featured_links_images':   get_template_part('parts/frontpage', 'featured-links-images');    break;
            case 'frontpage_section_order_open_1':                  get_template_part('parts/frontpage', 'open1');    break;
            case 'frontpage_section_order_cta_1':                   get_template_part('parts/frontpage', 'cta1');    break;
            case 'frontpage_section_order_open_2':                  get_template_part('parts/frontpage', 'open2');    break;
            case 'frontpage_section_order_featured_links_icons':    get_template_part('parts/frontpage', 'featured-links-icons');    break;
            case 'frontpage_section_order_recent_posts':            get_template_part('parts/frontpage', 'recent-posts');    break;
            case 'frontpage_section_order_cta_2':                   get_template_part('parts/frontpage', 'cta2');    break;
        }
    }
}
?>

<?php get_footer(); ?>