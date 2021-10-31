<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * Please note that missing files will produce a fatal error.
 *
 * @package Scope 
 * @since 1.0.0
 */

$file_includes = array(
	'includes/setup.php',           // Basic theme setup
	'includes/scripts.php',         // Enqeue theme styles and scripts
	'includes/widgets.php',         // Theme widget area
	'includes/project.php',         // Custom functions for this specific project
	'includes/acf.php',             // Advanced custom fields functions
	'includes/cpt.php',             // Custom post types setup
	'includes/custom.php',          // Custom functions
	'includes/ajax.php',            // Ajax related functions
	'includes/browsers.php',        // Browser detection function
	'blocks/admin-functions.php',        // Acf Gutenberg Blocks
	// 'includes/dashboard.php',       // Custom Dashboard Widget

);


/**
 * Checks if any file have error while including it.
 */
foreach ( $file_includes as $file ) {
	if ( ! $filepath = locate_template( $file ) ) {
		trigger_error( sprintf( __( 'Error locating %s for inclusion', 'scope' ), $file ), E_USER_ERROR );
	}
	require_once $filepath;
}
unset( $file, $filepath );
global $browser;
$browser = new Browsersphp\Browsers();


// function my_acf_init() {

// acf_update_setting( 'google_api_key', 'AIzaSyAUoSUnTu59vVG7q1zzb9ZARfkET46lGrw' );
// }

// add_action( 'acf/init', 'my_acf_init' );


function my_acf_init() {

	acf_update_setting( 'google_api_key', 'AIzaSyCzAaHj2BBvTp6xxuuzohYlmgDtS1FV4Po' );
}
add_action( 'acf/init', 'my_acf_init' );

// wp_register_script( 'google-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDHgz31ZBv-LZKjNp9DpxfmpVyHNkWAP8k',array('jquery'), null, true );
// wp_localize_script('google-api', 'localVars', array(
// 'ajaxurl' => admin_url('admin-ajax.php')
// ));
// wp_enqueue_script( 'google-api' );

// Returns maximum in array
function getMaxInArray( $array ) {
	$n            = count( $array );
	$first_string = str_replace( ' ', '-', $array[0] ); // Replaces all spaces with hyphens.
	$first_string = preg_replace( '/[^A-Za-z0-9\-]/', '', $first_string ); // Removes special chars.
	$first_string = (int) $first_string;
	$max          = $first_string;
	for ( $i = 1; $i < $n; $i++ ) {
		$string = str_replace( ' ', '-', $array[ $i ] ); // Replaces all spaces with hyphens.
		$string = preg_replace( '/[^A-Za-z0-9\-]/', '', $string ); // Removes special chars.
		$string = (int) $string;

		if ( $max < (int) $string ) {
			$max = $string;
		}
	}
	return number_format( $max );
}

// Returns maximum in array
function getMinInArray( $array ) {
	$n            = count( $array );
	$first_string = str_replace( ' ', '-', $array[0] ); // Replaces all spaces with hyphens.
	$first_string = preg_replace( '/[^A-Za-z0-9\-]/', '', $first_string ); // Removes special chars.
	$first_string = (int) $first_string;
	$min          = $first_string;
	for ( $i = 1; $i < $n; $i++ ) {
		$string = str_replace( ' ', '-', $array[ $i ] ); // Replaces all spaces with hyphens.
		$string = preg_replace( '/[^A-Za-z0-9\-]/', '', $string ); // Removes special chars.
		$string = (int) $string;
		if ( $min > (int) $string ) {
			$min = $string;
		}
	}
	return number_format( $min );
}


// Acf Json

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = get_stylesheet_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}