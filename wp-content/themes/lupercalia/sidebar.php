<label for="toggle-left"><span class="icon-sidebar"></span></label>
<input type="checkbox" id="toggle-left"/>

<?php if ( is_home() and is_active_sidebar('home') ) : ?>

	<aside id="sidebar" class="sidebar grid-33" role="complementary">
		<?php dynamic_sidebar('home'); ?>	
	</aside> <!-- .sidebar .grid-33 -->		
 
<?php elseif ( is_single() and is_active_sidebar('single') ) : ?>

	<aside id="sidebar" class="sidebar grid-33" role="complementary">
		<?php lupercalia_author_description(); ?>
		<?php dynamic_sidebar('single'); ?>
	</aside> <!-- .sidebar .grid-33 -->	
	
<?php elseif ( is_page() and is_active_sidebar('pages') ) : ?>

	<aside id="sidebar" class="sidebar grid-33" role="complementary">
		<?php dynamic_sidebar('pages'); ?>
	</aside> <!-- .sidebar .grid-33 -->		

<?php elseif ( is_archive() and is_active_sidebar('archive') ) : ?>	

	<aside id="sidebar" class="sidebar grid-33" role="complementary">
		<?php dynamic_sidebar('archive'); ?>
	</aside> <!-- .sidebar .grid-33 -->	
	
<?php endif;  ?>
 
 