<?php
/**
 * User's History Last Viewed Shortcode
 *
 * @package     KnowTheCode\UserHistory\Shortcode
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\UserHistory\Shortcode;

class LastViewed extends UserHistoryBase {

	/**
	 * Build the Shortcode HTML and then return it.
	 *
	 * NOTE: This is the method to extend for enhanced shortcodes (i.e. which extend this class).
	 *
	 * @since 1.2.1
	 *
	 * @return string Shortcode HTML
	 */
	protected function render() {

		if ( is_admin() ) {
			return '';
		}

		if ( ! is_user_logged_in() ) {
			return '';
		}

		$post_id = (int) $this->get_last_viewed();
		if ( $post_id < 0 ) {
			return $this->error_message();
		}
		$post = get_post( $post_id );

		if ( ! $post instanceof \WP_Post ) {
			return $this->error_message();
		}

		$permalink = get_permalink( $post_id );

		ob_start();

		include( $this->config->view );

		return ob_get_clean();
	}

	protected function error_message() {
		return __( "Well, shucks, we don't have a record of what you last watched. Bummer.", 'user_history' );
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Builds the arguments for the query.
	 *
	 * @since 1.2.0
	 *
	 * @return array
	 */
	protected function get_last_viewed() {
		return (int) get_user_meta( get_current_user_id(), '_ktc_last_viewed', true );
	}
}
