<?php

/**
 * Template runtime configuration parameters.
 *
 * @package     KnowtheCode\AskTonyaPodcast\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowtheCode\AskTonyaPodcast\Template;

return array(
	'autoload' => true,
	'config'   => array(
		'template_folder_path' => ASKTONYA_PLUGIN_DIR . 'src/Template/',
		'post_type'            => 'asktonya',
		'use_single'           => true,
		'use_archive'          => true,
		'use_category'         => false,
		'tax'                  => 'labs_technologies',
		'use_tax'              => true,
		'use_tag'              => false,
		'use_page_templates'   => false,
		'templates'            => array(),
	),
);
