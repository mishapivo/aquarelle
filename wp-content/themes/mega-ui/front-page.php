
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mega-ui
 */
if ( 'posts' == get_option( 'show_on_front' ) ) {
if ( 'page' === get_option( 'show_on_front' ) && get_option( 'page_for_posts' )!='0') {
	$mega_ui_posts_page= get_permalink( get_option( 'page_for_posts' ) );
}else{
	$mega_ui_posts_page = '';
}
$mega_ui_display_banner= get_theme_mod('mega_ui_display_banner', '0');
$mega_ui_display_service=  get_theme_mod('mega_ui_display_service','0');
$mega_ui_display_cta=  get_theme_mod('mega_ui_display_cta','0');
$mega_ui_cta_page=  get_theme_mod('mega_ui_cta_page');
$mega_ui_blog_title = get_theme_mod('mega_ui_blog_title','Latest Posts');
$mega_ui_cta_btn = get_theme_mod('mega_ui_cta_btn','Get In Touch');
get_header();
if($mega_ui_display_banner=='1'){
	$mega_ui_banner_post = get_theme_mod('mega_ui_banner_post');
$mega_ui_banner_args= array('post_type' =>'post','post__in' => array($mega_ui_banner_post));
$mega_ui_banner= new WP_Query($mega_ui_banner_args); 
if($mega_ui_banner->have_posts()){ ?>
<div class="mega-ui-back">
<?php while($mega_ui_banner->have_posts()){
$mega_ui_banner->the_post(); ?>
<div class="mega-ui-banner" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');">
</div>
<div class="banner-overlay">
		<div class="container">
		<h1 class="banner-title white"><?php echo esc_html(get_the_title()); ?></h1>
		<p class="banner-desc white"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 25)); ?></p>
		<a class="btn btn-primary btn-md waves-effect waves-light" href="<?php echo esc_url(get_the_permalink()); ?>"><?php esc_html_e('Read More','mega-ui'); ?></a>
		</div>
	</div>
<?php } ?>
</div>
<?php } wp_reset_postdata();
}?>
<?php if($mega_ui_display_service=='1'){ 
	$mega_ui_service_title= get_theme_mod('mega_ui_service_title','Our Services');
	$mega_ui_service_pages= get_theme_mod('mega_ui_service_pages'); ?>
<div class="mega-ui-services update">
	<div class="container">
		<?php if($mega_ui_service_title!=''){ ?>
		<div class="col-md-12 mega-ui-heading text-center">
			<h1 class="md32 xs24 w600"><?php echo esc_html($mega_ui_service_title); ?></h1>
		</div>
	<?php } 
	if(isset($mega_ui_service_pages) && is_array($mega_ui_service_pages)){
		$mega_ui_service_args= array('post_type' =>'page','post__in' => $mega_ui_service_pages);
$mega_ui_services= new WP_Query($mega_ui_service_args);
if($mega_ui_services->have_posts()){ ?>
		<div class="row">
			<?php while($mega_ui_services->have_posts()){ $mega_ui_services->the_post(); ?>
			<div class="col-md-3 col-sm-6 col-xs-12 mt3 mega-service">
				<div class="card text-center">
					<div class="card-body">
						<h4 class="card-title"><a class="blue2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>	
						<p class="card-text xsmb0"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 25)); ?></p>
					</div>
					<div class="card-bottom">
						<a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','mega-ui'); ?></a>
					</div>
				</div>
			</div>
		<?php } ?>
		</div>
		<?php } wp_reset_postdata();	
	} ?>	
	</div>
</div>
<?php } ?>

<div class="blog-ui-section">
	<div class="container">
		<div class="row ">
			<?php $mega_ui_blog_args= array('post_type'=>'post','posts_per_page' =>6, 'post__not_in' => get_option( 'sticky_posts' )); 
	$mega_ui_blog= new WP_Query($mega_ui_blog_args);
	if($mega_ui_blog->have_posts()){ ?>
			<div class="col-md-12 col-sm-12">
				<div class="row">
					<?php if($mega_ui_blog_title!=''){ ?>
						<div class="col-md-12 mega-ui-heading text-center mt2">
						<h1 class="md32 xs24 w600"><?php echo esc_html($mega_ui_blog_title); ?></h1>
					</div>
					<?php } while($mega_ui_blog->have_posts()){
						$mega_ui_blog->the_post();
						if(has_post_thumbnail()){ ?>
							<div class="col-md-4 col-sm-6 col-xs-12 mt2 blog4-box image-blog">
							<div class="card text-left">
								<div class="card-body">
									<?php $data= array('class' =>'img-fluid center-block'); 
									the_post_thumbnail('mega_ui_thumb', $data); ?>
									<div class="overlay-text">
										<div class="text">
											<h4 class="card-title"><a class="blue2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>	
											<p class="card-text xsmb0"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 25)); ?></p>
										</div>
									</div>			
								</div>				
								<div class="card-bottom">
									<div class="comment md15 sm14 xs14 w600"><span><i class="fa fa-comment"></i><br/><?php echo esc_html(get_comments_number()); ?></span></div>
									<ul class="list-style-two pull-left">
										<li><span class="icon">
											<div class="profile"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><?php echo get_avatar( get_the_author_meta('email') , 150, 'monsterid', get_the_author(), array('class'=>'img-fluid center-block') ); ?></a></div>
											</span>
											<p class="xsmb0"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><?php the_author(); ?></a></p><p class="xsmb0"><i class="fa fa-clock-o"></i> <?php echo esc_html(human_time_diff( get_the_time('U'), current_time('timestamp') )) .' '. esc_html__(' ago','mega-ui'); ?></p>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<?php }else{ ?>
						<div class="col-md-4 col-sm-6 col-xs-12 mt2 blog4-box">
							<div class="card text-left">
								<div class="card-body">
									<h4 class="card-title"><a class="blue2" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>	
									<p class="card-text xsmb0"><?php echo esc_html(get_the_excerpt()); ?></p>
								</div>
															
								<div class="card-bottom">	
									<div class="comment md15 sm14 xs14 w600"><span><i class="fa fa-comment"></i><br/><?php echo esc_html(get_comments_number()); ?></span></div>
									<ul class="list-style-two pull-left">
										<li><span class="icon">
											<div class="profile"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><?php echo get_avatar( get_the_author_meta('email') , 150, 'monsterid', get_the_author(), array('class'=>'img-fluid center-block') ); ?></a></div>
											</span>
											<p class="xsmb0"><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ))); ?>"><?php the_author(); ?></a></p><p class="xsmb0"><i class="fa fa-clock-o"></i> <?php echo esc_html(human_time_diff( get_the_time('U'), current_time('timestamp') )) .' '. esc_html__(' ago','mega-ui'); ?></p>
										</li>
									</ul>
								</div>
							</div>
						</div>
					<?php } } ?>				
					</div>
				</div>
				<?php if($mega_ui_posts_page!=''){ ?>
			<div class="col-md-12">
				<div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-10 offset-sm-1 mt3"> 
				<div class="mybutton5">
					<a href="<?php echo esc_url($mega_ui_posts_page); ?>" class="btn md14 xs13 w700 lh130 text-center white"><?php esc_html_e('View More Posts','mega-ui'); ?></a>
				</div>
			</div>
		</div>
	<?php } } wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php if($mega_ui_display_cta==1 && isset($mega_ui_cta_page) && $mega_ui_cta_page!=''){ ?>
<div class="call2 mt3">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 white">
                <h3 class="md33 sm25 xs20 w300 lh140"><?php echo esc_html( get_the_title( $mega_ui_cta_page )); ?></h3>                   
            </div>
			
			<div class="col-md-4 text-center">              
                <a class="btn btn-default" href="<?php echo esc_url(get_the_permalink($mega_ui_cta_page)); ?>" role="button"><?php esc_html_e( $mega_ui_cta_btn, 'mega-ui' ); ?></a>
            </div>
		</div>
	</div>
</div>
<?php } get_footer();
} else {
    include( get_page_template() );
} ?>