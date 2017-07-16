<?php
/**
 * KnowTheCode Code Challenges Plugin
 *
 * @package         Library
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://UpTechLabs.io
 *
 * @wordpress-plugin
 * Plugin Name:     KnowTheCode Code Challenges Plugin
 * Plugin URI:      https://github.com/KnowTheCode/Library
 * Description:     Code Challenges test the knowledge and proficiencies of our members.  These challenges will consist of code writing tasks, logic problems, and questions that are true/false, single choice, and multiple choice.
 * Version:         1.0.0
 * Author:          hellofromTonya
 * Author URI:      https://UpTechLabs.io
 * Text Domain:     library
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

namespace UpTechLabs\CodeChallenges;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum;
use Fulcrum\Fulcrum_Contract;

fulcrum_prevent_direct_file_access();

require_once( __DIR__ . '/assets/vendor/autoload.php' );

fulcrum_declare_plugin_constants( 'CODECHALLENGES', __FILE__ );

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

	$fulcrum['code_challenges'] = $instance = new Plugin(
		new Config( $path ),
		__FILE__,
		$fulcrum
	);

	return $instance;
}

/**
 * Registering the plugin, we need to launch and then flush the
 * rewrite rules to ensure the custom post type/taxonomies
 * are registered up.
 *
 * @since 1.0.0
 *
 * @return void
 */
register_activation_hook( __FILE__, function() {
	$instance = launch( Fulcrum::getFulcrum() );

	$instance->activate();
});
