<?php

/*
    Displays Header
    ======================================= */ ?>

    <!DOCTYPE html>
<html <?php evolve_html_tag_schema();
language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<?php wp_head(); ?>
    </head>
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">

<a class="btn screen-reader-text sr-only sr-only-focusable"
   href="#primary"><?php _e( 'Skip to main content', 'evolve' ); ?></a>

<?php

/*
    Header Area

    ---------------------------------------
    Hooked: evolve_wrapper_container_open() - 10
            evolve_sticky_header_open() - 20
            evolve_header_block_above() - 30
            evolve_header_type() - 40
            evolve_sticky_header_close() - 50
            evolve_header_block_below() - 60
            evolve_content_container_open() - 70
    --------------------------------------- */

do_action( 'evolve_header_area' );