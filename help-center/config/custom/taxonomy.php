<?php
/**
 * Help Center Taxonomy runtime configuration parameters.
 *
 * @package     UpTechLabs\HelpCenter
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace UpTechLabs\HelpCenter;

return array(
	'autoload'      => true,
	'taxonomy_name' => 'help-center-category',
	'object_type'   => array( 'help-center' ),
	'config'        => array(
		'plural_name'   => 'Categories',
		'singular_name' => 'Category',
		'args'          => array(
			'description'       => 'Help Center Categories',
			'hierarchical'      => true,
			'show_admin_column' => true,
		),
	),
);
