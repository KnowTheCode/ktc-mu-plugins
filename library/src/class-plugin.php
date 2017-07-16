<?php
/**
 * Library Plugin
 *
 * @package     Library
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library;

use Fulcrum\Addon\Addon;

class Plugin extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.1.6';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '4.6';

	/**
	 * Initialize this plugin.
	 *
	 * @since 1.1.2
	 *
	 * @return void
	 */
	protected function init_addon() {
		parent::init_addon();

		if ( is_admin() ) {
			add_action( 'init', array( $this, 'add_rewrite_rules' ), 1 );
			add_action( 'genesis_admin_menu', array( $this, 'labs_settings_options' ), 50 );

		} else {
			add_action( 'pre_get_posts', array( $this, 'change_the_archive_query' ) );
		}
	}

	/**
	 * Add the rewrite rules for our custom permalink structure.
	 *
	 * We only want to run this upon plugin activation, meaning a flush_rewrite_rules
	 * is required.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function add_rewrite_rules() {
		foreach ( $this->config->post_types as $post_type => $slug ) {
			add_rewrite_rule(
				sprintf( "^%s/([^/]+)/([^/]+)/?", $slug ),
				sprintf( 'index.php?post_type=%s&technologies=$matches[1]&name=$matches[2]', $post_type ),
				'top'
			);

			add_rewrite_rule(
				sprintf( '^%s/([^/]+)/?', $slug ),
				sprintf( 'index.php?post_type=%s&technologies=$matches[1]', $post_type ),
				'top'
			);

			add_rewrite_rule(
				sprintf( '^%s/?', $slug ),
				sprintf( 'index.php?pagename=%s', $slug ),
				'top'
			);
		}
	}

	/**
	 * Load up the Labs Options Settings page.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function labs_settings_options() {
		if ( ! $this->fulcrum->has( 'options.labs' ) ) {
			return;
		}
		$this->fulcrum['options.labs'];
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

		if ( is_post_type_archive( 'glossary' ) ) {
			$query->set( 'orderby', 'title' );
			$query->set( 'order', 'ASC' );
			$query->set( 'posts_per_page', $this->config->posts_per_page['glossary'] );
			$query->set( 'posts_per_archive_page', $this->config->posts_per_page['glossary'] );
		}

		if ( is_post_type_archive( 'lab' ) ) {
			$query->set( 'posts_per_page', $this->config->posts_per_page['lab'] );
			$query->set( 'posts_per_archive_page', $this->config->posts_per_page['lab'] );
		}
	}
}
