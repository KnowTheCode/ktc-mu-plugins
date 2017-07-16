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
	'taxonomy_name' => 'api',
	'object_type'   => array( 'docx', 'lab' ),
	'config'        => array(
		'plural_name'   => 'API',
		'singular_name' => 'API',
		'args'          => array(
			'description'       => 'API',
			'hierarchical'      => true,
			'show_admin_column' => true,
		),
	),
);