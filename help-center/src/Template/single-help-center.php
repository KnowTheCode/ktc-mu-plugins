<?php
/**
 * Single Help Center Article Template
 *
 * @package     UpTechLabs\HelpCenter\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\HelpCenter\Template;

require_once( 'helpers.php' );

add_action( 'genesis_entry_content', __NAMESPACE__ . '\render_inpost_help', 12 );
function render_inpost_help() {
	include( 'views/inpost-nav.php' );
}

genesis();
