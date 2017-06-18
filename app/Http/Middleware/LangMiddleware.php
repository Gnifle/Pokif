<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use App;

class LangMiddleware {
	
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 *
	 * @return mixed
	 */
	public function handle( $request, Closure $next ) {
		
		$url_array = explode( '.', parse_url( $request->url(), PHP_URL_HOST ) );
		$subdomain = $url_array[ 0 ];

		$languages = DB::table( 'languages' )->pluck( 'identifier' );
		
		if( in_array( $subdomain, $languages->toArray() ) ) {
			
			App::setLocale( $subdomain );
		}
		
		return $next( $request );
	}
}
