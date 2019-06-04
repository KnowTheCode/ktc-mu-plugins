<?php
/**
 * Library Options Metabox Handler.
 *
 * @package     Library\Episodes\Metabox
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace Library\Episodes\Metabox;

use Fulcrum\Metadata\Metabox;

class LibraryOptions extends Metabox {

	protected $series = [];

	/**
	 * Pre render metabox.
	 *
	 * @since 1.0.6
	 *
	 * @param WP_Post $post Instance of the post for this metabox
	 * @param array $metabox Array of metabox arguments
	 *
	 * @return void
	 */
	protected function pre_render( $post, $metabox ) {
		global $wpdb;

		$sql_query = "
			SELECT p.ID, p.post_title
			FROM {$wpdb->posts} AS p
			WHERE p.post_type = 'page' AND p.post_parent = 2239 AND p.post_status = 'publish'
			ORDER BY p.post_title ASC
		";
		$this->series    = $wpdb->get_results( $sql_query );
	}
}
