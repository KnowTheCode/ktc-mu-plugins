<?php

/**
 * Aha Moment Shortcode
 *
 * @package     KnowTheCode\Marketing
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace KnowTheCode\Marketing\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class AhaMoment extends Shortcode {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * NOTE: This is the method to extend for enhanced shortcodes (i.e. which extend this class).
	 *
	 * @since 1.0.0
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {
		if ( is_user_logged_in() ) {
			return '';
		}

		$html = do_shortcode( '[optin-monster-shortcode id="fggc9bpbilvhcqol"]' );

		ob_start();
		include( $this->config->view );

		return ob_get_clean();
	}
}
