<?php
defined( 'ABSPATH' ) || exit;

if (wp_script_is('quicktags')){
  ?>
<script type="text/javascript">
 QTags.addButton( 'heading-2', '<?php esc_html_e( 'h2', 'simple-days' ); ?>', '<h2>', '</h2>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>2', 1001 );
 QTags.addButton( 'heading-3', '<?php esc_html_e( 'h3', 'simple-days' ); ?>', '<h3>', '</h3>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>3', 1002 );
 QTags.addButton( 'heading-4', '<?php esc_html_e( 'h4', 'simple-days' ); ?>', '<h4>', '</h4>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>4', 1003 );
 QTags.addButton( 'heading-5', '<?php esc_html_e( 'h5', 'simple-days' ); ?>', '<h5>', '</h5>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>5', 1004 );
 QTags.addButton( 'heading-6', '<?php esc_html_e( 'h6', 'simple-days' ); ?>', '<h6>', '</h6>', '', '<?php esc_html_e( 'Heading ', 'simple-days' ); ?>6', 1005 );
 QTags.addButton( 'notification-info', '<?php esc_html_e( 'BOX (info)', 'simple-days' ); ?>', '<div class="alert_box_s_d info_s_d box_shadow">', '</div>', '', '<?php esc_html_e( 'Notification', 'simple-days' ); ?>', 1010 );
 QTags.addButton( 'notification-success', '<?php esc_html_e( 'BOX (Success)', 'simple-days' ); ?>', '<div class="alert_box_s_d success_s_d box_shadow">', '</div>', '', '<?php esc_html_e( 'Notification', 'simple-days' ); ?>', 1011 );
 QTags.addButton( 'notification-alert', '<?php esc_html_e( 'BOX (Warning)', 'simple-days' ); ?>', '<div class="alert_box_s_d warning_s_d box_shadow">', '</div>', '', '<?php esc_html_e( 'Notification', 'simple-days' ); ?>', 1012 );
 QTags.addButton( 'notification-danger', '<?php esc_html_e( 'BOX (Danger)', 'simple-days' ); ?>', '<div class="alert_box_s_d danger_s_d box_shadow">', '</div>', '', '<?php esc_html_e( 'Notification', 'simple-days' ); ?>', 1013 );
 <?php if( get_theme_mod( 'simple_days_highlight' , false)){ ?>
   QTags.addButton( 'pre-code', '<?php esc_html_e( 'pre code', 'simple-days' ); ?>', '<pre><code>', '</code></pre>', '', '<?php esc_html_e( 'Code', 'simple-days' ); ?>', 1020 );
 <?php } ?>
</script>
<?php
}
