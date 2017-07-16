<?php
/**
 * Docx custom post type runtime configuration parameters.
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
	'post_type_name' => 'docx',
	'config'         => array(
		'plural_name'         => 'Docx',
		'singular_name'       => 'Docx',
		'args'                => array(
			'public'       => true,
			'hierarchical' => false,
			'show_in_rest' => true,
			'has_archive'  => true,
			'taxonomies'   => array( 'technologies', 'catalog', 'skills' ),
			'menu_icon'    => 'dashicons-video-alt2',
			'description'  => 'Docx - Supplemental Documentation that doesn\'t suck',
		),
		'labels'              => array(
			'archive' => 'Docx',
		),
		'additional_supports' => array(
			'author'          => false,
			'comments'        => false,
			'excerpt'         => false,
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
