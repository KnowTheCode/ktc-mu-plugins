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
	'classname' => 'KnowTheCode\Marketing\Shortcode\AhaMoment',
	'config'    => array(
		'shortcode' => 'ahamoment',
		'view'      => MARKETING_PLUGIN_DIR . 'src/Shortcode/views/ahamoment.php',
		'defaults'  => array(
			'id'     => '',
			'class'  => '',
			'type'   => '',
			'number' => 0,
		),
	),
);
