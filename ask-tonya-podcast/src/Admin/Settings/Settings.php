<?php
/**
 * Ask Tonya Podcast Settings Page
 *
 * @package     KnowtheCode\AskTonyaPodcast\Admin\Settings
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast\Admin\Settings;

use Fulcrum\Config\Config_Contract;
use Genesis_Admin_Boxes;

class Settings extends Genesis_Admin_Boxes {

	/**
	 * Runtime configuration parameters.
	 *
	 * @var Config_Contract
	 */
	protected $config;

	/**
	 * Series_List constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Config_Contract $config
	 */
	public function __construct( Config_Contract $config ) {
		$this->config = $config;

		$this->create(
			$this->config->page_id,
			$this->config->menu_ops,
			$this->config->page_ops,
			$this->config->settings_field,
			$this->config->default_settings
		);

		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );
	}

	/**
	 * Set up Sanitization Filters
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function sanitization_filters() {

		foreach ( $this->config->sanitizer as $sanitizer_type => $options ) {
			genesis_add_option_filter( $sanitizer_type, $this->settings_field, $options );
		}
	}

	/**
	 * Register metaboxes on Child Theme Settings page
	 *
	 * @since 1.0
	 */
	function metaboxes() {

		add_meta_box(
			$this->config->metabox['id'],
			$this->config->metabox['title'],
			array( $this, 'render_metabox' ),
			$this->pagehook,
			'main',
			'high'
		);
	}

	/**
	 * Render the labs options metabox
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function render_metabox() {
		include( $this->config->metabox_view );
	}
}
