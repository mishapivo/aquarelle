<?php get_header(); ?>

<?php if(function_exists('get_breadcrumbs')) : ?>
<?php get_breadcrumbs() ?>
<?php endif; ?>


<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post rounded clearfix" id="post-<?php the_ID(); ?>">

<div class="pro-snap">
<?php
if ( has_post_thumbnail() ) { ?>
	<a rel="prettyPhoto" href="<?php get_image_url(); ?> "  title="<?php the_title(); ?>" ><img class="boximg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;w=200&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<img class="boximg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="" />
<?php } ?>
</div>


<div class="pro-cover">
	<div class="title"> <h2><?php the_title(); ?></h2> </div>
	<div class="petmeta"> <?php echo get_the_term_list( $post->ID, 'product', '', ', ', '' ); ?></div>
	<div class="entry">
		<?php the_content('Read the rest of this entry &raquo;'); ?>
		<div class="clear"></div>
	</div>
	<div class="boxmeta clearfix">
		<span class="p-cost"> <?php $cost=get_post_meta($post->ID, 'wtf_cost', true); echo $cost; ?> </span>
		<span class="p-link"> <a href="<?php $purchase=get_post_meta($post->ID, 'wtf_purchase', true); echo $purchase; ?>"  title="" target="_blank"> Купить сейчас </a> </span>
	</div>
</div>

</div>



<div id="related-prods" class=" rounded clearfix">
<div class="relprod-left">

</div>

<div class="relprod-right">

<?php $relgoods = get_posts_related_by_taxonomy($post->ID,'product');?>
<?php while ($relgoods->have_posts()): $relgoods->the_post(); ?>
<div class="related-post">  <a class="tooltip" href=" <?php the_permalink() ?> "  title="<?php the_title(); ?>" ><img class="boximg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;w=100&amp;h=100&amp;zc=1" alt=""/></a> </div>
<?php endwhile; ?>

</div> <!-- end thumbnail area -->

</div>

</div>

<?php endwhile; ?> 

<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>