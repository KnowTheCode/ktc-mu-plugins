<?php
/**
 * Episodes Playlist
 *
 * @package     Library\Episodes\Playlist
 * @since       1.1.4
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Episodes\Playlist;

use Carbon\Carbon;
use Fulcrum\Config\Config_Contract;
use Fulcrum\Fulcrum_Contract;
use Library\Episodes\Metadata\Factory;
use Library\Episodes\Metadata\Metadata;
use WP_Post;

class Playlist {

	/**
	 * Configuration parameters
	 *
	 * @var Config_Contract
	 */
	protected $config;

	/**
	 * Total runtime
	 *
	 * @var Carbon
	 */
	protected $total_runtime;

	/**
	 * Parent's ID
	 *
	 * @var int
	 */
	protected $parent_id = 0;

	/***************
	 * Initializers
	 **************/

	/**
	 * Controller constructor.
	 *
	 * @since 1.1.2
	 *
	 * @param Config_Contract $config
	 */
	public function __construct( Config_Contract $config ) {
		$this->config = $config;
		$this->init_events();
	}

	/**
	 * Initialize the events.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_events() {
		add_action( 'save_post', array( $this, 'build_list' ), 1, 2 );
	}

	/**
	 * Build the episode list on the lab's save.
	 *
	 * @since 1.1.2
	 *
	 * @param integer $post_id Post ID.
	 * @param stdClass $post Post object.
	 *
	 * @return void
	 */
	public function build_list( $post_id, $post ) {
		if ( ! isset( $_POST[ $this->config->build_list_key ] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST[ $this->config->nonce_name ], $this->config->nonce_action ) ) {
			return;
		}

		$this->parent_id = $this->config->build_list_args['post_parent'] = $post_id;

		$episodes = get_children( $this->config->build_list_args );
		if ( ! $episodes ) {
			return;
		}

		$_POST['_number_of_videos'] = count( $episodes );

		$playlist_metadata = $this->build_playlist_metadata( $episodes );

		update_post_meta( $post_id, $this->config->playlist_metadata_key, $playlist_metadata );

		$_POST['_video_runtime'] = $this->totalRuntimeTostring();
	}

	/**
	 * Build the playlist metadata, which will get stored into the database for later use.
	 *
	 * @since 1.1.3
	 *
	 * @param array $episodes Array of episodes (posts)
	 *
	 * @return array
	 */
	protected function build_playlist_metadata( array $episodes ) {
		$playlist = array();

		foreach ( $episodes as $episode_id => $episode ) {
			$metadata = Factory::create( Factory::EPISODES_KEY, $episode_id );

			$playlist[ $episode_id ] = $this->build_episode_list_item( $episode_id, $episode, $metadata );

			$this->trigger_episode_user_history_remap_event( $episode_id, $metadata );
		}

		return $playlist;
	}

	/**
	 * Fires the user history remap event for the given episode/video.  This method is
	 * a temporary migration tool as we convert over from one large lab to individual
	 * episodes.
	 *
	 * TODO-TEMPORARY_MIGRATION
	 *
	 * @since 1.1.3
	 *
	 * @param integer $episode_id
	 * @param Metadata $metadata
	 *
	 * @return void
	 */
	protected function trigger_episode_user_history_remap_event( $episode_id, Metadata $metadata ) {
		if ( $this->is_coming_soon( $metadata ) || ! $this->has_video( $metadata ) ) {
			return;
		}

		$video_id = $metadata->get( $this->config->episode_metadata['metadata_key'], 'vimeo_id' );

		do_action( 'episode_user_history_remap', $this->parent_id, $episode_id, $video_id );
	}

	/**
	 * Build an episode list item.
	 *
	 * @since 1.1.3
	 *
	 * @param int $episode_id
	 * @param WP_Post $episode
	 * @param Metadata $metadata
	 *
	 * @return array
	 */
	protected function build_episode_list_item( $episode_id, WP_Post $episode, Metadata $metadata ) {
		$runtime = $this->get_episode_runtime( $metadata );

		$episode_item = array(
			'post_id'        => (int) $episode_id,
			'episode_number' => (int) $episode->menu_order,
			'title'          => strip_tags( $episode->post_title ),
			'access'         => $metadata->get( $this->getMetaKey(), 'episode_access' ),
			'runtime'        => $runtime,
			'link'           => get_permalink( (int) $episode_id ),
		);

		return $episode_item;
	}

	/**
	 * Get the episode runtime.
	 *
	 * @since 1.1.3
	 *
	 * @param Metadata $metadata
	 * @param string $default Default runtime
	 *
	 * @return string
	 */
	protected function get_episode_runtime( Metadata $metadata, $default = '00:00' ) {
		if ( $this->is_coming_soon( $metadata ) ) {
			return 'coming';
		}

		if ( ! $this->has_video( $metadata ) ) {
			return $default;
		}

		$runtime = $metadata->get( $this->getMetaKey(), 'runtime' );
		$runtime = $this->convert_runtime_to_string( $runtime );

		return $runtime ?: $default;
	}

	/**
	 * Convert the runtime into a formatted string for the playlist.
	 *
	 * @since 1.0.0
	 *
	 * @param array $runtime
	 *
	 * @return string
	 */
	protected function convert_runtime_to_string( array $runtime ) {
		$time = \Library\Episodes\convert_runtime_to_into_datetime( $runtime );

		$this->sum_runtimes( $time, $runtime );

		return \Library\Episodes\convert_runtime_to_string( $runtime, $time );
	}

	/**
	 * Sums the episode runtimes by adding this episode into the total.
	 *
	 * @since 1.0.0
	 *
	 * @param Carbon $time
	 * @param array $runtime
	 *
	 * @return void
	 */
	protected function sum_runtimes( Carbon $time, array $runtime ) {

		if ( is_null( $this->total_runtime ) ) {
			$this->total_runtime = $time;

			return;
		}

		$this->total_runtime->addSeconds( $runtime['seconds'] );

		if ( $runtime['minutes'] > 0 ) {
			$this->total_runtime->addMinutes( $runtime['minutes'] );
		}

		if ( $runtime['hours'] > 0 ) {
			$this->total_runtime->addHours( $runtime['hours'] );
		}
	}

	/**
	 * Converts the total runtime to a time string
	 *
	 * @since 1.1.4
	 *
	 * @return string
	 */
	protected function totalRuntimeTostring() {
		if ( is_null( $this->total_runtime ) ) {
			return '00:00:00';
		}

		return $this->total_runtime->toTimeString();
	}

	/**
	 * Get the metadata key for the episodes.
	 *
	 * @since 1.1.3
	 *
	 * @return string
	 */
	protected function getMetaKey() {
		return $this->config->episode_metadata['metadata_key'];
	}


	/**
	 * Checks if the episode is coming soon.
	 *
	 * @since 1.1.3
	 *
	 * @param Metadata $metadata
	 *
	 * @return bool
	 */
	protected function is_coming_soon( Metadata $metadata ) {
		$coming_soon = $metadata->get( $this->getMetaKey(), 'episode_coming_soon' );

		return $coming_soon == '1';
	}

	/**
	 * Checks if the episode has a video.
	 *
	 * @since 1.1.3
	 *
	 * @param Metadata $metadata
	 *
	 * @return bool
	 */
	protected function has_video( Metadata $metadata ) {
		return ! empty( $metadata->get( $this->getMetaKey(), 'vimeo_id' ) );
	}
}
