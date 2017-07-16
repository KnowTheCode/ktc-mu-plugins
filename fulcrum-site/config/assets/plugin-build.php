<?php
/**
 * Minimized Fulcrum Site build runtime configuration parameters
 *
 * @package     UpTechLabs\FulcrumSite\Asset\Repo;
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace UpTechLabs\FulcrumSite\Asset\Repo;

use UpTechLabs\FulcrumSite\Plugin;

return array(
	'is_script' => true,
	'handle'    => 'fulcrum_site_js',
	'config'    => array(
		'file'                 => FULCRUM_SITE_PLUGIN_URL . 'assets/build/jquery.plugin.min.js',
		'deps'                 => array( 'jquery' ),
		'version'              => Plugin::VERSION,
		'in_footer'            => true,
		'localize'  => array(
			'params'      => array(
				'qa' => array(
					'iconEl'        => '.qa-icon',
					'iconClassname' => array(
						'open'  => 'fa-chevron-down',
						'close' => 'fa-chevron-up',
					),
				),
			),
			'js_var_name' => 'qaParameters',
		),
	),
);
