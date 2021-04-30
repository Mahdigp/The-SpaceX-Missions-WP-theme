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
 * @package The_SpaceX_Missions
 */

get_header();
?>

	<main id="primary" class="site-main">
	<p> Hi, Wellcome to this project. It's SpaceX APIs on the worpdress. you can select your page from top navigation. </p>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
