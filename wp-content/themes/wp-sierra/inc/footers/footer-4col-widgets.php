
<div class="footer">

	<div class="container">

		<div class="row">

			<div class="col-md-3 col-xs-12">
			<?php if ( dynamic_sidebar( 'footer-one' ) ) :
			else :
			?>
				<div class="widget">
					<h3 class="widget-title-style"><?php esc_html_e( 'Footer One', 'wp-sierra' ); ?></h3>
					<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
							<p><?php esc_html_e( 'Please add your widget here.', 'wp-sierra' ); ?></p>
					</a>
				</div>

			<?php endif; ?>

		</div><!-- col-sm-2 -->

			<div class="col-md-3 col-xs-12">
			<?php if ( dynamic_sidebar( 'footer-two' ) ) : ?>
			<?php else : ?>

				<div class="widget">
					<h3 class="widget-title-style"><?php esc_html_e( 'Footer Two', 'wp-sierra' ); ?></h3>
					<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
							<p><?php esc_html_e( 'Please add your widget here.', 'wp-sierra' ); ?></p>
					</a>
				</div>

			<?php endif; ?>
		</div><!-- col-sm-2 -->

			<div class="col-md-3 col-xs-12">
			<?php if ( dynamic_sidebar( 'footer-three' ) ) : ?>
			<?php else : ?>

				<div class="widget">
					<h3 class="widget-title-style"><?php esc_html_e( 'Footer Three', 'wp-sierra' ); ?></h3>
					<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
							<p><?php esc_html_e( 'Please add your widget here.', 'wp-sierra' ); ?></p>
					</a>
				</div>

				<?php endif; ?>
			</div><!-- col-sm-2 -->

			<div class="col-md-3 col-xs-12">
				<?php if ( dynamic_sidebar( 'footer-four' ) ) : ?>
				<?php else : ?>

				<div class="widget">
						<h3 class="widget-title-style"><?php esc_html_e( 'Footer Four', 'wp-sierra' ); ?></h3>
						<a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>">
								<p><?php esc_html_e( 'Please add your widget here.', 'wp-sierra' ); ?></p>
						</a>
				</div>

			<?php endif; ?>
		</div><!-- col-sm-2 -->

		</div><!-- /.row -->
	</div> <!-- /.container -->
</div><!-- /.footer -->
