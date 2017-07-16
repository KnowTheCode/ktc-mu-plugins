<?php
/**
 * KnowTheCode Ask Tonya Podcast Plugin
 *
 * @package         KnowtheCode\AskTonyaPodcast
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://KnowTheCode.io
 *
 * @wordpress-plugin
 * Plugin Name:     Ask Tonya Podcasat Plugin
 * Plugin URI:      https://github.com/KnowTheCode/AskTonyaPodcast
 * Description:     Ask Tonya Podcast - Tonya answers your questions in this short videos
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      https://KnowTheCode.io
 * Text Domain:     asktonya
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

namespace KnowtheCode\AskTonyaPodcast;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum_Contract;

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Oh silly, there's nothing to see here." );
}

fulcrum_declare_plugin_constants( 'ASKTONYA', __FILE__ );

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @param Fulcrum_Contract $fulcrum Instance of Fulcrum
 *
 * @return void
 */
function launch( Fulcrum_Contract $fulcrum ) {
	load_dependencies();

	$path = __DIR__ . '/config/plugin.php';

	$fulcrum['asktonya'] = $instance = new Plugin(
		new Config( $path ),
		__FILE__,
		$fulcrum
	);

	return $instance;
}

/**
 * Description.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_dependencies() {
	$filenames = array(
		'src/Plugin.php',
	);

	foreach ( $filenames as $filename ) {
		require_once( $filename );
	}
}
