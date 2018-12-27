<?php get_header(); ?>


<ul class="breadcrumbs clearfix"><?php be_taxonomy_breadcrumb(); ?></ul>

<div id="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
		
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
<span class="p-cost">  <?php $cost=get_post_meta($post->ID, 'wtf_cost', true); echo $cost; ?> </span>
<span class="p-link"> <a href="<?php the_permalink() ?>"> Details </a> </span>
</div>
</div>
<?php if(++$counter % 3 == 0) : ?>
<div class="clear"></div>
<?php endif; ?>
<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">Not Found</h1>
	<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>