<?php
/**
 * User History Plugin
 *
 * @package         KnowTheCode\UserHistory
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://KnowTheCode.io
 *
 * @wordpress-plugin
 * Plugin Name:     KTC User History Plugin
 * Plugin URI:      https://github.com/KnowTheCode/User-History
 * Description:     User History - Adds features such as favorites, watch later, videos watch history, and more to provide a friendly membership experience.  Members can then go to through History page to quickly find the resources they want and need.
 * Version:         2.0.0
 * Author:          hellofromTonya
 * Author URI:      https://KnowTheCode.io
 * Text Domain:     user_history
 * Requires WP:     4.5
 * Requires PHP:    5.5
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

namespace KnowTheCode\UserHistory;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum;
use Fulcrum\Fulcrum_Contract;

fulcrum_prevent_direct_file_access();

require_once( __DIR__ . '/assets/vendor/autoload.php' );

fulcrum_declare_plugin_constants( 'USER_HISTORY', __FILE__ );

//add_action( 'fulcrum_is_loaded', __NAMESPACE__ . '\launch' );
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
	$path = __DIR__ . '/config/plugin.php';

	$fulcrum['user_history'] = new Controller(
		new Config( $path ),
		__FILE__,
		$fulcrum
	);
}

/**
 * Returns the instance of the User History Controller.
 *
 * @since 1.0.0
 *
 * @return Controller|null
 */
function getController() {
	$fulcrum = Fulcrum::getFulcrum();

	if ( ! $fulcrum->has( 'user_history' ) ) {
		return;
	}

	return $fulcrum['user_history'];
}