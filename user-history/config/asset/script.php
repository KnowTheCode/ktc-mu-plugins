<?php
/**
 * User History Script runtime configuration parameters
 *
 * @package     KnowTheCode\UserHistory\Asset
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\UserHistory\Asset;

use KnowTheCode\UserHistory\Controller;

return array(
	'is_script' => true,
	'handle'    => 'user_history_js',
	'config'    => array(
		'file'      => USER_HISTORY_PLUGIN_URL . 'assets/js/jquery.plugin.js',
		'deps'      => array( 'jquery', ),
		'version'   => Controller::VERSION,
		'in_footer' => true,
		'localize'  => array(
			'params'      => array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'action'  => 'user_history_activity',
			),
			'js_var_name' => 'uhParameters',
		),
	),
);
