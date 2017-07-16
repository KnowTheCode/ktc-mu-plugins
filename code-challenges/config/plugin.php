<?php
/**
 * Library Plugin Runtime Configuration Parameters.
 *
 * @package     Library
 * @since       1.1.4
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

use Fulcrum\Config\Config;
use Library\Admin\Settings\Library_Options;
use Library\Episodes\Controller;
use Library\Episodes\Playlist\Playlist;
use Library\Episodes\PlaylistBackend;

return array(


	/****************************
	 * Post Types / Rewrite
	 ****************************/
	'post_types' => array(
//		'docx' => 'docx',
	),

	'plugin_activation_keys' => array(
		'challenges.post_type',
	),

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => array(

		/****************************
		 * Assets
		 ****************************/
		'script.library'         => array(
			'provider' => 'provider.asset',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/asset/script.php',
		),

		/****************************
		 * Post Types
		 ****************************/
		'challenges.post_type'         => array(
			'provider' => 'provider.post_type',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/post-type/challenge.php',
		),

		/****************************
		 * Taxonomy
		 ****************************/

//		'skills.taxonomy'           => array(
//			'provider' => 'provider.taxonomy',
//			'config'   => LIBRARY_PLUGIN_DIR . 'config/taxonomy/skills.php',
//		),
//		'catalog.taxonomy'          => array(
//			'provider' => 'provider.taxonomy',
//			'config'   => LIBRARY_PLUGIN_DIR . 'config/taxonomy/catalog.php',
//		),

		/****************************
		 * Shortcodes
		 ****************************/


		/****************************
		 * Template
		 ****************************/
		'template.challenges'             => array(
			'provider' => 'provider.template',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/template/challenges-template.php',
		),
	),
);

