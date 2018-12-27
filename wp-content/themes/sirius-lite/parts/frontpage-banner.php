<?php $sirius_frontpage_banner = 'Banner'; ?>

<?php /* Banner */
if($sirius_frontpage_banner == 'Banner') { 
    $header_image = get_header_image(); 
    if($header_image != '') {
        $sirius_banner_heading = sirius_get_option('sirius_banner_heading');
        $sirius_banner_description = sirius_get_option('sirius_banner_description');
        $sirius_banner_button_1_label = sirius_get_option('sirius_banner_button_1_label');
        $sirius_banner_button_1_url = sirius_get_option('sirius_banner_button_1_url');
        $sirius_banner_button_2_label = sirius_get_option('sirius_banner_button_2_label');
        $sirius_banner_button_2_url = sirius_get_option('sirius_banner_button_2_url'); ?>
        <section id="frontpage-banner">
            <img src="<?php echo esc_url($header_image) ?>" class="banner-image" alt="<?php echo esc_attr($sirius_banner_heading); ?>" />
            <div class="carousel-caption">
                <div class="container">
                    <div class="carousel-caption-inner">
                        <?php if($sirius_banner_heading != '') { ?><h2 class="carousel-title"><?php echo esc_html($sirius_banner_heading); ?></h2><?php } ?>
                        <?php if($sirius_banner_description != '') { ?><p class="carousel-description"><?php echo wp_kses_post($sirius_banner_description); ?></p><?php } ?>
                        <?php if($sirius_banner_button_1_url != '' || $sirius_banner_button_2_url != '') { ?>
                        <p class="carousel-buttons">
                            <?php if($sirius_banner_button_1_url != '') { ?><a href="<?php echo esc_url($sirius_banner_button_1_url); ?>" class="btn btn-blue"><?php echo esc_html($sirius_banner_button_1_label); ?></a><?php } ?>
                            <?php if($sirius_banner_button_2_url != '') { ?><a href="<?php echo esc_url($sirius_banner_button_2_url); ?>" class="btn btn-blue alt"><?php echo esc_html($sirius_banner_button_2_label); ?></a><?php } ?>
                        </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php } ?>
<?php } ?>