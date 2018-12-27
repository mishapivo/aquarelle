<div class="evolve-metabox">
	<?php global $evolve_metaboxes;
	$evolve_metaboxes->evolve_select( 'slider_position', __( 'Slider Position', 'evolve' ), __( 'Select if the slider shows below or above the header. This only works for the slider assigned in page options, not with shortcodes', 'evolve' ), array(
			'default' => __( 'Default', 'evolve' ),
			'below'   => __( 'Below', 'evolve' ),
			'above'   => __( 'Above', 'evolve' )
		)
	);

	$evolve_metaboxes->evolve_select( 'slider_type', __( 'Slider Type', 'evolve' ), '', array(
		'no'        => __( 'No Slider', 'evolve' ),
		'parallax'  => __( 'Parallax Slider', 'evolve' ),
		'posts'     => __( 'Posts Slider', 'evolve' ),
		'bootstrap' => __( 'Bootstrap Slider', 'evolve' )
	) ); ?>
</div>