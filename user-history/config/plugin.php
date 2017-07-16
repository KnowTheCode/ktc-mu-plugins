<?php
/**
 * User History Plugin Runtime Configuration Parameters.
 *
 * @package     KnowTheCode\UserHistory
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\UserHistory;

use Fulcrum\Config\Config;
use Fulcrum\Foundation\Pagination\Pagination;
use KnowTheCode\UserHistory\Admin\Metabox\UserHistoryMetabox;
use KnowTheCode\UserHistory\Database\DbHelpers;
use KnowTheCode\UserHistory\View\ViewBuilder;

return array(
	'per_page' => 10,

	/****************************
	 * Service Providers
	 ****************************/

	'service_providers' => array(

		'script.user_history'    => array(
			'provider' => 'provider.asset',
			'config'   => USER_HISTORY_PLUGIN_DIR . 'config/asset/script.php',
		),

		/****************************
		 * Shortcodes
		 ****************************/
		'shortcode.user_history' => array(
			'provider' => 'provider.shortcode',
			'config'   => USER_HISTORY_PLUGIN_DIR . 'config/shortcode/user-history.php',
		),
		'shortcode.last_viewed' => array(
			'provider' => 'provider.shortcode',
			'config'   => USER_HISTORY_PLUGIN_DIR . 'config/shortcode/last-viewed.php',
		),
	),

	/****************************
	 * Admin Service Providers
	 ****************************/

	'admin_service_providers' => array(
		'schema.user_history' => array(
			'provider' => 'provider.schema',
			'config'   => USER_HISTORY_PLUGIN_DIR . 'config/database/schema.php',
		),
	),

	/****************************
	 * Concretes
	 ****************************/

	'register_concretes' => array(
		'ajax.user_history'         => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Ajax(
					new Config( USER_HISTORY_PLUGIN_DIR . 'config/ajax.php' ),
					$container
				);
			}
		),
		'pagination'                => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new Pagination();
			}
		),
		'db_helpers.user_history'   => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new DbHelpers(
					new Config( USER_HISTORY_PLUGIN_DIR . 'config/database/db-helpers.php' )
				);
			}
		),
		'view_builder.user_history' => array(
			'autoload' => false,
			'concrete' => function ( $container ) {
				return new ViewBuilder(
					new Config( USER_HISTORY_PLUGIN_DIR . 'config/views/view-builder.php' ),
					$container['user_history']
				);
			}
		),
//		'metabox.user_history'      => array(
//			'autoload' => true,
//			'concrete' => function ( $container ) {
//				return new UserHistoryMetabox(
//					new Config( USER_HISTORY_PLUGIN_DIR . 'config/admin/metabox/user-history-metabox.php' )
//				);
//			}
//		),
	),
);

