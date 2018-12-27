<?php
/**
 *
 * Materia Lite WordPress Theme by Iceable Themes | https://www.iceablethemes.com
 *
 * Copyright 2017-2018 Iceable Media - Mathieu Sarrasin
 *
 * Page Template
 *
 */

get_header();

?>
<main class="container">
	<?php

	get_template_part( 'part-title' );

	?>
	<div id="single-container" class="single-container with-sidebar">
		<?php

		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();

				?>
				<div id="page-<?php the_ID(); ?>" <?php post_class( 'entry-wrap' ); ?>>
					<?php

					/* Post thumbnail ( Featured Image ) */
					if ( '' !== get_the_post_thumbnail() ) :
						?>
						<div class="thumbnail">
							<?php
							the_post_thumbnail(
								'large',
								array(
									'class' => '',
								)
							);
							?>
						</div>
						<?php
					endif;

					?>
					<div id="page-container" class="post-content entry-content">
						<?php the_content(); ?>
					</div>
					<?php

					wp_link_pages(
						array(
							'before'           => '<br class="clear" /><div class="paged_nav"><span>' . __( 'Pages:', 'materia-lite' ) . '</span>',
							'after'            => '</div>',
							'link_before'      => '<span>',
							'link_after'       => '</span>',
							'next_or_number'   => 'number',
							'nextpagelink'     => __( 'Next page', 'materia-lite' ),
							'previouspagelink' => __( 'Previous page', 'materia-lite' ),
							'pagelink'         => '%',
							'echo'             => 1,
						)
					);

					?>
				</div>
				<?php

				// Display comments section only if comments are open or if there are comments already.
				if ( comments_open() || '0' !== get_comments_number() ) :
					?>
					<div class="comments">
						<?php comments_template( '', true ); ?>
					</div>
					<?php
				endif;

			endwhile;

		else : // Empty loop ( this should never happen! )

			?>
			<h2><?php esc_html_e( 'Not Found', 'materia-lite' ); ?></h2>
			<p><?php esc_html_e( 'What you are looking for isn\'t here...', 'materia-lite' ); ?></p>
			<?php

		endif;

		?>
	</div>

	<div id="sidebar-container">
		<?php get_sidebar(); ?>
	</div>

</main>
<?php
get_footer();
