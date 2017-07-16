<?php
/**
 * Ajax Runtime Configuration
 *
 * @package     KnowTheCode\UserHistory
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\UserHistory;

return array(
	'nonce_key'   => 'ktc_user_history',
	'data_packet' => array(
		'id'             => 'intval',
		'post_id'        => 'intval',
		'activity_id'    => 'strip_tags',
		'video_id'       => 'strip_tags',
		'activity_state' => 'intval',
	),
);