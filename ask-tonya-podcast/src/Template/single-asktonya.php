<?php
/**
 * Single Ask Tonya Episode Page
 *
 * @package     KnowtheCode\AskTonyaPodcast\Templates
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast\Templates;

add_action( 'genesis_entry_header', __NAMESPACE__ . '\render_podcast_header', 6 );
/**
 * Render the Podcast header before the episode title.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_podcast_header() {
	include( __DIR__ . '/views/single-podcast-header.php' );
}

add_action( 'genesis_after_entry', __NAMESPACE__ . '\render_asktonya_after_entry', 7 );
/**
 * Render the after entry content for blog posts.
 *
 * @since 1.5.8
 *
 * @return void
 */
function render_asktonya_after_entry() {
	genesis_widget_area( 'asktonya_form', array(
		'before' => '<div class="asktonya--form"><div class="wrap">',
		'after'  => '</div></div>',
	) );

	/**
	 * Fire the callback to render and embed the single's next/previous
	 * navigation, i.e. found in the child theme.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	do_action( 'render_single_next_prev_navigation' );
}

genesis();
