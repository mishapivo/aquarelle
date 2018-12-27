<?php
add_action('admin_menu', 't_guide');

function t_guide() {
	add_theme_page('How to use the theme', 'Theme user guide', 8, 'user_guide', 't_guide_options');
	
}

function t_guide_options() {
?>
<div class="wrap">

<h2>Theme user guide</h2>

<div class="opwrap">

<div id="wrapr" class="postbox-container" style="width: 70%; ">



<div class="postbox guidebox">

  <h3>License terms</h3>

<div class="inside">  <p> The PHP code of the theme is licensed under the GPL license as is WordPress itself. You can read it here: http://codex.wordpress.org/GPL. </p>
  <p> All other parts of the theme including, but not limited to the CSS code, images, and design are licensed for free personal usage.  </p>
  <p> You are requested to retain the credit banners on the template. </p>
  <p> You are allowed to use the theme on multiple installations, and to edit the template for your personal use. </p>
  <p> You are NOT allowed to edit the theme or change its form with the intention to resell or redistribute it. </p>  
  <p> You are NOT allowed to use the theme as a part of a template repository for any paid CMS service. </p>  </div>
  
  </div>
  
  
<div class="postbox guidebox">  <!-- Thumbnails --------------------->
  <h3>How to add featured thumbnail to posts?</h3>
  
	<div class="inside">  
	<p>Check the video below to see how to add featured images to posts. Theme uses timthumb script to generate thumbnail images. Make sure your host has PHP5 and GD library enabled. You will also need to set the CHMOD value for the "cache" folder <strong>within the theme</strong> to "777" or "755" </p>
	<div class="midcenter"><iframe src="http://www.screenr.com/embed/0IR" width="650" height="396" frameborder="0"></iframe></div>
	</div>
</div>	 						<!-- Thumbnails End ----------------->
	
	
<div class="postbox guidebox">  
	<h3> Ebuy theme options</h3>

	<div class="inside">	
	<p>The following video shows different theme options available on the theme.</p>
	<div class="midcenter"><iframe src="http://www.screenr.com/embed/vnDs" width="650" height="396" frameborder="0"></iframe></div>
	
	<h4>Logo</h4>
	<p> You can set your own logo image. Just enter the image url of your logo in the options page and it will be set as your logo. </p>
	
	<h4>Home page content</h4>
	<p>The theme has 2 options for the home page. 1- Blog , 2- Products . If you select "Blog" the homepage will show all your blog entries and if you select "Products" the homepage will list all your products. </p>
	
	<h4>Slider</h4>
	<p>You can set the number of products to feature on the slider from the options panel. While you create the products listings you will see a checkbox asking whether to list this product on the slider. Only the products marked to feature on the slider will be listed on the slider.  </p>
	
	</div>
	
</div>	
	
	
<div class="postbox guidebox">  
	<h3> How to add products to the site </h3>

	<div class="inside">	
	<p>The following video shows a walkthrough of how to add diferent products and their types to the site</p>
	<div class="midcenter"><iframe src="http://www.screenr.com/embed/K1Ds" width="650" height="396" frameborder="0"></iframe> </div>
	</div>
	
</div>






</div>

</div>

<?php }; ?>