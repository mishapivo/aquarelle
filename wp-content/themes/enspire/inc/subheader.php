<?php if ( is_home() && !is_paged() ): ?>

<?php if ( get_theme_mod( 'header-social', 'on' ) == 'on' ): ?>
<div id="subheader-social">
	<div class="container group">
		<div class="group pad pad-top">
			<?php enspire_social_links() ; ?><h3><?php esc_html_e('Follow:','enspire'); ?></h3>
		</div>
	</div>
</div><!--/#subheader-social-->
<?php endif; ?>

<div class="container group">
	<div class="group pad">
		<?php get_template_part('inc/featured'); ?>
	</div>
</div><!--/.container-->

<?php endif; ?>

<?php if ( get_theme_mod('header-ads') == 'on' ): ?>
<div class="container group">			
	<div id="header-ads">
		<?php dynamic_sidebar( 'header-ads' ); ?>
	</div><!--/#header-ads-->
</div><!--/.container-->
<?php endif; ?>

