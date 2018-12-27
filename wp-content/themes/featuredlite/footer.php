<?php
/**
* The template for displaying the footer
*/
?>
<?php $back_to_top = get_theme_mod('featuredlite_backtotop_disable');?>
<input type="hidden" id="back-to-top" value="<?php echo $back_to_top?>"/> 
<?php get_sidebar('footer'); ?>
</div>
<div class="footer-copyright">
<div class="container">
	<ul>
		<li class="copyright">
			<?php if( get_theme_mod('copyright_textbox')!=''){
				echo esc_html(get_theme_mod( 'copyright_textbox'));
			} else { ?>
			<span class="text-footer">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<a href="<?php echo esc_url( __( 'https://themehunk.com/', 'featuredlite' ) ); ?>"><?php printf( __('Powered by %s', 'featuredlite' ), 'ThemeHunk' ); ?></a>
			</span>
			<?php } ?>
		</li>
		<li class="social-icon">
			<?php
			if(get_theme_mod('footer_on_social','social_on')=='social_on'):  ?>
			<?php featuredlite_social_links(); ?>
			<?php endif; ?>
		</li>
	</ul>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>