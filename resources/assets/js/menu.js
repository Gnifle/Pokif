var PokifMenu = (function() {
	
	/**
	 * Internal flag for whether the menu was initialized or not
	 * @type {boolean}
	 * @private
	 */
	var _initialized = false;
	
	/**
	 * Internal flag for whether the menu is currently open or closed
	 * @type {string}
	 * @private
	 */
	var _state;
	
	/**
	 * Collection of containers used for the menu
	 * @type {object}
	 * @private
	 */
	var _containers;
	
	/**
	 * Collection of arguments (widths, heights, etc.) used for the menu
	 * @type {object}
	 * @private
	 */
	var _args;
	
	/**
	 * Initializes the menu
	 */
	var init = function() {
		
		if( true === _initialized ) {
			console.info( 'PokifMenu already initialized. No actions were performed.' );
			return;
		}
		
		_initialized = true;
		_state = 'closed';
		_containers = _populateContainers();
		_args = _populateArgs();
		
		_resizeMenu();
		_registerEventListeners();
	};
	
	/**
	 * Opens the menu
	 * @returns string The new internal state of the menu
	 */
	var open = function() {
		
		//if( !isAnimating() ) {
		//
		//	_containers.main.velocity( {
		//		left: _args.menuWidth,
		//	}, {
		//		duration: _args.animationDuration
		//	} );
		//
		//	return _setState( 'open' );
		//}
		//
		//return _state;
		
		return _trigger( 'open' );
	};
	
	/**
	 * Closes the menu
	 * @returns {string} The new internal state of the menu
	 */
	var close = function() {
		
		//if( !isAnimating() ) {
		//
		//	_containers.main.velocity( {
		//		left: 0
		//	}, {
		//		duration: _args.animationDuration
		//	} );
		//
		//	return _setState( 'closed' );
		//}
		//
		//return _state;
		
		return _trigger( 'closed' );
	};
	
	/**
	 * Toggles the menu
	 * @returns {string} The new internal state of the menu
	 */
	var toggle = function() {
		
		if( 'open' === _state ) {
			return _trigger( 'closed' );
		}
		
		return _trigger( 'open' );
	};
	
	var _trigger = function( state ) {
		
		if( 'open' !== state && 'closed' !== state ) {
			return _state;
		}
		
		if( !isAnimating() ) {
			
			_containers.main.velocity( {
				left: 'open' === state ? _args.menuWidth : 0,
			}, {
				duration: _args.animationDuration
			} );
		}
		
		return _state = _setState( state );
	};
	
	/**
	 * Register event listeners for the menu
	 * @private
	 */
	var _registerEventListeners = function() {
		
		$( window ).on( 'resize', _handleWindowResize );
		
		_containers.toggle.on( 'click', toggle );
		
		_containers.main.swipe( {
			allowPageScroll: 'vertical',
			swipe:           function( event, direction, distance, duration, fingerCount, fingerData ) {
				
				switch( direction ) {
					
					case 'left':
						close();
						break;
					
					case 'right':
						open();
						break;
					
					default:
						break;
				}
			}
		} );
	};
	
	/**
	 * Resizes the menu
	 * @private
	 */
	var _resizeMenu = function() {
		
	};
	
	/**
	 * Performs all necessary actions on window resize
	 * @private
	 */
	var _handleWindowResize = function() {
		
		_args = _populateArgs();
		_resizeMenu();
		
		if( 'open' === _state ) {
			
			_containers.main.velocity( {
				left: _args.menuWidth
			}, {
				duration: 0
			} );
		}
	};
	
	var _calculateMenuWidth = function() {
		
		return $( '#menu' ).width();
	};
	
	var _calculateMenuHeight = function() {
		
		return $( '#menu' ).height();
	};
	
	var _populateContainers = function() {
		
		return {
			page:    $( '#page' ),
			header:  $( '#page > header' ),
			main:    $( '#main' ),
			content: $( '#content' ),
			menu:    $( '#menu' ),
			toggle:  $( '#resp-menu-toggle' ),
			footer:  $( '#page > footer' )
		};
	};
	
	var _populateArgs = function() {
		
		return {
			animationDuration: 250,
			menuWidth:         _calculateMenuWidth(),
			menuHeight:        _calculateMenuHeight()
		};
	};
	
	/**
	 * Determines whether the menu is currently animating or not
	 * @returns {boolean}
	 */
	var isAnimating = function() {
		
		return _containers.main.is( '.velocity-animating' );
	};
	
	/**
	 * Returns whether the menu has been initialized or not
	 * @returns {boolean}
	 */
	var getInitialized = function() {
		
		return _initialized;
	};
	
	/**
	 * Returns the current state of the menu, either 'open' or 'closed'
	 * @returns {string}
	 */
	var getState = function() {
		
		return _state;
	};
	
	/**
	 * Sets the internal state to either 'open' or 'closed'
	 *
	 * @param {(string|boolean)} state The state to set. Passing true or 'open' will set the state to 'open'. Otherwise, state will be set to 'closed'.
	 * @returns {string} The newly set state
	 * @private
	 */
	var _setState = function( state ) {
		
		if( true === state || 'open' === state ) {
			
			return _state = 'open';
		}
		
		return _state = 'closed';
	};
	
	return {
		init:        init,
		initialized: getInitialized,
		open:        open,
		close:       close,
		toggle:      toggle,
		state:       getState,
		isAnimating: isAnimating
	};
})();

$( document ).ready( function() {
	
	PokifMenu.init();
	
} );