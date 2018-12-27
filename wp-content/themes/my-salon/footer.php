<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package my_salon
 */

/**
 * My Salon Footer
 * 
 * @see my_salon_after_content - 10
*/
do_action( 'my_salon_after_content' );

/**
 * My Salon Footer
 * 
 * @see my_salon_footer_start  - 20
 * @see my_salon_footer_widgets    - 30
 * @see my_salon_footer_credit - 40
 * @see my_salon_footer_end    - 50
*/
do_action( 'my_salon_footer' );
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
