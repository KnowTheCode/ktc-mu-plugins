<?php

/**
 * Info Box Shortcode - Runtime Configuration Parameters
 *
 * @package     UpTechLabs\FulcrumSite\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\FulcrumSite\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'UpTechLabs\FulcrumSite\Shortcode\InfoBox',
	'config'    => array(
		'shortcode' => 'infobox',
		'view'      => FULCRUM_SITE_PLUGIN_DIR . 'src/Shortcode/views/info-box.php',
		'defaults'  => array(
			'class' => '',
			'type'  => '',
		),
	),
);
