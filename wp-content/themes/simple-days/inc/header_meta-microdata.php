<?php
/**
 * header meta for schema.org
 *
 * @package Simple Days
 * @since 0.0.1
 * @version 0.0.1
 */

?>
<meta itemprop="headline" content="<?php if(get_the_title()==""){echo 'No title';}else{echo esc_html(mb_strimwidth(get_the_title(), 0, 110));} ?>">
<meta itemprop="datePublished" content="<?php echo esc_html(get_the_time('c')); ?>">
<meta itemprop="dateModified" content="<?php echo esc_html(get_the_modified_time('c')); ?>">
<meta itemprop="url" content="<?php the_permalink(); if(YA_AMP)echo '?amp=1'; ?>">
<meta itemprop="thumbnailUrl" content="<?php

$temp = simple_days_get_thumbnail( '' , 'full' ,'');
echo esc_url($temp[0]);
?>">

<meta itemprop="image" content="<?php
echo esc_url($temp[0]);
?>">
<div itemprop="author" itemscope itemtype="https://schema.org/Person">
  <meta itemprop="name" content="<?php the_author(); ?>">
</div>
<div itemprop="publisher" itemscope itemtype="https://schema.org/Organization">
  <div itemprop="logo" itemscope itemtype="https://schema.org/ImageObject">
    <meta itemprop="url" content="<?php
    $temp = simple_days_get_logo();
    echo esc_url($temp[0]);
    ?>">
  </div>
  <meta itemprop="name" content="<?php bloginfo( 'name' ); ?>">
</div>
<meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
<?php if ( !is_search() ) :
  $thumurl = get_the_category();
  if(!empty($thumurl)){ ?>
    <meta itemprop="articleSection" content="<?php echo esc_html($thumurl[0]->cat_name); ?>">
  <?php } endif;
