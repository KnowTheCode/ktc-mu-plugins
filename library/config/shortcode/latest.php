<?php

/**
 * Latest Shortcode - Runtime Configuration Parameters
 *
 * @package     Library\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'Library\Shortcode\Latest',
	'config'    => array(
		'shortcode' => 'latest_content',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/latest.php',
		'view_item' => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/latest-item.php',
		'defaults'  => array(
			'type' => 'insights',
		),
	),
);
