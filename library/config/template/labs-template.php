<?php
/**
 * LabsTemplate runtime configuration parameters.
 *
 * @package     Library\Custom\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Custom\Template;

return array(
	'autoload' => true,
	'config'   => array(
		'template_folder_path' => LIBRARY_PLUGIN_DIR . 'src/templates/',
		'post_type'            => 'lab',
		'use_single'           => true,
		'use_archive'          => true,
		'use_category'         => false,
		'tax'                  => 'labs_technologies',
		'use_tax'              => true,
		'use_tag'              => true,
		'use_page_templates'   => false,
		'templates'            => array(),
	),
);
