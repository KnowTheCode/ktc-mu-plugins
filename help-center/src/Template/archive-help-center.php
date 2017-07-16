<?php
/**
 * Help Center Archive Template
 *
 * @package     UpTechLabs\HelpCenter\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\HelpCenter\Template;

require_once( 'helpers.php' );

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', __NAMESPACE__ . '\render_help_center' );
/**
 * Render the answer content.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_help_center() {
	require_once( 'views/archive.php' );
}

genesis();
