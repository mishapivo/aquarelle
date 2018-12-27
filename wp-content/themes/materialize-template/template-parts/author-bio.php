<?php

?>

<ul class="collection comment-list">
    <li class="collection-item avatar author-bio-box">
        <img src="<?php echo get_avatar_url(get_current_user_id()); ?>" alt="" class="circle">
        <span class="title">
            <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
        </span>

        <p>
            <?php echo get_the_author_meta('description'); ?>
        </p>
        <?php
            if (get_the_author_meta('user_url') != ''){
        ?>
        <ul class="comment-footer right"><li></li><i class="material-icons">web</i> <a target="_blank" href="<?php echo esc_url(get_the_author_meta('user_url')); ?>"><?php echo esc_url(get_the_author_meta('user_url')); ?></a></li></ul>
        <?php
            }
        ?>
    </li>
</ul>
