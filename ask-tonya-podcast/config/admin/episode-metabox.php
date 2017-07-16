<?php
/**
 * Podcast Metabox Runtime Configuration
 *
 * @package     KnowtheCode\AskTonyaPodcast\Admin\Metabox
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast\Admin\Metabox;

$prefix     = 'asktonya_episode_';
$post_types = array( 'asktonya' );

$metadata = include( ASKTONYA_PLUGIN_DIR . 'config/metadata/episode.php' );

return array(
	'metadata_field' => '_asktonya_episode_metadata',
	'nonce_name'     => $prefix . '_nonce',
	'nonce_action'   => $prefix . '_save',
	'metabox_view'   => ASKTONYA_PLUGIN_DIR . 'src/Admin/Metabox/views/podcast.php',

	'id'       => $prefix . '_metabox',
	'title'    => 'Episode Configuration',
	'screen'   => $post_types,
	'context'  => 'normal',
	'priority' => 'high',

	'restrict' => array(
		'post_type' => $post_types,
	),

	'metadata' => $metadata['defaults'],
	'filters'  => $metadata['filters'],

	'access' => array(
		'free'  => 'free',
		'basic' => 'basic',
		'pro'   => 'pro',
	),
);
