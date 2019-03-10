<?php
/**
 * Playbooks Fulcrum Add-on Plugin
 *
 * @package     KnowTheCode\Playbooks
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Playbooks;

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
	const MIN_WP_VERSION = '5.0';

	/**
	 * Initialize this plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		parent::init_events();

//		if ( is_admin() ) {
//			add_action( 'genesis_admin_menu', array( $this, 'set_settings_options' ), 50 );
//			$this->init_metabox();
//
//		} else {
//			add_action( 'pre_get_posts', array( $this, 'change_the_archive_query' ) );
//		}

	}

	protected function is_playbook() {
		if ( is_post_type_archive( 'playbooks' ) ) {
			return true;
		}

		return is_singular( 'playbooks' );
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
