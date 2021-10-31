<?php
/**
 * Template Name: default
 * Template Post Type: page
 *
 * This template is for displaying Contact us page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Scope Theme
 * @since 1.0.0
 *
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;

?>

<?php while ( have_posts() ) : the_post();
	//Include specific template for the content.
	get_template_part( 'partials/content', get_post_type() );
endwhile; ?>

<div class="clear"></div>

<?php get_footer();
