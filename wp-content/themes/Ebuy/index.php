<?php get_header(); ?>

<?php
if(get_option('ebuy_home') == "blog") { ?>	
<?php include (TEMPLATEPATH . '/lib/blog-home.php'); ?>
<?php } else { ?>

<div id="content">

<?php include (TEMPLATEPATH . '/slider.php'); ?>	

<h3 class="r-title"> Товары </h3>

<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('post_type=goods'.'&paged='.$paged);
?>
<?php $count = 0; ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	

<div class="box <?php if (++$count % 3 == 0) { echo "lastbox"; } ?>" id="post-<?php the_ID(); ?>">

<div class="btitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="boxim">
<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="boximg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=150&amp;w=150&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="boximg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" /></a>
<?php } ?>
</div>

<div class="boxmeta clearfix">
<span class="p-cost"> <?php $cost=get_post_meta($post->ID, 'wtf_cost', true); echo $cost; ?> </span>
<span class="p-link"> <a href="<?php the_permalink() ?>">Детали</a> </span>
</div>
</div>
<?php if(++$counter % 3 == 0) : ?>
<div class="clear"></div>
<?php endif; ?>
<?php endwhile; ?>


<div class="clear"></div>

<?php getpagenavi(); ?>
<?php $wp_query = null; $wp_query = $temp;?>

  
</div>

<?php } ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>