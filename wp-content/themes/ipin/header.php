<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title( '|', true, 'right' );	bloginfo( 'name' );	$site_description = get_bloginfo( 'description', 'display' ); if ($site_description && (is_home() || is_front_page())) echo " | $site_description"; ?></title>

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
	    
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--[if IE 7]>
	  <link href="<?php echo get_template_directory_uri(); ?>/css/font-awesome-ie7.css" rel="stylesheet">
	<![endif]-->
    
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<noscript>
		<style>
		#masonry {
		visibility: visible !important;	
		}
		</style>
	</noscript>
	
	<div id="topmenu" class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<i class="icon-bar"></i>
					<i class="icon-bar"></i>
					<i class="icon-bar"></i>
				</a>

				<?php $logo = of_get_option('logo'); ?>
				<a class="brand<?php if ($logo != '') { echo ' logo'; } ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
				<?php if ($logo != '') { ?>
					<img src="<?php echo $logo ?>" alt="Logo" />
				<?php } else {
					bloginfo('name');
				}
				?>
				</a>

				<nav id="nav-main" class="nav-collapse" role="navigation">
					<?php 
					if (has_nav_menu('top_nav')) {
						wp_nav_menu(array('theme_location' => 'top_nav', 'menu_class' => 'nav'));
					} else {
						echo '<ul id="menu-top-menu" class="nav">';
						wp_list_pages('title_li=&depth=0&sort_column=menu_order' );
						echo '</ul>';
					}
					?>
					
					<form class="navbar-search pull-right" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
						<input type="text" class="search-query" placeholder="<?php _e('Search', 'ipin'); ?>" name="s" id="s" value="<?php the_search_query(); ?>">
					</form>
					
					<a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Subscribe to our RSS Feed', 'ipin'); ?>" class="topmenu-social pull-right"><i class="icon-rss icon-large"></i></a>

					<?php if ('' != $twitter_icon_url = of_get_option('twitter_icon_url')) { ?>
					<a href="<?php echo $twitter_icon_url; ?>" title="<?php _e('Follow us on Twitter', 'ipin'); ?>" class="topmenu-social pull-right"><i class="icon-twitter icon-large"></i></a>
					<?php } ?>
					
					<?php if ('' != $facebook_icon_url = of_get_option('facebook_icon_url')) { ?>
					<a href="<?php echo $facebook_icon_url; ?>" title="<?php _e('Find us on Facebook', 'ipin'); ?>" class="topmenu-social pull-right"><i class="icon-facebook icon-large"></i></a>
					<?php } ?>
				</nav>
			</div>
		</div>
	</div>
	
	<?php if (is_search() || is_category() || is_tag()) { ?>
	<div class="subpage-title container-fluid">
		<div class="row-fluid">
			<div class="span4 hidden-phone"></div>
			<div class="span4">
				<?php if(is_search()) { ?>
					<h1><?php _e('Search results for', 'ipin'); ?> "<?php the_search_query(); ?>"</h1>
					<?php if (category_description()) { ?>
						<?php echo category_description(); ?>
					<?php } ?>
				<?php } ?>
				
				<?php if(is_category()) { ?>
					<h1><?php single_cat_title(); ?></h1>
					<?php if (category_description()) { ?>
						<?php echo category_description(); ?>
					<?php } ?>
				<?php } ?>
				
				<?php if(is_tag()) { ?>
					<h1><?php _e('Tag:', 'ipin'); ?> <?php single_tag_title(); ?></h1>
					<?php if (tag_description()) { ?>
						<?php echo tag_description(); ?>
					<?php } ?>
				<?php } ?>
			</div>
			<div class="span4"></div>
		</div>
	</div>
	<?php } ?>