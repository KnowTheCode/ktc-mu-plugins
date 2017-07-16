<?php

/**
 * Aha Moment Shortcode - Runtime Configuration Parameters
 *
 * @package     KnowTheCode\Marketing\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\Marketing\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'KnowTheCode\Marketing\Shortcode\Optin',
	'config'    => array(
		'shortcode' => 'optin',
		'view'      => MARKETING_PLUGIN_DIR . 'src/shortcode/views/optin.php',
		'defaults'  => array(
			'type'   => '',
			'number' => 0,
		),
	),
);
