<?php
/**
 * Temporary - Plugin seeder
 *
 * @package     Library\Series\Seed
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace Library\Series\Seed;

function seed_series_metadata() {
	$metadata = get_series_seed_metadata();

	foreach ( $metadata as $series_post_id => $series_metadata ) {
		set_series_metadata( $series_post_id, $series_metadata );
	}

}

function set_series_metadata( $series_post_id, $metadata ) {
	foreach ( $metadata as $meta_key => $meta_value ) {
		update_post_meta( $series_post_id, $meta_key, $meta_value );
	}
}

function get_series_seed_metadata() {
	$metadata = array();

	$metadata['2167'] = array(
		'_number_of_labs_in_series'   => 9,
		'_series_video_runtime'       => '10:47:15',
		'_number_of_videos_in_series' => 78,
		'_labsinseries'               => '2141, 4386, 4387, 3686, 3690, 3693, 3696, 5150, 854',
	);

	$metadata['4493'] = array(
		'_number_of_labs_in_series'   => 4,
		'_series_video_runtime'       => '04:18:43',
		'_number_of_videos_in_series' => 25,
		'_labsinseries'               => '4369, 4495, 4497, 4498',
	);

	$metadata['3570'] = array(
		'_number_of_labs_in_series'   => 9,
		'_series_video_runtime'       => '10:58:04',
		'_number_of_videos_in_series' => 49,
		'_labsinseries'               => '3585, 3595, 3637, 3686, 3690, 3693, 3696, 3768',
	);

	$metadata['2241'] = array(
		'_number_of_labs_in_series'   => 14,
		'_series_video_runtime'       => '12:56:43',
		'_number_of_videos_in_series' => 97,
		'_labsinseries'               => '2228, 2233, 2237, 2246, 2251, 2253, 2256, 2259, 2263, 2266, 2269, 2273, 2587, 2592',
	);

	$metadata['3135'] = array(
		'_number_of_labs_in_series'   => 3,
		'_series_video_runtime'       => '2:10:47',
		'_number_of_videos_in_series' => 18,
		'_labsinseries'               => '3134, 3155, 4495',
	);

	$metadata['2397'] = array(
		'_number_of_labs_in_series'   => 2,
		'_series_video_runtime'       => '1:17:56',
		'_number_of_videos_in_series' => 8,
		'_labsinseries'               => '992, 997',
	);

	$metadata['5058'] = array(
		'_number_of_labs_in_series'   => 3,
		'_series_video_runtime'       => '2:48:09',
		'_number_of_videos_in_series' => 22,
		'_labsinseries'               => '5049, 5052, 4495',
	);

	return $metadata;
}

seed_series_metadata();