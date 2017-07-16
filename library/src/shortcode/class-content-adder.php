<?php

/**
 * Content Adder Shortcode - It gives access to other plugins and features to hook in and add content.
 *
 * @package     Library\Shortcode
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class Content_Adder extends Shortcode {

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
		return apply_filters( 'content_adder', '', $this->atts );
	}
}
