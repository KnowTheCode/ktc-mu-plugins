<?php
/**
 * User History Controller
 *
 * This object acts as the Controller between the front-end and database.
 *
 * @package     User_History
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\UserHistory;

use Fulcrum\Addon\Addon;
use Fulcrum\Foundation\Pagination\Pagination;

class Controller extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '2.0.0';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '4.5';

	/**
	 * Instance of the Ajax Handler
	 *
	 * @var Ajax
	 */
	protected $ajax_handler;

	/**
	 * Instance of the Db Helpers
	 *
	 * @var Database\DbHelpersContract
	 */
	protected $db_helpers;

	/**
	 * Instance of the View_Builder
	 *
	 * @var View\View_Builder
	 */
	protected $view_builder;

	/**
	 * Instance of Pagination
	 *
	 * @var Pagination
	 */
	protected $pagination;

	/*****************
	 * Getters
	 ****************/
	/**
	 * Get Pagination.
	 *
	 * @since 1.0.0
	 *
	 * @return Pagination
	 */
	protected function get_pagination() {
		if ( ! $this->pagination ) {
			$this->pagination = $this->fulcrum['pagination'];
		}

		return $this->pagination;
	}

	/*****************
	 * Initializers
	 ****************/

	/**
	 * Initialize the events.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		parent::init_events();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );

		$this->ajax_handler = $this->fulcrum['ajax.user_history'];
		add_action( 'init', array( $this, 'init_objects' ) );
		add_action( 'loop_start', array( $this, 'set_last_viewed_for_user' ) );
	}

	public function enqueue_assets() {
		if ( is_home() || is_front_page() ) {
			return;
		}

		$handle     = 'ktc_user_history_js';
		wp_enqueue_script(
			$handle,
			USER_HISTORY_PLUGIN_URL . 'assets/dist/2.0.0/jquery.user-history.min.js',
			array( 'jquery' ),
			null,
			true
		);

		wp_localize_script( $handle, 'uhParameters',
			array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'action'  => 'user_history_activity',
			)
		);
	}

	/**
	 * Initialize the objects to launch the plugin, but only if the person is
	 * logged into the site.
	 *
	 * @since 1.2.0
	 *
	 * @return void
	 */
	public function init_objects() {
		if ( ! is_user_logged_in() ) {
			return;
		}

		$this->db_helpers   = $this->fulcrum['db_helpers.user_history'];
		$this->view_builder = $this->fulcrum['view_builder.user_history'];
	}

	/**
	 * Update/set the `_ktc_last_viewed` user metadata to log
	 * the last .
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function set_last_viewed_for_user() {
		if ( ! is_single() ) {
			return;
		}

		$post             = get_post();
		$valid_page_types = array(
			'post',
			'lab',
			'docx',
		);

		if ( ! in_array( $post->post_type, $valid_page_types ) ) {
			return;
		}

		update_user_meta( get_current_user_id(), '_ktc_last_viewed', $post->ID );
	}

	/*********************
	 * Save record actions
	 ********************/

	/**
	 * Save the activity.
	 *
	 * The first step to ensure we don't get duplicate records is to query
	 * the database to see if the record already exists.  We are not going
	 * to trust the record id passed to us.
	 *
	 * @since 1.0.0
	 *
	 * @param array $data_packet
	 *
	 * @return false|int
	 */
	public function save( array $data_packet ) {
		// BUG FIX 24.July.2017
//		$data_packet['id'] = $this->db_helpers->get_record_id(
//			$data_packet['post_id'],
//			$data_packet['video_id'],
//			$data_packet['activity_id']
//		);

		if ( $data_packet['id'] < 1 ) {
			return $this->db_helpers->insert_activity( $data_packet );
		}

		if ( $data_packet['activity_state'] != 1 ) {
			return $this->db_helpers->delete_record( $data_packet );
		}

		return $this->db_helpers->update_activity( $data_packet );
	}

	/**
	 * Get the record ID for the user.
	 *
	 * @since 1.1.1
	 *
	 * @param int $post_id
	 * @param int $activity_id
	 * @param string $video_id
	 * @param int $user_id Defaults to 0 and uses the current user ID
	 *
	 * @return int
	 */
	public function get_record_id( $post_id, $activity_id, $video_id = '', $user_id = 0 ) {
		return $this->db_helpers->get_record_id( $post_id, $activity_id, $video_id, $user_id );
	}

	/**
	 * Get the history record.
	 *
	 * @since 1.0.0
	 *
	 * @param int $user_id
	 * @param int $post_id
	 * @param string $video_id
	 *
	 * @return array|null|object
	 */
	public function get_record( $post_id, $video_id, $user_id = 0 ) {
		return $this->db_helpers->get_record( $post_id, $video_id, $user_id );
	}

	/**
	 * Get all records for the user.
	 *
	 * @since 1.0.0
	 *
	 * @param int $user_id
	 *
	 * @return array|bool|mixed|null|object
	 */
	public function get_all_records( $user_id = 0 ) {
		return $this->db_helpers->get_all_records( $user_id );
	}

	/**
	 * Get all records by the Post ID for this user.
	 *
	 * @since 1.0.0
	 *
	 * @param int $user_id
	 * @param int $post_id
	 *
	 * @return array|null|object
	 */
	public function get_records_by_post_id( $post_id, $user_id = 0 ) {
		return $this->db_helpers->get_records_by_post_id( $post_id, $user_id );
	}

	/**
	 * Get all records for the activity.
	 *
	 * @since 1.0.0
	 *
	 * @param int $activity_id
	 * @param int $user_id
	 * @param int $limit Number of records to fetch
	 *
	 * @return array|bool|mixed|null|object
	 */
	public function get_records_by_activity( $activity_id, $user_id = 0, $limit = 0 ) {
		return $this->db_helpers->get_records_by_activity( $activity_id, $user_id, $limit );
	}

	/**
	 * Checks if the video has been watched by the specified user.
	 *
	 * @since 1.1.1
	 *
	 * @param int $post_id
	 * @param int $user_id
	 *
	 * @return boolean
	 */
	public function is_watched( $post_id, $user_id = 0 ) {
		$record_id = $this->get_record_id( $post_id, 3, '', $user_id );

		return $record_id > 0;
	}

	/**
	 * Get the Pagination HTML.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public function get_pagination_html() {
		$pagination = $this->get_pagination();
		if ( ! $pagination ) {
			return;
		}

		return $pagination->render(
			$this->db_helpers->get_pagination_sql(),
			$this->db_helpers->get_current_page(),
			$this->config->per_page
		);
	}
}
