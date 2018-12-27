<?php
/**
 * sirius theme defaults
 *
  */
?>
<?php 

$sirius_defaults['sirius_theme_credits']                    = 'Sirius - by <a href="https://www.lyrathemes.com">LyraThemes</a>';
$sirius_defaults['sirius_custom_header']                    = esc_url( get_template_directory_uri() ) . '/sample/images/header.jpg';

$sirius_defaults['sirius_image_logo_show']                  = 0;
$sirius_defaults['sirius_text_logo']                        = get_bloginfo('name');

$sirius_defaults['sirius_footer_copyright']                 = 'Copyright &copy; '.date_i18n("Y").' <a href="'. esc_url( home_url( '/' ) ) .'">'.esc_html(get_bloginfo('name')).'</a>';

$sirius_defaults['sirius_banner_heading']                   = get_bloginfo('name');
$sirius_defaults['sirius_banner_description']               = get_bloginfo('description');
$sirius_defaults['sirius_banner_button_1_label']            = esc_html__('Learn More', 'sirius-lite');
$sirius_defaults['sirius_banner_button_1_url']              = '#';
$sirius_defaults['sirius_banner_button_2_label']            = esc_html__('Lets go', 'sirius-lite');
$sirius_defaults['sirius_banner_button_2_url']              = '#';

$sirius_defaults['sirius_frontpage_banner']                 = 'Banner';

$sirius_defaults['sirius_frontpage_order']                  = array(
                                                                'frontpage_section_order_content',
                                                                'frontpage_section_order_featured_links_images',
                                                                'frontpage_section_order_open_1' ,
                                                                'frontpage_section_order_cta_1' ,
                                                                'frontpage_section_order_open_2' ,
                                                                'frontpage_section_order_featured_links_icons' ,
                                                                'frontpage_section_order_recent_posts' ,
                                                                'frontpage_section_order_cta_2' );

$sirius_defaults['sirius_frontpage_featured_link_images_section_id']    = 'featured1';
$sirius_defaults['sirius_frontpage_featured_link_images_background_color'] = '#f5f5f5';

$sirius_defaults['sirius_frontpage_open_content_1']         = sirius_rand_page();
$sirius_defaults['sirius_frontpage_open_content_1_section_id'] = 'open1';
$sirius_defaults['sirius_frontpage_open_content_1_background_color'] = '#ffffff';

$sirius_defaults['sirius_frontpage_cta_1']                  = sirius_rand_page();
$sirius_defaults['sirius_frontpage_cta_1_parallax']         = 1;
$sirius_defaults['sirius_frontpage_cta_1_parallax_image']   = esc_url( get_template_directory_uri() ) . '/sample/images/cta-1-parallax.jpg';
$sirius_defaults['sirius_frontpage_cta_1_section_id']       = 'cta';
$sirius_defaults['sirius_frontpage_cta_1_background_color'] = '#0e2431';

$sirius_defaults['sirius_frontpage_open_content_2']         = sirius_rand_page();
$sirius_defaults['sirius_frontpage_open_content_2_section_id'] = 'open2';
$sirius_defaults['sirius_frontpage_open_content_2_background_color'] = '#f5f5f5';

$sirius_defaults['sirius_frontpage_featured_link_icons_heading'] = esc_html__('Simple But Effective', 'sirius-lite');
$sirius_defaults['sirius_frontpage_featured_link_icons_text'] = esc_html__('This is some description text that shows up at the beginning of the featured section. You can edit this by going to Appearance > Customize > Front Page > Featured Links / Pages (Icons).', 'sirius-lite');
$sirius_defaults['sirius_frontpage_featured_link_icons_section_id'] = 'featured2';
$sirius_defaults['sirius_frontpage_featured_link_icons_background_color'] = '#ffffff';
$sirius_defaults['sirius_frontpage_featured_link_icons_icon_fallback_color'] = '#e57373';

$sirius_defaults['sirius_frontpage_recent_posts_heading']   = esc_html__('Latest Blog Posts', 'sirius-lite');
$sirius_defaults['sirius_frontpage_recent_posts_text']      = esc_html__('This is some description text that shows up at the beginning of the latest blog posts section. You can edit this by going to Appearance > Customize > Front Page > Recent Posts.', 'sirius-lite');
$sirius_defaults['sirius_frontpage_recent_posts_number']    = '4';
$sirius_defaults['sirius_frontpage_recent_posts_section_id']= 'latest';
$sirius_defaults['sirius_frontpage_recent_posts_background_color'] = '#f5f5f5';

$sirius_defaults['sirius_frontpage_cta_2']                  = sirius_rand_page();
$sirius_defaults['sirius_frontpage_cta_2_parallax']         = 1;
$sirius_defaults['sirius_frontpage_cta_2_parallax_image']   = esc_url( get_template_directory_uri() ) . '/sample/images/cta-2-parallax.jpg';
$sirius_defaults['sirius_frontpage_cta_2_section_id']       = 'cta2';
$sirius_defaults['sirius_frontpage_cta_2_background_color'] = '#912edb';

$sirius_defaults['sirius_blog_feed_meta_show']              = 1;
$sirius_defaults['sirius_blog_feed_date_show']              = 1;
$sirius_defaults['sirius_blog_feed_category_show']          = 1;
$sirius_defaults['sirius_blog_feed_author_show']            = 0;
$sirius_defaults['sirius_blog_feed_comments_show']          = 1;
$sirius_defaults['sirius_blog_feed_sidebar_show']           = 0;
$sirius_defaults['sirius_blog_feed_post_format']            = 'Small';
$sirius_defaults['sirius_blog_feed_post_images']            = 'Always';

$sirius_defaults['sirius_posts_meta_show']                  = 1;
$sirius_defaults['sirius_posts_date_show']                  = 1;
$sirius_defaults['sirius_posts_category_show']              = 1;
$sirius_defaults['sirius_posts_author_show']                = 0;
$sirius_defaults['sirius_posts_tags_show']                  = 1;
$sirius_defaults['sirius_posts_sidebar']                    = '1';
$sirius_defaults['sirius_posts_featured_image_show']        = 1;
$sirius_defaults['sirius_posts_featured_image_full']        = 0;

$sirius_defaults['sirius_pages_sidebar']                    = 0;
$sirius_defaults['sirius_pages_featured_image_show']        = '1';
$sirius_defaults['sirius_pages_featured_image_full']        = 0;


/* sample images */

#1000x600
$sirius_defaults['sirius_featured_sample'][]                = esc_url( get_template_directory_uri() ) . '/sample/images/featured1.jpg';
$sirius_defaults['sirius_featured_sample'][]                = esc_url( get_template_directory_uri() ) . '/sample/images/featured2.jpg';
$sirius_defaults['sirius_featured_sample'][]                = esc_url( get_template_directory_uri() ) . '/sample/images/featured3.jpg';
$sirius_defaults['sirius_featured_sample'][]                = esc_url( get_template_directory_uri() ) . '/sample/images/featured4.jpg';
$sirius_defaults['sirius_featured_sample'][]                = esc_url( get_template_directory_uri() ) . '/sample/images/featured5.jpg';
$sirius_defaults['sirius_featured_sample'][]                = esc_url( get_template_directory_uri() ) . '/sample/images/featured6.jpg';

#740x380
$sirius_defaults['sirius_featured_large_sample'][]          = esc_url( get_template_directory_uri() ) . '/sample/images/featured1_large.jpg';
$sirius_defaults['sirius_featured_large_sample'][]          = esc_url( get_template_directory_uri() ) . '/sample/images/featured2_large.jpg';
$sirius_defaults['sirius_featured_large_sample'][]          = esc_url( get_template_directory_uri() ) . '/sample/images/featured3_large.jpg';
$sirius_defaults['sirius_featured_large_sample'][]          = esc_url( get_template_directory_uri() ) . '/sample/images/featured4_large.jpg';
$sirius_defaults['sirius_featured_large_sample'][]          = esc_url( get_template_directory_uri() ) . '/sample/images/featured5_large.jpg';
$sirius_defaults['sirius_featured_large_sample'][]          = esc_url( get_template_directory_uri() ) . '/sample/images/featured6_large.jpg';

?>