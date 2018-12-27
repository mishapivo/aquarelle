<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package GW_Chariot
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 col2 col-xs-12'); ?>>
	<header class="entry-header">
		
		<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_post_thumbnail('gw-chariot-thumb'); ?></a>
		
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
		
		<div class="entry-meta">
			<?php
			gw_chariot_posted_on();
			gw_chariot_posted_by();
			?>
		</div>
		<!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_excerpt();
		?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
