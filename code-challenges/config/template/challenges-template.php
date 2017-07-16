<?php

/**
 * Challenges Template runtime configuration parameters.
 *
 * @package     Library\Custom\Template
 * @since       1.1.4
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Custom\Template;

return array(
	'autoload' => true,
	'config'   => array(
		'template_folder_path' => LIBRARY_PLUGIN_DIR . 'src/templates/',
		'post_type'            => 'challenge',
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
