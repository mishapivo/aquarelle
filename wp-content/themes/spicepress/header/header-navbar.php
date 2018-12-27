<?php 
$header_one_name = get_theme_mod('header_one_name','');
$header_one_text = get_theme_mod('header_one_text','');
if ( get_header_image() != '') {?>
<header class="custom-header">	
	
	<div class="wp-custom-header">
		<img src="<?php header_image(); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" alt="" />
	</div>
	
	<div class="container header-content">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="">
					<?php if($header_one_name != '') { ?>
					<h1><?php echo esc_html($header_one_name);?></h1>
					<?php }  if($header_one_text != '') { ?>
					<h3><?php echo esc_html($header_one_text);?></h3>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	
</header>
<?php } ?>

<!--Logo & Menu Section-->	
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<?php the_custom_logo(); ?>
            <?php  if ( display_header_text() ) : ?>
			<div class="site-branding-text">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>
				<?php
				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo esc_html($description); ?></p>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php echo esc_html__('Toggle navigation','spicepress'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div id="navbar" class="collapse navbar-collapse in">
					<?php wp_nav_menu( array(
								'theme_location' => 'primary',
								'container'  => 'nav-collapse collapse navbar-inverse-collapse',
								'menu_class' => 'nav navbar-nav navbar-right',
								'fallback_cb' => 'spicepress_fallback_page_menu',
								'walker' => new spicepress_nav_walker() 
							) ); 
						?>
				
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>	
<!--/Logo & Menu Section-->	

<div class="clearfix"></div>