<?php
/**
 * The template for displaying website header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Scope 
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;
global $current_page_cta;
$current_page_cta = null;

$pID = get_the_ID();

if ( is_home() ) {
	$pID = get_option( 'page_for_posts' );
}

if ( is_404() || is_archive() || is_search() ) {
	$pID = get_option( 'page_on_front' );
}

$option_fields = get_fields( 'option' );
$fields        = get_fields( $pID );

// Page variables - Advanced custom fields variables
$scope_to_hdr_button    = $option_fields['scope_to_hdr_button'];
$scope_to_menutitle     = $option_fields['scope_to_menutitle'];
$scope_to_menuselection = $option_fields['scope_to_menuselection'];



?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
	<script>
	// Identifies the Browser type in the HTML tag for specific browser CSS
	var doc = document.documentElement;
	doc.setAttribute('data-useragent', navigator.userAgent);
	doc.setAttribute("data-platform", navigator.platform);
	</script> <?php wp_head(); ?>
</head>
<?php $post_type = get_post_type();
 if($post_type == 'listings') $body_classes = "listings-search";
 ?>
<body <?php body_class($body_classes);  ?>>
	
	<main id="content" class="site-content"> <?php
			/**
			 * Include masthead
			 *
			 * Contains masthead settings for each type and template for the theme
			 */
			get_template_part( 'partials/masthead' );
	?>
