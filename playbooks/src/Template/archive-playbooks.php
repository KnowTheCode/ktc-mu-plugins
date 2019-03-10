<?php
/**
 * Playbooks Podcast Landing page template.
 *
 * @package     KnowtheCode\Playbooks\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\Playbooks\Template;

use function KnowtheCode\Playbooks\_get_plugin_root_dir;

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_all_actions( 'genesis_entry_content' );
remove_all_actions( 'genesis_entry_footer' );

add_filter( 'body_class', function( $classes ) {
	$classes[] = 'playbooks';

	return $classes;
} );

add_filter(
	'genesis_markup_site-inner_content',
	function( $content, $args ) {

		// Bail out if it's not the opening site-inner markup.
		if ( empty( $args['open'] ) ) {
			return $content;
		}

		$is_archive = true;

		ob_start();

		echo '<style type="text/css">';
		require _get_plugin_root_dir() . '/assets/common.css';
		require _get_plugin_root_dir() . '/assets/archive.css';
		echo '</style>';

		require __DIR__ . '/views/page-header.php';

		return $content . ob_get_clean();
	},
	50, 2
);


add_action(
	'genesis_entry_content',
	function() {
		the_excerpt();

		include __DIR__ . '/views/readmore.php';
	}
);

//add_filter( 'genesis_post_meta', function() {
//	return '[post_terms before="" taxonomy="catalog"]';
//} );

genesis();
