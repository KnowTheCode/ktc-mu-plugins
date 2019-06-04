<?php
/**
 * Technology List Shortcode
 *
 * Provides a list of terminologies for the given post type.
 *
 * @package     KnowTheCode\Docx\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\Docx\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class TechnologyList extends Shortcode {

	protected $list_count = 0;

	/**
	 * CPT Rewrite
	 *
	 * @var string
	 */
	protected $cpt_rewrite;

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

		$this->init_attributes();

		$terms = $this->get_technologies();
		if ( false === $terms ) {
			return '';
		}

		ob_start();
		include( $this->config->view );

		return ob_get_clean();
	}

	/**
	 * Render the list item.
	 *
	 * @since 1.0.4
	 *
	 * @param array $terms
	 *
	 * @return void
	 */
	protected function render_list_item( array $terms ) {

		foreach ( $terms as $term ) {
			$link = $this->get_the_permalink( $term->slug );

			include( $this->config->view_list_item );

			$this->list_count++;
		}
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Initialize attributes.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_attributes() {
		$this->cpt_rewrite = sanitize_title_with_dashes( $this->atts['post_type'] );
	}

	/**
	 * Build the dimensions
	 *
	 * @since 1.0.0
	 *
	 * @return array
	 */
	protected function get_technologies() {
		$args = array(
			'orderby'    => $this->atts['orderby'],
			'hide_empty' => $this->atts['hide_empty'],
			'number'     => $this->atts['number'],
			'post_type'  => $this->atts['post_type'],
		);

		$terms = get_terms( $this->atts['taxonomy'], $args );

		return is_array( $terms ) ? $terms : false;
	}

	/**
	 * Get the List class name(s).
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	protected function get_li_class() {
		$class = 'one-third';

		if ( $this->list_count % 3 == 0 ) {
			$class .= ' first';
		}

		return $class;
	}

	/**
	 * Get the button classname(s).
	 *
	 * @since 1.0.0
	 *
	 * @param string $technology
	 *
	 * @return string
	 */
	protected function get_button_class( $technology ) {
		$class = $technology;

		if ( $this->atts['button_class'] ) {
			$class .= sprintf( ' %s', esc_attr( $this->atts['button_class'] ) );
		}

		return $class;
	}

	/**
	 * Get the permalink.
	 *
	 * @since 1.0.0
	 *
	 * @param string $term_slug
	 *
	 * @return string
	 */
	protected function get_the_permalink( $term_slug ) {
		$link = sprintf( '%s/%s', $this->cpt_rewrite, $term_slug );

		return home_url( user_trailingslashit( $link ) );
	}
}
