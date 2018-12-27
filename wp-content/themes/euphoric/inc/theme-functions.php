<?php
/**
 * Theme Functions which enhance the theme by hooking into WordPress
 *
 * @package euphoric
 */

// Top Panel

function euphoric_top_panel(){
$select_top_category = get_theme_mod('select_top_category','');
$disable_top_panel = get_theme_mod('disable_top_panel',0);
$disable_top_panel_link = get_theme_mod('disable_top_panel_link',0);
$disable_crop_image = get_theme_mod ('disable-crop-image',0);
$query = new WP_Query(array(
    'posts_per_page' =>  1,
    'post_type' => array( 'post' ) ,
    'category_name' => esc_attr($select_top_category),
));

    if($disable_top_panel==0 ){
        if($select_top_category!='' || (is_active_sidebar( 'top-panel' ) ) ){ ?>

        <div class="top-panel">
            <div class="wrap">
                <?php while ($query->have_posts()):$query->the_post(); ?>
                    <div class="tp-content-wrap">
                        <?php
                        if($select_top_category!=''){
                            if ( has_post_thumbnail() ) { ?>
                            <div class="tp-img-content">
                                <?php if($disable_top_panel_link ==0){ ?>
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                        <?php
                                        if ($disable_crop_image !=0){
                                            the_post_thumbnail();
                                        } else {
                                            the_post_thumbnail('euphoric-top-panel');
                                        
                                        }  ?>
                                    </a>
                                <?php } else {
                                        if ($disable_crop_image !=0){
                                            the_post_thumbnail();
                                        } else {
                                            the_post_thumbnail('euphoric-top-panel');

                                        }
                                } ?>
                            </div>
                            <?php } ?>
                            <div class="tp-content-element">
                                <?php if($disable_top_panel_link ==0){ ?>
                                    <h2 class="tp-header"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                <?php } else { ?>
                                     <h2 class="tp-header"><?php the_title(); ?></h2>
                                <?php } ?>
                                <div class="tp-text-col">
                                    <?php the_excerpt();?>
                                </div><!-- .tp-text-col -->
                            </div><!-- .tp-content-element -->
                        <?php }
                        if ( is_active_sidebar( 'top-panel' ) ) : ?>
                            <div class="tp-widget-content">
                                <section class="widget widget_text">
                                    <?php dynamic_sidebar( 'top-panel' ); ?>
                                </section>
                            </div>
                        <?php endif; ?>
                     </div><!-- .tp-content-wrap -->
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div><!-- .wrap -->
        </div><!-- .top-panel -->
        <?php }
    }
}

add_action ('euphoric_frontend_top_panel', 'euphoric_top_panel');


// Navigation Top
function euphoric_navigation_top(){
$disable_search_form = get_theme_mod('disable_search_form',0); ?>
    <div class="navigation-top">
        <div class="wrap">
            <div id="site-header-menu" class="site-header-menu">
                <nav id="site-navigation" class="main-navigation" aria-label="<?php _e('Primary Menu','euphoric'); ?>">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <span class="toggle-text"><?php _e('Menu','euphoric'); ?></span>
                        <span class="toggle-bar"></span>
                    </button>
                    <?php
                    wp_nav_menu( array(
                        'container' =>'',
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'items_wrap'      => '<ul id="primary-menu" class="menu nav-menu">%3$s</ul>',
                    ) ); ?>
                </nav><!-- #site-navigation -->
            </div>
            <?php if($disable_search_form ==0) { ?>
                <div class="search-toggle"><span></span></div>
            <?php } ?>
        </div><!-- .wrap -->
     </div><!-- .navigation-top -->       
<?php }

add_action('euphoric_frontend_navigation_top','euphoric_navigation_top');

// Search Form 
function euphoric_search_form(){
    $search_text = get_theme_mod('search_text',esc_html__('Search &hellip;','euphoric')); ?>
<div class="search-container">
    <form role="search" method="get" class="search" action="<?php echo esc_url( home_url( '/' ) ); ?>"> 
        <label>
            <input class="search-field" placeholder="<?php echo esc_attr($search_text); ?>" name="s" type="search"> 
        </label> 
            <input class="search-submit" value="<?php echo esc_attr($search_text); ?>" type="submit">
    </form>
</div><!-- .search-container -->
    
<?php }
add_action('euphoric_frontend_search_form','euphoric_search_form');

// Social Navigation
function euphoric_social_navigation(){ ?>
    <nav class="social-navigation">
        <?php
        if(has_nav_menu('menu-2')){
            wp_nav_menu( array(
                'container' =>'',
                'theme_location' => 'menu-2',
                'menu_id'        => 'primary-menu',
                'items_wrap'      => '<ul class="social-links-menu">%3$s</ul>',
                'link_before'    => '<span class="screen-reader-text">',
                'link_after'     => '</span>',
            ) );
        } ?>
    </nav><!-- .social-navigation -->

<?php }

add_action('euphoric_frontend_social_navigation','euphoric_social_navigation');

// Site Branding
function euphoric_site_branding(){ ?>
    <div class="site-branding">
        <?php the_custom_logo();

        if ( is_front_page() && is_home() ) : ?>
            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
        else :
            ?>
            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
            <?php
        endif;
        $euphoric_description = get_bloginfo( 'description', 'display' );
        if ( $euphoric_description || is_customize_preview() ) :
            ?>
            <p class="site-description"><?php echo $euphoric_description; /* WPCS: xss ok. */ ?></p>
        <?php endif; ?>
    </div><!-- .site-branding -->

<?php }

add_action('euphoric_frontend_site_branding','euphoric_site_branding');

// Main Banner
function euphoric_main_banner(){
$disable_main_banner = get_theme_mod('disable_main_banner',0);
$select_main_banner_category = get_theme_mod('select_main_banner_category','');
$remove_banner_link = get_theme_mod('remove_banner_link',0);
$no_of_main_banner = get_theme_mod('no_of_main_banner','3');
$slider_options = get_theme_mod('slider-options','main-banner');
$enable_fullwidth_banner = get_theme_mod('enable-fullwidth-banner',0);
$disable_crop_image = get_theme_mod ('disable-crop-image',0);
$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','euphoric'));
$query = new WP_Query(array(
    'posts_per_page' =>  intval($no_of_main_banner),
    'post_type' => array( 'post' ) ,
    'category_name' => esc_attr($select_main_banner_category),
));
if(!is_paged()){
    if($disable_main_banner==0){
        if($select_main_banner_category!='' || $slider_options !='main-banner'){ ?>
        <div class="main-banner  <?php if ($enable_fullwidth_banner !=0){ echo 'full-width-banner'; } ?>">
            <div class="banner-wrap">
                <div class="banner-list">
                    <?php 
                    if($slider_options == 'metaslider' || $slider_options == 'smartslider' || $slider_options == 'masterslider'){
                        do_action('euphoric_frontend_plugins_slider');
                    } else {
                        while ($query->have_posts()):$query->the_post();
                        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'euphoric' ) ); ?>
                            <div class="slide">
                                <div class="slide-content">
                                     <?php if(has_post_thumbnail()){ ?>
                                    <div class="slide-thumb">
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> 
                                            <?php 

                                            if ($disable_crop_image !=0){
                                                the_post_thumbnail();
                                            } else {
                                                the_post_thumbnail('euphoric-main-banner');

                                            } ?>
                                        </a>
                                    </div><!-- .slide-thumb -->
                                    <?php } ?>
                                    <div class="slide-text-content">
                                        <?php if ( $tags_list ) { ?>
                                        <div class="entry-tag">
                                            <?php euphoric_tag_lists (); ?>
                                        </div>
                                        <?php }
                                    if($remove_banner_link ==0){ ?>
                                        <h2 class="slide-title"><a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                    <?php } else { ?>
                                        <h2 class="slide-title"><?php the_title(); ?></h2>
                                     <?php } ?>
                                        <div class="slide-text">
                                            <?php the_content( sprintf(
                                                    wp_kses(
                                                        /* translators: %s: Name of current post. Only visible to screen readers */
                                                        $excerpt_text. '<span class="screen-reader-text"> "%s"</span>',
                                                        array(
                                                            'span' => array(
                                                                'class' => array(),
                                                            ),
                                                        )
                                                    ),
                                                    get_the_title()
                                                ) );?>
                                        </div><!-- .slider-text -->
                                   
                                    </div><!-- .slide-text-content -->
                                </div><!-- .slide-content -->
                            </div><!-- .slide -->
                        <?php endwhile;
                        wp_reset_postdata();
                    } ?>
                </div><!-- .banner-list -->
            </div><!-- .banner-wrap -->
        </div><!-- .main-banner -->
        <?php }
    }
} ?>

<?php }

add_action('euphoric_frontend_main_banner','euphoric_main_banner');

function euphoric_hightlight_category(){
$disable_category_highlight = get_theme_mod('disable_category_highlight',0);
$select_category_highlight = get_theme_mod('select_category_highlight','');
$remove_category_highlight_link = get_theme_mod('remove_category_highlight_link',0);
$no_of_category_highlight = get_theme_mod('no_of_category_highlight','3');
$excerpt_text = get_theme_mod('excerpt_text',esc_html__('Read More','euphoric'));
$disable_crop_image = get_theme_mod ('disable-crop-image',0);

$query = new WP_Query(array(
    'posts_per_page' =>  intval($no_of_category_highlight),
    'post_type' => array( 'post' ) ,
    'category_name' => esc_attr($select_category_highlight),
));

$i = 1;
if(!is_paged()){
    if($disable_category_highlight==0){
        if($select_category_highlight!='' ){ ?>
        <div class="category-highlight">
            <div class="wrap">
                <div class="ch-row">
                    <?php  
                    while ($query->have_posts()):$query->the_post();
                        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'euphoric' ) );
                        global $post;
                        $highlight_bg_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
                        $highlight_bg_image_url = $highlight_bg_image[0]; ?>
                        <div class="ch-column <?php  if($i ==2){ echo 'ch-middle'; } else { echo 'ch-small'; } ?>">
                            <div class="ch-column-inner">
                                <?php  if($i ==2){ ?>
                                 <div class="ch-post-wrap">
                                    <?php if(has_post_thumbnail()) { ?>
                                        <div class="ch-post-thumbnail">
                                            <?php the_post_thumbnail(); ?>
                                        </div><!-- .ch-post-thumbnail -->
                                    <?php }
                                } else { ?>
                                    <div class="ch-post-wrap" <?php if(has_post_thumbnail()){ ?> style="background-image:url('<?php echo esc_url($highlight_bg_image_url);?>');" <?php } ?>>
                                    <?php } ?>
                                    <div class="ch-post-summary">
                                        <header class="entry-header">
                                            <?php if ( $tags_list ) { ?>
                                                <div class="entry-tag">
                                                    <?php euphoric_tag_lists (); ?>
                                                </div>
                                            <?php }
                                            if($remove_category_highlight_link !=0){ ?>
                                                <h2 class="entry-title"><?php the_title(); ?></h2>
                                            <?php } else { ?>
                                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            <?php } ?>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                         <?php
                                            the_content(esc_attr($excerpt_text));
                                        ?>
                                        </div><!-- .entry-content -->
                                    </div><!-- .ch-post-summary -->
                                </div><!-- .ch-post-wrap -->
                            </div><!-- .ch-column-inner -->
                        </div><!-- .ch-column -->
                        <?php
                        
                        $i ++;
                    endwhile;
                    wp_reset_postdata(); ?>
                </div><!-- .ch-row -->
            </div><!-- .wrap -->
        </div><!-- .category-highlight -->

   <?php } 
    }
}

}

add_action('euphoric_frontend_hightlight_category','euphoric_hightlight_category');