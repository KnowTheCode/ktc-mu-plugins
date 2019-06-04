<?php
/**
 * Library Plugin Runtime Configuration Parameters.
 *
 * @package     Library
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library;

use Fulcrum\Config\Config;
use Library\Admin\Settings\Library_Options;
use Library\Episodes\Controller;
use Library\Episodes\Playlist\Playlist;
use Library\Episodes\PlaylistBackend;

return [

	/****************************
	 * Initial Setup
	 ****************************/

	'initial_parameters' => [
		'episodes_options.metadata.config' => new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/metadata-episode-options.php' ),
		'library_options.metadata.config'  => new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/metadata-library-options.php' ),
	],

	/****************************
	 * Post Types / Rewrite
	 ****************************/
	'post_types'         => [],

	'posts_per_page' => [
		'glossary' => - 1,
		'lab'      => 10,
	],

	'plugin_activation_keys' => [
		'labs.post_type',
		'glossary.post_type',
		'skills.taxonomy',
		'catalog.taxonomy',
	],

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => [
		/****************************
		 * Post Types
		 ****************************/
		'labs.post_type'     => [
			'provider' => 'provider.post_type',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/post-type/lab.php',
		],
		'glossary.post_type' => [
			'provider' => 'provider.post_type',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/post-type/glossary.php',
		],

		/****************************
		 * Taxonomy
		 ****************************/

		'skills.taxonomy'            => [
			'provider' => 'provider.taxonomy',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/taxonomy/skills.php',
		],
		'catalog.taxonomy'           => [
			'provider' => 'provider.taxonomy',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/taxonomy/catalog.php',
		],

		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.latest_content'   => [
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/latest.php',
		],
		'shortcode.vimeo'            => [
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/vimeo.php',
		],
		'shortcode.episode_playlist' => [
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/episode-playlist.php',
		],
		'shortcode.content_adder'    => [
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/content-adder.php',
		],
		'shortcode.insight'          => [
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/insight.php',
		],
		'shortcode.whatsnew'         => [
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/whatsnew.php',
		],
		'shortcode.donext'           => [
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/donext.php',
		],
		'shortcode.embedpost'        => [
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/embedpost.php',
		],

		/****************************
		 * Template
		 ****************************/
		'template.labs'              => [
			'provider' => 'provider.template',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/template/labs-template.php',
		],
		'template.glossary'          => [
			'provider' => 'provider.template',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/template/glossary-template.php',
		],
	],

	'register_concretes' => [
		'options.labs' => [
			'autoload' => false,
			'concrete' => function( $container ) {
				return new Library_Options(
					new Config( LIBRARY_PLUGIN_DIR . 'config/admin/settings/options.php' )
				);
			},
		],

		'options.metabox.episodes' => [
			'autoload' => false,
			'concrete' => function( $container ) {
				return new \Fulcrum\Metadata\Metabox(
					new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/metabox-episode-options.php' )
				);
			},
		],

		'options.metabox.library' => [
			'autoload' => false,
			'concrete' => function( $container ) {
				return new Episodes\Metabox\LibraryOptions(
					new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/metabox-library-options.php' )
				);
			},
		],

		'library_options.metadata' => [
			'autoload' => false,
			'concrete' => function( $fulcrum ) {
				return new Episodes\Metadata(
					$fulcrum['library_options.metadata.config']
				);
			},
		],

		'playlist.episodes' => [
			'autoload' => false,
			'concrete' => function( $fulcrum ) {
				return new Playlist(
					new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/playlist.php' )
				);
			},
		],

		'controller.episodes'    => [
			'autoload' => true,
			'concrete' => function( $fulcrum ) {
				return new Controller(
					$fulcrum,
					new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/controller.php' )
				);
			},
		],

		/*********
		 * Series
		 ********/
		'options.metabox.series' => [
			'autoload' => false,
			'concrete' => function( $container ) {
				return new Series\Metabox\SeriesOptions(
					new Config( LIBRARY_PLUGIN_DIR . 'config/series/metabox-series-options.php' )
				);
			},
		],
		'controller.series'      => [
			'autoload' => true,
			'concrete' => function( $fulcrum ) {
				return new Series\Controller(
					$fulcrum,
					new Config( LIBRARY_PLUGIN_DIR . 'config/series/controller.php' )
				);
			},
		],
	],
];

