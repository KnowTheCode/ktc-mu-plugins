<?php
/**
 * Labs custom post type runtime parameters.
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return array(
	'autoload'       => true,
	'post_type_name' => 'lab',
	'config'         => array(
		'plural_name'           => 'Labs',
		'singular_name'         => 'Lab',
		'args'                  => array(
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-video-alt',
			'taxonomies'   => array( 'catalog', 'skills' ),
			'rewrite'      => array(
				'slug'       => 'labs',
				'with_front' => false,
			),
			'description'  => 'Labs - Hands-on code building projects',
		),
		'labels'                => array(
			'archive' => 'Labs',
		),
		'additional_supports'   => array(
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
		'rewrite_with_taxonomy' => false,

		'columns_filter' => array(
			'coming_soon' => __( 'Coming Soon', 'library' ),
		),
		'columns_data'   => array(
			'coming_soon' => array(
				'callback' => 'genesis_get_custom_field',
				'echo'     => true,
				'args'     => array( '_ktc_coming_soon' ),
			),
		),
	),
);
