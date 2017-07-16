<?php
/**
 * Series Options Metabox
 *
 * @package     Library\Series\Metabox
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
namespace Library\Series\Metabox;

use Carbon\Carbon;
use Fulcrum\Metadata\Metabox;

class SeriesOptions extends Metabox {

	protected $post;
	protected $total_videos;
	protected $total_runtime;

	/**
	 * Check to determine if this particular page needs this metabox.
	 *
	 * @since 1.1.6
	 *
	 * @return boolean
	 */
	protected function needs_this_metabox() {
		if ( $this->post_id < 1 ) {
			return false;
		}

		$this->post = get_post( $this->post_id );
		if ( ! $this->post ) {
			return false;
		}

		if ( $this->post->post_type !== $this->config->restrict['post_type'] ) {
			return false;
		}

		if ( $this->post->post_parent < 1 ) {
			return false;
		}

		$parent_slug = get_post( $this->post->post_parent )->post_name;

		return $parent_slug === $this->config->restrict['parent_slug'];
	}

	/**
	 * Extending metabox class adds code here to run
	 * after the nonce check but before data cleanup.
	 *
	 * @since 1.1.6
	 *
	 * @param integer $post_id Post ID.
	 * @param stdClass $post Post object.
	 *
	 * @return void
	 */
	protected function pre_save( $post_id, $post ) {
		$this->total_videos  = 0;
		$this->total_runtime = '';

		$post_ids = explode( ',', $_POST['_labsinseries'] );
		if ( ! $post_ids ) {
			return;
		}

		foreach ( $post_ids as $post_id ) {
			$this->add_video_totals( (int) $post_id );
			$this->sum_video_runtime_totals( (int) $post_id );
		}

		$_POST['_number_of_labs_in_series']   = count( $post_ids );
		$_POST['_number_of_videos_in_series'] = $this->total_videos;
		$_POST['_series_video_runtime']       = $this->convert_total_runtime();
	}

	/**
	 * Sum the total totals.
	 *
	 * @since 1.1.6
	 *
	 * @param int $post_id
	 *
	 * @return void
	 */
	protected function add_video_totals( $post_id ) {
		$this->total_videos += (int) get_post_meta( $post_id, '_number_of_videos', true );
	}

	/**
	 * Sum the lab runtime totals.
	 *
	 * @since 1.1.6
	 *
	 * @param $post_id
	 *
	 * @return void
	 */
	protected function sum_video_runtime_totals( $post_id ) {
		$lab_runtime = (string) get_post_meta( $post_id, '_video_runtime', true );
		if ( ! $lab_runtime ) {
			return;
		}

		$carbon = $this->convert_time_into_carbon_instance( $lab_runtime );

		if ( ! $this->total_runtime ) {
			$this->total_runtime = $carbon;
			return;
		}

		$this->total_runtime
			->addHours( $carbon->hour )
			->addMinutes( $carbon->minute )
			->addSeconds( $carbon->second );
	}

	/**
	 * Conver the total runtime into string.
	 *
	 * @since 1.1.6
	 *
	 * @return string
	 */
	protected function convert_total_runtime() {
		if ( ! $this->total_runtime ) {
			return '';
		}

		return $this->total_runtime->format('h:i:s');
	}



	/**
	 * Convert runtime into Carbon instance.
	 *
	 * @since 1.1.6
	 *
	 * @param string $time
	 *
	 * @return Carbon
	 */
	protected function convert_time_into_carbon_instance( $time ) {
		$formatted_time = $this->format_runtime_metadata( $time );
		list( $hours, $minutes, $seconds ) = explode( ':', $formatted_time );

		return Carbon::createFromTime( $hours, $minutes, $seconds,  'America/Chicago' );
	}

	/**
	 * Format the runtime metadata into hh:mm:ss.
	 *
	 * @since 1.1.6
	 *
	 * @param string $time
	 *
	 * @return string
	 */
	protected function format_runtime_metadata( $time ) {
		$number_of_colons = substr_count( $time, ':' );

		if ( $number_of_colons >= 2 ) {
			return $time;
		}

		if ( $number_of_colons == 1 ) {
			return '00:' . $time;
		}

		return '00:00:00';
	}
}
