<?php
/**
 * Coming Soon Metabox
 *
 * @package     Library\Admin\Metaboxe
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace UpTechLabs\CodeChallenges\Admin\Metaboxes;

add_action( 'admin_menu', __NAMESPACE__ . '\add_challenge_options_metabox' );
/**
 * Register a new meta box to the post or page edit screen.
 *
 * @since 1.0.0
 *
 * @retun void
 */
function add_challenge_options_metabox() {

	add_meta_box(
		'challenge_options_metabox',
		__( 'Code Challenge Options', 'challenges' ),
		__NAMESPACE__ . '\render_challenge_options_metabox',
		'challenge',
		'normal',
		'high'
	);
}

/**
 * Callback for Library Options Metabox
 *
 * @since 1.0.0
 *
 * @uses genesis_get_custom_field() Get custom field value.
 */
function render_challenge_options_metabox() {

	wp_nonce_field( 'ktc_code_challenges_options_save', 'ktc_code_challenges_options_nonce' );

	include( __DIR__ . '/views/metabox.php' );
}

add_action( 'save_post', __NAMESPACE__ . '\save_challenges_options', 1, 2 );
/**
 * Save the Library Options when we save a post or page.
 * 
 * @since 1.0.3
 *
 * @uses genesis_save_custom_fields() Perform checks and saves post meta / custom field data to a post or page.
 *
 * @param integer $post_id Post ID.
 * @param stdClass $post Post object.
 *
 * @return mixed Returns post id if permissions incorrect, null if doing autosave, ajax or future post, false if update
 *               or delete failed, and true on success.
 */
function save_challenges_options( $post_id, $post ) {

	if ( ! isset( $_POST['code_challenges'] ) ) {
		return;
	}

	$defaults = array(
		'_is_code_challenge_task'  => 0,
		'_video_runtime'    => '',
		'_number_of_videos' => 0,
	);

	$data = wp_parse_args( $_POST['code_challenges'], $defaults );

	foreach( $data as $key => $value ) {
		$data[ $key ] = is_numeric( $value ) ? (int) $value : strip_tags( $value );
	}

	genesis_save_custom_fields( $data, 'ktc_code_challenges_options_save', 'ktc_code_challenges_options_nonce', $post );
}
