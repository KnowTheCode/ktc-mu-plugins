<?php
/**
 * Library Helpers
 *
 * @package     Library\Support
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

if ( ! function_exists( 'get_technology_from_the_query' ) ) {
	/**
	 * Get the technology term from the query. Uses wp_query
	 * and fetches the 'technologies' key from wp_query->query.
	 *
	 * @since 1.0.0
	 *
	 * @return bool|WP_Term Returns the term object.
	 */
	function get_technology_from_the_query() {
		global $wp_query;

		if ( ! array_key_exists( 'technologies', $wp_query->query ) ) {
			return false;
		}

		$term_slug = $wp_query->query['technologies'];

		return get_term_by( 'slug', $term_slug, 'technologies' );
	}
}

if ( ! function_exists( 'get_technology_from_the_query_or_cache' ) ) {
	/**
	 * Get Docx technology from $wp_query->query.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	function get_technology_from_the_query_or_cache() {
		static $technology;

		if ( ! $technology ) {
			global $wp_query;

			$technology = $wp_query->query['technologies'];
		}

		return $technology;
	}
}

if ( ! function_exists( 'get_technology_name_by_slug' ) ) {
	/**
	 * Get the technology name by slug.
	 *
	 * @since 1.0.0
	 *
	 * @param string $slug Term slug
	 * @param string $taxonomy Taxonomy
	 *
	 * @return bool|string
	 */
	function get_technology_name_by_slug( $slug, $taxonomy = 'technologies' ) {
		$term = get_term_by( 'slug', $slug, $taxonomy );

		if ( is_wp_error( $term ) || ! $term ) {
			return false;
		}

		return $term->name;
	}
}

if ( ! function_exists( 'change_docx_link_in_breadcrumb' ) ) {
	/**
	 * Change the docx breadcrumb
	 *
	 * @since 1.0.1
	 *
	 * @param string $html
	 *
	 * @return string
	 */
	function change_docx_link_in_breadcrumb( $html ) {
		$html = str_replace( '/docx"', '/the-docx"', $html );

		return $html;
	}
}

if ( ! function_exists( 'insert_technology_into_breadcrumb' ) ) {
	/**
	 * Insert the technology into the breadcrumb.
	 *
	 * @since 1.0.0
	 *
	 * @param string $html
	 * @param string $technology_html
	 * @param string $separator
	 * @param string $pattern
	 *
	 * @return string
	 */
	function insert_technology_into_breadcrumb( $html, $technology_html, $separator, $pattern = '</span></a></span>' ) {
		$replace_pattern = $pattern . $separator . $technology_html;

		$html = str_replace( $pattern, $replace_pattern, $html );

		return $html;
	}
}

if ( ! function_exists( 'fulcrum_get_technologies_terms' ) ) {
	/**
	 * Get an array of technology links.
	 *
	 * @since 1.0.0
	 *
	 * @param string $taxonomy
	 *
	 * @return array|false
	 */
	function fulcrum_get_technologies_terms( $taxonomy = 'technologies' ) {
		$terms = get_terms( $taxonomy );
		if ( ! $terms || is_wp_error( $terms ) ) {
			return false;
		}

		return $terms;
	}
}

if ( ! function_exists( 'fulcrum_get_vimeo_oembed_object' ) ) {
	/**
	 * Requests the oEmbed object from Vimeo.
	 *
	 * @since 1.0.0
	 *
	 * @param int|string $video_id
	 *
	 * @return StdObj|false
	 */
	function fulcrum_get_vimeo_oembed_object( $video_id ) {
		$endpoint = 'http://vimeo.com/api/oembed.json?url=https%3A//vimeo.com/' . $video_id;

		$curl = curl_init( $endpoint );
		curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $curl, CURLOPT_TIMEOUT, 30 );
		curl_setopt( $curl, CURLOPT_FOLLOWLOCATION, 1 );
//		curl_setopt( $curl, CURLOPT_SSLVERSION, 3 );
		$return = curl_exec( $curl );
		curl_close( $curl );

		if ( ! $return ) {
			return false;
		}

		$vimeo = json_decode( $return );

		return $vimeo;
	}
}

if ( ! function_exists( 'get_content_font_icon' ) ) {
	/**
	 * Get the content font icon for the given (or current) post type.
	 *
	 * @since 1.1.3
	 *
	 * @param string $post_type
	 *
	 * @return string
	 */
	function get_content_font_icon( $post_type = '' ) {
		if ( ! $post_type ) {
			$post_type = get_post_type();
		}

		if ( $post_type == 'lab' ) {
			return 'flask';
		}

		if ( $post_type == 'docx' ) {
			return 'university';
		}

		if ( $post_type == 'asktonya' ) {
			return 'microphone';
		}

		return 'map-signs';

	}
}

if ( ! function_exists( 'get_whats_new_query' ) ) {
	/**
	 * Fetch the What's New Query
	 *
	 * @since 1.1.6
	 *
	 * @param string $filterby Filter the query by All, Labs, Insights, Docx
	 * @param array $args Override default arguments
	 *
	 * @return WP_Query
	 */
	function get_whats_new_query( $filterby = 'all', array $args = array() ) {
		$args = array_merge( array(
			'post_status'    => 'publish',
			'post_parent'    => 0,
			'posts_per_page' => 10,
			'orderby'        => 'date',
			'order'          => 'DESC',
			'date_query'     => array(
				'after' => '-8 month',
			),
			'meta_query'     => array(
				'relation' => 'OR',
				array(
					'key'   => '_ktc_coming_soon',
					'value' => 0,
					'type'  => 'NUMERIC',
				),
				array(
					'key'     => '_ktc_coming_soon',
					'compare' => 'NOT EXISTS',
				),
			),
		), $args );

		if ( $filterby == 'labs' ) {
			$args['post_type'] = 'lab';
		} elseif ( $filterby == 'docx' ) {
			$args['post_type'] = 'docx';
		} elseif ( $filterby == 'insights' ) {
			$args['post_type'] = 'post';
		} elseif ( $filterby == 'asktonya' ) {
			$args['post_type'] = 'asktonya';
		} else {
			$args['post_type'] = array( 'post', 'lab', 'docx', 'asktonya' );
		}

		return new WP_Query( $args );
	}
}
