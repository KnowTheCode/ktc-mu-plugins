<?php
/**
 * FitVids Script runtime configuration parameters
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library;

return array(
	'is_script' => true,
	'handle'    => 'fitvids_js',
	'config'    => array(
		'file'      => LIBRARY_PLUGIN_URL . 'assets/vendor/jquery.fitvids/1.1/jquery.fitvids.js',
		'deps'      => array( 'jquery', ),
		'version'   => null,
		'in_footer' => true,
	),
);
