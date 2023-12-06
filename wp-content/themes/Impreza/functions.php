<?php defined( 'ABSPATH' ) OR die( 'This script cannot be accessed directly.' );

/**
 * Theme functions and definitions
 */

if ( ! defined( 'US_ACTIVATION_THEMENAME' ) ) {
	define( 'US_ACTIVATION_THEMENAME', 'Impreza' );
}

global $us_theme_supports;
$us_theme_supports = array(
	'plugins' => array(
		'js_composer' => 'plugins-support/js_composer/js_composer.php',
		'Ultimate_VC_Addons' => 'plugins-support/Ultimate_VC_Addons.php',
		'revslider' => 'plugins-support/revslider.php',
		'contact-form-7' => NULL,
		'gravityforms' => 'plugins-support/gravityforms.php',
		'woocommerce' => 'plugins-support/woocommerce.php',
		'bbpress' => 'plugins-support/bbpress.php',
		'tablepress' => 'plugins-support/tablepress.php',
		'the-events-calendar' => 'plugins-support/the_events_calendar.php',
		'tiny_mce' => 'plugins-support/tiny_mce.php',
		'yoast' => 'plugins-support/yoast.php',
		'post_views_counter' => 'plugins-support/post_views_counter.php',
	),
	// Include plugins that relate to translations and can be used in helpers.php
	'translate_plugins' => array(
		'wpml' => 'plugins-support/wpml.php',
		'polylang' => 'plugins-support/polylang.php',
	),
);

require dirname( __FILE__ ) . '/common/framework.php';

function add_shortcode_imageradio() {
    wpcf7_add_shortcode( 'imageradio', 'imageradio_handler', true );
}
add_action( 'wpcf7_init', 'add_shortcode_imageradio' );

function imageradio_handler( $tag ){
    $tag = new WPCF7_FormTag( $tag );

    $atts = array(
        'type' => 'radio',
        'name' => $tag->name,
        'list' => $tag->name . '-options' );

    $input = sprintf(
        '<input %s />',
        wpcf7_format_atts( $atts ) );
        $datalist = '';
        $datalist .= '<div class="imgradio">';
        foreach ( $tag->values as $val ) {
        // print_r(explode("!", $val));
        list($radiovalue,$dataID,$imagepath) = explode("!", $val);
        
        // $datalist .= sprintf(
        //  '<label><input type="radio" name="%s" value="%s" class="hideradio" data-id="%s"/><img src="%s" width="27%" style="margin-right: 2.5%"></label>', $tag->name, $radiovalue, $dataID ,$imagepath 
        // );
        
        $datalist .= '<label><input type="radio" name="'.$tag->name.'" value="'.$radiovalue.'" class="hideradio wpcf7-validates-as-required" data-id="'.$dataID.'" required aria-required="true"/><img data-id="'.$dataID.'" class="imgradio-cont" src="'.$imagepath.'" width="27%" style="margin-right: 2.5%"></label>';

    }
    $datalist .= '</div>';

    return $datalist;
}