<?php
/**
 * Displays header site branding
 *
 * @package business-land
 * @version 1.0.6
 */

?>
<ul class="site-branding navbar-items nav pull-left">
	<li class="nav-item">
		<?php if(the_custom_logo()):?>
			<div class="custom-logo">
				<?php the_custom_logo(); ?>
			</div>
		<?php endif; ?>
		<div class="branding-inner-wrap">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-title"><?php bloginfo( 'name' ); ?></a>
			<p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
		</div>
	</li>
</ul><!-- .site-branding -->
