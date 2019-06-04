<?php
/**
 * Template runtime configuration parameters.
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
		'post_type'            => 'glossary',
		'use_single'           => false,
		'use_archive'          => true,
		'use_category'         => false,
		'tax'                  => false,
		'use_tax'              => false,
		'use_tag'              => false,
		'use_page_templates'   => false,
		'templates'            => array(),
	),
);
