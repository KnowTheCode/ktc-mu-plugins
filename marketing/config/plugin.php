<?php
/**
 * Marketing Plugin Runtime Configuration Parameters.
 *
 * @package     KnowTheCode\Marketing
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\Marketing;

use Fulcrum\Config\Config;
use Library\Admin\Settings\Library_Options;
use Library\Episodes\Controller;
use Library\Episodes\Playlist\Playlist;
use Library\Episodes\PlaylistBackend;

return array(


	/****************************
	 * Post Types / Rewrite
	 ****************************/
//	'post_types' => array(
////		'ahamoment' => 'ahamoment',
//	),

//	'plugin_activation_keys' => array(
//		'ahamoment.post_type',
//		'marketingg.taxonomy',
//	),

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => array(

		/****************************
		 * Assets
		 ****************************/
//		'script.library'         => array(
//			'provider' => 'provider.asset',
//			'config'   => MARKETING_PLUGIN_DIR . 'config/asset/script.php',
//		),

		/****************************
		 * Post Types
		 ****************************/
//		'ahamoment.post_type'         => array(
//			'provider' => 'provider.post_type',
//			'config'   => MARKETING_PLUGIN_DIR . 'config/post-type/ahamoment.php',
//		),

		/****************************
		 * Taxonomy
		 ****************************/
//
//		'marketing.taxonomy'           => array(
//			'provider' => 'provider.taxonomy',
//			'config'   => MARKETING_PLUGIN_DIR . 'config/taxonomy/marketing.php',
//		),

		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.ahamoment'  => array(
			'provider' => 'provider.shortcode',
			'config'   => MARKETING_PLUGIN_DIR . 'config/shortcode/ahamoment.php',
		),
//		'shortcode.optin'           => array(
//			'provider' => 'provider.shortcode',
//			'config'   => MARKETING_PLUGIN_DIR . 'config/shortcode/optin.php',
//		),
	),
);

