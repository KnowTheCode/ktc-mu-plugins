<?php
/**
 * Technology (tech) Taxonomy runtime configuration parameters.
 *
 * @package     KnowTheCode\Docx\Custom
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\Docx\Custom;

return array(
	'autoload'      => true,
	'taxonomy_name' => 'technologies',
	'object_type'   => array( 'docx' ),
	'config'        => array(
		'plural_name'   => 'Technologies',
		'singular_name' => 'Technology',
		'args'          => array(
			'description'       => 'Technologies: Languages, Platforms, and Libraries',
			'hierarchical'      => true,
			'show_admin_column' => true,
		),
	),
);