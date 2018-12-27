<?php
/**
* Author Dislay Functions
*/

if( ! function_exists('unique_blog_meta_authorlink') ) {
	function unique_blog_meta_authorlink(){
		
        return '<span class="byline"> by <span class="author vcard"><a class="url fn n" href="'. esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) .'">'. unique_blog_meta_author_image() . unique_blog_meta_author_name() .'</a></span></span>';
    
    }
}
if( ! function_exists('unique_blog_meta_author_image') ) {
	function unique_blog_meta_author_image(){
		return get_avatar( get_the_author_meta( 'ID' ), 25, null, null, array( 'class' => 'img-circle' ) );
	}
}

if( ! function_exists('unique_blog_meta_author_name') ) {
	function unique_blog_meta_author_name(){
		return '<span class="author-name">'.get_the_author().'</span>';
	}
}


/**
 * Breadcrumb Section
 */
if ( ! function_exists( 'unique_blog_breadcrumb' ) ) {
    /**
     * Unique Blog Breadcrumb Section
     * 
     * @since Unique Blog 1.0.0
     */

    function unique_blog_breadcrumb() {
        
        //Enable Breadcrumb Section 
        if( get_theme_mod('unique_blog_breadcrumb_enable',true ) == true  ){
            global $post;

            $unique_blog_breadcrumb_separator = wp_kses_post( '<span class="separator">/</span>' );
            echo '<section class="breadcrumb"><div class="container"><div class="row"><div class="col-md-12"><div class="breadcrumb_wrap">';
            if (!is_home()) {
                echo '<div class="breadcrumb-section">';
                
                echo '<i class="fa fa-home" aria-hidden="true"></i><a href="';
                echo esc_url( home_url( '/' ) );
                echo '">';
                echo esc_html__('Home', 'unique-blog');
                echo '</a>'.wp_kses_post( $unique_blog_breadcrumb_separator ) ;
                if ( is_category() || is_single()) {
                    the_category( $unique_blog_breadcrumb_separator );
                    if (is_single()) {
                        echo ''.wp_kses_post( $unique_blog_breadcrumb_separator );
                        the_title();
                    }
                } elseif ( is_page() ) {
                    if($post->post_parent){
                        $title = get_the_title();
                        
                        echo '<span title="'.esc_attr($title).'"> '.esc_html($title).'</span>';
                    } else {
                        echo '<span> '. esc_html(get_the_title()).'</span>';
                    }
                }
                elseif (is_tag()) {single_tag_title();}
                elseif (is_day()) {
                    echo "<span>" . sprintf(esc_html__('Archive for %s', 'unique-blog'),esc_html( get_the_time('F jS, Y')) ); echo '</span>';
                }
                elseif (is_month()) {echo "<span>" . sprintf(esc_html__('Archive for %s', 'unique-blog'),esc_html( get_the_time('F, Y')) ); echo '</span>';}
                elseif (is_year()) {echo "<span>" . sprintf(esc_html__('Archive for %s', 'unique-blog'), esc_html( get_the_time('Y')) ); echo '</span>';}
                elseif (is_author()) {echo "<span>" . esc_html__('Author Archive', 'unique-blog'); echo '</span>';}
                elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<span>" . esc_html__('Blog Archives', 'unique-blog'); echo '</span>';}
                elseif (is_search()) {echo "<span>" . esc_html__('Search Results', 'unique-blog'); echo '</span>';}
                
                echo '</div>';
            } else {
                echo '<div class="breadcrumbs-section">';
                
                echo '<a href="';
                echo esc_url( home_url( '/' ) );
                echo '">';
                echo esc_html__('Home', 'unique-blog');
                echo '</a>'.wp_kses_post( $unique_blog_breadcrumb_separator );
                
                echo esc_html__('Blog', 'unique-blog');
                
                
                echo '</div>';
            }

            echo "</div></div></div></div></section>";
        }
    }

}


/**
 * Plugin activation
 */
/**
 * Unique Blog Plugin required
 *
 *
 * @package Unique_Blog
 */
function unique_blog_register_required_plugins() {
    /*
    * The list of Plugin Requird List
    */
    $plugins = array(

        array(
            'name' => esc_attr__( 'Easy Google Fonts', 'unique-blog'),
            'slug' => 'easy-google-fonts',
            'required' => false,
        ),
        array(
            'name' => esc_attr__( 'Contact Form 7', 'unique-blog'),
            'slug' => 'contact-form-7',
            'required' => false,
        ),
        array(
            'name' => esc_attr__( 'One Click Demo Import', 'unique-blog'),
            'slug' => 'one-click-demo-import',
            'required' => false,
        ),

    );

    /*
        * Array of configuration settings. Amend each line as needed. 
    */
    $config = array(
        'id'           => 'unique-blog',                 
        'default_path' => '',                      
        'menu'         => 'tgmpa-install-plugins', 
        'has_notices'  => true,                    
        'dismissable'  => true,                    
        'dismiss_msg'  => '',                       
        'is_automatic' => false,                   
        'message'      => '',                      
        
    );

    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register','unique_blog_register_required_plugins' );//Register
