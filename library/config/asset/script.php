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
	'handle'    => 'library_js',
	'config'    => array(
		'file'      => LIBRARY_PLUGIN_URL . 'assets/js/jquery.library.js',
		'deps'      => array( 'jquery', 'fitvids_js' ),
		'version'   => Plugin::VERSION,
		'in_footer' => true,
	),
);
