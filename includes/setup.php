<?php
/**
 * Setup function for the project
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Scope Theme
 * @since 1.0.0
 */

 /**
  * Sets up theme defaults and registers support for various WordPress features.
  */
if ( ! function_exists( 'theme_setup_function' ) ) :

	function theme_setup_function() {

		// Make theme available for translation.
		load_theme_textdomain( 'scope' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Set post thumbnail sizes
		set_post_thumbnail_size( 150, 150, true );

		// Add custom thumbnail sizes
		add_image_size( 'admin', 50, 50 );
		add_image_size( 'full', 9999, 9999 );
		add_image_size( 'thumb_315', 315, 335, true );
		add_image_size( 'thumb_370', 370, 340, true );
		add_image_size( 'thumb_740', 740, 680, true );
		add_image_size( 'thumb_630', 630, 670, true );
		add_image_size( 'thumb_400', 400, 9999 );
		add_image_size( 'thumb_600', 600, 9999 );
		add_image_size( 'thumb_660', 660, 9999 );
		add_image_size( 'thumb_760', 760, 740, true );
		add_image_size( 'thumb_1520', 1520, 1480, true );
		add_image_size( 'thumb_800', 800, 9999 );
		add_image_size( 'thumb_960', 960, 9999 );
		add_image_size( 'thumb_1000', 1000, 9999 );
		add_image_size( 'thumb_1200', 1200, 9999 );
		add_image_size( 'thumb_1280', 1280, 9999 );
		add_image_size( 'thumb_1600', 1600, 9999 );
		add_image_size( 'thumb_1920', 1920, 9999 );
		add_image_size( 'thumb_2560', 2560, 9999 );

		// Register wp_nav_menu() menus
		register_nav_menus(
			array(
				'main'   => __( 'Main Navigation', 'scope' ),
				'footer' => __( 'Footer Menu', 'scope' ),
			)
		);

		// Fallback function for menus
		function fallbackmenu(){ ?> <div id="menu">
	<ul>
		<li> <?php _e( 'Go to Admin > Appearance > Menus to create your menu.', 'scope' ); ?></li>
	</ul>
</div>
			<?php
		}

		// Adding HTML5 support
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Align support for Gutenberg
		add_theme_support( 'align-wide' );

		// Set JPEG quality to 100%
		add_filter(
			'jpeg_quality',
			function() {
				return 100;
			}
		);

	}
endif;

add_action( 'after_setup_theme', 'theme_setup_function' );
