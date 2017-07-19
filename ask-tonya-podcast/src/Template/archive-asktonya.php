<?php
/**
 * Ask Tonya Podcast Landing page template.
 *
 * @package     KnowtheCode\AskTonyaPodcast\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast\Template;

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_all_actions( 'genesis_entry_content' );
remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );

add_filter( 'body_class', function ( $classes ) {
	$classes[] = 'ask-tonya';

	return $classes;
} );

add_action( 'genesis_before_while', __NAMESPACE__ . '\add_in_the_header_contents' );
/**
 * Hey let's add in the Page Title and stuff that we put into the editor for
 * this page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_in_the_header_contents() {
	$content = genesis_get_option( 'asktonya_page_opener', 'asktonya_options' );
	$content = do_shortcode( wpautop( $content ) );

	require( 'views/page-header.php' );
}

add_action( 'genesis_entry_header', __NAMESPACE__ . '\render_episode_quicklook', 1 );
/**
 * Render the episode quick look, which is the left side that gives a "glance"
 * at the episode itself.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_episode_quicklook() {
	$runtime = get_episode_metadata( 'runtime' );
	if ( $runtime === false ) {
		$runtime = '00:00';
	} else {
		$runtime = format_video_runtime( $runtime );
	}

	$episode_number = (int) get_episode_metadata( 'episode_number' );

	include( __DIR__ . '/views/episode-opener.php' );
}

add_action( 'genesis_entry_content', __NAMESPACE__ . '\render_episode_excerpt' );
function render_episode_excerpt() {
	the_excerpt();

	include( __DIR__ . '/views/episode-readmore.php' );
}

add_action( 'genesis_entry_footer', __NAMESPACE__ . '\render_closing_div', 99 );
/**
 * Since we adding a `<div>` to wrap up the content, we need to close it off.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_closing_div() {
	echo '</div>';
}

/**
 * Get the metadata for this episode.
 *
 * @since 1.0.0
 *
 * @param string $key
 *
 * @return mixed
 */
function get_episode_metadata( $key = '' ) {
	static $metadata;

	$post_id = get_the_ID();

	if ( ! isset( $metadata[ $post_id ] ) ) {
		$post_metadata = get_post_meta( $post_id, '_asktonya_episode_metadata' );

		if ( ! empty( $post_metadata ) ) {
			$metadata[ $post_id ] = array_shift( $post_metadata );
		}
	}

	if ( ! isset( $metadata[ $post_id ] ) ) {
		return;
	}

	if ( $key ) {

		if ( isset( $metadata[ $post_id ][ $key ] ) ) {
			return $metadata[ $post_id ][ $key ];
		}

	} else {
		return;
	}

	return $metadata[ $post_id ];
}

/**
 * Format the video runtime by converting it into a string.
 *
 * @since 1.0.0
 *
 * @param array $runtime Runtime elements
 *
 * @return string
 */
function format_video_runtime( array $runtime ) {
	$formatted_runtime = sprintf( '%02d:%02d',
		$runtime['minutes'],
		$runtime['seconds']
	);

	if ( (int) $runtime['hours'] > 0 ) {
		$formatted_runtime = sprintf( '%02d:%s',
			$runtime['hours'],
			$formatted_runtime
		);
	}

	return $formatted_runtime;
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
	return sprintf( '[post_terms sep=", " before="%s " taxonomy="labs_technologies"]',
		__( 'Technologies:', 'asktonya' ) );
}

genesis();
