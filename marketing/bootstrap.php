<?php
/**
 * KnowTheCode Marketing & Engagement Plugin
 *
 * @package         KnowTheCode\Marketing
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://KnowTheCode.io
 *
 * @wordpress-plugin
 * Plugin Name:     KnowTheCode Marketing Plugin
 * Plugin URI:      https://github.com/KnowTheCode/MustUse/marketing
 * Description:     Marketing plugin that adds embedded nuggets, easter eggs, ROI calculators, optin forms, call-to-actions, and more.
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      https://KnowTheCode.io
 * Text Domain:     marketing
 * Requires WP:     4.5
 * Requires PHP:    5.6
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

namespace KnowTheCode\Marketing;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum;
use Fulcrum\Fulcrum_Contract;

fulcrum_prevent_direct_file_access();

fulcrum_declare_plugin_constants( 'MARKETING', __FILE__ );

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
	require_once( __DIR__ . '/src/Plugin.php' );

	$path = __DIR__ . '/config/plugin.php';

	$fulcrum['marketing'] = $instance = new Plugin(
		new Config( $path ),
		__FILE__,
		$fulcrum
	);

	return $instance;
}
