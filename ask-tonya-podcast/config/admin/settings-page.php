<?php
/**
 * Options page runtime settings
 *
 * @package     KnowtheCode\AskTonyaPodcast\Admin\Settings
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast\Admin\Settings;

return array(
	'page_id'          => 'asktonya_options',
	'settings_field'   => 'asktonya_options',
	'metabox'          => array(
		'id'    => 'asktonya',
		'title' => __( 'Ask Tonya Options', 'asktonya' ),
	),
	'menu_ops'         => array(
		'submenu' => array(
			'parent_slug' => 'genesis',
			'page_title'  => __( 'Ask Tonya Options', 'asktonya' ),
			'menu_title'  => __( 'Ask Tonya Options', 'asktonya' ),
		),
	),
	'page_ops'         => array(),
	'default_settings' => array(
		'asktonya_page_opener'   => '',
		'asktonya_og_image'      => '',
		'asktonya_twitter_image' => '',
	),
	'sanitizer'        => array(
		'safe_html' => array(
			'asktonya_page_opener',
		),
		'url'       => array(
			'asktonya_og_image',
			'asktonya_twitter_image',

		),
	),
	'add_help_tab'     => array(),
	'metabox_view'     => ASKTONYA_PLUGIN_DIR . 'src/Admin/Settings/views/metabox.php',
);