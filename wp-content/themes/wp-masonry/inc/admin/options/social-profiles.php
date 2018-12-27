<?php
/**
* Social profiles options
*
* @package WP Masonry WordPress Theme
* @copyright Copyright (C) 2018 ThemesDNA
* @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or later
* @author ThemesDNA <themesdna@gmail.com>
*/

function wp_masonry_social_profiles($wp_customize) {

    $wp_customize->add_section( 'sc_wp_masonry_sociallinks', array( 'title' => esc_html__( 'Social Links', 'wp-masonry' ), 'panel' => 'wp_masonry_main_options_panel', 'priority' => 400, ));

    $wp_customize->add_setting( 'wp_masonry_options[hide_header_social_buttons]', array( 'default' => false, 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_checkbox', ) );

    $wp_customize->add_control( 'wp_masonry_hide_header_social_buttons_control', array( 'label' => esc_html__( 'Hide Header Social Buttons', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[hide_header_social_buttons]', 'type' => 'checkbox', ) );

    $wp_customize->add_setting( 'wp_masonry_options[twitterlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_twitterlink_control', array( 'label' => esc_html__( 'Twitter URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[twitterlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[facebooklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_facebooklink_control', array( 'label' => esc_html__( 'Facebook URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[facebooklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[googlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) ); 

    $wp_customize->add_control( 'wp_masonry_googlelink_control', array( 'label' => esc_html__( 'Google Plus URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[googlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[pinterestlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_pinterestlink_control', array( 'label' => esc_html__( 'Pinterest URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[pinterestlink]', 'type' => 'text' ) );
    
    $wp_customize->add_setting( 'wp_masonry_options[linkedinlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_linkedinlink_control', array( 'label' => esc_html__( 'Linkedin Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[linkedinlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[instagramlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_instagramlink_control', array( 'label' => esc_html__( 'Instagram Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[instagramlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[vklink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_vklink_control', array( 'label' => esc_html__( 'VK Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[vklink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[flickrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_flickrlink_control', array( 'label' => esc_html__( 'Flickr Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[flickrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[youtubelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_youtubelink_control', array( 'label' => esc_html__( 'Youtube URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[youtubelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[vimeolink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_vimeolink_control', array( 'label' => esc_html__( 'Vimeo URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[vimeolink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[soundcloudlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_soundcloudlink_control', array( 'label' => esc_html__( 'Soundcloud URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[soundcloudlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[lastfmlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_lastfmlink_control', array( 'label' => esc_html__( 'Lastfm URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[lastfmlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[githublink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_githublink_control', array( 'label' => esc_html__( 'Github URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[githublink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[bitbucketlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_bitbucketlink_control', array( 'label' => esc_html__( 'Bitbucket URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[bitbucketlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[tumblrlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_tumblrlink_control', array( 'label' => esc_html__( 'Tumblr URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[tumblrlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[digglink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_digglink_control', array( 'label' => esc_html__( 'Digg URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[digglink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[deliciouslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_deliciouslink_control', array( 'label' => esc_html__( 'Delicious URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[deliciouslink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[stumblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_stumblelink_control', array( 'label' => esc_html__( 'Stumbleupon Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[stumblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[redditlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_redditlink_control', array( 'label' => esc_html__( 'Reddit Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[redditlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[dribbblelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_dribbblelink_control', array( 'label' => esc_html__( 'Dribbble Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[dribbblelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[behancelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_behancelink_control', array( 'label' => esc_html__( 'Behance Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[behancelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[codepenlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_codepenlink_control', array( 'label' => esc_html__( 'Codepen Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[codepenlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[jsfiddlelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_jsfiddlelink_control', array( 'label' => esc_html__( 'JSFiddle Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[jsfiddlelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[stackoverflowlink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_stackoverflowlink_control', array( 'label' => esc_html__( 'Stack Overflow Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[stackoverflowlink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[stackexchangelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_stackexchangelink_control', array( 'label' => esc_html__( 'Stack Exchange Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[stackexchangelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[bsalink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_bsalink_control', array( 'label' => esc_html__( 'BuySellAds Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[bsalink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[slidesharelink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_slidesharelink_control', array( 'label' => esc_html__( 'SlideShare Link', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[slidesharelink]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[skypeusername]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'wp_masonry_skypeusername_control', array( 'label' => esc_html__( 'Skype Username', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[skypeusername]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[emailaddress]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'wp_masonry_sanitize_email' ) );

    $wp_customize->add_control( 'wp_masonry_emailaddress_control', array( 'label' => esc_html__( 'Email Address', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[emailaddress]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[telephonenumber]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'sanitize_text_field' ) );

    $wp_customize->add_control( 'wp_masonry_telephonenumber_control', array( 'label' => esc_html__( 'Telephone Number', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[telephonenumber]', 'type' => 'text' ) );

    $wp_customize->add_setting( 'wp_masonry_options[rsslink]', array( 'default' => '', 'type' => 'option', 'capability' => 'edit_theme_options', 'sanitize_callback' => 'esc_url_raw' ) );

    $wp_customize->add_control( 'wp_masonry_rsslink_control', array( 'label' => esc_html__( 'RSS Feed URL', 'wp-masonry' ), 'section' => 'sc_wp_masonry_sociallinks', 'settings' => 'wp_masonry_options[rsslink]', 'type' => 'text' ) );

}