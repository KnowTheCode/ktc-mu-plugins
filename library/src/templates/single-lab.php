<?php
/**
 * Single Lab Landing Page
 *
 * @package     Library
 * @since       1.1.2
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

add_action( 'wp_head', __NAMESPACE__ . '\setup_single_episode', 50 );
/**
 * Setup the lab page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_single_episode() {
	if ( ! Episodes\is_current_content_single_episode() ) {
		return;
	}

	require_once( LIBRARY_PLUGIN_DIR . 'src/episodes/templates/single-episode.php' );
}

genesis();