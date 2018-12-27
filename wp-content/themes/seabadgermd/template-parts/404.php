<div class="row">
    <div class="card col-xs-12 col-md-8 offset-md-2">
        <img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/404.png">
        <div class="card-body">
            <h4 class="card-title">
                <?php esc_html_e( '404 - Not found', 'seabadgermd' ); ?>
            </h4>
            <p class="card-text">
                <?php
                    esc_html_e(
                        'Sorry, the content you are looking for is not available.
                        Best I can offer you is this search bar. 
                        Please feel free to use it and hope you will find what you are looking for.', 'seabadgermd'
                    );
                ?>
            </p>
            <p class="card-text">
                <?php get_search_form(); ?>
            </p>
        </div>
    </div>
</div>