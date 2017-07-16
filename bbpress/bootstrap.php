<?php
/**
 * bbPress Initializer to manage when to load the plugin.
 *
 * @package         UpTechLabs\bbPress\Initializer
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://UpTechLabs.io
 *
 * @wordpress-plugin
 * Plugin Name:     bbPress Initializer
 * Plugin URI:      https://UpTechLabs.io
 * Description:     Manages when to load bbPress
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      https://UpTechLabs.io
 * Text Domain:     bbpress_init
 * Requires WP:     4.5
 * Requires PHP:    5.4
 */

/*
	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

namespace UpTechLabs\bbPress\Initializer;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

if ( ! defined( 'BBPRESS_LATE_LOAD' ) ) {
	define( 'BBPRESS_LATE_LOAD', true );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\do_not_load_bbpress', -99 );
/**
 * When on the front-end and the requested URI is not a forums
 * page, then do not load bbPress.  We are doing this to speed up the website.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_not_load_bbpress() {
	if ( is_admin() || is_forums_uri() ) {
		return;
	}

	remove_action( 'plugins_loaded', 'bbpress', 1 );
}

/**
 * Checks if the current root requested URI is 'forums'.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function is_forums_uri() {
	$uri_parts = explode( '/', $_SERVER['REQUEST_URI'] );
	if ( ! isset( $uri_parts[1] ) ) {
		return false;
	}

	return $uri_parts[1] === 'forums';
}

add_action( 'genesis_before_while', __NAMESPACE__ . '\remove_genesis_structures_from_forums' );
/**
 * Remove the Genesis content structures from the forums.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_genesis_structures_from_forums() {

	if ( is_admin() ) {
		return;
	}

	if ( ! is_forums_uri() ) {
		return;
	}

	remove_action( 'genesis_entry_content', 'genesis_do_post_content' );
	add_action( 'genesis_entry_content', 'the_content' );

	remove_action( 'genesis_after_endwhile', 'KnowTheCode\Structure\do_post_pagination' );
}
