<?php
/**
 * Must-Use Plugins autoloader and launcher. Vroom!
 *
 * @package     KnowTheCode
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://knowthecode.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode;

// Load and launch Fulcrum first.
require_once 'fulcrum/bootstrap.php';
$fulcrum = \Fulcrum\launch();

include_once 'bbpress/bootstrap.php';

$fulcrum_plugins = array(
	'\UpTechLabs\FulcrumSite\launch'      => 'fulcrum-site/bootstrap.php',
	'\KnowTheCode\Docx\launch'            => 'docx/bootstrap.php',
	'\Library\launch'                     => 'library/bootstrap.php',
	'\KnowTheCode\AskTonyaPodcast\launch' => 'ask-tonya-podcast/bootstrap.php',
	'\KnowTheCode\UserHistory\launch'     => 'user-history/bootstrap.php',
//	'\Partners\launch'                    => 'partners/bootstrap.php',
	'\Quips\launch'                       => 'quips/bootstrap.php',
	'\UpTechLabs\HelpCenter\launch'       => 'help-center/bootstrap.php',
	'\KnowTheCode\Marketing\launch'       => 'marketing/bootstrap.php',
);

foreach ( $fulcrum_plugins as $function_name => $boostrap_filename ) {
	require_once $boostrap_filename;
	$function_name( $fulcrum );
}

require_once 'memberpress/bootstrap.php';

/**
 * Fire event to alert all add-ons the plugins are loaded.
 */
do_action( 'fulcrum_all_must_use_plugins_loaded', $fulcrum );

/**
 * Disable the adspot shortcode.
 */
add_shortcode( 'adspot', '__return_empty_string' );
