<?php

/**
 * Insights Shortcode
 *
 * @package     Library\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Shortcode;

use WP_Query;
use Fulcrum\Custom\Shortcode\Shortcode;

class Insight extends Shortcode {

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

		if ( is_admin() ) {
			return '';
		}

		$args = $this->build_args();

		$query = new WP_Query( $args );
		if ( ! $query->have_posts() ) {
			return '';
		}

		$html = $this->get_html( $query );

		wp_reset_postdata();

		return $html;
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Builds the arguments for the query.
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	protected function build_args() {
		$args = array(
			'post_type'      => 'post',
			'category_name'  => $this->atts['term'],
			'posts_per_page' => $this->atts['number'],
		);

		return $args;
	}

	/**
	 * Get the HTML for this shortcode.
	 *
	 * @since 1.0.0
	 *
	 * @param $query
	 *
	 * @return string
	 */
	protected function get_html( $query ) {


		$html = '';

		$insight_counter = 1;

		while ( $query->have_posts() ) {
			ob_start();
			$query->the_post();

			$last_class = $insight_counter % 2 == 0 ? ' last' : '';

			include( $this->config->view );
			$html .= ob_get_clean();

			$insight_counter ++;
		}

		return $html;
	}


}
