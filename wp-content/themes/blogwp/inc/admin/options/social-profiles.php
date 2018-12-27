<?php
/**
* Social profiles options
*
* @package BlogWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function blogwp_social_profiles($wp_customize) {

    $wp_customize->add_section( 'sc_blogwp_sociallinks', array( 'title' => esc_html__( 'Social Links', 'blogwp' ), 'panel' => 'blogwp_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'blogwp_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'blogwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'blogwp_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social Buttons', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'blogwp_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'blogwp_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'blogwp_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_vklink_control', array( 'label' => esc_html__( 'VK Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_githublink_control', array( 'label' => esc_html__( 'Github URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'blogwp_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'blogwp_sanitize_email' ) );

    $wp_customize->add_control( 'blogwp_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'blogwp_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'blogwp_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'blogwp' ), 'section' => 'sc_blogwp_sociallinks', 'settings' => 'blogwp_options[rsslink]', 'type' => 'text' ) );

}