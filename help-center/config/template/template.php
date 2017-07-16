<?php

/**
 * Template runtime configuration parameters.
 *
 * @package     UpTechLabs\HelpCenter\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\HelpCenter\Template;

return array(
	'autoload' => true,
	'config'   => array(
		'template_folder_path' => HELPCENTER_PLUGIN_DIR . 'src/Template/',
		'post_type'            => 'help-center',
		'use_single'           => true,
		'use_archive'          => true,
		'use_category'         => false,
		'tax'                  => false,
		'use_tax'              => true,
		'use_tag'              => false,
		'use_page_templates'   => false,
		'templates'            => array(),
	),
);
