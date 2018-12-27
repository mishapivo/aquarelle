<?php
$navbar_class = '';
if ( get_theme_mod( 'seabadgermd_navbar_fixing', 'on' ) === 'on' &&
! get_theme_mod( 'navbar_remove', false ) ) {
	$navbar_class .= ' fixed-top scrolling-navbar';
	if ( get_theme_mod( 'seabadgermd_navbar_transparent', true ) ) {
		$navbar_class .= ' autohide';
	}
}

$color_theme_conf = seabadgermd_get_color_theme( get_theme_mod( 'seabadgermd_color_theme' ) );
if ( 'dark' === $color_theme_conf['style'] ) {
	$navbar_class .= ' navbar-dark';
}
?>
<!--Navbar-->
<?php if ( ! get_theme_mod( 'seabadgermd_navbar_remove', false ) ) : ?>
<nav id="main-navbar" class="navbar navbar-expand-lg themecolor<?php echo esc_attr( $navbar_class ); ?>" role="navigation">
	<div class="container">
		<!-- Navbar brand -->
		<?php
		if ( get_theme_mod( 'seabadgermd_navbar_brand', 'off' ) !== 'off' ) {
			switch ( get_theme_mod( 'seabadgermd_navbar_brand', 'off' ) ) {
				case 'logo':
					if ( has_custom_logo() ) {
						$site_logo_id = get_theme_mod( 'custom_logo' );
						$image        = wp_get_attachment_image_src( $site_logo_id, 'thumbnail' );
						$navbar_brand = sprintf( '<img src="%s" class="img-fluid navbar-brand-logo" alt="%s">', $image[0],
						esc_html__( 'Home', 'seabadgermd' ) );
					} else {
						$navbar_brand = '';
					}
					break;
				case 'title':
					$navbar_brand = esc_html( get_bloginfo( 'name' ) );
					break;
				case 'custom':
					$navbar_brand = esc_html( get_theme_mod( 'seabadgermd_navbar_brand_text', get_bloginfo( 'name' ) ) );
					break;
				case 'custom_logo':
					$id = get_theme_mod( 'seabadgermd_navbar_brand_logo', 0 );
					if ( 0 !== $id ) {
						$src          = esc_url( wp_get_attachment_url( $id ) );
						$navbar_brand = sprintf( '<img src="%s" class="img-fluid navbar-brand-logo" alt="%s">',
							$src,
							esc_html__( 'Home', 'seabadgermd' )
						);
					}
					break;
				default:
					$navbar_brand = '[' . esc_html( get_bloginfo( 'name' ) ) . ']';
			}
			printf( '<a class="navbar-brand" href="%s">%s</a>',
				esc_url( get_site_url() ),
				$navbar_brand
			);
		}
		?>
			<!-- Collapse button -->
			<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
			aria-expanded="false"
			aria-label="<?php esc_attr_e( 'Toggle navigation', 'seabadgermd' ); ?>">
			<span class="navbar-toggler-icon themecolor"></span></button>
			<!-- Collapsible content -->
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<?php
					if ( has_nav_menu( 'navbar' ) ) {
						wp_nav_menu(
							array(
								'menu'           => 'navbar',
								'theme_location' => 'navbar',
								'depth'          => 2,
								'menu_class'     => 'navbar-nav mr-auto',
								'fallback_cb'    => '__return_false',
								'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								'container'      => false,
								'walker'         => new Seabadgermd_Menuwalker(),
							)
						);
					} else {
						if ( current_user_can( 'edit_theme_options' ) ) {
							esc_html_e( 'Please assign Navbar Menu in WordPress Admin -> Appearance -> Menus -> Manage Locations', 'seabadgermd' );
						}
					}
					?>

				</ul>
				<?php
				if ( get_theme_mod( 'seabadgermd_navbar_search', 'show' ) === 'show' ) :
					$s = array_key_exists( 's', $_GET ) ? htmlspecialchars( $_GET['s'] ) : '';
				?>
				<?php get_search_form(); ?>
				<?php endif ?>
				</div>
			</div>
		</div>
	</nav>
<?php endif; ?>
<!--/Navbar-->
