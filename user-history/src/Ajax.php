<?php
/**
 * User History Ajax Handler - when a user clicks on one of the
 * history links/buttons, this handler receives a request to update
 * the database.
 *
 * @package     KnowTheCode\UserHistory
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\UserHistory;

use Fulcrum\Foundation\AJAX as Base;

class Ajax extends Base {

	/**
	 * Initialize the events
	 *
	 * @since 1.0.0
	 *
	 * @return null
	 */
	protected function init_events() {
		add_action( 'wp_ajax_user_history_activity', array( $this, 'ajax_activity_recorder' ) );
	}

	/**
	 * Ajax user History Activity Recorder.  It saves the activity's state into the
	 * database.
	 *
	 * @since 1.0.0
	 *
	 * @return integer Returns the record ID back to the JavaScript caller
	 */
	public function ajax_activity_recorder() {
		$this->init_ajax();

		echo $this->fulcrum['user_history']->save( $this->data_packet );

		die();
	}
}
