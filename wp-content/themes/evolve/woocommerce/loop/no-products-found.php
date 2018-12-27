<?php
/**
 * Displayed when no products are found matching the current query
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/no-products-found.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @author        WooThemes
 * @package    WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

    <div class="alert alert-warning mb-5" role="alert">
        <h1 class="page-title"><?php _e( 'No products were found matching your selection', 'evolve' ); ?></h1>
    </div>

<?php echo '<h2 class="display-4">' . __( 'Suggestions', 'evolve' ) . '</h2>
			        <ul class="lead">
		                <li>' . __( 'Make sure all words are spelled correctly.', 'evolve' ) . '</li>
                        <li>' . __( 'Try different keywords.', 'evolve' ) . '</li>
                        <li>' . __( 'Try more general keywords.', 'evolve' ) . '</li>
                    </ul>
                    
                  <div class="search-full-width">';

get_product_search_form();

echo '</div><!-- .search-full-width -->';