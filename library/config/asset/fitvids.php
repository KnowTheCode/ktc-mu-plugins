<?php
/**
 * FitVids Script runtime configuration parameters
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return array(
	'is_script' => true,
	'handle'    => 'fitvids_js',
	'config'    => array(
		'file'      => LIBRARY_PLUGIN_URL . 'assets/vendor/jquery.fitvids/jquery.fitvids.js',
		'deps'      => array( 'jquery', ),
		'version'   => '1.1',
		'in_footer' => true,
	),
);
