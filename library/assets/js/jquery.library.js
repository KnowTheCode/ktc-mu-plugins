/**
 * Library JavaScript handling.  This script handles opening/closing of the questions and answers,
 * toggling of the icon handle, and setting of the class states.
 *
 * @package     Library
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://knowthcode.io
 * @license     GNU General Public License 2.0+
 */
;(function ($, window, document, undefined) {
	'use strict'

	function init() {
		initVideos();
	}

	function initVideos() {
		$( '.embed-vimeo' ).fitVids();
	}

	$(document).ready(function () {
		init();
	});

}(jQuery, window, document));