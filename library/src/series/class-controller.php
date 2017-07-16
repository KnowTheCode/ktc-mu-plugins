<?php
/**
 * Series Controller
 *
 * @package     Library\Episodes
 * @since       1.1.6
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */

namespace Library\Series;

use Fulcrum\Config\Config_Contract;
use Fulcrum\Fulcrum_Contract;
use Library\Episodes\Metadata\Factory;

class Controller {

	/**
	 * Instance of Fulcrum
	 *
	 * @var Fulcrum_Contract
	 */
	protected $fulcrum;

	/**
	 * Configuration parameters
	 *
	 * @var Config_Contract
	 */
	protected $config;

	/**
	 * Instance of this Controller
	 *
	 * @var
	 */
	private static $instance;

	protected $metadata;

	/***************
	 * Initializers
	 **************/

	/**
	 * Controller constructor.
	 *
	 * @since 1.1.6
	 *
	 * @param Fulcrum_Contract $fulcrum
	 * @param Config_Contract $config
	 */
	public function __construct( Fulcrum_Contract $fulcrum, Config_Contract $config ) {
		$this->fulcrum = $fulcrum;
		$this->config  = $config;

		$this->init_admin();

		self::$instance = $this;
	}

	/**
	 * Get the Instance of the Controller.
	 *
	 * @since 1.1.6
	 *
	 * @return Controller
	 */
	public static function getInstance() {
		return self::$instance;
	}

	/**
	 * Initialize the backend for the controller.
	 *
	 * @since 1.1.6
	 *
	 * @return void
	 */
	protected function init_admin() {
		if ( ! is_admin() ) {
			return;
		}

//		include( 'seed.php' );

		$this->fulcrum['options.metabox.series'];
	}
}
