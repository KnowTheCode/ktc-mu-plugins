<?php
/**
 * Playlist Runtime Configuration
 *
 * @package     Library\Episodes\Metadata
 * @since       1.1.2
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace Library\Episodes;

return array(
	'nonce_name'     => 'ktc_library_options_nonce',
	'nonce_action'   => 'ktc_library_options_save',
	'build_list_key' => '_build_episode_playlist',

	'playlist_metadata_key' => '_episode_playlist',

	'episode_metadata' => include( 'metadata-episode-options.php' ),

	'build_list_args' => array(
		'numberposts' => - 1,
		'order'       => 'ASC',
		'orderby'     => 'menu_order',
		'post_type'   => 'lab',
		'post_parent' => 0,
	),
);