<?php
/**
* Displays a Hero / jumbotron based on the header configuration
*/
$header_image = get_header_image();
$text_color   = get_header_textcolor();

if ( 'blank' === $text_color && ! has_custom_logo() && ! $header_image ) {
	return;
}

if ( preg_match( '/^[0-9a-fA-F]{6}$/', $text_color ) ) {
	$text_color = '#' . $text_color;
}

$hero_style = '';
if ( 'blank' !== $text_color ) {
	$hero_style .= 'color:' . $text_color . ';';
}
if ( $header_image ) {
	$hero_style .= 'background-image: url(\'' . esc_url( $header_image ) . '\');';
	$hero_style .= 'background-size: cover;';
}
if ( 'blank' === $text_color && ! has_custom_logo() ) {
	$hero_style .= 'min-height: 150px;';
}

?>
<div class="container hero">
	<div class="jumbotron row" style="<?php echo $hero_style; ?>">
		<div class="col-xs-12 col-md-10" style="color:<?php echo esc_attr( $text_color ); ?>!important">
		<?php if ( 'blank' !== $text_color ) : ?>
			<h1 class="hero-title">
				<a href="<?php echo esc_url( get_site_url() ); ?>" style="color:<?php echo esc_attr( $text_color ); ?>">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h1>
			<p class="lead hero-description"><?php bloginfo( 'description' ); ?></p>
		<?php endif; ?>
		</div>
		<?php
		if ( has_custom_logo() ) {
		?>
		<div class="col-xs-12 col-md-2 text-center hero-logo">
			<?php
			$custom_logo = get_custom_logo();
			if ( preg_match( '/class=/', $custom_logo ) ) {
				$custom_logo = str_replace( 'class="', 'class="img-fluid ', $custom_logo );
			} else {
				$custom_logo = str_replace( '<img', '<img class="img-fluid"', $custom_logo );
			}
			echo $custom_logo;
			?>
		</div>
		<?php
		}
		?>
	</div>
</div>
