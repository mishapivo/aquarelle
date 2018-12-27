<?php get_header(); ?>
<main>
<span id="top" style="display:none"></span>
<!--Main layout-->
<div class="container">
	<div class="row">
		<!--Main column-->
		<div class="col-xs-12 col-md-8">
		<?php
			get_template_part( 'template-parts/404' );
		?>
		</div>
		<!--Sidebar-->
		<?php get_sidebar(); ?>
		<!--/Sidebar-->	
	</div>
</div>
<!--/Main layout-->
</main>
<?php get_footer(); ?>
