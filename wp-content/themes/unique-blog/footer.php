<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Unique_Blog
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

		<?php if( get_theme_mod( 'unique_blog_social_links_enable',false ) == true): ?>
			<div class="social-share">
				<?php
				/**
				 * Social Links section
				 */
				$facebook_url		= get_theme_mod( 'unique_blog_facebook_url','www.facebook.com' );
				$twitter_url		= get_theme_mod( 'unique_blog_twitter_url','www.twitter.com' );
				$youtube_url		= get_theme_mod( 'unique_blog_youtube_url','www.youtube.com' );
				$pinterest_url		= get_theme_mod( 'unique_blog_pinterest_url','www.pinterest.com' );
				$instagram_url		= get_theme_mod( 'unique_blog_instagram_url','www.instagram.com' );
				$google_plus_url	= get_theme_mod( 'unique_blog_google_plus_url','www.plus.goolge.com' );
				
				?>
				<ul>
					<?php if( !empty($facebook_url) ): ?><li><a href="<?php echo esc_url($facebook_url); ?>"><i class="fa fa-facebook-f"></i><?php echo esc_html__('facebook','unique-blog'); ?></a></li><?php endif; ?>
					<?php if( !empty($twitter_url) ): ?><li><a href="<?php echo esc_url($twitter_url); ?>"><i class="fa fa-twitter"></i><?php echo esc_html__('twitter','unique-blog'); ?></a></li><?php endif; ?>
					<?php if( !empty($youtube_url) ): ?><li><a href="<?php echo esc_url($youtube_url); ?>"><i class="fa fa-youtube-play" aria-hidden="true"></i><?php echo esc_html__('youtube','unique-blog'); ?></a></li><?php endif; ?>
					<?php if( !empty($pinterest_url) ): ?><li><a href="<?php echo esc_url($pinterest_url); ?>"><i class="fa fa-pinterest"></i><?php echo esc_html__('pinterest','unique-blog'); ?></a></li><?php endif; ?>
					<?php if( !empty($instagram_url) ): ?><li><a href="<?php echo esc_url($instagram_url); ?>"><i class="fa fa-instagram"></i><?php echo esc_html__('instagram','unique-blog'); ?></a></li><?php endif; ?>
					<?php if( !empty($google_plus_url) ): ?><li><a href="<?php echo esc_url($google_plus_url); ?>"><i class="fa fa-google-plus"></i><?php echo esc_html__('goolge plus','unique-blog'); ?></a></li><?php endif; ?>
				</ul>
			</div>	
		<?php endif; ?>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'unique-blog' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'unique-blog' ), 'WordPress' );
				?>
			</a>
			<span class="sep">|</span>
			<a href="<?php echo esc_url('https://themerelic.com','unique-blog'); ?>">
				<?php
					/* translators: 1: Theme name, 2: Theme author. */
					printf( esc_html__( 'Theme: %1$s by %2$s.', 'unique-blog' ), 'Unique Blog', 'Themerelic' );
				?>
			<!-- .site-info -->
			</a>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
