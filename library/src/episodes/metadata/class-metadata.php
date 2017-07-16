<?php
/**
 * Episodes Metadata
 *
 * @package     Library\Episodes\Metadata
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Episodes\Metadata;

use Fulcrum\Config\Config_Contract;

class Metadata implements MetadataContract {

	/**
	 * Configuration parameters
	 *
	 * @var Config_Contract
	 */
	protected $config;

	/**
	 * Post ID
	 *
	 * @var int
	 */
	protected $post_id = 0;

	/**
	 * Array of the metadata
	 *
	 * @var array
	 */
	protected $metadata = array();

	/***************
	 * Initializers
	 **************/

	/**
	 * Controller constructor.
	 *
	 * @since 1.1.2
	 *
	 * @param Config_Contract $config
	 * @param int $post_id Post ID
	 */
	public function __construct( Config_Contract $config, $post_id = 0 ) {
		$this->config  = $config;
		$this->post_id = $post_id ?: get_the_ID();

		$this->init_metadata();
	}

	/**
	 * Initialize metadata.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_metadata() {
		foreach( $this->config->defaults as $meta_key => $default ) {
			$is_single = ! is_array( $default );

			$metadata = get_post_meta( $this->post_id, $meta_key, $is_single );
			if ( ! $metadata ) {
				continue;
			}

			$this->metadata[ $meta_key ] = $is_single ? $metadata : $metadata[0];
		}
	}

	/**
	 * Get the requested metadata.  If none found, null is returned.
	 *
	 * @since 1.0.0
	 *
	 * @param string $meta_key
	 * @param string $sub_key
	 *
	 * @return mixed|null
	 */
	public function get( $meta_key, $sub_key = '' ) {
		if ( ! isset( $this->metadata[ $meta_key ] ) ) {
			return null;
		}

		if ( ! $sub_key ) {
			return $this->metadata[ $meta_key ];
		}

		if ( isset( $this->metadata[ $meta_key ][ $sub_key ] ) ) {
			return $this->metadata[ $meta_key ][ $sub_key ];
		}

		return null;
	}
}
