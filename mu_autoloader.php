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
 * Version:         1.0.2
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

do_action( 'fulcrum_all_must_use_plugins_loaded', $fulcrum );
