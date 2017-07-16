<?php

/**
 * Embedded Post Shortcode
 *
 * Embeds a post highlights
 *
 * @package     Library\Shortcode
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */

namespace Library\Shortcode;

use Fulcrum\Custom\Shortcode\Shortcode;
use WP_Query;

class EmbedPost extends Shortcode {

	protected $is_single = true;
	protected $is_episode = false;
	protected $is_series = false;
	protected $is_library = false;
	protected $post_id = 0;
	protected $post_ids = [];

	protected $post_type;
	protected $permalink;
	protected $title;
	protected $image;
	protected $metadata = [];
	protected $parent_id = 0;
	protected $parent = [];

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
		$this->reset_states();
		if ( ! $this->init_attributes() ) {
			return '';
		}

		return $this->is_single
			? $this->render_single()
			: $this->render_multiple();
	}

	/**
	 * Render a single post.
	 *
	 * @since 1.1.6
	 *
	 * @return string
	 */
	protected function render_single() {
		ob_start();

		$view = $this->is_episode ? 'view_episode' : 'view';

		include( $this->config->{$view} );

		return ob_get_clean();
	}

	/**
	 * Render multiple posts.
	 *
	 * @since 1.1.6
	 *
	 * @return string
	 */
	protected function render_multiple() {
		$query = new WP_Query( array(
			'post__in'       => $this->post_ids,
			'post_type'      => 'any',
			'orderby'        => 'post__in',
			'posts_per_page' => - 1,
			'nopaging'       => true,
		) );

		if ( ! $query->have_posts() ) {
			return '';
		}

		ob_start();

		while ( $query->have_posts() ) {
			$query->the_post();

			$this->reset_states();

			$this->init_post( get_the_ID() );

			$view = $this->get_view_filename();

			include( $this->config->{$view} );
		}

		$html = ob_get_clean();

		wp_reset_postdata();

		return $html;
	}

	/**
	 * Get the view filename from the config.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	protected function get_view_filename() {
		if ( $this->is_series ) {
			return 'view_series';
		}

		if ( $this->is_library ) {
			return 'view_library';
		}

		if ( $this->is_episode ) {
			return 'view_episode';
		}

		return 'view';
	}

	/**************
	 * Helpers
	 *************/

	/**
	 * Reset the shortcode.
	 *
	 * @since 1.1.6
	 *
	 * @return void
	 */
	protected function reset_states() {
		$this->is_episode = false;
		$this->is_series  = false;
		$this->is_library = false;
		$this->post_type  = '';
		$this->permalink  = '';
		$this->title      = '';
		$this->image      = '';
		$this->metadata   = [];
		$this->parent     = [];
	}

	/**
	 * Initialize the attributes.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Returns `true` if successful; else `false` is returned.
	 */
	protected function init_attributes() {
		$this->is_single = strpos( $this->atts['post_id'], ',' ) === false;

		return $this->is_single
			? $this->init_post()
			: $this->init_multiple_posts();
	}

	/**
	 * Initialize the post.
	 *
	 * @since 1.0.0
	 *
	 * @param int $post_id
	 *
	 * @return bool
	 */
	protected function init_post( $post_id = 0 ) {
		if ( ! $post_id ) {
			$post_id = (int) $this->atts['post_id'];
		}

		if ( (int) $post_id < 1 ) {
			return false;
		}

		$post = get_post( $post_id );
		if ( ! $post ) {
			return false;
		}

		return $this->setup_the_post( $post );
	}

	/**
	 * Initialize multiple posts.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	protected function init_multiple_posts() {
		$post_ids = explode( ',', $this->atts['post_id'] );
		if ( ! $post_ids ) {
			return false;
		}

		$this->post_ids = array_map( 'intval', $post_ids );

		return true;
	}

	/**
	 * Initialize the metadata.
	 *
	 * @since 1.1.6
	 *
	 * @return void
	 */
	protected function init_metadata() {
		$this->metadata = [];

		if ( $this->is_series ) {
			$meta_key = 'series';
		} elseif ( $this->parent_id == 0 ) {
			$meta_key = 'lab';
		} else {
			$meta_key = 'default';
		}

		$meta_keys = $this->config['metakeys'][ $meta_key ];

		foreach ( $meta_keys as $meta_key ) {
			$this->metadata[ $meta_key ] = get_post_meta( $this->post_id, $meta_key, true );
		}
	}

	/**
	 * Initialize the episode's metadata.
	 *
	 * @since 1.1.6
	 *
	 * @return array|void
	 */
	protected function init_episode_metadata() {
		$metadata = get_post_meta( $this->post_id, $this->config['metakeys']['episode'], true );
		if ( ! $metadata ) {
			return array();
		}

		$this->metadata = array_merge( $this->config['metakeys']['episode_config'], $metadata );
		if ( $this->metadata['episode_coming_soon'] ) {
			return;
		}

		$this->metadata['episode_runtime'] = \Library\Episodes\convert_runtime_to_string(
			$this->metadata['runtime'],
			\Library\Episodes\convert_runtime_to_into_datetime( $this->metadata['runtime'] )
		);
	}

	/**
	 * Get the container class attributes.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	protected function get_container_classes() {

		$classes = sprintf( '%s-%d embedpost--article', esc_attr( $this->post_type ), $this->post_id );

		if ( $this->atts['highlight'] ) {
			$classes .= ' embedpost--highlight';
		}

		return $classes;
	}

	/**
	 * Set up the variables for this post.
	 *
	 * @since 1.1.6
	 *
	 * @param $post
	 *
	 * @return bool
	 */
	protected function setup_the_post( $post ) {
		$this->post_id   = (int) $post->ID;
		$this->post_type = $post->post_type;
		$this->parent_id = $post->post_parent;
		$this->permalink = esc_url( get_permalink( $post->ID ) );
		$this->title     = esc_html( $post->post_title );
		$this->image     = get_the_post_thumbnail( $post->ID, 'large' );

		$this->init_page();

		$this->init_episode();

		if ( $this->is_episode ) {
			$this->setup_the_parent();
			$this->init_episode_metadata();
		} else {
			$this->init_metadata();
		}

		return true;
	}

	/**
	 * Initialize the page.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_page() {
		if ( $this->post_type !== 'page' ) {
			return;
		}

		if ( $this->parent_id < 1 ) {
			return;
		}

		$parent_slug      = get_post( $this->parent_id )->post_name;
		$this->is_library = $parent_slug === 'library';
		$this->is_series  = $parent_slug === 'series';
	}

	/**
	 * Initialize the episode.
	 *
	 * @since 1.1.6
	 *
	 * @return void
	 */
	protected function init_episode() {
		$this->is_episode = $this->parent_id > 0 &&
		                    $this->post_type == 'lab';
	}

	/**
	 * Set up the parent.
	 *
	 * @since 1.1.6
	 *
	 * @return void
	 */
	protected function setup_the_parent() {
		$parent = get_post( $this->parent_id );
		if ( ! $parent ) {
			$this->parent = array(
				'title'     => '',
				'permalink' => '',
			);

			return;
		}

		$this->parent['title']     = $parent->post_title;
		$this->parent['permalink'] = get_permalink( $parent->ID );
	}

	/**
	 * Render the Coming Soon message.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	protected function render_coming_soon() {
		$message = $this->metadata['_coming_soon_date']
			? esc_html( $this->metadata['_coming_soon_date'] )
			: 'Soon';

		echo 'Coming ' . $message;
	}

	/**
	 * Checks if the content is FREE.
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	protected function is_free() {
		if ( ! array_key_exists( '_is_free', $this->metadata ) ) {
			return false;
		}

		return $this->metadata['_is_free'] == 1;
	}
}
