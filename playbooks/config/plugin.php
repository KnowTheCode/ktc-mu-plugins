<?php
/**
 * Plugin Runtime Configuration Parameters.
 *
 * @package     KnowtheCode\Playbooks
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\Playbooks;

$plugin_dir = _get_plugin_root_dir();

return [

	/****************************
	 * Post Types / Rewrite
	 ****************************/
	'post_types' => [
		'playbooks' => 'playbooks',
	],

	'posts_per_page' => 10,

	'plugin_activation_keys' => [
		'playbooks.post_type',
	],

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => [

		/****************************
		 * Post Types
		 ****************************/
		'playbooks.post_type' => [
			'provider' => 'provider.post_type',
			'config'   => $plugin_dir . '/config/post-type.php',
		],


		/****************************
		 * Template
		 ****************************/
		'playbooks.template'  => [
			'provider' => 'provider.template',
			'config'   => $plugin_dir . '/config/template.php',
		],
	],
];

