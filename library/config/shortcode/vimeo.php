<?php

/**
 * Vimeo Shortcode - Runtime Configuration Parameters
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
	'classname' => 'Library\Shortcode\Vimeo',
	'config'    => array(
		'shortcode' => 'vimeo',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/vimeo.php',
		'defaults'  => array(
			'id'          => '',
			'width'       => 900,
			'height'      => 506,
			'autoplay'    => 0,
			'loop'        => 0,
			'show_footer' => 1,
		),
	),
);
