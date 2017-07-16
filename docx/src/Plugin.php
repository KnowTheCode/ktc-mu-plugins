<?php
/**
 * Docx Plugin
 *
 * @package     KnowTheCode\Docx
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace KnowTheCode\Docx;

use Fulcrum\Addon\Addon;

class Plugin extends Addon {

	/**
	 * The plugin's version
	 *
	 * @var string
	 */
	const VERSION = '1.0.0';

	/**
	 * The plugin's minimum WordPress requirement
	 *
	 * @var string
	 */
	const MIN_WP_VERSION = '4.5';

	/**
	 * Initialize this plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	protected function init_addon() {
		parent::init_addon();

		if ( ! is_admin() ) {
			return;
		}

		add_action( 'fulcrum_init_rewrites', array( $this, 'add_rewrite_rules' ), 1 );
	}

	/**
	 * Add the rewrite rules for our custom permalink structure.
	 *
	 * We only want to run this upon plugin activation, meaning a flush_rewrite_rules
	 * is required.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function add_rewrite_rules() {
		foreach ( $this->config->post_types as $post_type => $slug ) {
			add_rewrite_rule(
				sprintf( "^%s/([^/]+)/([^/]+)/?", $slug ),
				sprintf( 'index.php?post_type=%s&technologies=$matches[1]&name=$matches[2]', $post_type ),
				'top'
			);

			add_rewrite_rule(
				sprintf( '^%s/([^/]+)/?', $slug ),
				sprintf( 'index.php?post_type=%s&technologies=$matches[1]', $post_type ),
				'top'
			);

			add_rewrite_rule(
				sprintf( '^%s/?', $slug ),
				sprintf( 'index.php?pagename=%s', $slug ),
				'top'
			);
		}
	}
}
