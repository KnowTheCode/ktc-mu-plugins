(function ( document, window ) {
	'use strict';

	const targets           = new Array(),
	      playbookContainer = document.getElementById( "playbook-container" ),
	      navNode           = document.getElementById( 'scrollspy-nav' );
	let scrollspy           = null,
	      scrollPosition    = 0;

	/**
	 * Initialize by:
	 *
	 * 1. Grabbing all of the target sections in the content.
	 * 2. Dynamically building each scrollspy nav items (based on the sections in the content).
	 * 3. Grabbing the complete scrollspy element (wait until the nav items are built).
	 */
	function init() {
		// Grab all of the targets.
		document.querySelectorAll( '.scrollspy-target' ).forEach( function ( elem, index ) {
			targets.push( {
				id: elem.id,
				pos: elem.offsetTop,
			} );
			buildNav( elem, index );
		} );

		// Now grab the scrollspy element.
		scrollspy = document.getElementById( "scrollspy" );
	}

	/**
	 * Build the Scrollspy Nav Items.
	 *
	 * @param contentElem
	 * @param index
	 */
	function buildNav( contentElem, index ) {
		const liNode = document.createElement( 'li' );
		const aNode  = document.createElement( 'a' );

		aNode.appendChild( document.createTextNode( contentElem.innerHTML ) );
		aNode.setAttribute( 'href', '#' + contentElem.id );

		if ( 0 === index ) {
			aNode.setAttribute( 'class', 'active' );
		}

		liNode.appendChild( aNode );
		navNode.appendChild( liNode );
	}

	/**
	 * Run scrollspy on scroll and window resize.
	 */
	function runScrollspy() {
		scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

		// On small screens, reset active and fixed position.
		if ( 900 > window.innerWidth ) {
			resetActive();
			return resetStyle();
		}

		// Set the active nav item.
		setActive();

		// Set the scrollspy's style.
		if ( scrollPosition < playbookContainer.offsetTop ) {
			resetStyle();
		} else {
			scrollspy.setAttribute( 'style', 'top:50px; position: fixed;' );
		}
	}

	/**
	 * Set the active nav item by adding an "active" class attribute.
	 */
	function setActive() {
		const activeId = findActiveTargetId();

		if ( activeId ) {
			resetActive();
			document.querySelector( '#scrollspy-nav li a[href*=' + activeId + ']' ).setAttribute( 'class', 'active' );
		}
	}

	function findActiveTargetId() {
		for ( let index = 0; index < targets.length; index ++ ) {
			if ( isInRange( index ) ) {
				return targets[index].id;
			}
		}
	}

	/**
	 * Check if the scroll position is within a targeted section.
	 *
	 * @param index
	 * @returns {boolean} returns true if this index is in range.
	 */
	function isInRange( index ) {
		// If the first section, check it.
		if ( 0 === index ) {
			return (
				targets[index].pos <= scrollPosition
				&&
				targets[index + 1].pos > scrollPosition
			);
		}

		// If the last section, check it.
		if ( index === (
			targets.length - 1
		) ) {
			return (
				targets[index].pos <= scrollPosition
			);
		}

		return (
			targets[index].pos <= scrollPosition
			&&
			targets[index + 1].pos > scrollPosition
		);
	}

	/**
	 * Reset the active nav item by removing the "active" class attribute.
	 */
	function resetActive() {
		const activeElems = document.querySelector( '.active' );

		if ( null === activeElems ) {
			return;
		}

		activeElems.setAttribute( 'class', '' );
	}

	/**
	 * Reset the scrollspy style attribute, i.e. removing the sticky styling.
	 */
	function resetStyle() {
		scrollspy.setAttribute( 'style', '' );
	}

	/**
	 * Onscroll - run scrollspy.
	 */
	window.onscroll = runScrollspy;


	/**
	 * Onscroll - run scrollspy.
	 */
	window.onresize = runScrollspy;

	/**
	 * Let's go.  Initialize on page load.
	 */
	init();

} )( document, window );
