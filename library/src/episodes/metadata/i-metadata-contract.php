<?php
/**
 * Episodes Metadata Contract
 *
 * @package     Library\Episodes\Metadata
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Episodes\Metadata;

interface MetadataContract {

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
	public function get( $meta_key, $sub_key = '' );
}