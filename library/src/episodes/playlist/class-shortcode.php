<?php

/**
 * Episodes Playlist
 *
 * @package     Library\Episodes\Playlist
 * @since       1.1.2
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Episodes\Playlist;

use Fulcrum\Custom\Shortcode\Shortcode;

class EpisodesPlaylist extends Shortcode {

	/**
	 * Build the playlist
	 *
	 * @since 1.0.0
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		ob_start();

		render_playlist();

		return ob_get_clean();
	}
}
