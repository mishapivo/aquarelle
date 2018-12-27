<?php

if ( !function_exists('st_blog_social_media') ) :

 /**
  * Social Media
  *
  * @since st-blog 1.0.0
  *
  * @param null
  * @return null
  *
  */
 function st_blog_social_media()
 {
 	global $st_blog_customizer_all_values;
 	$st_blog_social_media_link1   =  $st_blog_customizer_all_values['st-blog-social-link1'];
 	$st_blog_social_media_link2   =  $st_blog_customizer_all_values['st-blog-social-link2'];
  $st_blog_social_media_link3   =  $st_blog_customizer_all_values['st-blog-social-link3'];
 	$st_blog_social_media_link4   =  $st_blog_customizer_all_values['st-blog-social-link4'];

 	if( 1 != $st_blog_customizer_all_values['st-blog-enable-social-media'] )
 	{
 		return null;
 	}
  if(!empty($st_blog_social_media_link1) || !empty($st_blog_social_media_link2) || !empty($st_blog_social_media_link3) || !empty($st_blog_social_media_link4)) {
 	?>
 
 	<section id="st-blog-social-icons" class="mb-5">
		<div class="container site-content pt-1">
			<div class="menu-social-nav-container">
				<ul id="social-nav" class="menu">
          <?php if( !empty($st_blog_social_media_link1)  ) {?>
					<li><a href="<?php echo esc_url($st_blog_social_media_link1); ?>" target="_blank"></a></li>
          <?php } ?>
          <?php if( !empty($st_blog_social_media_link2)  ) {?>
          <li><a href="<?php echo esc_url($st_blog_social_media_link2); ?>" target="_blank"></a></li>
          <?php } ?>
          <?php if( !empty($st_blog_social_media_link3)  ) {?>
          <li><a href="<?php echo esc_url($st_blog_social_media_link3); ?>" target="_blank"></a></li>
          <?php } ?>
          <?php if( !empty($st_blog_social_media_link4)  ) {?>
          <li><a href="<?php echo esc_url($st_blog_social_media_link4); ?>" target="_blank"></a></li>
          <?php } ?>
				</ul>
			</div>
		</div>
	</section>
 	<?php
  }//end if !empty
 }
endif;
add_action('st_blog_action_front_page','st_blog_social_media',50);

