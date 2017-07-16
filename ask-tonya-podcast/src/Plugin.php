<?php
/**
 * Ask Tonya Podcast Fulcrum Add-on Plugin
 *
 * @package     KnowTheCode\AskTonyaPodcast
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\AskTonyaPodcast;

use Fulcrum\Addon\Addon;

class Plugin extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '4.5';

	/**
	 * Initialize this plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		parent::init_events();

		if ( is_admin() ) {
			add_action( 'genesis_admin_menu', array( $this, 'set_settings_options' ), 50 );
			$this->init_metabox();

		} else {
			add_action( 'pre_get_posts', array( $this, 'change_the_archive_query' ) );
		}

		add_filter( 'wpseo_opengraph_image', array( $this, 'change_wpseo_image' ) );
		add_filter( 'wpseo_twitter_image', array( $this, 'change_wpseo_image' ) );
	}

	public function change_wpseo_image( $img ) {
		if ( ! $this->is_asktonya() ) {
			return $img;
		}

		$image_key = doing_filter() == 'wpseo_opengraph_image'
			? 'asktonya_og_image'
			: 'asktonya_twitter_image';

		$asktonya_image = genesis_get_option( $image_key, 'asktonya_options' );

		return $asktonya_image ?: $img;

	}

	protected function is_asktonya() {
		$post_type = 'asktonya';

		if ( is_post_type_archive( $post_type ) ) {
			return true;
		}

		return is_singular( $post_type );
	}

	/**
	 * Load up the Labs Options Settings page.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function set_settings_options() {
		if ( ! $this->fulcrum->has( 'asktonya.settings_page' ) ) {
			return;
		}
		require( __DIR__ . '/Admin/Settings/Settings.php' );
		$this->fulcrum['asktonya.settings_page'];
	}

	protected function init_metabox() {
		if ( ! $this->fulcrum->has( 'asktonya.episodes.metabox' ) ) {
			return;
		}

		$this->fulcrum['asktonya.episodes.metabox'];
	}

	/**
	 * Change the query for the archive.
	 *
	 * @since 1.0.0
	 *
	 * @param \WP_Query $query
	 *
	 * @return void
	 */
	function change_the_archive_query( \WP_Query $query ) {
		if ( ! $query->is_main_query() ) {
			return;
		}

		if ( is_post_type_archive( 'asktonya' ) ) {
			$query->set( 'posts_per_page', $this->config->posts_per_page );
		}
	}
}
