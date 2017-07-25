/**
 * Question and Answer Handler
 *
 * @package     KnowTheCode\FulcrumSite
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GNU-2.0+
 */
;(function ($, window, document, undefined) {
	'use strict'

	$(document).ready(function () {
		if ( typeof ktcScriptParameters === "object" ) {
			$('.qa--question').fulcrumQA( ktcScriptParameters.qa );
		}
	});

}(jQuery, window, document));