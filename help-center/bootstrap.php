<?php
/**
 * Help Center Plugin
 *
 * @package         UpTechLabs\HelpCenter
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://UpTechLabs.io
 *
 * @wordpress-plugin
 * Plugin Name:     Help Center Plugin
 * Plugin URI:      https://UpTechLabs.io
 * Description:     Help Center - Adds a knowledge base, FAQ, and other help center goodies to your website.
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      https://UpTechLabs.io
 * Text Domain:     help_center
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

namespace UpTechLabs\HelpCenter;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum_Contract;

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Oh, silly, there's nothing to see here." );
}

fulcrum_declare_plugin_constants( 'HELPCENTER', __FILE__ );

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

	$fulcrum['kb'] = $instance = new Plugin(
		new Config( $path ),
		__FILE__,
		$fulcrum
	);

	return $instance;
}

/**
 * To speed everything up, we are loading files directly here.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_dependencies() {
	$filenames = array(
		'src/Plugin.php',
		'src/Support/global-helpers.php',
	);

	foreach( $filenames as $filename ) {
		require_once( $filename );
	}
}
