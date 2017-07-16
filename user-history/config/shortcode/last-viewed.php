<?php
/**
 * Last Viewed - Runtime Configuration Parameters
 *
 * @package     KnowTheCode\UserHistory\Shortcode
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\UserHistory\Shortcode;

return array(
	'autoload'  => true,
	'classname' => 'KnowTheCode\UserHistory\Shortcode\LastViewed',
	'config'    => array(
		'shortcode' => 'last_viewed',
		'view'      => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/last-viewed.php',
		'item_view'     => array(
			'default'      => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/user-history-item.php',
			'lab'          => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/user-history-lab.php',
			'embedded_lab' => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/user-history-embedded-lab.php',
		),
		'defaults'  => array(
			'class'      => '',
			'post_types' => array( 'post', 'lab', 'docx' ),
		),
	),
);
