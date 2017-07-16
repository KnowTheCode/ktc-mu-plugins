<?php
/**
 * Skills Taxonomy runtime configuration parameters.
 *
 * @package     Library
 * @since       1.1.4
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return array(
	'autoload'      => true,
	'taxonomy_name' => 'skills',
	'object_type'   => array( 'docx', 'lab', 'post', 'challenge', 'asktonya' ),
	'config'        => array(
		'plural_name'   => 'Skills',
		'singular_name' => 'Skill',
		'args'          => array(
			'description'       => 'Skills',
			'hierarchical'      => true,
			'show_admin_column' => true,
		),
	),
);