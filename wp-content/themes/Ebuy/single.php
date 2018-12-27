<?php get_header(); ?>

<div class="homewidget">
<?php if(function_exists('get_breadcrumbs')) : ?>
<?php get_breadcrumbs() ?>
<?php endif; ?>
</div>

<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="postmeta">
		<span class="author">Автор <?php the_author(); ?> </span>
		<span class="clock"> <?php the_time('M - j - Y'); ?></span>
		<span class="comm"><?php comments_popup_link('Нет комментариев', '1 комментарий', 'Комментариев: %'); ?></span>
</div>

<div class="entry">
<?php the_content('Read the rest of this entry &raquo;'); ?>

<div class="clear"></div>
<?php wp_link_pages(array('before' => '<p><strong>Pages: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>


<div class="singleinfo">
<span class="category">Рубрики: <?php the_category(', '); ?> </span>
</div>

</div>

<?php comments_template(); ?>
<?php endwhile; else: ?>

		<h1 class="title">Not Found</h1>
		<p>I'm Sorry,  you are looking for something that is not here. Try a different search.</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>