<?php
/**
 * Docx custom permalinks runtime configuration parameters.
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return [
	'autoload' => true,
	'config'   => [
		'custom_post_type'      => 'docx',
		'taxonomy'              => 'technologies',
		'rewrite_with_taxonomy' => [
			'enable'        => true,
			'pattern'       => '%technologies%',
			'taxonomy_name' => 'technologies',
		],
		'debugger'              => false,
	],
];
