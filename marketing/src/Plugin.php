<?php
/**
 * Marketing Plugin
 *
 * @package     KnowTheCode\Marketing
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\Marketing;

use Fulcrum\Addon\Addon;

class Plugin extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '4.6';

	/**
	 * Initialize the plugin
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	protected function init_addon() {
		$this->load_dependencies();
	}

	/**
	 * To speed everything up, we are loading files directly here.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function load_dependencies() {
		require_once( __DIR__ . '/Shortcode/AhaMoment.php' );
//		$filenames = array(
//			'Shortcode/AhaMoment.php',
//		);
//
//		foreach( $filenames as $filename ) {
//			require_once( $filename );
//		}
	}
}
