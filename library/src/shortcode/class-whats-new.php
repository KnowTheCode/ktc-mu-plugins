<?php
/**
 * What's New Shortcode - Provids a list of the latest content
 *
 * @package     Library\Shortcode
 * @since       1.1.5
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class WhatsNew extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * NOTE: This is the method to extend for enhanced shortcodes (i.e. which extend this class).
	 *
	 * @since 1.1.5
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		$filterby = $this->atts['filterby'] ?: 'all';
		$args = array(
			'posts_per_page' => (int) $this->atts['number_to_show'],
		);
		$query = get_whats_new_query( $filterby, $args );
		if ( ! $query->have_posts() ) {
			return __( 'Whoopsie, something went wrong.', 'ktc' );
		}

		ob_start();
		include( $this->config->view );
		$html = ob_get_clean();

		wp_reset_postdata();

		return $html;
	}
}
