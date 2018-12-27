<div class="container-fluid footer-copyright" >
	<div class="container">
		<div class="row">

			<div class="col-md-4 cprtlft_ctmzr">
				<?php
				echo wp_kses_post( get_theme_mod( 'left_footer_setting', '<p>' . __( 'Site Title, Some rights reserved.', 'di-blog' ) . '</p>' ) );
				?>
			</div>

			<div class="col-md-4 cprtcntr_ctmzr">
				<?php
				echo wp_kses_post( get_theme_mod( 'center_footer_setting', '<p><a href="#">' . __( 'Terms of Use - Privacy Policy', 'di-blog' ) . '</a></p>' ) );
				?>
			</div>

			<div class="col-md-4 cprtrgt_ctmzr">
				<?php do_action( 'di_blog_footer_copyright_right_setting_front' ); ?>
			</div>

		</div>
	</div>
</div>