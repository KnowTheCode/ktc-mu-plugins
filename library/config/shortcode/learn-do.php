<?php

/**
 * Learn Do List Shortcode - Runtime Configuration Parameters
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
	'classname' => 'Library\Shortcode\Learn_Do',
	'config'    => array(
		'shortcode' => 'learn_do',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/learn-do.php',
		'view_list' => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/learn-do-list.php',
		'defaults'  => array(
			'id'         => '',
			'class'      => '',
			'title'      => 'Learn. Do.',
			'post_type'  => '',
			'taxonomy'   => 'technologies',
			'orderby'    => 'slug',
			'order'      => 'ASC',
			'hide_empty' => 0,
			'number'     => 0,
		),
	),
);
