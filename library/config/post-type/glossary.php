<?php
/**
 * Glossary custom post type runtime configuration parameters.
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
	'post_type_name' => 'glossary',
	'config'         => array(
		'plural_name'         => 'Glossary',
		'singular_name'       => 'Glossary',
		'args'                => array(
			'public'              => true,
			'hierarchical'        => false,
			'show_in_rest'        => true,
			'has_archive'         => true,
			'exclude_from_search' => true,
			'menu_icon'           => 'dashicons-book-alt',
			'description'         => 'Glossary - key terms and concepts',
		),
		'labels'              => array(
			'archive' => 'Glossary',
		),
		'additional_supports' => array(
			'author'          => false,
			'comments'        => false,
			'excerpt'         => false,
			'post-formats'    => false,
			'trackbacks'      => false,
			'page-attributes' => true,
			'custom-fields'   => false,
			'revisions'       => false,
		),
	),
);
