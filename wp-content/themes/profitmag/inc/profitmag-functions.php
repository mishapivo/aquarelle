<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package ProfitMag
 */

// Register Widgetized Area
function profitmag_widget_init() {
    
    register_sidebar( array(
        'name' => __( 'Right Sidebar Top', 'profitmag' ),
        'id'   => 'right-sidebar-top',
        'description' => 'Displays items on top of the sidebar.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Right Sidebar Middle', 'profitmag' ),
        'id'   => 'right-sidebar-middle',
        'description' => 'Displays items on middle of the sidebar.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    
    
    
    register_sidebar( array(
        'name' => __( 'Left Sidebar Top', 'profitmag' ),
        'id'   => 'left-sidebar-top',
        'description' => 'Displays items on top of the sidebar.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Left Sidebar Middle', 'profitmag' ),
        'id'   => 'left-sidebar-middle',
        'description' => 'Displays items on middle of the sidebar.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Home Popular Widget Area', 'profitmag' ),
        'id'   => 'home-popular',
        'description' => 'Displays MT Popular Widgets on home page.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column One', 'profitmag' ),
        'id'   => 'fo-top-col-one',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column Two', 'profitmag' ),
        'id'   => 'fo-top-col-two',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column Three', 'profitmag' ),
        'id'   => 'fo-top-col-three',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column Four', 'profitmag' ),
        'id'   => 'fo-top-col-four',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
   
    register_sidebar( array(
        'name' => __( 'Footer Top Column Five', 'profitmag' ),
        'id'   => 'fo-top-col-five',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    
    register_sidebar( array(
        'name' => __( 'Footer Top Column Six', 'profitmag' ),
        'id'   => 'fo-top-col-six',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    
    
    register_sidebar( array(
        'name' => __( 'Footer Bottom Column One', 'profitmag' ),
        'id'   => 'fo-bottom-col-one',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Bottom Column Two', 'profitmag' ),
        'id'   => 'fo-bottom-col-two',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Bottom Column Three', 'profitmag' ),
        'id'   => 'fo-bottom-col-three',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    register_sidebar( array(
        'name' => __( 'Footer Bottom Column Four', 'profitmag' ),
        'id'   => 'fo-bottom-col-four',
        'description' => 'Displays items on top footer section.',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title"><span>',
		'after_title'   => '</span></h3>',     
    ) );
    
    
    
    
}
add_action( 'widgets_init', 'profitmag_widget_init' );

// Script Style enqueue functions
function profitmag_theme_scripts() {
    
    $profitmag_settings = get_option( 'profitmag_options' );        
       
    wp_enqueue_script( 'jquery' );   
    wp_enqueue_script( 'bxslider-js', get_template_directory_uri().'/js/jquery.bxslider.js',array( 'jquery' ),'', true );
    wp_enqueue_script( 'ticker-js', get_template_directory_uri().'/js/jquery.ticker.js',array( 'jquery' ),'', true );        
    wp_enqueue_script( 'nivolightbox-js', get_template_directory_uri().'/js/nivo-lightbox.min.js', array('jquery') );
    wp_enqueue_script( 'scrolljs', get_template_directory_uri() . '/js/jquery.mCustomScrollbar.min.js', array('jquery'), '1.0.0', true );
    wp_enqueue_script( 'mousewheeljs', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery'), '2.0.19', true );               
    wp_enqueue_script( 'slicknav-js', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array() );
    wp_enqueue_script( 'mordenizer', get_template_directory_uri() . '/js/modernizr.min.js', array(), '2.6.2', false );
    wp_enqueue_script( 'profitmag-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );    
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0', true );
        
    wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/font-awesome.min.css' );      
    wp_enqueue_style( 'bxslider-style', get_template_directory_uri().'/css/jquery.bxslider.css' );    
    wp_enqueue_style( 'ticker-style', get_template_directory_uri().'/css/ticker-style.css' );    
    wp_enqueue_style( 'noivolightbox-style', get_template_directory_uri().'/css/nivo-lightbox.css' );
    wp_enqueue_style( 'scrollcss', get_template_directory_uri() . '/css/jquery.mCustomScrollbar.css' );
    wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/css/slicknav.css' );
    

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
    wp_enqueue_style( 'google font', 'http://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' );
    wp_enqueue_style( 'profitmag-style', get_stylesheet_uri() );  
    if( !empty( $profitmag_settings) ) {
        if( $profitmag_settings[ 'responsive_design' ] == 0 ) {
            wp_enqueue_style( 'profitmag-responsive', get_template_directory_uri().'/css/responsive.css' );
        }                
    }  
    
}
add_action( 'wp_enqueue_scripts', 'profitmag_theme_scripts' );

// Load favicon
function profitmag_favicon() {            
    $profitmag_settings = get_option( 'profitmag_options' );
    
    if( !empty( $profitmag_settings[ 'media_upload'])) {
        echo '<link rel="shortcut icon" type="image/png" href="'.$profitmag_settings[ 'media_upload' ].'"/>';
    }
}
add_action( 'wp_head', 'profitmag_favicon' );


// Web Layout
function profitmag_web_layout( $classes ) {
    
    $profitmag_settings = get_option( 'profitmag_options');
    
    if( !empty( $profitmag_settings ) ) {
        if( $profitmag_settings[ 'webpage_layout' ] == 'Boxed' ) {
            $classes[] = 'boxed-layout';
        }    
    }
    
    
    return $classes;
}
add_filter( 'body_class', 'profitmag_web_layout' );


// Home page slider
function profitmag_slider_fu() {
    if( is_home() || is_front_page() ) {
        $profitmag_settings = get_option( 'profitmag_options' );
        if( !empty( $profitmag_settings ) ) {
            $show_controls = $profitmag_settings['slider_show_controls'] == 'yes' ? 'true' : 'false' ;
            $slider_auto = $profitmag_settings['slider_auto'] == 'yes' ? 'true' : 'false' ;
            $slider_speed = $profitmag_settings['slider_speed'];            
?>
          <?php  
            if((isset($profitmag_settings['slider1']) && !empty($profitmag_settings['slider1'])) 
			|| (isset($profitmag_settings['slider2']) && !empty($profitmag_settings['slider2'])) 
			|| (isset($profitmag_settings['slider3']) && !empty($profitmag_settings['slider3']))
			|| (isset($profitmag_settings['slider4']) && !empty($profitmag_settings['slider4'])) 
			|| (isset($profitmag_settings['slider_cat']) && !empty($profitmag_settings['slider_cat']))
            ){
            ?>
            <script type="text/javascript">
                jQuery(document).ready(function() {
                    
                    jQuery('.home-bxslider').bxSlider( {
                        speed: <?php echo $slider_speed; ?>,
                        auto: <?php echo $slider_auto; ?>,
                        controls: <?php echo $show_controls; ?>,
                        pager: false,
                        
                    });
                })
            </script>
            
            <?php
            if($profitmag_settings['slider_options'] == 'single_post_slider'){
            	if(!empty($profitmag_settings['slider1']) || !empty($profitmag_settings['slider2']) || !empty($profitmag_settings['slider3']) || !empty($profitmag_settings['slider4'])){
            		$sliders = array($profitmag_settings['slider1'],$profitmag_settings['slider2'],$profitmag_settings['slider3'],$profitmag_settings['slider4']);
					$remove = array(0);
				    $sliders = array_diff($sliders, $remove);  ?>
                    <div class="slider-section">
                        <ul class="home-bxslider">	
            <?php
					foreach ($sliders as $slider){
    					$args = array (
    					'p' => $slider
    					);
    					$slider_query=new WP_Query( $args );
    					if( $slider_query->have_posts() ):
    				?>
    					   
                            
    						<?php
    							while( $slider_query->have_posts() ): $slider_query->the_post();
    								$image_url=wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-slider' );
                                    $content=substr( get_the_content(), 0, 95 );
                                    $content=substr($content,0,strrpos($content," "));
    						?>
    										
    								<li>
                                        <img src="<?php echo $image_url[0]; ?>" />
                                        <div class="slider-desc">
                                            <div class="slide-date">
                                                <i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?>
                                            </div>
                                            <div class="slider-details">
                                            <div class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>                                            
                                            <div class="slide-caption"><?php echo $content; ?></div>
                                            </div>
                                        </div>
                                    </li>
    
    					<?php endwhile; ?>    						    						
    				<?php endif; ?>
        <?php   } wp_reset_postdata(); ?>        
                    </ul>
             </div>
<?php
            }
        }else {
?>
            <div class="slider-section">
                <ul class="home-bxslider">	
                    <?php
        				if( $profitmag_settings['slider_cat'] != '0') {	
            					$args = array (
            					'cat' => $profitmag_settings['slider_cat'],
                                'posts_per_page' => 5,
            					);
            					$slider_query=new WP_Query( $args );
            					if( $slider_query->have_posts() ):
            				?>
            					   
                                    
            						<?php
            							while( $slider_query->have_posts() ): $slider_query->the_post();
            								$image_url=wp_get_attachment_image_src( get_post_thumbnail_id(), 'home-slider' );
            						?>
            										
            								<li>
                                                <img src="<?php echo $image_url[0]; ?>" />
                                                <div class="slider-desc">
                                                    <div class="slide-date">
                                                        <i class="fa fa-calendar"></i><?php echo get_the_date( 'F d, Y') ; ?>
                                                    </div>
                                                    <div class="slide-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                                    <div class="slide-caption"></div>
                                                </div>
                                            </li>
            
            					<?php endwhile; ?>    	
            				<?php endif; ?>  
                <?php  } ?>                      
                </ul>
            </div>
<?php
            }
            wp_reset_postdata();
        }
     }
    }
}
add_action( 'profitmag_slider', 'profitmag_slider_fu' );


// Featured Post beside slider in Home Page
function profitmag_beside_posts() {
    if( is_home() || is_front_page() ){
        $profitmag_settings = get_option( 'profitmag_options' );
        if( !empty( $profitmag_settings ) && $profitmag_settings['featured_block_beside']>0 ) {
            $beside_query= new WP_Query( 'cat='.$profitmag_settings['featured_block_beside'].'&posts_per_page=4' );
            if( $beside_query->have_posts()) {
?>
                <div class="besides-block">
<?php
                while( $beside_query->have_posts() ) {
                    $beside_query->the_post();
                    $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'slider-beside' );
?>
                    <div class="beside-post clearfix">
                        <a href="<?php the_permalink(); ?>">
                            <figure class="beside-thumb clearfix">
                                <img src="<?php echo $image_url[0]; ?>" alt="<?php echo the_title_attribute(); ?>" title="<?php echo the_title_attribute(); ?>"/>
                                <div class="overlay"></div>
                            </figure>
                            <div class="beside-caption clearfix">
                                <h3 class="post-title"><?php the_title(); ?></h3>
                                <div class="post-date"><i class="fa fa-calendar"></i><?php echo get_the_date('F d, Y'); ?></div>
                            </div>
                        </a>
                    </div>
<?php
                }
?>
                </div><!-- .beides-block -->
<?php    
            }
            wp_reset_postdata();
        }
    }
    
}
add_action( 'profitmag_featured_post_beside', 'profitmag_beside_posts' );


// Social Links
function profitmag_social_cb(){ 
		
        $settings = get_option( 'profitmag_options' );
		?>
		<div class="socials">
    		<?php if(!empty($settings['facebook'])){ ?>
    		<a href="<?php echo esc_url($settings['facebook']); ?>" class="facebook" data-title="Facebook" target="_blank"><span class="font-icon-social-facebook"><i class="fa fa-facebook"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['twitter'])){ ?>
    		<a href="<?php echo esc_url($settings['twitter']); ?>" class="twitter" data-title="Twitter" target="_blank"><span class="font-icon-social-twitter"><i class="fa fa-twitter"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['gplus'])){ ?>
    		<a href="<?php echo esc_url($settings['gplus']); ?>" class="gplus" data-title="Google Plus" target="_blank"><span class="font-icon-social-google-plus"><i class="fa fa-google-plus"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['youtube'])){ ?>
    		<a href="<?php echo esc_url($settings['youtube']); ?>" class="youtube" data-title="Youtube" target="_blank"><span class="font-icon-social-youtube"><i class="fa fa-youtube"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['pinterest'])){ ?>
    		<a href="<?php echo esc_url($settings['pinterest']); ?>" class="pinterest" data-title="Pinterest" target="_blank"><span class="font-icon-social-pinterest"><i class="fa fa-pinterest"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['linkedin'])){ ?>
    		<a href="<?php echo esc_url($settings['linkedin']); ?>" class="linkedin" data-title="Linkedin" target="_blank"><span class="font-icon-social-linkedin"><i class="fa fa-linkedin"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['flickr'])){ ?>
    		<a href="<?php echo esc_url($settings['flickr']); ?>" class="flickr" data-title="Flickr" target="_blank"><span class="font-icon-social-flickr"><i class="fa fa-flickr"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['vimeo'])){ ?>
    		<a href="<?php echo esc_url($settings['vimeo']); ?>" class="vimeo" data-title="Vimeo" target="_blank"><span class="font-icon-social-vimeo"><i class="fa fa-vimeo-square"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['stumbleupon'])){ ?>
    		<a href="<?php echo esc_url($settings['stumbleupon']); ?>" class="stumbleupon" data-title="Stumbleupon" target="_blank"><span class="font-icon-social-stumbleupon"><i class="fa fa-stumbleupon"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['dribble'])){ ?>
    		<a href="<?php echo esc_url($settings['dribble']); ?>" class="dribble" data-title="dribble" target="_blank"><span class="fa fa-dribbble"><i class="fa fa-dribbble"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['stumbleupon'])){ ?>
    		<a href="<?php echo esc_url($settings['tumblr']); ?>" class="tumblr" data-title="Tumblr" target="_blank"><span class="font-icon-social-tumblr"><i class="fa fa-tumblr"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['instagram'])){ ?>
    		<a href="<?php echo esc_url($settings['instagram']); ?>" class="instagram" data-title="instagram" target="_blank"><span class="fa fa-instagram"><i class="fa fa-instagram"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['sound_cloud'])){ ?>
    		<a href="<?php echo esc_url($settings['sound_cloud']); ?>" class="sound-cloud" data-title="sound-cloud" target="_blank"><span class="font-icon-social-soundcloud"><i class="fa fa-soundcloud"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['skype'])){ ?>
    		<a href="<?php echo esc_attr($settings['skype']); ?>" class="skype" data-title="Skype" target="_blank"><span class="font-icon-social-skype"><i class="fa fa-skype"></i></span></a>
    		<?php } ?>
    
    		<?php if(!empty($settings['rss'])){ ?>
    		<a href="<?php echo esc_url($settings['rss']); ?>" class="rss" data-title="RSS" target="_blank"><span class="font-icon-rss"><i class="fa fa-rss"></i></span></a>
    		<?php } ?>
		</div>
<?php } 
add_action( 'profitmag_social_links', 'profitmag_social_cb', 10 );


/**
 * Custom CSS
 */
function profitmag_custom_css() {
    $profitmag_settings = get_option( 'profitmag_options');
    
    if( !empty( $profitmag_settings['custom_css']) ) {       
        echo '<style type="text/css">';       
        echo $profitmag_settings['custom_css']; 
        echo '</style>';
    }
    
}
add_action( 'wp_head', 'profitmag_custom_css' );

/**
 * Custom Code for analytics
 */
function profitmag_custom_code() {
    $profitmag_settings = get_option( 'profitmag_options');
    
    if( !empty( $profitmag_settings['custom_code']) ) {               
        echo $profitmag_settings['custom_code'];         
    }
    
}
add_action( 'wp_footer', 'profitmag_custom_code' );


/**
 * Menu Alignment
 */
function profitmag_menu_alignment_cb(){
		$profitmag_settings = get_option( 'profitmag_options' );
		if($profitmag_settings['menu_alignment'] =="Right"){
            $profitmag_alignment_class="menu-right";
        }elseif($profitmag_settings['menu_alignment'] == "Center"){
            $profitmag_alignment_class="menu-center";
        }else{
    		$profitmag_alignment_class="menu-left";             	
		}
		echo $profitmag_alignment_class;
	}
add_action('profitmag_menu_alignment','profitmag_menu_alignment_cb');

/**
 * Show related posts 
 */
function profitmag_related_post( $post_id ) {
    $categories = get_the_category( $post_id );    
    if( $categories ) {
        $category_ids = array();
        foreach( $categories as $category ) {
            $category_ids[] = $category->term_id;
        }
        $args = array(
                'category__in' => $category_ids,
                'post__not_in' => array( $post_id ),
                'posts_per_page' => 5,                                
                );
        $related_query = new WP_Query( $args );
        if( $related_query->have_posts() ) {
            echo '<ul>';
            while( $related_query->have_posts()){
                $related_query->the_post();
?>                
                <li><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li> 
               
<?php                
            }
            echo '</ul>'; 
?>    
<?php           
        }else {
?>
            <ul><li><?php _e( 'No related post.', 'profitmag'); ?></li></ul>
<?php            
        }
      wp_reset_postdata();          
    }
} 

/**
 * Comment Form
 */ 
function profitmag_alter_comment_form( $form ) {    
    $required = get_option( 'require_name_email' );    
    $req = $required ? 'aria-required="true"' : '';    
    $form['fields']['author'] = '<p class="comment-form-author"><label for="author"></label><input id="author" name="author" type="text" placeholder="Имя" value="" size="30" '.$req.'/></p>';
    $form['fields']['email'] = '<p class="comment-form-email"><label for="email"></label> <input id="email" name="email" type="email" value="" placeholder="EMAIL" size="30"'.$req.'/></p>';
    $form['fields']['url'] = '<p class="comment-form-url"><label for="url"></label> <input id="url" name="url" placeholder="Сайт" type="url" value="" size="30" /></p>';
    $form['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label> <textarea id="comment" name="comment" placeholder="ВАШ КОММЕНТАРИЙ..." cols="45" rows="8" aria-required="true"></textarea></p>';
    $form['comment_notes_before'] = '';
    $form['label_submit'] = 'Добавить';
    $form['title_reply'] = '<span class="bordertitle-red"></span>Оставить комментарий';
    return $form;
}
add_filter( 'comment_form_defaults', 'profitmag_alter_comment_form' );


/**
 * Comment list Form
 * 
 */
function profitmag_commment_list( $comment, $args, $depth ) { 
    $GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body clearfix">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, '117' ); ?>
	<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'profitmag' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<i class="fa fa-clock-o"></i>
<?php
			/* translators: 1: date, 2: time */
			printf( __('%1$s at %2$s', 'profitmag'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)','profitmag' ), '  ', '' );
		?>
	</div>

	<?php comment_text(); ?>

	<div class="reply">
	<i class="fa fa-thumbs-up"></i>
	<i class="fa fa-thumbs-down"></i>
	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

/**
 * Excerpt length and more text
 */ 
function profitmag_alter_excerpt() {
    return 75;
}
add_filter( 'excerpt_length', 'profitmag_alter_excerpt' );

function profitmag_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'profitmag_excerpt_more' );


/**
 * ProfitMag Pagination
 */ 
function profitmag_pagination() {
    global $wp_query;

    $big = 999999999; // need an unlikely integer
   
    
    echo paginate_links( array(
    	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    	'format' => '?paged=%#%',
    	'current' => max( 1, get_query_var('paged') ),
    	'total' => $wp_query->max_num_pages,        
        'prev_text'    => __('&laquo;', 'profitmag'),
        'next_text'    => __('&raquo;', 'profitmag'),
    ) );
    
}


// retrieves the attachment ID from the file URL
function profitmag_get_image_id($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $attachment[0]; 
}


// Modify Search Form
function profitmag_search_form( $form ) {
	$form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
	<div><label class="screen-reader-text" for="s"></label>
	<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="ИСКАТЬ" />
	<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
	</div>
	</form>';

	return $form;
}

add_filter( 'get_search_form', 'profitmag_search_form' );

function profitmag_sidebar_excerpt( $content ) {
    $content=substr( $content, 0, 70 );
    $content=substr($content,0,strrpos($content," "));
    echo $content;
};

function profitmag_alter_body_class( $classes ) {
    if( is_home() || is_front_page() ) {
        $sidebar_layout = 'right_sidebar';    
    }else {
        $profitmag_settings = get_option( 'profitmag_options' );
        if( isset( $profitmag_settings['sidebar_layout'] )) {
            $sidebar_layout = $profitmag_settings['sidebar_layout'];    
        }else {
            $sidebar_layout = 'no_sidebar';
        }    
    }    
    
    $classes[] = $sidebar_layout;
    return $classes;
}
add_filter( 'body_class', 'profitmag_alter_body_class' );