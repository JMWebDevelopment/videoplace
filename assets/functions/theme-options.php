<?php
/**
 * Theme-options.php
 *
 * Theme options file, using the Customizer, for Fotographia
 *
 * @author Jacob Martella
 * @package Fotographia
 * @version 1.1
 */

//* Create the general settings section
function videoplace_general_customizer( $wp_customize ) {
	$wp_customize->add_section(
		'general',
		array(
			'title' => __('VideoPlace Settings', 'videoplace'),
			'description' => __('These are the theme options for VideoPlace.', 'videoplace'),
			'priority' => 35,
		)
	);

	//* Home Slider Category
	$wp_customize->add_setting(
		'videoplace-show-sticky-post',
		array(
			'default' => '',
			'sanitize_callback' => 'videoplace_sanitize_checkbox',
		)
	);

	$wp_customize->add_control(
		'videoplace-show-sticky-post',
		array(
			'label' => __('Show Latest Sticky Post at top of home page: ', 'theme-slug'),
			'section' => 'general',
			'type' => 'checkbox',
		)
	);

}
add_action( 'customize_register', 'videoplace_general_customizer' );


//* Sanitize Links
function theme_slug_sanitize_link($input) {
	return esc_url_raw( $input );
}

//* Sanitize Layout Option
function theme_slug_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

//* Sanitize Checkboxes
function videoplace_sanitize_checkbox( $input ) {
	return ( ( isset( $input ) && true == $input ) ? 1 : 0 );
}

//* Sanitize Category Options
function theme_slug_sanitize_category( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

//* Sanitize Numbers
function theme_slug_sanitize_num($input, $setting) {
	$number = absint( $input );
	return ( $input ? $input : $setting->default );
}

//* Sanitize Text
function theme_slug_sanitize_text($input) {
	return wp_filter_nohtml_kses( $input );
}
?>