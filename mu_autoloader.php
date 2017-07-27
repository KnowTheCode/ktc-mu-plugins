<?php
/**
 * KTC MU Plugins Loader
 *
 * @package         KnowTheCode
 * @author          hellofromTonya
 * @license         GPL-2.0+
 * @link            https://KnowTheCode.io
 *
 * @wordpress-plugin
 * Plugin Name:     KTC Must-User Plugins Loader
 * Plugin URI:      https://KnowTheCode.io
 * Description:     Loads all Must Use Plugins including Fulcrum, Fulcrum Site, Library, User History, Quips
 *
 * Version:         2.0.0
 * Author:          hellofromTonya
 * Author URI:      http://KnowTheCode.io
 * Text Domain:     ktc
 * Requires WP:     4.5
 * Requires PHP:    5.4
 */

namespace KnowTheCode;

include( 'fulcrum/bootstrap.php' );

$fulcrum = \Fulcrum\launch();

include( 'bbpress/bootstrap.php' );


$fulcrum_plugins = array(
	'\UpTechLabs\FulcrumSite\launch'      => 'fulcrum-site/bootstrap.php',
	'\KnowTheCode\Docx\launch'            => 'docx/bootstrap.php',
	'\Library\launch'                     => 'library/bootstrap.php',
	'\KnowTheCode\AskTonyaPodcast\launch' => 'ask-tonya-podcast/bootstrap.php',
	'\KnowTheCode\UserHistory\launch'     => 'user-history/bootstrap.php',
	'\Partners\launch'                    => 'partners/bootstrap.php',
	'\Quips\launch'                       => 'quips/bootstrap.php',
	'\UpTechLabs\HelpCenter\launch'       => 'help-center/bootstrap.php',
	'\KnowTheCode\Marketing\launch'       => 'marketing/bootstrap.php',
);

foreach ( $fulcrum_plugins as $function_name => $boostrap_filename ) {
	require_once( $boostrap_filename );
	$function_name( $fulcrum );
}

include_once( 'memberpress/bootstrap.php' );

include_once( 'better-asset-versioning/bootstrap.php' );

do_action( 'fulcrum_all_must_use_plugins_loaded', $fulcrum );

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );
/**
 * Enqueue the scripts
 *
 * @since 1.0.0
 */
function enqueue_assets() {
	$handle = 'ktc_scripts';

	wp_enqueue_script(
		$handle,
		plugin_dir_url( __FILE__ ) . 'assets/2.0.1/jquery.ktc.min.js',
		array( 'jquery' ),
		null,
		true
	);

	$params = array(
		'qa' => array(
			'iconEl'        => '.qa--icon',
			'iconClassname' => array(
				'open'  => 'fa-chevron-down',
				'close' => 'fa-chevron-up',
			),
		),
	);

	wp_localize_script( $handle, 'ktcScriptParameters', $params );
}

