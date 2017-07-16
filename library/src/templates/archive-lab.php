<?php
/**
 * Labs Archive page template.
 *
 * @package     Library\Template
 * @since       1.0.2
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */
namespace Library\Template\Lab;

do_action( 'fulcrum_grid' );

add_filter( 'body_class', function( $classes ){
	$classes[] = 'labs';

	return $classes;
});

add_action( 'genesis_before_while', __NAMESPACE__ .  '\add_in_the_header_contents' );
/**
 * Hey let's add in the Page Title and stuff that we put into the editor for
 * this page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_in_the_header_contents() {
	$content = genesis_get_option( 'labs_page_opener', 'library_options' );
	$content = wp_kses_post( do_shortcode( $content ) );
	$content = wpautop( $content );

	include( 'views/labs-page-header.php' );
}

add_action( 'genesis_entry_header', __NAMESPACE__ . '\render_post_info', 5 );
/**
 * Renders the post info HTML.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_post_info() {
	$view_file = genesis_get_custom_field( '_ktc_coming_soon' ) ? 'labs-coming-soon.php' : 'labs-post-info.php';

	include( 'views/' . $view_file );
}

add_filter( 'genesis_post_meta', __NAMESPACE__ . '\modify_post_meta' );
/**
 * Modify the post meta shortcode.
 *
 * @since 1.0.0
 *
 * @param string $meta
 *
 * @return string
 */
function modify_post_meta( $meta ) {
	return sprintf( '[post_terms sep=", " before="%s " taxonomy="labs_technologies"]', __( 'Technologies:', 'library') );
}

add_action( 'genesis_entry_header', __NAMESPACE__ . '\render_featured_image', 6 );
/**
 * Render the featured image.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_featured_image() {
	the_post_thumbnail();
}

genesis();