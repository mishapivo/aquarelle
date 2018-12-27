<?php
	$free_plugins = $this->free_plugins;

	if(!empty($free_plugins)) {
		?>
		<h4 class="recomplug-title"><?php echo esc_html__('Recommended Plugins', 'total'); ?></h4>
		<p><?php echo esc_html__('Please Install all the plugins. Although these plugins are complementary, we encourage to install theme to use the theme to full extent', 'total'); ?></p>
		<div class="recomended-plugin-wrap">
		<?php
		foreach($free_plugins as $plugin) {
			$slug = $plugin['slug'];
			$name = $plugin['name'];
			$filename = $plugin['filename'];
			?>
				<div class="recom-plugin-wrap">
					<div class="plugin-img-wrap">
						<img src="<?php echo esc_url('https://ps.w.org/'. esc_attr($slug) .'/assets/icon-256x256.png') ?>" />
					</div>

					<div class="plugin-title-install clearfix">
						<span class="title">
							<?php echo esc_html($name); ?>	
						</span>

						<span class="plugin-btn-wrapper">
							<?php 
							if ( $this->total_check_installed_plugin( $slug, $filename ) && !$this->total_check_plugin_active_state( $slug, $filename ) ) : ?>
								<a target="_blank" href="<?php echo esc_url($this->total_plugin_generate_url('active', $slug, $filename)) ?>" class="button button-primary"><?php esc_html_e( 'Activate', 'total' ); ?></a>
							<?php 
							elseif( $this->total_check_installed_plugin( $slug, $filename ) ) : ?>
								<button type="button" class="button button-disabled" disabled="disabled"><?php esc_html_e( 'Installed', 'total' ); ?></button>
							<?php 
							else : ?>
								<a target="_blank" class="install-now button-primary" href="<?php echo esc_url($this->total_plugin_generate_url('install', $slug, $filename)) ?>" >
								<?php esc_html_e( 'Install Now', 'total' ); ?></a>							
							<?php 
							endif; ?>
						</span>
					</div>
				</div>
			<?php
		} ?>
		</div>
	<?php
	}