<?php
/**
 * Help Center Helper Functions
 *
 * @package     UpTechLabs\HelpCenter\Support
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

/**
 * Checks if the current web page request is for the Help Center.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function is_help_center_page() {
	return is_post_type_archive( 'help-center' ) || is_singular( 'help-center' );
}