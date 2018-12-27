<?php
if( !class_exists( 'mythemes_layout' ) ){

class mythemes_layout
{
    public $contentClass    = '';
    public $layout          = '';
    public $template        = '';
    public $deff            = array(
        'layout'    => array(
            'default'       => 'right',
            'front-page'    => 'full',
            'page'          => 'full',
            'post'          => 'right',
            'special-page'  => 'right'
        ),
        'sidebar'   => array(
            'default'       => 'main',
            'front-page'    => 'front-page',
            'page'          => 'page',
            'post'          => 'post',
            'special-page'  => 'special-page'
        )
    );

    function get( $setting, $template )
    {
        $rett = '';

        switch( $template ){
            case 'front-page' :
            case 'post' :
            case 'page' :
            case 'special-page': {
                $rett = esc_attr( get_theme_mod( 'mythemes-' . $template . '-' . $setting , $this -> deff[ $setting ][ $template ] ) );
                break;
            }
            default : {
                $rett = esc_attr( get_theme_mod( 'mythemes-' . $setting, $this -> deff[ $setting ][ 'default' ] ) );
                break;
            }
        }

        return $rett;
    }

    function __construct( $template = '' )
    {
        $this -> template   = $template;
        $this -> layout     = $this -> get( 'layout' , $template );

        if( $this -> layout == 'left' || $this -> layout == 'right' ){
            $this -> contentClass = 'col s12 m12 l9 mythemes-classic';
            return;
        }

        $this -> contentClass = 'col s12 m12 l12 mythemes-classic';
    }

    function sidebar( $position )
    {
        $sidebar = $this -> get( 'sidebar', $this -> template );

        if( $this -> layout == $position ){

            echo '<aside class="col s12 m12 l3 mythemes-sidebar sidebar-to-' . esc_attr( $position ) . '">';

            get_sidebar( esc_attr( $sidebar ) );

            echo '</aside>';

            return;
        }
    }

    static function load_sidebar( )
    {
        $sidebar = isset( $_POST[ 'sidebar' ] ) ? esc_attr( $_POST[ 'sidebar' ] ) : null;

        get_sidebar( esc_attr( $sidebar ) );

        exit();
    }

    function classes( ) {
        return esc_attr( $this -> contentClass );
    }
}

}   /* END IF CLASS EXISTS */
?>
