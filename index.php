<?php
/**
 * The main template file
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
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

?>


<section class="big-section">
	<div class="wrapper">
		<div class="blog-posts-container">

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			// Include specific template for the content
			get_template_part( 'partials/content', 'archive-post' );
		endwhile;
		?>
		<div class="clear"></div>
		<?php
	else :

		// If no content, include the "No posts found" template.
		get_template_part( 'partials/content', 'none' );
	endif;
	?>

</div>

</div>
</section>

<?php get_footer(); ?>
