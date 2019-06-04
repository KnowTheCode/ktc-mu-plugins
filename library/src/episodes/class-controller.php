<?php
/**
 * Episodes Controller
 *
 * @package     Library\Episodes
 * @since       1.1.2
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Episodes;

use Fulcrum\Config\Config_Contract;
use Fulcrum\Fulcrum_Contract;
use Library\Episodes\Metadata\Factory;

class Controller {

	/**
	 * Instance of Fulcrum
	 *
	 * @var Fulcrum_Contract
	 */
	protected $fulcrum;

	/**
	 * Configuration parameters
	 *
	 * @var Config_Contract
	 */
	protected $config;

	/**
	 * Instance of this Controller
	 *
	 * @var
	 */
	private static $instance;

	protected $metadata;

	/**
	 *
	 * @var
	 */
	protected $playlist;

	protected $post_id = 0;

	protected $post;

	protected $parent_id = 0;

	protected $is_backend = false;

	protected $is_lab_landing = false;

	protected $is_single_episode = false;

	protected $is_initialized = false;

	/***************
	 * Initializers
	 **************/

	/**
	 * Controller constructor.
	 *
	 * @since 1.1.2
	 *
	 * @param Fulcrum_Contract $fulcrum
	 * @param Config_Contract $config
	 */
	public function __construct( Fulcrum_Contract $fulcrum, Config_Contract $config ) {
		$this->fulcrum = $fulcrum;
		$this->config  = $config;

		$this->init_admin();
		$this->init_events();

		self::$instance = $this;
	}

	/**
	 * Get the Instance of the Controller.
	 *
	 * @since 1.0.0
	 *
	 * @return Controller
	 */
	public static function getInstance() {
		return self::$instance;
	}

	/**
	 * Initialize the backend for the controller.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_admin() {
		if ( ! is_admin() ) {
			return;
		}

		$this->is_backend = true;
		$this->fulcrum['options.metabox.episodes'];
		$this->fulcrum['options.metabox.library'];
		$this->fulcrum['playlist.episodes'];
	}

	/**
	 * Initialize the events.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		add_action( 'wp_head', array( $this, 'init' ), 1 );
	}

	/**
	 * Initialize the loop.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function init() {
		$this->init_post();
		$this->init_metadata();

		$this->is_initialized = true;
	}

	/**
	 * Initialize the post.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_post() {
		$this->post_id = get_the_ID();
		if ( $this->post_id < 1 ) {
			return;
		}

		$this->post = get_post( $this->post_id );
		if ( ! $this->post ) {
			return;
		}

		$this->parent_id         = $this->post->post_parent;
		$this->is_single_episode = $this->parent_id > 0;
		$this->is_lab_landing    = $this->parent_id === 0;
	}

	/**
	 * Initializer Metadata.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_metadata() {
		if ( ! $this->is_single_episode && ! $this->is_lab_landing ) {
			return;
		}

		$key            = $this->is_single_episode ? Factory::EPISODES_KEY : Factory::LIBRARY_KEY;
		$this->metadata = Factory::create( $key );
	}

	/***************
	 * Public
	 **************/

	/**
	 * Flag for if this content is a single episode.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public function is_current_content_single_episode() {
		return $this->is_single_episode;
	}

	/**
	 * Checks if the given Post ID is a single lab episode.
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id Post ID to check
	 *
	 * @return bool
	 */
	public function is_single_lab_episode( $post_id ) {
		$post = get_post( $post_id );
		if ( ! $post ) {
			return false;
		}

		return $post->post_type == 'lab' && $post->post_parent > 0;
	}

	/**
	 * Get metadata.
	 *
	 * @since 1.0.0
	 *
	 * @param string $meta_key
	 * @param string $meta_subkey
	 *
	 * @return mixed
	 */
	public function getMetadata( $meta_key, $meta_subkey = '' ) {
		return $this->metadata->get( $meta_key, $meta_subkey );
	}

	/**
	 * Get the lab's stats.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function getLabStats() {

		if ( ! $this->is_initialized ) {
			$this->init();
		}

		$stats = array(
			'coming_soon'        => '_ktc_coming_soon',
			'runtime'            => '_video_runtime',
			'number_of_episodes' => '_number_of_videos',
		);

		foreach( $stats as $key => $meta_key ) {
			$method_name = $this->is_single_episode ? 'get_stats_from_parent_lab' : 'getMetadata';

			$stat = $this->$method_name( $meta_key );

			$stats[ $key ] = $key == 'runtime' ? strip_tags( $stat ) : (int) $stat;
		}

		return $stats;
	}

	/**
	 * Get the stats from the parent.
	 *
	 * @since 1.0.0
	 *
	 * @param string $meta_key
	 *
	 * @return mixed
	 */
	protected function get_stats_from_parent_lab( $meta_key ) {
		return get_post_meta( $this->parent_id, $meta_key, true );
	}

	/**
	 * Gets the playlist metadata.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	public function getPlaylist() {
		if ( ! is_null( $this->playlist ) ) {
			return $this->playlist;
		}

		$post_id = $this->is_single_episode ? $this->parent_id : $this->post_id;

		$metadata       = get_post_meta( $post_id, '_episode_playlist' );
		$this->playlist = $metadata ? $metadata[0] : array();

		return $this->playlist;
	}
}
