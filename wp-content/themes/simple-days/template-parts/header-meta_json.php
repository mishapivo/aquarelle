<?php
/**
 * header meta for schema.org
 *
 * @package Simple Days
 */
$temp = simple_days_get_logo();
$logo_url = $temp[0];

if (is_singular()){
  if ( is_singular( 'post' )){
    $schema_type = 'BlogPosting';
  }else{
    $schema_type = 'Article';
  }
  $schema_title = get_the_title();
  if($schema_title){
    $schema_title = mb_strimwidth($schema_title, 0, 110);
  }else{
    $schema_title = __( 'No title', 'simple-days' );
  }
  $schema_description = mb_strimwidth( wp_strip_all_tags(strip_shortcodes($post->post_content), true), 0 , 200, '' );
  //strip_tags(get_the_excerpt());
  $schema_id = get_permalink();
  $schema_author_name = get_the_author_meta('nickname',$post->post_author);
  $schema_datePublished = get_the_time('c');
  $schema_dateModified = get_the_modified_time('c');

  $temp = simple_days_get_thumbnail( '' , 'full' ,'');
  $schema_image = $temp[0];

}else{

  $schema_type = 'Article';
  $schema_title = strip_tags(get_the_archive_title());
  if($schema_title == '')$schema_title = get_bloginfo( 'name' );

  $schema_description = strip_tags(get_the_archive_description());
  if($schema_description == '')$schema_description = get_bloginfo('description');

  $schema_id = home_url( add_query_arg( array(), $wp->request ) );

  $new_post = get_posts('post_type=post&order=DESC&orderby=date&showposts=1');

  if(isset($new_post[0])) {
    $schema_author_name = get_the_author_meta('nickname',$new_post[0]->post_author);
    $schema_datePublished = get_the_time('c',$new_post[0]->ID);
    $schema_dateModified = get_the_modified_time('c',$new_post[0]->ID);
  }
  $temp = simple_days_get_thumbnail( '' , '' ,'');
  $schema_image = $temp[0];

}

?>

<script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "<?php echo esc_attr($schema_type); ?>",
    "headline": "<?php echo esc_attr( $schema_title ); ?>",
    "description": "<?php echo esc_attr( $schema_description ); ?>",
    "mainEntityOfPage":{
      "@type": "WebPage",
      "@id": "<?php echo esc_url( $schema_id ); ?>"
    },
    "datePublished": "<?php echo esc_html($schema_datePublished); ?>",
    "dateModified": "<?php echo esc_html($schema_dateModified); ?>",
    "author": {
      "@type": "Person",
      "name": "<?php echo esc_attr( $schema_author_name ); ?>"
    },
    "publisher": {
      "@type": "Organization",
      "name": "<?php bloginfo( 'name' ); ?>",
      "logo": {
        "@type": "ImageObject",
        "url": "<?php echo esc_url( $logo_url ); ?>"
      }
    },
    "image": {
      "@type": "ImageObject",
      "url": "<?php echo esc_url( $schema_image ); ?>"
    }
  }
</script>
