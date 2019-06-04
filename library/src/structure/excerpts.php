<?php
/**
 * Site Excerpts
 *
 * @package     Library\Structure
 * @since       1.0.3
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace Library\Structure;

add_filter( 'excerpt_length', __NAMESPACE__ . '\modify_excerpt_number_of_words' );
/**
 * Modify the auto excerpts length to 100 words.
 *
 * @since 1.0.0
 *
 * @return int
 */
function modify_excerpt_number_of_words() {
	return 100;
}

add_filter( 'get_the_excerpt', __NAMESPACE__ . '\limit_manual_excerpts', 9 );
/**
 * Limit the manual excerpts length to 100 words.
 *
 * @since 1.0.0
 *
 * @param string $excerpt
 *
 * @return string
 */
function limit_manual_excerpts( $excerpt ) {
	if ( ! $excerpt ) {
		return $excerpt;
	}

	return wp_trim_words( $excerpt, 100, '[&hellip;]' );
}
