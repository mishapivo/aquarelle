<?php
	$is_sticky = is_sticky() && is_home() && ! is_paged();
?>
<a href="<?php echo esc_url( get_permalink() ); ?>">
	<h4 class="card-title post-title <?php echo ( $is_sticky ) ? 'sticky' : ''; ?>">
		<?php the_title(); ?>
		<?php
		if ( $is_sticky ) {
			echo '<i class="fa fa-anchor sticky_icon" aria-label="' . esc_attr__( 'Sticky post', 'seabadgermd' ) . '"></i>';
		}
		?>
	</h4>
</a>
