<?php
/**
 * Options page runtime settings
 *
 * @package     Library\Admin\Settings
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace Library\Admin\Settings;

return array(
	'page_id'          => 'library_options',
	'settings_field'   => 'library_options',
	'menu_ops'         => array(
		'submenu' => array(
			'parent_slug' => 'genesis',
			'page_title'  => __( 'Library Options', 'library' ),
			'menu_title'  => __( 'Library Options', 'library' )
		),
	),
	'page_ops'         => array(),
	'default_settings' => array(
		'labs_page_opener' => '',
	),
	'sanitizer'        => array(
		'safe_html' => array(
			'labs_page_opener',
		),
	),
	'add_help_tab'     => array(),
	'metabox_view'     => LIBRARY_PLUGIN_DIR . 'src/admin/settings/views/library-options-metabox.php',
);