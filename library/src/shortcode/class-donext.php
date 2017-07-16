<?php

/**
 * Do Next Shortcode
 *
 * Provides a list of terminologies for the given post type.
 *
 * @package     Library\Shortcode
 * @since       1.1.5
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;

class DoNext extends Shortcode {

	/**
	 * Parent Lab/Page's ID
	 *
	 * @var int
	 */
	protected $parent_id = 0;

	/**
	 * Next Post ID
	 *
	 * @var integer
	 */
	protected $next_id;

	/**
	 * Previous Post ID
	 *
	 * @var integer
	 */
	protected $previous_id;

	/**
	 * Next post attributes
	 *
	 * @var array
	 */
	protected $next = [];

	/**
	 * Previous post attributes
	 *
	 * @var array
	 */
	protected $previous = [];

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
		$this->init_attributes();

		ob_start();

		include( $this->config->view );

		return ob_get_clean();
	}

	/**************
	 * Helpers
	 *************/

	protected function init_attributes() {
		$this->parent_id = (int) wp_get_post_parent_id( get_the_ID() );

		$attributes = array(
			'next_id'     => 'next',
			'previous_id' => 'previous',
		);

		foreach ( $attributes as $post_id => $type ) {
			$this->{$post_id} = (int) $this->atts[ $post_id ];
			if ( $this->{$post_id} ) {
				$this->{$type} = $this->get_post_details( $this->{$post_id}, $type == 'next' );
			}
		}
	}

	/**
	 * Get the post details.
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id
	 * @param bool $is_feature
	 *
	 * @return array
	 */
	protected function get_post_details( $post_id, $is_feature = false ) {
		$details = array(
			'post_id'        => (int) $post_id,
			'post_type'      => get_post_type( $post_id ),
			'permalink'      => esc_url( get_permalink( $post_id ) ),
			'title'          => esc_html( get_the_title( $post_id ) ),
			'image'          => get_the_post_thumbnail( $post_id, 'large' ),
		);

		if ( ! $is_feature ) {
			return $details;
		}

		foreach( array( '_ktc_coming_soon', '_video_runtime', '_number_of_videos' ) as $meta_key ) {
			$details[ $meta_key ] = get_post_meta( $post_id, $meta_key, true );
		}

		$details['_number_of_labs_in_series'] = $details['post_type'] == 'page'
			? (int) get_post_meta( $post_id, '_number_of_labs_in_series', true )
			: '';

		return $details;
	}
}
