<div class="evolve-metabox">
	<?php global $evolve_metaboxes;
	$evolve_metaboxes->evolve_select( 'page_title', __( 'Page Title', 'evolve' ), '', array(
		'yes' => __( 'Show', 'evolve' ),
		'no'  => __( 'Hide', 'evolve' )
	) );

	$evolve_metaboxes->evolve_select( 'page_breadcrumb', __( 'Page Breadcrumb', 'evolve' ), '', array(
		'yes' => __( 'Show', 'evolve' ),
		'no'  => __( 'Hide', 'evolve' )
	) ); ?>
</div>
