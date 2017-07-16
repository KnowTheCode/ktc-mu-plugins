<?php
/**
 * Episode Helpers
 *
 * @package     Library\Episodes
 * @since       1.1.2
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace Library\Episodes;

use Carbon\Carbon;

/**
 * Checks if the current content is a single episode.
 *
 * @since 1.1.2
 *
 * @return bool
 */
function is_current_content_single_episode() {
	$controller = get_episodes_controller();

	return $controller->is_current_content_single_episode();
}

/**
 * Checks if the given Post ID is a single lab episode.
 *
 * @since 1.1.2
 *
 * @param int $post_id Post ID to check
 *
 * @return bool
 */
function is_single_lab_episode( $post_id ) {
	$controller = get_episodes_controller();

	return $controller->is_single_lab_episode( $post_id );
}

/**
 * Get Episodes Controller instance from Fulcrum.
 *
 * @since 1.1.2
 *
 * @return Controller
 */
function get_episodes_controller() {
	return Controller::getInstance();
}

/**
 * Get episode metadata.
 *
 * @since 1.1.2
 *
 * @param bool $sub_key
 * @param string $meta_key
 *
 * @return mixed
 */
function get_episode_metadata( $sub_key = false, $meta_key = '_episode_config' ) {
	$controller = get_episodes_controller();

	return $controller->getMetadata( $meta_key, $sub_key );
}

/**
 * Get the playlist metadata.
 *
 * @since 1.1.2
 *
 * @return array
 */
function get_playlist_metadata() {
	$controller = get_episodes_controller();

	return $controller->getPlaylist();
}

/**
 * Get the playlist metadata.
 *
 * @since 1.1.2
 *
 * @return array
 */
function get_lab_stats() {
	$controller = get_episodes_controller();

	return $controller->getLabStats();
}

/**
 * Convert runtime into datetime using Carbon.
 *
 * @since 1.1.2
 *
 * @param array $runtime
 *
 * @return Carbon
 */
function convert_runtime_to_into_datetime( array $runtime ) {
	return Carbon::createFromTime(
		$runtime['hours'],
		$runtime['minutes'],
		$runtime['seconds']
	);
}

/**
 * Convert runtime into a string using Carbon.
 *
 * @since 1.1.3
 *
 * @param array $runtime Array of times by hours, minutes, and seconds.
 * @param Carbon $time Instance of the time
 *
 * @return string
 */
function convert_runtime_to_string( array $runtime, Carbon $time  ) {
	$pattern = '';
	if ( $runtime['hours'] > 0 ) {
		$pattern = 'h:';
	}
	// Bug fix - we want the minutes no matter what, even as a placeholder
//	if ( $runtime['minutes'] > 0 ) {
//		$pattern .= 'i:';
//	}
	$pattern .= 'i:s';

	return $time->format( $pattern );
}

/**
 * Get the access rule ID for MemberPress.
 *
 * @since 1.1.2
 *
 * @param string $access
 *
 * @return bool|int
 */
function get_access_rule_id( $access ) {
	$access = strtolower( $access );

	if ( $access === 'pro' ) {
		return 120;
	}

	if ( $access === 'basic' ) {
		return 122;
	}

	return false;
}

/**
 * Checks if the user has access rights to view the content.
 *
 * @since 1.1.2
 *
 * @param string $episode_access
 *
 * @return bool
 */
function user_has_access_rights_to_view( $episode_access ) {
	$rule_id = get_access_rule_id( $episode_access );
	if ( $rule_id === false ) {
		return true;
	}

	return current_user_can( 'mepr-active', 'rule: ' . $rule_id );
}
