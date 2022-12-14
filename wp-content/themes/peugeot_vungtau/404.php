<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<div class="page-404 container">

	<div class="error-page">
		<div>
			<!--h1(data-h1='400') 400-->
			<!--p(data-p='BAD REQUEST') BAD REQUEST-->
			<!--h1(data-h1='401') 401-->
			<!--p(data-p='UNAUTHORIZED') UNAUTHORIZED-->
			<!--h1(data-h1='403') 403-->
			<!--p(data-p='FORBIDDEN') FORBIDDEN-->
			<h1 data-h1="404">404</h1>
			<p data-p="NOT FOUND">PAGE NOT FOUND</p>
			<!--h1(data-h1='500') 500-->
			<!--p(data-p='SERVER ERROR') SERVER ERROR-->
		</div>
	</div>
<!--	<div id="particles-js"></div>-->
	<!--a(href="#").back GO BACK-->
</div>
<?php
get_footer();
