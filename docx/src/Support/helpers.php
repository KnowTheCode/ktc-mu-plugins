<?php
/**
 * Docx Helpers
 *
 * @package     KnowtheCode\Docx\Support
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\Docx\Support;

/**
 * Get the technology term from the query. Uses wp_query
 * and fetches the 'technologies' key from wp_query->query.
 *
 * @since 1.0.0
 *
 * @return bool|WP_Term Returns the term object.
 */
function get_technology_from_the_query() {
	global $wp_query;

	if ( ! array_key_exists( 'technologies', $wp_query->query ) ) {
		return false;
	}

	$term_slug = $wp_query->query['technologies'];

	return get_term_by( 'slug', $term_slug, 'technologies' );
}

/**
 * Get Docx technology from $wp_query->query.
 *
 * @since 1.0.0
 *
 * @return string
 */
function get_technology_from_the_query_or_cache() {
	static $technology;

	if ( ! $technology ) {
		global $wp_query;

		$technology = $wp_query->query['technologies'];
	}

	return $technology;
}

/**
 * Get the technology name by slug.
 *
 * @since 1.0.0
 *
 * @param string $slug Term slug
 * @param string $taxonomy Taxonomy
 *
 * @return bool|string
 */
function get_technology_name_by_slug( $slug, $taxonomy = 'technologies' ) {
	$term = get_term_by( 'slug', $slug, $taxonomy );

	if ( is_wp_error( $term ) || ! $term ) {
		return false;
	}

	return $term->name;
}

/**
 * Change the docx breadcrumb
 *
 * @since 1.0.1
 *
 * @param string $html
 *
 * @return string
 */
function change_docx_link_in_breadcrumb( $html ) {
	$html = str_replace( '/docx"', '/the-docx"', $html );

	return $html;
}

/**
 * Insert the technology into the breadcrumb.
 *
 * @since 1.0.0
 *
 * @param string $html
 * @param string $technology_html
 * @param string $separator
 * @param string $pattern
 *
 * @return string
 */
function insert_technology_into_breadcrumb( $html, $technology_html, $separator, $pattern = '</span></a></span>' ) {
	$replace_pattern = $pattern . $separator . $technology_html;

	$html = str_replace( $pattern, $replace_pattern, $html );

	return $html;
}
