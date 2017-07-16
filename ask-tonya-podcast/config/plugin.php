<?php
/**
 * Plugin Runtime Configuration Parameters.
 *
 * @package     KnowtheCode\AskTonyaPodcast
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast;

use Fulcrum\Config\Config;
use Fulcrum\Metadata\Metabox;
use KnowtheCode\AskTonyaPodcast\Admin\Settings\Settings;

return array(

	/****************************
	 * Post Types / Rewrite
	 ****************************/
	'post_types' => array(
		'asktonya' => 'asktonya',
	),

	'posts_per_page' => 10,

	'plugin_activation_keys' => array(
		'asktonya.post_type',
	),

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => array(

		/****************************
		 * Post Types
		 ****************************/
		'asktonya.post_type' => array(
			'provider' => 'provider.post_type',
			'config'   => ASKTONYA_PLUGIN_DIR . 'config/post-type.php',
		),


		/****************************
		 * Template
		 ****************************/
		'asktonya.template'  => array(
			'provider' => 'provider.template',
			'config'   => ASKTONYA_PLUGIN_DIR . 'config/template.php',
		),
	),

	'register_concretes' => array(
		'asktonya.settings_page' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Settings(
					new Config( ASKTONYA_PLUGIN_DIR . 'config/admin/settings-page.php' )
				);
			},
		),

		'asktonya.episodes.metabox' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Metabox(
					new Config( ASKTONYA_PLUGIN_DIR . 'config/admin/episode-metabox.php' )
				);
			},
		),
	),
);

