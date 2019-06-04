<?php
/**
 * Labs custom post type runtime parameters.
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

return [
	'autoload'       => true,
	'post_type_name' => 'lab',
	'config'         => [
		'plural_name'           => 'Labs',
		'singular_name'         => 'Lab',
		'args'                  => [
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-video-alt',
			'taxonomies'   => [ 'catalog', 'skills' ],
			'rewrite'      => [
				'slug'       => 'labs',
				'with_front' => false,
			],
			'description'  => 'Labs - Hands-on code building projects',
		],
		'labels'                => [
			'archive'                => 'Labs',
			'name'                   => 'Labs',
			'singular_name'          => 'Lab',
			'add_new_item'           => 'Add New Lab',
			'parent_item_colon'      => 'Parent Lab:',
			'item_published'         => 'Lab published',
			'item_reverted_to_draft' => 'Lab reverted to draft.',
			'item_updated'           => 'Lab updated',
		],
		'additional_supports'   => [
			'author'                            => false,
			'comments'                          => false,
			'editor'                            => true,
			'excerpt'                           => true,
			'post-formats'                      => false,
			'trackbacks'                        => false,
			'custom-fields'                     => false,
			'revisions'                         => false,
			'page-attributes'                   => true,
			'ktc_library'                       => true,
			// Disable the Genesis supports.
			'genesis-entry-meta-before-content' => false,
			'genesis-entry-meta-after-content'  => false,
			'genesis-seo'                       => false,
			'genesis-scripts'                   => false,
			'genesis-layouts'                   => false,
			'genesis-rel-author'                => false,
		],
		'rewrite_with_taxonomy' => false,

		'columns_filter' => [
			'coming_soon' => 'Coming Soon',
		],
		'columns_data'   => [
			'coming_soon' => [
				'callback' => 'genesis_get_custom_field',
				'echo'     => true,
				'args'     => [ '_ktc_coming_soon' ],
			],
		],
	],
];
