<?php
/**
 * Docx custom permalinks runtime configuration parameters.
 *
 * @package     KnowTheCode\Docx\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\Docx;

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
