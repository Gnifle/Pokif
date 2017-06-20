<?php

namespace App\Http\Middleware;

use Closure;

class RedirectToLowercase {
	
	/**
	 * Check if the current path is lowercased. Otherwise, redirect to the fully lowercased version of the path.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next ) {
		
		$path            = $request->path();
		$path_lowercased = strtolower( $path );
		
		if( $path !== $path_lowercased ) {
			
			return redirect( $path_lowercased );
		}
		
		return $next( $request );
	}
}
