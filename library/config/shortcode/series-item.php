<?php
/**
 * Series List Item Shortcode - Runtime Configuration Parameters
 *
 * @package     Library\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'Library\Shortcode\Series_List_Item',
	'config'    => array(
		'shortcode' => 'series_list_item',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/series-list-item.php',
		'defaults'  => array(
			'id'    => '',
			'class' => '',
		),
	),
);
