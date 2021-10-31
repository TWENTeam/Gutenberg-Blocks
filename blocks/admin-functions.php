<?php
	/* Themes Functions and include files */

	/**
 * Theme Contants
 */

define( 'TEHEME_TEXT_DOMAIN', 'scoping' );
define( 'TEHEME_DIRECTORY', get_template_directory() );
define( 'TEHEME_DIRECTORY_URI', get_template_directory_uri() );
define( 'TEHEME_INC_DIRECTORY', TEHEME_DIRECTORY .'/blocks/' );
define( 'TEHEME_BLOCKS', TEHEME_INC_DIRECTORY .'theme-blocks/' );

require TEHEME_BLOCKS .'blocks.php';

