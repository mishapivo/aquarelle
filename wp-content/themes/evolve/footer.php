<?php

/*
    Displays Footer
    ======================================= */

/*
    Footer Area

    ---------------------------------------
    Hooked: evolve_content_container_close() - 10
            evolve_footer_container_open() - 20
            evolve_footer_widgets() - 30
            evolve_custom_footer() - 40
            evolve_footer_container_close() - 50
            evolve_back_to_top() - 60
            evolve_wrapper_container_close() - 70
    --------------------------------------- */

do_action( 'evolve_footer_area' );

wp_footer(); ?>

</body>
</html>