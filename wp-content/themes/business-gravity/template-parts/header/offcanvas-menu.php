<?php
/** 
* Template for Off canvas Menu
* @since Business Gravity 1.0.0
*/
?>
<div id="offcanvas-menu">
	<div class="close-offcanvas-menu">
		<span class="kfi kfi-close-alt2"></span>
	</div>
	<div class="header-search-wrap">
		<?php get_search_form(); ?>
	</div>
	<?php get_template_part( 'template-parts/header/header', 'callback' ); ?>
	<div id="primary-nav-offcanvas" class="offcanvas-navigation">
		<?php business_gravity_get_menu( 'primary' ); ?>
	</div>
	<?php get_template_part( 'template-parts/header/header', 'contact' ); ?>
	<div class="top-header-right">
		<div class="socialgroup">
			<?php business_gravity_get_menu( 'social' ); ?>
		</div>
		<?php get_template_part('template-parts/header/header', 'cart'); ?>
	</div>
</div>