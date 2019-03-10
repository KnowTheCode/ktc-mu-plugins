<?php
/**
 * Single Playbook Template
 *
 * @package     KnowtheCode\Playbooks\Templates
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\Playbooks\Templates;

use function KnowtheCode\Playbooks\_get_plugin_file;
use function KnowtheCode\Playbooks\_get_plugin_root_dir;

add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_script(
			'playbook-spyscroll',
			plugins_url( 'assets/scrollspy.js', _get_plugin_file() ),
			[],
			filemtime( _get_plugin_root_dir() . '/assets/scrollspy.js' ),
			true
		);
	}
);

add_filter( 'body_class', function( $classes ) {
	$classes[] = 'playbooks';

	return $classes;
} );

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_all_actions( 'genesis_entry_header' );
add_filter(
	'genesis_markup_site-inner_content',
	function( $content, $args ) {
		// Bail out if it's not the opening site-inner markup.
		if ( empty( $args['open'] ) ) {
			return $content;
		}

		ob_start();
		echo '<style type="text/css">';
		require _get_plugin_root_dir() . '/assets/common.css';
		require _get_plugin_root_dir() . '/assets/single.css';
		echo '</style>';
		require __DIR__ . '/views/page-header.php';

		return $content . ob_get_clean();
	},
	50, 2
);

add_action(
	'genesis_before_entry_content',
	function() {
		require __DIR__ . '/views/nav-scrollspy.html';
	}
);

add_action(
	'genesis_after_entry_content',
	function() {
		echo '</div>';
	}
);

genesis();
