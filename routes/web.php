<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get( '/', function() {
	
	return View::make( 'pages.home' );
} );

Route::get( '/tools', function() {
	
	return View::make( 'pages.tools' );
} );

Route::get( '/tools/importer', function() {
	
	return View::make( 'pages.tools.importer' );
} );

Route::get( '/tools/importer/pokemon/{number}', 'PokemonController@show' );

