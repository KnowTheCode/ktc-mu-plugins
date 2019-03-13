<?php
/**
 * Catalog Taxonomy runtime configuration parameters.
 *
 * @package     Library
 * @since       1.1.4
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return [
	'autoload'      => true,
	'taxonomy_name' => 'catalog',
	'object_type'   => [ 'docx', 'lab', 'post', 'challenge', 'asktonya', 'playbooks' ],
	'config'        => [
		'plural_name'   => 'Catalogs',
		'singular_name' => 'Catalog',
		'args'          => [
			'description'       => 'Catalog of elearning topics',
			'hierarchical'      => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
		],
	],
];
