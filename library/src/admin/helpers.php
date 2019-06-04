<?php
/**
 * Admin Functionality
 *
 * @package     Library\Episodes\Metadata
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

function sanitize_metadata( $metadata, $filter = '' ) {

	if ( ! is_array( $metadata ) ) {
		return sanitize_single_metadata( $metadata, $filter );
	}

	foreach ( $metadata as $key => $value ) {
		$metadata[ $key ] = sanitize_single_metadata( $value, $filter[ $key ] );
	}

	return $metadata;
}

function sanitize_single_metadata( $value, $filter = '' ) {
	if ( $filter ) {
		return $filter( $value );
	}

	if ( is_numeric( $value ) ) {
		return (int) $value;
	}

	return strip_tags( $value );
}

