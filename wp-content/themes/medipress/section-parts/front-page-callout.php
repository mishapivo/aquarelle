  <?php 
// To display Footer Call Out section on front page
?>
<?php
$medipress_contact_section_hideshow = get_theme_mod('medipress_contact_section_hideshow','hide');
if ($medipress_contact_section_hideshow =='show') { ?>
<?php $ctah_btn_text = get_theme_mod('ctah_btn_text'); ?> 


<!-- Start cloud Section -->

    <section class="info-section medical-info-section">
        <div class="container zindex">
            <h2 class="info-title"><?php echo esc_html(get_theme_mod('ctah_heading')); ?></h2>
            <span class="info-sub-title"><?php echo esc_html(get_theme_mod('ctah_subtitle')); ?></span>
            <?php if (!empty($ctah_btn_text)) { ?>
            <div class="popup-section">
                <a href="<?php echo esc_url(get_theme_mod('ctah_btn_url')); ?>" class="medical-patient colud-btn"><?php echo esc_html($ctah_btn_text); ?></a>
            </div>
             <?php } ?>

        </div>
        <div class="clip">
            <div class="bg bg-bg" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>></div>
        </div>
        <div class="overlay"></div>
    </section>

<?php } ?>