<?php
/**
 * User's History Directory Shortcode - which lists all of their activity
 *
 * @package     KnowTheCode\UserHistory\Shortcode
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\UserHistory\Shortcode;

use Fulcrum\Fulcrum;

class UserHistory extends UserHistoryBase {

	/**
	 * Instance of the Controller
	 *
	 * @var \KnowTheCode\UserHistory\Controller
	 */
	protected $controller;

	/**
	 * Current activity ID
	 *
	 * @var int
	 */
	protected $activity_id;

	/**
	 * Array of User History records
	 *
	 * @var array
	 */
	protected $records;

	/************************
	 * Workers
	 ***********************/

	/**
	 * Render out the shortcode.
	 *
	 * @since 1.2.0
	 *
	 * @return string
	 */
	protected function render() {
		if ( ! is_user_logged_in() ) {
			return '';
		}

		$this->get_records();
		ob_start();

		if ( $this->atts['show_filterby'] ) {
			include( $this->config->filterby_view );
		}
		include( $this->config->view );

		$html = ob_get_clean();

		if ( $this->atts['paged'] === '1' ) {
			$html .= $this->controller->get_pagination_html();
		}

		return $html;
	}

	/**
	 * Render the user history rows (items).
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	protected function render_history_rows() {

		foreach ( $this->records as $record ) {
			$post_id   = (int) $record->post_id;
			$post      = get_post( $post_id );
			$font_icon = get_content_font_icon( $post->post_type );
			$permalink = get_permalink( $post_id );

			include( $this->config->row_view );
		}
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Builds the arguments for the query.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	protected function get_records() {
		$this->get_the_controller();

		$activity_id = $this->get_activity_id();

		$this->records = $this->controller->get_records_by_activity( $activity_id, get_current_user_id(),
			(int) $this->atts['per_page'] );
	}

	/**
	 * Get the button class if it's the current and active on.
	 *
	 * @since 1.0.0
	 *
	 * @param $activity_id
	 *
	 * @return string
	 */
	protected function get_button_class( $activity_id ) {
		return $this->get_activity_id() == $activity_id ? ' current' : '';
	}

	/************************
	 * Getters
	 ***********************/

	/**
	 * Get the controller out of the container.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function get_the_controller() {
		$fulcrum = Fulcrum::getFulcrum();

		$this->controller = $fulcrum['user_history'];
	}

	/**
	 * Get the activity ID.
	 *
	 * @since 1.0.0
	 *
	 * @return int
	 */
	protected function get_activity_id() {
		if ( $this->activity_id ) {
			return $this->activity_id;
		}

		if ( ! array_key_exists( 'actid', $_REQUEST ) ) {
			return $this->atts['actid'];
		}

		$activity_id = $_REQUEST['actid'];

		$this->activity_id = (int) $activity_id = $activity_id ?: $this->atts['actid'];

		return $this->activity_id;
	}
}
