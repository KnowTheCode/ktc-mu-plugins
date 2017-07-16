<?php
/**
 * Episode Options Metabox Runtime Configuration
 *
 * @package     Library\Episodes\Metadata
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace Library\Episodes\Metadata;

return array(
	'metadata_key' => '_episode_config',
	'defaults'     => array(
		'_episode_config' => array(
			'episode_coming_soon' => 0,
			'episode_number'      => 0,
			'episode_access'      => 'pro',
			'vimeo_id'            => '',
			'runtime'             => array(
				'hours'   => 0,
				'minutes' => 0,
				'seconds' => 0,
			),
		),
	),

	'filters' => array(
		'_episode_config' => array(
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
