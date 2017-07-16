<?php
/**
 * Library Options Settings Page
 *
 * @package     Library\Admin\Settings
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Admin\Settings;

use Fulcrum\Config\Config_Contract;
use Genesis_Admin_Boxes;

class Library_Options extends Genesis_Admin_Boxes {

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

		foreach( $this->config->sanitizer as $sanitizer_type => $options ) {
			genesis_add_option_filter( $sanitizer_type, $this->settings_field, $options );
		}
	}

//	/**
//	 * Set up Help Tab
//	 * Genesis automatically looks for a help() function, and if provided uses it for the help tabs
//	 * @link http://wpdevel.wordpress.com/2011/12/06/help-and-screen-api-changes-in-3-3/
//	 *
//	 * @since 1.0.0
//	 */
//	 function help() {
//	 	$screen = get_current_screen();
//
//		$screen->add_help_tab( array(
//			'id'      => 'genwpacc-help',
//			'title'   => 'Genesis Accessible Help',
//			'content' => '<p>For documentation, help and support visit <a href="http://genesis-accessible.org/">genesis-accessible.org</a></p>',
//		) );
//	 }

	/**
	 * Register metaboxes on Child Theme Settings page
	 *
	 * @since 1.0
	 */
	function metaboxes() {

		add_meta_box( 'labs',  __( 'Labs Options', 'library' ), array( $this, 'render_metabox_labs_options' ), $this->pagehook, 'main', 'high');
	}

	/**
	 * Render the labs options metabox
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function render_metabox_labs_options() {
		include( $this->config->metabox_view );
	}
}
