<?php
/**
 * Help Center Template Functions
 *
 * @package     UpTechLabs\HelpCenter\Template
 * @since       1.0.0
 * @author      hellofromTonya
 * @link        https://UpTechLabs.io
 * @license     GNU General Public License 2.0+
 */
namespace UpTechLabs\HelpCenter\Template;

require_once( HELPCENTER_PLUGIN_DIR . 'src/Support/helpers.php' );

use UpTechLabs\HelpCenter\Plugin;
use UpTechLabs\HelpCenter\Support as support;

add_action( 'genesis_meta', __NAMESPACE__ . '\setup_help_center_template', 50 );
/**
 * Description.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_help_center_template() {
	add_filter( 'body_class', __NAMESPACE__ . '\add_body_class' );

	add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets' );

//	remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
//	add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_breadcrumbs' );

	add_action( 'genesis_after_header', __NAMESPACE__ . '\render_subnav' );
}

/**
 * Add to the body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes
 *
 * @return array
 */
function add_body_class( array $classes ) {
	$classes[] = 'help-center';

	return $classes;
}

/**
 * Enqueue the specific assets for this template, as there's no load it on every
 * single page.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_assets() {
	wp_enqueue_style( 'help_center_css', CHILD_URL . '/assets/dist/css/help-center.min.css', array(), Plugin::VERSION );
}

/**
 * Render the subnav menu.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_subnav() {
	require_once( 'views/subnav.php' );
}

function render_group_boxes() {
	$topic_groups = support\get_topic_groups();
	if ( $topic_groups === false ) {
		return _e( 'Whoopsie, something went wrong on our way to grab all of the Help Center topics', 'help_center' );
	}

	require_once( 'views/group-boxes.php' );
}

/**
 * Renders the topics.
 *
 * @since 1.0.0
 *
 * @return void
 */
function render_topics() {
	$topic_groups = support\get_topic_groups();
	if ( $topic_groups === false ) {
		return _e( 'Whoopsie, something went wrong on our way to grab all of the Help Center topics', 'help_center' );
	}

	foreach ( $topic_groups as $term_id => $topic_group ) {
		if ( $term_id < 1 || ! $topic_group ) {
			continue;
		}
		$topics = $topic_group['posts'];
		require( 'views/group.php' );
	}
}

/**
 * Render the topic.
 *
 * @since 1.0.0
 *
 * @param int $term_id
 * @param array $topic_group
 *
 * @return void
 */
function render_topic( $term_id, array $topics ) {

	foreach ( $topics as $post_id => $topic ) {
		$post_id = (int) $post_id;
		if ( $post_id < 1 ) {
			continue;
		}

		$post_url = get_permalink( $post_id );

		require( 'views/topic.php' );
	}
}