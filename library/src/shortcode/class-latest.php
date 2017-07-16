<?php

/**
 * Latest Shortcode - Provides a list of the latest articles based on the post type.
 *
 * @package     Library\Shortcode
 * @since       1.0.4
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class Latest extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * NOTE: This is the method to extend for enhanced shortcodes (i.e. which extend this class).
	 *
	 * @since 1.0.4
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$query = $this->get_query();

		if ( ! $query->have_posts() ) {
			return '';
		}


		ob_start();
		include( $this->config->view );
		$html = ob_get_clean();

		wp_reset_postdata();

		return $html;
	}

	/**
	 * Render the latest items.
	 *
	 * @since 1.0.4
	 *
	 * @param $query
	 *
	 * @return void
	 */
	protected function render_latest_items( $query ) {
		while ( $query->have_posts() ) : $query->the_post();

			include( $this->config->view_item );

		endwhile;
	}


	/**************
	 * Helpers
	 *************/

	/**
	 * Builds the query.
	 *
	 * @since 1.0.4
	 *
	 * @return array
	 */
	protected function get_query() {
		$post_type = $this->get_post_type();

		$args = array(
			'post_type'      => $post_type,
			'posts_per_page' => 4,
		);

		if ( 'post' != $post_type ) {
			$args['meta_query'] = array(
				array(
					'key'     => '_ktc_coming_soon',
					'compare' => 'NOT EXISTS',
				),
			);
		}

		return new \WP_Query( $args );
	}

	/**
	 * Get the post type.
	 *
	 * @since 1.0.4
	 *
	 * @return string
	 */
	protected function get_post_type() {
		$post_type = strip_tags( $this->atts['type'] );

		if ( in_array( $post_type, array( 'lab', 'docx' ) ) ) {
			return $post_type;
		}

		return 'post';
	}
}
