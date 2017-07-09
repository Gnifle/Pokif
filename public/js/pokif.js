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
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm1lbnUuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EiLCJmaWxlIjoicG9raWYuanMiLCJzb3VyY2VzQ29udGVudCI6WyJ2YXIgUG9raWZNZW51ID0gKGZ1bmN0aW9uKCkge1xyXG5cdFxyXG5cdC8qKlxyXG5cdCAqIEludGVybmFsIGZsYWcgZm9yIHdoZXRoZXIgdGhlIG1lbnUgd2FzIGluaXRpYWxpemVkIG9yIG5vdFxyXG5cdCAqIEB0eXBlIHtib29sZWFufVxyXG5cdCAqIEBwcml2YXRlXHJcblx0ICovXHJcblx0dmFyIF9pbml0aWFsaXplZCA9IGZhbHNlO1xyXG5cdFxyXG5cdC8qKlxyXG5cdCAqIEludGVybmFsIGZsYWcgZm9yIHdoZXRoZXIgdGhlIG1lbnUgaXMgY3VycmVudGx5IG9wZW4gb3IgY2xvc2VkXHJcblx0ICogQHR5cGUge3N0cmluZ31cclxuXHQgKiBAcHJpdmF0ZVxyXG5cdCAqL1xyXG5cdHZhciBfc3RhdGU7XHJcblx0XHJcblx0LyoqXHJcblx0ICogQ29sbGVjdGlvbiBvZiBjb250YWluZXJzIHVzZWQgZm9yIHRoZSBtZW51XHJcblx0ICogQHR5cGUge29iamVjdH1cclxuXHQgKiBAcHJpdmF0ZVxyXG5cdCAqL1xyXG5cdHZhciBfY29udGFpbmVycztcclxuXHRcclxuXHQvKipcclxuXHQgKiBDb2xsZWN0aW9uIG9mIGFyZ3VtZW50cyAod2lkdGhzLCBoZWlnaHRzLCBldGMuKSB1c2VkIGZvciB0aGUgbWVudVxyXG5cdCAqIEB0eXBlIHtvYmplY3R9XHJcblx0ICogQHByaXZhdGVcclxuXHQgKi9cclxuXHR2YXIgX2FyZ3M7XHJcblx0XHJcblx0LyoqXHJcblx0ICogSW5pdGlhbGl6ZXMgdGhlIG1lbnVcclxuXHQgKi9cclxuXHR2YXIgaW5pdCA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0XHJcblx0XHRpZiggdHJ1ZSA9PT0gX2luaXRpYWxpemVkICkge1xyXG5cdFx0XHRjb25zb2xlLmluZm8oICdQb2tpZk1lbnUgYWxyZWFkeSBpbml0aWFsaXplZC4gTm8gYWN0aW9ucyB3ZXJlIHBlcmZvcm1lZC4nICk7XHJcblx0XHRcdHJldHVybjtcclxuXHRcdH1cclxuXHRcdFxyXG5cdFx0X2luaXRpYWxpemVkID0gdHJ1ZTtcclxuXHRcdF9zdGF0ZSA9ICdjbG9zZWQnO1xyXG5cdFx0X2NvbnRhaW5lcnMgPSBfcG9wdWxhdGVDb250YWluZXJzKCk7XHJcblx0XHRfYXJncyA9IF9wb3B1bGF0ZUFyZ3MoKTtcclxuXHRcdFxyXG5cdFx0X3Jlc2l6ZU1lbnUoKTtcclxuXHRcdF9yZWdpc3RlckV2ZW50TGlzdGVuZXJzKCk7XHJcblx0fTtcclxuXHRcclxuXHQvKipcclxuXHQgKiBPcGVucyB0aGUgbWVudVxyXG5cdCAqIEByZXR1cm5zIHN0cmluZyBUaGUgbmV3IGludGVybmFsIHN0YXRlIG9mIHRoZSBtZW51XHJcblx0ICovXHJcblx0dmFyIG9wZW4gPSBmdW5jdGlvbigpIHtcclxuXHRcdFxyXG5cdFx0Ly9pZiggIWlzQW5pbWF0aW5nKCkgKSB7XHJcblx0XHQvL1xyXG5cdFx0Ly9cdF9jb250YWluZXJzLm1haW4udmVsb2NpdHkoIHtcclxuXHRcdC8vXHRcdGxlZnQ6IF9hcmdzLm1lbnVXaWR0aCxcclxuXHRcdC8vXHR9LCB7XHJcblx0XHQvL1x0XHRkdXJhdGlvbjogX2FyZ3MuYW5pbWF0aW9uRHVyYXRpb25cclxuXHRcdC8vXHR9ICk7XHJcblx0XHQvL1xyXG5cdFx0Ly9cdHJldHVybiBfc2V0U3RhdGUoICdvcGVuJyApO1xyXG5cdFx0Ly99XHJcblx0XHQvL1xyXG5cdFx0Ly9yZXR1cm4gX3N0YXRlO1xyXG5cdFx0XHJcblx0XHRyZXR1cm4gX3RyaWdnZXIoICdvcGVuJyApO1xyXG5cdH07XHJcblx0XHJcblx0LyoqXHJcblx0ICogQ2xvc2VzIHRoZSBtZW51XHJcblx0ICogQHJldHVybnMge3N0cmluZ30gVGhlIG5ldyBpbnRlcm5hbCBzdGF0ZSBvZiB0aGUgbWVudVxyXG5cdCAqL1xyXG5cdHZhciBjbG9zZSA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0XHJcblx0XHQvL2lmKCAhaXNBbmltYXRpbmcoKSApIHtcclxuXHRcdC8vXHJcblx0XHQvL1x0X2NvbnRhaW5lcnMubWFpbi52ZWxvY2l0eSgge1xyXG5cdFx0Ly9cdFx0bGVmdDogMFxyXG5cdFx0Ly9cdH0sIHtcclxuXHRcdC8vXHRcdGR1cmF0aW9uOiBfYXJncy5hbmltYXRpb25EdXJhdGlvblxyXG5cdFx0Ly9cdH0gKTtcclxuXHRcdC8vXHJcblx0XHQvL1x0cmV0dXJuIF9zZXRTdGF0ZSggJ2Nsb3NlZCcgKTtcclxuXHRcdC8vfVxyXG5cdFx0Ly9cclxuXHRcdC8vcmV0dXJuIF9zdGF0ZTtcclxuXHRcdFxyXG5cdFx0cmV0dXJuIF90cmlnZ2VyKCAnY2xvc2VkJyApO1xyXG5cdH07XHJcblx0XHJcblx0LyoqXHJcblx0ICogVG9nZ2xlcyB0aGUgbWVudVxyXG5cdCAqIEByZXR1cm5zIHtzdHJpbmd9IFRoZSBuZXcgaW50ZXJuYWwgc3RhdGUgb2YgdGhlIG1lbnVcclxuXHQgKi9cclxuXHR2YXIgdG9nZ2xlID0gZnVuY3Rpb24oKSB7XHJcblx0XHRcclxuXHRcdGlmKCAnb3BlbicgPT09IF9zdGF0ZSApIHtcclxuXHRcdFx0cmV0dXJuIF90cmlnZ2VyKCAnY2xvc2VkJyApO1xyXG5cdFx0fVxyXG5cdFx0XHJcblx0XHRyZXR1cm4gX3RyaWdnZXIoICdvcGVuJyApO1xyXG5cdH07XHJcblx0XHJcblx0dmFyIF90cmlnZ2VyID0gZnVuY3Rpb24oIHN0YXRlICkge1xyXG5cdFx0XHJcblx0XHRpZiggJ29wZW4nICE9PSBzdGF0ZSAmJiAnY2xvc2VkJyAhPT0gc3RhdGUgKSB7XHJcblx0XHRcdHJldHVybiBfc3RhdGU7XHJcblx0XHR9XHJcblx0XHRcclxuXHRcdGlmKCAhaXNBbmltYXRpbmcoKSApIHtcclxuXHRcdFx0XHJcblx0XHRcdF9jb250YWluZXJzLm1haW4udmVsb2NpdHkoIHtcclxuXHRcdFx0XHRsZWZ0OiAnb3BlbicgPT09IHN0YXRlID8gX2FyZ3MubWVudVdpZHRoIDogMCxcclxuXHRcdFx0fSwge1xyXG5cdFx0XHRcdGR1cmF0aW9uOiBfYXJncy5hbmltYXRpb25EdXJhdGlvblxyXG5cdFx0XHR9ICk7XHJcblx0XHR9XHJcblx0XHRcclxuXHRcdHJldHVybiBfc3RhdGUgPSBfc2V0U3RhdGUoIHN0YXRlICk7XHJcblx0fTtcclxuXHRcclxuXHQvKipcclxuXHQgKiBSZWdpc3RlciBldmVudCBsaXN0ZW5lcnMgZm9yIHRoZSBtZW51XHJcblx0ICogQHByaXZhdGVcclxuXHQgKi9cclxuXHR2YXIgX3JlZ2lzdGVyRXZlbnRMaXN0ZW5lcnMgPSBmdW5jdGlvbigpIHtcclxuXHRcdFxyXG5cdFx0JCggd2luZG93ICkub24oICdyZXNpemUnLCBfaGFuZGxlV2luZG93UmVzaXplICk7XHJcblx0XHRcclxuXHRcdF9jb250YWluZXJzLnRvZ2dsZS5vbiggJ2NsaWNrJywgdG9nZ2xlICk7XHJcblx0XHRcclxuXHRcdF9jb250YWluZXJzLm1haW4uc3dpcGUoIHtcclxuXHRcdFx0YWxsb3dQYWdlU2Nyb2xsOiAndmVydGljYWwnLFxyXG5cdFx0XHRzd2lwZTogICAgICAgICAgIGZ1bmN0aW9uKCBldmVudCwgZGlyZWN0aW9uLCBkaXN0YW5jZSwgZHVyYXRpb24sIGZpbmdlckNvdW50LCBmaW5nZXJEYXRhICkge1xyXG5cdFx0XHRcdFxyXG5cdFx0XHRcdHN3aXRjaCggZGlyZWN0aW9uICkge1xyXG5cdFx0XHRcdFx0XHJcblx0XHRcdFx0XHRjYXNlICdsZWZ0JzpcclxuXHRcdFx0XHRcdFx0Y2xvc2UoKTtcclxuXHRcdFx0XHRcdFx0YnJlYWs7XHJcblx0XHRcdFx0XHRcclxuXHRcdFx0XHRcdGNhc2UgJ3JpZ2h0JzpcclxuXHRcdFx0XHRcdFx0b3BlbigpO1xyXG5cdFx0XHRcdFx0XHRicmVhaztcclxuXHRcdFx0XHRcdFxyXG5cdFx0XHRcdFx0ZGVmYXVsdDpcclxuXHRcdFx0XHRcdFx0YnJlYWs7XHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9XHJcblx0XHR9ICk7XHJcblx0fTtcclxuXHRcclxuXHQvKipcclxuXHQgKiBSZXNpemVzIHRoZSBtZW51XHJcblx0ICogQHByaXZhdGVcclxuXHQgKi9cclxuXHR2YXIgX3Jlc2l6ZU1lbnUgPSBmdW5jdGlvbigpIHtcclxuXHRcdFxyXG5cdH07XHJcblx0XHJcblx0LyoqXHJcblx0ICogUGVyZm9ybXMgYWxsIG5lY2Vzc2FyeSBhY3Rpb25zIG9uIHdpbmRvdyByZXNpemVcclxuXHQgKiBAcHJpdmF0ZVxyXG5cdCAqL1xyXG5cdHZhciBfaGFuZGxlV2luZG93UmVzaXplID0gZnVuY3Rpb24oKSB7XHJcblx0XHRcclxuXHRcdF9hcmdzID0gX3BvcHVsYXRlQXJncygpO1xyXG5cdFx0X3Jlc2l6ZU1lbnUoKTtcclxuXHRcdFxyXG5cdFx0aWYoICdvcGVuJyA9PT0gX3N0YXRlICkge1xyXG5cdFx0XHRcclxuXHRcdFx0X2NvbnRhaW5lcnMubWFpbi52ZWxvY2l0eSgge1xyXG5cdFx0XHRcdGxlZnQ6IF9hcmdzLm1lbnVXaWR0aFxyXG5cdFx0XHR9LCB7XHJcblx0XHRcdFx0ZHVyYXRpb246IDBcclxuXHRcdFx0fSApO1xyXG5cdFx0fVxyXG5cdH07XHJcblx0XHJcblx0dmFyIF9jYWxjdWxhdGVNZW51V2lkdGggPSBmdW5jdGlvbigpIHtcclxuXHRcdFxyXG5cdFx0cmV0dXJuICQoICcjbWVudScgKS53aWR0aCgpO1xyXG5cdH07XHJcblx0XHJcblx0dmFyIF9jYWxjdWxhdGVNZW51SGVpZ2h0ID0gZnVuY3Rpb24oKSB7XHJcblx0XHRcclxuXHRcdHJldHVybiAkKCAnI21lbnUnICkuaGVpZ2h0KCk7XHJcblx0fTtcclxuXHRcclxuXHR2YXIgX3BvcHVsYXRlQ29udGFpbmVycyA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0XHJcblx0XHRyZXR1cm4ge1xyXG5cdFx0XHRwYWdlOiAgICAkKCAnI3BhZ2UnICksXHJcblx0XHRcdGhlYWRlcjogICQoICcjcGFnZSA+IGhlYWRlcicgKSxcclxuXHRcdFx0bWFpbjogICAgJCggJyNtYWluJyApLFxyXG5cdFx0XHRjb250ZW50OiAkKCAnI2NvbnRlbnQnICksXHJcblx0XHRcdG1lbnU6ICAgICQoICcjbWVudScgKSxcclxuXHRcdFx0dG9nZ2xlOiAgJCggJyNyZXNwLW1lbnUtdG9nZ2xlJyApLFxyXG5cdFx0XHRmb290ZXI6ICAkKCAnI3BhZ2UgPiBmb290ZXInIClcclxuXHRcdH07XHJcblx0fTtcclxuXHRcclxuXHR2YXIgX3BvcHVsYXRlQXJncyA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0XHJcblx0XHRyZXR1cm4ge1xyXG5cdFx0XHRhbmltYXRpb25EdXJhdGlvbjogMjUwLFxyXG5cdFx0XHRtZW51V2lkdGg6ICAgICAgICAgX2NhbGN1bGF0ZU1lbnVXaWR0aCgpLFxyXG5cdFx0XHRtZW51SGVpZ2h0OiAgICAgICAgX2NhbGN1bGF0ZU1lbnVIZWlnaHQoKVxyXG5cdFx0fTtcclxuXHR9O1xyXG5cdFxyXG5cdC8qKlxyXG5cdCAqIERldGVybWluZXMgd2hldGhlciB0aGUgbWVudSBpcyBjdXJyZW50bHkgYW5pbWF0aW5nIG9yIG5vdFxyXG5cdCAqIEByZXR1cm5zIHtib29sZWFufVxyXG5cdCAqL1xyXG5cdHZhciBpc0FuaW1hdGluZyA9IGZ1bmN0aW9uKCkge1xyXG5cdFx0XHJcblx0XHRyZXR1cm4gX2NvbnRhaW5lcnMubWFpbi5pcyggJy52ZWxvY2l0eS1hbmltYXRpbmcnICk7XHJcblx0fTtcclxuXHRcclxuXHQvKipcclxuXHQgKiBSZXR1cm5zIHdoZXRoZXIgdGhlIG1lbnUgaGFzIGJlZW4gaW5pdGlhbGl6ZWQgb3Igbm90XHJcblx0ICogQHJldHVybnMge2Jvb2xlYW59XHJcblx0ICovXHJcblx0dmFyIGdldEluaXRpYWxpemVkID0gZnVuY3Rpb24oKSB7XHJcblx0XHRcclxuXHRcdHJldHVybiBfaW5pdGlhbGl6ZWQ7XHJcblx0fTtcclxuXHRcclxuXHQvKipcclxuXHQgKiBSZXR1cm5zIHRoZSBjdXJyZW50IHN0YXRlIG9mIHRoZSBtZW51LCBlaXRoZXIgJ29wZW4nIG9yICdjbG9zZWQnXHJcblx0ICogQHJldHVybnMge3N0cmluZ31cclxuXHQgKi9cclxuXHR2YXIgZ2V0U3RhdGUgPSBmdW5jdGlvbigpIHtcclxuXHRcdFxyXG5cdFx0cmV0dXJuIF9zdGF0ZTtcclxuXHR9O1xyXG5cdFxyXG5cdC8qKlxyXG5cdCAqIFNldHMgdGhlIGludGVybmFsIHN0YXRlIHRvIGVpdGhlciAnb3Blbicgb3IgJ2Nsb3NlZCdcclxuXHQgKlxyXG5cdCAqIEBwYXJhbSB7KHN0cmluZ3xib29sZWFuKX0gc3RhdGUgVGhlIHN0YXRlIHRvIHNldC4gUGFzc2luZyB0cnVlIG9yICdvcGVuJyB3aWxsIHNldCB0aGUgc3RhdGUgdG8gJ29wZW4nLiBPdGhlcndpc2UsIHN0YXRlIHdpbGwgYmUgc2V0IHRvICdjbG9zZWQnLlxyXG5cdCAqIEByZXR1cm5zIHtzdHJpbmd9IFRoZSBuZXdseSBzZXQgc3RhdGVcclxuXHQgKiBAcHJpdmF0ZVxyXG5cdCAqL1xyXG5cdHZhciBfc2V0U3RhdGUgPSBmdW5jdGlvbiggc3RhdGUgKSB7XHJcblx0XHRcclxuXHRcdGlmKCB0cnVlID09PSBzdGF0ZSB8fCAnb3BlbicgPT09IHN0YXRlICkge1xyXG5cdFx0XHRcclxuXHRcdFx0cmV0dXJuIF9zdGF0ZSA9ICdvcGVuJztcclxuXHRcdH1cclxuXHRcdFxyXG5cdFx0cmV0dXJuIF9zdGF0ZSA9ICdjbG9zZWQnO1xyXG5cdH07XHJcblx0XHJcblx0cmV0dXJuIHtcclxuXHRcdGluaXQ6ICAgICAgICBpbml0LFxyXG5cdFx0aW5pdGlhbGl6ZWQ6IGdldEluaXRpYWxpemVkLFxyXG5cdFx0b3BlbjogICAgICAgIG9wZW4sXHJcblx0XHRjbG9zZTogICAgICAgY2xvc2UsXHJcblx0XHR0b2dnbGU6ICAgICAgdG9nZ2xlLFxyXG5cdFx0c3RhdGU6ICAgICAgIGdldFN0YXRlLFxyXG5cdFx0aXNBbmltYXRpbmc6IGlzQW5pbWF0aW5nXHJcblx0fTtcclxufSkoKTtcclxuXHJcbiQoIGRvY3VtZW50ICkucmVhZHkoIGZ1bmN0aW9uKCkge1xyXG5cdFxyXG5cdFBva2lmTWVudS5pbml0KCk7XHJcblx0XHJcbn0gKTsiXX0=
