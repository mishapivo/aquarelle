<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package newspaperss
 * @since newspaperss 1.0
 */
get_header();

    echo '<div id="top-content">';/* satrt top section */
        echo  '<div class=" grid-x align-center" >';
          get_template_part('home-part/part', 'slider');
          get_template_part('home-part/part', 'rightpost');
        echo '</div>';
      echo '</div>';
      if ( true == get_theme_mod( 'onof_auto_featuredsection', true ) ) :
				get_template_part('home-part/part', 'featured');
			endif;
        get_template_part('home-part/latest', 'post');

get_footer();
