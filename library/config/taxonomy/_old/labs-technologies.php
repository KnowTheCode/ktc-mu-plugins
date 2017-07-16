<?php
/**
 * Technology (tech) Taxonomy runtime configuration parameters.
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
	'taxonomy_name' => 'labs_technologies',
	'object_type'   => array( 'lab' ),
	'config'        => array(
		'plural_name'   => 'Technologies',
		'singular_name' => 'Technology',
		'args'          => array(
			'description'       => 'Technologies: Languages, Platforms, and Libraries',
			'hierarchical'      => true,
			'show_admin_column' => true,
			'rewrite'           => array(
				'slug'       => 'labs-technologies',
				'with_front' => false,
			),
		),
	),
);