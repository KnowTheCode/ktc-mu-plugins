<?php

/**
 * Insight Shortcode - Runtime Configuration Parameters
 *
 * @package     Library\Shortcode
 * @since       1.1.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'Library\Shortcode\Insight',
	'config'    => array(
		'shortcode' => 'insight',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/insight.php',
		'defaults'  => array(
			'term'    => '',
			'orderby' => 'slug',
			'order'   => 'ASC',
			'number'  => - 1,
		),
	),
);
