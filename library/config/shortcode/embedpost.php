<?php
/**
 * Embedded Post Shortcode Runtime Configuration Parameters
 *
 * @package     Library\Shortcode
 * @since       1.1.5
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'Library\Shortcode\EmbedPost',
	'config'    => array(
		'shortcode'    => 'embedpost',
		'view'         => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/embedpost/embedpost.php',
		'view_episode' => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/embedpost/embedpost-episode.php',
		'view_series'  => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/embedpost/embedpost-series.php',
		'view_library'  => LIBRARY_PLUGIN_DIR . 'src/shortcode/views/embedpost/embedpost-library.php',
		'defaults'     => array(
			'class'     => '',
			'post_id'   => 0,
			'highlight' => 1,
		),
		'metakeys'     => array(
			'default'        => array(
				'_ktc_coming_soon',
				'_video_runtime',
				'_number_of_videos',
			),
			'lab'            => array(
				'_ktc_coming_soon',
				'_coming_soon_date',
				'_video_runtime',
				'_number_of_videos',
				'_ktc_series_id',
				'_ktc_series_sequence_number',
				'_is_free',
			),
			'episode'        => '_episode_config',
			'episode_config' => array(
				'episode_coming_soon' => 0,
				'episode_number'      => 0,
				'episode_access'      => 'pro',
				'vimeo_id'            => '',
				'runtime'             => array(
					'hours'   => 0,
					'minutes' => 0,
					'seconds' => 0,
				),
				'episode_runtime'     => '',
			),
			'series'         => array(
				'_number_of_labs_in_series',
				'_series_video_runtime',
				'_number_of_videos_in_series',
			),
		),
	),
);
