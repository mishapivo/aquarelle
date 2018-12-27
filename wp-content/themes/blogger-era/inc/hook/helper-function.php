<?php
/**
 * Helper functions.
 *
 * @package Blogger_Era
 */

if ( ! function_exists( 'blogger_era_fonts_url' ) ) {
	/**
	 * Register Google fonts.
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function blogger_era_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		/* translators: If there are characters in your language that are not supported by Lora, translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Lora font: on or off', 'blogger-era' ) ) {
			$fonts[] = 'Lora:400,400i,700,700i';
		}

		/* translators: If there are characters in your language that are not supported by Open Sans , translate this to 'off'. Do not translate into your own language. */
		if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'blogger-era' ) ) {
			$fonts[] = 'Open Sans:300,300i,400,400i,600,600i,700,700i,800,800i';
		}
		
		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css' );
		}

		return $fonts_url;
	}
}

if ( ! function_exists( 'blogger_era_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     *
     * @link: https://gist.github.com/melissacabral/4032941
     *
     * @param  array $args Arguments
     */
    function blogger_era_breadcrumb( $args = array() ) {

        if ( ! function_exists( 'blogger_era_breadcrumb_trail' ) ) {
            require_once get_template_directory() . '/inc/breadcrumbs.php';
        }

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        blogger_era_breadcrumb_trail( $breadcrumb_args );
       
    }

endif;

/**
 * Display custom header title 
 */
function blogger_era_banner_title() {
	if ( is_front_page() && is_home() ) : ?>		
		<h2 class="entry-title"><?php echo esc_html__( 'Blog', 'blogger-era' ); ?></h2>
	<?php elseif ( ! is_front_page() && is_home() || is_singular() ): ?>
		<h2 class="entry-title"><?php single_post_title(); ?></h2>
	<?php elseif ( is_archive() ) : 
		the_archive_title( '<h2 class="entry-title">', '</h2>' );
	elseif ( is_search() ) : ?>
		<h2 class="entry-title"><?php printf( esc_html__( 'Search Results for: %s', 'blogger-era' ), get_search_query() ); ?></h2>
	<?php elseif ( is_404() ) :
		echo '<h2 class="entry-title">' . esc_html__( 'Oops! That page can&#39;t be found.', 'blogger-era' ) . '</h2>';
	endif;
}

if ( ! function_exists( 'blogger_era_button_title' ) ) :
	/**
	 * Display Button on Archive/Blog Page 
	 */
	function blogger_era_button_title() {
		$enable_blog_button = blogger_era_get_option( 'enable_blog_button' );		
		$blog_button = blogger_era_get_option( 'blog_button' );	

		if ( false == $enable_blog_button || empty( $blog_button ) ){
			return;
		}
		echo '<div class="btn-wrap">
				<a href = "'.esc_url(get_the_permalink()).'" class="btn">'.esc_html( $blog_button ).'</a>
			</div>';
	}
endif;

if ( ! function_exists( 'blogger_era_posted_description' ) ) :
    /**
     * Author Information
     *
     */
    function blogger_era_posted_description() { 
    	$enable_author_info = blogger_era_get_option( 'enable_author_info' );
    	if ( false == $enable_author_info ){
    		return;
    	}	

        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x( 'VIEW ALL POSTS BY %s', 'post author', 'blogger-era' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );
    ?>
        <aside class="widget widget-post-author">
            <figure class="avatar">
                <?php echo wp_kses_post( get_avatar(get_the_author_meta( 'ID' ) ) ); ?>
            </figure>
            <div class="author-details">
                <h3><?php echo esc_html( get_the_author() );?></h3>
                <?php echo wp_kses_post(get_the_author_meta( 'description', get_the_author_meta( 'ID' ) ));?>
                <div class="author-intro">
                    <?php echo wp_kses_post( $byline );?>
                </div>
            </div>
        </aside>   
    <?php }
endif;

if ( ! function_exists( 'blogger_era_posted_content' ) ) :
    /**
     * Content
     *
     */
    function blogger_era_posted_content() { 
    	$blog_content  = blogger_era_get_option( 'blog_content' );
    	$excerpt_length  = blogger_era_get_option( 'excerpt_length' );

    	if ( 'excerpt' == $blog_content ){
			$excerpt = blogger_era_the_excerpt( absint( $excerpt_length ) );
			if ( !empty( $excerpt ) ) : ?>

				<div class="entry-content">
					<?php										
					echo wp_kses_post( wpautop( $excerpt ) );
					?>
				</div>

			<?php endif; 
    	} else{ ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
    	<?php }
	?>
  
    <?php }
endif;

if ( ! function_exists( 'blogger_era_custom_posts_navigation' ) ) :

	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
function blogger_era_custom_posts_navigation() {
	$pagination_option = blogger_era_get_option('blog_pagination');
	if( 'default' == $pagination_option){
		the_posts_navigation();	
	} else{
		the_posts_pagination( array(
			'mid_size' => 5,
			'prev_text' => esc_html__( 'PREV', 'blogger-era' ),
			'next_text' => esc_html__( 'NEXT', 'blogger-era' ),
			) );
	} 	

}
endif;

add_action( 'blogger_era_action_posts_navigation', 'blogger_era_custom_posts_navigation' );
