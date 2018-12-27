<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Xcel
 */
?>
</div><!-- #content -->

<?php if ( get_theme_mod( 'xcel-setting-footer-layout', false ) == 'xcel-setting-footer-layout-none' ) : ?>

    <?php get_template_part( '/templates/footers/footer-none' ); ?>
    
<?php else : ?>
	
	<?php get_template_part( '/templates/footers/footer-standard' ); ?>
    
<?php endif; ?>

</div>
<?php wp_footer(); ?>
</body>
</html>
