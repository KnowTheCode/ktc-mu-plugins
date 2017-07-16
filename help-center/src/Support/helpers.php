<?php
/**
 * Help Center Helper Functions
 *
 * @package     UpTechLabs\HelpCenter\Support
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\HelpCenter\Support;

/**
 * Get topic groups.
 *
 * @since 1.0.0
 *
 * @return array|false
 */
function get_topic_groups() {
	static $topic_groups;

	if ( is_null( $topic_groups ) ) {
		$topic_groups = get_posts_grouped_by_term( 'help-center', 'help-center-category' );
	}

	return $topic_groups;
}

/**
 * Get the topic groupings.
 *
 * @since 1.0.0
 *
 * @return array|bool
 */
function get_help_center_topic_groupings() {
	$args = array(
		'taxonomy'   => 'help-center-categories',
		'hide_empty' => false,
	);

	$groupings = get_terms( $args );
	if ( ! $groupings || ! is_array( $groupings ) ) {
		return false;
	}

	return $groupings;
}

/**
 * Gets all of the posts grouped by terms for the specified
 * post type and taxonomy.
 *
 * Results are grouped by terms and ordered by the term and post IDs.
 *
 * @since 1.0.0
 *
 * @param string $post_type_name Post type to limit query to
 * @param string $taxonomy_name Taxonomy to limit query to
 *
 * @return array|false
 */
function get_posts_grouped_by_term( $post_type_name, $taxonomy_name ) {
	$records = get_posts_grouped_by_term_from_db( $post_type_name, $taxonomy_name );

	$groupings = array();
	foreach ( $records as $record ) {
		$term_id = (int) $record->term_id;
		$post_id = (int) $record->post_id;

		if ( ! array_key_exists( $term_id, $groupings ) ) {
			$groupings[ $term_id ] = array(
				'term_id'   => $term_id,
				'term_name' => $record->term_name,
				'term_slug' => $record->term_slug,
				'posts'     => array(),
			);
		}

		$groupings[ $term_id ]['posts'][ $post_id ] = array(
			'post_id'    => $post_id,
			'post_title' => $record->post_title,
		);
	}

	return $groupings;
}

/**
 * Gets all of the posts grouped by terms for the specified
 * post type and taxonomy.
 *
 * Results are grouped by terms and ordered by the term and post IDs.
 *
 * @since 1.0.0
 *
 * @param string $post_type_name Post type to limit query to
 * @param string $taxonomy_name Taxonomy to limit query to
 *
 * @return array|false
 */
function get_posts_grouped_by_term_from_db( $post_type_name, $taxonomy_name ) {
	global $wpdb;

	$sql_query =
		"SELECT t.term_id, t.name AS term_name, t.slug AS term_slug, p.ID AS post_id, p.post_title
FROM {$wpdb->term_taxonomy} AS tt
INNER JOIN {$wpdb->terms} AS t ON (tt.term_id = t.term_id)
INNER JOIN {$wpdb->term_relationships} AS tr ON (tt.term_taxonomy_id = tr.term_taxonomy_id)
INNER JOIN {$wpdb->posts} AS p ON (tr.object_id = p.ID)
WHERE p.post_status = 'publish' AND p.post_type = %s AND tt.taxonomy = %s
GROUP BY t.term_id, p.ID
ORDER BY t.term_id, p.ID ASC;";

	$sql_query = $wpdb->prepare( $sql_query, $post_type_name, $taxonomy_name );

	$results = $wpdb->get_results( $sql_query );
	if ( ! $results || ! is_array( $results ) ) {
		return false;
	}

	return $results;
}
