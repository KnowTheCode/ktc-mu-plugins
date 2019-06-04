<?php
/**
 * Metadata Factory
 *
 * @package     Library\Episodes\Metadata
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Episodes\Metadata;

use Fulcrum\Fulcrum;

class Factory {

	const EPISODES_KEY = 'episodes_options.metadata.config';
	const LIBRARY_KEY = 'library_options.metadata.config';

	/**
	 * Load and return the Config object
	 *
	 * @since 1.0.0
	 *
	 * @param string $config_key Key for the configuration object in Fulcrum
	 * @param int $post_id Post ID
	 *
	 * @returns Metdata
	 */
	public static function create( $config_key, $post_id = 0 ) {
		$fulcrum = Fulcrum::getFulcrum();

		if ( ! $fulcrum->has( $config_key ) ) {
			return null;
		}

		return new Metadata( $fulcrum[ $config_key ], $post_id );
	}
}
