<div class="evolve-metabox">
	<?php global $evolve_metaboxes;
	$evolve_imagepath = get_template_directory_uri() . '/inc/admin/customizer/assets/images/';
	$evolve_metaboxes->evolve_image_radio_button(
		'sidebar_position', '', __( 'Sidebar Position', 'evolve' ), '<p>' . __( 'Use this setting to select and set position of sidebar', 'evolve' ) . '</p><p>' . sprintf( __( 'If "No Sidebar" is selected, this layout will follow the settings of %1$sCustomize -> General -> Select General Layout%2$s', 'evolve' ), '<strong>', '</strong>' ) . '</p>', array(
		'default' => $evolve_imagepath . '1c.png',
		'2cl'     => $evolve_imagepath . '2cl.png',
		'2cr'     => $evolve_imagepath . '2cr.png',
		'3cm'     => $evolve_imagepath . '3cm.png',
		'3cr'     => $evolve_imagepath . '3cr.png',
		'3cl'     => $evolve_imagepath . '3cl.png'
	), 'default'
	);

	$evolve_metaboxes->evolve_select( 'full_width', __( 'Full Width', 'evolve' ), sprintf( __( 'If setting Full Width, please set the above Sidebar Position to %1$sNo Sidebar%2$s', 'evolve' ), '<strong>', '</strong>' ), array(
			'no'  => __( 'No', 'evolve' ),
			'yes' => __( 'Yes', 'evolve' )
		)
	); ?>
</div>