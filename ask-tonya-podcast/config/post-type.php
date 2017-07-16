<?php
/**
 * Custom post type runtime parameters.
 *
 * @package     KnowtheCode\AskTonyaPodcast
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast;

return array(
	'autoload'       => true,
	'post_type_name' => 'asktonya',
	'config'         => array(
		'plural_name'           => 'Ask Tonya',
		'singular_name'         => 'Ask Tonya',
		'args'                  => array(
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-video-alt',
			'taxonomies'   => array( 'catalog', 'skills' ),
			'rewrite'      => array(
				'slug'       => 'ask-tonya',
				'with_front' => false,
			),
			'description'  => 'Ask Tonya - answering your questions',
		),
		'labels'                => array(
			'archive' => 'Ask Tonya',
		),
		'additional_supports'   => array(
			'author'          => true,
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
