<?php
/*
 * Plugin Name: Shortcode example
 * Description: Shortcode example plugin, set in post [nameShortocode test=example, test2=example2]
 *
 */

function functionShortcode($parameters) {

	$attr = shortcode_atts( array(
		'test' => 'This is test', // if does not exist test
		'test2' => 'This is test 2', // if does not exist test2
	), $parameters, 'nameShortocode' );

	// if we use [nameShortocode test=example, test2=example2]
	// we will see example, example2
	return $attr['test'] . "<br>" . $attr['test2'];

}

function innitExampleShortcode() {
	add_shortcode( 'nameShortocode', 'functionShortcode' );
}

add_action('init', 'innitExampleShortcode');

