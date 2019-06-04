<?php
/**
 * Docx Single page template.
 *
 * This template serves the Technology (parent) and single Docx (child) pages.
 *
 * @package     KnowTheCode\Docx\Template
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Docx\Template;

use KnowtheCode\Docx\Support as support;

/**
 * Get the post type, object, and parent ID for the endpoint page.
 *
 * @since 2.0.0
 *
 * @return array
 */
function get_docx_info() {
	static $info = [];

	if ( ! empty( $info ) ) {
		return $info;
	}

	$info = [ null, null, null ];

	// Check the post type.
	$info[0] = get_query_var( 'post_type' );
	if ( 'docx' !== $info[0] ) {
		return $info;
	}

	$info[1] = get_post_type_object( $info[0] );
	if ( null === $info[1] ) {
		return $info;
	}

	// Get the parent's ID, if one exists.
	$info[2] = wp_get_post_parent_id( $info[1]->ID );

	return $info;
}

/**
 * Checks if the endpoint is an single Docx and not the parent Technology.  A single Docx has a parent.
 *
 * @since 2.0.0
 *
 * @return bool
 */
function is_single_docx() {
	list( $post_type, $docx_object, $parent_id ) = get_docx_info();

	return ( $post_type && $docx_object && $parent_id );
}

add_action( 'genesis_meta', __NAMESPACE__ . '\setup_docx_template_hooks' );
/**
 * Setup the Docx technology (parent) or individual Docx (child) hooks.
 *
 * @since 2.0.0
 */
function setup_docx_template_hooks() {

	if ( is_single_docx() ) {
		return remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
	}

	// The parent template, i.e. the technology.
	remove_filter( 'post_class', 'genesis_entry_post_class' );
	add_filter( 'body_class', __NAMESPACE__ . '\add_docx_technology_body_classes' );
	add_action( 'genesis_entry_content', __NAMESPACE__ . '\render_docx_on_technology_page', 11 );
}

/**
 * Add the Docx technology to the body classes.
 *
 * @since 2.0.0
 *
 * @param array $classes Array of body classes.
 *
 * @return array
 */
function add_docx_technology_body_classes( $classes ) {
	$classes[] = support\get_technology_from_the_query_or_cache();

	return $classes;
}

add_filter( 'genesis_cpt_crumb', __NAMESPACE__ . '\fix_docx_breadcrumb', 999, 2 );
/**
 * Add the Docx page's parent to the breadcrumb, if one exists.  If it exists, it's the technology.
 *
 * @since 2.0.0
 *
 * @param string $html Given breadcrumb HTML.
 * @param array  $args Array of arguments.
 *
 * @return string Returns the modified breadcrumb's HTML.
 */
function fix_docx_breadcrumb( $html, $args ) {
	list( $post_type, $docx_object, $parent_id ) = get_docx_info();
	if ( ! $post_type || ! $docx_object ) {
		return $html;
	}

	$html = support\change_docx_link_in_breadcrumb( $html );

	if ( $parent_id <= 0 ) {
		return $html;
	}

	ob_start();
	include __DIR__ . '/views/breadcrumb.php';
	$technology_html = ob_get_clean();

	$html = support\insert_technology_into_breadcrumb( $html, $technology_html, $args['sep'], '<meta itemprop="position" content="2"></span> ' );

	return $html;
}

/**
 * Render the Docx technology (parent) page with its individual Docx (child) pages as individual buttons.
 *
 * @since 2.0.0
 */
function render_docx_on_technology_page() {
	$args = [
		'post_type'              => 'docx',
		'post_parent'            => get_the_ID(),
		'posts_per_page'         => 500,
		'no_found_rows'          => true,
		'update_post_meta_cache' => false,
		'update_post_term_cache' => false,
		'order'                  => 'ASC',
		'orderby'                => 'name',
	];

	$docx_query = new \WP_Query( $args );
	if ( ! $docx_query->have_posts() ) {
		wp_reset_postdata();

		return;
	}

	?>
    <ul class="docx-instruction-list" style="margin-left: 0"><?php
	$term = '';
	while ( $docx_query->have_posts() ) {
		$docx_query->the_post();

		// Only get the term once.
		if ( ! $term ) {
			$terms = get_the_terms( get_the_ID(), 'technologies' );
			if ( $terms && ! is_wp_error( $terms ) ) {
				$term = $terms[0]->slug;
			}
		}

		$title = apply_filters( 'genesis_post_title_text', get_the_title() );

		include __DIR__ . '/views/docx-instruction-list-item.php';
	}

	?></ul><?php

	wp_reset_postdata();
}

genesis();
