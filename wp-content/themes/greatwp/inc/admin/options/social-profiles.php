<?php
/**
* Social profiles options
*
* @package GreatWP WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function greatwp_social_profiles($wp_customize) {

    $wp_customize->add_section( 'sc_greatwp_sociallinks', array( 'title' => esc_html__( 'Social Links', 'greatwp' ), 'panel' => 'greatwp_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'greatwp_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'greatwp_sanitize_checkbox', ) );

    $wp_customize->add_control( 'greatwp_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social Buttons', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'greatwp_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'greatwp_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'greatwp_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_vklink_control', array( 'label' => esc_html__( 'VK Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_githublink_control', array( 'label' => esc_html__( 'Github URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'greatwp_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'greatwp_sanitize_email' ) );

    $wp_customize->add_control( 'greatwp_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'greatwp_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'greatwp_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'greatwp' ), 'section' => 'sc_greatwp_sociallinks', 'settings' => 'greatwp_options[rsslink]', 'type' => 'text' ) );

}