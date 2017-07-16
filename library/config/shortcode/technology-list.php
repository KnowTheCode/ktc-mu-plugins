<?php

/**
 * Technology List Items Shortcode - Runtime Configuration Parameters
 *
 * @package     Library\Shortcode
 * @since       1.0.4
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'Library\Shortcode\Technology_List',
	'config'    => array(
		'shortcode' => 'technology_list',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/technology-list.php',
		'view_list_item'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/technology-list-item.php',
		'defaults'  => array(
			'id'           => '',
			'class'        => '',
			'button_class' => '',
			'post_type'    => '',
			'taxonomy'     => 'technologies',
			'orderby'      => 'slug',
			'order'        => 'ASC',
			'hide_empty'   => 0,
			'number'       => 0,
		),
	),
);
