<?php
/**
* The template for displaying the footer
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/
?>

</div><!--/#clean-grid-content-wrapper -->
</div><!--/#clean-grid-wrapper -->

<?php if ( (clean_grid_get_option('show_footer_social_buttons')) ) { ?>
<div class="clean-grid-social-icons clearfix">
<div class="clean-grid-social-icons-inner clearfix">
<div class='clearfix'>
    <?php if ( clean_grid_get_option('twitterlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('twitterlink') ); ?>" target="_blank" class="clean-grid-social-icon-twitter" title="<?php esc_attr_e('Twitter','clean-grid'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('facebooklink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('facebooklink') ); ?>" target="_blank" class="clean-grid-social-icon-facebook" title="<?php esc_attr_e('Facebook','clean-grid'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('googlelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('googlelink') ); ?>" target="_blank" class="clean-grid-social-icon-google-plus" title="<?php esc_attr_e('Google Plus','clean-grid'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('pinterestlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('pinterestlink') ); ?>" target="_blank" class="clean-grid-social-icon-pinterest" title="<?php esc_attr_e('Pinterest','clean-grid'); ?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('linkedinlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('linkedinlink') ); ?>" target="_blank" class="clean-grid-social-icon-linkedin" title="<?php esc_attr_e('Linkedin','clean-grid'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('instagramlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('instagramlink') ); ?>" target="_blank" class="clean-grid-social-icon-instagram" title="<?php esc_attr_e('Instagram','clean-grid'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('vklink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('vklink') ); ?>" target="_blank" class="clean-grid-social-icon-vk" title="<?php esc_attr_e('VK','clean-grid'); ?>"><i class="fa fa-vk" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('flickrlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('flickrlink') ); ?>" target="_blank" class="clean-grid-social-icon-flickr" title="<?php esc_attr_e('Flickr','clean-grid'); ?>"><i class="fa fa-flickr" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('youtubelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('youtubelink') ); ?>" target="_blank" class="clean-grid-social-icon-youtube" title="<?php esc_attr_e('Youtube','clean-grid'); ?>"><i class="fa fa-youtube" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('vimeolink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('vimeolink') ); ?>" target="_blank" class="clean-grid-social-icon-vimeo" title="<?php esc_attr_e('Vimeo','clean-grid'); ?>"><i class="fa fa-vimeo" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('soundcloudlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('soundcloudlink') ); ?>" target="_blank" class="clean-grid-social-icon-soundcloud" title="<?php esc_attr_e('SoundCloud','clean-grid'); ?>"><i class="fa fa-soundcloud" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('lastfmlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('lastfmlink') ); ?>" target="_blank" class="clean-grid-social-icon-lastfm" title="<?php esc_attr_e('Lastfm','clean-grid'); ?>"><i class="fa fa-lastfm" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('githublink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('githublink') ); ?>" target="_blank" class="clean-grid-social-icon-github" title="<?php esc_attr_e('Github','clean-grid'); ?>"><i class="fa fa-github" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('bitbucketlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('bitbucketlink') ); ?>" target="_blank" class="clean-grid-social-icon-bitbucket" title="<?php esc_attr_e('Bitbucket','clean-grid'); ?>"><i class="fa fa-bitbucket" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('tumblrlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('tumblrlink') ); ?>" target="_blank" class="clean-grid-social-icon-tumblr" title="<?php esc_attr_e('Tumblr','clean-grid'); ?>"><i class="fa fa-tumblr" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('digglink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('digglink') ); ?>" target="_blank" class="clean-grid-social-icon-digg" title="<?php esc_attr_e('Digg','clean-grid'); ?>"><i class="fa fa-digg" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('deliciouslink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('deliciouslink') ); ?>" target="_blank" class="clean-grid-social-icon-delicious" title="<?php esc_attr_e('Delicious','clean-grid'); ?>"><i class="fa fa-delicious" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('stumblelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('stumblelink') ); ?>" target="_blank" class="clean-grid-social-icon-stumbleupon" title="<?php esc_attr_e('Stumbleupon','clean-grid'); ?>"><i class="fa fa-stumbleupon" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('redditlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('redditlink') ); ?>" target="_blank" class="clean-grid-social-icon-reddit" title="<?php esc_attr_e('Reddit','clean-grid'); ?>"><i class="fa fa-reddit" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('dribbblelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('dribbblelink') ); ?>" target="_blank" class="clean-grid-social-icon-dribbble" title="<?php esc_attr_e('Dribbble','clean-grid'); ?>"><i class="fa fa-dribbble" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('behancelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('behancelink') ); ?>" target="_blank" class="clean-grid-social-icon-behance" title="<?php esc_attr_e('Behance','clean-grid'); ?>"><i class="fa fa-behance" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('codepenlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('codepenlink') ); ?>" target="_blank" class="clean-grid-social-icon-codepen" title="<?php esc_attr_e('Codepen','clean-grid'); ?>"><i class="fa fa-codepen" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('jsfiddlelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('jsfiddlelink') ); ?>" target="_blank" class="clean-grid-social-icon-jsfiddle" title="<?php esc_attr_e('JSFiddle','clean-grid'); ?>"><i class="fa fa-jsfiddle" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('stackoverflowlink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('stackoverflowlink') ); ?>" target="_blank" class="clean-grid-social-icon-stackoverflow" title="<?php esc_attr_e('Stack Overflow','clean-grid'); ?>"><i class="fa fa-stack-overflow" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('stackexchangelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('stackexchangelink') ); ?>" target="_blank" class="clean-grid-social-icon-stackexchange" title="<?php esc_attr_e('Stack Exchange','clean-grid'); ?>"><i class="fa fa-stack-exchange" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('bsalink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('bsalink') ); ?>" target="_blank" class="clean-grid-social-icon-buysellads" title="<?php esc_attr_e('BuySellAds','clean-grid'); ?>"><i class="fa fa-buysellads" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('slidesharelink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('slidesharelink') ); ?>" target="_blank" class="clean-grid-social-icon-slideshare" title="<?php esc_attr_e('SlideShare','clean-grid'); ?>"><i class="fa fa-slideshare" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('skypeusername') ) : ?>
            <a href="skype:<?php echo esc_html( clean_grid_get_option('skypeusername') ); ?>?chat" class="clean-grid-social-icon-skype" title="<?php esc_attr_e('Skype','clean-grid'); ?>"><i class="fa fa-skype" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('emailaddress') ) : ?>
            <a href="mailto:<?php echo esc_html( clean_grid_get_option('emailaddress') ); ?>" class="clean-grid-social-icon-email" title="<?php esc_attr_e('Email Us','clean-grid'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a><?php endif; ?>
    <?php if ( clean_grid_get_option('rsslink') ) : ?>
            <a href="<?php echo esc_url( clean_grid_get_option('rsslink') ); ?>" target="_blank" class="clean-grid-social-icon-rss" title="<?php esc_attr_e('RSS','clean-grid'); ?>"><i class="fa fa-rss" aria-hidden="true"></i></a><?php endif; ?>
</div>
</div>
</div>
<?php } ?>


<?php if ( !(clean_grid_get_option('hide_footer_widgets')) ) { ?>
<?php if ( is_active_sidebar( 'clean-grid-footer-1' ) || is_active_sidebar( 'clean-grid-footer-2' ) || is_active_sidebar( 'clean-grid-footer-3' ) || is_active_sidebar( 'clean-grid-footer-4' ) ) : ?>
<div class='clean-grid-footer-blocks clearfix' id='clean-grid-footer-blocks' itemscope='itemscope' itemtype='http://schema.org/WPFooter' role='contentinfo'>
<div class='clearfix'>

<div class='clean-grid-footer-block-1'>
<?php dynamic_sidebar( 'clean-grid-footer-1' ); ?>
</div>

<div class='clean-grid-footer-block-2'>
<?php dynamic_sidebar( 'clean-grid-footer-2' ); ?>
</div>

<div class='clean-grid-footer-block-3'>
<?php dynamic_sidebar( 'clean-grid-footer-3' ); ?>
</div>

<div class='clean-grid-footer-block-4'>
<?php dynamic_sidebar( 'clean-grid-footer-4' ); ?>
</div>

</div>
</div><!--/#clean-grid-footer-blocks-->
<?php endif; ?>
<?php } ?>


<div class='clean-grid-footer clearfix' id='clean-grid-footer'>
<div class='clean-grid-foot-wrap clearfix'>
<?php if ( clean_grid_get_option('footer_text') ) : ?>
  <p class='clean-grid-copyright'><?php echo esc_html(clean_grid_get_option('footer_text')); ?></p>
<?php else : ?>
  <p class='clean-grid-copyright'><?php /* translators: %s: Year and site name. */ printf( esc_html__( 'Copyright &copy; %s', 'clean-grid' ), esc_html(date_i18n(__('Y','clean-grid'))) . ' ' . esc_html(get_bloginfo( 'name' ))  ); ?></p>
<?php endif; ?>
<?php if ( !(clean_grid_get_option('hide_credit')) ) { ?><p class='clean-grid-credit'><a href="<?php echo esc_url( 'https://themesdna.com/' ); ?>"><?php /* translators: %s: Theme author. */ printf( esc_html__( 'Design by %s', 'clean-grid' ), 'ThemesDNA.com' ); ?></a></p><?php } ?>
</div>
</div><!--/#clean-grid-footer -->

</div>
</div>

<?php wp_footer(); ?>
</body>
</html>