<?php

/**
 * What's New Shortcode - Runtime Configuration Parameters
 *
 * @package     Library\Shortcode
 * @since       1.1.5
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'Library\Shortcode\WhatsNew',
	'config'    => array(
		'shortcode' => 'whatsnew',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/whatsnew.php',
		'view_item' => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/whatsnew.php',
		'defaults'  => array(
			'filterby'       => 'all',
			'number_to_show' => 5,
		),
	),
);
