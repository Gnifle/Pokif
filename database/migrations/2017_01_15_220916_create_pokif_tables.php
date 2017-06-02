<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePokifTables extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create( 'pokemon', function( Blueprint $table ) {
			
			$table->integer( 'id' )->unique();
			$table->string( 'identifier' )->unique();
			$table->integer( 'species_id' );
			$table->integer( 'height' );
			$table->integer( 'weight' );
			$table->integer( 'base_experience' );
			$table->integer( 'order' );
			$table->integer( 'is_default' );
			
		} );
		
		Schema::create( 'regions', function( Blueprint $table ) {
			
			$table->integer( 'id' )->unique()->nullable();
			$table->string( 'identifier' )->unique();
			
		} );
		
		Schema::create( 'pokedexes', function( Blueprint $table ) {
			
			$table->integer( 'id' )->unique();
			$table->integer( 'region_id' )->nullable();
			$table->foreign( 'region_id' )->references( 'id' )->on( 'regions' )->onDelete( 'cascade' );
			$table->string( 'identifier' )->unique();
			$table->boolean( 'is_main_series' );
			
		} );
		
		Schema::create( 'pokemon_dex_numbers', function( Blueprint $table ) {
			
			$table->integer( 'species_id' );
			$table->integer( 'pokedex_id' );
			$table->foreign( 'pokedex_id' )->references( 'id' )->on( 'pokedexes' )->onDelete( 'cascade' );
			$table->integer( 'pokedex_number' );
			
		} );

//		Schema::create( 'pokemon_names', function( Blueprint $table ) {
//
//			$table->integer( 'pokemon_number' );
//			$table->foreign( 'pokemon_number' )->references( 'number' )->on( 'pokemon' )->onDelete( 'cascade' );
//			$table->string( 'locale' );
//			$table->string( 'name' );
//
//		} );
//
//		Schema::create( 'ability', function( Blueprint $table ) {
//
//			$table->increments( 'id' );
//			$table->integer( 'api_id' );
//			$table->string( 'name' );
//			$table->string( 'slug' );
//			$table->integer( 'generation' );
//			$table->string( 'flavor_text' );
//			$table->string( 'effect_text' );
//
//		} );
//
//		Schema::create( 'ability_names', function( Blueprint $table ) {
//
//			$table->integer( 'ability_id' )->unsigned();
//			$table->foreign( 'ability_id' )->references( 'id' )->on( 'ability' )->onDelete( 'cascade' );
//			$table->string( 'locale' );
//			$table->string( 'name' );
//
//		} );
//
//		Schema::create( 'pokemon_abilities', function( Blueprint $table ) {
//
//			$table->integer( 'pokemon_number' );
//			$table->foreign( 'pokemon_number' )->references( 'number' )->on( 'pokemon' )->onDelete( 'cascade' );
//			$table->integer( 'ability_id' )->unsigned();
//			$table->foreign( 'ability_id' )->references( 'id' )->on( 'ability' )->onDelete( 'cascade' );
//
//		} );
//
//		Schema::create( 'egg_group', function( Blueprint $table ) {
//
//			$table->increments( 'id' );
//			$table->integer( 'api_id' );
//			$table->string( 'name' );
//			$table->string( 'slug' );
//
//		} );
//
//		Schema::create( 'pokedex', function( Blueprint $table ) {
//
//			$table->integer( 'key' )->unique();
//			$table->string( 'slug' )->unique();
//			$table->string( 'name' );
//
//		} );
//
//		Schema::create( 'pokedex_entries', function( Blueprint $table ) {
//
//			$table->increments( 'id' );
//			$table->integer( 'pokemon_number' );
//			$table->foreign( 'pokemon_number' )->references( 'number' )->on( 'pokemon' )->onDelete( 'cascade' );
//			$table->integer( 'pokedex_key' );
//			$table->foreign( 'pokedex_key' )->references( 'key' )->on( 'pokedex' )->onDelete( 'cascade' );
//
//		} );
//
//		Schema::create( 'stats', function( Blueprint $table ) {
//
//			$table->increments( 'id' );
//			$table->string( 'slug' )->unique();
//			$table->string( 'name' );
//			$table->string( 'name_abbr' );
//
//		} );
//
//		Schema::create( 'pokemon_stats', function( Blueprint $table ) {
//
//			$table->increments( 'id' );
//			$table->integer( 'pokemon_number' );
//			$table->foreign( 'pokemon_number' )->references( 'number' )->on( 'pokemon' )->onDelete( 'cascade' );
//			$table->string( 'stat_slug' );
//			$table->foreign( 'stat_slug' )->references( 'slug' )->on( 'stats' )->onDelete( 'cascade' );
//			$table->integer( 'pokedex_generation' );
//			$table->foreign( 'pokedex_generation' )->references( 'key' )->on( 'pokedex' )->onDelete( 'cascade' );
//			$table->integer( 'value' );
//
//		} );
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
//		Schema::dropIfExists( 'pokedex_entries' );
//		Schema::dropIfExists( 'pokemon_names' );
//		Schema::dropIfExists( 'ability_names' );
//		Schema::dropIfExists( 'pokemon_abilities' );
//		Schema::dropIfExists( 'pokemon_stats' );
//		Schema::dropIfExists( 'egg_group' );
		Schema::dropIfExists( 'pokemon_dex_numbers' );
		Schema::dropIfExists( 'pokemon' );
		Schema::dropIfExists( 'pokedexes' );
		Schema::dropIfExists( 'regions' );
//		Schema::dropIfExists( 'ability' );
//		Schema::dropIfExists( 'stats' );
	}
}
