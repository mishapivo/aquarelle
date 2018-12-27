<?php
function theme_guide(){
add_theme_page( 'Theme guide','Setup Guide','edit_themes', 'theme-documentation', 'w2f_theme_guide');
}
add_action('admin_menu', 'theme_guide');

function w2f_theme_guide(){
		echo '
		
<div id="welcome-panel" class="about-wrap">



	<div class="welcome-panel-content">
	
	<h1> '.wp_get_theme().' WordPress theme</h1>

	
		<p class="about-text"> '.wp_get_theme().' is a video sharing WordPress theme from fabthemes.com. This is a responsive theme built on <b>Bootstrap 3</b> framework. This theme is ideal to publish video content on your site. You can embed videos from popular video sites like youtube.com, vimeo.com etc and also upload and publish your own video files.  </p>
		
		<hr>
		<div class="changelog ">
			<h3>Required plugins </h3>
			<p>The theme requires few plugins to work the way it is originally intended to. You will find a notification on the admin panel prompting you to install the required plugins. Please install and activate the plugins.  </p>
			<ul>
				<li><a href="http://wordpress.org/extend/plugins/options-framework/">Options framework</a></li>
				<li> <a href="http://wordpress.org/plugins/featured-video-plus/">Featured video plus</a> </li>
				<li> <a href="http://wordpress.org/plugins/wp-postviews/">WP-postviews</a> </li>
				<li> <a href="http://www.themezilla.com/plugins/zillalikes/">Zilla Likes</a> </li>
			</ul>

		</div>

		<div class="changelog ">
			<h3>Theme setup</h3>
			
			<p> Upload the theme to the themes directory of your WordPress installation and activate it. Also install and activate the required plugins listed above.  </p>
			<iframe width="640" height="360" src="//www.youtube.com/embed/f8E_zmlDU8M" frameborder="0" allowfullscreen></iframe>
			<div class="feature-section col two-col"> 
				<div class="col-1">
				
				<h4> Create video posts </h4>
				<p>You will find the Video tab on the admin panel just below the Posts tab. Click on Add new video. In the post editor Enter your video post title and content. Select or create a genre for your video post. To add the video use the "Featured Video" metabox available of the right sidebar. Enter your video url from youtube or vimeo. This automatically set your video thumbnail. If you upload your own video file, remember to add the video thumbnail as the featured image.  </p>
				</div>
				<div class="col-2 last-feature">
					
					<h4>Setting homepage</h4>
					<p> The theme comes with a custom homepage template. It consists a carousal with featured videos, Latest videos and latest posts. To set the homepage follow the steps given below,</p>
					<ul>
						<li> Create a new page named "Home" </li>
						<li> Use the "Homepage" template for it under page attributes.</li>
						<li> Go to Admin panel > Settings > Reading and on Front page displays select static page option.</li>
						<li> Select the Page you created earlier with "Homepage" template for the Front page.</li>
						
					</ul>
				</div>
			</div>
			

			<div class="feature-section col two-col"> 
				<div class="col-1">
				<h4> Create Videos page </h4>
				<p> Videos page is the page where all your video posts are available in pagination. This is a custom page template. To create this please follow the steps below.  </p>
				<ul>
					<li> Create a new page called "Videos"</li>
					<li> Select the page template - Videos - from the page attributes template dropdown</li>
					<li> Publish the page. This page will now hold all your video posts</li>
					
				</ul>
				</div>
				<div class="col-2 last-feature">
					
					<h4>Theme options</h4>
					<p> The theme comes with an options panel. The available options are listed below.</p>
					<ul>
						<li> Upload logo </li>
						<li> Set a genre for featured video carousal.</li>
						<li> Set number of slide items</li>
						<li> Customizable banner ads</li>
						
					</ul>
				</div>
			</div>

			
			
			
		</div>

	
	
	
	
				
		<div class="changelog ">
			' . file_get_contents(dirname(__FILE__) . '/FT/license-html.php') . '
		</div>
	
				


	</div>
	</div>
		
		';
		

}