<?php
defined( 'ABSPATH' ) || exit;
/**
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 * @package Simple Days
 */

if ( ! function_exists( 'simple_days_site_title_text' ) ) :
	/**
	 * Displays the site title in the header area
	 */
	function simple_days_site_title_text() {

		$site_title_effects = '';
		if((get_theme_mod( 'simple_days_font_site_title_google_jp', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_body_google_jp', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_headings_google_jp', 'none' ) != 'none') && get_theme_mod( 'simple_days_font_site_title_google_jp_effects_1', 'none' ) != 'none'){
			$site_title_effects = ' font-effect-'.get_theme_mod( 'simple_days_font_site_title_google_jp_effects_1');
		}elseif((get_theme_mod( 'simple_days_font_site_title_google', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_body_google', 'none' ) != 'none' || get_theme_mod( 'simple_days_font_headings_google', 'none' ) != 'none') && get_theme_mod( 'simple_days_font_site_title_google_effects_1', 'none' ) != 'none'){
			$site_title_effects = ' font-effect-'.get_theme_mod( 'simple_days_font_site_title_google_effects_1');
		}

		$title_tag = 'p';
		if ( is_home() ) $title_tag = 'h1';
		echo '<'.$title_tag.' class="title_text'.$site_title_effects.' fw8">'.get_bloginfo( 'name' ).'</'.$title_tag.'>';

	}

endif;

if ( ! function_exists( 'simple_days_tag_line' ) ) :
	/**
	 * Displays the tag line in the header area
	 */
	function simple_days_tag_line() {

		echo '<div class="tagline f_box ai_c"><span>'.get_bloginfo('description').'</span></div>';

	}

endif;

if ( ! function_exists( 'simple_days_sub_menu' ) ) :
	/**
	 * Displays the sub menu in the header area
	 */
	function simple_days_sub_menu() { ?>
		<div id="menu_sub" class="box_shadow">
			<nav class="container nav_s f_box jc_c">
				<?php wp_nav_menu( array(
					'theme_location'  => 'sub',
					'menu_class'      => 'menu_i menu_s o_s_t f_box ai_c lsn m0',
					'menu_id'         => '',
					'container'       => 'ul',
					'fallback_cb'     => '__return_false'
				));
				?>
			</nav>
		</div>
		<?php
	}

endif;

if ( ! function_exists( 'is_active_nav_menu' ) ) :

	function is_active_nav_menu($location){
		if(has_nav_menu($location)){
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_items($locations[$location]);
			if(!empty($menu)){
				return true;
			}
		}else if($location != 'sub'){
			$menu = get_pages();
			if(!empty($menu)){
				return true;
			}
		}
		return false;
	}

endif;

if ( ! function_exists( 'simple_days_get_logo' ) ) :
	function simple_days_get_logo() {

		if ( YA_AMP ){
			$amp_logo_url = YA_AMP_LOGO;
			$amp_logo_id = attachment_url_to_postid( $amp_logo_url );
			if ( $amp_logo_id != 0){
				$logo = wp_get_attachment_image_src( $amp_logo_id, 'full' );

			}else if ( has_custom_logo() ){
				$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

			}else{
				$logo[0] = YAHMAN_ADDONS_URI .'assets/images/amp-logo.png';
				$logo[1] = '600';
				$logo[1] = '60';
			}
		}else{

			if ( has_custom_logo() ){
				$logo = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );

			}else{

				$logo[0] = SIMPLE_DAYS_THEME_URI .'assets/images/logo.png';
				$logo[1] = '1280';
				$logo[1] = '960';
			}
		}
		return $logo;
	}

endif;


if ( ! function_exists( 'simple_days_menu_box' ) ) :

	function simple_days_menu_box() {

		echo '<div class="menu_box bar_box posi_ab tb0 f_box ai_c">';
		if ( is_active_nav_menu('primary')) {  
			echo '<label for="t_menu" class="humberger tap_no m0"></label>';
		}
		echo '</div>';

		echo '<div class="menu_box serach_box posi_ab tb0 f_box ai_c">';
		if (get_theme_mod( 'simple_days_mobile_header_search',true)){
			echo '<label for="t_search" class="search_m tap_no m0"><i class="fa fa-search serch_icon" aria-hidden="true"></i></label>';
		}
		echo '</div>';

	}

endif;

if ( ! function_exists( 'simple_days_primary_menu' ) ) :

	function simple_days_primary_menu() {?>

		<nav class="container nav_base nh_con">
			<?php wp_nav_menu( array(
				'theme_location'  => 'primary',
				'menu_class'      => 'menu_base menu_i lsn m0 f_box f_col110',
				'menu_id'         => 'menu_h',
				'container'       => 'ul',
				
			));
			?>
		</nav>
		<?php
	}

endif;

if ( ! function_exists( 'simple_days_mobile_search' ) ) :

	function simple_days_mobile_search() {?>

		<input id="t_search" class="dn" type="checkbox" />
		<div id="h_search">
			<form role="search" method="get" class="search_form" action="<?php echo esc_url( home_url( '/' ) ); ?>" <?php if ( YA_AMP ){ ?>target="_top"<?php } ?>>
				<input type="search" id="search-form-header" class="search_field" placeholder="<?php esc_attr_e( 'Search', 'simple-days' ) ?>" value="<?php echo get_search_query(); ?>" name="s" />
				<button type="submit" class="search_submit opa7"><i class="fa fa-search serch_icon" aria-hidden="true"></i></button>
			</form>
		</div>
		<?php
	}

endif;

if ( ! function_exists( 'simple_days_site_title_display' ) ) :

	function simple_days_site_title_display() {

		$mod = get_theme_mod( 'simple_days_tagline_position','none');

		if($mod == "top" || $mod == "left") simple_days_tag_line();

		echo '<div class="site_title f_box ai_c"><a href="'.esc_url( home_url( '/' ) ).'" class="" rel="home">';
		if ( has_custom_logo() ) { 

			$image = simple_days_get_logo();

			echo '<'.( YA_AMP ? 'amp-img layout="intrinsic"':'img').' src="'. esc_url( $image[0] ) .'" class="header_logo" width="'. absint( $image[1] ) .'" height="'. absint( $image[2] ) .'" alt="'. esc_attr( get_bloginfo( 'name', 'display' ) ) .'" />';

		}else{

			simple_days_site_title_text();

		}

		echo '</a></div>';

		if($mod == "bottom" || $mod == "right") simple_days_tag_line();
	}

endif;


if ( ! function_exists( 'simple_days_get_thumbnail' ) ) :
	function simple_days_get_thumbnail($post_id , $size , $post_data) {

		/*
	     * @param string $post_id Post ID.
	     * @param string $size thumbnail, middle ,large etc.
	     * @param string $post_data $post.
	    */
		$thumbnail = array();

		if(has_post_thumbnail($post_id)) {

			$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post_id) , $size );
			$thumbnail['has_image'] = true;

			return $thumbnail;

		}elseif(isset($post_data->post_content)){

			$thumbnail[1] = 640;
			$thumbnail[2] = 480;

			preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post_data->post_content, $thumurl);
			if(isset($thumurl [1] [0])){
				$thumbnail[0] = $thumurl[1][0];
				$thumbnail['has_image'] = true;
				return $thumbnail;
			}
			$thumbnail[0] = get_theme_mod( 'simple_days_no_img' , SIMPLE_DAYS_THEME_URI .'assets/images/no_image.png');
			$thumbnail['has_image'] = false;

			return $thumbnail;

		}else{

			$thumbnail[0] = get_theme_mod( 'simple_days_ogp_logo_img', SIMPLE_DAYS_THEME_URI .'assets/images/ogp.jpg');
			$thumbnail['has_image'] = true;
			return $thumbnail;

		}

	}
endif;

if ( ! function_exists( 'simple_days_document_title_separator' ) ) :
	
	function simple_days_document_title_separator( $separator ) {
		return esc_html( ' '.get_theme_mod( 'simple_days_title_separator','|').' ' );
	}
endif;
add_filter( 'document_title_separator', 'simple_days_document_title_separator' );

if ( ! function_exists( 'simple_days_widgets_init' ) ) :
	
	function simple_days_widgets_init() {
		get_template_part( 'inc/widgets' );
	}
endif;
add_action( 'widgets_init', 'simple_days_widgets_init' );

if ( ! function_exists( 'simple_days_remove_hentry' ) ) :
	
	function simple_days_remove_hentry( $hentry ) {
		return array_diff($hentry, array('hentry'));
	}
endif;
add_filter('post_class', 'simple_days_remove_hentry');


if ( ! function_exists( 'simple_days_comment' ) ) :
	function simple_days_comment($comment, $args, $depth) {

		switch ( $comment->comment_type ) :

			case 'pingback':
			case 'trackback':
			?>
			<li class="pingback">
				<p class="mb10"><i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php comment_author_link(); ?><?php edit_comment_link( esc_html__( 'Edit', 'simple-days' ), '<span class="edit-link">', '</span>' ); ?></p>

				<?php

				break;
				default:

				?>



				<li id="comment-<?php comment_ID() ?>" <?php comment_class(); ?>>
					<div class="comment_body" itemscope itemtype="https://schema.org/UserComments">
						<div class="comment_metadata">
							<span class="fn" itemprop="creator" itemscope itemtype="https://schema.org/Person"><?php echo get_comment_author_link(); ?></span>
							<time><?php comment_date(get_option( 'date_format' )); ?></time>
							<span class="comment_reply">
								<?php comment_reply_link(array_merge( $args, array('reply_text' => '<i class="fa fa-reply" aria-hidden="true"></i> '.__('Reply', 'simple-days'),'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
							</span>
							<span class="comment_edit">
								<?php edit_comment_link('<i class="fa fa-pencil" aria-hidden="true"></i> '.__('Edit', 'simple-days'),'  ','') ?>
							</span>
						</div>
						<div class="comment_main f_box">
							<div class="comment_avatar">
								<?php echo get_avatar( $comment->comment_author_email, 100 ); ?>
							</div>
							<div class="comment_text" itemprop="commentText">
								<?php comment_text() ?>
							</div>

						</div>
						<?php if ($comment->comment_approved == '0') : ?>
							<span><?php esc_html_e('*Your comment is awaiting moderation.*', 'simple-days') ?></span>
						<?php endif; ?>
					</div>


					<?php
					break;
				endswitch;

			}
		endif;
