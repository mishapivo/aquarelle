<?php $index=1; ?>
<main class="foodiesList grid foodies-content" id="main_section">
    <?php while (have_posts()) : the_post(); ?>
        <?php $foodies_url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <div data-id="<?php echo get_the_ID(); ?>" class="foodies-item foodies-items foodies ">
                <a href="<?php the_permalink(); ?>">
                <?php if(!empty($foodies_url)) {
                    the_post_thumbnail('foodies-blog-thumbnail');
                } else{ ?>
                    <img src="<?php echo esc_url(get_template_directory_uri().'/assets/images/default.png'); ?>" alt="">
                <?php } ?>
                </a>
               <div class="inner <?php if($index % 2 == 0){ echo 'bg2'; }else{echo 'bg1';} ?>">
                    <a data-toggle="modal" href="<?php  the_permalink(); ?>" class="title"><?php the_title(); ?></a>
                    <div class="colors">
                        <?php foreach((get_the_category()) as $cat) : ?>
                            <span class="category <?php echo esc_attr($cat->name); ?>"></span>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
    <?php $index++; endwhile;
    the_posts_pagination( array(
        'mid_size' => 2,
        'Previous' => __( 'Back', 'foodies' ),
        'Next' => __( 'Onward', 'foodies' ),
    ) ); ?>
</main>