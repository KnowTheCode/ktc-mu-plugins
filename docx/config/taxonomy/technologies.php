<?php
/**
 * Technology (tech) Taxonomy runtime configuration parameters.
 *
 * @package     KnowTheCode\Docx\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\Docx\Custom;

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
			'show_in_rest'      => true, // Needed for tax to appear in Gutenberg editor.
		],
	],
];

