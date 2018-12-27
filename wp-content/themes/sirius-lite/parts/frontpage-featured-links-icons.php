<?php
$sirius_frontpage_order = sirius_get_option('sirius_frontpage_order');
if (in_array('frontpage_section_order_featured_links_icons', $sirius_frontpage_order)) {
?>

<?php
$sirius_frontpage_featured_link_icons_section_id = sirius_get_option('sirius_frontpage_featured_link_icons_section_id');
$sirius_frontpage_featured_link_icons_background_color = sirius_get_option('sirius_frontpage_featured_link_icons_background_color');

$sirius_frontpage_featured_link_icons_heading = sirius_get_option('sirius_frontpage_featured_link_icons_heading');
$sirius_frontpage_featured_link_icons_text = sirius_get_option('sirius_frontpage_featured_link_icons_text');

$sirius_frontpage_featured_link_icons = sirius_get_option('sirius_frontpage_featured_link_icons');
?>

<section id="<?php echo esc_attr($sirius_frontpage_featured_link_icons_section_id); ?>" <?php if($sirius_frontpage_featured_link_icons_background_color != '') { ?>style="background-color:<?php echo esc_attr($sirius_frontpage_featured_link_icons_background_color); ?>" <?php } ?> class="frontpage-featured-link-icons">
    <div class="container">
        
        <?php if($sirius_frontpage_featured_link_icons_heading != '') { ?>
        <h2 class="text-center <?php sirius_animate('zoomIn'); ?>"><?php echo esc_html($sirius_frontpage_featured_link_icons_heading); ?></h2>
        <?php } ?>
        
        <?php if($sirius_frontpage_featured_link_icons_text != '') { ?>
        <div class="section-description text-center <?php sirius_animate('zoomIn'); ?>"><?php echo wp_kses_post($sirius_frontpage_featured_link_icons_text); ?></div>
        <?php } ?>
        
        <?php 
        $n = count($sirius_frontpage_featured_link_icons); 
        if($n>0 && $sirius_frontpage_featured_link_icons) { 
        if($n % 4 == 0) {$class='col-md-3'; $num=4;} else {$class='col-md-4'; $num=3;}
        ?>
        
            <?php 
            global $post; $temp = $post; $i=0;
            foreach($sirius_frontpage_featured_link_icons as $item){
            $page  = $item['sirius_frontpage_featured_link_icons_page'];
            $icon  = $item['sirius_frontpage_featured_link_icons_icon'];
            $color = $item['sirius_frontpage_featured_link_icons_color'] == '' ? 
                        sirius_get_option('sirius_frontpage_featured_link_icons_icon_fallback_color') : $item['sirius_frontpage_featured_link_icons_color']; 
            $post = get_post( $page ); if($post) { setup_postdata( $post ); ?>
            <?php if($i%$num == 0) { ?><div class="row"><?php } ?>
            <div class="<?php echo $class ?> <?php sirius_animate('fadeIn'); ?>">
                <div class="simple-icon">
                    <a href="<?php the_permalink(); ?>" class="simple-icon-icon" style="color:<?php echo esc_attr($color); ?>"><i class="fa <?php echo esc_attr($icon); ?>"></i></a>
                    <h3 class="simple-icon-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="simple-icon-summary"><?php the_excerpt(); ?></div>
                </div>
            </div>
            <?php if(($i+1)%$num == 0) { ?></div><?php } ?>
            <?php $i++; } } wp_reset_postdata(); $post = $temp; ?>
        
        <?php } ?>
        
    </div>
</section>

<?php } ?>