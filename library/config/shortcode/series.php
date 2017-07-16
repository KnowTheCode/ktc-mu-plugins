<?php

/**
 * Series List Shortcode - Runtime Configuration Parameters
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
	'classname' => 'Fulcrum\Shortcode\Shortcode',
	'config'    => array(
		'shortcode' => 'series_list',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/series-list.php',
		'defaults'  => array(
			'id'    => '',
			'class' => '',
		),
	),
);
