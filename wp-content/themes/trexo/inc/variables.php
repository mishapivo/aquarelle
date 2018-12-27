<?php

$trexoPostsPagesArray = array(
	'select' => __('Select a post/page', 'trexo'),
);

$trexoPostsPagesArgs = array(
	
	// Change these category SLUGS to suit your use.
	'ignore_sticky_posts' => 1,
	'post_type' => array('post', 'page'),
	'orderby' => 'date',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	
);
$trexoPostsPagesQuery = new WP_Query( $trexoPostsPagesArgs );
	
if ( $trexoPostsPagesQuery->have_posts() ) :
							
	while ( $trexoPostsPagesQuery->have_posts() ) : $trexoPostsPagesQuery->the_post();
			
		$trexoPostsPagesId = get_the_ID();
		if(get_the_title() != ''){
				$trexoPostsPagesTitle = get_the_title();
		}else{
				$trexoPostsPagesTitle = get_the_ID();
		}
		$trexoPostsPagesArray[$trexoPostsPagesId] = $trexoPostsPagesTitle;
	   
	endwhile; wp_reset_postdata();
							
endif;

$trexoYesNo = array(
	'select' => __('Select', 'trexo'),
	'yes' => __('Yes', 'trexo'),
	'no' => __('No', 'trexo'),
);

$trexoSliderType = array(
	'select' => __('Select', 'trexo'),
	'header' => __('WP Custom Header', 'trexo'),
	'slider' => __('trexo Header', 'trexo'),
);

$trexoServiceLayouts = array(
	'select' => __('Select', 'trexo'),
	'one' => __('One', 'trexo'),
	'two' => __('Two', 'trexo'),
);

$trexoAvailableCats = array( 'select' => 'Select' );

$trexo_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $trexo_categories_raw as $category ){
	
	$trexoAvailableCats[$category->term_id] = $category->name;
	
}
