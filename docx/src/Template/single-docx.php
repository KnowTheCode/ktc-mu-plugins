<?php
/**
 * Docx Single page template.
 *
 * @package     KnowTheCode\Docx\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\Docx\Template;

use KnowtheCode\Docx\Support as support;

add_action( 'genesis_meta', __NAMESPACE__ . '\remove_events' );
function remove_events() {
	remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
}

add_filter( 'genesis_single_crumb', __NAMESPACE__ . '\add_technology_to_breadcrumb', 10, 2 );
/**
 * Add the technology to the breadcrumb.
 *
 * @since 1.0.0
 *
 * @param string $html
 * @param array $args
 *
 * @return string
 */
function add_technology_to_breadcrumb( $html, array $args ) {
	$post_type  = get_query_var( 'post_type' );
	$technology = get_query_var( 'technologies' );

	if ( ! $post_type || ! $technology ) {
		return $html;
	}

	$url        = site_url( $post_type . '/' . $technology );
	$name       = support\get_technology_name_by_slug( $technology );
	if ( ! $name ) {
		return $html;
	}

	ob_start();
	include( __DIR__ . '/views/breadcrumb.php' );
	$technology_html = ob_get_clean();

	$html = support\insert_technology_into_breadcrumb( $html, $technology_html, $args['sep'] );
	return support\change_docx_link_in_breadcrumb( $html );
}

genesis();
