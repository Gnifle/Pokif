<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use DB;

class GenerationMiddleware {
	
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next ) {
		
		$generation = DB::table( 'generations' )
		                ->orderBy( 'id', 'DESC' )
		                ->take( 1 )
		                ->value( 'id' );
		
		Config::set( 'generation', $generation );
		
		return $next( $request );
	}
}
