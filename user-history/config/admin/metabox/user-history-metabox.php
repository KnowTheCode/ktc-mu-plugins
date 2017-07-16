<?php
/**
 * Runtime configuration parameters for the metabox
 *
 * @package     KnowTheCode\UserHistory\Admin\Metabox
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */
namespace KnowTheCode\UserHistory\Admin\Metabox;

return array(
	'db_tablename' => 'user_history_video_titles',
	'nonce_key'    => 'ktc_user_history_nonce',
	'save_key'     => 'ktc_user_history_save',
	'view'         => USER_HISTORY_PLUGIN_DIR . 'src/Admin/Metabox/views/user-history-metabox.php',
	'post_types'   => array(
		'post',
		'page',
		'lab',
		'docx',
	),
);