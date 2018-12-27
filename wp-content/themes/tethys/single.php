<?php get_header(); ?>

<?php
$header_style = get_post_meta( get_the_ID(), 'header_style', true );

if ($header_style == 1) {
	get_template_part( '/theme-parts/single/style-1' ); }
else if ($header_style == 2) {
	get_template_part( '/theme-parts/single/style-2' ); }
else if ($header_style == 3) {
	get_template_part( '/theme-parts/single/style-3' ); }
else if ($header_style == 4) {
	get_template_part( '/theme-parts/single/style-4' ); }
else {
	get_template_part( '/theme-parts/single/style-1' ); }
?>

<?php get_footer(); ?>