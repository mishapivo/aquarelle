<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Feminine_Munk
 */

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
if ( !function_exists( 'feminine_munk_pingback_header' ) ) {
    function feminine_munk_pingback_header(){
        if ( is_singular() && pings_open() ){
            echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
        }
    }
}
add_action( 'wp_head', 'feminine_munk_pingback_header' );

/**
 * feature post Start
 */
if ( !function_exists( 'feminine_munk_banner_post' ) ) {
    function feminine_munk_banner_post(){

        if ( is_front_page() ) {
            $ed_feature_post = get_theme_mod( 'ed_feature_post' );
            $first_post      = get_theme_mod( 'featured_post_one' );
            $second_post     = get_theme_mod( 'featured_post_two' );
            $third_post      = get_theme_mod( 'featured_post_three' );
            $fourth_post     = get_theme_mod( 'featured_post_four' );
            $fifth_post      = get_theme_mod( 'featured_post_five' );

            if ( $ed_feature_post && ( $first_post || $second_post || $third_post || $fourth_post || $fifth_post ) ) {
                $featured_posts = array( $first_post, $second_post, $third_post, $fourth_post, $fifth_post );
                $featured_posts = array_diff( array_unique( $featured_posts ), array( '' ) );
                $featured_qry   = new WP_Query( array(
                    'post_type'           => 'post',
                    'posts_per_page'      => -1,
                    'post__in'            => $featured_posts,
                    'orderby'             => 'post__in',
                    'ignore_sticky_posts' => true
                ) );
                ?>
                <div class="banner-section">
                    <div class="container">
                        <ul><?php
                            if ( $featured_qry->have_posts() ) {
                                while ( $featured_qry->have_posts() ) {
                                    $featured_qry->the_post();
                                    if ( has_post_thumbnail() ) {
                                    ?>
                                    <li>
                                        <div class="content">
                                            <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                                <?php the_post_thumbnail('feminine-munk-feature-post'); ?>
                                            </a>
                                            <div class="text-holder">
                                                <span class="category"><?php feminine_munk_categories(); ?></span>
                                                <header class="entry-header">
                                                    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
                                                    <div class="entry-meta">
                                                           <?php feminine_munk_posted_on_time(); ?>
                                                        <span><i class="fa fa-user" aria-hidden="true"></i> 
                                                            <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ); ?>"><?php the_author(); ?>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </header>
                                            </div>
                                        </div>
                                    </li>
                                <?php }
                                    }
                                wp_reset_postdata();
                            } ?>
                        </ul>
                    </div>
                </div>
                <?php
            }
        }
    }
}
add_action('feminine_munk_banner_post', 'feminine_munk_banner_post');

/**
 * Social Links
 */
function feminine_munk_social_links($header = true) {
    $social_links = array(
        'facebook'    => get_theme_mod( 'facebook' ),
        'twitter'     => get_theme_mod( 'twitter' ),
        'google-plus' => get_theme_mod( 'google_plus' ),
        'instagram'   => get_theme_mod( 'instagram' ),
        'pinterest'   => get_theme_mod( 'pinterest' ),
        'youtube'     => get_theme_mod( 'youtube' ),
    );
    ?>
    <ul <?php if ( $header ) echo 'class="social-networks"'; ?>>
        <?php foreach ( $social_links as $k => $link ) {
            if ( $link ) {
                ?>
                <li>
                    <?php if ( !$header ) {
                       echo '<span>'; ?><i class="fa fa-<?php echo esc_attr( $k ); ?>" aria-hidden="true"></i>
                    <?php } ?>
                    <a href="<?php echo esc_url( $link ); ?>" target="_blank">
                        <?php echo $header ? '<i class="fa fa-' . esc_attr( $k ) . '" aria-hidden="true"></i>' : esc_html( ucfirst( $k ) ); ?>
                    </a>
                    <?php if ( !$header ) echo '</span>'; ?>
                </li>
                <?php 
            }
        } ?>
    </ul>
    <?php
}

/**
 * Top Header
 */
if ( !function_exists( 'feminine_munk_top_header' ) ) {
    function feminine_munk_top_header() {
        $ed_top_header   = get_theme_mod( 'ed_header_setting', '1' );
        $ed_social_links = get_theme_mod( 'ed_header_social_setting' );
        $ed_search       = get_theme_mod( 'ed_header_search_setting', '1' );

        if ( $ed_top_header ) {
            ?>
            <div class="header-t">
                <div class="container">
                    <?php 
                    if ( $ed_social_links ) {
                        feminine_munk_social_links( true );
                    }
                    if ( $ed_search ) {
                        ?>
                        <div class="form-section">
                            <a href="javascript:void(0);" id="search-btn"><i class="fa fa-search"></i></a>
                            <div class="example">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <?php
        }
    }
}
add_action( 'feminine_munk_top_header', 'feminine_munk_top_header' );

/**
 * Footer Social Links
 */
if ( !function_exists( 'feminine_munk_footer_social_links' ) ) {
    function feminine_munk_footer_social_links(){
        $ed_footer_social_links = get_theme_mod( 'ed_footer_social_setting' );

        if ( $ed_footer_social_links ) {
            ?>
            <section class="social-media-links">
                <div class="container">
                    <?php feminine_munk_social_links( false ); ?>
                </div>
            </section>
            <?php
        }
    }
}
add_action( 'feminine_munk_footer_social_links', 'feminine_munk_footer_social_links' );

/**
 * Single Post Author Section
 */
if ( !function_exists( 'feminine_munk_author_info' ) ) {
    function feminine_munk_author_info(){
        global $post; 
        if( get_the_author_meta( 'description' ) ){ ?>
        <div class="author-section">
            <?php echo get_avatar( get_the_author_meta( 'ID' ), 32); ?>
            <div class="text">
                <span class="name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?> </span>
                <?php echo wpautop( esc_html( get_the_author_meta( 'description' ) ) ); ?>
            </div>
        </div>
        <?php
        }
    }
}
add_action( 'feminine_munk_author_info', 'feminine_munk_author_info' );

/**
 * Similar Post
 */
if ( !function_exists( 'feminine_munk_similar_post' ) ) {

    function feminine_munk_similar_post(){
        $ed_similar_post   = get_theme_mod( 'ed_similar_post_setting' );
        $similar_post_text = get_theme_mod( 'similar_post_text_setting', __('Similar Post', 'feminine-munk') );
        global $post;

        if ( $ed_similar_post ) { ?>

            <section class="similar-posts">
                <?php
                $related = new WP_Query(
                     array( 
                        'category__in'   => wp_get_post_categories( $post->ID ),
                        'posts_per_page' => 2,
                        'post__not_in'   => array( $post->ID )
                         ) ); ?>
                <?php if( $similar_post_text ) echo '<h4 class="section-title">'. esc_html( $similar_post_text ) . '</h4>'; ?>
                <div class="row">

                    <?php if( $related->have_posts() ){
                        while( $related->have_posts() ){
                            $related->the_post(); ?>

                            <article class="post">
                                <?php if( has_post_thumbnail() ){ ?><a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail( 'feminine-munk-similar-post-img' );?>
                                </a><?php } ?>
                                <header class="entry-header">
                                    <h4 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <div class="entry-meta">
                                        <span><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_date() ); ?></a></span>
                                    </div>
                                </header>
                            </article>

                        <?php } 
                        wp_reset_postdata();
                    }else {
                        echo esc_html__( 'Cannot found Similar Post', 'feminine-munk' );
                    }
                    ?>
                </div>
            </section>
            <?php
        }
    }
}
add_action( 'feminine_munk_similar_post', 'feminine_munk_similar_post' );

/**
 * Pagination
 */
if ( !function_exists( 'feminine_munk_pagination' ) ){

    function feminine_munk_pagination(){

        if( is_single() ){
            the_post_navigation();
        }else{
            the_posts_pagination( array(
                'mid_size'  => 3,
                'prev_text' => __( '<span class="fa fa-angle-left"></span>', 'feminine-munk' ),
                'next_text' => __( '<span class="fa fa-angle-right"></span>', 'feminine-munk' ),
            ) );
        }
    }
}
add_action( 'feminine_munk_pagination', 'feminine_munk_pagination' );

/**
 * after the content
 */
if ( !function_exists( 'feminine_munk_entry_footer' ) ) :
    function feminine_munk_entry_footer(){
        if ( ! is_single() ) {
            $continue_reading = get_theme_mod( 'continue_reading_text_setting', __( 'Continue Reading', 'feminine-munk' ) );
            ?>
            <div class="entry-footer">
                <a href="<?php the_permalink(); ?>" class="continue-reading"><?php echo esc_html( $continue_reading ); ?></a>
            </div>
            <?php
        }
    }
endif;
add_action( 'feminine_munk_entry_footer', 'feminine_munk_entry_footer' );

if ( !function_exists( 'feminine_munk_edit_post' ) ) :
    function feminine_munk_edit_post(){
        // Edit Post or Page, when admin is logged in
        if ( get_edit_post_link() ) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'feminine-munk'),
                        array(
                            'span'  => array(
                            'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif;
    }
endif;
add_action( 'feminine_munk_edit_post', 'feminine_munk_edit_post' );

if( ! function_exists( 'feminine_munk_breadcrumb' ) ) :
/**
 * Page Header for inner pages
*/
function feminine_munk_breadcrumb(){    
    
    global $post;
    $ed_breadcrumb  = get_theme_mod( 'ed_breadcrumb', '' );
    $home           = get_theme_mod( 'breadcrumb_home_text', __( 'Home', 'feminine-munk' ) ); // text for the 'Home' link
    $delimiter      = get_theme_mod( 'breadcrumb_separator', __( '>', 'feminine-munk' ) ); // delimiter between crumbs
    
    if( $ed_breadcrumb && ! is_front_page() ){
        
        echo '<div class="page-header"> <div class="container"> <div id="crumbs"><a href="' . esc_url( home_url() ) . '">' . esc_html( $home ) . '</a>' . esc_html( $delimiter );
        
        if( is_home() ){
            
            echo esc_html( single_post_title( '', false ) );
            
        }elseif( is_category() ){
            
            $thisCat = get_category( get_query_var( 'cat' ), false );
            
            
            if ( $thisCat->parent != 0 ) echo get_category_parents( $thisCat->parent, TRUE,  $delimiter );
            echo  esc_html( single_cat_title( '', false ) );
        
        }elseif( is_tag() ){
            
            echo esc_html( single_tag_title( '', false ) );
     
        }elseif( is_author() ){
            
            global $author;
            $userdata = get_userdata( $author );
            echo esc_html( $userdata->display_name );
     
        }elseif( is_search() ){
            
            echo esc_html__( 'Search Results for "', 'feminine-munk' ) . esc_html( get_search_query() ) . esc_html__( '"', 'feminine-munk' );
        
        }elseif( is_day() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'feminine-munk' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'feminine-munk' ) ) ) . '</a>' . esc_html( $delimiter );
            echo '<a href="' . esc_url( get_month_link( get_the_time( __( 'Y', 'feminine-munk' ) ), get_the_time( __( 'm', 'feminine-munk' ) ) ) ) . '">' . esc_html( get_the_time( __( 'F', 'feminine-munk' ) ) ) . '</a>' . esc_html( $delimiter );
            echo esc_html( get_the_time( __( 'd', 'feminine-munk' ) ) );
        
        }elseif( is_month() ){
            
            echo '<a href="' . esc_url( get_year_link( get_the_time( __( 'Y', 'feminine-munk' ) ) ) ) . '">' . esc_html( get_the_time( __( 'Y', 'feminine-munk' ) ) ) . '</a>' . esc_html( $delimiter );
            echo esc_html( get_the_time( __( 'F', 'feminine-munk' ) ) );
        
        }elseif( is_year() ){
            
            echo esc_html( get_the_time( __( 'Y', 'feminine-munk' ) ) );
    
        }elseif( is_single() && !is_attachment() ){
            
            if ( get_post_type() != 'post' ){
                
                $post_type = get_post_type_object( get_post_type() );
                
                if( $post_type->has_archive == true ){// For CPT Archive Link
                   
                   // Add support for a non-standard label of 'archive_title' (special use case).
                   $label = !empty( $post_type->labels->archive_title ) ? $post_type->labels->archive_title : $post_type->labels->name;
                   printf( '<a href="%1$s">%2$s</a>', esc_url( get_post_type_archive_link( get_post_type() ) ), $label );
                   echo esc_html( $delimiter );
    
                }
                echo esc_html( get_the_title() );
                
            }else{ //For Post
                
                $cat_object       = get_the_category();
                $potential_parent = 0;
                
                
                if( is_array( $cat_object ) ){ //Getting category hierarchy if any
        
                    //Now try to find the deepest term of those that we know of
                    $use_term = key( $cat_object );
                    foreach( $cat_object as $key => $object )
                    {
                        //Can't use the next($cat_object) trick since order is unknown
                        if( $object->parent > 0  && ( $potential_parent === 0 || $object->parent === $potential_parent ) ){
                            $use_term = $key;
                            $potential_parent = $object->term_id;
                        }
                    }
                    
                    $cat = $cat_object[$use_term];
              
                    $cats = get_category_parents( $cat, TRUE, esc_html( $delimiter ) );
                    $cats = preg_replace( "#^(.+)\s$delimiter\s$#", "$1", $cats ); //NEED TO CHECK THIS
                    echo $cats;
                }
    
                echo esc_html( get_the_title() );
                
            }
        
        }elseif( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ){
            
            $post_type = get_post_type_object(get_post_type());
            if( get_query_var('paged') ){
                echo '<a href="' . esc_url( get_post_type_archive_link( $post_type->name ) ) . '">' . esc_html( $post_type->label ) . '</a>';
                echo  esc_html( $delimiter ), sprintf( __('Page %s', 'feminine-munk'), get_query_var('paged') );
            }else{
                echo esc_html( $post_type->label );
            }
    
        }elseif( is_attachment() ){
            
            $parent = get_post( $post->post_parent );
            $cat = get_the_category( $parent->ID ); 
            if( $cat ){
                $cat = $cat[0];
                echo get_category_parents( $cat, TRUE, esc_html( $delimiter ) );
                echo '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . esc_html( $parent->post_title ) . '</a>' . ' <span class="separator">' . esc_html( $delimiter ) . '</span> ';
            }
            echo  esc_html( get_the_title() );
        
        }elseif( is_page() && !$post->post_parent ){
            
            echo esc_html( get_the_title() );
    
        }elseif( is_page() && $post->post_parent ){
            
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            
            while( $parent_id ){
                $page = get_post( $parent_id );
                $breadcrumbs[] = '<a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . esc_html( get_the_title( $page->ID ) ) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse( $breadcrumbs );
            for ( $i = 0; $i < count( $breadcrumbs) ; $i++ ){
                echo $breadcrumbs[$i];
                if ( $i != count( $breadcrumbs ) - 1 ) echo esc_html( $delimiter );
            }
            echo esc_html( $delimiter ),  esc_html( get_the_title() );
        
        }elseif( is_404() ){
            echo esc_html__( '404 Error - Page Not Found', 'feminine-munk' );
        }
        
        if( get_query_var( 'paged' ) ) echo __( ' (Page', 'feminine-munk' ) . ' ' . get_query_var( 'paged' ) . __( ')', 'feminine-munk' );
        
        echo '</div></div></div>';
        
    }
}
endif;
add_action( 'feminine_munk_breadcrumb', 'feminine_munk_breadcrumb', 20 );

/**
 * Footer
 */
if ( !function_exists( 'feminine_munk_footer' ) ) {
    function feminine_munk_footer(){
        $copyright_text = get_theme_mod( 'footer_credit_setting' );
        ?>
        <div class="footer-b">
            <div class="container">
                <div class="site-info">
                    <span>
                        <?php
                        if ( $copyright_text ) {
                            echo wp_kses_post( $copyright_text );
                        } else {
                            esc_html_e( '&copy; Copyright ', 'feminine-munk' ); 
                            echo date_i18n( esc_html__( 'Y', 'feminine-munk' ) );
                            echo ' <a href="' . esc_url(home_url('/')) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>. ';
                        }
                        printf(esc_html__(' Powered by %s', 'feminine-munk' ), '<a href="' . esc_url( __( 'https://wordpress.org/', 'feminine-munk' ) ) . '" target="_blank">WordPress</a>.' ); ?>
                    </span>
                </div>
            </div>
        </div>
        <?php
    }
}
add_action( 'feminine_munk_footer', 'feminine_munk_footer' );

/**
 * Ads
 */
if ( !function_exists( 'feminine_munk_ads' ) ) {
    function feminine_munk_ads(){
        
        $before_post_ad         = get_theme_mod( 'feminine_munk_before_post_ad' );
        $before_post_ad_link    = get_theme_mod( 'feminine_munk_before_post_ad_link' );
        $after_post_ad          = get_theme_mod( 'feminine_munk_after_post_ad' );
        $footer_ad              = get_theme_mod( 'feminine_munk_footer_ad' );
        $footer_ad_link         = get_theme_mod( 'feminine_munk_footer_ad_link' );
        ?>
        
        <?php
    }
}
add_action( 'feminine_munk_ads', 'feminine_munk_ads' );