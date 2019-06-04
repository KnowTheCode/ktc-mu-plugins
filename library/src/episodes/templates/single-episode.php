<?php
/**
 * Episodes Single page template.
 *
 * @package     Library\Episodes
 * @since       1.0.2
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Episodes;

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\do_episode_loop' );

/**
 * Let's do the episode loop.
 *
 * @since 1.0.0
 *
 * @return void
 */
function do_episode_loop() {
	if ( ! have_posts() ) {
		_e( 'Whoopsie, your episode got misplaced somewhere.  Sorry about that.', 'library' );

		return;
	}

	while ( have_posts() ) : the_post();
		$post_id   = get_the_ID();
		$parent_id = wp_get_post_parent_id( $post_id );

		$metadata = get_episode_metadata();
		if ( ! $metadata ) {
			continue;
		}

		$access_level            = trim( $metadata['episode_access'] );
		$access_lowercase        = strtolower( $access_level );
		$user_has_rights_to_view = user_has_access_rights_to_view( $access_lowercase );
		$runtime                 = get_episode_runtime_from_metadata( $metadata );

		$video_filename = '';
		if ( $metadata['vimeo_id'] ) {
			$video_filename = get_video_view_filename( $user_has_rights_to_view, $access_lowercase );
		}

		include( 'views/episode.php' );

	endwhile;
}

/**
 * Get the episode's runtime from the metadata.
 *
 * @since 1.1.5
 *
 * @param array $metadata
 *
 * @return string
 */
function get_episode_runtime_from_metadata( $metadata ) {
	if ( ! isset( $metadata['runtime'] ) ) {
		return '';
	}

	if ( ! is_array( $metadata['runtime'] ) ) {
		return '';
	}

	$runtime = convert_runtime_to_into_datetime( $metadata['runtime'] );

	return convert_runtime_to_string( $metadata['runtime'], $runtime );
}

/**
 * Get the video view filename.
 *
 * @since 1.1.5
 *
 * @param bool $user_has_rights_to_view
 * @param string $access_level
 *
 * @return string
 */
function get_video_view_filename( $user_has_rights_to_view, $access_level ) {
	if ( $user_has_rights_to_view ) {
		return 'video.php';
	}

	if ( $access_level == 'basic' ) {
		return 'signup-basic.php';
	}

	return 'signup-pro.php';
}
