<?php
/**
 * Add Education Magazine modules
 *
 * This is the template that includes all featured modules of Education Magazine
 *
 * @package Theme Palace
 * @subpackage EduMag
 * @since EduMag 0.1
 */

// Add featured category section
require get_template_directory() .'/inc/modules/featured-category.php';

// Add popular articles section
require get_template_directory() .'/inc/modules/popular-articles.php';

// Add search section
require get_template_directory() .'/inc/modules/search-section.php';

// Add latest news section
require get_template_directory() .'/inc/modules/latest-news.php';

// Add blogs section
require get_template_directory() .'/inc/modules/blogs.php';
