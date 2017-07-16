<?php
/**
 * Docx Archive page template.
 *
 * @package     KnowTheCode\Docx\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace KnowTheCode\Docx\Template;

use KnowtheCode\Docx\Support as support;

add_action( 'genesis_meta', __NAMESPACE__ . '\unregister_events' );
/**
 * Unregister events.
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_events() {
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	remove_filter( 'post_class', 'genesis_entry_post_class' );
}

add_filter( 'body_class', function( $classes ){
	$classes[] = support\get_technology_from_the_query_or_cache();

	return $classes;
});

add_filter( 'genesis_archive_crumb', __NAMESPACE__ . '\add_post_type_to_breadcrumb', 10, 2 );
/**
 * Add the post type to the breadcrumb.
 *
 * @since 1.0.1
 *
 * @param string $html
 * @param array $args
 *
 * @return string
 */
function add_post_type_to_breadcrumb( $html, array $args ) {
	$post_type = get_query_var( 'post_type' );

	$post_type_object = get_post_type_object( $post_type );
	$name             = $post_type_object->labels->name;

	$url = 'docx' == $post_type
		? site_url( 'the-docx' )
		: site_url( $post_type );

	ob_start();
	include( __DIR__ . '/views/breadcrumb.php' );
	$include_html = ob_get_clean();

	$html = sprintf( '%s %s %s', $include_html, $args['sep'], $html );

	return $html;
}

add_action( 'genesis_loop', __NAMESPACE__ . '\do_docx_loop' );
/**
 * Render out the loop by showing the docx as buttons in a list element.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_docx_loop() {
	if ( have_posts() ) {
		do_action( 'genesis_before_while' );
		
		include( __DIR__ . '/views/docx-instruction-list.php' );

		do_action( 'genesis_after_endwhile' );

	} else {
		do_action( 'genesis_loop_else' );
	}
}

/**
 * Process the Docx Instruction List Loop and render out the HTML.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_docx_instruction_list_loop() {
	$term = support\get_technology_from_the_query_or_cache();

	while ( have_posts() ) {
		the_post();

		$title = apply_filters( 'genesis_post_title_text', get_the_title() );

		include( __DIR__ . '/views/docx-instruction-list-item.php' );
	}
}

genesis();
