<?php
//CPM post Widget
class posts_widget extends WP_widget{

function __construct() {
parent ::__construct( false, $name = esc_attr( __( 'CPMmagz Posts Widget', 'cpmmagz') ),
// Widget description
	array(
		'classname' => 'posts_widget',
		  'description' =>esc_attr( __( 'This widget is the Tabs that classically goes into the sidebar. It contains the Popular posts and Latest Posts.', 'cpmmagz' ) ), )
	);
}
function widget( $args, $instance ) {
	extract( $args );
	$title = apply_filters( 'widget_title', $instance['title']);
?>

<div class="widget widget_tabs">
	<div class="tab-wrap">
		<div class="row">
			<?php if( esc_attr($title) ){ ?>
				<h4 class="widget-title"><?php echo esc_attr($title); ?></h4>
			<?php } ?>
			<div class="col s12">
				<ul class="tabs" style="width: 100%;">
					<li class="tab col s3" style="width: 50%;"><a class="active" href="#<?php echo esc_attr($widget_id); ?>test1"><?php esc_attr_e('Latest Posts', 'cpmmagz');?></a></li>
					<li class="tab col s3" style="width: 50%;"><a href="#<?php echo esc_attr($widget_id); ?>test2" class=""><?php esc_attr_e('Most Popular', 'cpmmagz');?></a></li>
					<div class="indicator" style="right: 183px; left: 0px;"></div>
				</ul>
			</div>
			<div class="tab-content">
				<div id="<?php echo esc_attr($widget_id); ?>test1" class="col s12" style="display: block;">
				   <?php
	                    $latest_posts = array(
	                        'post_type' => 'post',
	                        'orderby' => 'date',
	                        'order'   => 'DESC',
	                        'posts_per_page' => 5
	                        );
	                    $query_latpost = new WP_Query($latest_posts);
	                    if ($query_latpost->have_posts()) :
	                    	while ($query_latpost->have_posts()) :
	                     		$query_latpost->the_post();
	                     global $post;
			        ?>
			                    <article class="card small news-small hoverable">
									<?php cpmmagz_small_news_card_image($post->ID);?>
			                        <div class="card-desc">
			                            <div class="card-content">
			                                <h2><a href="<?php the_permalink();?>"><?php echo esc_attr( cpmmagz_limit_title(get_the_title(), 40)); ?></a></h2>
			                                <span class="entry-meta">
			                                    <ul>
			                                        <li>
			                                            <a href=" <?php echo esc_url( cpmmagz_archive_link($post) ); ?>"><i class="fa fa-clock-o"></i> <?php echo esc_attr(cpmmagz_time_ago($post->post_date, $post->ID));?></a>
			                                        </li>
			                                    </ul>
			                                </span>
			                            </div>
			                        </div>
			                        <div class="label-count">
			                            <span class="label-small waves-effect waves-light"><a href="<?php the_permalink(); ?>"><?php echo esc_attr(get_comments_number()); ?></a></span>
			                        </div>
			                    </article>
			                    <?php  endwhile; endif; wp_reset_postdata();?>
				</div>
				<!-- Tab 1 -->

				<div id="<?php echo esc_attr($widget_id); ?>test2" class="col s12" style="display: none;">
					<?php
					if(function_exists('stats_get_csv')){
						$popular = stats_get_csv( 'postviews', 'period=month&days=2&limit=5&summarize' );
						foreach ($popular as $p) {
							$popular_ID = $p['post_id'];
							if ($popular_ID && get_post($popular_ID) && 'post' === get_post_type($popular_ID))
							{
								?>
                                <article class="card small news-small hoverable">
                                    <div class="card-image valign-wrapper">
	                                       <?php

	                                        if (has_post_thumbnail($popular_ID))
	                                        {
	                                            $feat_image = wp_get_attachment_url(get_post_thumbnail_id($popular_ID));
	                                            $popular_image_id = get_post_thumbnail_id($popular_ID);
	                                            $popular_alt = get_post_meta($popular_image_id, '_wp_attachment_image_alt', true); ?>
	                                            <img src="<?php echo esc_url($feat_image); ?>" alt="<?php echo esc_attr($popular_alt); ?>"/>
	                                        <?php }

	                                        ?>
	                                    </div>
	                                    <div class="card-desc">
	                                        <div class="card-content">
	                                            <h2>
	                                                <a href="<?php echo esc_url($p['post_permalink']);?>"><?php
	                                                $post_object = get_post($popular_ID);
	                                                echo esc_attr(cpmmagz_limit_title( $p['post_title'], 40));
	                                                ?></a>
	                                            </h2>
	                                                <span class="entry-meta">
	                                                    <ul>
	                                                        <li>
	                                                            <a href="<?php the_permalink();?>">
	                                                            <i class="fa fa-clock-o"></i> <?php echo esc_attr(cpmmagz_time_ago($post_object->post_date, $post_object->ID));?>
	                                                            </a>
	                                                        </li>
	                                                    </ul>
	                                                </span>
	                                            </div>
	                                        </div>
	                                        <div class="label-count">
	                                            <span class="label-small waves-effect waves-light"><a href="#"><?php cpmmagz_comment_count($popular_ID);?></a></span>
	                                        </div>
	                                    </article>
	                                    <?php
	                            }//endif
	                        }//endforeach
	                    } //end function exists

	                    ?>
				</div>
				<!-- Tab 2 -->
			</div><!-- Tab Content -->
		</div><!-- row -->
	</div><!-- Tab Wrap -->
</div>
<?php

}
function update( $new_instance, $old_instance) {
	$instance = array();
	$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
	return $instance;
}
function form($instance) {
    $title = (isset($instance['title'])) ? $instance['title'] : esc_attr( __( 'CPM posts', 'cpmmagz' ) );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('title') ); ?>"><?php esc_attr_e('Title :', 'cpmmagz'); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ); ?>"  name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php

}
}
add_action( 'widgets_init', function() {
register_widget('posts_widget');
});
?>
