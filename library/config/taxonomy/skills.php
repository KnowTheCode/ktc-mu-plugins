<?php
/**
 * Skills Taxonomy runtime configuration parameters.
 *
 * @package     Library
 * @since       1.1.4
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library;

return [
	'autoload'      => true,
	'taxonomy_name' => 'skills',
	'object_type'   => [ 'docx', 'lab', 'post', 'challenge', 'asktonya', 'playbooks' ],
	'config'        => [
		'plural_name'   => 'Skills',
		'singular_name' => 'Skill',
		'args'          => [
			'description'       => 'Skills',
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true, // Needed for tax to appear in Gutenberg editor.
		],
	],
];
