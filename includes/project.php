<?php
/**
 * Extra functions for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Scope Theme
 * @since 1.0.0
 */

/**
 * Custom logo for WordPress login screen
 *
 * This function replaces the default WordPress logo on the login with website logo.
 */
function custom_login_logo() {
	echo '
		<style type="text/css">
			.login h1 a {
				background-image: url(' . get_stylesheet_directory_uri() . '/assets/img/logo.png) !important;
				background-position: center center;
				color:rgba(0, 0, 0, 0);
				background-size: contain;
				height: 80px;
				width: 80%;
				outline: 0;
			}

		</style>
	';
}

add_action( 'login_head', 'custom_login_logo' );

/**
 * Custom CSS Styling for Admin Page
 *
 * This function adds some new css styles to admin page.
 */
function scope_custom_css_styles() {
	echo '<style>
    tr.form-field.term-description-wrap {
		display: none;
	}
  </style>';
}

add_action( 'admin_head', 'scope_custom_css_styles' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'theme_content_width', 640 );
}

add_action( 'after_setup_theme', 'theme_content_width', 0 );


/**
* Add custom class to gravity form submit button
*/
add_filter( 'gform_submit_button_3', 'custom_class_button', 10, 2 );
function custom_class_button( $button, $form ) {
	$dom = new DOMDocument();
	$dom->loadHTML( '<?xml encoding="utf-8" ?>' . $button );
	$input    = $dom->getElementsByTagName( 'input' )->item( 0 );
	$classes  = $input->getAttribute( 'class' );
	$classes .= ' newsletter-submit';
	$input->setAttribute( 'class', $classes );
	return $dom->saveHtml( $input );
}


/**
* Add custom class to gravity form text input
*/
add_filter( 'gform_field_css_class_3', 'custom_class_input', 10, 3 );
function custom_class_input( $classes, $field, $form ) {
	if ( $field->type == 'text' ) {
		$classes .= ' newsletter-input';
	}
	return $classes;
}
function add_my_favicon() {
	$favicon_path = get_template_directory_uri() . '/favicon.ico';

	echo '<link rel="shortcut icon" href="' . esc_url( $favicon_path ) . '" />';
}

add_action( 'admin_head', 'add_my_favicon' );

/**
 * Function to remove the starting words from the_archive_title()
 *
 * E.g. from Category : Dallas Neighborhoods => Dallas Neighborhoods
 */

add_filter(
	'get_the_archive_title',
	function ( $title ) {
		if ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_tag() ) {
			$title = single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_tax() ) { // for custom post types
			$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
		}
		return $title;
	}
);


