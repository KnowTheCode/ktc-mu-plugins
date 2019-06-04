<?php
/**
 * Episode Configuration Metabox Runtime Configuration
 *
 * @package     Library\Episodes\Metadata
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Episodes\Metadata;

$post_types = array( 'lab' );
$metadata = include( 'metadata-episode-options.php' );

$config = array(
	'metadata_field' => '_episode_config',
	'nonce_name'     => 'ktc_episode_config_nonce',
	'nonce_action'   => 'ktc_episode_config_save',
	'metabox_view'   => LIBRARY_PLUGIN_DIR . 'src/episodes/metabox/views/episode-options.php',

	'id'       => 'episode_configuration_metabox',
	'title'    => __( 'Episode Configuration', 'library' ),
	'screen'   => $post_types,
	'context'  => 'normal',
	'priority' => 'high',

	'restrict' => array(
		'post_type'  => $post_types,
//		'parent_post' => true,
		'child_post' => true,
	),

	'metadata' => $metadata['defaults'],
	'filters'  => $metadata['filters'],

	'access' => array(
		'free'  => 'free',
		'basic' => 'basic',
		'pro'   => 'pro',
	),
);

unset( $metadata );
unset( $post_types );

return $config;
