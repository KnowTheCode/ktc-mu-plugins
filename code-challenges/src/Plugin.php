<?php
/**
 * Description
 *
 * @package     UpTechLabs\SocialGenesisSEO
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GPL-2.0+
 */
namespace UpTechLabs\SocialGenesisSEO;

use UpTechLabs\SocialGenesisSEO\Admin\Metabox;

class Plugin {

	public function init() {
//		add_action( 'genesis_meta', array( $this, 'launch' ), 900 );
		add_action( 'genesis_admin_menu', array( $this, 'register_our_metabox' ), 9999 );
	}

	public function register_our_metabox() {
		if ( ! is_admin() ) {
			return;
		}

		$config = SOCIALGENESISSEO_PLUGIN_DIR . 'config/settings-metabox.php';
		global $_genesis_seo_settings_pagehook;
		$config['page_hook'] = $_genesis_seo_settings_pagehook;

		new Metabox( $config );
	}

	public function launch() {
		$config     = require_once( SOCIALGENESISSEO_PLUGIN_DIR . 'config/social-seo.php' );
		new SocialSEO( $config );
	}
}
