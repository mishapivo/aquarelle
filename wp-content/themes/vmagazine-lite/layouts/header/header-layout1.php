	<?php
/**
 * Header layout 1
 *
 * @package AccessPress Themes
 * @subpackage vmagazine-lite
 * @since 1.0.0
 */

$vmagazine_lite_header_icon_show = get_theme_mod('vmagazine_lite_header_icon_show','hide');
$vmagazine_lite_header_search_enable = get_theme_mod('vmagazine_lite_header_search_enable','show');

$top_men_class = ( $vmagazine_lite_header_icon_show == 'hide' ) ? 'menu-full' : 'menu-half';
?>

<header id="masthead" class="site-header header-layout1">

<?php if( has_nav_menu('top_menu') || $vmagazine_lite_header_icon_show == 'show' || $vmagazine_lite_header_search_enable == 'show' ): ?>
	<div class="vmagazine-lite-top-header clearfix <?php echo esc_attr($top_men_class);?>">
		<div class="vmagazine-lite-container">
			
			<div class="top-men-wrap">
				
				<div class="top-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'top_menu','container_class'=>'top-men-wrapp', 'menu_id' => 'top-menu', 'fallback_cb' => 'false','depth' => '1' ) ); ?>
				</div>
				
				<?php 
				if( $vmagazine_lite_header_icon_show == 'show' ):
				 ?>
					<div class="top-left">
						<?php echo vmagazine_lite_social_icons(); // WPCS: XSS OK.?>
					</div>
			<?php endif; ?>
			</div>
			<?php if( $vmagazine_lite_header_search_enable == 'show'  ){ ?>
			<div class="top-right">
				<div class="vmagazine-lite-search-form-primary"><?php get_search_form(); ?></div>
				<div class="search-content"></div>
				<div class="block-loader" style="display:none;">
            		<div class="sampleContainer">
					    <div class="loader">
					        <span class="dot dot_1"></span>
					        <span class="dot dot_2"></span>
					        <span class="dot dot_3"></span>
					        <span class="dot dot_4"></span>
					    </div>
					</div>
        		</div>
			</div>	
		<?php }; ?>
		
		</div>
	</div><!-- .vmagazine-lite-top-header -->
<?php endif; ?>	

	<div class="logo-ad-wrapper clearfix">
		<div class="vmagazine-lite-container">
			<div class="site-branding">					
				<?php the_custom_logo(); ?>
				<div class="site-title-wrapper">
					<?php
					if ( is_front_page() || is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php
					endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
					<?php
					endif; ?>
				</div>
			</div><!-- .site-branding -->
				<?php
		        	if( is_active_sidebar( 'vmagazine_lite_header_ads_area' ) ) { ?>
		        	<div class="header-ad-wrapper">
		        		<?php 
		            	if ( !dynamic_sidebar( 'vmagazine_lite_header_ads_area' ) ):
		            	endif;
		            	?>
		            </div><!-- .header-ad-wrapper -->
		            <?php } ?>
		</div><!-- .vmagazine-lite-container -->
	</div><!-- .logo-ad-wrapper -->
    <?php echo vmagazine_lite_nav_header(); // WPCS: XSS OK.?>
   
    <?php do_action('vmagazine_lite_news_ticker'); ?>
</header><!-- #masthead -->
