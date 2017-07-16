<?php
/**
 * Description
 *
 * @package     Library\Structure
 * @since       1.0.0
 * @author      WPDC and hellofromTonya
 * @link        https://wpdevelopersclub.com/
 * @license     GNU General Public License 2.0+
 */

namespace Library\Structure;

use Fulcrum\Config\Config_Contract;

class Series_List {

	/**
	 * Runtime configuration parameters.
	 *
	 * @var Config_Contract
	 */
	protected $config;

	/**
	 * Array of sessions.
	 *
	 * @var array
	 */
	protected $sessions = array();

	/**
	 * Series parent ID.
	 *
	 * @var int
	 */
	protected $parent_id = 0;

	/**************
	 * Initializers
	 *************/

	/**
	 * Series_List constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param Config_Contract $config
	 */
	public function __construct( Config_Contract $config ) {
		$this->config = $config;
		$this->init_events();
	}

	protected function init_events() {
		add_action( 'loop_start', array( $this, 'init_series_list' ) );
	}

	/**
	 * Initialize the series session list.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init_series_list() {
		if ( ! $this->is_ok_to_init_series_list() ) {
			return;
		}

		$this->init_parent_id();

		$this->init_sessions();
	}

	/**
	 * Initialize Sessions.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_sessions() {
		global $post;

		$this->sessions = get_posts(
			array(
				'post_status'      => 'publish',
				'post_type'        => $post->post_type,
				'post_parent'      => $this->parent_id,
				'suppress_filters' => false
			)
		);
	}

	/**
	 * Initialize the Parent's ID (this is the series landing page).
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_parent_id() {
		global $post;

		$this->parent_id = $post->post_parent > 0 ? $post->post_parent : $post->ID;
	}

	/**************
	 * State Checkers
	 *************/

	/**
	 * Checks if the current webpage is to be evaluated.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	protected function is_ok_to_init_series_list() {
		global $post;

		return in_array( $post->post_type, $this->config->post_type );
	}


}