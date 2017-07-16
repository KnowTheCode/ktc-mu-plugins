<?php

/**
 * Technology List Items Shortcode - Runtime Configuration Parameters
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
	'classname' => 'KnowTheCode\Docx\Shortcode\TechnologyList',
	'config'    => array(
		'shortcode'      => 'technology_list',
		'view'           => DOCX_PLUGIN_DIR . 'src/Shortcode/views/technology-list.php',
		'view_list_item' => DOCX_PLUGIN_DIR . 'src/Shortcode/views/technology-list-item.php',
		'defaults'       => array(
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
