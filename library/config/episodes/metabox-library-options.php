<?php
/**
 * Library Options Metabox Runtime Configuration
 *
 * @package     Library\Episodes\Metadata
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace Library\Episodes\Metadata;

$post_types = array( 'docx', 'lab' );

$metadata = include( 'metadata-library-options.php' );

return array(
	'metadata_field' => 'ktc_library',
	'nonce_name'     => 'ktc_library_options_nonce',
	'nonce_action'   => 'ktc_library_options_save',
	'metabox_view'   => LIBRARY_PLUGIN_DIR . 'src/episodes/metabox/views/library-options.php',

	'id'       => 'library_options_metabox',
	'title'    => __( 'Library Options', 'library' ),
	'screen'   => $post_types,
	'context'  => 'normal',
	'priority' => 'high',

	'restrict' => array(
		'post_type'   => $post_types,
		'parent_post' => true,
//		'child_post' => true,
	),


	'metadata' => $metadata['defaults'],
	'filters'  => $metadata['filters'],
);

unset( $metadata );
unset( $post_types );

return $config;