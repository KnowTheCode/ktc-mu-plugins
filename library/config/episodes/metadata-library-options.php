<?php
/**
 * Main Lab Options Metabox Runtime Configuration
 *
 * @package     Library\Episodes\Metadata
 * @since       1.1.2
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace Library\Episodes\Metadata;

return array(
	'defaults' => array(
		'_use_new_episodes'           => 0,
		'_ktc_coming_soon'            => 0,
		'_coming_soon_date'           => '',
		'_video_runtime'              => '',
		'_number_of_videos'           => 0,
		'_ktc_series_id'              => 0,
		'_ktc_series_sequence_number' => 0,
		'_is_free'                    => 0,
	),
	'filters'  => array(
		'_use_new_episodes'           => 'intval',
		'_ktc_coming_soon'            => 'intval',
		'_coming_soon_date'           => 'strip_tags',
		'_video_runtime'              => 'strip_tags',
		'_number_of_videos'           => 'intval',
		'_ktc_series_id'              => 'intval',
		'_ktc_series_sequence_number' => 'intval',
		'_is_free'                    => 'intval',
	),
);