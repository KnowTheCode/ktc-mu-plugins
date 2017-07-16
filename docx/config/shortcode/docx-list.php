<?php

/**
 * Docx List Shortcode - Runtime Configuration Parameters
 *
 * @package     KnowTheCode\Docx\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\Docx\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'KnowTheCode\Docx\Shortcode\DocxList',
	'config'    => array(
		'shortcode'      => 'docx_list',
		'view'           => DOCX_PLUGIN_DIR . 'src/Shortcode/views/docx-list.php',
		'view_list_item' => DOCX_PLUGIN_DIR . 'src/Shortcode/views/docx-list-item.php',
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
