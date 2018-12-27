<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package CPMMagz
 */

?>
<div id="content" class="site-content">
	<div class="container">
		<div class="row">
			<div class="col l8 s12 m12">
				<div id="primary" class="content-area">
					<main class="site-main" id="main" role="main">
						<div class="post-header">
							<div class="card">
								<div class="card-header">
									<h1 class="page-title"><?php esc_html_e('Nothing Found', 'cpmmagz'); ?>
									</h1>
								</div>
							</div>
						</div>
                        <div class="card-desc">
                        	<div class="card-content card-wrapper">
                        		<div class="entry-content clearfix">
                        			<?php if (is_home() && current_user_can('publish_posts')) : ?>

                        				<p><?php printf(wp_kses(esc_attr(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cpmmagz')), array('a' => array( 'href' => array()))), esc_url(admin_url('post-new.php'))); ?></p>

                        			<?php elseif (is_search()) : ?>

                        				<p><?php esc_html_e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cpmmagz'); ?></p>
                        				<?php get_search_form(); ?>

                        			<?php else : ?>

                        				<p><?php esc_html_e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cpmmagz'); ?></p>
                        				<?php get_search_form(); ?>

                        			<?php endif; ?>
                        		</div><!-- entry-content clearfix -->
                        	</div><!-- card-content card-wrapper -->
                        </div><!-- card-desc -->
					</main><!-- site-main -->
				</div><!-- primary -->
			</div><!-- col l8 s12 m12 -->
			<div class="col l4 s12 m12 right">
				<?php get_sidebar(); ?>
			</div><!-- Col 4 Sidebar -->
		</div><!-- row -->
	</div><!-- container -->
</div><!-- content -->