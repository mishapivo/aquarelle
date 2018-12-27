<?php
$pages  = mythemes_cfg::get_pages();

$cols   = array();
$boxes  = array();
$sett   = array();


$pages[ 'mythemes-materialize-faq' ] = array(
    'menu' => array(
        'label'     => __( 'Materialize FAQ' , 'materialize' )
    ),
    'cols'  => & $cols,
    'boxes' => & $boxes,
    'sett'  => & $sett
);

mythemes_cfg::set_pages( $pages );
?>