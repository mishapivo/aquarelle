<?php
if( !class_exists( 'mythemes_admin') ){

class mythemes_admin
{
    static function pageHeader( $pageSlug )
    {

        echo '<div class="mythemes-panel-header">';
        echo '<div class="mythemes-topper"></div>';
        echo '<div class="mythemes-middle mythemes-row">';

        echo '<div class="mythemes-col-3">';
        echo '<h1 class="mythemes-brand"><a href="' . mythemes_core::author( 'url' ) . '" title="' . mythemes_core::author( 'name' ) .' - ' . mythemes_core::author( 'description' ) . '">' . mythemes_core::author( 'name' ) . '</a></h1>';
        echo '</div>';

        echo '<div class="mythemes-col-9">';
        echo '<nav class="mythemes-nav">';

        echo '<ul class="mythemes-list mythemes-inline">';


        echo '<ul class="mythemes-list mythemes-inline special mythemes-free-theme">';

        /* WILL BE A TAB OR A PAGE WITH UPGRADE SYSTEM */
        if( mythemes_core::exists_premium() ){
            echo '<li>';
            echo '<a href="' . esc_url( mythemes_core::theme( 'premium' ) ) . '"><i class="materialize-icon-publish"></i> <span>Upgrade to Premium</span></a>';
            echo '</li>';
        }
        
        echo '</ul>';

        echo '</nav>';
        echo '</div>';

        echo '<div class="clear clearfix"></div>';
        echo '</div>';
        echo '<div class="mythemes-poor"></div>';
        echo '</div>';


        /* BLANK SPACE */
        echo '<div class="mythemes-blank">';
        echo '<span class="mythemes-author-description"><a href="' . mythemes_core::author( 'url' ) . '" title="' . mythemes_core::author( 'name' ) .' - ' . mythemes_core::author( 'description' ) . '">' . mythemes_core::author( 'description' ) . '</a></span>';
        echo '<a href="' . esc_url( mythemes_core::theme( 'ThemeURI' ) ) . '"><strong>' . mythemes_core::theme( 'Name' ) . '</strong> - ' . mythemes_core::version() . '</a>';
        echo '</div>';


        /* CONTENT */
        echo '<div class="mythemes-panel-wrapper">';
    }
    
    static function pageMenu()
    {
        $parent     = '';
        $pages      = mythemes_cfg::get_pages();
        $pageCB     = array( 'mythemes_admin', 'displayPage' );

        foreach( $pages as $slug => &$d ) {
            if( isset( $d[ 'menu' ] ) ) {
                $m = $d[ 'menu' ];
                if( strlen( $parent ) == 0 ) {
                    add_theme_page(
                        $m[ 'label' ]                                           /* page_title   */
                        , $m[ 'label' ]                                         /* menu_title   */
                        , 'administrator'                                       /* capability   */
                        , $slug                                                 /* menu_slug    */
                        , $pageCB                                               /* function     */
                    );
                    $parent = $slug;
                }
            }
        }
    }

    static function displayPage()
    {   
        if( !isset( $_GET ) || !isset( $_GET[ 'page' ] ) ){
            wp_die( 'Invalid page name', 'materialize' );
            return;
        }

        $pageSlug = $_GET[ 'page' ];

        echo '<div class="mythemes-admin-page">';

        echo self::pageHeader( $pageSlug );

        echo '</div>';

        $faqs = mythemes_cfg::get( 'faqs' );


        if( !empty( $faqs ) ){
            foreach( $faqs as $faq ){
                echo '<div class="mythemes-content">';
                echo '<div class="mythemes-box">';
                echo '<div class="mythemes-box-header">';
                echo '<h3>' . $faq[ 'title' ] . '</h3>';
                echo '</div>';
                echo '<div class="mythemes-box-content">';
                echo $faq[ 'content' ];
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
    }
}

}	/* END IF CLASS EXISTS */
?>