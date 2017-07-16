<?php
/**
 * User's History Base Shortcode - which lists all of their activity
 *
 * @package     KnowTheCode\UserHistory\Shortcode
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\UserHistory\Shortcode;

use Carbon\Carbon;
use Fulcrum\Custom\Shortcode\Shortcode;
use Fulcrum\Fulcrum;
use WP_Post;

class UserHistoryBase extends Shortcode {


	/**
	 * Get the row item view file.
	 *
	 * Note: used a `switch` for future growth
	 *
	 * @since 1.2.0
	 *
	 * @param WP_Post $post
	 *
	 * @return string
	 */
	protected function get_item_view_file( WP_Post $post ) {
		switch ( $post->post_type ) {
			case 'lab':
				$key = $this->has_parent( $post ) ? 'lab' : 'embedded_lab';
				break;
			default:
				$key = 'default';
		}

		return $this->config->item_view[ $key ];
	}

	/**
	 * Checks if the current record has a parent.
	 *
	 * @since 1.2.0
	 *
	 * @param WP_Post $post
	 *
	 * @return bool
	 */
	protected function has_parent( WP_Post $post ) {
		return (int) $post->post_parent > 0;
	}

	/**
	 * Checks if the record is the new lab structure, i.e. parent/child.
	 *
	 * @since 1.2.0
	 *
	 * @param WP_Post $post
	 *
	 * @return bool
	 */
	protected function is_lab_hierarchical( WP_Post $post ) {
		return $this->has_parent( $post ) && $post->post_type == 'lab';
	}

	/**
	 * Renders the episode prefix.
	 *
	 * @since 1.2.0
	 *
	 * @param WP_Post $post
	 *
	 * @return void
	 */
	protected function render_episode_prefix( WP_Post $post ) {
		if ( ! $this->is_lab_hierarchical( $post ) ) {
			return;
		}

		$episode_number = $this->get_episode_number( $post->ID );
		if ( ! $episode_number ) {
			return;
		}

		printf( '%s %d: ', __( 'Episode', 'user_history' ), esc_attr( $episode_number ) );
	}

	/**
	 * Gets the episode number from the episode's metadata.
	 *
	 * @since 1.2.0
	 *
	 * @param int $post_id
	 *
	 * @return int|void
	 */
	protected function get_episode_number( $post_id ) {
		$episode_metadata = get_post_meta( $post_id, '_episode_config' );
		if ( ! $episode_metadata ) {
			return;
		}

		if ( ! is_array( $episode_metadata ) || ! isset( $episode_metadata[0]['episode_number'] ) ) {
			return;
		}
		return (int) $episode_metadata[0]['episode_number'];
	}

	/**
	 * Get the record's URL.
	 *
	 * @since 1.2.0
	 *
	 * @param string $permalink
	 * @param stdClass $record
	 *
	 * @return string
	 */
	protected function get_record_url( $permalink, $record ) {
		return sprintf( '%s#%s', $permalink, strip_tags( $record->video_id ) );
	}

}
