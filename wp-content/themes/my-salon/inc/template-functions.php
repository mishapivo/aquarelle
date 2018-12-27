<?php
/**
 * Custom template function for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package my_salon
 */

if( ! function_exists( 'my_salon_header_end' ) ) :
/**
 * Header End
 * 
 * @since 1.0.0
*/
function my_salon_header_end(){
    ?>
    </header><!-- #masthead -->
    <?php 
}
endif;


/* Home page */

if( ! function_exists( 'my_salon_template_header' ) ) :
/**
 * Template Section Header
 * 
 * @since 1.0.0
*/
function my_salon_template_header( $section_title ){
    $header_query = new WP_Query( array( 
        'p'         => absint( $section_title ),
        'post_type' => 'page'
    ));

        if( absint( $section_title ) && $header_query->have_posts() ){ 
            while( $header_query->have_posts() ){ $header_query->the_post();
    ?>
                <header class="main-header">
                    <?php 
                        echo '<h3 class="section-title">';
                        the_title();
                        echo '</h3>';
                        
                        if( has_excerpt() ){
                            echo the_excerpt();
                        } 
                    ?>
                </header>
    <?php   }
        wp_reset_postdata();
        }   

}
endif;

if( ! function_exists( 'my_salon_slider_cb' ) ) :
/**
 * Home Page Slider Section
 * 
 * @since 1.0.0
*/
function my_salon_slider_cb(){
    global $my_salon_default_post;
    
    $slider_enable      = get_theme_mod( 'my_salon_ed_slider','1' );
    $slider_caption     = get_theme_mod( 'my_salon_slider_caption', '1' );
    $slider_readmore    = get_theme_mod( 'my_salon_slider_readmore', __( 'Learn More', 'my-salon' ) );
   
    if( $slider_enable && is_front_page() && !is_home() ){
        echo '<section id="banner" class="banner">';
            echo '<div class="fadeout owl-carousel owl-theme clearfix">';
            for( $i=1; $i<=3; $i++){  
                $my_salon_slider_post_id = get_theme_mod( 'my_salon_slider_post_'.$i, $my_salon_default_post ); 
                if( $my_salon_slider_post_id ){
                    $qry = new WP_Query ( array( 'p' => absint( $my_salon_slider_post_id ) ) );            
                    if( $qry->have_posts() ){ 
                        while( $qry->have_posts() ){
                        $qry->the_post();
                            ?>
                            <div class="item">
                                <?php 
                                if( has_post_thumbnail() ){ 
                                    the_post_thumbnail( 'my-salon-slider' );
                                }else{
                                    echo '<img src="'. esc_url( get_template_directory_uri() ).'/images/banner.png">';
                                } 
                                    if( $slider_caption ){ ?>
                                        <div class="banner-text">
                                            <div class="container">
                                                <div class="banner-text-item">
                                                    <?php my_salon_categories(); ?>
                                                    <strong class="title"><h2><?php the_title(); ?></h2></strong>
                                                    <?php 
                                                        the_excerpt(); 
                                                        if( $slider_readmore ){ ?> 
                                                            <a class="btn primary" href="<?php the_permalink(); ?>">
                                                            <?php echo esc_html( $slider_readmore );?></a>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                <?php } ?>
                            </div>
                        <?php 
                        }
                    }
                }
            }
            wp_reset_postdata();  
            echo '</div>';
        echo '</section>';
    }    
}
endif;

if( ! function_exists( 'my_salon_featured' ) ) :
/**
 * Home Page featured Section
 * 
 * @since 1.0.0
*/
function my_salon_featured(){
global $my_salon_default_post;
global $my_salon_default_page;
    
    $featured_title  = get_theme_mod( 'my_salon_featured_section_title', $my_salon_default_page );
    $featured_enable    = get_theme_mod( 'my_salon_ed_featured_section', '1' );
    $featured_post_icon = get_theme_mod( 'my_salon_ed_featured_icon' );

             
    if( $featured_enable ){
        echo '<section id="featured" class="featured-section">';
            echo '<div class="container">';
                echo '<div class="row">';
                
                if( $featured_title ) {  my_salon_template_header( $featured_title ); }

                for( $i = 1; $i <= 3; $i++ ){
                    $my_salon_featured_post_id = get_theme_mod( 'my_salon_feature_post_'.$i, $my_salon_default_post ); 
                    $my_salon_featured_page_icon = get_theme_mod( 'my_salon_feature_icon_'.$i, 'fa-bell');

                    if( $my_salon_featured_post_id ){
                    $qry = new WP_Query ( array( 'p' => absint( $my_salon_featured_post_id ) ) );
                        if( $qry->have_posts() ){
                            while( $qry->have_posts() ){
                                $qry->the_post();
                            ?>
                                <div class="col-4">
                                    <div class="service-item">
                                        <?php
                                            if( has_post_thumbnail() &&  ! $featured_post_icon ){ 
                                                echo '<a href="' . esc_url( get_the_permalink() ) .'">';
                                                    the_post_thumbnail( 'my-salon-recent-post' ); 
                                                echo '</a>';
                                            }elseif( $my_salon_featured_page_icon ){
                                                echo '<i class="fa '.esc_attr( $my_salon_featured_page_icon ).'"></i>';
                                            }
                                        ?>
                                        <div class="service-text">
                                            <a href="<?php the_permalink(); ?>"><?php the_title('<h3>','</h3>'); ?></a>
                                            <?php the_excerpt();?>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                        }
                        wp_reset_postdata();  
                    }
                } 
                echo '</div>'; 
            echo '</div>'; 
        echo '</section>';  
    }   

}
endif;


if( ! function_exists( 'my_salon_welcome' ) ) :
/**
 * Home Page welcome Section
 * 
 * @since 1.0.0
*/
function my_salon_welcome(){
    global $my_salon_default_page;
    
    $welcome_enable     = get_theme_mod( 'my_salon_ed_welcome_section','1' );
    if( $welcome_enable ){
        echo '<section id="about" class="about-section">';
            echo '<div class="container">';
                if( have_posts() ){
                    while( have_posts() ){
                        the_post();
                    
                        if( has_post_thumbnail() ){ the_post_thumbnail( 'my-salon-welcome' ); } ?>
                        <div class="about-text">
                            <?php
                                the_title('<h1 class="about-title">', '</h1>');
                                the_content(); 
                            ?>
                        </div>                      
                    <?php
                    }
                }
                wp_reset_postdata();  
            echo '</div>'; 
        echo '</section>';     
    }    
    
}

endif;

if( ! function_exists( 'my_salon_portfolio' ) ) :
/**
 * Home Page Latest Post Section
 * 
 * @since 1.0.0
*/
function my_salon_portfolio(){
    global $my_salon_default_post;
    global $my_salon_default_page;
    
    $portfolios_enable     = get_theme_mod( 'my_salon_ed_portfolio_section', '1' );
    $portfolios_page       = get_theme_mod( 'my_salon_portfolio_section_page', $my_salon_default_page ); 
    $portfolios_readmore   = get_theme_mod( 'my_salon_portfolio_section_readmore',__('Read More','my-salon') ); 
    $portfolios_url        = get_theme_mod( 'my_salon_portfolio_section_url','#' );
   
    if( $portfolios_enable ){

        echo '<section id="gallery">';
            echo '<div class="container">';
                echo '<div class="row skill-items">';

                    if( $portfolios_page ) {  my_salon_template_header( $portfolios_page ); } 

                    for( $i = 1; $i <= 6; $i++ ){
                        $my_salon_portfolio_post_id = get_theme_mod( 'my_salon_portfolio_post_'.$i, $my_salon_default_post ); 

                        if( $my_salon_portfolio_post_id ){
        
                            $qry = new WP_Query( array( 'p' => absint( $my_salon_portfolio_post_id ) ) );                 

                            if( $qry->have_posts() ){ 
                                while( $qry->have_posts() ){
                                    $qry->the_post();

                                    if( has_post_thumbnail() ){ 
                                ?>
                                        <div class="col-4">
                                            <div class="gallery-item">
                                                <?php the_post_thumbnail( 'my-salon-portfolio' ); ?>
                                                <div class="gallery-mask">
                                                    <a href="<?php the_permalink(); ?>" class="btn"><i class="fa fa-link"></i></a>
                                                    <?php 
                                                    the_title('<h2>', '</h2>' );
                                                    my_salon_categories();
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    <?php
                                    }
                                }
                            }
                        wp_reset_postdata();  
                        }
                    }

                    if( $portfolios_readmore && $portfolios_url ){ ?>
                        <div class="about-buttons">
                            <a class="btn blue" href="<?php echo esc_url( $portfolios_url) ?>"><?php echo esc_html( $portfolios_readmore );?></a>
                        </div> 
                    <?php }
                echo '</div>';
            echo '</div>'; 
        echo '</section>';     
    }    
 
}
endif;

if( ! function_exists( 'my_salon_testimonial' ) ) :
/**
 * Home Page testimonials Section
 * 
 * @since 1.0.0
*/
function my_salon_testimonial(){
    global $my_salon_default_page;
    
    $testimonial_enable    = get_theme_mod( 'my_salon_ed_testimonials_section', '1' );
    $testimonial_title     = get_theme_mod( 'my_salon_testimonials_section_title', $my_salon_default_page );  
    $testimonial_category  = get_theme_mod( 'my_salon_testimonial_category' ); 
   
    if( $testimonial_enable ){
        $args = array( 
            'post_type'          => 'post', 
            'post_status'        => 'publish',
            'posts_per_page'     => 6,        
            'ignore_sticky_post' => true  
        );

        if( $testimonial_category ){
            $args[ 'cat' ] = absint( $testimonial_category );
        }
        $qry = new WP_Query( $args );

        echo '<section id="testimonial" class="testimonial-section">';
            echo '<div class="container">';

            if( $testimonial_title ) {  my_salon_template_header( $testimonial_title ); }
           
                echo '<div class="row">';
                    echo '<div class="testimonial-slider owl-carousel owl-theme clearfix">';
                    if( $qry->have_posts() ){ 
                        while( $qry->have_posts() ){
                            $qry->the_post(); 
                        ?>
                        
                        <div class="item">
                            <div class="testimonial-thumbnail">
                                <?php if( has_post_thumbnail() ){ the_post_thumbnail( 'thumbnail' ); }
                                else{
                                    echo '<img src="' . esc_url( get_template_directory_uri() ).'/images/team-profile-non.jpg">';
                                } ?>
                                    
                            </div>
                                
                            <div class="testimonial-text">
                               <?php the_content(); ?>
                                <div class="testimonial-info">
                                    <?php the_title( '<h3>', '</h3>'); ?>
                                    <span class="testimonial-designation"><?php if( has_excerpt() ){ the_excerpt(); } ?></span>
                                </div>
                            </div>
                        </div>

                        <?php
                        }
                    }
                    wp_reset_postdata();  
                    echo '</div>'; 
                echo '</div>'; 
            echo '</div>'; 
        echo '</section>';     
    }    
 
}
endif;

/**
 * Home Page Contents
 * @see my_salon_slider      - 10
 * @see my_salon_featured    - 20
 * @see my_salon_welcome     - 30
 * @see my_salon_portfolio  - 40
 * @see my_salon_testimonial - 50
*/
add_action( 'my_salon_home_page', 'my_salon_slider_cb', 10 );
add_action( 'my_salon_home_page', 'my_salon_featured', 20 );
add_action( 'my_salon_home_page', 'my_salon_welcome', 30 );
add_action( 'my_salon_home_page', 'my_salon_portfolio', 40 );
add_action( 'my_salon_home_page', 'my_salon_testimonial', 50 );

if( ! function_exists( 'my_salon_content_start' ) ) :
/**
 * Content Start
 * 
 * @since 1.0.0
*/
function my_salon_content_start(){ 
    $ed_slider = get_theme_mod( 'my_salon_ed_slider','1' );
    $class = is_404() ? 'error-holder' : 'row' ;
    
    if( !( $ed_slider && is_front_page() && !is_home()) ){
    ?>
    <div id="content" class="site-content">
        <div class="container">
             <div class="<?php echo esc_attr( $class ); ?>">
    <?php
    }
}
endif;
add_action( 'my_salon_before_content','my_salon_content_start' );

if( ! function_exists( 'my_salon_page_content_image' ) ) :
/**
 * Page Featured Image
 * 
 * @since 1.0.0
*/
function my_salon_page_content_image(){
    $sidebar_layout = my_salon_sidebar_layout();
    if( has_post_thumbnail() ){
        echo '<div class="post-thumbnail">';
            if( is_active_sidebar( 'right-sidebar' ) && ( $sidebar_layout == 'right-sidebar' ) ) {
                the_post_thumbnail( 'my-salon-no-sidebar' );    
            }
        echo '</div>';
    }
}
endif;

add_action( 'my_salon_before_page_entry_content', 'my_salon_page_content_image' );

if( ! function_exists( 'my_salon_post_content_image' ) ) :
/**
 * Post Featured Image
 * 
 * @since 1.0.0
*/
function my_salon_post_content_image(){
    if( has_post_thumbnail() ){
    echo ( !is_single() ) ? '<a href="' . esc_url( get_the_permalink() ) . '" class="post-thumbnail">' : '<div class="post-thumbnail">'; 
         ( is_active_sidebar( 'right-sidebar' ) ) ? the_post_thumbnail( 'my-salon-with-sidebar' ) : the_post_thumbnail( 'my-salon-without-sidebar' ) ; 
    echo ( !is_single() ) ? '</a>' : '</div>' ;    
    }
}
endif;

if( ! function_exists( 'my_salon_post_entry_header' ) ) :
/**
 * Post Entry Header
 * 
 * @since 1.0.0
*/
function my_salon_post_entry_header(){
    ?>
    
    <header class="entry-header">
        <?php
            if ( is_single() ) {
                the_title( '<h1 class="entry-title">', '</h1>' );
            } else {
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            }

        if ( 'post' === get_post_type() ) : ?>
        <div class="entry-meta">
            <?php  
                my_salon_posted_on(); 
                my_salon_categories();
                my_salon_comments();
            ?>
        </div><!-- .entry-meta -->
        <?php
        endif; ?>
    </header>

    <?php
}
endif;

/**
 * Before Post entry content
 * 
 * @see my_salon_post_content_image - 10
 * @see my_salon_post_entry_header  - 20
*/
add_action( 'my_salon_before_post_entry_content', 'my_salon_post_content_image', 10 ); 
add_action( 'my_salon_before_post_entry_content', 'my_salon_post_entry_header', 20 ); 

if( ! function_exists( 'my_salon_archive_entry_header_before' ) ) :
/**
 * Archive Entry Header
 * 
 * @since 1.0.0
*/
function my_salon_archive_entry_header_before(){
    echo '<div class = "text-holder" >';
}    
endif;   
    
if( ! function_exists( 'my_salon_archive_entry_header' ) ) :
/**
 * Archive Entry Header
 * 
 * @since 1.0.0
*/
function my_salon_archive_entry_header(){
    ?>
    <header class="entry-header">
        <div class="entry-meta">
            <?php my_salon_posted_on_date(); ?>
        </div><!-- .entry-meta -->
        <h2 class="entry-title"><a href="<?php the_permalink(); ?> "><?php the_title(); ?></a></h2>
    </header>   
    <?php
}
endif;

if( ! function_exists( 'my_salon_post_author' ) ) :
/**
 * Post Author Bio
 * 
 * @since 1.0.0
*/
function my_salon_post_author(){
    if( get_the_author_meta( 'description' ) ){
        global $post;
    ?>
    <section class="author-section">
        <div class="img-holder"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></div>
            <div class="text-holder">
                <strong class="name"><?php the_author_meta( 'display_name', $post->post_author ); ?></strong>
                <?php the_author_meta( 'description' ); ?>
            </div>
    </section>
    <?php  
    }  
}
endif;

if( ! function_exists( 'my_salon_get_comment_section' ) ) :
/**
 * Comment template
 * 
 * @since 1.0.0
*/
function my_salon_get_comment_section(){
    // If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
        comments_template();
    endif;
}
endif;

if( ! function_exists( 'my_salon_content_end' ) ) :
/**
 * Content End
 * 
 * @since 1.0.0
*/
function my_salon_content_end(){

    $ed_slider = get_theme_mod( 'my_salon_ed_slider','1' );
    
    if( !( $ed_slider && is_front_page() && ! is_home() ) ){
        echo '</div></div></div>';// .row /#content /.container
    }
}
endif;
add_action( 'my_salon_after_content','my_salon_content_end' );

if( ! function_exists( 'my_salon_footer_start' ) ) :
/**
 * Footer Start
 * 
 * @since 1.0.0
*/
function my_salon_footer_start(){
    echo '<footer id="colophon" class="site-footer" role="contentinfo">';

}
endif;


if( ! function_exists( 'my_salon_footer_widgets' ) ) :
/**
 * Footer Widgets
 * 
 * @since 1.0.0 
*/
function my_salon_footer_widgets(){
    if( is_active_sidebar( 'footer-one' ) || is_active_sidebar( 'footer-two' ) || is_active_sidebar( 'footer-three' ) ){?>
        <div class="widget-area">
            <div class="container">
                <div class="row">
                    
                    <?php if( is_active_sidebar( 'footer-one' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-one' ); ?>
                    </div>
                    <?php } ?>
                    
                    <?php if( is_active_sidebar( 'footer-two' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-two' ); ?>
                    </div>
                    <?php } ?>
                    
                    <?php if( is_active_sidebar( 'footer-three' ) ){ ?>
                    <div class="col-4">
                        <?php dynamic_sidebar( 'footer-three' ); ?>
                    </div>
                    <?php } ?>
                    
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .widget-area -->
<?php } 
}
endif;

if( ! function_exists( 'my_salon_footer_credit' ) ) :
/**
 * Footer Credits 
 */

function my_salon_footer_credit(){
    echo '<div class="footer-b">';
        echo '<div class="site-info">'; 
            echo '<div class="container">';
                echo '<span class="left">';
                    echo esc_html( '&copy;&nbsp;'. date_i18n( 'Y' ), 'my-salon' );
                        echo ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';
                        printf( '&nbsp;%s', '<a href="'. esc_url( __( 'http://astaporthemes.com/downloads/my-salon-free-theme/', 'my-salon' ) ) .'" target="_blank">'. esc_html__( 'My Salon By Astapor Theme. ', 'my-salon' ) .'</a>' );
                echo '</span>';
                echo '<span class="right">';
                    printf( esc_html__( 'Powered by %s', 'my-salon' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'my-salon' ) ) .'" target="_blank">'. esc_html__( 'WordPress', 'my-salon' ) . '</a>' );
                echo '</span>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
}
endif;

if( ! function_exists( 'my_salon_footer_end' ) ) :
/**
 * Footer End
 * 
 * @since 1.0.0 
*/
function my_salon_footer_end(){
    echo '</footer>'; // #colophon 
}
endif;


add_action( 'my_salon_footer', 'my_salon_footer_start', 10 );
add_action( 'my_salon_footer', 'my_salon_footer_widgets', 20 );
add_action( 'my_salon_footer', 'my_salon_footer_credit', 30 );
add_action( 'my_salon_footer', 'my_salon_footer_end', 40 );