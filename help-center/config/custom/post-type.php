<?php
/**
 * Help Center Custom Post Type
 *
 * @package     UpTechLabs\HelpCenter
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace UpTechLabs\HelpCenter;

return array(
	'autoload'       => true,
	'post_type_name' => 'help-center',
	'config'         => array(
		'plural_name'   => 'Help Center',
		'singular_name' => 'Help Center',
		'args'                  => array(
			'public'       => true,
			'hierarchical' => false,
			'has_archive'  => true,
			'show_in_rest' => true,
			'menu_icon'    => 'dashicons-editor-help',
			'rewrite'      => array(
				'slug'       => 'help-center',
				'with_front' => false,
			),
		),
		'labels'                => array(
			'archive' => 'Help Center',
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
		),
	),
);
