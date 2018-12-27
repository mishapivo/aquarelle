<?php

/* Add Tethys Documentation Page */

function tethys_documentation_page() {
		add_theme_page(
			esc_html__('Documentation', 'tethys'),
			esc_html__('Documentation', 'tethys'),
			'manage_options',
			'space_themes_options',
			'tethys_documentation_options'
		);
	}
add_action('admin_menu', 'tethys_documentation_page');

function tethys_documentation_options() {

        if( isset( $_GET[ 'tab' ] ) ) {  
            $active_tab = $_GET[ 'tab' ];  
        } else {
            $active_tab = 'general_tab';
        }
        ?>  

        <div class="wrap">
            <h1><?php esc_html_e('Tethys Documentation', 'tethys'); ?></h1>
            <p><?php esc_html_e( 'Designed by ', 'tethys' ); ?> <a href="<?php echo esc_url( __( 'https://space-themes.com/', 'tethys' ) ); ?>" target="_blank" title="<?php esc_attr( 'Space-Themes.com', 'tethys' ); ?>"><?php esc_html_e( 'Space-Themes.com', 'tethys' ); ?></a></p>
            <h2 class="nav-tab-wrapper">  
                <a href="?page=space_themes_options&tab=general_tab" class="nav-tab <?php echo $active_tab == 'general_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('General Settings', 'tethys'); ?></a> 
				<a href="?page=space_themes_options&tab=homepage_tab" class="nav-tab <?php echo $active_tab == 'homepage_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Homepage', 'tethys'); ?></a>
				<a href="?page=space_themes_options&tab=single_tab" class="nav-tab <?php echo $active_tab == 'single_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Post Templates', 'tethys'); ?></a>  
				<a href="?page=space_themes_options&tab=megamenu_tab" class="nav-tab <?php echo $active_tab == 'megamenu_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Mega Menu', 'tethys'); ?></a>
				<a href="?page=space_themes_options&tab=breadcrumbs_tab" class="nav-tab <?php echo $active_tab == 'breadcrumbs_tab' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e('Breadcrumbs', 'tethys'); ?></a>
            </h2>  

            <div>
            <?php
                if( $active_tab == 'general_tab' ) {  
            ?>

            <!-- General Settings Start -->

                <p>
                    <iframe width="720" height="405" src="https://www.youtube.com/embed/2RAWNJD_jA4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </p>
                <h2><?php esc_html_e('How to change the logo, main color, date format and enable related posts in the Tethys WordPress Theme:', 'tethys'); ?></h2>
                <ol>
                    <li><?php esc_html_e('Logo and Favicon - Go to &quot;Appearance&quot; - &quot;Customize&quot; - &quot;Site Identity&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Main color - Go to &quot;Appearance&quot; - &quot;Customize&quot; - &quot;Colors&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Enable date format and related posts - Go to &quot;Appearance&quot; - &quot;Customize&quot; - &quot;Posts&quot;.', 'tethys'); ?></li>
                </ol>

            <!-- General Settings End -->

            <?php
                } else if( $active_tab == 'homepage_tab' )  {
            ?>

            <!-- Homepage Start -->

                <p>
                    <iframe width="720" height="405" src="https://www.youtube.com/embed/ac2KO0mwKCw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </p>
                <h2><?php esc_html_e('How to add the homepage in the Tethys WordPress Theme:', 'tethys'); ?></h2>
                <ol>
                    <li><?php esc_html_e('Go to &quot;Pages&quot; - &quot;Add New&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Enter a title and select a template &quot;Homepage&quot;. Click &quot;Publish&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Go to &quot;Settings&quot; - &quot;Reading&quot;. In the block &quot;A static page (select below)&quot;, select the created homepage. Click &quot;Save Changes&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Go to &quot;Appearance&quot; - &quot;Widgets&quot;. Select and configure widgets for your homepage.', 'tethys'); ?></li>
                </ol>

            <!-- Homepage End -->

            <?php
                } else if( $active_tab == 'single_tab' )  {
            ?>

            <!-- Post Templates Start -->

                <p>
                    <iframe width="720" height="405" src="https://www.youtube.com/embed/0JwPWpkppkM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </p>
                <h2><?php esc_html_e('How to change post template style in the Tethys WordPress Theme:', 'tethys'); ?></h2>
                <ol>
                    <li><?php esc_html_e('Go to &quot;Posts&quot; - &quot;Add New&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Select a template in the block &quot;Post template style&quot;. Click &quot;Publish&quot;.', 'tethys'); ?></li>
                </ol>

            <!-- Post Templates End -->

            <?php
                } else if( $active_tab == 'megamenu_tab' )  {
            ?>

            <!-- Mega Menu Start -->

                <p>
                    <iframe width="720" height="405" src="https://www.youtube.com/embed/Tl0YxjheiB8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </p>
                <h2><?php esc_html_e('How to add a mega menu in the Tethys WordPress Theme:', 'tethys'); ?></h2>
                <ol>
                    <li><?php esc_html_e('Go to &quot;Appearance&quot; - &quot;Menus&quot; and select a menu to edit.', 'tethys'); ?></li>
                    <li><?php esc_html_e('In &quot;Screen Options&quot; enable a &quot;CSS Classes&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('For menu item add &quot;has-mega-menu&quot; to &quot;CSS Classes&quot; field and click &quot;Save Menu&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Go to &quot;Appearance&quot; - &quot;Widgets&quot;. Select &quot;[Menu Item Name] - Mega Menu&quot; sidebar area.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Drag &quot;#Mega Menu Post [Tethys]&quot; widget into this area.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Select a category and save.', 'tethys'); ?></li>
                </ol>

            <!-- Mega Menu End -->

            <?php
                } else if( $active_tab == 'breadcrumbs_tab' )  {
            ?>

            <!-- Breadcrumbs Start -->

                <p>
                    <iframe width="720" height="405" src="https://www.youtube.com/embed/duNFWGAI-Qk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </p>
                <h2><?php esc_html_e('How to add breadcrumbs to the Tethys WordPress Theme:', 'tethys'); ?></h2>
                <ol>
                    <li><?php esc_html_e('Go to &quot;Plugins&quot; - &quot;Add New&quot;. Install the plugin &quot;Yoast SEO&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Go to &quot;SEO&quot; - &quot;Search Appearance&quot; - &quot;Breadcrumbs&quot;.', 'tethys'); ?></li>
                    <li><?php esc_html_e('Enable Breadcrumbs. Click &quot;Save Changes&quot;.', 'tethys'); ?></li>
                </ol>

            <!-- Breadcrumbs End -->

            <?php
                }

            ?>
            </div> 

        </div>

        <?php
}