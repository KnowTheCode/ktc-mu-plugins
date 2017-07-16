<?php
/**
 * Single Lab Landing Page
 *
 * @package     KnowtheCode\AskTonyaPodcast\Templates
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast\Templates;

add_action( 'genesis_after_entry', __NAMESPACE__ . '\render_asktonya_after_entry', 7 );
/**
 * Render the after entry content for blog posts.
 *
 * @since 1.5.8
 *
 * @return void
 */
function render_asktonya_after_entry() {

//	\KnowTheCode\Structure\render_inpost_navigation();

	genesis_widget_area( 'asktonya_form', array(
		'before' => '<div class="asktonya--form"><div class="wrap">',
		'after'  => '</div></div>',
	) );
}

genesis();
