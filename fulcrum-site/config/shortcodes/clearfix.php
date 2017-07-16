<?php

/**
 * Clearfix Shortcode - Runtime Configuration Parameters
 *
 * @package     UpTechLabs\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\FulcrumSite\Shortcode;

return array(
	'autoload' => true,
	'config'   => array(
		'shortcode' => 'clearfix',
		'view'      => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/clearfix.php',
		'defaults'  => array(
			'class' => '',
		),
	),
);
