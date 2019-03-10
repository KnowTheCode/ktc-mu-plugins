<?php
/**
 * Playbooks
 *
 * @package      KnowTheCode\Playbooks
 * @author       hellofromTonya
 * @license      GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name:       Playbooks
 * Plugin URI:        https://github.com/KnowTheCode/playbooks
 * Description:       Code debug made easier and more enjoyable.  A suite of tools to help you debug your code.
 * Version:           1.0.0
 * Author:            hellofromTonya
 * Author URI:        https://KnowTheCode.io
 * Text Domain:       playbooks
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/KnowTheCode/playbooks
 * Requires PHP:      5.6
 * Requires WP:       4.9
 */

namespace KnowtheCode\Playbooks;

use Fulcrum\Config\Config;
use Fulcrum\Fulcrum_Contract;

if ( ! defined( 'ABSPATH' ) ) {
	exit( "Oh silly, there's nothing to see here." );
}

/**
 * Returns the root dir of the plugin.
 *
 * @since 1.0.0
 * @access private
 *
 * @return string
 */
function _get_plugin_root_dir() {
	return __DIR__;
}

function _get_plugin_file() {
	return __FILE__;
}

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @param Fulcrum_Contract $fulcrum Instance of Fulcrum
 *
 * @return Plugin returns an instance of Fulcrum.
 */
function launch( Fulcrum_Contract $fulcrum ) {
	load_dependencies();

	$path = __DIR__ . '/config/plugin.php';

	$fulcrum['playbooks'] = $instance = new Plugin(
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
		require_once $filename;
	}
}
