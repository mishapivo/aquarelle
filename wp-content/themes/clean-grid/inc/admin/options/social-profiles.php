<?php
/**
* Social profiles options
*
* @package Clean Grid WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function clean_grid_social_profiles($wp_customize) {

    $wp_customize->add_section( 'sc_clean_grid_sociallinks', array( 'title' => esc_html__( 'Social Links', 'clean-grid' ), 'panel' => 'clean_grid_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'clean_grid_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social Buttons', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[show_footer_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_checkbox', ) );

    $wp_customize->add_control( 'clean_grid_show_footer_social_buttons_control', array( 'label' => esc_html__( 'Show Footer Social Buttons', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[show_footer_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'clean_grid_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'clean_grid_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'clean_grid_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_vklink_control', array( 'label' => esc_html__( 'VK Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_githublink_control', array( 'label' => esc_html__( 'Github URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'clean_grid_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'clean_grid_sanitize_email' ) );

    $wp_customize->add_control( 'clean_grid_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'clean_grid_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'clean_grid_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'clean-grid' ), 'section' => 'sc_clean_grid_sociallinks', 'settings' => 'clean_grid_options[rsslink]', 'type' => 'text' ) );

}