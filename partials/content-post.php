<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Scope 
 * @since 1.0.0
 */

?>
<article class="post-container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="s-section">
		<div class="wrapper">
			<div class="page-content">
						<?php
						the_content(
							sprintf(
								wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'scope' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								get_the_title()
							)
						);
						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'scope' ),
								'after'  => '</div>',
							)
						);
						?>
			</div>
		</div>
	</section>
	<?php
	wp_reset_query();
	wp_reset_postdata();

		$related = new WP_Query(
			array(
				'category__in'   => wp_get_post_categories( $post->ID ),
				'posts_per_page' => 3,
				'post__not_in'   => array( $post->ID ),
			)
		);

		if ( $related->have_posts() ) {
			?>
	<section class="big-section">
		<div class="related-posts" style="background-color: rgba(126, 201, 232, 0.15);">
			<div class="wrapper">
			<h2 class="center-align"><?php _e( 'Still curious', 'scope' ); ?>?</h2>
			<div class="blog-posts-triangles">
				<div class="blog-posts-container posts-slider">
					<?php
					while ( $related->have_posts() ) {
						$related->the_post();
						?>
					<div class="neighborhood-post isotope-item">
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
							<?php
					}
					wp_reset_query();
					wp_reset_postdata();
					?>
<div class="clear"></div>

				</div>

			</div>
			<!-- /.blog-posts-triangles -->
		</div>
	</section>
				<?php
		}

		?>

</article>
