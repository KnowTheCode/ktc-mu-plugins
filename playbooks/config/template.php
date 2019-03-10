<?php
/**
 * Template runtime configuration parameters.
 *
 * @package     KnowtheCode\Playbooks\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\Playbooks\Template;

use function KnowtheCode\Playbooks\_get_plugin_root_dir;

return [
	'autoload' => true,
	'config'   => [
		'template_folder_path' => _get_plugin_root_dir() . '/src/Template/',
		'post_type'            => 'playbooks',
		'use_single'           => true,
		'use_archive'          => true,
		'use_category'         => false,
		'tax'                  => 'labs_technologies',
		'use_tax'              => true,
		'use_tag'              => false,
		'use_page_templates'   => false,
		'templates'            => [],
	],
];
