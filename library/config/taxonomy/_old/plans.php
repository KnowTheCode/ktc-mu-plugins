<?php
/**
 * Plans Reference Taxonomy runtime configuration parameters.
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
	'taxonomy_name' => 'plans',
	'object_type'   => array( 'lab' ),
	'config'        => array(
		'plural_name'   => 'Plans',
		'singular_name' => 'Plan',
		'args'          => array(
			'description'         => 'Plan',
			'hierarchical'        => true,
			'show_admin_column'   => true,
			'exclude_from_search' => true,
			'show_in_nav_menus'   => false,
			'query_var'           => false,
		),
	),
);