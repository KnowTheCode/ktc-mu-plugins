<?php
/**
 * Custom post type runtime parameters.
 *
 * @package     KnowtheCode\Playbooks
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\Playbooks;

return [
	'autoload'       => true,
	'post_type_name' => 'playbooks',
	'config'         => [
		'plural_name'           => 'Playbooks',
		'singular_name'         => 'Playbook',
		'args'                  => [
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-video-alt',
			'taxonomies'   => [ 'catalog', 'skills' ],
			'rewrite'      => [
				'slug'       => 'playbooks',
				'with_front' => false,
			],
			'description'  => 'Playbooks - Grab and go code solutions',
		],
		'labels'                => [
			'archive' => 'Playbooks',
		],
		'additional_supports'   => [
			'author'                            => false,
			'comments'                          => false,
			'excerpt'                           => true,
			'post-formats'                      => false,
			'trackbacks'                        => false,
			'custom-fields'                     => false,
			'revisions'                         => false,
			'page-attributes'                   => true,
			'ktc_library'                       => true,
			'genesis-entry-meta-before-content' => false,
			'genesis-entry-meta-after-content'  => false,
			'genesis-seo'                       => false,
			'genesis-scripts'                   => false,
			'genesis-layouts'                   => false,
			'genesis-rel-author'                => false,
		],
		'rewrite_with_taxonomy' => false,
		'columns_filter'        => [
			'coming_soon' => 'Coming Soon',
		],
		'columns_data'          => [
			'coming_soon' => [
				'callback' => 'genesis_get_custom_field',
				'echo'     => true,
				'args'     => [ '_ktc_coming_soon' ],
			],
		],
	],
];
