<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Legal Adviser Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$legal_adviser_lite_sldrshow 	  		            = get_theme_mod('legal_adviser_lite_sldrshow', false);
$legal_adviser_lite_anablesrv_section 	  	        = get_theme_mod('legal_adviser_lite_anablesrv_section', false);
$show_legal_adviser_lite_aboutmepge	            = get_theme_mod('show_legal_adviser_lite_aboutmepge', false);
$legal_adviser_lite_anable_social 	  			    = get_theme_mod('legal_adviser_lite_anable_social', false);
$legal_adviser_lite_show_top_contactdetails 	  		= get_theme_mod('legal_adviser_lite_show_top_contactdetails', false);
?>
<div id="sitelayout_type" <?php if( get_theme_mod( 'legal_adviser_lite_boxlayout_option' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($legal_adviser_lite_sldrshow)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo $inner_cls; ?>"> 

<div class="header-contactpart">
  <div class="container">
   <?php if(!dynamic_sidebar('headerinfowidget')): ?>
     <div class="left">
     <?php if( $legal_adviser_lite_show_top_contactdetails != ''){ ?>                                  
       <?php 
	   $legal_adviser_lite_header_phoneno = get_theme_mod('legal_adviser_lite_header_phoneno');
	   if( !empty($legal_adviser_lite_header_phoneno) ){ ?>           		  
	   		<span class="phoneno"><i class="fas fa-phone-square"></i><?php echo esc_html($legal_adviser_lite_header_phoneno); ?></span>   
       <?php } ?>               
       <?php
	   $legal_adviser_lite_header_emailid = get_theme_mod('legal_adviser_lite_header_emailid');
	   if( !empty($legal_adviser_lite_header_emailid) ){ ?>           		 
	   		<i class="fas fa-envelope"></i>
	   		<a href="<?php echo esc_url('mailto:'.get_theme_mod('legal_adviser_lite_header_emailid')); ?>"><?php echo esc_html(get_theme_mod('legal_adviser_lite_header_emailid')); ?></a>                 
       <?php } ?>
       <?php } ?>    	
     </div>
     
     <div class="right">
      <?php if( $legal_adviser_lite_anable_social != ''){ ?> 
        <div class="social-icons">                                                
                   <?php $legal_adviser_lite_fb_link = get_theme_mod('legal_adviser_lite_fb_link');
                    if( !empty($legal_adviser_lite_fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($legal_adviser_lite_fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $legal_adviser_lite_twitt_link = get_theme_mod('legal_adviser_lite_twitt_link');
                    if( !empty($legal_adviser_lite_twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($legal_adviser_lite_twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $legal_adviser_lite_gplus_link = get_theme_mod('legal_adviser_lite_gplus_link');
                    if( !empty($legal_adviser_lite_gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($legal_adviser_lite_gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $legal_adviser_lite_linked_link = get_theme_mod('legal_adviser_lite_linked_link');
                    if( !empty($legal_adviser_lite_linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($legal_adviser_lite_linked_link); ?>"></a>
                  <?php } ?>                  
               </div><!--end .social-icons--> 
    <?php } ?> 
    </div>
     <div class="clear"></div>
    <?php endif; ?>
  </div>
</div><!--end header-contactpart-->
      
<div class="siteheader">
<div class="container">    
     <div class="logo">
        <?php legal_adviser_lite_the_custom_logo(); ?>
        <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div><!-- logo -->
     <div class="header_navarea">
       <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','legal-adviser-lite'); ?></a>
       </div><!-- toggle --> 
       <div class="sitenav">                   
         <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
       </div><!--.sitenav -->
     </div><!--.header_navarea -->
<div class="clear"></div>  

</div><!-- container --> 
</div><!-- .siteheader -->  
</div><!--.site-header --> 

<?php 
if ( is_front_page() && !is_home() ) {
if($legal_adviser_lite_sldrshow != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('legal_adviser_lite_sldrpge'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('legal_adviser_lite_sldrpge'.$i,true));
	  }
	}
?> 
<div class="hdr_slider">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo $i; ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo $j; ?>" class="nivo-html-caption">        
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
    <?php
    $legal_adviser_lite_sldrmore = get_theme_mod('legal_adviser_lite_sldrmore');
    if( !empty($legal_adviser_lite_sldrmore) ){ ?>
    	<a class="slide_more" href="<?php the_permalink(); ?>"><?php echo esc_html($legal_adviser_lite_sldrmore); ?></a>
    <?php } ?>       
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>  
</div><!--end .hdr_slider -->     
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
if( $legal_adviser_lite_anablesrv_section != ''){ ?>  
<section id="services_3col_section">
<div class="container">                      
<?php 
for($n=1; $n<=3; $n++) {    
if( get_theme_mod('legal_adviser_lite_srvpgebx'.$n,false)) {      
	$queryvar = new WP_Query('page_id='.absint(get_theme_mod('legal_adviser_lite_srvpgebx'.$n,true)) );		
	while( $queryvar->have_posts() ) : $queryvar->the_post(); ?> 
    
	<div class="services_3col_box <?php if($n % 3 == 0) { echo "last_column"; } ?>">                                    
		<?php if(has_post_thumbnail() ) { ?>
		<div class="services_imgcolumn"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>
		<?php } ?>
		<div class="services_content_column">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                                     
		<?php the_excerpt(); ?>
		 <a class="learnmore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','legal-adviser-lite'); ?></a>                                  
		</div>                                   
	</div>
	<?php endwhile;
	wp_reset_postdata();                                  
} } ?>                                 
<div class="clear"></div>  
</div><!-- .container -->                  
</section><!-- #services_3col_section-->                      	      
<?php } ?>


<?php if( $show_legal_adviser_lite_aboutmepge != ''){ ?>  
<section id="aboutme_section">
<div class="container">                               
<?php 
if( get_theme_mod('legal_adviser_lite_aboutmepge',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('legal_adviser_lite_aboutmepge',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>   
                              
     <div class="aboutme_descarea">   
     <h3><?php the_title(); ?></h3>   
     <?php the_content(); ?>     
    </div> 
    <div class="aboutme_imagebx"><?php the_post_thumbnail();?></div>                                        
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #aboutme_section-->
<?php } ?>
<?php } ?>