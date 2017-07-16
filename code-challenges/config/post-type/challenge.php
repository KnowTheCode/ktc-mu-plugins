<?php
/**
 * Code Challenges custom post type runtime configuration parameters.
 *
 * @package     Library
 * @since       1.1.4
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return array(
	'autoload'       => true,
	'post_type_name' => 'challenge',
	'config'         => array(
		'plural_name'         => 'Challenges',
		'singular_name'       => 'Challenges',
		'args'                => array(
			'public'       => true,
			'hierarchical' => false,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-forms',
			'taxonomies'   => array( 'catalog', 'skills' ),
			'rewrite'      => array(
				'slug'       => 'challenges',
				'with_front' => false,
			),
			'description' => 'Code Challenges - put your proficiencies to the test',
		),
		'labels'              => array(
			'archive' => 'Challenges',
		),
		'additional_supports' => array(
			'author'          => false,
			'comments'        => false,
			'excerpt'         => true,
			'post-formats'    => false,
			'trackbacks'      => false,
			'custom-fields'   => false,
			'revisions'       => false,
			'page-attributes' => true,
			'ktc_library'     => true,
		),
		'columns_filter'      => array(
			'coming_soon' => __( 'Coming Soon', 'library' ),
		),
		'columns_data'        => array(
			'coming_soon' => array(
				'callback' => 'genesis_get_custom_field',
				'echo'     => true,
				'args'     => array( '_ktc_coming_soon' ),
			),
		),
	),
);
