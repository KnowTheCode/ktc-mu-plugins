/**
 * Hello Bar Handler
 *
 * @package     FulcrumSite
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
;(function ($, window, document, undefined) {
	'use strict'

	function init() {
		var $helloBar = $('.hello-bar');
		if ( typeof $helloBar == "undefined") {
			return false;
		}

		$(window).scroll(function(){
			if ($(this).scrollTop() > 50) {
				$helloBar.slideDown();
			} else {
				$helloBar.slideUp();
			}
		});
	}

	$(document).ready(function () {
		init();
	});

}(jQuery, window, document));