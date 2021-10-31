<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @package Scope Theme
 * @since 1.0.0
 */


/**
 * Theme assets
 *
 * Define variable to store asset directory folder in it.
 *
 * That can be used afterward to call stylesheet / scripts etc
 */

// Time format for the_time()
DEFINE( 'tFormat', 'M d, Y' );

// Define assets folder
DEFINE( 'assetDir', get_template_directory_uri() . '/assets' );

// Define bundle version
DEFINE( 'ASSET_VERSION', filemtime( get_template_directory() . '/assets/css/main.css' ) + filemtime( get_template_directory() . '/assets/js/bundle.min.js' ) );


/**
 * Theme assets
 *
 * Enqueue and Dequeue required files
 */
function assets() {

	// Enqueue theme styles
	wp_enqueue_style( 'theme-style', assetDir . '/css/main.css?v=' . ASSET_VERSION, false, null );

	// Elminiate the emoji script
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	// Enqueue comments reply script on single post pages
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( ! is_admin() && ! is_user_logged_in() ) {

		// Deregister dashicons on frontend
		wp_deregister_style( 'dashicons' );

		// Deregister jQuery
		wp_deregister_script( 'jquery' );

		// Dequeue files
		wp_dequeue_script( 'jquery' );

		// Register project jQuery file
		wp_register_script( 'jquery', assetDir . '/js/jquery.min.js', array(), null, false );

		// Enqueue project jQuery file
		wp_enqueue_script( 'jquery' );

	} else {
		wp_enqueue_script( 'jquery' );
	}

	// Register project scripts
	wp_register_script( 'theme-scripts', assetDir . '/js/bundle.min.js?v=' . ASSET_VERSION, array( 'jquery' ), null, false );

	// Localize
	wp_localize_script(
		'theme-scripts',
		'localVars',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);

	// Enqueue project scripts
	wp_enqueue_script( 'theme-scripts' );

	wp_register_script( 'google-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCzAaHj2BBvTp6xxuuzohYlmgDtS1FV4Po', array( 'jquery' ), null, true );
	wp_localize_script(
		'google-api',
		'localVars',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);
	wp_enqueue_script( 'google-api' );

}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 11 );
