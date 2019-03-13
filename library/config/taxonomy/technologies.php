<?php
/**
 * Technology (tech) Taxonomy runtime configuration parameters.
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return [
	'autoload'      => true,
	'taxonomy_name' => 'technologies',
	'object_type'   => [ 'docx' ],
	'config'        => [
		'plural_name'   => 'Technologies',
		'singular_name' => 'Technology',
		'args'          => [
			'description'       => 'Technologies: Languages, Platforms, and Libraries',
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
		],
	],
];
