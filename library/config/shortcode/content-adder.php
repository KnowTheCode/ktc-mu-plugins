<?php

/**
 * Mid Content Shortcode - Runtime Configuration Parameters
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
	'classname' => 'Library\Shortcode\Content_Adder',
	'config'    => array(
		'shortcode' => 'content_adder',
		'no_view'   => true,
		'view'      => '',
		'defaults'  => array(
			'location' => '',
			'top'      => 0,
			'mid'      => 0,
			'bottom'   => 0,
		),
	),
);
