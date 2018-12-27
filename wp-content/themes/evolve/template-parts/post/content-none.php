<?php

/*
   Displays No Content
   ======================================= */

?>

    <h1 class="display-4"><?php _e( 'Nothing To Show Yet', 'evolve' ); ?></h1>

<?php if ( ( is_home() || is_archive() ) && current_user_can( 'publish_posts' ) ) : ?>

    <p class="lead"><?php _e( 'Get started with your website', 'evolve' ); ?></p>

	<?php printf( __( '<a href="%1$s" class="btn btn-lg mb-5">Publish your first post</a>', 'evolve' ), esc_url( admin_url( 'post-new.php' ) ) ); ?>

<?php else : ?>

    <p class="lead"><?php _e( 'Sorry, but you are looking for something that isn\'t here or it\'s been moved. Try a search?', 'evolve' ); ?></p>

    <div class="search-full-width">

		<?php get_search_form(); ?>

    </div><!-- .search-full-width -->

<?php endif;



