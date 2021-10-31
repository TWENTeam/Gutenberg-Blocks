<?php
/**
 * Functions for advanced custom fields plugin
 *
 * @link https://www.advancedcustomfields.com/resources/
 *
 * @package Scope Theme
 * @since 1.0.0
 *
 */

/**
 * Build ACF based theme options page
 *
 */
if( function_exists('acf_add_options_page') ) {
  $option_page = acf_add_options_page(array(
		'page_title' 	=> __( 'Theme Options', 'theme_textdomain' ),
		'menu_title' 	=> __( 'Theme Options', 'theme_textdomain' ),
		'menu_slug' 	=> 'acf-options',
		'capability' 	=> 'edit_posts',
		'redirect' 		=> false,
		'position'		=> 2
	));
}


/**
 * Function to prevent php errors when the ACF field isn't in the field array
 *
 */
function snag_field($name) {
	global $twen_page_fields;
	return (isset($twen_page_fields[$name]) ? $twen_page_fields[$name] : "");
}


/**
 * Helper function that builds button from ACF link object
 *
 */
function build_acf_button($object, $classes="") {
	$link = "";
	$link = "<a href='".$object['url']."' target='".$object['target']."' class=' ".$classes." '>".$object['title']."</a>";
	return $link;
}
