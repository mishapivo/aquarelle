<?php
/**
 * The template for displaying the footer
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package EleMate
 * @since 1.0.0
 * @version 1.0.0
 */
 ?>

<footer class="page-footer">
    <?php get_sidebar( 'footer' ); ?>
    
	<div class="footer-copyright">
		<div class="container center">
			<?php do_action( 'elemate_footer_elements' ); ?>
		</div>
    </div>
</footer>

<?php wp_footer(); ?>
  </body>
</html>