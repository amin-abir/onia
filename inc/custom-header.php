<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Onia
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses onia_header_style()
 */
function onia_custom_header_setup() {
	add_theme_support(
		'custom-header',
		apply_filters(
			'onia_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1800,
				'height'             => 200,
				'flex-height'        => true,
			)
		)
	);
}
add_action( 'after_setup_theme', 'onia_custom_header_setup' );

