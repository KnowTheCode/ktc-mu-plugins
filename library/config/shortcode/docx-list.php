<?php

/**
 * Vimeo Shortcode - Runtime Configuration Parameters
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
	'classname' => 'Library\Shortcode\Docx_List',
	'config'    => array(
		'shortcode'      => 'docx_list',
		'view'           => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/docx-list.php',
		'view_list_item' => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/docx-list-item.php',
		'defaults'       => array(
			'id'           => '',
			'class'        => '',
			'button_class' => '',
			'post_type'    => '',
			'taxonomy'     => 'technologies',
			'term'         => '',
			'orderby'      => 'slug',
			'order'        => 'ASC',
			'hide_empty'   => 1,
			'number'       => 0,
		),
	),
);
