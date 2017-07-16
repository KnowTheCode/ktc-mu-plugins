<?php
/**
 * Podcast Metabox Runtime Configuration
 *
 * @package     KnowtheCode\AskTonyaPodcast\Admin\Metadata
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast\Admin\Metadata;

return array(
	'metadata_key' => '_asktonya_episode_metadata',
	'defaults'     => array(
		'_asktonya_episode_metadata' => array(
			'episode_coming_soon' => 0,
			'episode_number'      => 0,
			'episode_access'      => 'free',
			'vimeo_id'            => '',
			'runtime'             => array(
				'hours'   => 0,
				'minutes' => 0,
				'seconds' => 0,
			),
		),
	),
	'filters'      => array(
		'_asktonya_episode_metadata' => array(
			'episode_coming_soon' => 'intval',
			'episode_number'      => 'intval',
			'episode_access'      => 'strip_tags',
			'vimeo_id'            => 'strip_tags',
			'runtime'             => array(
				'hours'   => 'intval',
				'minutes' => 'intval',
				'seconds' => 'intval',
			),
		),
	),
);