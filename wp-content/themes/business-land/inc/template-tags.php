<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package business-land
 */

//post author
if( ! function_exists( 'business_land_post_author' ) ):
	
	function business_land_post_author(){
		
		$author_wrap = sprintf( '<a href="%s"><div class="avatar-wrap"><i class="fa fa-user"></i></div><span class="author-name">'.esc_html( get_the_author() ).'</span></a>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) );
		
		echo wp_kses_post( $author_wrap );
	}
	
endif;

//post date
if( ! function_exists( 'business_land_post_date' ) ):
	
	function business_land_post_date(){
		$archive_year  = get_the_time('Y'); 
		$archive_month = get_the_time('m'); 
		$archive_day   = get_the_time('d'); 
		$time_link = get_day_link( $archive_year, $archive_month, $archive_day);
		
		$date_wrap = sprintf('<a href="%1$s" class="post-date"><i class="fa fa-clock-o"></i>%2$s</a>', esc_url( $time_link ), esc_html( get_the_date() ) );
		
		echo wp_kses_post( $date_wrap );
	}

endif;

//post commnet 
if( ! function_exists( 'business_land_post_comment' ) ):

	function business_land_post_comment(){
	
		$cmt_link = get_comments_link( get_the_ID() );
		$num_comments = get_comments_number();
		if ( $num_comments == 0 ) {
			$comments = __( '0 Comments', 'business-land' );
		} elseif ( $num_comments > 1 ) {
			$comments = $num_comments . __( ' Comments', 'business-land' );
		} else {
			$comments = __('1 Comment', 'business-land' );
		}
		echo "<a href='".esc_url( $cmt_link )."'><i class='fa fa-comment'></i>".esc_html( $comments )."</a>";
	}
	
endif;

//post categories
if( ! function_exists( 'business_land_post_categories' ) ):
	function business_land_post_categories(){
		$categories = get_the_category( get_the_ID() );
		$separator = ', ';
		if ( ! empty( $categories ) ) {
			$output = '<i class="fa fa-folder-open" aria-hidden="true"></i>';
			foreach( $categories as $category ) {
				/* translators: %s: category name */
        		$output .= '<a href="' .esc_url( get_category_link( $category->term_id ) ). '" alt="' .esc_attr( $category->name ). '">'. esc_html( $category->name ) .'</a>'.$separator;
				
    		}
			echo wp_kses_post( trim( $output, $separator ) );
		}
	}
endif;

//post tags
if( ! function_exists( 'business_land_post_tags' ) ):
	
	function business_land_post_tags(){
	
		$tags  = get_the_tag_list( sprintf( '<span>%s:</span>', __( 'Tags', 'business-land' ) ), '' );
		
		echo  wp_kses_post( $tags );
	
	}

endif; 