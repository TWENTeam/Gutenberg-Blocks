<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Scope 
 * @since 1.0.0
 *
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="post-container wrapper">
		<div class="post-image">
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="thumb">
						<?php the_post_thumbnail(
							'single-post-thumbnail',
							array(
								'alt'   => get_the_title(),
								'title' => get_the_title(),
							)
						); ?>
				</div>
			<?php } else { ?>
				<img assets="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.jpg"  class="attachment-single-post-thumbnail size-single-post-thumbnail wp-post-image" alt="" title="">
			<?php } ?>
		</div><!-- .post-image -->
		<div class="post-content">
			<?php
			the_content( sprintf(
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
			) );
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'scope' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</section>
	<?php if ( get_edit_post_link() ) : ?>
		<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'scope' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	<?php endif; ?>
</article>
