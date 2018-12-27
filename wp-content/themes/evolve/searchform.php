<?php

/*
   Displays Search Form
   ======================================= */

?>

<form action="<?php echo home_url(); ?>" method="get" class="search-form">
    <label>
        <input type="text" tabindex="3" name="s" class="form-control"
               placeholder="<?php _e( 'Type your search', 'evolve' ); ?>"/>

		<?php echo evolve_get_svg( 'search' ); ?>

        <button class="search-button" tabindex="4" type="submit"></button>
    </label>
</form>

