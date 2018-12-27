<?php
/**
 * The Sidebar containing the footer widget areas.
 *
 * @package CodeVibrant
 * @subpackage Enrollment
 * @since 1.0.0
 */
?>

<?php
/**
 * The footer widget area is triggered if any of the areas
 * have widgets. So let's check that first.
 *
 * If none of the sidebars have widgets, then let's bail early.
 */
 
if( !is_active_sidebar( 'enrollment_footer_sidebar' ) &&
	!is_active_sidebar( 'enrollment_footer_sidebar-2' ) &&
    !is_active_sidebar( 'enrollment_footer_sidebar-3' ) &&
    !is_active_sidebar( 'enrollment_footer_sidebar-4' ) ) {
	   return;
}
$enrollment_footer_layout = get_theme_mod( 'enrollment_footer_widget_layout', 'column_three' );
?>
<div id="top-footer" class="footer-widgets-wrapper footer_<?php echo esc_attr( $enrollment_footer_layout ); ?> clearfix">
    <div class="cv-container">
        <div class="footer-widgets-area clearfix">
            <div class="cv-footer-widget-wrapper cv-column-wrapper clearfix">
          		<div class="enrollment-footer-widget wow fadeInLeft" data-wow-duration="0.5s">
          			<?php
              			if ( !dynamic_sidebar( 'enrollment_footer_sidebar' ) ):
              			endif;
          			?>
          		</div>
      		    <?php if( $enrollment_footer_layout != 'column_one' ){ ?>
                <div class="enrollment-footer-widget wow fadeInLeft" data-woww-duration="1s">
          		<?php
          			if ( !dynamic_sidebar( 'enrollment_footer_sidebar-2' ) ):
          			endif;
          		?>
          		</div>
                <?php } ?>
                <?php if( $enrollment_footer_layout == 'column_three' || $enrollment_footer_layout == 'column_four' ){ ?>
                <div class="enrollment-footer-widget wow fadeInLeft" data-wow-duration="1.5s">
                <?php
                    if ( !dynamic_sidebar( 'enrollment_footer_sidebar-3' ) ):
                    endif;
                ?>
                </div>
                <?php } ?>
                <?php if( $enrollment_footer_layout == 'column_four' ){ ?>
                <div class="enrollment-footer-widget wow fadeInLeft" data-wow-duration="2s">
                <?php
                    if ( !dynamic_sidebar( 'enrollment_footer_sidebar-4' ) ):
                    endif;
                ?>
                </div>
            <?php } ?>
            </div><!-- .cv-footer-widget-wrapper -->
        </div><!-- .footer-widgets-area -->
    </div><!-- .cv-container -->
</div><!-- .footer-widgets-wrapper -->