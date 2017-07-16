<?php
/**
 * Runtime configuration parameters
 *
 * @package     KnowTheCode\UserHistory\View
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\UserHistory\View;

return array(
	'has_record_class' => ' active',
	'activities'       => array(
		'fav'     => 1,
		'keep'    => 2,
		'watched' => 3,
		'later'   => 4,
	),
	'text'             => array(
		'fav'     => array(
			__( 'Save as Favorite', 'user_history' ),
			__( 'Favorite', 'user_history' ),
		),
		'keep'    => array(
			__( 'Keep', 'user_history' ),
			__( 'Kept', 'user_history' ),
		),
		'watched' => array(
			__( 'Save as Watched', 'user_history' ),
			__( 'Watched', 'user_history' ),
		),
		'later'   => array(
			__( 'Watch Later', 'user_history' ),
			__( 'Watching Later', 'user_history' ),
		),
	),
	'view'             => USER_HISTORY_PLUGIN_DIR . 'src/View/footer.php',
);