const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir( function( mix ) {

	mix.sass( 'app.sass' );

	mix.styles([
		'vendor/normalize.css',
		'app.css'
	], 'public/dist/app.min.css', 'public/css' );

	mix.scripts([

	], 'public/dist/app.min.js', 'public/js' );

	mix.phpUnit();

	mix.version( 'public/dist/app.min.css' )

});