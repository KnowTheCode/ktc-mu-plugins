<?php
/**
 * Do Next Shortcode Runtime Configuration Parameters
 *
 * @package     Library\Shortcode
 * @since       1.1.5
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'Library\Shortcode\DoNext',
	'config'    => array(
		'shortcode' => 'donext',
		'view'      => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/donext.php',
		'defaults'  => array(
			'hide_feature' => 0,
			'title'        => __( 'What to Do Next?', 'library' ),
			'next_id'      => 0,
			'previous_id'  => 0,
			'library_id'   => 0,
			'series_id'    => 0,
		),
	),
);
