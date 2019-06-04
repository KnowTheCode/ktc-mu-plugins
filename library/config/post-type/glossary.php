<?php
/**
 * Glossary custom post type runtime configuration parameters.
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library;

return [
	'autoload'       => true,
	'post_type_name' => 'glossary',
	'config'         => [
		'plural_name'         => 'Glossary',
		'singular_name'       => 'Glossary',
		'args'                => [
			'public'              => true,
			'hierarchical'        => false,
			'show_in_rest'        => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'menu_icon'           => 'dashicons-book-alt',
			'description'         => 'Glossary - key terms and concepts',
		],
		'labels'              => [
			'archive' => 'Glossary',
		],
		'additional_supports' => [
			'author'                            => false,
			'comments'                          => false,
			'editor'                            => true,
			'excerpt'                           => false,
			'post-formats'                      => false,
			'trackbacks'                        => false,
			'page-attributes'                   => true,
			'custom-fields'                     => false,
			'revisions'                         => false,
			// Disable the Genesis supports.
			'genesis-entry-meta-before-content' => false,
			'genesis-entry-meta-after-content'  => false,
			'genesis-seo'                       => false,
			'genesis-scripts'                   => false,
			'genesis-layouts'                   => false,
			'genesis-rel-author'                => false,
		],
	],
];
