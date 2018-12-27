<?php
/**
 * Search
 *
 * @package bbPress
 * @subpackage Theme
 */
?>

<form action="<?php bbp_search_url(); ?>" method="get" class="search-form">
    <label>
        <input type="hidden" name="action" value="bbp-search-request"/>
        <input type="text" tabindex="<?php bbp_tab_index(); ?>" class="form-control"
               value="<?php echo esc_attr( bbp_get_search_terms() ); ?>"
               placeholder="<?php esc_html_e( 'Search forum', 'evolve' ); ?>" name="bbp_search" id="bbp_search" />

		<?php echo evolve_get_svg( 'search' ); ?>

        <button class="search-button" tabindex="<?php bbp_tab_index(); ?>" type="submit"></button>
    </label>
</form>
