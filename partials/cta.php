<?php
/**
 * Template part for footer cta
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/
 *
 * @package Mobiletech Theme
 * @since 1.0.0
 */

// Global variables
global $option_fields;
global $pID;
global $fields;
global $current_page_cta;


$scope_page_cta_pagevisibility = $fields['scope_page_cta_pagevisibility'];

$scope_ftrcta_headline = ( $fields['scope_page_cta_headline'] ) ? $fields['scope_page_cta_headline'] : $option_fields['scope_to_cta_headline'];
$scope_ftrcta_button   = ( $fields['scope_page_cta_button'] ) ? $fields['scope_page_cta_button'] : $option_fields['scope_to_cta_button'];


if ( $show_hide_cta == 1 ) {
	?> <?php } ?>

<?php if ( $scope_page_cta_pagevisibility || $current_page_cta === 1 ) { ?>
<div class="footer-cta-container">
	<div class="wrapper">
		<div class="footer-cta">
			<h2><?php echo $scope_ftrcta_headline; ?></h2>
			<?php
			if ( $scope_ftrcta_button ) :
				echo build_acf_button( $scope_ftrcta_button, 'button red-btn-arrow' );
				endif;
			?>
		</div>
		<span class="cta-oval-one"></span>
		<span class="cta-oval-two"></span>
		<span class="cta-oval-three"></span>
		<span class="cta-oval-four"></span>
		<span class="cta-oval-five"></span>
	</div>
</div>
<?php } ?>
