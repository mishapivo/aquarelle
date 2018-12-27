<?php
  defined( 'ABSPATH' ) || exit;
  
?>
<link rel="amphtml" href="<?php global $wp; echo esc_url(home_url( add_query_arg( array(), $wp->request ) )); ?>?amp=1" />
