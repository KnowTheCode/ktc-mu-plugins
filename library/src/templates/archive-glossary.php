<?php
/**
 * Glossary Archive page template.
 *
 * @package     Library
 * @since       1.0.3
 * @author      hellofromTonya
 * @link        https://KnowTheCode.io
 * @license     GPL-2.0+
 */

namespace Library;

add_action( 'genesis_meta', __NAMESPACE__ . '\unregister_events' );
/**
 * Unregister events.
 *
 * @since 1.0.3
 *
 * @return void
 */
function unregister_events() {
	remove_action( 'genesis_loop', 'genesis_do_loop' );
	remove_filter( 'post_class', 'genesis_entry_post_class' );
}

add_action( 'genesis_loop', __NAMESPACE__ . '\do_glossary_loop' );
/**
 * Render out the loop by showing the glossary items in a <dl> list
 *
 * @since 1.0.3
 *
 * @return void
 */
function do_glossary_loop() {
	if ( have_posts() ) :
		do_action( 'genesis_before_while' );

		include( 'views/glossary.php' );

		do_action( 'genesis_after_endwhile' );

	else : //* if no posts exist
		do_action( 'genesis_loop_else' );
	endif; //* end loop
}

genesis();
