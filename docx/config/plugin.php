<?php
/**
 * Docx Plugin Runtime Configuration Parameters.
 *
 * @package     KnowtheCode\Docx
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowtheCode\Docx;

return array(

	/****************************
	 * Post Types / Rewrite
	 ****************************/
	'post_types' => array(
		'docx' => 'docx',
	),

	'plugin_activation_keys' => array(
		'docx.post_type',
		'technologies.taxonomy',
	),

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => array(

		/****************************
		 * Post Types
		 ****************************/
		'docx.post_type'         => array(
			'provider' => 'provider.post_type',
			'config'   => DOCX_PLUGIN_DIR . 'config/post-type/docx.php',
		),
		'docx.permalink_handler' => array(
			'provider' => 'provider.post_type_permalink',
			'config'   => DOCX_PLUGIN_DIR . 'config/post-type/docx-permalinks.php',
		),

		/****************************
		 * Taxonomy
		 ****************************/

		'technologies.taxonomy'     => array(
			'provider' => 'provider.taxonomy',
			'config'   => DOCX_PLUGIN_DIR . 'config/taxonomy/technologies.php',
		),

		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.docx_list'       => array(
			'provider' => 'provider.shortcode',
			'config'   => DOCX_PLUGIN_DIR . 'config/shortcode/docx-list.php',
		),
		'shortcode.technology_list' => array(
			'provider' => 'provider.shortcode',
			'config'   => DOCX_PLUGIN_DIR . 'config/shortcode/technology-list.php',
		),

		/****************************
		 * Template
		 ****************************/
		'template.docx'             => array(
			'provider' => 'provider.template',
			'config'   => DOCX_PLUGIN_DIR . 'config/template/docx-template.php',
		),
	),

//	'register_concretes' => array(
//
//	),
);

