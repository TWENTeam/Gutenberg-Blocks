<?php
/**
 * The template  displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Scope 
 * @since 1.0.0
 */

// Include header
get_header();

// Global variables
global $option_fields;
global $pID;
global $fields;
global $current_page_cta;
$current_page_cta = 1;

?> <div class="wrapper">
	<section class="error-404 not-found">
		<div class="page-content">
			<p> <?php _e( 'It looks like you may have taken a wrong turn', 'scope' ); ?><br />
				<?php _e( 'Don\'t worry... it happens to the best of us.', 'scope' ); ?> </p>
			<p> <?php _e( 'Here\'s a little map that might help you get back on track:', 'scope' ); ?> </p>
			<div class="error">
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main',
						'fallback_cb'    => 'fallbackmenu',
					)
				);
				?>
				 </div>
			<div class="clear"></div>
			<p> <?php _e( 'Or you can look for your way here:', 'scope' ); ?> </p> <?php get_search_form(); ?>
		</div><!-- .page-content -->
	</section><!-- .error-404 -->
</div>

<?php
get_footer();
