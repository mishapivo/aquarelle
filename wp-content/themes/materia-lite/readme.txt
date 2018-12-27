# Materia Lite

**Contributors:** iceable
**Requires at least:** WordPress 4.7
**Tested up to:** WordPress 4.9.2
**Stable tag:** 1.0.10
**Version:** 1.0.10
**License:** GPLv2 or later
**License URI:** http://www.gnu.org/licenses/gpl-2.0.html
**Tags:** one-column, two-columns, right-sidebar, flexible-header, custom-background, custom-colors, custom-header, custom-menu, custom-logo, editor-style, featured-images, footer-widgets, full-width-template, sticky-post, theme-options, threaded-comments, translation-ready, blog, news, entertainment

A material design inspired WordPress Theme by Iceable Themes.


## Description

Materia Lite is an elegant, responsive, material design inspired Premium WordPress Theme. Perfect for for blogging as well as modern or tech oriented websites as well as portfolio and business websites.

It features two widgetizable areas in the sidebar and the optional footer, two custom menu locations in the navbar and footer, optional tagline display, custom logo, custom colors, custom header image and custom background.

Materia Lite is the lite version of Materia Pro, which comes with many additional features and access to premium class pro support forum and can be found at https://www.iceablethemes.com

### Getting started with Materia Lite

* Once you activate the theme from your WordPress admin panel, you can visit the customizer (Appearance > Customize) to set your own logo, header image, background, menus etc.
* If you will be using a custom header image, you will find options to enable or disable it on your homepage, blog index pages, single post pages and individual pages.
* If you select the "dropdown" option for in Mobile > mobile menu, make sure to set a menu yourself, instead of relying on the default menu. Doing so will ensure the dropdown version of your menu works properly in responsive mode.
* You can also set a custom menu at the bottom right of your site. Note this footer menu doesn't support sub-menus, only top-level menu items will be displayed.
* Footer widgets: The widgetizable footer is disabled by default. To activate it, simply go to Appearance > Widgets and drop some widgets in the "Footer" area, just like you would do for the sidebar. It is recommended to use 4 widgets in the footer, or no widgets at all to disable it.
* Additional documentation and free support forums can be found at https://www.iceablethemes.com under "support".

### Translation

Bundled translations (GPL Licensed):
* French (fr_FR) translation: Copyright 2017-2018, Iceable Media - Mathieu Sarrasin (https://www.iceablethemes.com)

Translating this theme into your own language is quick and easy, you will find a .POT file in the /languages folder to get you started. It contains about 80 strings only.
If you don't have a .po file editor yet, you can download Poedit from https://www.poedit.net/download.php - Poedit is free and available for Windows, Mac OS and Linux.

If you have translated this theme into your own language and are willing to share your translation with the community, please feel free to do so on the forums at https://www.iceablethemes.com
Your translation files will be added to the next update. Don't forget to leave your name, email address and/or website link so credits can be given to you!


## Copyright

Materia Lite WordPress Theme, Copyright 2017-2018 Iceable Media - Mathieu Sarrasin (https://www.iceablethemes.com)
Materia Lite is distributed under the terms of the GNU GPL

Materia Lite bundles the following third-party resources:

superfish, Copyright 2013 Joel Birch.
**License:** MIT and GPL
Source: http://users.tpg.com.au/j_birch/plugins/superfish/

HTML5 Shiv v3.6, Copyright @afarkas @jdalton @jon_neal @rem
**License:** MIT/GPL2
Source: https://github.com/aFarkas/html5shiv

Font Awesome icons, Copyright Dave Gandy
**License:** SIL Open Font License, version 1.1.
Source: http://fontawesome.io/


## CHANGELOG

### 1.0.10
January 31th, 2018
* Updated copyright

### 1.0.9
November 18th, 2017
* Updated Readme.txt file to the new format for WordPress.org
* Tested with WordPress 4.9
* Removed support for WordPress lesser than 4.7

### 1.0.8
October 10th, 2017
* Refactored all PHP code to conform to the WordPress coding standards

### 1.0.7
August 25th, 2017
* Fixed: Added prefix to Google font handle
* Fixed: Restored custom function to generate the mobile dropdown menu. Using wp_nav_menu() with a custom Walker does not work with fallback_cb and causes additional issues. See https://core.trac.wordpress.org/ticket/18232

### 1.0.6
August 3rd, 2017
* Updated: screenshot.png
* Fixed: moved HTML5Shiv enqueuing from materia_styles() to materia_scripts()
* Fixed: Added missing prefixes to some variables and constants names
* Fixed: Renamed page-title.php to part-title.php to prevent template hierarchy conflict
* Fixed: Added missing string escaping
* Fixed: Using get_the_archive_title() for archive page titles
* Fixed: Breadcrumbs for category and tag archive
* Fixed: Removed custom filter for 'get_the_excerpt', using core functionality instead
* Fixed: Ordered placeholders for printf() in footer.php
* Fixed: Removed additional support for child themes for WP<4.7 (was relying on file_exists() which emits a PHP E_WARNING upon failure)
* Fixed: Removed superfluous gettext function with no translatable content
* Fixed: Singular placeholder in gettext function in comments.php

### 1.0.5
August 1st, 2017
* Enhanced: header.php: wrapped pingback url in appropriate conditionals
* Enhanced: HTML5Shiv is now properly enqueued
* Enhanced: Dropdown mobile menu uses core function wp_nav_menu with a custom walker
* Enhanced: Drawer mobile menu closes automatically if window is resized to a width larger than the one it is meant for
* Enhanced: Comments display date with date format as defined in settings
* Added: Print styles

### 1.0.4
July 31th, 2017
* Enhanced: Removed custom fallback for wp_nav_menu
* Added: Filter the default fallback menu (wp_page_menu) so it inherits correct styles
* Added: Filter the default fallback menu (wp_page_menu) to show an additional "customize this menu" link (only shown to logged in admin)
* Enhanced: Mobile menu now works with default fallback menu (when no menu is selected)
* Enhanced: Removed default sidebar widgets and replaced with a link to widget customization (only shown to logged in admin)
* Fixed: Floats clearing in single posts
* Added: Default styling and column support for gallery
* Fixed: Removed metadata for pages in search results
* Fixed: Custom post type display in search results
* Removed: text fields from customizer (wordpress.org guidelines - content creation)

### 1.0.3
July 21th, 2017
* Fixed: Removed unused "materia_favicon" from header.php

### 1.0.2
June 21th, 2017
* Fixed: Text domain in 404.php

### 1.0.1
June 21th, 2017
* Fixed: default mobile menu setting
* Added: 404 page template

### 1.0.0
June 16th, 2017
* Initial release
