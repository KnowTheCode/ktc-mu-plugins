<?php
/**
 * Help Center Plugin Runtime Configuration Parameters.
 *
 * @package     UpTechLabs\HelpCenter
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace UpTechLabs\HelpCenter;

use Fulcrum\Config\Config;

return array(

	'plugin_activation_keys' => array(),

	'register_concretes' => array(),

	'service_providers' => array(

		/****************************
		 * Custom Post Types
		 ****************************/
		'kb.post_type' => array(
			'provider' => 'provider.post_type',
			'config'   => HELPCENTER_PLUGIN_DIR . 'config/custom/post-type.php',
		),

		/****************************
		 * Taxonomies
		 ****************************/
		'kb.taxonomy'  => array(
			'provider' => 'provider.taxonomy',
			'config'   => HELPCENTER_PLUGIN_DIR . 'config/custom/taxonomy.php',
		),

		/****************************
		 * Template
		 ****************************/
		'kb.template'  => array(
			'provider' => 'provider.template',
			'config'   => HELPCENTER_PLUGIN_DIR . 'config/template/template.php',
		),
	),
);
