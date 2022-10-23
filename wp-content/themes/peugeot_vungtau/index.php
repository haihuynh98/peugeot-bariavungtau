<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Peugeot_Vung_Tau
 */

get_header();
?>

<?php

// build banner section
	get_template_part( 'elements/banner-carousel');
//build car list section
get_template_part( 'elements/product-list');
//build 4 column option section
get_template_part( 'elements/column-option');
//build news section
get_template_part( 'elements/news');

?>

<?php
get_footer();
