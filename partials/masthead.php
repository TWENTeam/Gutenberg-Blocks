<?php
/**
 * Template part for displaying content of about us page.
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package Scope Theme
 * @since 1.0.0
 *
 */

// Global variables
global $option_fields;
global $pID;
global $fields;

// Homepage Banner - Advanced custom fields variables
$homepage_banner_heading				= $fields['homepage_banner_heading'];
$homepage_banner_sub_heading			= $fields['homepage_banner_sub_heading'];
$homepage_banner_button_text			= $fields['homepage_banner_button_text'];
$homepage_banner_button_link			= $fields['homepage_banner_button_link'];

// Page Banner - Advanced custom fields variables
$page_banner_section_image				= $fields['page_banner_section_image'];
$page_banner_section_headline			= $fields['page_banner_section_headline'];
$page_banner_section_sub_headline		= $fields['page_banner_section_sub_headline'];

// Single Burger Banner - Advanced custom fields variables
$single_burger_heading					= $fields['single_burger_heading'];
$single_burger_sub_heading				= $fields['single_burger_sub_heading'];


/**
 * Homepage Masthead
 *
 */
if ( is_page_template( 'templates/template-home.php' ) ) { ?>

	<section class="home-banner">
		<div class="wrapper">
			<h1 class="heading" id="home-banner-heading">
				<?php echo $homepage_banner_heading; ?>
			</h1>
			<h2 class="subheading">
				<?php echo $homepage_banner_sub_heading; ?>
			</h2>
			<div class="slider owl-carousel owl-theme home-slider" id="home-slider">
				<?php
					query_posts(
						array(
							'post_type'      => 'burgers',
							'posts_per_page' => -1,
						)
					);
				?>
				<?php
					if ( have_posts() ) :
					while ( have_posts() ) :
					the_post();
				?>

					<div class="slide item">
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="slide-thumb">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(
										'full-thumbnail',
										array(
											'alt' => get_the_title(),
											'title' => get_the_title(),
										)
									); ?>
								</a>
							</div>
						<?php } ?>
						<h3 class="slide-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
					</div>
				<?php
					endwhile;
					endif;
					wp_reset_query();
				?>
			</div><!-- .owl-carousel -->
			<div class="view-burgers">
				<a href="<?php echo str_replace( '[site_url]', home_url(), $homepage_banner_button_link ); ?>"  class="button">
					<?php echo $homepage_banner_button_text; ?>
				</a>
			</div><!-- .view-burgers -->
		</div><!-- .wrapper -->
	</section>

<?php }


/**
 * 404 Error page masthead
 *
 */
elseif ( is_404() ) { ?>

<section class="page-banner">
	<div class="wrapper">
		<img assets="<?php echo get_template_directory_uri(); ?>/assets/img/error-icon.png" alt="Error Icon" title="Error Icon" class="banner-icon" >
		<h2 class="heading"><?php _e( 'Error 404', 'theme_textdomain' ); ?></h2>
		<h3 class="subheading"><?php _e( 'Oops! You broke it :(', 'theme_textdomain' ); ?></h3>
	</div>
</section>

<?php }


/**
 * Archive masthead
 *
 */
elseif ( is_archive() ) { ?>

<section class="page-banner">
	<div class="wrapper">
		<div class="banner-icon"> <img assets="<?php echo get_template_directory_uri(); ?>/assets/img/burger-icon.png" title="Burger Icon" alt="Burger Icon" class="burger-icon"></div>
		<div class="page-banner-headings">
			<?php
				the_archive_title( '<h1 class="heading">', '</h1>' );
			?>
		</div>
		</div>
</section>

<?php }


/**
 * Search masthead
 *
 */
elseif ( is_search() ) { ?>

<section class="page-banner">
	<div class="wrapper">
		<div class="banner-icon"> <img assets="<?php echo get_template_directory_uri(); ?>/assets/img/burger-icon.png" title="Burger Icon" alt="Burger Icon" class="burger-icon"> </div>
		<div class="page-banner-headings">
			<h1 class="heading">
				<?php _e( 'Search Results', 'theme_textdomain' ); ?>
			</h1>
		</div>
	</div>
</section>

<?php }


/**
 * Single burger masthead
 *
 */
elseif ( is_singular( 'burgers' ) ) {?>

	<section class="page-banner">
		<div class="wrapper">
			<img assets="<?php echo get_template_directory_uri(); ?>/assets/img/burger-icon.png" alt="Burger Icon" title="Burger Icon" class="banner-icon">
			<h1 class="heading">
				<?php echo $single_burger_heading; ?>
			</h1>
			<h2 class="subheading">
				<?php echo $single_burger_sub_heading; ?>
			</h2>
		</div>
	</section>

<?php }


/**
 * Single post masthead
 *
 */
elseif ( is_singular( 'post' ) ) { ?>

	<section class="page-banner">
		<section class="banner">
			<div class="wrapper">
				<div class="banner-icon"> <img assets="<?php echo get_template_directory_uri(); ?>/assets/img/blog-icon.png" title="Blog Icon" alt="Blog Icon" /></div>
				<div class="page-banner-headings">
					<h1 class="heading"><?php _e( 'JUST BURGERS BLOG', 'theme_textdomain' ); ?></h1>
					<h2 class="subheading"> <?php _e( 'Stay Tuned To Our Latest Updates', 'theme_textdomain' ); ?> </h2>
				</div>
			</div>
		</section>
	</section>

<?php }


/**
 * Index masthead
 *
 */
elseif ( is_home() & is_front_page() ) { ?>

	<section class="page-banner">
		<div class="wrapper">
			<?php $images = $fields['page_icon']; ?>
			<img assets="<?php echo get_template_directory_uri(); ?>/assets/img/blog-icon.png" itle="Blog Icon" alt="Blog Icon" />
			<h1 class="heading"> <?php bloginfo( 'name' ); ?> </h1>
			<h2 class="subheading"><?php bloginfo( 'description' ); ?></h2>
		</div>
	</section>

<?php }


/**
 * Page masthead
 *
 */
else { ?>

	<section class="page-banner">
		<div class="wrapper">
			<img assets="<?php echo $page_banner_section_image; ?>" alt="banner image" class="banner-icon"  />
			<h1 class="heading">
				<?php
					if( $page_banner_section_headline != '' ) {
						echo $page_banner_section_headline;
					} else {
						echo the_title();
					}
				?>
			</h1>
			<h2 class="subheading">
				<?php
					if( $page_banner_section_sub_headline != '' ) {
						echo $page_banner_section_sub_headline;
					}
				?>
			</h2>
		</div>
	</section>

<?php }


/**
 * Breadcrumbs for all pages except homepage
 *
 */
if ( ! is_page_template( 'templates/template-home.php' ) ) { ?>

	<section class="breadcrumbs-sec">
		<?php if ( function_exists( 'yoast_breadcrumb' ) ) {
			yoast_breadcrumb( '<div id="breadcrumbs">', '</div>' );
		} ?>
	</section>

<?php } ?>
