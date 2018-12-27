<script type="text/javascript">

 jQuery(document).ready(function(){
    jQuery('#pslider').bxSlider({
	  mode: 'fade',
	  controls:false,
	  auto:true,
	  pager: true
	});
  });

</script>

<h3 class="f-title"> Новинки </h3>

<div id="pcover">
<div id="pslider">

<?php 
	
	$count = get_option('ebuy_slide_count');
		$temp = $slide_query;
		$slide_query= null;
		$slide_query = new WP_Query();
		$slide_query = new WP_Query( 'post_type=goods&meta_key=wtf_feature&meta_value=on&posts_per_page='.$count.'' );
	while ( $slide_query->have_posts() ) : $slide_query->the_post();
?>

<div class="spanel">	
<a href="<?php the_permalink() ?>"><img class="slideimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_image_url()?>&amp;w=200&amp;zc=1" title="" alt="" /></a>
<div class="spanel-right">
<h3><?php the_title(); ?></h3>
<?php wpe_excerpt('wpe_excerptlength_slide', ''); ?>
<div class="slide-meta">
<span class="s-cost"><?php $cost=get_post_meta($post->ID, 'wtf_cost', true); echo $cost; ?></span>
<span class="s-link"> <a href="<?php the_permalink() ?>">Детали</a> </span>
</div>
</div>
</div>

<?php endwhile; ?>

<?php $slide_query = null; $slide_query = $temp;?>

</div><!-- pslider -->
</div> <!-- pcover -->