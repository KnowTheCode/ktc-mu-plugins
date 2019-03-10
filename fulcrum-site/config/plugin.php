<?php
/**
 * Fulcrum Site Plugin Runtime Configuration Parameters.
 *
 * @package     UpTechLabs\FulcrumSite
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace UpTechLabs\FulcrumSite;

use Fulcrum\Config\Config;

return array(

	'plugin_activation_keys' => array(),
	
	'register_concretes' => array(
		'UpTechLabs\FulcrumSite\Widget\MemberNavWidget' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Config( FULCRUM_SITE_PLUGIN_DIR . 'config/widgets/member-nav.php' );
			}
		),
	),

	'service_providers' => array(

		/****************************
		 * Assets
		 ****************************/
		'style.fontawesome'   => array(
			'provider' => 'provider.asset',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/assets/font-awesome.php',
		),

		'script.fulcrum_site'   => array(
			'provider' => 'provider.asset',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/assets/plugin-build.php',
		),

		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.clearfix'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/clearfix.php',
		),
		'shortcode.info_box'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/info-box.php',
		),
		'shortcode.qa'  => array(
			'provider' => 'provider.shortcode',
			'config'   => FULCRUM_SITE_PLUGIN_DIR . 'config/shortcodes/qa.php',
		),

		/****************************
		 * Widgets
		 ****************************/
		'widget.member_nav'  => array(
			'provider' => 'provider.widget',
			'config' => array(
				'UpTechLabs\FulcrumSite\Widget\MemberNavWidget',
			),
		),
	),
);
