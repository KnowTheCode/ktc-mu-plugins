<?php
/**
 * User History Listing Shortcode - Runtime Configuration Parameters
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
	'classname' => 'KnowTheCode\UserHistory\Shortcode\UserHistory',
	'config'    => array(
		'shortcode'     => 'user_history',
		'filterby_view' => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/filtering.php',
		'view'          => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/user-history-container.php',
		'row_view'      => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/user-history-list.php',
		'item_view'     => array(
			'default'      => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/user-history-item.php',
			'lab'          => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/user-history-lab.php',
			'embedded_lab' => USER_HISTORY_PLUGIN_DIR . 'src/Shortcode/views/user-history-embedded-lab.php',
		),
		'defaults'      => array(
			'id'            => '',
			'class'         => '',
			'actid'         => 1,
			'orderby'       => 'slug',
			'order'         => 'ASC',
			'per_page'      => 50,
			'none_found'    => __( 'Hum, we didn\'t find any for you.', 'user_history' ),
			'paged'         => 1,
			'show_filterby' => 1,
		),
	),
);
