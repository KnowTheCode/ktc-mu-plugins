<?php
/**
 * User History Database Schema
 *
 * @package     KnowTheCode\UserHistory\Database
 * @since       2.0.0
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace KnowTheCode\UserHistory\Database;

return array(
	'tablename'            => 'user_history',
	'per_page'             => 50,
	'sql_as_name'          => 'uh',
	'primary_key'          => 'id',
	'unique_columns'       => array( 'id' ),
	'cache_group'          => 'user_history',
	'guarded'              => array( 'id', 'date_created', 'date_updated', ),
	'cache_group'          => 'ktc_user_history',
	'data_maybe_has_array' => false,
	'columns_config'       => array(
		'id'          => array(
			'is_array' => false,
			'filter'   => 'intval',
			'format'   => '%d',
			'default'  => null,
		),
		'user_id'     => array(
			'is_array' => false,
			'filter'   => 'intval',
			'format'   => '%d',
			'default'  => null,
		),
		'post_id'     => array(
			'is_array' => false,
			'filter'   => 'intval',
			'format'   => '%d',
			'default'  => null,
		),
		'activity_id' => array(
			'is_array' => false,
			'filter'   => 'intval',
			'format'   => '%d',
			'default'  => null,
		),
		'video_id'    => array(
			'is_array' => false,
			'filter'   => 'strip_tags',
			'format'   => '%s',
			'default'  => null,
		),

		'activity_state' => array(
			'is_array' => false,
			'filter'   => 'intval',
			'format'   => '%d',
			'default'  => null,
		),
		'date_created'   => array(
			'is_array' => false,
			'filter'   => 'strip_tags',
			'format'   => '%s',
			'default'  => '0000-00-00 00:00:00',
		),
		'date_updated'   => array(
			'is_array' => false,
			'filter'   => 'strip_tags',
			'format'   => '%s',
			'default'  => '0000-00-00 00:00:00',
		),
	),
	'formats'              => array(
		'id'             => '%d',
		'user_id'        => '%d',
		'post_id'        => '%d',
		'activity_id'    => '%d',
		'video_id'       => '%s',
		'activity_state' => '%d',
		'date_created'   => '%s',
		'date_updated'   => '%s',
	),
	'save_update_formats'  => array(
		'%d',
		'%d',
		'%d',
		'%s',
		'%d',
		'%s',
		'%s',
	),
	'filterby'             => array(),
);