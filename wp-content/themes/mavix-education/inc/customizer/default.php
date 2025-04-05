<?php
/**
 * Default theme options.
 *
 * @package Mavix Education
 */

if ( ! function_exists( 'mavix_education_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function mavix_education_get_default_theme_options() {

	$mavix_education_defaults = array();

	// Contact Details
	$mavix_education_defaults['mavix_education_show_contact_details'] 		= true;
	$mavix_education_defaults['mavix_education_address_one']				= esc_html__('214 West Arnold St','mavix-education');
	$mavix_education_defaults['mavix_education_address_two']				= esc_html__('New York, NY 10002','mavix-education');
	$mavix_education_defaults['mavix_education_phone_number']				= esc_html__('(007) 123 456 7890','mavix-education');
	$mavix_education_defaults['mavix_education_opening_time']				= esc_html__('Mon-Fri 10:00am-7:30pm','mavix-education');
	$mavix_education_defaults['mavix_education_email_id']					= esc_html__('info@example.com','mavix-education');
	$mavix_education_defaults['mavix_education_support_text']				= esc_html__('24 X 7 online support','mavix-education');

	// Menu
	$mavix_education_defaults['mavix_education_show_menu_button'] 			= true;
	$mavix_education_defaults['mavix_education_menu_button_text']			= esc_html__('Get Started','mavix-education');
	$mavix_education_defaults['mavix_education_menu_button_url']			= esc_url('#','mavix-education');

	//General Section
	$mavix_education_defaults['readmore_text']					= esc_html__('Read More','mavix-education');
	$mavix_education_defaults['your_latest_posts_title']			= esc_html__('Blog','mavix-education');
	$mavix_education_defaults['excerpt_length']					= 10;
	$mavix_education_defaults['layout_options_blog']				= 'no-sidebar';
	$mavix_education_defaults['layout_options_archive']			= 'no-sidebar';
	$mavix_education_defaults['layout_options_page']				= 'no-sidebar';	
	$mavix_education_defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$mavix_education_defaults['copyright_text']					= esc_html__( 'Copyright &copy; All rights reserved.', 'mavix-education' );

	// Pass through filter.
	$mavix_education_defaults = apply_filters( 'mavix_education_filter_default_theme_options', $mavix_education_defaults );
	return $mavix_education_defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'mavix_education_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function mavix_education_get_option( $key ) {

		$mavix_education_default_options = mavix_education_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$mavix_education_theme_options = (array)get_theme_mod( 'theme_options' );
		$mavix_education_theme_options = wp_parse_args( $mavix_education_theme_options, $mavix_education_default_options );

		$value = null;

		if ( isset( $mavix_education_theme_options[ $key ] ) ) {
			$value = $mavix_education_theme_options[ $key ];
		}

		return $value;

	}

endif;