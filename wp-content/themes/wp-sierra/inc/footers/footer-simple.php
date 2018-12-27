
<div class="footer simple-footer">

		<div class="container">

		<div class="row">
			<div class="col-md-12">
				<?php
				$footer_logo = get_theme_mod( 'footer_logo' );
				$copyright_select = get_theme_mod( 'copyright_select', 'auto' );
				$copyright_description = get_theme_mod( 'copy_description' );
				if ( get_theme_mod( 'footer_logo_width' ) ) {
					$logo_width = 'width=' . esc_attr( get_theme_mod( 'footer_logo_width' ) ) . '';
				} else {
					$logo_width = null;
				}
				?>

					<?php if ( ! empty( $footer_logo ) ) : ?>
					<div class="footer-logo">
						<a href="<?php echo esc_url( home_url() ); ?>">
							<img src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>" <?php echo esc_attr( $logo_width ); ?>>
						</a>
					</div><!--/.footer-logo -->
					<?php endif; ?>

					<?php
					if ( has_nav_menu( 'footer-menu' ) ) {
							wp_nav_menu(
								array(
									'theme_location' => 'footer-menu',
									'menu_class' => 'menu footer-menu',
									'container'  => 'false',
								)
							);
					}
					?>
					<?php if ( 'auto' == $copyright_select ) : ?>
					<div class="footer-copyright">
						<?php echo wpsierra_default_copyright(); ?>
					</div>
					<?php elseif ( 'custom' == $copyright_select && ! empty( $copyright_description ) ) : ?>
					<div class="footer-copyright">
						<p><?php echo wp_kses_post( $copyright_description ); ?></p>
					</div>
					<?php endif; ?>


			</div><!-- col-sm-12 -->


		</div><!-- /.row -->
	</div> <!-- /.container -->
</div><!-- /.footer -->
