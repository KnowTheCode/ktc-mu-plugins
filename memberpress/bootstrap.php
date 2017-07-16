<?php
/**
 * Basic helpers for the MemberPress plugin
 *
 * @package     KnowtheCode\MemberPress
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace KnowtheCode\MemberPress;

add_action( 'init', __NAMESPACE__ .'\add_genesis_layouts_to_post_type_supports', 9999 );
/**
 * Add Genesis Layouts to the MemberPress checkout/product pages.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_genesis_layouts_to_post_type_supports() {
	add_post_type_support( 'memberpressproduct', 'genesis-layouts' );
}

add_filter( 'mepr-grace-expire-days', __NAMESPACE__ . '\add_expiration_grace_period' );
/**
 * Add a grace period to the end of the subscription period to ensure
 * payments get processed on time.
 *
 * @since 1.0.0
 *
 * @param int $grace_period
 *
 * @return int
 */
function add_expiration_grace_period( $grace_period ) {
	$grace_period = (int) $grace_period;

	return $grace_period > 0 ? $grace_period : 1;
}

//add_filter( 'register_post_type_args', __NAMESPACE__ . '\add_genesis_layouts_to_memberpressproduct', 10, 2 );
/**
 * Add the Genesis Layouts to the MemberPress Product Pages 'support'
 *
 * @since 1.0.0
 *
 * @param array $args Array of Arguments
 * @param string $post_type Post type
 *
 * @return array
 */
function add_genesis_layouts_to_memberpressproduct( array $args, $post_type ) {
	if ( 'memberpressproduct' != $post_type ) {
		return $args;
	}

	$args['supports'][] = 'genesis-layouts';

	return $args;
}
