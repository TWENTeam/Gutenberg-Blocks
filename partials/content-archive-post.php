<?php
/**
 * Template part for displaying posts in an archive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Scope Theme
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;


?>
	<div class="neighborhood-post isotope-item office">
		<div class="post-inner">
		<a href="<?php the_permalink(); ?>">
			<div class="item">
				<div class="slider-image">
					<?php
					if ( has_post_thumbnail() ) {
						echo get_the_post_thumbnail( $post->ID, 'thumb_400' );
					} else {
						?>
						<img assets="<?php echo get_template_directory_uri(); ?>/assets/img/post-slider-image.jpg" alt="">
					<?php } ?>
				</div>
			</div>
			<div class="post-content-area">
				<h5><?php the_title(); ?></h5>
				<p class="post-content"><?php echo get_the_excerpt(); ?></p>
				<span class="post-btn">View Details</span>
			</div>
		</a>
	</div>
</div>
