<?php
/**
 * Playlist handler
 *
 * @package     Library\Episodes\Templates
 * @since       1.1.5
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Episodes\Playlist;

use Fulcrum\Fulcrum;
use KnowTheCode\UserHistory as UserHistory;

/**
 * Render the playlist.
 *
 * @since 1.1.5
 *
 * @return void
 */
function render_playlist() {
	$lab_stats = \Library\Episodes\get_lab_stats();

	echo do_shortcode( '[quip]' );

	include( 'views/playlist.php' );
}

/**
 * Render the episode list.
 *
 * @since 1.1.2
 *
 * @return void
 */
function render_episode_list() {
	$playlist_meta           = \Library\Episodes\get_playlist_metadata();
	$current_post_id         = get_the_ID();
	$user_id                 = get_current_user_id();
	$user_history_controller = UserHistory\getController();


	foreach ( $playlist_meta as $post_id => $episode_metadata ) {
		$current_episode_class_attribute = $watch_status = '';
		$access_level                    = strtolower( $episode_metadata['access'] );

		if ( $post_id == $current_post_id ) {
			$current_episode_class_attribute = ' episode__current';
		}

		if ( $user_id > 0 && $user_history_controller->is_watched( $post_id, $user_id ) ) {
			$watch_status = ' watched';
		}

		include( 'views/playlist-item.php' );
	}
}
