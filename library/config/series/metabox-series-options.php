<?php
/**
 * Series Options Metabox Runtime Configuration
 *
 * @package     Library\Series\Metadata
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Series\Metadata;

$metadata = include 'metadata-series-options.php';

return array(
	'metadata_field' => 'ktc_series_options',
	'nonce_name'     => 'ktc_series_options_nonce',
	'nonce_action'   => 'ktc_series_options_save',
	'metabox_view'   => LIBRARY_PLUGIN_DIR . 'src/series/metabox/views/series-options.php',

	'id'       => 'series_options_metabox',
	'title'    => __( 'Series Options', 'library' ),
	'screen'   => 'page',
	'context'  => 'normal',
	'priority' => 'high',

	'restrict' => array(
		'post_type'   => 'page',
		'parent_slug' => 'series',
	),
	'metadata' => $metadata['defaults'],
	'filters'  => $metadata['filters'],
);

unset( $metadata );

return $config;
