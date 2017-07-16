<?php
/**
 * Quip Plugin
 *
 * @package         Quips
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://UptechLabs.io
 *
 * @wordpress-plugin
 * Plugin Name:     Quips - Fulcrum Addon Plugin
 * Plugin URI:      https://UptechLabs.io
 * Description:     Let's have some fun! Adds some witty, silly, and thought provoking quips into the content, just to shake up the seriousness of learning code.
 * Version:         1.0.3
 * Author:          hellofromTonya
 * Author URI:      https://UptechLabs.io
 * Text Domain:     quip
 * Requires WP:     3.5
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

namespace Quips;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum;
use Fulcrum\Fulcrum_Contract;

fulcrum_prevent_direct_file_access();

fulcrum_declare_plugin_constants( 'QUIPS', __FILE__ );

/**
 * Launch the plugin
 *
 * @since 1.0.2
 *
 * @param Fulcrum_Contract $fulcrum Instance of Fulcrum
 *
 * @return void
 */
function launch( Fulcrum_Contract $fulcrum ) {
	load_dependencies();

	$path = __DIR__ . '/config/plugin.php';

	$fulcrum['quips'] = $instance = new Controller(
		new Config( $path ),
		__FILE__,
		$fulcrum
	);
	
	return $instance;
}

/**
 * To speed everything up, we are loading files directly here.
 *
 * @since 1.0.2
 *
 * @return void
 */
function load_dependencies() {
	require_once( 'src/foundation/class-handler.php' );
	require_once( 'src/class-controller.php' );
}
