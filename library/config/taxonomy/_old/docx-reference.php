<?php
/**
 * Docx Reference Taxonomy runtime configuration parameters.
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return array(
	'autoload'      => true,
	'taxonomy_name' => 'docx-reference',
	'object_type'   => array( 'docx' ),
	'config'        => array(
		'plural_name'   => 'Docx References',
		'singular_name' => 'Docx Reference',
		'args'          => array(
			'description'       => 'Language Reference, e.g. syntax, types, variables, etc.',
			'hierarchical'      => true,
			'show_admin_column' => true,
		),
	),
);