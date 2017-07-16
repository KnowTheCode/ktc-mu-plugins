<?php

/**
 * Docx List Shortcode
 *
 * @package     KnowTheCode\Docx\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\Docx\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class DocxList extends Shortcode {

	protected $list_count = 0;

	/**
	 * Render the HTML and return it.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	protected function render() {
		$args = $this->build_args();

		$query = new \WP_Query( $args );
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
	 * Render the Docx List Item.
	 *
	 * @since 1.0.4
	 *
	 * @param $query
	 *
	 * @return void
	 */
	protected function render_docx_list_item( $query ) {
		while ( $query->have_posts() ) {
			$query->the_post();

			include( $this->config->view_list_item );
			$this->list_count++;
		}
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
			'post_type' => get_post_type(),
		);

		if ( $this->atts['term'] ) {

			$args['tax_query'] = array(
				array(
					'taxonomy' => $this->atts['taxonomy'],
					'field'    => 'slug',
					'terms'    => $this->atts['term'],
				),
			);
		}

		return $args;
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
	 * @return string
	 */
	protected function get_button_class() {
		$class = $this->atts['term'];

		if ( $this->atts['button_class'] ) {
			$class .= sprintf( ' %s', $this->atts['button_class'] );
		}

		return esc_attr( $class );
	}
}
