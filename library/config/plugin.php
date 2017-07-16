<?php
/**
 * Library Plugin Runtime Configuration Parameters.
 *
 * @package     Library
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

use Fulcrum\Config\Config;
use Library\Admin\Settings\Library_Options;
use Library\Episodes\Controller;
use Library\Episodes\Playlist\Playlist;
use Library\Episodes\PlaylistBackend;

return array(

	/****************************
	 * Initial Setup
	 ****************************/

	'initial_parameters' => array(
		'episodes_options.metadata.config' => new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/metadata-episode-options.php' ),
		'library_options.metadata.config'  => new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/metadata-library-options.php' ),
	),

	/****************************
	 * Post Types / Rewrite
	 ****************************/
	'post_types'         => array(//		'docx' => 'docx',
	),

	'posts_per_page' => array(
		'glossary'  => - 1,
		'lab'       => 10,
	),

	'plugin_activation_keys' => array(
		'labs.post_type',
		'glossary.post_type',
		'skills.taxonomy',
		'catalog.taxonomy',
	),

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => array(

		/****************************
		 * Assets
		 ****************************/
		'script.fitvids'      => array(
			'provider' => 'provider.asset',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/asset/fitvids.php',
		),
		'script.library'      => array(
			'provider' => 'provider.asset',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/asset/script.php',
		),

		/****************************
		 * Post Types
		 ****************************/
		'labs.post_type'      => array(
			'provider' => 'provider.post_type',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/post-type/lab.php',
		),
		'glossary.post_type'  => array(
			'provider' => 'provider.post_type',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/post-type/glossary.php',
		),

		/****************************
		 * Taxonomy
		 ****************************/

		'skills.taxonomy'            => array(
			'provider' => 'provider.taxonomy',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/taxonomy/skills.php',
		),
		'catalog.taxonomy'           => array(
			'provider' => 'provider.taxonomy',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/taxonomy/catalog.php',
		),

		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.latest_content'   => array(
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/latest.php',
		),
		'shortcode.vimeo'            => array(
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/vimeo.php',
		),
		'shortcode.episode_playlist' => array(
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/episode-playlist.php',
		),
		'shortcode.content_adder'    => array(
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/content-adder.php',
		),
		'shortcode.insight'          => array(
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/insight.php',
		),
		'shortcode.whatsnew'         => array(
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/whatsnew.php',
		),
		'shortcode.donext'           => array(
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/donext.php',
		),
		'shortcode.embedpost'        => array(
			'provider' => 'provider.shortcode',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/shortcode/embedpost.php',
		),

		/****************************
		 * Template
		 ****************************/
		'template.labs'              => array(
			'provider' => 'provider.template',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/template/labs-template.php',
		),
		'template.glossary'          => array(
			'provider' => 'provider.template',
			'config'   => LIBRARY_PLUGIN_DIR . 'config/template/glossary-template.php',
		),
	),

	'register_concretes' => array(
		'options.labs' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Library_Options(
					new Config( LIBRARY_PLUGIN_DIR . 'config/admin/settings/options.php' )
				);
			},
		),

		'options.metabox.episodes' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new \Fulcrum\Metadata\Metabox(
					new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/metabox-episode-options.php' )
				);
			},
		),

		'options.metabox.library' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Episodes\Metabox\LibraryOptions(
					new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/metabox-library-options.php' )
				);
			},
		),

		'library_options.metadata' => array(
			'autoload' => false,
			'concrete' => function ( $fulcrum ) {
				return new Episodes\Metadata(
					$fulcrum['library_options.metadata.config']
				);
			},
		),

		'playlist.episodes' => array(
			'autoload' => false,
			'concrete' => function ( $fulcrum ) {
				return new Playlist(
					new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/playlist.php' )
				);
			},
		),

		'controller.episodes'    => array(
			'autoload' => true,
			'concrete' => function ( $fulcrum ) {
				return new Controller(
					$fulcrum,
					new Config( LIBRARY_PLUGIN_DIR . 'config/episodes/controller.php' )
				);
			},
		),

		/*********
		 * Series
		 ********/
		'options.metabox.series' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Series\Metabox\SeriesOptions(
					new Config( LIBRARY_PLUGIN_DIR . 'config/series/metabox-series-options.php' )
				);
			},
		),
		'controller.series'      => array(
			'autoload' => true,
			'concrete' => function ( $fulcrum ) {
				return new Series\Controller(
					$fulcrum,
					new Config( LIBRARY_PLUGIN_DIR . 'config/series/controller.php' )
				);
			},
		),
	),
);

