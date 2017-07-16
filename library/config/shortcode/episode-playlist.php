<?php

/**
 * Playlist Shortcode Runtime Configuration Parameters
 *
 * @package     Library\Episodes\Playlist
 * @since       1.1.5
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Episodes\Playlist;

return array(
	'autoload'  => true,
	'classname' => 'Library\Episodes\Playlist\EpisodesPlaylist',
	'config'    => array(
		'shortcode' => 'episode_playlist',
		'no_view'   => true,
		'view'      => '',
		'defaults'  => array(
			'title'      => __( 'Episodes', 'library' ),
			'hide_quips' => 0,
		),
	),
);
