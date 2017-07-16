<?php
/**
 * Series Options Metabox Runtime Configuration
 *
 * @package     Library\Series\Metadata
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace Library\Series\Metadata;

return array(
	'defaults' => array(
		'_number_of_labs_in_series'   => 0,
		'_series_video_runtime'       => '',
		'_number_of_videos_in_series' => 0,
		'_labsinseries'               => '',
	),
	'filters'  => array(
		'_number_of_labs_in_series'   => 'intval',
		'_series_video_runtime'       => 'strip_tags',
		'_number_of_videos_in_series' => 'strip_tags',
		'_labsinseries'               => 'strip_tags',
	),
);